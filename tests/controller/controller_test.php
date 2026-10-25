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
		return ['phpbb/boardannouncements'];
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
		return $this->createXMLDataSet(__DIR__ . '/../fixtures/board_announcements.xml');
	}

	/**
	* Setup test environment
	*/
	protected function setUp(): void
	{
		parent::setUp();

		$this->db = $this->new_dbal();
		$this->config = new \phpbb\config\config([
			'boardannouncements.table_lock.board_announcements_table' => 0,
			'board_announcements_enable' => 1,
			'enable_mod_rewrite' => '0',
		]);
	}

	/**
	* Create our controller
	*/
	protected function get_controller($user_id, $is_registered, $mode, $ajax, $php_ext = null)
	{
		global $user, $phpbb_dispatcher, $phpbb_path_helper, $phpbb_root_path, $phpEx;

		$phpbb_dispatcher = new \phpbb_mock_event_dispatcher();
		$phpbb_path_helper = $this->getMockBuilder('\phpbb\path_helper')
			->disableOriginalConstructor()
			->getMock();

		/** @var $user \PHPUnit\Framework\MockObject\MockObject|\phpbb\user */
		$user = $this->getMockBuilder('\phpbb\user')
			->setConstructorArgs([
				new \phpbb\language\language(new \phpbb\language\language_file_loader($phpbb_root_path, $phpEx)),
				'\phpbb\datetime',
			])
			->getMock();
		$user->data['user_form_salt'] = '';
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
		$request->method('is_set_post')
			->willReturnCallback(static function ($name) use ($mode) {
				return $name === 'dismiss' && $mode !== 'not_post';
			});

		$manager = new \phpbb\boardannouncements\manager\manager(
			new \phpbb\boardannouncements\manager\nestedset(
				$this->db,
				new \phpbb\lock\db('boardannouncements.table_lock.board_announcements_table', $this->config, $this->db),
				'phpbb_board_announcements',
				'phpbb_board_announcements_track'
			)
		);

		return new class(
			$manager,
			$request,
			$user,
			$php_ext ?? $phpEx,
			$mode === 'valid'
		) extends \phpbb\boardannouncements\controller\controller {
			protected $valid_form_key;

			public function __construct($manager, $request, $user, $php_ext, $valid_form_key)
			{
				parent::__construct($manager, $request, $user, $php_ext);
				$this->valid_form_key = $valid_form_key;
			}

			protected function valid_form_key()
			{
				return $this->valid_form_key;
			}
		};
	}

	/**
	 * Test data for the test_controller test
	 *
	 * @return array Test data
	 */
	public function controller_data()
	{
		return [
			[
				1, // Announcement ID
				1, // Guest
				false, // Guest is not a registered user
				'valid',
				true,
				200,
				'{"success":true,"id":1}', // True because a cookie was set
				false,
			],
			[
				1, // Announcement ID
				2, // Member
				true, // Member is a registered user
				'valid',
				true,
				200,
				'{"success":true,"id":1}', // True because a cookie and status were set
				true,
			],
			[
				1, // Announcement ID
				0, // Invalid member
				false, // Set is_registered to false with invalid user_id
				'valid',
				true,
				200,
				'{"success":true,"id":1}', // True because a cookie was set
				false, // Status should return false due to user not existing
			],
			[
				1, // Announcement ID
				1, // Guest
				false, // Guest is not a registered user
				'valid',
				false,
				200,
				'{"success":true,"id":1}', // True because a cookie was set
				false,
			],
		];
	}

	/**
	 * Test the controller response under normal conditions
	 *
	 * @dataProvider controller_data
	 */
	public function test_controller($id, $user_id, $is_registered, $mode, $ajax, $status_code, $content, $expected)
	{
		// If non-ajax redirect is encountered, in testing it will trigger error
		if (!$ajax)
		{
			// Throws E_WARNING in PHP 8.0+ and E_USER_WARNING in earlier versions
			$errno = PHP_VERSION_ID < 80000 ? E_USER_WARNING : E_WARNING;
			$this->setExpectedTriggerError($errno);
		}

		$controller = $this->get_controller($user_id, $is_registered, $mode, $ajax);

		$response = $controller->close_announcement($id);
		self::assertInstanceOf('\Symfony\Component\HttpFoundation\JsonResponse', $response);
		self::assertEquals($status_code, $response->getStatusCode());
		self::assertEquals($content, $response->getContent());
		self::assertEquals($expected, $this->get_closed_announcements($id, $user_id));
	}

	/**
	 * Test non-AJAX redirect destinations
	 *
	 * @dataProvider get_redirect_data
	 */
	public function test_get_redirect($redirect, $expected, $php_ext = null)
	{
		$controller = $this->get_controller(1, false, 'valid', false, $php_ext);
		$method = new \ReflectionMethod($controller, 'get_redirect');
		$method->setAccessible(true);

		self::assertSame($expected, $method->invoke($controller, $redirect));
	}

	/**
	 * Data for test_get_redirect
	 *
	 * @return array
	 */
	public function get_redirect_data()
	{
		return [
			['viewtopic.php?t=1', 'viewtopic.php?t=1'],
			['app.php/boardannouncements/close/1?foo=bar', 'index.php'],
			['https://example.com/forum/app.php/boardannouncements/close/1?foo=bar', 'index.php'],
			['/boardannouncements/close/2/', 'index.php'],
			['app.php/boardannouncements/close/1', 'index.phtml', 'phtml'],
			['viewtopic.php?redirect=app.php/boardannouncements/close/1', 'viewtopic.php?redirect=app.php/boardannouncements/close/1'],
		];
	}

	/**
	 * Test data for the test_controller_fails test
	 *
	 * @return array Test data
	 */
	public function controller_fails_data()
	{
		return [
			[	// test form key fail
				1,
				2,
				true, // Guest is a registered user
				'invalid',
				true,
				403,
				'NO_AUTH_OPERATION',
			],
			[	// test missing POST action
				1,
				2,
				true, // Guest is a registered user
				'not_post',
				true,
				403,
				'NO_AUTH_OPERATION',
			],
			[	// test non-existent announcement
				9,
				2,
				true, // Guest is a registered user
				'valid',
				true,
				403,
				'NO_AUTH_OPERATION',
			],
			[	// test non-dismissible announcement
				4,
				2,
				true, // Guest is a registered user
				'valid',
				true,
				403,
				'NO_AUTH_OPERATION',
			],
		];
	}

	/**
	 * Test the controller throws exceptions under failing conditions
	 *
	 * @dataProvider controller_fails_data
	 */
	public function test_controller_fails($id, $user_id, $is_registered, $mode, $ajax, $status_code, $content)
	{
		$controller = $this->get_controller($user_id, $is_registered, $mode, $ajax);

		try
		{
			$controller->close_announcement($id);
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
	 * @param $id
	 * @param $user_id
	 * @return bool
	 */
	protected function get_closed_announcements($id, $user_id)
	{
		$ids = [];
		$sql = 'SELECT announcement_id FROM phpbb_board_announcements_track WHERE user_id = ' . (int) $user_id;
		$result = $this->db->sql_query($sql);
		while ($row = $this->db->sql_fetchrow($result))
		{
			$ids[] = $row['announcement_id'];
		}
		$this->db->sql_freeresult($result);
		return in_array($id, $ids);
	}
}
