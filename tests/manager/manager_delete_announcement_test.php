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

class manager_delete_announcement_test extends manager_base
{
	/**
	 * Test the delete_announcement() method
	 */
	public function test_delete_announcement()
	{
		self::assertNotEmpty($this->manager->get_announcement(2));
		self::assertTrue($this->manager->delete_announcement(2));
		self::assertEmpty($this->manager->get_announcement(2));
	}

	/**
	 * Test the delete_announcement() method
	 */
	public function test_delete_announcement_fails()
	{
		$this->expectException(\OutOfBoundsException::class);
		$this->expectExceptionMessage('BOARD_ANNOUNCEMENTS_INVALID_ITEM');
		$this->manager->delete_announcement(0);
	}
}
