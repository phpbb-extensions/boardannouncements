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

	'BOARD_ANNOUNCEMENTS_ENABLE_ALL'		=> 'Enable board announcements',

	'BOARD_ANNOUNCEMENTS_OPTIONS'			=> 'Announcement options',

	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Description',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'A short description for this announcement. This will only be visible here in the ACP to help identify this announcement.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> '顯示這則討論區公告設定',
	'BOARD_ANNOUNCEMENTS_USERS'				=> '誰可以查看此討論區公告',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> '允許使用者關閉這則討論區公告',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Limit where this announcement should be displayed',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_EXPLAIN'	=> 'Select one or more locations to display the announcement. To display it everywhere, leave the selection empty. Use Command (Mac) or Control (Windows) click to select multiple locations.',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> '每個人',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> '討論區公告背景顏色',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> '您可以使用十六進制代碼改變討論區公告背景顏色（例如：FFFF80）。欄位留白，則使用預設的顏色。',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> '討論區公告截止日期',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> '設定公告將到期的日期並變為停用。如果您不希望公告過期，請將此欄位留白。',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> '截止日期無效或已過期。',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Board announcement contains no message',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> '討論區公告訊息',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> '討論區公告 - 預覽',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> '討論區公告已更新。',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Description',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_WHERE'		=> 'Location',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Visible To',
	'BOARD_ANNOUNCEMENTS_TH_ENABLED'		=> 'Enabled',
	'BOARD_ANNOUNCEMENTS_TH_CREATED_DATE'	=> 'Creation Date',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRY_DATE'	=> 'Expiration Date',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRED'		=> 'Expired',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Everywhere',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Board Index',
	'BOARD_ANNOUNCEMENTS_FORUMS'			=> 'Selected Forums',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'There are no board announcements to display',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Create Announcement',

	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'The board announcement was deleted',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'The board announcement could not be deleted',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Board announcements failed to acquire the table lock. Another process may be holding the lock. Locks are forcibly released after a timeout of 1 hour.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'The requested announcement does not exist.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'The requested announcement has no parent.',
));
