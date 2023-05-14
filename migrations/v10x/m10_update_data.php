<?php
/**
 *
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2023 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\boardannouncements\migrations\v10x;

use phpbb\boardannouncements\manager\nestedset;

/**
 * Migration stage 10: Migrate and clean out old board announcement data
 */
class m10_update_data extends \phpbb\db\migration\container_aware_migration
{
	/**
	 * {@inheritdoc}
	 */
	public static function depends_on()
	{
		return [
			'\phpbb\boardannouncements\migrations\v10x\m1_initial_schema',
			'\phpbb\boardannouncements\migrations\v10x\m2_initial_data',
			'\phpbb\boardannouncements\migrations\v10x\m4_announcements_dismiss_config',
			'\phpbb\boardannouncements\migrations\v10x\m6_update_config',
			'\phpbb\boardannouncements\migrations\v10x\m7_announcements_expiry',
			'\phpbb\boardannouncements\migrations\v10x\m8_index_only',
			'\phpbb\boardannouncements\migrations\v10x\m9_schema_update',
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function effectively_installed()
	{
		return $this->config->offsetExists('board_announcements_cron_last_run');
	}

	/**
	 * {@inheritdoc}
	 */
	public function update_data()
	{
		return [
			// convert old announcement to new schema
			['custom', [[$this, 'convert_board_announcements']]],

			// remove old announcement data
			['config.remove', ['board_announcements_dismiss']],
			['config.remove', ['board_announcements_users']],
			['config.remove', ['board_announcements_expiry']],
			['config.remove', ['board_announcements_index_only']],
			['config_text.remove', ['announcement_text']],
			['config_text.remove', ['announcement_uid']],
			['config_text.remove', ['announcement_bitfield']],
			['config_text.remove', ['announcement_options']],
			['config_text.remove', ['announcement_bgcolor']],
			['config_text.remove', ['announcement_timestamp']],

			// add new announcements data
			['config.add', ['board_announcements_cron_last_run', 0, true]],
		];
	}

	/**
	 * Custom function to move old board announcement data to the new schema
	 *
	 * @return void
	 */
	public function convert_board_announcements()
	{
		/** @var \phpbb\config\db_text $config_text */
		$config_text = $this->container->get('config_text');

		$import_data = [
			'announcement_description' => '',
			'announcement_text'        => $config_text->get('announcement_text'),
			'announcement_bgcolor'     => $config_text->get('announcement_bgcolor'),
			'announcement_uid'         => $config_text->get('announcement_uid'),
			'announcement_bitfield'     => $config_text->get('announcement_bitfield'),
			'announcement_flags'        => (int) $config_text->get('announcement_options'),
			'announcement_timestamp'   => (int) $config_text->get('announcement_timestamp'),
			'announcement_enabled'     => (int) $this->config->offsetGet('board_announcements_enable'),
			'announcement_indexonly'   => (int) $this->config->offsetGet('board_announcements_index_only'),
			'announcement_dismissable' => (int) $this->config->offsetGet('board_announcements_dismiss'),
			'announcement_users'       => (int) $this->config->offsetGet('board_announcements_users'),
			'announcement_expiry'      => (int) $this->config->offsetGet('board_announcements_expiry'),
		];

		// If we have an announcement to import, let's go!! :)
		if (!empty($import_data['announcement_text'] ))
		{
			$result = $this->get_nestedset()->insert($import_data);
		}

		// Also get any user data for dismissed announcements
		if (isset($result['announcement_id']))
		{
			$this->migrate_user_data($result['announcement_id']);
		}
	}

	/**
	 * Get the board announcements nested set object
	 *
	 * @return nestedset
	 */
	protected function get_nestedset()
	{
		/** @var \phpbb\db\driver\driver_interface $db */
		$db = $this->container->get('dbal.conn');

		return new nestedset(
			$db,
			new \phpbb\lock\db('boardannouncements.table_lock.board_announcements_table', $this->config, $db),
			$this->table_prefix . 'board_announcements',
			$this->table_prefix . 'board_announcements_track'
		);
	}

	/**
	 * Inserts user tracking, if users have dismissed the old announcement,
	 * we add that data to the new table, so we keep the announcement closed.
	 *
	 * @param int $id The announcement identifier
	 * @return void
	 */
	protected function migrate_user_data($id)
	{
		$sql_ary = [];
		$sql = 'SELECT user_id FROM ' . $this->table_prefix . 'users
         	WHERE board_announcements_status = 0
         	AND user_type <> ' . USER_IGNORE;
		$result = $this->db->sql_query($sql);
		while ($row = $this->db->sql_fetchrow($result))
		{
			$sql_ary[] = [
				'announcement_id'	=> $id,
				'user_id'			=> $row['user_id'],
			];
		}
		$this->db->sql_multi_insert($this->table_prefix . 'board_announcements_track', $sql_ary);
	}
}
