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

class manager_update_announcement_test extends manager_base
{
	/**
	 * Data for test_update_announcement
	 *
	 * @return array
	 */
	public function data_update_announcement()
	{
		return [
			[1, [
				'announcement_text'			=> 'Updated Sample Announcement Test Text 1',
				'announcement_description'	=> 'ANNOUNCEMENT 1 Updated',
				'announcement_bgcolor'		=> 'cccccc',
				'announcement_enabled'		=> 0,
				'announcement_locations'	=> json_encode(''),
				'announcement_dismissable'	=> 0,
				'announcement_users'		=> 1,
				'announcement_timestamp'	=> time(),
				'announcement_expiry'		=> 1,
				'announcement_uid'			=> '',
				'announcement_bitfield'		=> '',
				'announcement_flags'			=> 7,
			]],
			[9, []],
		];
	}

	/**
	 * Test the update_announcement() method
	 *
	 * @dataProvider data_update_announcement
	 * @param int $id
	 * @param array $data
	 */
	public function test_update_announcement($id, $data)
	{
		if (empty($data))
		{
			$data['announcement_text'] = '';
			self::assertFalse($this->manager->update_announcement($id, $data));
		}
		else
		{
			$this->db->sql_query('INSERT INTO phpbb_board_announcements_track ' . $this->db->sql_build_array('INSERT', [
				'announcement_id' => $id,
				'user_id' => 3,
			]));

			self::assertTrue($this->manager->update_announcement($id, $data));
			foreach ($data as $key => $expected)
			{
				self::assertEquals($expected, $this->manager->get_announcement_data($id, $key));
			}

			$sql = 'SELECT COUNT(*) AS tracked
				FROM phpbb_board_announcements_track
				WHERE announcement_id = ' . (int) $id . '
					AND user_id = 3';
			$result = $this->db->sql_query($sql);
			self::assertSame(0, (int) $this->db->sql_fetchfield('tracked'));
			$this->db->sql_freeresult($result);
		}
	}

	/**
	 * Test the update_announcement() method
	 */
	public function test_update_announcement_fails()
	{
		$this->expectException(\OutOfBoundsException::class);
		$this->expectExceptionMessage('BOARD_ANNOUNCEMENTS_INVALID_ITEM');
		$this->manager->update_announcement(0, []);
	}
}
