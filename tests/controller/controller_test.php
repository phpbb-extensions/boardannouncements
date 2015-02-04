<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
*
* @copyright (c) 2015 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardannouncements\tests\controller;

require_once dirname(__FILE__) . '/../../../../../includes/functions.php';

class controller_test extends \phpbb_database_test_case
{
	/**
	* Define the extensions to be tested
	*
	* @return array vendor/name of extension(s) to test
	*/
	static protected function setup_extensions()
	{
		return array('phpbb/boardannouncements');
	}

	protected $config;
	protected $db;

	/**
	* Get data set fixtures
	*/
	public function getDataSet()
	{
		return $this->createXMLDataSet(dirname(__FILE__) . '/fixtures/users.xml');
	}

	/**
	* Setup test environment
	*/
	public function setUp()
	{
		parent::setUp();

		$this->db = $this->new_dbal();
		$this->config = new \phpbb\config\config(array(
			'board_announcements_enable' => 1,
			'board_announcements_dismiss' => 1,
			'enable_mod_rewrite' => '0',
		));
	}

	/**
	* Create our controller
	*/
	protected function get_controller($user_id, $mode, $ajax)
	{
		$config_text = new \phpbb\config\db_text($this->db, 'phpbb_config_text');
		$user = $this->getMock('\phpbb\user', array(), array('\phpbb\datetime'));
		$user->data['board_announcements_status'] = 1;
		$user->data['user_id'] = $user_id;

		$request = $this->getMock('\phpbb\request\request');
		$request->expects($this->any())
			->method('is_ajax')
			->will($this->returnValue($ajax)
		);
		$request->expects($this->any())
			->method('variable')
			->with($this->anything())
			->will($this->returnValueMap(array(
				array('hash', '', false, \phpbb\request\request_interface::REQUEST, generate_link_hash($mode))
			))
		);

		return new \phpbb\boardannouncements\controller\controller(
			$this->config,
			$config_text,
			$this->db,
			$request,
			$user
		);
	}

	/**
	 * Test data for the test_controller test
	 *
	 * @return array Test data
	 */
	public function controller_data()
	{
		return array(
			array(
				1, // Guest
				'close_boardannouncement',
				true,
				200,
				'{"success":true}', // True because a cookie was set
				1, // Status should remain 1 for guests
			),
			array(
				2, // Member
				'close_boardannouncement',
				true,
				200,
				'{"success":true}', // True because a cookie and status were set
				0, // Status should be changed to 0 for the member
			),
			array(
				0, // Invalid member
				'close_boardannouncement',
				true,
				200,
				'{"success":false}', // False because user did not exist
				0, // Status should return 0 due to user not existing
			),
		);
	}

	/**
	 * Test the controller response under normal conditions
	 *
	 * @dataProvider controller_data
	 */
	public function test_controller($user_id, $mode, $ajax, $status_code, $content, $expected)
	{
		$controller = $this->get_controller($user_id, $mode, $ajax);

		$response = $controller->close_announcement();
		$this->assertInstanceOf('\Symfony\Component\HttpFoundation\JsonResponse', $response);
		$this->assertEquals($status_code, $response->getStatusCode());
		$this->assertEquals($content, $response->getContent());
		$this->assertEquals($expected, $this->check_board_announcement_status($user_id));
	}

	/**
	 * Test data for the test_controller_fails test
	 *
	 * @return array Test data
	 */
	public function controller_fails_data()
	{
		return array(
			array(
				1,
				'foobar', // Invalid hash
				true,
				true,
				403,
				'NO_AUTH_OPERATION',
			),
			array(
				1,
				'', // Empty hash
				true,
				true,
				403,
				'NO_AUTH_OPERATION',
			),
			array(
				1,
				'close_boardannouncement',
				true,
				false, // Board Announcements disabled
				403,
				'NO_AUTH_OPERATION',
			),
		);
	}

	/**
	 * Test the controller throws exceptions under failing conditions
	 *
	 * @dataProvider controller_fails_data
	 */
	public function test_controller_fails($user_id, $mode, $ajax, $enabled, $status_code, $content)
	{
		$this->config['board_announcements_dismiss'] = $enabled;

		$controller = $this->get_controller($user_id, $mode, $ajax);

		try
		{
			$controller->close_announcement();
			$this->fail('The expected \phpbb\exception\http_exception was not thrown');
		}
		catch (\phpbb\exception\http_exception $exception)
		{
			$this->assertEquals($status_code, $exception->getStatusCode());
			$this->assertEquals($content, $exception->getMessage());
		}
	}

	/**
	 * Helper to get the stored board announcement status for a user
	 *
	 * @param $user_id
	 * @return int
	 */
	protected function check_board_announcement_status($user_id)
	{
		$sql = 'SELECT board_announcements_status
			FROM phpbb_users
			WHERE user_id = ' . (int) $user_id;
		$result = $this->db->sql_query_limit($sql, 1);
		$status = $this->db->sql_fetchfield('board_announcements_status');
		$this->db->sql_freeresult($result);

		return (int) $status;
	}

}
