<?php
/**
 *
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2023 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\boardannouncements\controller;

require_once __DIR__ . '/../../../../../includes/functions_acp.php';

class acp_controller_test extends \phpbb_test_case
{
	/** @var bool A return value for confirm_box() */
	public static $confirm = true;

	/** @var bool A return value for check_form_key() */
	public static $valid_form = false;

	/** @var array A return value for make_forum_select() */
	public static $forum_options = [];

	/** @var \PHPUnit\Framework\MockObject\MockObject|\phpbb\boardannouncements\manager\manager */
	protected $manager;

	/** @var \PHPUnit\Framework\MockObject\MockObject|\phpbb\db\driver\driver_interface */
	protected $db;

	/** @var string */
	protected $sql_layer = 'mysqli';

	/** @var \PHPUnit\Framework\MockObject\MockObject|\phpbb\config\config */
	protected $config;

	/** @var \PHPUnit\Framework\MockObject\MockObject|\phpbb\controller\helper */
	protected $controller_helper;

	/** @var \PHPUnit\Framework\MockObject\MockObject|\phpbb\group\helper */
	protected $group_helper;

	/** @var \phpbb\language\language */
	protected $language;

	/** @var \PHPUnit\Framework\MockObject\MockObject|\phpbb\log\log */
	protected $log;

	/** @var \PHPUnit\Framework\MockObject\MockObject|\phpbb\request\request */
	protected $request;

	/** @var \PHPUnit\Framework\MockObject\MockObject|\phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var string root_path */
	protected $phpbb_root_path;

	/** @var string php_ext */
	protected $php_ext;

	/** @var string Custom form action */
	protected $u_action;

	/**
	 * Setup test environment
	 */
	protected function setUp(): void
	{
		parent::setUp();
		self::$confirm = true;
		self::$valid_form = false;
		self::$forum_options = [];

		global $cache, $phpbb_container, $phpbb_dispatcher, $user, $phpbb_root_path, $phpEx;

		// This is needed to set up the s9e text formatter services
		$this->get_test_case_helpers()->set_s9e_services($phpbb_container);

		// Load/Mock classes required by the controller class
		$cache = new \phpbb_mock_cache;
		$lang_loader = new \phpbb\language\language_file_loader($phpbb_root_path, $phpEx);
		$this->language = new \phpbb\language\language($lang_loader);
		$this->config = $this->getMockBuilder('\phpbb\config\config')
			->disableOriginalConstructor()
			->getMock();
		$this->controller_helper = $this->getMockBuilder('\phpbb\controller\helper')
			->disableOriginalConstructor()
			->getMock();
		$this->group_helper = $this->getMockBuilder('\phpbb\group\helper')
			->disableOriginalConstructor()
			->getMock();
		$this->template = $this->getMockBuilder('\phpbb\template\template')
			->disableOriginalConstructor()
			->getMock();
		$this->log = $this->getMockBuilder('\phpbb\log\log')
			->disableOriginalConstructor()
			->getMock();
		$this->request = $this->getMockBuilder('\phpbb\request\request')
			->disableOriginalConstructor()
			->getMock();
		$this->user = $user = new \phpbb\user($this->language, '\phpbb\datetime');
		$user->data['user_id'] = 2;
		$user->data['user_form_salt'] = '';
		$user->data['user_timezone'] = 'UTC';
		$user->data['user_options'] = 230271;
		$user->optionset('viewcensors', true);
		$user->optionset('viewflash', true);
		$user->optionset('viewimg', true);
		$user->optionset('viewsmilies', true);

		$this->root_path = $phpbb_root_path;
		$this->php_ext = $phpEx;

		$this->u_action = $phpbb_root_path . 'adm/index.php?i=-phpbb-boardannouncements-acp-main_module&mode=settings';

		// Global variables
		$phpbb_dispatcher = new \phpbb_mock_event_dispatcher();

		$this->manager = $this->getMockBuilder('\phpbb\boardannouncements\manager\manager')
			->disableOriginalConstructor()
			->getMock();
		$this->db = $this->createMock('\phpbb\db\driver\driver_interface');
		$this->db->method('get_sql_layer')
			->willReturnCallback(function () {
				return $this->sql_layer;
			});
	}

	/**
	 * Create our controller
	 *
	 * @return \phpbb\boardannouncements\controller\acp_controller
	 */
	protected function get_controller()
	{
		$controller = new \phpbb\boardannouncements\controller\acp_controller(
			$this->manager,
			$this->db,
			$this->config,
			$this->group_helper,
			$this->controller_helper,
			$this->language,
			$this->log,
			$this->request,
			$this->template,
			$this->user,
			$this->root_path,
			$this->php_ext
		);
		$controller->set_page_url($this->u_action);

		return $controller;
	}

	/**
	 * Data for test_mode_manage
	 *
	 * @return array Array of test data
	 */
	public function data_mode_manage()
	{
		return [
			['add', 'action_add'],
			['delete', 'action_delete'],
			['move', 'action_move'],
			['settings', 'action_settings'],
			['', 'list_announcements'],
			[null, 'list_announcements'],
		];
	}

	/**
	 * Test mode_manage()
	 *
	 * @dataProvider data_mode_manage
	 */
	public function test_mode_manage($action, $expected)
	{
		$controller = $this->getMockBuilder('\phpbb\boardannouncements\controller\acp_controller')
			->setMethods(['action_add', 'action_delete', 'action_move', 'action_settings', 'list_announcements'])
			->setConstructorArgs([
				$this->manager,
				$this->db,
				$this->config,
				$this->group_helper,
				$this->controller_helper,
				$this->language,
				$this->log,
				$this->request,
				$this->template,
				$this->user,
				$this->root_path,
				$this->php_ext
			])
			->getMock();

		$this->request->expects(self::once())
			->method('variable')
			->willReturn($action);

		$controller->expects(self::once())
			->method($expected);

		$controller->mode_manage();
	}

	/**
	 * Test list_announcements()
	 *
	 * @return void
	 */
	public function test_list_announcements()
	{
		$controller = $this->get_controller();
		$this->user->data['user_timezone'] = 'Asia/Tokyo';

		$rows = [
			[
				'announcement_id'			=> 1,
				'announcement_description'	=> '',
				'announcement_enabled'		=> 1,
				'announcement_timestamp'	=> 734284394,
				'announcement_expiry'		=> 0,
				'announcement_locations'	=> '',
				'announcement_users'		=> 0,
			],
			[
				'announcement_id'			=> 2,
				'announcement_description'	=> '',
				'announcement_enabled'		=> 1,
				'announcement_timestamp'	=> 797442794,
				'announcement_expiry'		=> 0,
				'announcement_locations'	=> '[-1,1]',
				'announcement_users'		=> 0,
			],
			[
				'announcement_id'			=> 3,
				'announcement_description'	=> '',
				'announcement_enabled'		=> 1,
				'announcement_timestamp'	=> 681493994,
				'announcement_expiry'		=> 1644162794,
				'announcement_locations'	=> '[]',
				'announcement_users'		=> 0,
			],
		];

		$this->manager->expects(self::once())
			->method('get_announcements')
			->willReturn($rows);

		$this->template->expects(self::exactly(3))
			->method('assign_block_vars')
			->withConsecutive(
				['announcements', self::callback(function ($data) use ($rows) {
					return $data['DESCRIPTION'] === 'BOARD_ANNOUNCEMENTS_UNTITLED'
						&& $data['CREATED_DATE'] === $this->user->format_date($rows[0]['announcement_timestamp'], \phpbb\boardannouncements\ext::DATE_FORMAT)
						&& $data['EXPIRY_DATE'] === ''
						&& $data['S_MOVE_UP_DISABLED']
						&& !$data['S_MOVE_DOWN_DISABLED'];
				})],
				['announcements', self::callback(function ($data) use ($rows) {
					return $data['CREATED_DATE'] === $this->user->format_date($rows[1]['announcement_timestamp'], \phpbb\boardannouncements\ext::DATE_FORMAT)
						&& $data['EXPIRY_DATE'] === ''
						&& !$data['S_MOVE_UP_DISABLED']
						&& !$data['S_MOVE_DOWN_DISABLED'];
				})],
				['announcements', self::callback(function ($data) use ($rows) {
					return $data['CREATED_DATE'] === $this->user->format_date($rows[2]['announcement_timestamp'], \phpbb\boardannouncements\ext::DATE_FORMAT)
						&& $data['EXPIRY_DATE'] === $this->user->format_date($rows[2]['announcement_expiry'], \phpbb\boardannouncements\ext::DATE_FORMAT)
						&& !$data['S_MOVE_UP_DISABLED']
						&& $data['S_MOVE_DOWN_DISABLED'];
				})]
			);

		$this->template->expects(self::once())
			->method('assign_vars')
			->with(self::callback(function ($data) {
				return $data['U_ACTION'] === $this->u_action
					&& $data['S_STATUS_FILTER'] === 'all'
					&& $data['S_SEARCH_QUERY'] === ''
					&& !$data['S_FILTERS_ACTIVE'];
			}));

		$this->request->expects(self::exactly(3))
			->method('variable')
			->willReturnMap([
				['action', '', false, \phpbb\request\request_interface::REQUEST, ''],
				['status', 'all', false, \phpbb\request\request_interface::REQUEST, 'all'],
				['q', '', true, \phpbb\request\request_interface::REQUEST, ''],
			]);

		$controller->mode_manage();
	}

	/**
	 * Search and status filters work together and lock ordering in a partial list.
	 */
	public function test_list_announcements_filters_message_text()
	{
		$controller = $this->get_controller();
		$rows = [
			['announcement_id' => 1, 'announcement_description' => 'First', 'announcement_text' => 'Nothing here', 'announcement_enabled' => true, 'announcement_state' => \phpbb\boardannouncements\ext::STATE_PUBLISHED],
			['announcement_id' => 2, 'announcement_description' => 'Second', 'announcement_text' => 'Hidden Needle in message', 'announcement_enabled' => true, 'announcement_state' => \phpbb\boardannouncements\ext::STATE_PUBLISHED],
			['announcement_id' => 3, 'announcement_description' => 'Third', 'announcement_text' => 'Needle', 'announcement_state' => \phpbb\boardannouncements\ext::STATE_DRAFT],
		];

		$this->request->method('variable')
			->willReturnCallback(static function ($name, $default = null) {
				return [
					'action' => '',
					'status' => 'active',
					'q' => 'Needle',
				][$name] ?? $default;
			});
		$this->manager->expects(self::once())
			->method('get_announcements')
			->willReturn($rows);
		$this->template->expects(self::once())
			->method('assign_block_vars')
			->with('announcements', self::callback(static function ($data) {
				return $data['ID'] === 2
					&& $data['DESCRIPTION'] === 'Second'
					&& $data['S_MOVE_UP_DISABLED']
					&& $data['S_MOVE_DOWN_DISABLED'];
			}));
		$this->template->expects(self::once())
			->method('assign_vars')
			->with(self::callback(static function ($data) {
				return $data['S_STATUS_FILTER'] === 'active'
					&& $data['S_SEARCH_QUERY'] === 'Needle'
					&& $data['S_FILTERS_ACTIVE'];
			}));

		$controller->mode_manage();
	}

	public function test_list_announcements_does_not_search_generated_untitled_label()
	{
		$controller = $this->get_controller();
		$rows = [
			[
				'announcement_id' => 1,
				'announcement_description' => '',
				'announcement_title' => '',
				'announcement_text' => 'Migrated announcement text',
				'announcement_enabled' => true,
				'announcement_state' => \phpbb\boardannouncements\ext::STATE_PUBLISHED,
			],
			[
				'announcement_id' => 2,
				'announcement_description' => 'Named announcement',
				'announcement_title' => '',
				'announcement_text' => 'Other text',
				'announcement_enabled' => true,
				'announcement_state' => \phpbb\boardannouncements\ext::STATE_PUBLISHED,
			],
		];
		$this->request->method('variable')->willReturnCallback(static function ($name, $default = null) {
			return ['action' => '', 'status' => 'all', 'q' => 'untitled'][$name] ?? $default;
		});
		$this->manager->expects(self::once())->method('get_announcements')->willReturn($rows);
		$this->template->expects(self::never())->method('assign_block_vars');

		$controller->mode_manage();
	}

	/**
	 * @dataProvider list_label_data
	 */
	public function test_list_label(array $row, $expected)
	{
		$controller = $this->get_controller();
		$method = new \ReflectionMethod($controller, 'get_list_label');
		$method->setAccessible(true);

		self::assertSame($expected, $method->invoke($controller, array_replace([
			'announcement_description' => '',
			'announcement_title' => '',
			'announcement_text' => '',
			'announcement_uid' => '',
		], $row)));
	}

	public function list_label_data()
	{
		return [
			'description is preserved' => [
				['announcement_description' => 'Administrator summary', 'announcement_text' => 'Ignored message'],
				'Administrator summary',
			],
			'short message' => [
				['announcement_text' => 'Short message'],
				'Short message',
			],
			'long formatted message' => [
				['announcement_text' => '[b:abcde]Maintenance tonight at 10 PM[/b:abcde]', 'announcement_uid' => 'abcde'],
				'Maintenance tonight …',
			],
			'title takes priority over message' => [
				['announcement_title' => 'Public title', 'announcement_text' => 'Ignored message'],
				'Public title',
			],
			'empty readable message uses fallback' => [
				[],
				'BOARD_ANNOUNCEMENTS_UNTITLED',
			],
		];
	}

	public function test_list_announcements_rejects_unknown_status_filter()
	{
		$controller = $this->get_controller();
		$this->request->method('variable')->willReturnCallback(static function ($name, $default = null) {
			return ['action' => '', 'status' => 'unknown', 'q' => ''][$name] ?? $default;
		});
		$this->manager->expects(self::once())->method('get_announcements')->willReturn([]);
		$this->template->expects(self::once())->method('assign_vars')->with(self::callback(static function ($data) {
			return $data['S_STATUS_FILTER'] === 'all' && !$data['S_FILTERS_ACTIVE'];
		}));

		$controller->mode_manage();
	}

	/**
	 * Stored special-group identifiers are resolved through phpBB's group API.
	 */
	public function test_get_group_options_uses_group_helper()
	{
		$controller = $this->get_controller();
		$result = new \stdClass();
		$this->db->expects(self::once())->method('sql_query')->willReturn($result);
		$this->db->expects(self::exactly(2))->method('sql_fetchrow')->with($result)->willReturnOnConsecutiveCalls([
			'group_id' => 5,
			'group_name' => 'REGISTERED',
		], false);
		$this->db->expects(self::once())->method('sql_freeresult')->with($result);
		$this->group_helper->expects(self::once())
			->method('get_name')
			->with('REGISTERED')
			->willReturn('Registered users');

		$method = new \ReflectionMethod($controller, 'get_group_options');
		$method->setAccessible(true);
		self::assertSame([[
			'ID' => 5,
			'NAME' => 'Registered users',
			'S_SELECTED' => true,
		]], $method->invoke($controller, [5]));
	}

	public function test_new_announcement_defaults_to_draft()
	{
		$controller = $this->get_controller();
		$method = new \ReflectionMethod($controller, 'announcement_defaults');
		$method->setAccessible(true);
		$defaults = $method->invoke($controller);

		self::assertSame(\phpbb\boardannouncements\ext::STATE_DRAFT, $defaults['announcement_state']);
		self::assertFalse($defaults['announcement_enabled']);
	}

	/**
	 * @dataProvider location_mode_data
	 */
	public function test_get_location_mode($locations, $expected)
	{
		$this->manager->method('decode_json')->willReturnCallback(static function ($value) {
			return json_decode($value, true);
		});
		$controller = $this->get_controller();
		$method = new \ReflectionMethod($controller, 'get_location_mode');
		$method->setAccessible(true);

		self::assertSame($expected, $method->invoke($controller, $locations));
	}

	public function test_get_location_options_preserves_hierarchy_and_selection()
	{
		self::$forum_options = [
			1 => ['padding' => '', 'selected' => false, 'forum_id' => 1, 'forum_name' => 'Parent'],
			2 => ['padding' => '&nbsp; &nbsp;', 'selected' => true, 'forum_id' => 2, 'forum_name' => 'Child'],
		];
		$this->manager->method('decode_json')->with('[2]')->willReturn([2]);
		$controller = $this->get_controller();
		$method = new \ReflectionMethod($controller, 'get_location_options');
		$method->setAccessible(true);

		$options = $method->invoke($controller, '[2]');

		self::assertSame(0, $options[1]['depth']);
		self::assertSame(1, $options[2]['depth']);
		self::assertTrue($options[2]['selected']);
		self::assertSame(\phpbb\boardannouncements\ext::INDEX_ONLY, $options[-1]['forum_id']);
		self::$forum_options = [];
	}

	/**
	 * @dataProvider status_data
	 */
	public function test_status_is_derived_from_lifecycle(array $row, $expected)
	{
		$controller = $this->get_controller();
		$method = new \ReflectionMethod($controller, 'get_status');
		$method->setAccessible(true);

		self::assertSame($expected, $method->invoke($controller, $row));
	}

	public function status_data()
	{
		return [
			'archived' => [['announcement_state' => \phpbb\boardannouncements\ext::STATE_ARCHIVED, 'announcement_enabled' => 0], 'archived'],
			'draft state' => [['announcement_state' => \phpbb\boardannouncements\ext::STATE_DRAFT, 'announcement_enabled' => 1], 'draft'],
			'disabled' => [['announcement_state' => \phpbb\boardannouncements\ext::STATE_PUBLISHED, 'announcement_enabled' => 0], 'draft'],
			'scheduled' => [['announcement_state' => \phpbb\boardannouncements\ext::STATE_PUBLISHED, 'announcement_enabled' => 1, 'announcement_start' => time() + 3600], 'scheduled'],
			'expired' => [['announcement_state' => \phpbb\boardannouncements\ext::STATE_PUBLISHED, 'announcement_enabled' => 1, 'announcement_expiry' => time() - 3600], 'expired'],
			'active' => [['announcement_state' => \phpbb\boardannouncements\ext::STATE_PUBLISHED, 'announcement_enabled' => 1], 'active'],
		];
	}

	/**
	 * @dataProvider contrast_color_data
	 */
	public function test_contrast_color($color, $expected)
	{
		$controller = $this->get_controller();
		$method = new \ReflectionMethod($controller, 'contrast_color');
		$method->setAccessible(true);

		self::assertSame($expected, $method->invoke($controller, $color));
	}

	public function contrast_color_data()
	{
		return [
			'invalid' => ['fff', ''],
			'black' => ['000000', 'ffffff'],
			'white' => ['ffffff', '111111'],
		];
	}

	public function test_parse_date_reports_invalid_input()
	{
		$controller = $this->get_controller();
		$method = new \ReflectionMethod($controller, 'parse_date');
		$method->setAccessible(true);
		$errors = [];

		self::assertSame(0, $method->invokeArgs($controller, ['invalid', &$errors, 'BOARD_ANNOUNCEMENTS_START_INVALID']));
		self::assertSame([$this->language->lang('BOARD_ANNOUNCEMENTS_START_INVALID')], $errors);
	}

	public function location_mode_data()
	{
		return [
			'everywhere' => ['', 'everywhere'],
			'board index' => ['[-1]', 'index'],
			'forum' => ['[2]', 'selected'],
			'board index and forum' => ['[-1,2]', 'selected'],
		];
	}

	/**
	 * Test data for test_action_add
	 *
	 * @return array
	 */
	public function action_add_data()
	{
		return [
			[1, [
				'announcement_id'			=> 1,
				'announcement_text'			=> 'Announcement sample text 1',
				'announcement_description'	=> 'Announcement 1',
				'announcement_bgcolor'		=> '',
				'announcement_enabled'		=> true,
				'announcement_locations'	=> '',
				'announcement_dismissable'	=> true,
				'announcement_users'		=> \phpbb\boardannouncements\ext::ALL,
				'announcement_timestamp'	=> '',
				'announcement_expiry'		=> '',
				'announcement_uid'			=> '',
				'announcement_bitfield'		=> '',
				'announcement_flags'			=> 7,
			]],
			[2, []],
			[0, [
				'announcement_id'			=> 2,
				'announcement_text'			=> 'Announcement sample text 2',
				'announcement_description'	=> 'Announcement 2',
				'announcement_bgcolor'		=> '',
				'announcement_enabled'		=> true,
				'announcement_locations'	=> '',
				'announcement_dismissable'	=> true,
				'announcement_users'		=> \phpbb\boardannouncements\ext::ALL,
				'announcement_timestamp'	=> '',
				'announcement_expiry'		=> '',
				'announcement_uid'			=> '',
				'announcement_bitfield'		=> '',
				'announcement_flags'			=> 7,
			]],
		];
	}

	/**
	 * Test action_add()
	 * Just test that it shows the form without hitting submit or preview yet
	 *
	 * @dataProvider action_add_data
	 * @param $id
	 * @param $data
	 * @return void
	 */
	public function test_action_add($id, $data)
	{
		$controller = $this->get_controller();
		$missing_announcement = $id && !$data;

		if ($missing_announcement)
		{
			$this->setExpectedTriggerError(E_USER_WARNING, 'BOARD_ANNOUNCEMENTS_INVALID_ITEM');
			$this->log->expects(self::never())
				->method('add');
		}

		$this->request
			->expects(self::exactly(2))
			->method('variable')
			->withConsecutive(['action', ''], ['id', 0])
			->willReturnOnConsecutiveCalls('add', $id);

		$this->request
			->expects($missing_announcement ? self::never() : self::exactly(2))
			->method('is_set_post')
			->withConsecutive(['submit'], ['preview'])
			->willReturnOnConsecutiveCalls(false, false);

		$this->manager->expects(self::once())
			->method('announcement_columns')
			->willReturn([
				'announcement_text'			=> '',
				'announcement_description'	=> '',
				'announcement_bgcolor'		=> '',
				'announcement_enabled'		=> true,
				'announcement_locations'	=> '',
				'announcement_dismissable'	=> true,
				'announcement_users'		=> \phpbb\boardannouncements\ext::ALL,
				'announcement_timestamp'	=> 0,
				'announcement_expiry'		=> 0,
				'announcement_uid'			=> '',
				'announcement_bitfield'		=> '',
				'announcement_flags'			=> 7,

			]);

		$this->manager->expects($id ? self::once() : self::never())
			->method('get_announcement')
			->willReturn($data);

		$this->template->expects($missing_announcement ? self::never() : self::once())
			->method('assign_vars');

		$controller->mode_manage();
	}

	public function test_edit_form_recognizes_legacy_custom_color()
	{
		$controller = $this->get_controller();
		$this->request->method('variable')->willReturnCallback(static function ($name, $default = null) {
			return ['action' => 'add', 'id' => 1][$name] ?? $default;
		});
		$this->request->method('is_set_post')->willReturn(false);
		$this->manager->method('announcement_columns')->willReturn([]);
		$this->manager->expects(self::once())->method('get_announcement')->with(1)->willReturn([
			'announcement_id' => 1,
			'announcement_bgcolor' => 'abcdef',
		]);
		$this->manager->expects(self::once())->method('get_announcement_groups')->with(1)->willReturn([]);
		$this->template->expects(self::once())->method('assign_vars')->with(self::callback(static function ($data) {
			return $data['BOARD_ANNOUNCEMENTS_TONE'] === 'custom'
				&& $data['BOARD_ANNOUNCEMENTS_BGCOLOR'] === 'abcdef'
				&& $data['BOARD_ANNOUNCEMENTS_COLOR_PICKER'] === '#abcdef';
		}));

		$controller->mode_manage();
	}

	public function test_action_add_reports_invalid_v2_fields()
	{
		self::$valid_form = true;
		$controller = $this->get_controller();
		$values = [
			'action' => 'add',
			'id' => 0,
			'board_announcements_text' => 'Message',
			'board_announcements_description' => 'Description',
			'board_announcements_title' => str_repeat('x', 256),
			'board_announcements_tone' => 'invalid',
			'board_announcements_bgcolor' => 'abcdef',
			'board_announcements_state' => 'invalid',
			'board_announcements_users' => \phpbb\boardannouncements\ext::GROUPS,
			'board_announcements_groups' => [0],
			'board_announcements_location_mode' => 'everywhere',
			'board_announcements_locations' => [],
			'board_announcements_dismiss' => true,
			'board_announcements_start' => '',
			'board_announcements_expiry' => '',
		];
		$this->request->method('variable')->willReturnCallback(static function ($name, $default = null) use ($values) {
			return array_key_exists($name, $values) ? $values[$name] : $default;
		});
		$this->request->method('is_set_post')->willReturnCallback(static function ($name) {
			return $name === 'submit';
		});
		$this->manager->method('announcement_columns')->willReturn([]);
		$this->manager->method('decode_json')->willReturn([]);
		$this->manager->expects(self::never())->method('save_announcement');
		$this->template->expects(self::once())->method('assign_vars')->with(self::callback(function ($data) {
			return strpos($data['ERRORS'], $this->language->lang('BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG')) !== false
				&& strpos($data['ERRORS'], $this->language->lang('BOARD_ANNOUNCEMENTS_TONE_INVALID')) !== false
				&& strpos($data['ERRORS'], $this->language->lang('BOARD_ANNOUNCEMENTS_STATE_INVALID')) !== false
				&& strpos($data['ERRORS'], $this->language->lang('BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED')) !== false
				&& $data['BOARD_ANNOUNCEMENTS_BGCOLOR'] === '';
		}));

		$controller->mode_manage();
	}

	/**
	 * Test data for test_action_add
	 *
	 * @return array
	 */
	public function action_add_submit_data()
	{
		return [
			[0, ['add', 0, 'Announcement Text 0', 'Announcement Description 0', 'ABCDEF', true, 0, [''], true, '', false, false, false], false, true, true, false], // submit
			[0, ['add', 0, 'Announcement Text 0', 'Hash-prefixed color', '#ABCDEF', true, 0, [''], true, '', false, false, false], false, true, true, false], // submit, normalize hash-prefixed color
			[0, ['add', 0, 'Announcement Text 0', 'Selected locations', 'ffffff', true, 0, [0, -1, 2], true, '', false, false, false], false, true, true, false], // submit, discard location sentinel
			[0, ['add', 0, 'Announcement Text 0', 'Board index', 'ffffff', true, 0, [-1], true, '', false, false, false], false, true, true, false], // submit, board index mode
			[0, ['add', 0, 'Announcement Text 0', 'No selected location', 'ffffff', true, 0, [], true, '', false, false, false, 'selected'], false, true, true, true], // submit, selected mode requires a location
			[0, ['add', 0, 'Announcement Text 0', 'Invalid location mode', 'ffffff', true, 0, [], true, '', false, false, false, 'invalid'], false, true, true, true], // submit, invalid location mode
			[0, ['add', 0, 'Announcement Text 0', 'Emoji 😀 description', 'ffffff', true, 0, [''], true, '', false, false, false], false, true, true, false], // submit, emoji encoded for storage
			[0, ['add', 0, 'Announcement Text 0', 'Unicode 😀 中文 Кириллица', 'ffffff', true, 0, [''], true, '', false, false, false], false, true, true, false, true, 'mssqlnative'], // submit, all Unicode encoded for MSSQL
			[1, ['add', 1, 'Announcement Text 1', 'Announcement Description 1', 'ffffff', true, 0, [''], true, '', false, false, false], false, true, true, false], // submit
			[1, ['add', 1, 'Announcement Text 1', 'Announcement Description 1', 'ffffff', true, 0, [''], true, '', false, false, false], false, true, true, false, false], // submit, announcement deleted before update
			[0, ['add', 0, 'Announcement Text 0', 'Announcement Description 0', 'ffffff', true, 0, [''], true, '', false, false, false], false, true, false, true], // submit, bad form
			[0, ['add', 0, '', 'Announcement Description 0', 'ffffff', true, 0, [''], true, '', false, false, false], false, true, true, true], // submit, bad text
			[0, ['add', 0, 'Announcement Text 0', str_repeat('a', 256), 'ffffff', true, 0, [''], true, '', false, false, false], false, true, true, true], // submit, description too long
			[0, ['add', 0, 'Announcement Text 0', str_repeat('a', 186) . str_repeat('&amp;', 14), 'ffffff', true, 0, [''], true, '', false, false, false], false, true, true, true], // submit, escaped description exceeds stored length
			[0, ['add', 0, 'Announcement Text 0', 'Announcement Description 0', 'fffff', true, 0, [''], true, '', false, false, false], false, true, true, true], // submit, background color too short
			[0, ['add', 0, 'Announcement Text 0', 'Announcement Description 0', 'gggggg', true, 0, [''], true, '', false, false, false], false, true, true, true], // submit, background color is not hexadecimal
			[0, ['add', 0, 'Announcement Text 0', 'Announcement Description 0', 'ffffff', true, 0, [''], true, 'foo', false, false, false], false, true, true, true], // submit, bad expiry
			[0, ['add', 0, 'Announcement Text 0', 'Announcement Description 0', 'ffffff', true, 0, [''], true, '', false, false, false], true, false, true, null], // preview
			[0, ['add', 0, 'Announcement Text 0', 'Announcement Description 0', 'ffffff', true, 0, [''], true, '', false, false, false], true, false, false, null], // preview, bad form
			[1, ['add', 1, 'Announcement Text 1', 'Announcement Description 1', 'ffffff', true, 0, [''], true, '', false, false, false], true, false, true, null], // preview
			[1, ['add', 1, 'Announcement Text 1', 'Announcement Description 1', 'ffffff', true, 0, [''], true, '', false, false, false], true, false, false, null], // preview, bad form
		];
	}

	/**
	 * Test action_add()
	 * Submit or preview data test
	 *
	 * @dataProvider action_add_submit_data
	 * @param $id
	 * @param $form
	 * @param $preview
	 * @param $submit
	 * @param $valid_form
	 * @param $errors
	 * @param bool $update_success
	 * @param string $sql_layer
	 * @return void
	 */
	public function test_action_add_submit($id, $form, $preview, $submit, $valid_form, $errors, $update_success = true, $sql_layer = 'mysqli')
	{
		$this->sql_layer = $sql_layer;
		$controller = $this->get_controller();
		$failed_update = $submit && !$errors && $id && !$update_success;
		$successful_submit = $submit && !$errors && !$failed_update;
		$selected_locations = array_values(array_filter(array_map('intval', $form[7])));
		$location_mode = $form[13] ?? (!$selected_locations ? 'everywhere' : (count($selected_locations) === 1 && $selected_locations[0] === \phpbb\boardannouncements\ext::INDEX_ONLY ? 'index' : 'selected'));
		$expected_locations = json_encode($location_mode === 'index' ? [\phpbb\boardannouncements\ext::INDEX_ONLY] : ($location_mode === 'selected' ? $selected_locations : []));
		$expected_description = strpos($sql_layer, 'mssql') === 0 ? utf8_encode_ncr($form[3]) : utf8_encode_ucr($form[3]);
		$creation_timestamp = 1234567890;
		$expected_bgcolor = ltrim($form[4], '#');
		$has_expected_data = static function ($data) use ($expected_locations, $expected_description, $expected_bgcolor, $creation_timestamp)
		{
			return $data['announcement_locations'] === $expected_locations
				&& $data['announcement_description'] === $expected_description
				&& $data['announcement_bgcolor'] === $expected_bgcolor
				&& $data['announcement_timestamp'] > $creation_timestamp;
		};

		self::$valid_form = $valid_form;

		if ($failed_update)
		{
			$this->setExpectedTriggerError(E_USER_WARNING, 'BOARD_ANNOUNCEMENTS_INVALID_ITEM');
		}
		else if ($successful_submit)
		{
			$this->setExpectedTriggerError(E_USER_NOTICE, 'BOARD_ANNOUNCEMENTS_UPDATED');
		}

		$values = [
			'action' => $form[0],
			'id' => $form[1],
			'board_announcements_text' => $form[2],
			'board_announcements_description' => $form[3],
			'board_announcements_title' => '',
			'board_announcements_bgcolor' => $form[4],
			'board_announcements_state' => $form[5] ? \phpbb\boardannouncements\ext::STATE_PUBLISHED : \phpbb\boardannouncements\ext::STATE_DRAFT,
			'board_announcements_tone' => $form[4] === '' ? 'info' : 'custom',
			'board_announcements_users' => $form[6],
			'board_announcements_groups' => [10],
			'board_announcements_locations' => $form[7],
			'board_announcements_location_mode' => $location_mode,
			'board_announcements_include_children' => false,
			'board_announcements_dismiss' => $form[8],
			'board_announcements_start' => '',
			'board_announcements_expiry' => $form[9],
			'disable_bbcode' => $form[10],
			'disable_magic_url' => $form[11],
			'disable_smilies' => $form[12],
		];
		$this->request->method('variable')
			->willReturnCallback(static function ($name, $default = null) use ($values) {
				return array_key_exists($name, $values) ? $values[$name] : $default;
			});

		$this->request
			->expects(self::exactly(2))
			->method('is_set_post')
			->withConsecutive(['submit'], ['preview'])
			->willReturnOnConsecutiveCalls($submit, $preview);

		$this->manager->expects($submit && !$errors ? self::never() : self::once())
			->method('decode_json')
			->willReturn([]);

		$this->manager->expects(self::once())
			->method('announcement_columns')
			->willReturn([]);

		$this->manager->expects($id ? self::once() : self::never())
			->method('get_announcement')
			->willReturn([
				'announcement_uid'		=> '',
				'announcement_bitfield'	=> '',
				'announcement_flags'		=> 7,
				'announcement_timestamp'	=> $creation_timestamp,
			]);

		$update = $this->manager->expects($submit && $id && !$errors ? self::once() : self::never())
			->method('update_announcement')
			->willReturn($update_success);
		if ($submit && $id && !$errors)
		{
			$update->with($id, self::callback($has_expected_data));
		}

		$save = $this->manager->expects($submit && !$id && !$errors ? self::once() : self::never())
			->method('save_announcement');
		if ($submit && !$id && !$errors)
		{
			$save->with(self::callback($has_expected_data));
		}

		$groups = $this->manager->expects($successful_submit ? self::once() : self::never())
			->method('set_announcement_groups');
		if ($successful_submit)
		{
			$groups->with(self::anything(), []);
		}

		$this->log->expects($successful_submit ? self::once() : self::never())
			->method('add');

		$this->template->expects(($submit && $errors) || $preview ? self::once() : self::never())
			->method('assign_vars');

		$controller->mode_manage();
	}

	/**
	 * @dataProvider archive_action_data
	 */
	public function test_archive_action($valid_hash, $updated)
	{
		$controller = $this->get_controller();
		$this->setExpectedTriggerError($valid_hash && $updated ? E_USER_NOTICE : E_USER_WARNING, $valid_hash && $updated ? 'BOARD_ANNOUNCEMENTS_ARCHIVED' : 'The submitted form was invalid. Try submitting again.');
		$this->request->method('variable')->willReturnCallback(static function ($name, $default = null) use ($valid_hash) {
			return [
				'action' => 'archive',
				'id' => 7,
				'hash' => $valid_hash ? generate_link_hash('archive7') : '',
			][$name] ?? $default;
		});
		$update = $this->manager->expects($valid_hash ? self::once() : self::never())
			->method('update_announcement')
			->willReturn($updated);
		if ($valid_hash)
		{
			$update->with(7, self::callback(static function ($data) {
				return $data['announcement_state'] === \phpbb\boardannouncements\ext::STATE_ARCHIVED
					&& $data['announcement_enabled'] === 0
					&& $data['announcement_updated_by'] === 2
					&& $data['announcement_updated_at'] > 0;
			}));
		}

		$controller->mode_manage();
	}

	public function archive_action_data()
	{
		return [
			'success' => [true, true],
			'unknown announcement' => [true, false],
			'invalid hash' => [false, false],
		];
	}

	/**
	 * @dataProvider reset_action_data
	 */
	public function test_reset_action($valid_hash, $reset)
	{
		$controller = $this->get_controller();
		$this->setExpectedTriggerError($valid_hash && $reset ? E_USER_NOTICE : E_USER_WARNING, $valid_hash && $reset ? 'BOARD_ANNOUNCEMENTS_SHOWN_AGAIN' : 'The submitted form was invalid. Try submitting again.');
		$this->request->method('variable')->willReturnCallback(static function ($name, $default = null) use ($valid_hash) {
			return [
				'action' => 'reset',
				'id' => 7,
				'hash' => $valid_hash ? generate_link_hash('reset7') : '',
			][$name] ?? $default;
		});
		$this->manager->expects($valid_hash ? self::once() : self::never())
			->method('show_announcement_again')
			->with(7)
			->willReturn($reset);

		$controller->mode_manage();
	}

	public function reset_action_data()
	{
		return [
			'success' => [true, true],
			'unknown announcement' => [true, false],
			'invalid hash' => [false, false],
		];
	}

	public function test_duplicate_action_creates_draft_with_same_groups()
	{
		$controller = $this->get_controller();
		$this->setExpectedTriggerError(E_USER_NOTICE, 'BOARD_ANNOUNCEMENTS_DUPLICATED');
		$this->request->method('variable')->willReturnCallback(static function ($name, $default = null) {
			return [
				'action' => 'duplicate',
				'id' => 7,
				'hash' => generate_link_hash('duplicate7'),
			][$name] ?? $default;
		});
		$this->manager->expects(self::once())->method('get_announcement')->with(7)->willReturn([
			'announcement_id' => 7,
			'announcement_description' => 'Maintenance',
			'announcement_state' => \phpbb\boardannouncements\ext::STATE_PUBLISHED,
			'announcement_enabled' => 1,
			'announcement_revision' => 9,
		]);
		$this->manager->expects(self::once())->method('save_announcement')
			->with(self::callback(static function ($data) {
				return !isset($data['announcement_id'])
					&& $data['announcement_description'] === 'BOARD_ANNOUNCEMENTS_COPY_OF'
					&& $data['announcement_state'] === \phpbb\boardannouncements\ext::STATE_DRAFT
					&& $data['announcement_enabled'] === 0
					&& $data['announcement_revision'] === 1
					&& $data['announcement_created_by'] === 2
					&& $data['announcement_updated_by'] === 2;
			}))
			->willReturn(['announcement_id' => 12]);
		$this->manager->expects(self::once())->method('get_announcement_groups')->with(7)->willReturn([4, 8]);
		$this->manager->expects(self::once())->method('set_announcement_groups')->with(12, [4, 8]);

		$controller->mode_manage();
	}

	public function test_duplicate_action_rejects_unknown_announcement()
	{
		$controller = $this->get_controller();
		$this->setExpectedTriggerError(E_USER_WARNING, 'The submitted form was invalid. Try submitting again.');
		$this->request->method('variable')->willReturnCallback(static function ($name, $default = null) {
			return [
				'action' => 'duplicate',
				'id' => 99,
				'hash' => generate_link_hash('duplicate99'),
			][$name] ?? $default;
		});
		$this->manager->expects(self::once())->method('get_announcement')->with(99)->willReturn([]);
		$this->manager->expects(self::never())->method('save_announcement');

		$controller->mode_manage();
	}

	/**
	 * @dataProvider bulk_state_action_data
	 */
	public function test_bulk_state_action($action, $expected_state, $expected_enabled)
	{
		self::$valid_form = true;
		$controller = $this->get_controller();
		$this->setExpectedTriggerError(E_USER_NOTICE, 'BOARD_ANNOUNCEMENTS_BULK_UPDATED');
		$this->request->method('variable')->willReturnCallback(static function ($name, $default = null) use ($action) {
			return [
				'action' => 'bulk',
				'announcement_ids' => [3, 3, 0, 5],
				'bulk_action' => $action,
			][$name] ?? $default;
		});
		$this->manager->expects(self::exactly(2))->method('update_announcement')
			->withConsecutive(
				[3, self::callback(static function ($data) use ($expected_state, $expected_enabled) {
					return $data['announcement_state'] === $expected_state && $data['announcement_enabled'] === $expected_enabled && $data['announcement_updated_by'] === 2;
				})],
				[5, self::callback(static function ($data) use ($expected_state, $expected_enabled) {
					return $data['announcement_state'] === $expected_state && $data['announcement_enabled'] === $expected_enabled && $data['announcement_updated_by'] === 2;
				})]
			);

		$controller->mode_manage();
	}

	public function bulk_state_action_data()
	{
		return [
			'publish' => ['publish', \phpbb\boardannouncements\ext::STATE_PUBLISHED, true],
			'draft' => ['draft', \phpbb\boardannouncements\ext::STATE_DRAFT, false],
			'archive' => ['archive', \phpbb\boardannouncements\ext::STATE_ARCHIVED, false],
		];
	}

	public function test_bulk_delete_logs_only_successful_deletions()
	{
		self::$valid_form = true;
		self::$confirm = true;
		$controller = $this->get_controller();
		$this->setExpectedTriggerError(E_USER_NOTICE, 'BOARD_ANNOUNCEMENTS_BULK_UPDATED');
		$this->request->method('variable')->willReturnCallback(static function ($name, $default = null) {
			return ['action' => 'bulk', 'announcement_ids' => [3, 5], 'bulk_action' => 'delete'][$name] ?? $default;
		});
		$this->manager->expects(self::exactly(2))->method('get_announcement_data')
			->withConsecutive([3, 'announcement_description'], [5, 'announcement_description'])
			->willReturnOnConsecutiveCalls('First', 'Second');
		$this->manager->expects(self::exactly(2))->method('delete_announcement')
			->withConsecutive([3], [5])
			->willReturnOnConsecutiveCalls(true, false);
		$this->log->expects(self::once())->method('add')->with(
			'admin', 2, self::anything(), 'BOARD_ANNOUNCEMENTS_DELETED_LOG', self::anything(), ['First']
		);

		$controller->mode_manage();
	}

	public function test_bulk_delete_waits_for_confirmation()
	{
		self::$valid_form = true;
		self::$confirm = false;
		$controller = $this->get_controller();
		$this->request->method('variable')->willReturnCallback(static function ($name, $default = null) {
			return ['action' => 'bulk', 'announcement_ids' => [3], 'bulk_action' => 'delete'][$name] ?? $default;
		});
		$this->manager->expects(self::never())->method('delete_announcement');

		$controller->mode_manage();
	}

	/**
	 * @dataProvider invalid_bulk_action_data
	 */
	public function test_bulk_action_rejects_invalid_request($valid_form, array $ids, $action)
	{
		self::$valid_form = $valid_form;
		$controller = $this->get_controller();
		$this->setExpectedTriggerError(E_USER_WARNING, 'The submitted form was invalid. Try submitting again.');
		$this->request->method('variable')->willReturnCallback(static function ($name, $default = null) use ($ids, $action) {
			return ['action' => 'bulk', 'announcement_ids' => $ids, 'bulk_action' => $action][$name] ?? $default;
		});
		$this->manager->expects(self::never())->method('update_announcement');
		$this->manager->expects(self::never())->method('delete_announcement');

		$controller->mode_manage();
	}

	public function invalid_bulk_action_data()
	{
		return [
			'invalid form' => [false, [1], 'publish'],
			'empty selection' => [true, [0], 'publish'],
			'unknown action' => [true, [1], 'unknown'],
		];
	}

	/**
	 * Test data for the test_action_delete() function
	 *
	 * @return array Array of test data
	 */
	public function action_delete_data()
	{
		return [
			[1, true, true, false, false], // successfully delete an announcement
			[2, true, false, false, false], // unsuccessfully delete an announcement
			[3, false, null, false, false], // do not confirm deletion
			[4, true, false, true, false], // announcement deleted before confirmation
			[5, true, true, false, true], // successfully delete via ajax
		];
	}

	/**
	 * Test action_delete() method
	 *
	 * @dataProvider action_delete_data
	 * @param int $id
	 * @param bool $confirm_action
	 * @param bool|null $success
	 * @param bool $throws
	 * @param bool $is_ajax
	 */
	public function test_action_delete($id, $confirm_action, $success, $throws, $is_ajax)
	{
		self::$confirm = $confirm_action;

		$controller = $this->get_controller();

		$this->request->method('variable')
			->willReturnCallback(static function ($name, $default = null) use ($id) {
				return ['action' => 'delete', 'id' => $id, 'status' => 'all', 'q' => ''][$name] ?? $default;
			});

		if (!$confirm_action)
		{
			$this->manager->expects(self::never())
				->method('delete_announcement');
			// called in list_announcements()
			$this->manager->expects(self::atMost(1))
				->method('get_announcements')
				->willReturn([]);
		}
		else
		{
			if ($success)
			{
				if ($is_ajax)
				{
					$this->setExpectedTriggerError(E_WARNING);
				}
				else
				{
					$this->setExpectedTriggerError(E_USER_NOTICE, 'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS');
				}
				$this->log->expects(self::once())
					->method('add');
			}
			else
			{
				$this->setExpectedTriggerError(E_USER_WARNING, 'BOARD_ANNOUNCEMENTS_DELETE_ERROR');
				$this->log->expects(self::never())
					->method('add');
			}
			$this->manager->expects(self::once())
				->method('get_announcement_data')
				->with($id, 'announcement_description');
			$delete = $this->manager->expects(self::once())
				->method('delete_announcement')
				->with($id);

			if ($throws)
			{
				$delete->willThrowException(new \OutOfBoundsException('BOARD_ANNOUNCEMENTS_INVALID_ITEM'));
			}
			else
			{
				$delete->willReturn($success);
			}
		}

		$this->request->expects($success ? self::once() : self::never())
			->method('is_ajax')
			->willReturn($is_ajax);

		$controller->mode_manage();
	}

	/**
	 * Data for test_action_move
	 *
	 * @return array
	 */
	public function action_move_data()
	{
		return [
			[0, 'up', true, true, false], // move will error
			[1, 'up', true, false, false], // successful move up
			[2, 'down', true, false, false], // successful move down
			[3, 'down', false, false, false], // invalid hash error
			[4, 'down', true, false, true], // successful move down via ajax
		];
	}

	/**
	 * Test action_move()
	 *
	 * @dataProvider action_move_data
	 * @param $id
	 * @param $dir
	 * @param $valid
	 * @param $error
	 * @param $is_ajax
	 * @return void
	 */
	public function test_action_move($id, $dir, $valid, $error, $is_ajax)
	{
		$controller = $this->get_controller();

		if (!$valid)
		{
			$this->setExpectedTriggerError(E_USER_WARNING, 'The submitted form was invalid. Try submitting again.');
		}

		if ($error)
		{
			$this->expectException('\OutOfBoundsException');
			$this->expectExceptionMessage('EXCEPTION MESSAGE');
			$this->setExpectedTriggerError(E_USER_WARNING, 'Test exception message');
			$this->manager->expects(self::once())
				->method('move_announcement')
				->willThrowException(new \OutOfBoundsException('Test exception message'));
		}

		if ($is_ajax)
		{
			// Handle trigger_error() output called from json_response
			$this->setExpectedTriggerError(E_WARNING);
		}

		$this->request->method('variable')
			->willReturnCallback(static function ($name, $default = null) use ($id, $dir, $valid) {
				return [
					'action' => 'move',
					'id' => $id,
					'dir' => $dir,
					'hash' => $valid ? generate_link_hash($dir . $id) : '',
					'status' => 'all',
					'q' => '',
				][$name] ?? $default;
			});

		$this->request->expects($valid && !$error ? self::once() : self::never())
			->method('is_ajax')
			->willReturn($is_ajax);

		$this->manager->expects($valid ? self::once() : self::never())
			->method('move_announcement')
			->with($id, $dir);

		$this->manager->expects($valid && !$error && !$is_ajax ? self::once() : self::never())
			->method('get_announcements')
			->willReturn([]);

		$controller->mode_manage();
	}

	/**
	 * Data for test_action_settings
	 *
	 * @return array
	 */
	public function action_settings_data()
	{
		return [
			[1, true],
			[0, true],
			[1, false],
			[0, false],
		];
	}

	/**
	 * test action_setting()
	 *
	 * @dataProvider action_settings_data
	 * @param $enable
	 * @param $valid_form
	 * @return void
	 */
	public function test_action_settings($enable, $valid_form)
	{
		self::$valid_form = $valid_form;

		$controller = $this->get_controller();

		if (!$valid_form)
		{
			$this->setExpectedTriggerError(E_USER_WARNING, 'The submitted form was invalid. Try submitting again.');
			$this->request->expects(self::once())
				->method('variable')
				->withConsecutive(['action', ''])
				->willReturnOnConsecutiveCalls('settings');
		}
		else
		{
			$this->setExpectedTriggerError(E_USER_NOTICE, 'CONFIG_UPDATED');
			$this->request->expects(self::exactly(2))
				->method('variable')
				->withConsecutive(['action', ''], ['board_announcements_enable_all', 0])
				->willReturnOnConsecutiveCalls('settings', $enable);
			$this->config->expects(self::once())
				->method('set')
				->with('board_announcements_enable', $enable);
		}

		$controller->mode_manage();
	}
}

/**
 * Mock confirm_box()
 * Note: use the same namespace as the acp_controller
 *
 * @return bool
 */
function confirm_box()
{
	return \phpbb\boardannouncements\controller\acp_controller_test::$confirm;
}

/**
 * Mock adm_back_link()
 * Note: use the same namespace as the acp_controller
 */
function adm_back_link()
{
}

/**
 * Mock add_form_key()
 * Note: use the same namespace as the acp_controller
 */
function add_form_key()
{
}

/**
 * Mock check_form_key()
 * Note: use the same namespace as the admin_input
 *
 * @return bool
 */
function check_form_key()
{
	return \phpbb\boardannouncements\controller\acp_controller_test::$valid_form;
}

/**
 * Mock display_custom_bbcodes()
 * Note: use the same namespace as the acp_controller
 */
function display_custom_bbcodes()
{
}

/**
 * Mock display_custom_bbcodes()
 * Note: use the same namespace as the acp_controller
 */
function build_select()
{
}

/**
 * Mock make_forum_select()
 * Note: use the same namespace as the acp_controller
 */
function make_forum_select()
{
	return \phpbb\boardannouncements\controller\acp_controller_test::$forum_options;
}
