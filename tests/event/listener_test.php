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

use phpbb\boardannouncements\acp\board_announcements_module;

class listener_test extends \phpbb_database_test_case
{
	/**
	* Define the extensions to be tested
	*
	* @return array vendor/name of extension(s) to test
	*/
	protected static function setup_extensions()
	{
		return array('phpbb/boardannouncements');
	}

	/** @var \phpbb\boardannouncements\event\listener */
	protected $listener;

	/** @var \phpbb_mock_cache */
	protected $cache;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\config\db_text */
	protected $config_text;

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

	/** @var string */
	protected $php_ext;

	/**
	* Get data set fixtures
	*
	* @return \PHPUnit\DbUnit\DataSet\DefaultDataSet|\PHPUnit\DbUnit\DataSet\XmlDataSet
	*/
	public function getDataSet()
	{
		return $this->createXMLDataSet(__DIR__ . '/fixtures/config_text.xml');
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

		// Mock some global classes that may be called during code execution
		$auth = $this->auth = new \phpbb_mock_notifications_auth();
		$cache = $this->cache = new \phpbb_mock_cache;
		$user = new \phpbb_mock_user;
		$user->data['user_form_salt'] = '';
		$user->optionset('viewcensors', false);
		$phpbb_dispatcher = new \phpbb_mock_event_dispatcher();

		// Load/Mock classes required by the event listener class
		$this->config = $config = new \phpbb\config\config(array(
			'board_announcements_enable' => 1,
			'board_announcements_index_only' => 0,
			'board_announcements_dismiss' => 1,
			'board_announcements_expiry' => strtotime('+1 month'),
			'enable_mod_rewrite' => '0',
		));
		$this->config_text = new \phpbb\config\db_text($this->db, 'phpbb_config_text');
		$this->language = new \phpbb\language\language(new \phpbb\language\language_file_loader($phpbb_root_path, $phpEx));
		$this->request = $this->getMockBuilder('\phpbb\request\request')
			->disableOriginalConstructor()
			->getMock();
		$this->template = $this->getMockBuilder('\phpbb\template\template')
			->getMock();
		$this->user = $this->getMockBuilder('\phpbb\user')
			->setConstructorArgs(array(
				$this->language,
				'\phpbb\datetime'
			))
			->getMock();

		$this->user->data['board_announcements_status'] = 1;
		$this->user->page['page_name'] = '';

		$this->controller_helper = $this->getMockBuilder('\phpbb\controller\helper')
			->disableOriginalConstructor()
			->getMock();
		$this->controller_helper->expects(self::atMost(1))
			->method('route')
			->willReturnCallback(function ($route, array $params = array()) {
				return $route . '#' . serialize($params);
			})
		;
		$this->php_ext = $phpEx;
	}

	/**
	* Create our event listener
	*/
	protected function set_listener()
	{
		$this->listener = new \phpbb\boardannouncements\event\listener(
			$this->cache,
			$this->config,
			$this->config_text,
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
		self::assertEquals(array(
			'core.page_header_after',
		), array_keys(\phpbb\boardannouncements\event\listener::getSubscribedEvents()));
	}

	/**
	* Test the display_board_announcements event
	*/
	public function test_display_board_announcements()
	{
		$this->user->data['user_id'] = ANONYMOUS;

		$this->set_listener();

		$this->template->expects(self::once())
			->method('assign_vars')
			->with(array(
				'S_BOARD_ANNOUNCEMENT'			=> true,
				'S_BOARD_ANNOUNCEMENT_DISMISS'	=> true,
				'BOARD_ANNOUNCEMENT' 			=> 'Hello world!',
				'BOARD_ANNOUNCEMENT_BGCOLOR'	=> 'FF0000',
				'U_BOARD_ANNOUNCEMENT_CLOSE'	=> 'phpbb_boardannouncements_controller#' . serialize(array('hash' => generate_link_hash('close_boardannouncement'))),
			));

		$dispatcher = new \phpbb\event\dispatcher();
		$dispatcher->addListener('core.page_header_after', array($this->listener, 'display_board_announcements'));
		$dispatcher->trigger_event('core.page_header_after');
	}

	/**
	 * Data set for test_display_board_announcements_disabled
	 *
	 * @return array
	 */
	public function display_board_announcements_disabled_data()
	{
		return array(
			// test when BA is disabled
			array(1, 1, array(
				'enabled'       => false,
				'index_only'	=> false,
				'expiry'        => '',
				'allowed_users' => board_announcements_module::ALL),
			),
			// test when BA is expired
			array(1, 1, array(
				'enabled'       => true,
				'index_only'	=> false,
				'expiry'        => strtotime('1 minute ago'),
				'allowed_users' => board_announcements_module::ALL),
			),
			// test when BA is disabled by the current user
			array(1, 0, array(
				'enabled'       => true,
				'index_only'	=> false,
				'expiry'        => '',
				'allowed_users' => board_announcements_module::ALL),
			),
			// test when BA is only for guests but user is newly reg.
			array(2, 1, array(
				'enabled'       => true,
				'index_only'	=> false,
				'expiry'        => '',
				'allowed_users' => board_announcements_module::GUESTS),
			),
			// test when BA is only for index.
			array(1, 1, array(
				'enabled'       => true,
				'index_only'	=> true,
				'expiry'        => '',
				'allowed_users' => board_announcements_module::ALL),
			),
		);
	}

	/**
	 * Test the display_board_announcements event when disabled
	 *
	 * @dataProvider display_board_announcements_disabled_data
	 */
	public function test_display_board_announcements_disabled($user_id, $status, $configs)
	{
		// override config and user data
		$this->config['board_announcements_enable'] = $configs['enabled'];
		$this->config['board_announcements_index_only'] = $configs['index_only'];
		$this->config['board_announcements_expiry'] = $configs['expiry'];
		$this->config['board_announcements_users'] = $configs['allowed_users'];
		$this->user->data['board_announcements_status'] = $status;
		$this->user->data['user_id'] = $user_id;

		$this->set_listener();

		// Test that assign_vars is never called
		$this->template->expects(self::never())
			->method('assign_vars');

		$dispatcher = new \phpbb\event\dispatcher();
		$dispatcher->addListener('core.page_header_after', array($this->listener, 'display_board_announcements'));
		$dispatcher->trigger_event('core.page_header_after');
	}
}
