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

class controller_test extends \phpbb_database_test_case
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

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/**
	* Get data set fixtures
	*/
	public function getDataSet()
	{
		return $this->createXMLDataSet(__DIR__ . '/fixtures/users.xml');
	}

	/**
	* Setup test environment
	*/
	protected function setUp(): void
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
	protected function get_controller($user_id, $is_registered, $mode, $ajax, $enabled = true)
	{
		global $user, $phpbb_root_path, $phpEx;

		$config_text = new \phpbb\config\db_text($this->db, 'phpbb_config_text');

		/** @var $user \PHPUnit\Framework\MockObject\MockObject|\phpbb\user */
		$user = $this->getMockBuilder('\phpbb\user')
			->setConstructorArgs(array(
				new \phpbb\language\language(new \phpbb\language\language_file_loader($phpbb_root_path, $phpEx)),
				'\phpbb\datetime',
			))
			->getMock();
		$user->data['user_form_salt'] = '';

		$user->data['board_announcements_status'] = 1;
		$user->data['user_id'] = $user_id;
		$user->data['is_registered'] = $is_registered;

		/** @var $request \PHPUnit\Framework\MockObject\MockObject|\phpbb\request\request */
		$request = $this->getMockBuilder('\phpbb\request\request')
			->disableOriginalConstructor()
			->getMock();
		$request->expects(self::atMost(1))
			->method('is_ajax')
			->willReturn($ajax
		);
		$request->expects(($enabled ? self::once() : self::never()))
			->method('variable')
			->with(self::anything())
			->willReturnMap(array(
				array('hash', '', false, \phpbb\request\request_interface::REQUEST, generate_link_hash($mode)),
			)
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
				false, // Guest is not a registered user
				'close_boardannouncement',
				true,
				200,
				'{"success":true}', // True because a cookie was set
				1, // Status should remain 1 for guests
			),
			array(
				2, // Member
				true, // Member is a registered user
				'close_boardannouncement',
				true,
				200,
				'{"success":true}', // True because a cookie and status were set
				0, // Status should be changed to 0 for the member
			),
			array(
				0, // Invalid member
				true, // Set is_registered to true to test close_announcement() with invalid user_id
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
	public function test_controller($user_id, $is_registered, $mode, $ajax, $status_code, $content, $expected)
	{
		$controller = $this->get_controller($user_id, $is_registered, $mode, $ajax);

		$response = $controller->close_announcement();
		self::assertInstanceOf('\Symfony\Component\HttpFoundation\JsonResponse', $response);
		self::assertEquals($status_code, $response->getStatusCode());
		self::assertEquals($content, $response->getContent());
		self::assertEquals($expected, $this->check_board_announcement_status($user_id));
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
				false, // Guest is not a registered user
				'foobar', // Invalid hash
				true,
				true,
				403,
				'NO_AUTH_OPERATION',
			),
			array(
				1,
				false, // Guest is not a registered user
				'', // Empty hash
				true,
				true,
				403,
				'NO_AUTH_OPERATION',
			),
			array(
				1,
				false, // Guest is not a registered user
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
	public function test_controller_fails($user_id, $is_registered, $mode, $ajax, $enabled, $status_code, $content)
	{
		$this->config['board_announcements_dismiss'] = $enabled;

		$controller = $this->get_controller($user_id, $is_registered, $mode, $ajax, $enabled);

		try
		{
			$controller->close_announcement();
			self::fail('The expected \phpbb\exception\http_exception was not thrown');
		}
		catch (\phpbb\exception\http_exception $exception)
		{
			self::assertEquals($status_code, $exception->getStatusCode());
			self::assertEquals($content, $exception->getMessage());
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
