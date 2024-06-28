<?php
/**
 *
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2024 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\boardannouncements\migrations\v10x;

/**
 * Migration stage 14: Remove old board announcement schema from tables
 */
class m14_schema_removal extends \phpbb\db\migration\migration
{
	/**
	 * {@inheritdoc}
	 */
	public static function depends_on()
	{
		return [
			'\phpbb\boardannouncements\migrations\v10x\m12_locations',
			'\phpbb\boardannouncements\migrations\v10x\m13_locations_data',
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function effectively_installed()
	{
		return !$this->db_tools->sql_column_exists($this->table_prefix . 'board_announcements', 'announcement_indexonly');
	}

	/**
	 * {@inheritdoc}
	 */
	public function update_schema()
	{
		return [
			'drop_columns'	=> [
				$this->table_prefix . 'board_announcements'	=> [
					'announcement_indexonly',
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
			'add_columns'	=> [
				$this->table_prefix . 'board_announcements'	=> [
					'announcement_indexonly'	=> ['VCHAR:255', ''],
				],
			],
		];
	}
}
