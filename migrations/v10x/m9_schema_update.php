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

/**
 * Migration stage 9: Add new schema for board announcement tables
 */
class m9_schema_update extends \phpbb\db\migration\migration
{
	/**
	 * {@inheritdoc}
	 */
	public static function depends_on()
	{
		return [
			'\phpbb\boardannouncements\migrations\v10x\m1_initial_schema',
			'\phpbb\boardannouncements\migrations\v10x\m2_initial_data',
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function effectively_installed()
	{
		return $this->db_tools->sql_table_exists($this->table_prefix . 'board_announcements');
	}

	/**
	 * {@inheritdoc}
	 */
	public function update_schema()
	{
		return [
			'add_tables'	=> [
				$this->table_prefix . 'board_announcements'	=> [
					'COLUMNS'	=> [
						'announcement_id'			=> ['UINT', null, 'auto_increment'],
						'announcement_text'			=> ['MTEXT_UNI', ''],
						'announcement_description'	=> ['VCHAR:255', ''],
						'announcement_bgcolor'		=> ['VCHAR:255', ''],
						'announcement_enabled'		=> ['BOOL', 0],
						'announcement_indexonly'	=> ['BOOL', 0],
						'announcement_dismissable'	=> ['BOOL', 0],
						'announcement_users'		=> ['UINT', 0],
						'announcement_timestamp'	=> ['TIMESTAMP', 0],
						'announcement_expiry'		=> ['TIMESTAMP', 0],
						'announcement_uid'			=> ['VCHAR:8', ''],
						'announcement_bitfield'		=> ['VCHAR:255', ''],
						'announcement_flags'			=> ['UINT:11', 7],
						'announcement_parent_id'	=> ['UINT', 0],
						'announcement_left_id'		=> ['UINT', 0],
						'announcement_right_id'		=> ['UINT', 0],
						'announcement_parents'		=> ['MTEXT_UNI', ''],
					],
					'PRIMARY_KEY'	=> 'announcement_id',
				],
				$this->table_prefix . 'board_announcements_track'	=> [
					'COLUMNS'	=> [
						'announcement_id'	=> ['UINT', 0],
						'user_id'			=> ['UINT', 0],
					],
					'KEYS'	=> [
						'announcement_id'	=> ['INDEX', 'announcement_id'],
						'user_id'			=> ['INDEX', 'user_id'],
					],
				],
			],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function revert_schema()
	{
		return [
			'drop_tables'	=> [
				$this->table_prefix . 'board_announcements',
				$this->table_prefix . 'board_announcements_track',
			],
		];
	}
}
