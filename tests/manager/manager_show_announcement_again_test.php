<?php
/**
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2026 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 */

namespace phpbb\boardannouncements\tests\manager;

class manager_show_announcement_again_test extends manager_base
{
	public function test_show_again_increments_cookie_revision()
	{
		self::assertSame(1, $this->count_dismissals(2, 200));
		self::assertTrue($this->manager->show_announcement_again(2));
		self::assertSame(2, (int) $this->manager->get_announcement(2)['announcement_revision']);
		self::assertSame(0, $this->count_dismissals(2, 200));
	}

	public function test_show_again_rejects_unknown_announcement()
	{
		self::assertFalse($this->manager->show_announcement_again(999));
	}

}
