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

class manager_save_announcement_test extends manager_base
{
	/**
	 * Data for test_save_announcement
	 *
	 * @return array
	 */
	public function data_save_announcement()
	{
		return [
			[6, [
				'announcement_text'			=> 'Sample Announcement Test Text 6',
				'announcement_description'	=> 'ANNOUNCEMENT 6',
				'announcement_bgcolor'		=> '',
				'announcement_enabled'		=> 1,
				'announcement_indexonly'	=> 1,
				'announcement_dismissable'	=> 1,
				'announcement_users'		=> 0,
				'announcement_timestamp'	=> time(),
				'announcement_expiry'		=> 0,
				'announcement_uid'			=> '',
				'announcement_bitfield'		=> '',
				'announcement_flags'			=> 7,

			]],
		];
	}

	/**
	 * Test the save_announcement() method
	 *
	 * @dataProvider data_save_announcement
	 * @param int $id
	 * @param array $data
	 */
	public function test_save_announcement($id, $data)
	{
		$this->manager->save_announcement($data);

		self::assertEquals($id, $this->manager->get_announcement_data($id, 'announcement_id'));
		foreach ($data as $key => $expected)
		{
			self::assertEquals($expected, $this->manager->get_announcement_data($id, $key));
		}
	}
}
