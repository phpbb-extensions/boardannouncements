<?php
/**
*
* @package Board Announcements Extension
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardannouncements\acp;

class board_announcements_info
{
	function module()
	{
		return array(
			'filename'	=> '\phpbb\boardannouncements\acp\board_announcements_module',
			'title'		=> 'ACP_BOARD_ANNOUNCEMENTS',
			'modes'		=> array(
				'settings'	=> array(
					'title' => 'ACP_BOARD_ANNOUNCEMENTS_SETTINGS',
					'auth' => 'ext_phpbb/boardannouncements && acl_a_board',
					'cat' => array('ACP_BOARD_ANNOUNCEMENTS')
				),
			),
		);
	}
}
