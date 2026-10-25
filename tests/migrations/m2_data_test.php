<?php
/**
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2026 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 */

namespace phpbb\boardannouncements\tests\migrations;

class m2_data_test extends \phpbb_test_case
{
	public function test_custom_colors_are_migrated_to_custom_tone()
	{
		$db = $this->createMock('\phpbb\db\driver\driver_interface');
		$db_tools = $this->createMock('\phpbb\db\tools\tools_interface');
		$result = new \stdClass();
		$updates = [];

		$db->expects(self::exactly(3))
			->method('sql_query')
			->willReturn($result);
		$db->expects(self::exactly(3))
			->method('sql_fetchrow')
			->with($result)
			->willReturnOnConsecutiveCalls(
				['announcement_id' => 1, 'announcement_enabled' => 1, 'announcement_timestamp' => 100, 'announcement_bgcolor' => 'abcdef'],
				['announcement_id' => 2, 'announcement_enabled' => 0, 'announcement_timestamp' => 200, 'announcement_bgcolor' => ''],
				false
			);
		$db->expects(self::exactly(2))
			->method('sql_build_array')
			->with('UPDATE', self::isType('array'))
			->willReturnCallback(static function ($query, array $data) use (&$updates) {
				$updates[] = $data;
				return 'migration_update';
			});
		$db->expects(self::once())->method('sql_freeresult')->with($result);

		$migration = new \phpbb\boardannouncements\migrations\v20x\m2_data(
			new \phpbb\config\config([]),
			$db,
			$db_tools,
			'',
			'php',
			'phpbb_'
		);
		$migration->migrate_announcements();

		self::assertSame('custom', $updates[0]['announcement_tone']);
		self::assertSame('published', $updates[0]['announcement_state']);
		self::assertSame('info', $updates[1]['announcement_tone']);
		self::assertSame('draft', $updates[1]['announcement_state']);
	}
}
