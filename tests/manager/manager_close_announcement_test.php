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

class manager_close_announcement_test extends manager_base
{
	/**
	 * Data for test_close_announcement
	 *
	 * @return array
	 */
	public function data_close_announcement()
	{
		return [
			[1, 2, [2, 4], [1, 2, 4]],
			[1, 3, [], [1]],
			[1, 5, [], [1]],
		];
	}

	/**
	 * Test close_announcement() method
	 *
	 * @dataProvider data_close_announcement
	 * @param int $id
	 * @param int $user_id
	 * @param array $expected
	 */
	public function test_close_announcement($id, $user_id, $initial, $expected)
	{
		$this->assertEquals($initial, $this->get_closed_announcements($user_id));

		$this->manager->close_announcement($id, $user_id);

		self::assertEquals($expected, $this->get_closed_announcements($user_id));
	}

	/**
	 * Test close_announcement() method
	 */
	public function test_close_announcement_fails()
	{
		$this->expectException(\OutOfBoundsException::class);
		$this->expectExceptionMessage('BOARD_ANNOUNCEMENTS_INVALID_ITEM');
		$this->manager->close_announcement(123, 5);
	}

	protected function get_closed_announcements($user_id)
	{
		$ids = [];
		$sql = 'SELECT announcement_id FROM phpbb_board_announcements_track WHERE user_id = ' . (int) $user_id;
		$result = $this->db->sql_query($sql);
		while ($row = $this->db->sql_fetchrow($result))
		{
			$ids[] = $row['announcement_id'];
		}
		return $ids;
	}
}
