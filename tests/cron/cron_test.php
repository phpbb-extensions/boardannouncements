<?php
/**
 *
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2023 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\boardannouncements\tests\controller;

class cron_test extends \phpbb_test_case
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\boardannouncements\cron\disable_expired */
	protected $cron_task;

	/** @var \phpbb\boardannouncements\manager\manager|\PHPUnit\Framework\MockObject\MockObject */
	protected $manager;

	protected function setUp(): void
	{
		parent::setUp();

		$this->config = new \phpbb\config\config(['board_announcements_cron_last_run' => 0]);
		$this->manager = $this->getMockBuilder('\phpbb\boardannouncements\manager\manager')
			->disableOriginalConstructor()
			->getMock();

		$this->cron_task = new \phpbb\boardannouncements\cron\disable_expired($this->config, $this->manager);
	}

	public function run_data()
	{
		return [
			[[]],
			[[1]],
			[[2, 3]],
			[[1, 2, 3, 4, 5]],
		];
	}

	/**
	 * Test the cron task runs correctly
	 *
	 * @dataProvider run_data
	 * @param array $expired_set
	 */
	public function test_run($expired_set)
	{
		// Get last run time stored for cron
		$cron_last_run = $this->config['board_announcements_cron_last_run'];

		// Check get_expired_announcements get called as expected
		$this->manager->expects(self::once())
			->method('get_expired_announcements')
			->with('announcement_id')
			->willReturn($expired_set);

		array_walk($expired_set, static function (&$value) {
			$value = [$value];
		});

		// Check disable_announcement get called as expected
		$this->manager->expects(self::exactly(count($expired_set)))
			->method('disable_announcement')
			->withConsecutive(...$expired_set);

		// Run the cron task
		$this->cron_task->run();

		// Now the last run time should be greater than before the test
		self::assertGreaterThan($cron_last_run, $this->config['board_announcements_cron_last_run']);
	}

	/**
	 * Data set for test_should_run
	 *
	 * @return array Array of test data
	 */
	public function should_run_data()
	{
		return [
			[time(), false],
			[strtotime('5 days ago'), false],
			[strtotime('2 weeks ago'), true],
			['', true],
			[0, true],
			[null, true],
		];
	}

	/**
	 * Test cron task should run after 1 week (7 days)
	 *
	 * @dataProvider should_run_data
	 */
	public function test_should_run($time, $expected)
	{
		$this->config['board_announcements_cron_last_run'] = $time;

		self::assertSame($expected, $this->cron_task->should_run());
	}
}
