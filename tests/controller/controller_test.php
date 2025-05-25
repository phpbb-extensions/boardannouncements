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

use phpbb\boardannouncements\controller\controller;
use phpbb\boardannouncements\manager\manager;
use phpbb\boardannouncements\manager\nestedset;
use phpbb\config\config;
use phpbb\db\driver\driver_interface;
use phpbb\exception\http_exception;
use phpbb\language\language;
use phpbb\language\language_file_loader;
use phpbb\lock\db;
use phpbb_database_test_case;
use phpbb_mock_event_dispatcher;
use PHPUnit\DbUnit\DataSet\DefaultDataSet;
use PHPUnit\DbUnit\DataSet\IDataSet;
use PHPUnit\DbUnit\DataSet\XmlDataSet;
use phpbb\path_helper;
use phpbb\user;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\MockObject\MockObject;
use phpbb\datetime;
use phpbb\request\request;
use Symfony\Component\HttpFoundation\JsonResponse;

class controller_test extends phpbb_database_test_case
{
	/**
	* Define the extensions to be tested
	*
	* @return array vendor/name of extension(s) to test
	*/
	protected static function setup_extensions(): array
	{
		return ['phpbb/boardannouncements'];
	}

	protected config $config;
	protected driver_interface $db;

	/**
	* Get data set fixtures
	*/
	public function getDataSet(): IDataSet|XmlDataSet|DefaultDataSet
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
		$this->config = new config([
			'boardannouncements.table_lock.board_announcements_table' => 0,
			'board_announcements_enable' => 1,
			'enable_mod_rewrite' => '0',
		]);
	}

	/**
	* Create our controller
	*/
	protected function get_controller($user_id, $is_registered, $mode, $ajax): controller
	{
		global $config, $user, $phpbb_dispatcher, $phpbb_path_helper, $phpbb_root_path, $phpEx;

		$config = new config([]);

		$phpbb_dispatcher = new phpbb_mock_event_dispatcher();
		$phpbb_path_helper = $this->getMockBuilder(path_helper::class)
			->disableOriginalConstructor()
			->getMock();

		$phpbb_path_helper->method('update_web_root_path')
			->willReturnArgument(0);

		/** @var $user MockObject|\phpbb\user */
		$user = $this->getMockBuilder(user::class)
			->setConstructorArgs([
				new language(new language_file_loader($phpbb_root_path, $phpEx)),
				datetime::class,
			])
			->getMock();
		$user->data['user_form_salt'] = '';
		$user->data['user_id'] = $user_id;
		$user->data['is_registered'] = $is_registered;
		$user->data['session_page'] = "index.$phpEx";
		$user->page['page_dir'] = '';

		/** @var $request MockObject|request */
		$request = $this->getMockBuilder(request::class)
			->disableOriginalConstructor()
			->getMock();
		$request->expects(self::atMost(1))
			->method('is_ajax')
			->willReturn($ajax
		);
		$request->method('variable')
			->willReturnCallback(function($name, $default = '') use($user, $mode) {
				return match ($name) {
					'redirect' => $user->data['session_page'],
					'hash' => generate_link_hash($mode),
					default => $default,
				};
			});

		$manager = new manager(
			new nestedset(
				$this->db,
				new db('boardannouncements.table_lock.board_announcements_table', $this->config, $this->db),
				'phpbb_board_announcements',
				'phpbb_board_announcements_track'
			)
		);

		return new controller(
			$manager,
			$request,
			$user
		);
	}

	/**
	 * Test data for the test_controller test
	 *
	 * @return array Test data
	 */
	public function controller_data(): array
	{
		return [
			[
				1, // Announcement ID
				1, // Guest
				false, // Guest is not a registered user
				'close_boardannouncement',
				true,
				200,
				'{"success":true,"id":1}', // True because a cookie was set
				false,
			],
			[
				1, // Announcement ID
				2, // Member
				true, // Member is a registered user
				'close_boardannouncement',
				true,
				200,
				'{"success":true,"id":1}', // True because a cookie and status were set
				true,
			],
			[
				1, // Announcement ID
				0, // Invalid member
				false, // Set is_registered to false with invalid user_id
				'close_boardannouncement',
				true,
				200,
				'{"success":true,"id":1}', // True because a cookie was set
				false, // Status should return false due to the user not existing
			],
			[
				1, // Announcement ID
				1, // Guest
				false, // Guest is not a registered user
				'close_boardannouncement',
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
		// If a non-ajax redirect is encountered, in testing it will trigger_error/exception
		if (!$ajax)
		{
			$this->expectException(Exception::class);
			$this->expectExceptionMessage('INSECURE_REDIRECT');
		}

		$controller = $this->get_controller($user_id, $is_registered, $mode, $ajax);

		$response = $controller->close_announcement($id);
		self::assertInstanceOf(JsonResponse::class, $response);
		self::assertEquals($status_code, $response->getStatusCode());
		self::assertEquals($content, $response->getContent());
		self::assertEquals($expected, $this->get_closed_announcements($id, $user_id));
	}

	/**
	 * Test data for the test_controller_fails test
	 *
	 * @return array Test data
	 */
	public function controller_fails_data(): array
	{
		return [
			[	// test link hash fail
				1,
				2,
				true, // Guest is a registered user
				'foobar', // Invalid hash
				true,
				403,
				'NO_AUTH_OPERATION',
			],
			[	// test link hash fail
				1,
				2,
				true, // Guest is a registered user
				'', // Empty hash
				true,
				403,
				'NO_AUTH_OPERATION',
			],
			[	// test non-existent announcement
				9,
				2,
				true, // Guest is a registered user
				'close_boardannouncement',
				true,
				403,
				'NO_AUTH_OPERATION',
			],
			[	// test non-dismissible announcement
				4,
				2,
				true, // Guest is a registered user
				'close_boardannouncement',
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
		catch (http_exception $exception)
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
	protected function get_closed_announcements($id, $user_id): bool
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
