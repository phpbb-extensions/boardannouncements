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
	public static function data_get_visible_announcements()
	{
		return [
			[1, false, ['ANNOUNCEMENT 1', 'ANNOUNCEMENT 3']], // guest
			[2, true, ['ANNOUNCEMENT 1']], // user who dismissed announcement 2
			[3, true, ['ANNOUNCEMENT 1', 'ANNOUNCEMENT 2']], // registered user without dismissals
			[3, false, ['ANNOUNCEMENT 1', 'ANNOUNCEMENT 3']], // bot
		];
	}

	/**
	 * Test the get_visible_announcements() method
	 *
	 * @dataProvider data_get_visible_announcements
	 * @param int $user_id
	 * @param bool $is_registered
	 * @param string $expected
	 */
	public function test_get_visible_announcements($user_id, $is_registered, $expected)
	{
		$result = $this->manager->get_visible_announcements($user_id, $is_registered);

		self::assertEquals($expected, array_column($result, 'announcement_description'));
	}

	/**
	 * Visibility restrictions qualify every column in aliased nested-set queries
	 */
	public function test_visibility_restrictions_with_aliased_query()
	{
		$this->manager->get_visible_announcements(3, true);

		self::assertSame('ANNOUNCEMENT 1', $this->manager->get_announcement(1)['announcement_description']);
	}
}
