<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* @正體中文化 竹貓星球 <http://phpbb-tw.net/phpbb/>
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> '討論區公告設定',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> '在這裡，您可以管理與建立討論區公告，它將顯示在討論區的每一頁。',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> '顯示這則討論區公告設定',
	'BOARD_ANNOUNCEMENTS_USERS'				=> '誰可以查看此討論區公告',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> '允許使用者關閉這則討論區公告',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> '每個人',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> '討論區公告背景顏色',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> '您可以使用十六進制代碼改變討論區公告背景顏色（例如：FFFF80）。欄位留白，則使用預設的顏色。',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> '论坛公告到期日期',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> '设置论坛公告自动过期失效的日期。留空将长期有效。',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> '到期日期无效或者已经过期。',
	'BOARD_ANNOUNCEMENTS_EXPIRY_FORMAT'		=> 'YYYY-MM-DD HH:MM',

	'BOARD_ANNOUNCEMENTS_TEXT'				=> '討論區公告訊息',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> '討論區公告 - 預覽',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> '討論區公告已更新。',
));
