<?php
/**
 *
 * Board Announcements extension for the phpBB Forum Software package.
 * (Thanks/credit to nickvergessen for desigining these tests)
 *
 * @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\boardannouncements\tests\event;

class listener_test extends \phpbb_database_test_case
{
	/**
	 * Define the extensions to be tested
	 *
	 * @return array vendor/name of extension(s) to test
	 */
	protected static function setup_extensions()
	{
		return ['phpbb/boardannouncements'];
	}

	/** @var \phpbb\boardannouncements\event\listener */
	protected $listener;

	/** @var \phpbb_mock_notifications_auth */
	protected $auth;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \PHPUnit\Framework\MockObject\MockObject|\phpbb\controller\helper */
	protected $controller_helper;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\language\language */
	protected $language;

	/** @var \PHPUnit\Framework\MockObject\MockObject|\phpbb\request\request */
	protected $request;

	/** @var \PHPUnit\Framework\MockObject\MockObject|\phpbb\template\template */
	protected $template;

	/** @var \PHPUnit\Framework\MockObject\MockObject|\phpbb\user */
	protected $user;

	/** @var \phpbb\boardannouncements\manager\manager */
	protected $manager;

	/** @var string */
	protected $php_ext;

	/**
	 * Get data set fixtures
	 *
	 * @return \PHPUnit\DbUnit\DataSet\DefaultDataSet|\PHPUnit\DbUnit\DataSet\XmlDataSet
	 */
	public function getDataSet()
	{
		return $this->createXMLDataSet(__DIR__ . '/../fixtures/board_announcements.xml');
	}

	/**
	 * Setup test environment
	 */
	protected function setUp(): void
	{
		parent::setUp();

		global $auth, $cache, $config, $user, $phpbb_dispatcher, $phpbb_root_path, $phpEx;

		// Load the database class
		$this->db = $this->new_dbal();
		$this->php_ext = $phpEx;

		// Mock some global classes that may be called during code execution
		$auth = $this->auth = new \phpbb_mock_notifications_auth();
		$cache = $this->cache = new \phpbb_mock_cache;
		$user = new \phpbb_mock_user;
		$user->data['user_form_salt'] = '';
		$user->optionset('viewcensors', false);
		$phpbb_dispatcher = new \phpbb_mock_event_dispatcher();

		// Load/Mock classes required by the event listener class
		$this->config = $config = new \phpbb\config\config([
			'enable_mod_rewrite' => '0',
		]);
		$this->language = new \phpbb\language\language(new \phpbb\language\language_file_loader($phpbb_root_path, $phpEx));
		$this->request = $this->getMockBuilder('\phpbb\request\request')
			->disableOriginalConstructor()
			->getMock();
		$this->template = $this->getMockBuilder('\phpbb\template\template')
			->getMock();
		$this->user = $this->getMockBuilder('\phpbb\user')
			->setConstructorArgs([
				$this->language,
				'\phpbb\datetime'
			])
			->getMock();
		$this->user->method('get_passworded_forums')->willReturn([]);

		$this->user->data['board_announcements_status'] = 1;

		$this->controller_helper = $this->getMockBuilder('\phpbb\controller\helper')
			->disableOriginalConstructor()
			->getMock();
		$this->controller_helper->method('route')
			->willReturnCallback(function ($route, array $params = []) {
				return $route . '#' . serialize($params);
			});

		$this->manager = new \phpbb\boardannouncements\manager\manager(
			new \phpbb\boardannouncements\manager\nestedset(
				$this->db,
				new \phpbb\lock\db('boardannouncements.table_lock.board_announcements_table', $this->config, $this->db),
				'phpbb_board_announcements',
				'phpbb_board_announcement_groups',
				'phpbb_user_group',
				'phpbb_forums'
			)
		);
	}

	/**
	 * Create our event listener
	 */
	protected function set_listener()
	{
		$visibility = new \phpbb\boardannouncements\service\visibility(
			$this->auth,
			$this->config,
			$this->request,
			$this->user,
			$this->manager
		);
		$this->listener = new \phpbb\boardannouncements\event\listener(
			$this->manager,
			$this->config,
			$this->controller_helper,
			$this->language,
			$this->request,
			$this->template,
			$this->user,
			$this->php_ext,
			$visibility
		);
	}

	/**
	 * Test the event listener is constructed correctly
	 */
	public function test_construct()
	{
		$this->set_listener();
		self::assertInstanceOf('\Symfony\Component\EventDispatcher\EventSubscriberInterface', $this->listener);
	}

	/**
	 * Test the event listener is subscribing events
	 */
	public function test_getSubscribedEvents()
	{
		self::assertEquals([
			'core.page_header_after',
			'core.posting_modify_row_data',
		], array_keys(\phpbb\boardannouncements\event\listener::getSubscribedEvents()));
	}

	/**
	 * @return array
	 */
	public function display_board_announcements_data()
	{
		return [
			[ANONYMOUS, false, 'index', true, [1, 3]],
			[2, true, 'index', true, [1, 2]],
			[3, true, 'index', true, [1, 2]],
			[3, false, 'index', true, [1, 3]],
			[4, true, 'viewforum', true, [2]],
			[5, true, 'viewforum', false, []],
		];
	}

	/**
	 * Test the display_board_announcements event
	 *
	 * @dataProvider display_board_announcements_data
	 * @param $user_id
	 * @param $is_registered
	 * @param $page
	 * @param $enabled
	 * @param $expected
	 */
	public function test_display_board_announcements($user_id, $is_registered, $page, $enabled, $expected)
	{
		$this->user->data['user_id'] = $user_id;
		$this->user->data['is_registered'] = $is_registered;
		$this->user->page['page_name'] = "$page.$this->php_ext";
		$this->config['board_announcements_enable'] = $enabled;

		$this->set_listener();

		$actual_ids = [];
		$this->template->expects($enabled ? self::exactly(count($expected)) : self::never())
			->method('assign_block_vars')
			->willReturnCallback(static function ($block, $data) use (&$actual_ids) {
				self::assertSame('board_announcements', $block);
				self::assertArrayHasKey('BOARD_ANNOUNCEMENT_TITLE', $data);
				$actual_ids[] = (int) $data['BOARD_ANNOUNCEMENT_ID'];
			});

		$this->request->method('variable')
			->willReturnCallback(static function ($name, $default) {
				return $name === 'f' ? 0 : $default;
			});

		$dispatcher = new \phpbb\event\dispatcher();
		$dispatcher->addListener('core.page_header_after', [$this->listener, 'display_board_announcements']);
		$dispatcher->trigger_event('core.page_header_after', [
			'item' => 'forum',
			'item_id' => $page === 'viewforum' ? 2 : 0,
		]);
		self::assertSame($expected, $actual_ids);
	}

	public function test_display_board_announcements_without_registered_state()
	{
		$this->user->data['user_id'] = ANONYMOUS;
		unset($this->user->data['is_registered']);
		$this->user->page['page_name'] = "index.$this->php_ext";
		$this->config['board_announcements_enable'] = true;

		$this->set_listener();

		$this->template->expects(self::exactly(2))
			->method('assign_block_vars');

		$this->listener->display_board_announcements(new \phpbb\event\data([
			'item' => 'forum',
			'item_id' => 0,
		]));
	}

	public function test_query_forum_id_fallback()
	{
		$this->db->sql_query("UPDATE phpbb_board_announcements
			SET announcement_enabled = CASE WHEN announcement_id = 1 THEN 1 ELSE 0 END,
				announcement_locations = CASE WHEN announcement_id = 1 THEN '[2]' ELSE announcement_locations END");

		$this->user->data['user_id'] = 2;
		$this->user->data['is_registered'] = true;
		$this->user->page['page_name'] = "viewforum.$this->php_ext";
		$this->config['board_announcements_enable'] = true;

		$this->set_listener();

		$this->template->expects(self::once())
			->method('assign_block_vars')
			->with('board_announcements', self::callback(static function ($data) {
				return (int) $data['BOARD_ANNOUNCEMENT_ID'] === 1;
			}));
		$this->request->expects(self::exactly(2))
			->method('variable')
			->willReturnMap([
				['f', 0, false, \phpbb\request\request_interface::REQUEST, 2],
				['_ba_1', 0, false, \phpbb\request\request_interface::COOKIE, 0],
			]);

		$dispatcher = new \phpbb\event\dispatcher();
		$dispatcher->addListener('core.page_header_after', [$this->listener, 'display_board_announcements']);
		$dispatcher->trigger_event('core.page_header_after', [
			'item' => 'forum',
			'item_id' => 0,
		]);
	}

	/**
	 * @dataProvider posting_location_data
	 */
	public function test_posting_location_fallback_and_precedence($item_id, $query_forum_id, $expected)
	{
		$this->user->page['page_name'] = "posting.$this->php_ext";
		$this->request->method('variable')
			->willReturnMap([
				['f', 0, false, \phpbb\request\request_interface::REQUEST, $query_forum_id],
			]);

		$this->set_listener();
		$this->listener->set_posting_location(new \phpbb\event\data([
			'forum_id' => 1,
		]));

		$method = new \ReflectionMethod($this->listener, 'get_current_location');
		$method->setAccessible(true);
		$location = $method->invoke($this->listener, new \phpbb\event\data([
			'item' => 'forum',
			'item_id' => $item_id,
		]));

		self::assertSame($expected, $location);
	}

	public function posting_location_data()
	{
		return [
			'posting forum fallback' => [0, 0, 1],
			'query forum takes precedence' => [0, 2, 2],
			'header forum takes precedence' => [3, 2, 3],
		];
	}

	public function test_query_forum_id_does_not_scope_non_forum_event()
	{
		$this->db->sql_query("UPDATE phpbb_board_announcements
			SET announcement_enabled = CASE WHEN announcement_id = 1 THEN 1 ELSE 0 END,
				announcement_locations = CASE WHEN announcement_id = 1 THEN '[2]' ELSE announcement_locations END");

		$this->user->data['user_id'] = 2;
		$this->user->data['is_registered'] = true;
		$this->user->page['page_name'] = "memberlist.$this->php_ext";
		$this->config['board_announcements_enable'] = true;

		$this->set_listener();

		$this->template->expects(self::never())
			->method('assign_block_vars');
		$this->request->expects(self::never())
			->method('variable');

		$dispatcher = new \phpbb\event\dispatcher();
		$dispatcher->addListener('core.page_header_after', [$this->listener, 'display_board_announcements']);
		$dispatcher->trigger_event('core.page_header_after', [
			'item' => 'user',
			'item_id' => 0,
		]);
	}
}
