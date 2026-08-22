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
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> '在這裡，可以建立與管理您的討論區公告。',

	'BOARD_ANNOUNCEMENTS_ENABLE_ALL'		=> '啟用討論區公告',

	'BOARD_ANNOUNCEMENTS_OPTIONS'			=> '討論區公告選項',

	'BOARD_ANNOUNCEMENTS_DESC'				=> '描述',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> '此公告的簡短說明。這僅在 ACP 中可見，以幫助識別此公告。',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> '顯示此公告',
	'BOARD_ANNOUNCEMENTS_USERS'				=> '誰可以查看此討論區公告',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> '允許使用者關閉這則討論區公告',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> '限制此公告的顯示位置',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_EXPLAIN'	=> '選擇一個或多個位置來顯示公告。要在各處顯示它，請將選擇留空。使用 Command (Mac) 或 Control (Windows) 點選來選擇多個位置。',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> '每個人',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> '討論區公告背景顏色',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> '您可以使用十六進制代碼改變討論區公告背景顏色（例如：FFFF80）。欄位留白，則使用預設的顏色。',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> '討論區公告截止日期',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> '設定公告將到期的日期並變為停用。如果您不希望公告過期，請將此欄位留白。',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> '截止日期無效或已過期。',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> '討論區公告不包含任何訊息',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> '討論區公告訊息',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> '討論區公告 - 預覽',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> '討論區公告已更新。',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> '描述',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_WHERE'		=> '位置',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> '可見',
	'BOARD_ANNOUNCEMENTS_TH_ENABLED'		=> '啟用',
	'BOARD_ANNOUNCEMENTS_TH_CREATED_DATE'	=> '建立日期',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRY_DATE'	=> '截止日期',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRED'		=> '已過期',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> '每個地方',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> '討論區首頁',
	'BOARD_ANNOUNCEMENTS_FORUMS'			=> '選擇的版面',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> '沒有可顯示的討論區公告',
	'BOARD_ANNOUNCEMENTS_ADD'				=> '建立公告',

	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> '討論區公告已刪除',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> '討論區公告無法刪除',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> '公告未取得表格鎖定。另一個進程可能正在持有鎖定。超時1小時後強制釋放鎖定。',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> '要求的公告不存在。',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> '要求的公告沒有上層公告。',
));
