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

require_once dirname(__FILE__) . '/../../../../../includes/functions.php';
require_once dirname(__FILE__) . '/../../../../../includes/functions_content.php';
require_once dirname(__FILE__) . '/../../../../../includes/utf/utf_tools.php';

class event_listener_test extends \phpbb_database_test_case
{
	/**
	* Define the extensions to be tested
	*
	* @return array vendor/name of extension(s) to test
	* @access static
	*/
	static protected function setup_extensions()
	{
		return array('phpbb/boardannouncements');
	}

	/** @var \phpbb\boardannouncements\event\listener */
	protected $listener;

	/**
	* Get data set fixtures
	*
	* @return PHPUnit_Extensions_Database_DataSet_XmlDataSet
	* @access public
	*/
	public function getDataSet()
	{
		return $this->createXMLDataSet(dirname(__FILE__) . '/fixtures/config_text.xml');
	}

	/**
	* Setup test environment
	*
	* @access public
	*/
	public function setUp()
	{
		parent::setUp();

		global $cache, $user, $phpbb_dispatcher, $phpbb_root_path, $phpEx;

		// Load the database class
		$this->db = $this->new_dbal();

		// Mock some global classes that may be called during code execution
		$cache = new \phpbb_mock_cache;
		$user = new \phpbb_mock_user;
		$user->optionset('viewcensors', false);
		$phpbb_dispatcher = new \phpbb_mock_event_dispatcher();

		// Load/Mock classes required by the event listener class
		$this->config = new \phpbb\config\config(array(
			'board_announcements_enable' => 1,
			'board_announcements_dismiss' => 1, 
			'enable_mod_rewrite' => '0',
		));
		$this->config_text = new \phpbb\config\db_text($this->db, 'phpbb_config_text');
		$this->request = $this->getMock('\phpbb\request\request');
		$this->template = new \phpbb\boardannouncements\tests\mock\template();
		$this->user = $this->getMock('\phpbb\user', array(), array('\phpbb\datetime'));
		$this->user->data['board_announcements_status'] = 1;

		$request = new \phpbb_mock_request();
		$request->overwrite('SCRIPT_NAME', 'app.php', \phpbb\request\request_interface::SERVER);
		$request->overwrite('SCRIPT_FILENAME', 'app.php', \phpbb\request\request_interface::SERVER);
		$request->overwrite('REQUEST_URI', 'app.php', \phpbb\request\request_interface::SERVER);

		$this->controller_helper = new \phpbb_mock_controller_helper(
			$this->template,
			$this->user,
			$this->config,
			new \phpbb\controller\provider(),
			new \phpbb_mock_extension_manager($phpbb_root_path),
			new \phpbb\symfony_request($request),
			new \phpbb\filesystem(),
			'',
			$phpEx,
			dirname(__FILE__) . '/../../'
		);
	}

	/**
	* Create our event listener
	*
	* @access protected
	*/
	protected function set_listener()
	{
		$this->listener = new \phpbb\boardannouncements\event\listener(
			$this->config,
			$this->config_text,
			$this->controller_helper,
			$this->request,
			$this->template,
			$this->user
		);
	}

	/**
	* Test the event listener is constructed correctly
	*
	* @access public
	*/
	public function test_construct()
	{
		$this->set_listener();
		$this->assertInstanceOf('\Symfony\Component\EventDispatcher\EventSubscriberInterface', $this->listener);
	}

	/**
	* Test the event listener is subscribing events
	*
	* @access public
	*/
	public function test_getSubscribedEvents()
	{
		$this->assertEquals(array(
			'core.page_header_after',
		), array_keys(\phpbb\boardannouncements\event\listener::getSubscribedEvents()));
	}

	/**
	* Test the display_board_announcements event
	*
	* @access public
	*/
	public function test_display_board_announcements()
	{
		$this->set_listener();

		$dispatcher = new \Symfony\Component\EventDispatcher\EventDispatcher();
		$dispatcher->addListener('core.page_header_after', array($this->listener, 'display_board_announcements'));
		$dispatcher->dispatch('core.page_header_after');

		$this->assertEquals(array(
			'S_BOARD_ANNOUNCEMENT'			=> true,
			'S_BOARD_ANNOUNCEMENT_DISMISS'	=> true,
			'BOARD_ANNOUNCEMENT' 			=> 'Hello world!',
			'BOARD_ANNOUNCEMENT_BGCOLOR'	=> 'FF0000',
			'U_BOARD_ANNOUNCEMENT_CLOSE'	=> 'app.php/boardannouncements/close?hash=' . generate_link_hash('close_boardannouncement'),
		), $this->template->get_template_vars());
	}
}
