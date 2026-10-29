<?php
/**
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2026 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 */

namespace phpbb\boardannouncements\tests\service;

use phpbb\boardannouncements\ext;
use phpbb\boardannouncements\service\visibility;
use phpbb\request\request_interface;

class visibility_test extends \phpbb_test_case
{
	protected $auth;
	protected $config;
	protected $request;
	protected $user;
	protected $manager;
	protected $visibility;

	protected function setUp(): void
	{
		parent::setUp();
		$this->auth = $this->createMock('\phpbb\auth\auth');
		$this->config = new \phpbb\config\config(['cookie_name' => 'phpbb']);
		$this->request = $this->createMock('\phpbb\request\request');
		$this->user = $this->getMockBuilder('\phpbb\user')->disableOriginalConstructor()->getMock();
		$this->user->data = ['user_id' => 2, 'is_registered' => true];
		$this->user->method('get_passworded_forums')->willReturn([]);
		$this->manager = $this->getMockBuilder('\phpbb\boardannouncements\manager\manager')->disableOriginalConstructor()->getMock();
		$this->manager->method('decode_json')->willReturnCallback(static function ($value) {
			return json_decode($value, true);
		});
		$this->visibility = new visibility($this->auth, $this->config, $this->request, $this->user, $this->manager);
	}

	public function test_lifecycle_boundaries()
	{
		$row = $this->announcement();
		self::assertTrue($this->visibility->is_active($row, 100));
		$row['announcement_start'] = 101;
		self::assertFalse($this->visibility->is_active($row, 100));
		$row['announcement_start'] = 0;
		$row['announcement_expiry'] = 100;
		self::assertFalse($this->visibility->is_active($row, 100));
		$row['announcement_expiry'] = 0;
		$row['announcement_state'] = ext::STATE_DRAFT;
		self::assertFalse($this->visibility->is_active($row, 100));
	}

	public function test_group_and_descendant_targeting()
	{
		$row = $this->announcement();
		$row['announcement_users'] = ext::GROUPS;
		$row['announcement_locations'] = '[10]';
		$row['announcement_include_children'] = 1;
		$this->manager->expects(self::once())->method('user_matches_groups')->with(1, 2)->willReturn(true);
		$this->manager->expects(self::once())->method('location_matches_descendant')->with(11, [10])->willReturn(true);
		$this->auth->expects(self::once())->method('acl_get')->with('f_read', 11)->willReturn(true);
		self::assertTrue($this->visibility->is_visible($row, 11, false));
	}

	public function test_guest_cookie_reset_generation()
	{
		$row = $this->announcement();
		$this->request->expects(self::exactly(2))
			->method('variable')
			->with('phpbb_ba_1', 0, false, request_interface::COOKIE)
			->willReturnOnConsecutiveCalls(3, 2);
		self::assertTrue($this->visibility->is_dismissed($row));
		self::assertFalse($this->visibility->is_dismissed($row));
	}

	public function test_visibility_event_can_override_result()
	{
		$dispatcher = new \phpbb\event\dispatcher();
		$dispatcher->addListener('phpbb.boardannouncements.visibility', static function ($event) {
			$event['visible'] = true;
		});
		$visibility = new visibility($this->auth, $this->config, $this->request, $this->user, $this->manager, $dispatcher);
		$row = $this->announcement();
		$row['announcement_enabled'] = 0;

		self::assertTrue($visibility->is_visible($row, 0, false));
	}

	protected function announcement()
	{
		return [
			'announcement_id' => 1,
			'announcement_enabled' => 1,
			'announcement_state' => ext::STATE_PUBLISHED,
			'announcement_start' => 0,
			'announcement_expiry' => 0,
			'announcement_users' => ext::ALL,
			'announcement_locations' => '',
			'announcement_include_children' => 0,
			'announcement_revision' => 3,
		];
	}
}
