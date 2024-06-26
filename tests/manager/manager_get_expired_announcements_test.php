<?php
/**
 *
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2023 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\boardannouncements\tests\manager;

class manager_get_expired_announcements_test extends manager_base
{
	/**
	 * Data for test_get_expired_announcements
	 *
	 * @return array
	 */
	public function data_get_expired_announcements()
	{
		return [
			['foo', []],
			['announcement_id', [4]],
			['announcement_description', ['ANNOUNCEMENT 4']],
			[null, [4 => [
				'announcement_id'			=> 4,
				'announcement_text'			=> 'Sample Announcement Test Text 4',
				'announcement_description'	=> 'ANNOUNCEMENT 4',
				'announcement_bgcolor'		=> '',
				'announcement_enabled'		=> 1,
				'announcement_locations'	=> '',
				'announcement_dismissable'	=> 0,
				'announcement_users'		=> \phpbb\boardannouncements\ext::ALL,
				'announcement_timestamp'	=> 1586466710,
				'announcement_expiry'		=> 1586466810,
				'announcement_uid'			=> '',
				'announcement_bitfield'		=> '',
				'announcement_flags'			=> 7,
				'announcement_parent_id'	=> 0,
				'announcement_left_id'		=> 7,
				'announcement_right_id'		=> 8,
				'announcement_parents'		=> '',
			]]],
		];
	}

	/**
	 * Test the get_expired_announcements() method
	 *
	 * @dataProvider data_get_expired_announcements
	 * @param $column
	 * @param string $expected
	 */
	public function test_get_expired_announcements($column, $expected)
	{
		self::assertEquals($expected, $this->manager->get_expired_announcements($column));
	}
}
