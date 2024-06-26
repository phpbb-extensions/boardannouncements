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
				'phpbb_board_announcements_track'
			)
		);
	}

	/**
	 * Create our event listener
	 */
	protected function set_listener()
	{
		$this->listener = new \phpbb\boardannouncements\event\listener(
			$this->manager,
			$this->config,
			$this->controller_helper,
			$this->language,
			$this->request,
			$this->template,
			$this->user,
			$this->php_ext
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
		], array_keys(\phpbb\boardannouncements\event\listener::getSubscribedEvents()));
	}

	/**
	 * @return array
	 */
	public function display_board_announcements_data()
	{
		global $user;
		$user = new \phpbb_mock_user();
		$user->data['user_form_salt'] = '';

		return [
			[ANONYMOUS, 'index', true,
				[
					['board_announcements', [
						'BOARD_ANNOUNCEMENT_ID' => 1,
						'S_BOARD_ANNOUNCEMENT_DISMISS' => true,
						'BOARD_ANNOUNCEMENT' => 'Sample Announcement Test Text 1',
						'BOARD_ANNOUNCEMENT_BGCOLOR' => '',
						'U_BOARD_ANNOUNCEMENT_CLOSE' => 'phpbb_boardannouncements_controller#' . serialize(['id' => 1, 'hash' => generate_link_hash('close_boardannouncement')]),
					]],
					['board_announcements', [
						'BOARD_ANNOUNCEMENT_ID' => '3',
						'S_BOARD_ANNOUNCEMENT_DISMISS' => true,
						'BOARD_ANNOUNCEMENT' => 'Sample Announcement Test Text 3',
						'BOARD_ANNOUNCEMENT_BGCOLOR' => '000000',
						'U_BOARD_ANNOUNCEMENT_CLOSE' => 'phpbb_boardannouncements_controller#' . serialize(['id' => 3, 'hash' => generate_link_hash('close_boardannouncement')]),
					]],
				]
			],
			[2, 'index', true,
				[
					['board_announcements', [
						'BOARD_ANNOUNCEMENT_ID' => 1,
						'S_BOARD_ANNOUNCEMENT_DISMISS' => true,
						'BOARD_ANNOUNCEMENT' => 'Sample Announcement Test Text 1',
						'BOARD_ANNOUNCEMENT_BGCOLOR' => '',
						'U_BOARD_ANNOUNCEMENT_CLOSE' => 'phpbb_boardannouncements_controller#' . serialize(['id' => 1, 'hash' => generate_link_hash('close_boardannouncement')]),
					]],
				]
			],
			[3, 'index', true,
				[
					['board_announcements', [
						'BOARD_ANNOUNCEMENT_ID' => 1,
						'S_BOARD_ANNOUNCEMENT_DISMISS' => true,
						'BOARD_ANNOUNCEMENT' => 'Sample Announcement Test Text 1',
						'BOARD_ANNOUNCEMENT_BGCOLOR' => '',
						'U_BOARD_ANNOUNCEMENT_CLOSE' => 'phpbb_boardannouncements_controller#' . serialize(['id' => 1, 'hash' => generate_link_hash('close_boardannouncement')]),
					]],
					['board_announcements', [
						'BOARD_ANNOUNCEMENT_ID' => 2,
						'S_BOARD_ANNOUNCEMENT_DISMISS' => true,
						'BOARD_ANNOUNCEMENT' => 'Sample Announcement Test Text 2',
						'BOARD_ANNOUNCEMENT_BGCOLOR' => 'ffffff',
						'U_BOARD_ANNOUNCEMENT_CLOSE' => 'phpbb_boardannouncements_controller#' . serialize(['id' => 2, 'hash' => generate_link_hash('close_boardannouncement')]),
					]],
				]
			],
			[4, 'viewforum', true,
				[
					['board_announcements', [
						'BOARD_ANNOUNCEMENT_ID' => 2,
						'S_BOARD_ANNOUNCEMENT_DISMISS' => true,
						'BOARD_ANNOUNCEMENT' => 'Sample Announcement Test Text 2',
						'BOARD_ANNOUNCEMENT_BGCOLOR' => 'ffffff',
						'U_BOARD_ANNOUNCEMENT_CLOSE' => 'phpbb_boardannouncements_controller#' . serialize(['id' => 2, 'hash' => generate_link_hash('close_boardannouncement')]),
					]],
				]
			],
			[5, 'viewforum', false, []],
		];
	}

	/**
	 * Test the display_board_announcements event
	 *
	 * @dataProvider display_board_announcements_data
	 * @param $user_id
	 * @param $page
	 * @param $enabled
	 * @param $expected
	 */
	public function test_display_board_announcements($user_id, $page, $enabled, $expected)
	{
		$this->user->data['user_id'] = $user_id;
		$this->user->page['page_name'] = "$page.$this->php_ext";
		$this->config['board_announcements_enable'] = $enabled;

		$this->set_listener();

		$this->template->expects($enabled ? self::atLeastOnce() : self::never())
			->method('assign_block_vars')
			->withConsecutive(...$expected);

		$this->request->expects(self::atMost(2))
			->method('variable')
			->willReturnMap([
				['f', 0, false, \phpbb\request\request_interface::REQUEST, 0],
				['_ba_1', '', false, \phpbb\request\request_interface::COOKIE, ''],
			]);

		$dispatcher = new \phpbb\event\dispatcher();
		$dispatcher->addListener('core.page_header_after', [$this->listener, 'display_board_announcements']);
		$dispatcher->trigger_event('core.page_header_after');
	}
}
