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

	public function test_get_announcements_filters_member_dismissals_in_one_query_and_resets()
	{
		$query_count = $this->db->sql_num_queries();
		$result = $this->manager->get_announcements(200);

		self::assertSame($query_count + 1, $this->db->sql_num_queries());
		self::assertSame([1, 3, 4, 5], array_keys($result));

		$result = $this->manager->get_announcements();
		self::assertSame($query_count + 2, $this->db->sql_num_queries());
		self::assertSame([1, 2, 3, 4, 5], array_keys($result));
	}

	public function test_get_announcements_does_not_apply_dismissals_to_guests_or_other_members()
	{
		self::assertSame([1, 2, 3, 4, 5], array_keys($this->manager->get_announcements()));
		self::assertSame([1, 2, 3, 4, 5], array_keys($this->manager->get_announcements(201)));
	}

	public function test_get_announcements_ignores_anonymous_tracking_rows()
	{
		$this->db->sql_query('INSERT INTO phpbb_board_announcements_track (announcement_id, user_id) VALUES (1, ' . ANONYMOUS . ')');

		self::assertSame([1, 2, 3, 4, 5], array_keys($this->manager->get_announcements(ANONYMOUS)));
	}
}
