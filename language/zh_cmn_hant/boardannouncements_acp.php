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



	'BOARD_ANNOUNCEMENTS_DESC'				=> '描述',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> '描述過長。某些特殊字元需要額外的儲存空間。',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> '此公告的簡短說明。這僅在 ACP 中可見，以幫助識別此公告。',

	'BOARD_ANNOUNCEMENTS_USERS'				=> '誰可以查看此討論區公告',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> '允許使用者關閉這則討論區公告',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> '該公告應顯示在何處',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> '每個人',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> '討論區公告背景顏色',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_PICKER'	=> '背景顏色選擇器',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_HEX'		=> '背景顏色十六進位代碼',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> '背景顏色必須是六位十六進位顏色代碼。',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> '為自訂顏色選項選擇背景顏色，或輸入六個字元的十六進位代碼。',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> '討論區公告截止日期',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> '設定公告將到期的日期並變為停用。如果您不希望公告過期，請將此欄位留白。',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> '截止日期無效或已過期。',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> '討論區公告不包含任何訊息',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> '討論區公告訊息',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> '討論區公告 - 預覽',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> '討論區公告已更新。',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> '公告',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> '可見',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> '每個地方',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> '討論區首頁',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> '沒有可顯示的討論區公告',
	'BOARD_ANNOUNCEMENTS_ADD'				=> '建立公告',

	'BOARD_ANNOUNCEMENTS_EDIT'				=> '編輯公告',
	'BOARD_ANNOUNCEMENTS_EDITOR_EXPLAIN'	=> '撰寫訊息、選擇受眾並控制訊息的顯示時間。',
	'BOARD_ANNOUNCEMENTS_CONTENT'			=> '內容',
	'BOARD_ANNOUNCEMENTS_TITLE'				=> '公告標題',
	'BOARD_ANNOUNCEMENTS_TITLE_EXPLAIN'		=> '公告訊息上方顯示的選用標題。',
	'BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG'	=> '公告標題不得超過 255 個字元。',
	'BOARD_ANNOUNCEMENTS_APPEARANCE'		=> '外貌',
	'BOARD_ANNOUNCEMENTS_TONE'				=> '色調',
	'BOARD_ANNOUNCEMENTS_TONE_EXPLAIN'		=> '選擇預設的配色方案，或選擇自訂顏色來選擇您自己的配色方案。',
	'BOARD_ANNOUNCEMENTS_TONE_NEUTRAL'		=> '中性的',
	'BOARD_ANNOUNCEMENTS_TONE_INFO'			=> '資訊',
	'BOARD_ANNOUNCEMENTS_TONE_SUCCESS'		=> '成功',
	'BOARD_ANNOUNCEMENTS_TONE_WARNING'		=> '警告',
	'BOARD_ANNOUNCEMENTS_TONE_CRITICAL'		=> '批判的',
	'BOARD_ANNOUNCEMENTS_TONE_CUSTOM'		=> '客製化顏色',
	'BOARD_ANNOUNCEMENTS_TONE_INVALID'		=> '選擇有效的色調。',
	'BOARD_ANNOUNCEMENTS_AUDIENCE_LOCATION'	=> '受眾及地點',
	'BOARD_ANNOUNCEMENTS_SELECTED_GROUPS'	=> '選定的群組',
	'BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED'	=> '選擇“選定組”時，至少選擇一組。',
	'BOARD_ANNOUNCEMENTS_SELECTED_LOCATIONS' => '選定地點',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_REQUIRED' => '選擇“選定位置”時，至少選擇一個位置。',
	'BOARD_ANNOUNCEMENTS_LOCATION_MODE_INVALID' => '選擇有效的顯示位置。',
	'BOARD_ANNOUNCEMENTS_INCLUDE_CHILDREN'	=> '也顯示在子論壇中',
	'BOARD_ANNOUNCEMENTS_LOCATION_EMPTY'	=> '沒有符合您搜尋條件的地點。',
	'BOARD_ANNOUNCEMENTS_SCHEDULE_BEHAVIOR'	=> '時間表和行為',
	'BOARD_ANNOUNCEMENTS_SCHEDULE'			=> '行程',
	'BOARD_ANNOUNCEMENTS_START'				=> '開始日期',
	'BOARD_ANNOUNCEMENTS_START_EXPLAIN'		=> '留空可立即開始顯示公告。',
	'BOARD_ANNOUNCEMENTS_START_INVALID'		=> '開始日期無效。',
	'BOARD_ANNOUNCEMENTS_FILTER'			=> '篩選',
	'BOARD_ANNOUNCEMENTS_STATUS'			=> '地位',
	'BOARD_ANNOUNCEMENTS_STATUS_ALL'		=> '全部',
	'BOARD_ANNOUNCEMENTS_STATUS_ACTIVE'		=> '積極的',
	'BOARD_ANNOUNCEMENTS_STATUS_SCHEDULED'	=> '預定',
	'BOARD_ANNOUNCEMENTS_STATUS_DRAFT'		=> '草稿',
	'BOARD_ANNOUNCEMENTS_STATUS_EXPIRED'	=> '已到期',
	'BOARD_ANNOUNCEMENTS_STATUS_ARCHIVED'	=> '已存檔',
	'BOARD_ANNOUNCEMENTS_STATE_INVALID'		=> '選擇有效狀態。',
	'BOARD_ANNOUNCEMENTS_PUBLISH'			=> '發布',
	'BOARD_ANNOUNCEMENTS_PUBLISHED'			=> '已發表',
	'BOARD_ANNOUNCEMENTS_SHOW_AGAIN'		=> '再次展現給大家',
	'BOARD_ANNOUNCEMENTS_SHOWN_AGAIN'		=> '公告將再次向大家展示。',
	'BOARD_ANNOUNCEMENTS_ARCHIVE'			=> '檔案',
	'BOARD_ANNOUNCEMENTS_ARCHIVED'			=> '公告已存檔。',
	'BOARD_ANNOUNCEMENTS_DUPLICATE'			=> '複製',
	'BOARD_ANNOUNCEMENTS_DUPLICATED'		=> '公告複製為草稿。',
	'BOARD_ANNOUNCEMENTS_COPY_OF'			=> '%s 的副本',
	'BOARD_ANNOUNCEMENTS_NOW'				=> '立即地',
	'BOARD_ANNOUNCEMENTS_NO_END'			=> '無結束日期',
	'BOARD_ANNOUNCEMENTS_UNTITLED'			=> '無標題公告',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH'	=> '論壇公告可見度',
	'BOARD_ANNOUNCEMENTS_GLOBAL_DISABLED'	=> '目前所有公告均處於隱藏狀態。',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH_EXPLAIN' => '隱藏或顯示所有公告，而不更改其各自的狀態。',
	'BOARD_ANNOUNCEMENTS_DISMISS_EXPLAIN'	=> '訪客閱讀後可以隱藏此公告。',
	'BOARD_ANNOUNCEMENTS_REORDER_FILTERED'	=> '清除過濾器以更改公告順序。',
	'BOARD_ANNOUNCEMENTS_FILTER_EMPTY'		=> '沒有符合這些過濾器的公告。',
	'BOARD_ANNOUNCEMENTS_BULK_ACTION'		=> '批量操作',
	'BOARD_ANNOUNCEMENTS_BULK_UPDATED'		=> '選定的公告已更新。',
	'BOARD_ANNOUNCEMENTS_DELETE_PERMANENTLY' => '永久刪除',
	'BOARD_ANNOUNCEMENTS_PREVIEW_MOBILE'	=> '移動寬度',
	'BOARD_ANNOUNCEMENTS_JAVASCRIPT_REQUIRED' => '必須啟用 JavaScript 才能使用預覽和編輯器的完整功能。',
	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> '討論區公告已刪除',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> '討論區公告無法刪除',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> '公告未取得表格鎖定。另一個進程可能正在持有鎖定。超時1小時後強制釋放鎖定。',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> '要求的公告不存在。',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> '要求的公告沒有上層公告。',
));
