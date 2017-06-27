<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* @简体中文语言　David Yin <https://www.phpbbchinese.com/>
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> '论坛公告设定',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> '在这里，您可以建立并管理论坛公告，它将会显示在论坛的每个页面。',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> '显示这条论坛公告',
	'BOARD_ANNOUNCEMENTS_USERS'				=> '允许查看公告的用户',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> '允许用户关闭这条论坛公告',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> '所有用户',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> '论坛公告背景颜色',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> '您可以使用十六进制代码改变论坛公告北京颜色（比如：FFFF80）。留空则使用默认的背景颜色。',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> '论坛公告到期日期',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> '设置论坛公告自动过期失效的日期。留空将长期有效。',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> '到期日期无效或者已经过期。',
	'BOARD_ANNOUNCEMENTS_EXPIRY_FORMAT'		=> 'YYYY-MM-DD HH:MM',

	'BOARD_ANNOUNCEMENTS_TEXT'				=> '论坛公告信息',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> '论坛公告 -  预览',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> '论坛公告已更新。',
));
