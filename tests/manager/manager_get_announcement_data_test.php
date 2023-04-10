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

class manager_get_announcement_data_test extends manager_base
{
	/**
	 * Data for test_get_announcement_data
	 *
	 * @return array
	 */
	public function data_get_announcement_data()
	{
		return [
			[1, 'announcement_text', 'Sample Announcement Test Text 1'],
			[1, 'announcement_description', 'ANNOUNCEMENT 1'],
			[1, 'announcement_bgcolor', ''],
			[2, 'announcement_text', 'Sample Announcement Test Text 2'],
			[2, 'announcement_description', 'ANNOUNCEMENT 2'],
			[2, 'announcement_bgcolor', 'ffffff'],
			[3, 'announcement_text', 'Sample Announcement Test Text 3'],
			[3, 'announcement_description', 'ANNOUNCEMENT 3'],
			[3, 'announcement_bgcolor', '000000'],
			[0, 'announcement_text', ''],
			[0, 'announcement_description', ''],
			[0, 'announcement_bgcolor', ''],
		];
	}

	/**
	 * Test the get_announcement_data() method
	 *
	 * @dataProvider data_get_announcement_data
	 * @param int $user_id
	 * @param string $expected
	 */
	public function test_get_announcement_data($id, $column, $expected)
	{
		self::assertEquals($expected, $this->manager->get_announcement_data($id, $column));
	}
}
