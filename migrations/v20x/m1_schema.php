<?php
/**
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2026 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 */

namespace phpbb\boardannouncements\migrations\v20x;

class m1_schema extends \phpbb\db\migration\migration
{
	public static function depends_on()
	{
		return ['\phpbb\boardannouncements\migrations\v10x\m15_unicode_description'];
	}

	public function update_schema()
	{
		return [
			'drop_tables' => [$this->table_prefix . 'board_announcements_track'],
			'add_columns' => [
				$this->table_prefix . 'board_announcements' => [
					'announcement_title' => ['VCHAR_UNI:255', ''],
					'announcement_tone' => ['VCHAR:16', 'info'],
					'announcement_state' => ['VCHAR:16', 'published'],
					'announcement_start' => ['TIMESTAMP', 0],
					'announcement_include_children' => ['BOOL', 0],
					'announcement_revision' => ['UINT', 1],
					'announcement_created_by' => ['UINT', 0],
					'announcement_updated_at' => ['TIMESTAMP', 0],
					'announcement_updated_by' => ['UINT', 0],
				],
			],
			'add_tables' => [
				$this->table_prefix . 'board_announcement_groups' => [
					'COLUMNS' => [
						'announcement_id' => ['UINT', 0],
						'group_id' => ['UINT', 0],
					],
					'PRIMARY_KEY' => ['announcement_id', 'group_id'],
					'KEYS' => [
						'group_id' => ['INDEX', 'group_id'],
					],
				],
			],
			'add_index' => [
				$this->table_prefix . 'board_announcements' => [
					'announcement_active' => ['announcement_state', 'announcement_start', 'announcement_expiry'],
				],
			],
		];
	}

	public function revert_schema()
	{
		return [
			'drop_tables' => [$this->table_prefix . 'board_announcement_groups'],
			'add_tables' => [
				$this->table_prefix . 'board_announcements_track' => [
					'COLUMNS' => [
						'announcement_id' => ['UINT', 0],
						'user_id' => ['UINT', 0],
					],
					'KEYS' => [
						'announcement_id' => ['INDEX', 'announcement_id'],
						'user_id' => ['INDEX', 'user_id'],
					],
				],
			],
			'drop_keys' => [
				$this->table_prefix . 'board_announcements' => ['announcement_active'],
			],
			'drop_columns' => [
				$this->table_prefix . 'board_announcements' => [
					'announcement_title', 'announcement_tone', 'announcement_state',
					'announcement_start', 'announcement_include_children', 'announcement_revision',
					'announcement_created_by', 'announcement_updated_at',
						'announcement_updated_by',
					],
				],
			];
	}
}
