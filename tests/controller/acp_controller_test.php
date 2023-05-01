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
require_once __DIR__ . '/../../../../../includes/functions_display.php';

class acp_controller_test extends \phpbb_test_case
{
	/** @var bool A return value for confirm_box() */
	public static $confirm = true;

	/** @var bool A return value for check_form_key() */
	public static $valid_form = false;

	/** @var \PHPUnit\Framework\MockObject\MockObject|\phpbb\boardannouncements\manager\manager */
	protected $manager;

	/** @var \PHPUnit\Framework\MockObject\MockObject|\phpbb\config\config */
	protected $config;

	/** @var \PHPUnit\Framework\MockObject\MockObject|\phpbb\controller\helper */
	protected $controller_helper;

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
			$this->config,
			$this->controller_helper,
			$this->language,
			$this->log,
			$this->request,
			$this->template,
			$this->user,
			$this->phpbb_root_path,
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
				$this->config,
				$this->controller_helper,
				$this->language,
				$this->log,
				$this->request,
				$this->template,
				$this->user,
				$this->phpbb_root_path,
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

		$rows = [
			[
				'announcement_id'			=> 1,
				'announcement_description'	=> '',
				'announcement_enabled'		=> 1,
				'announcement_timestamp'	=> 734284394,
				'announcement_expiry'		=> 0,
				'announcement_indexonly'	=> 0,
				'announcement_users'		=> 0,
			],
			[
				'announcement_id'			=> 2,
				'announcement_description'	=> '',
				'announcement_enabled'		=> 1,
				'announcement_timestamp'	=> 797442794,
				'announcement_expiry'		=> 0,
				'announcement_indexonly'	=> 0,
				'announcement_users'		=> 0,
			],
			[
				'announcement_id'			=> 3,
				'announcement_description'	=> '',
				'announcement_enabled'		=> 1,
				'announcement_timestamp'	=> 681493994,
				'announcement_expiry'		=> 1644162794,
				'announcement_indexonly'	=> 0,
				'announcement_users'		=> 0,
			],
		];

		$this->manager->expects(self::once())
			->method('get_announcements')
			->willReturn($rows);

		$this->manager->expects(self::once())
			->method('disable_announcement')
			->with(3);

		$this->template->expects(self::exactly(3))
			->method('assign_block_vars');

		$this->template->expects(self::once())
			->method('assign_vars')
			->with([
				'U_ACTION'							=> $this->u_action,
				'U_ACTION_ADD'						=> $this->u_action . '&amp;action=add',
				'BOARD_ANNOUNCEMENTS_ENABLED_ALL'	=> $this->config['board_announcements_enable'],
			]);

		$this->request->expects(self::once())
			->method('variable')
			->with('action', '')
			->willReturn('');

		$controller->mode_manage();
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
				'announcement_indexonly'	=> false,
				'announcement_dismissable'	=> true,
				'announcement_users'		=> \phpbb\boardannouncements\ext::ALL,
				'announcement_timestamp'	=> '',
				'announcement_expiry'		=> '',
			]],
			[0, [
				'announcement_id'			=> 2,
				'announcement_text'			=> 'Announcement sample text 2',
				'announcement_description'	=> 'Announcement 2',
				'announcement_bgcolor'		=> '',
				'announcement_enabled'		=> true,
				'announcement_indexonly'	=> false,
				'announcement_dismissable'	=> true,
				'announcement_users'		=> \phpbb\boardannouncements\ext::ALL,
				'announcement_timestamp'	=> '',
				'announcement_expiry'		=> '',
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

		$this->request
			->expects(self::exactly(2))
			->method('variable')
			->withConsecutive(['action', ''], ['id', 0])
			->willReturnOnConsecutiveCalls('add', $id);

		$this->request
			->expects(self::exactly(2))
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
				'announcement_indexonly'	=> false,
				'announcement_dismissable'	=> true,
				'announcement_users'		=> \phpbb\boardannouncements\ext::ALL,
				'announcement_timestamp'	=> '',
				'announcement_expiry'		=> '',
			]);

		$this->manager->expects($id ? self::once() : self::never())
			->method('get_announcement')
			->willReturn($data);

		$this->template->expects(self::once())
			->method('assign_vars');

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
			[0, ['add', 0, 'Announcement Text 0', 'Announcement Description 0', 'ffffff', true, 0, false, true, '', false, false, false], false, true, true, false], // submit
			[1, ['add', 1, 'Announcement Text 1', 'Announcement Description 1', 'ffffff', true, 0, false, true, '', false, false, false], false, true, true, false], // submit
			[0, ['add', 0, 'Announcement Text 0', 'Announcement Description 0', 'ffffff', true, 0, false, true, '', false, false, false], false, true, false, true], // submit, bad form
			[0, ['add', 0, '', 'Announcement Description 0', 'ffffff', true, 0, false, true, '', false, false, false], false, true, true, true], // submit, bad text
			[0, ['add', 0, 'Announcement Text 0', 'Announcement Description 0', 'ffffff', true, 0, false, true, 'foo', false, false, false], false, true, true, true], // submit, bad expiry
			[0, ['add', 0, 'Announcement Text 0', 'Announcement Description 0', 'ffffff', true, 0, false, true, '', false, false, false], true, false, true, null], // preview
			[0, ['add', 0, 'Announcement Text 0', 'Announcement Description 0', 'ffffff', true, 0, false, true, '', false, false, false], true, false, false, null], // preview, bad form
			[1, ['add', 1, 'Announcement Text 1', 'Announcement Description 1', 'ffffff', true, 0, false, true, '', false, false, false], true, false, true, null], // preview
			[1, ['add', 1, 'Announcement Text 1', 'Announcement Description 1', 'ffffff', true, 0, false, true, '', false, false, false], true, false, false, null], // preview, bad form
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
	 * @return void
	 */
	public function test_action_add_submit($id, $form, $preview, $submit, $valid_form, $errors)
	{
		$controller = $this->get_controller();

		self::$valid_form = $valid_form;

		if ($submit && !$errors)
		{
			$this->setExpectedTriggerError(E_USER_NOTICE, 'BOARD_ANNOUNCEMENTS_UPDATED');
		}

		$this->request
			->expects(self::exactly(13))
			->method('variable')
			->withConsecutive(
				['action', ''],
				['id', 0],
				['board_announcements_text', ''],
				['board_announcements_description', ''],
				['board_announcements_bgcolor', ''],
				['board_announcements_enabled', true],
				['board_announcements_users', 0],
				['board_announcements_index_only', false],
				['board_announcements_dismiss', true],
				['board_announcements_expiry', ''],
				['disable_bbcode', false],
				['disable_magic_url', false],
				['disable_smilies', false]
			)
			->willReturnOnConsecutiveCalls(...$form);

		$this->request
			->expects(self::exactly(2))
			->method('is_set_post')
			->withConsecutive(['submit'], ['preview'])
			->willReturnOnConsecutiveCalls($submit, $preview);

		$this->manager->expects(self::once())
			->method('announcement_columns')
			->willReturn([]);

		$this->manager->expects($id ? self::once() : self::never())
			->method('get_announcement')
			->willReturn([]);

		$this->manager->expects($submit && $id && !$errors ? self::once() : self::never())
			->method('update_announcement');

		$this->manager->expects($submit && !$id && !$errors ? self::once() : self::never())
			->method('save_announcement');

		$this->log->expects($submit && !$errors ? self::once() : self::never())
			->method('add');

		$this->template->expects(($submit && $errors) || $preview ? self::once() : self::never())
			->method('assign_vars');

		$controller->mode_manage();
	}

	/**
	 * Test data for the test_action_delete() function
	 *
	 * @return array Array of test data
	 */
	public function action_delete_data()
	{
		return [
			[1, true, true], // successfully delete an ad
			[2, true, false], // unsuccessfully delete an ad
			[3, false, null], // do not confirm delete an ad
		];
	}

	/**
	 * Test action_delete() method
	 *
	 * @dataProvider action_delete_data
	 */
	public function test_action_delete($id, $confirm_action, $success)
	{
		self::$confirm = $confirm_action;

		$controller = $this->get_controller();

		$this->request
			->expects(self::exactly($confirm_action ? 2 : 4))
			->method('variable')
			->withConsecutive(['action', ''], ['id', 0], ['i', ''], ['mode', ''])
			->willReturnOnConsecutiveCalls('delete', $id, '', '');

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
				$this->setExpectedTriggerError(E_USER_NOTICE, 'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS');
				$this->log->expects(self::once())
					->method('add');
			}
			else
			{
				$this->setExpectedTriggerError(E_USER_WARNING, 'BOARD_ANNOUNCEMENTS_DELETE_ERROR');
			}
			$this->manager->expects(self::once())
				->method('get_announcement_data')
				->with($id, 'announcement_description');
			$this->manager->expects(self::once())
				->method('delete_announcement')
				->with($id)
				->willReturn($success);
		}

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

		$this->request->expects(self::exactly(4))
			->method('variable')
			->withConsecutive(['action', ''], ['id', 0], ['dir', ''], ['hash', ''])
			->willReturnOnConsecutiveCalls('move', $id, $dir, ($valid ? generate_link_hash($dir . $id) : ''));

		$this->request->expects($valid && !$error ? self::once() : self::never())
			->method('is_ajax')
			->willReturn($is_ajax);

		$this->manager->expects($valid ? self::once() : self::never())
			->method('move_announcement')
			->with($id, $dir);

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
			[1],
			[0],
		];
	}

	/**
	 * test action_setting()
	 *
	 * @dataProvider action_settings_data
	 * @param $enable
	 * @return void
	 */
	public function test_action_settings($enable)
	{
		$controller = $this->get_controller();

		$this->setExpectedTriggerError(E_USER_NOTICE, 'CONFIG_UPDATED');

		$this->request->expects(self::exactly(2))
			->method('variable')
			->withConsecutive(['action', ''], ['board_announcements_enable_all', 0])
			->willReturnOnConsecutiveCalls('settings', $enable);

		$this->config->expects(self::once())
			->method('set')
			->with('board_announcements_enable', $enable);

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
