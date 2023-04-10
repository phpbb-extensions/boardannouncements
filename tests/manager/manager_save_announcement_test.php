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
			]],
		];
	}

	/**
	 * Test the save_announcement() method
	 *
	 * @dataProvider data_save_announcement
	 * @param int $expected_id
	 * @param array $data
	 */
	public function test_save_announcement($expected_id, $data)
	{
		$this->manager->save_announcement($data);

		self::assertEquals($expected_id, $this->manager->get_announcement_data($expected_id, 'announcement_id'));
		self::assertEquals($data['announcement_text'], $this->manager->get_announcement_data($expected_id, 'announcement_text'));
		self::assertEquals($data['announcement_description'], $this->manager->get_announcement_data($expected_id, 'announcement_description'));
		self::assertEquals($data['announcement_bgcolor'], $this->manager->get_announcement_data($expected_id, 'announcement_bgcolor'));
		self::assertEquals($data['announcement_enabled'], $this->manager->get_announcement_data($expected_id, 'announcement_enabled'));
		self::assertEquals($data['announcement_indexonly'], $this->manager->get_announcement_data($expected_id, 'announcement_indexonly'));
		self::assertEquals($data['announcement_dismissable'], $this->manager->get_announcement_data($expected_id, 'announcement_dismissable'));
		self::assertEquals($data['announcement_users'], $this->manager->get_announcement_data($expected_id, 'announcement_users'));
		self::assertEquals($data['announcement_timestamp'], $this->manager->get_announcement_data($expected_id, 'announcement_timestamp'));
		self::assertEquals($data['announcement_expiry'], $this->manager->get_announcement_data($expected_id, 'announcement_expiry'));
	}
}
