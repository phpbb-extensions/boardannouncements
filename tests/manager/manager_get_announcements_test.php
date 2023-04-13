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

class manager_get_announcements_test extends manager_base
{
	/**
	 * Data for test_get_announcements
	 *
	 * @return array
	 */
	public function data_get_announcements()
	{
		return [
			[['ANNOUNCEMENT 1', 'ANNOUNCEMENT 2', 'ANNOUNCEMENT 3', 'ANNOUNCEMENT 4', 'ANNOUNCEMENT 5']],
		];
	}

	/**
	 * Test the get_announcements() method
	 *
	 * @dataProvider data_get_announcements
	 * @param string $expected
	 */
	public function test_get_announcements($expected)
	{
		$result = $this->manager->get_announcements();

		self::assertEquals($expected, array_column($result, 'announcement_description'));
	}
}
