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

class manager_disable_announcement_test extends manager_base
{
	/**
	 * Test the disable_announcement() method
	 */
	public function test_disable_announcement()
	{
		self::assertFalse($this->manager->disable_announcement(1));
	}

	/**
	 * Test the disable_announcement() method
	 */
	public function test_disable_announcement_fails()
	{
		$this->expectException(\OutOfBoundsException::class);
		$this->expectExceptionMessage('BOARD_ANNOUNCEMENTS_INVALID_ITEM');
		$this->manager->disable_announcement(0);
	}
}
