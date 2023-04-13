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

class manager_get_announcement_test extends manager_base
{
	/**
	 * Data for test_get_announcement
	 *
	 * @return array
	 */
	public function data_get_announcement()
	{
		return [
			[0, false],
			[10, false],
			['', false],
			[null, false],
			[1, 'ANNOUNCEMENT 1'],
			[2, 'ANNOUNCEMENT 2'],
			[3, 'ANNOUNCEMENT 3'],
			[4, 'ANNOUNCEMENT 4'],
			[5, 'ANNOUNCEMENT 5'],
		];
	}

	/**
	 * Test the get_announcement() method
	 *
	 * @dataProvider data_get_announcement
	 * @param int $id
	 * @param string $expected
	 */
	public function test_get_announcement($id, $expected)
	{
		$result = $this->manager->get_announcement($id);

		if ($expected !== false)
		{
			self::assertEquals($expected, $result['announcement_description'], 'Assert get_announcement() gets the expected data');
		}
		else
		{
			self::assertEmpty($result);
		}
	}
}
