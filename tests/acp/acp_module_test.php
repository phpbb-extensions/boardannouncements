<?php
/**
 *
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2023 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

require_once __DIR__ . '/../../../../../includes/functions_module.php';

class acp_module_test extends \phpbb_test_case
{
	/** @var \phpbb_mock_extension_manager */
	protected $extension_manager;

	/** @var \phpbb\module\module_manager */
	protected $module_manager;

	protected function setUp(): void
	{
		global $phpbb_dispatcher, $phpbb_extension_manager, $phpbb_root_path, $phpEx;

		$this->extension_manager = new \phpbb_mock_extension_manager(
			$phpbb_root_path,
			[
				'phpbb/boardannouncements' => [
					'ext_name' => 'phpbb/boardannouncements',
					'ext_active' => '1',
					'ext_path' => 'ext/phpbb/boardannouncements/',
				],
			]);
		$phpbb_extension_manager = $this->extension_manager;

		$this->module_manager = new \phpbb\module\module_manager(
			new \phpbb\cache\driver\dummy(),
			$this->getMockBuilder('\phpbb\db\driver\driver_interface')->getMock(),
			$this->extension_manager,
			MODULES_TABLE,
			$phpbb_root_path,
			$phpEx
		);

		$phpbb_dispatcher = new \phpbb_mock_event_dispatcher();
	}

	public function test_module_info()
	{
		self::assertEquals([
			'\\phpbb\\boardannouncements\\acp\\board_announcements_module' => [
				'filename'	=> '\\phpbb\\boardannouncements\\acp\\board_announcements_module',
				'title'		=> 'ACP_BOARD_ANNOUNCEMENTS',
				'modes'		=> [
					'settings'	=> [
						'title'	=> 'ACP_BOARD_ANNOUNCEMENTS_SETTINGS',
						'auth'	=> 'ext_phpbb/boardannouncements && acl_a_board',
						'cat'	=> ['ACP_BOARD_ANNOUNCEMENTS']
					],
				],
			],
		], $this->module_manager->get_module_infos('acp', 'acp_board_announcements_module'));
	}

	public function module_auth_test_data()
	{
		return [
			// module_auth, expected result
			['ext_foo/bar', false],
			['ext_phpbb/boardannouncements', true],
		];
	}

	/**
	 * @dataProvider module_auth_test_data
	 */
	public function test_module_auth($module_auth, $expected)
	{
		self::assertEquals($expected, p_master::module_auth($module_auth, 0));
	}

	public function test_main_module()
	{
		global $phpbb_container, $request, $template;

		if (!defined('IN_ADMIN'))
		{
			define('IN_ADMIN', true);
		}

		$request = $this->getMockBuilder('\phpbb\request\request')
			->disableOriginalConstructor()
			->getMock();
		$template = $this->getMockBuilder('\phpbb\template\template')
			->disableOriginalConstructor()
			->getMock();
		$phpbb_container = $this->getMockBuilder('Symfony\Component\DependencyInjection\ContainerInterface')
			->disableOriginalConstructor()
			->getMock();
		$acp_controller = $this->getMockBuilder('\phpbb\boardannouncements\controller\acp_controller')
			->disableOriginalConstructor()
			->getMock();

		$phpbb_container
			->expects(self::once())
			->method('get')
			->with('phpbb.boardannouncements.acp.controller')
			->willReturn($acp_controller);

		$acp_controller
			->expects(self::once())
			->method('set_page_url')
			->willReturnSelf();

		$acp_controller
			->expects(self::once())
			->method('mode_manage');

		$p_master = new p_master();
		$p_master->module_ary[0]['is_duplicate'] = 0;
		$p_master->module_ary[0]['url_extra'] = '';
		$p_master->load('acp', '\phpbb\boardannouncements\acp\board_announcements_module', 'manage');
	}
}
