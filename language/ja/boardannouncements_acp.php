<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> '掲示板告知設定',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'ここでは掲示板の各ページ上で表示される掲示板告知を作成、管理することが出来ます。',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'この掲示板告知を表示',
	'BOARD_ANNOUNCEMENTS_GUESTS'			=> 'この掲示板告知の閲覧をゲストへ許可',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'この掲示板告知の閉鎖をゲストへ許可',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> '掲示板告知の背景色',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'HEXコード(例: FFFF80)を使用して告知の背景色を変更できます。デフォルト色を使用するにはこのフィールドを空白にします。',

	'BOARD_ANNOUNCEMENTS_TEXT'				=> '掲示板告知の本文',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> '掲示板告知 - プレビュー',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> '掲示板告知を更新しました。',
));
