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
	public static function data_get_announcements()
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

	public function test_get_published_announcements_filters_state_and_member_dismissals_in_one_query()
	{
		$query_count = $this->db->sql_num_queries();
		$result = $this->manager->get_published_announcements(200);

		self::assertSame($query_count + 1, $this->db->sql_num_queries());
		self::assertSame([1, 3, 4], array_keys($result));
		self::assertNotEmpty($this->manager->get_announcement(5));

		$result = $this->manager->get_announcements();
		self::assertSame($query_count + 3, $this->db->sql_num_queries());
		self::assertSame([1, 2, 3, 4, 5], array_keys($result));
	}

	public function test_get_published_announcements_does_not_apply_dismissals_to_guests_or_other_members()
	{
		self::assertSame([1, 2, 3, 4], array_keys($this->manager->get_published_announcements()));
		self::assertSame([1, 2, 3, 4], array_keys($this->manager->get_published_announcements(201)));
	}

	public function test_get_published_announcements_ignores_anonymous_tracking_rows()
	{
		$this->db->sql_query('INSERT INTO phpbb_board_announcements_track (announcement_id, user_id) VALUES (1, ' . ANONYMOUS . ')');

		self::assertSame([1, 2, 3, 4], array_keys($this->manager->get_published_announcements(ANONYMOUS)));
	}

	public function test_get_published_announcements_leaves_runtime_state_to_visibility_service()
	{
		$this->db->sql_query("UPDATE phpbb_board_announcements
			SET announcement_enabled = 1, announcement_state = 'published', announcement_start = 0, announcement_expiry = 0");
		$this->db->sql_query('UPDATE phpbb_board_announcements SET announcement_start = 1001 WHERE announcement_id = 1');
		$this->db->sql_query('UPDATE phpbb_board_announcements SET announcement_start = 1000 WHERE announcement_id = 2');
		$this->db->sql_query('UPDATE phpbb_board_announcements SET announcement_expiry = 1000 WHERE announcement_id = 3');
		$this->db->sql_query("UPDATE phpbb_board_announcements SET announcement_state = 'archived' WHERE announcement_id = 4");
		$this->db->sql_query('UPDATE phpbb_board_announcements SET announcement_enabled = 0 WHERE announcement_id = 5');

		self::assertSame([1, 2, 3, 5], array_keys($this->manager->get_published_announcements()));
	}
}
