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

class manager_delete_tracking_test extends manager_base
{
	/**
	 * Data for test_delete_tracking
	 *
	 * @return array
	 */
	public function data_delete_tracking()
	{
		return [
			[2, [2, 4], [4], true],
			[4, [2, 4], [2], true],
			[9, [2, 4], [2, 4], false],
		];
	}

	/**
	 * Test delete_announcement_tracking() method
	 *
	 * @dataProvider data_delete_tracking
	 * @param int $id
	 * @param array $final
	 */
	public function test_delete_tracking($id, $initial, $final, $expected)
	{
		$this->assertEquals($initial, $this->get_tracked_announcements());

		self::assertEquals($expected, $this->manager->delete_announcement_tracking($id));

		self::assertEquals($final, $this->get_tracked_announcements());
	}

	/**
	 * Test delete_tracking() method
	 */
	public function test_delete_tracking_fails()
	{
		$this->expectException(\OutOfBoundsException::class);
		$this->expectExceptionMessage('BOARD_ANNOUNCEMENTS_INVALID_ITEM');
		$this->manager->delete_announcement_tracking(0);
	}

	protected function get_tracked_announcements()
	{
		$ids = [];
		$sql = 'SELECT * FROM phpbb_board_announcements_track';
		$result = $this->db->sql_query($sql);
		while ($row = $this->db->sql_fetchrow($result))
		{
			$ids[] = $row['announcement_id'];
		}
		return $ids;
	}
}
