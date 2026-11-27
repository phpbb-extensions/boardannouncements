<?php
/**
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2026 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 */

namespace phpbb\boardannouncements\migrations\v20x;

class m2_data extends \phpbb\db\migration\container_aware_migration
{
	/** {@inheritdoc} */
	public static function depends_on()
	{
		return ['\phpbb\boardannouncements\migrations\v20x\m1_schema'];
	}

	/** {@inheritdoc} */
	public function update_data()
	{
		return [
			['custom', [[$this, 'migrate_announcements']]],
			['permission.add', ['a_boardannouncements', true, 'a_board']],
			['if', [
				['permission.role_exists', ['ROLE_ADMIN_FULL']],
				['permission.permission_set', ['ROLE_ADMIN_FULL', 'a_boardannouncements']],
			]],
			['if', [
				['permission.role_exists', ['ROLE_ADMIN_STANDARD']],
				['permission.permission_set', ['ROLE_ADMIN_STANDARD', 'a_boardannouncements']],
			]],
			['custom', [[$this, 'update_module_auth']]],
		];
	}

	/**
	 * Update ACP module authorization expression.
	 *
	 * @return void
	 */
	public function update_module_auth()
	{
		$old_auth = 'ext_phpbb/boardannouncements && acl_a_board';
		$new_auth = 'ext_phpbb/boardannouncements && acl_a_boardannouncements';
		$module_basename = '\\phpbb\\boardannouncements\\acp\\board_announcements_module';
		$sql = 'UPDATE ' . $this->table_prefix . "modules
			SET module_auth = '" . $this->db->sql_escape($new_auth) . "'
			WHERE module_class = 'acp'
				AND module_basename = '" . $this->db->sql_escape($module_basename) . "'
				AND module_mode = 'settings'
				AND module_auth = '" . $this->db->sql_escape($old_auth) . "'";
		$this->db->sql_query($sql);

		$this->container->get('cache')->destroy('_modules_acp');
	}

	/**
	 * Migrate existing announcements to 2.0 state and tone fields.
	 *
	 * @return void
	 */
	public function migrate_announcements()
	{
		$now = time();
		$sql = 'SELECT announcement_id, announcement_enabled, announcement_left_id, announcement_timestamp, announcement_expiry, announcement_bgcolor
			FROM ' . $this->table_prefix . 'board_announcements
			ORDER BY announcement_left_id ASC';
		$result = $this->db->sql_query($sql);
		while ($row = $this->db->sql_fetchrow($result))
		{
			$published = !empty($row['announcement_enabled']) || (!empty($row['announcement_expiry']) && (int) $row['announcement_expiry'] <= $now);
			$sql = 'UPDATE ' . $this->table_prefix . 'board_announcements
				SET ' . $this->db->sql_build_array('UPDATE', [
					'announcement_enabled' => $published ? 1 : 0,
					'announcement_state' => $published ? 'published' : 'draft',
					'announcement_tone' => $row['announcement_bgcolor'] !== '' ? 'custom' : 'info',
					'announcement_updated_at' => (int) $row['announcement_timestamp'],
				]) . '
				WHERE announcement_id = ' . (int) $row['announcement_id'];
			$this->db->sql_query($sql);
		}
		$this->db->sql_freeresult($result);
	}
}
