<?php
/**
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2026 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 */

namespace phpbb\boardannouncements\tests\manager;

class manager_dismissal_test extends manager_base
{
	public function test_dismissal_is_stored_and_idempotent()
	{
		self::assertSame(0, $this->count_dismissals(1, 2));
		self::assertTrue($this->manager->close_announcement(1, 2));
		self::assertTrue($this->manager->close_announcement(1, 2));
		self::assertSame(1, $this->count_dismissals(1, 2));
	}

	public function test_dismissal_rejects_unknown_announcement()
	{
		$this->expectException(\OutOfBoundsException::class);
		$this->expectExceptionMessage('BOARD_ANNOUNCEMENTS_INVALID_ITEM');
		$this->manager->close_announcement(999, 2);
	}

	public function test_dismissal_rejects_anonymous_without_querying_database()
	{
		$query_count = $this->db->sql_num_queries();

		self::assertFalse($this->manager->close_announcement(1, ANONYMOUS));
		self::assertSame($query_count, $this->db->sql_num_queries());
	}

	public function test_regular_update_preserves_dismissal()
	{
		self::assertSame(1, $this->count_dismissals(2, 200));
		self::assertTrue($this->manager->update_announcement(2, ['announcement_title' => 'Updated']));
		self::assertSame(1, $this->count_dismissals(2, 200));
	}

	public function test_delete_removes_dismissals()
	{
		self::assertSame(1, $this->count_dismissals(2, 200));
		self::assertTrue($this->manager->delete_announcement(2));
		self::assertSame(0, $this->count_dismissals(2, 200));
	}

}
