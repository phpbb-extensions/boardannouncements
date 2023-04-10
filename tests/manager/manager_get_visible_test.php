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

class manager_get_visible_test extends manager_base
{
	/**
	 * Data for test_get_visible_announcements
	 *
	 * @return array
	 */
	public function data_get_visible_announcements()
	{
		return [
			[1, ['ANNOUNCEMENT 1', 'ANNOUNCEMENT 3']], // guest
			[2, ['ANNOUNCEMENT 1']], // user who dismissed announcement 2
			[3, ['ANNOUNCEMENT 1', 'ANNOUNCEMENT 2']], // any user not having dismissed any yet
		];
	}

	/**
	 * Test the get_visible_announcements() method
	 *
	 * @dataProvider data_get_visible_announcements
	 * @param int $user_id
	 * @param string $expected
	 */
	public function test_get_visible_announcements($user_id, $expected)
	{
		$result = $this->manager->get_visible_announcements($user_id);

		self::assertEquals($expected, array_column($result, 'announcement_description'));
	}
}
