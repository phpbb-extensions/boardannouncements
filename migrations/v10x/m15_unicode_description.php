<?php
/**
 *
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2026 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\boardannouncements\migrations\v10x;

/**
 * Migration stage 15: Add Unicode support to announcement descriptions
 */
class m15_unicode_description extends \phpbb\db\migration\migration
{
	/**
	 * {@inheritdoc}
	 */
	public static function depends_on()
	{
		return [
			'\phpbb\boardannouncements\migrations\v10x\m9_schema_update',
			'\phpbb\boardannouncements\migrations\v10x\m14_schema_removal',
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function update_schema()
	{
		return [
			'change_columns'	=> [
				$this->table_prefix . 'board_announcements'	=> [
					'announcement_description'	=> ['VCHAR_UNI:255', ''],
				],
			],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function revert_schema()
	{
		// Keep Unicode data until the migration which created the table removes it.
		return [];
	}
}
