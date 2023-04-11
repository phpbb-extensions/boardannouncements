<?php
/**
 *
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\boardannouncements\acp;

class board_announcements_module
{
	public $page_title;
	public $tpl_name;
	public $u_action;

	/**
	 * Main ACP module
	 *
	 * @throws \Exception
	 */
	public function main()
	{
		global $phpbb_container;

		/** @var \phpbb\boardannouncements\controller\acp_controller $acp_controller */
		$acp_controller = $phpbb_container->get('phpbb.boardannouncements.acp.controller');

		// Make the $u_action url available in the admin controller
		$acp_controller->set_page_url($this->u_action);

		// Load a template from adm/style for our ACP page
		$this->tpl_name = 'board_announcements';

		// Set the page title for our ACP page
		$this->page_title = 'ACP_BOARD_ANNOUNCEMENTS_SETTINGS';

		$acp_controller->mode_manage();
	}
}
