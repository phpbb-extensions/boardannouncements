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
 * Migration stage 12: Add option for locations where announcement can be displayed
 */
class m12_locations extends \phpbb\db\migration\migration
{
	/**
	 * {@inheritdoc}
	 */
	public static function depends_on()
	{
		return [
			'\phpbb\boardannouncements\migrations\v10x\m9_schema_update',
			'\phpbb\boardannouncements\migrations\v10x\m10_update_data',
			'\phpbb\boardannouncements\migrations\v10x\m11_schema_removal',
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function effectively_installed()
	{
		return $this->db_tools->sql_column_exists($this->table_prefix . 'board_announcements', 'announcement_locations');
	}

	/**
	 * {@inheritdoc}
	 */
	public function update_schema()
	{
		return [
			'add_columns'	=> [
				$this->table_prefix . 'board_announcements'	=> [
					'announcement_locations'	=> ['TEXT', ''],
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
			'drop_columns'	=> [
				$this->table_prefix . 'board_announcements'	=> [
					'announcement_locations',
				],
			],
		];
	}
}
