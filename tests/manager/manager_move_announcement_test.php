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

class manager_move_announcement_test extends manager_base
{
	/**
	 * Data for test_move_announcement
	 *
	 * @return array
	 */
	public function data_move_announcement()
	{
		return [
			[
				1,
				'up', // Move item 1 up (not expected to move)
				[
					['announcement_id' => 1, 'announcement_left_id' => 1],
					['announcement_id' => 2, 'announcement_left_id' => 3],
					['announcement_id' => 3, 'announcement_left_id' => 5],
					['announcement_id' => 4, 'announcement_left_id' => 7],
					['announcement_id' => 5, 'announcement_left_id' => 9],
				],
			],
			[
				1,
				'down', // Move item 1 down
				[
					['announcement_id' => 2, 'announcement_left_id' => 1],
					['announcement_id' => 1, 'announcement_left_id' => 3],
					['announcement_id' => 3, 'announcement_left_id' => 5],
					['announcement_id' => 4, 'announcement_left_id' => 7],
					['announcement_id' => 5, 'announcement_left_id' => 9],
				],
			],
			[
				3,
				'up', // Move item 3 up
				[
					['announcement_id' => 1, 'announcement_left_id' => 1],
					['announcement_id' => 3, 'announcement_left_id' => 3],
					['announcement_id' => 2, 'announcement_left_id' => 5],
					['announcement_id' => 4, 'announcement_left_id' => 7],
					['announcement_id' => 5, 'announcement_left_id' => 9],
				],
			],
			[
				3,
				'down', // Move item 3 down
				[
					['announcement_id' => 1, 'announcement_left_id' => 1],
					['announcement_id' => 2, 'announcement_left_id' => 3],
					['announcement_id' => 4, 'announcement_left_id' => 5],
					['announcement_id' => 3, 'announcement_left_id' => 7],
					['announcement_id' => 5, 'announcement_left_id' => 9],
				],
			],
			[
				5,
				'up', // Move item 5 up
				[
					['announcement_id' => 1, 'announcement_left_id' => 1],
					['announcement_id' => 2, 'announcement_left_id' => 3],
					['announcement_id' => 3, 'announcement_left_id' => 5],
					['announcement_id' => 5, 'announcement_left_id' => 7],
					['announcement_id' => 4, 'announcement_left_id' => 9],
				],
			],
			[
				5,
				'down', // Move item 5 down (not expected to move)
				[
					['announcement_id' => 1, 'announcement_left_id' => 1],
					['announcement_id' => 2, 'announcement_left_id' => 3],
					['announcement_id' => 3, 'announcement_left_id' => 5],
					['announcement_id' => 4, 'announcement_left_id' => 7],
					['announcement_id' => 5, 'announcement_left_id' => 9],
				],
			],
		];
	}

	/**
	 * Test move_announcement() method
	 *
	 * @dataProvider data_move_announcement
	 * @param int $id
	 * @param string $direction
	 * @param array $expected
	 */
	public function test_move_announcement($id, $direction, $expected)
	{
		$this->manager->move_announcement($id, $direction);

		$result = $this->db->sql_query('SELECT announcement_id, announcement_left_id
			FROM phpbb_board_announcements
			ORDER BY announcement_left_id ASC');

		self::assertEquals($expected, $this->db->sql_fetchrowset($result));
		$this->db->sql_freeresult($result);
	}

	/**
	 * Test move_announcement() method
	 */
	public function test_move_announcement_fails()
	{
		$this->expectException(\OutOfBoundsException::class);
		$this->expectExceptionMessage('BOARD_ANNOUNCEMENTS_INVALID_ITEM');
		$this->manager->move_announcement(123, 'up');
	}
}
