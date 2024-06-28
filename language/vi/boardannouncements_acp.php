<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* Vietnamese translate by phpBBVietnam <https://phpbbvietnam.com>
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Cấu hình bảng thông báo',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Tại đây bạn có thể viết thông báo trên diễn đàn.',

	'BOARD_ANNOUNCEMENTS_ENABLE_ALL'		=> 'Enable board announcements',

	'BOARD_ANNOUNCEMENTS_OPTIONS'			=> 'Announcement options',

	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Description',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'A short description for this announcement. This will only be visible here in the ACP to help identify this announcement.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Hiển thị thông báo',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Ai có thể thấy thông báo',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Cho phép thành viên tắt thông báo',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Limit where this announcement should be displayed',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_EXPLAIN'	=> 'Select one or more locations to display the announcement. To display it everywhere, leave the selection empty. Use Command (Mac) or Control (Windows) click to select multiple locations.',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Mọi người',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Màu nền của khung thông báo',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Bạn có thể thay đổi màu nền của thông báo bằng mã hex (ví dụ: FFFF80). Để trống trường này để sử dụng màu mặc định.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Ngày hết hạn',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Đặt ngày thông báo sẽ hết hạn và bị vô hiệu hóa. Để trống trường này nếu bạn không muốn thông báo hết hạn.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Ngày hết hạn không hợp lệ hoặc đã hết hạn.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Board announcement contains no message',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Nội dung thông báo',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Xem trước nội dung thông báo',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Nội dung thông báo đã được cập nhật.',

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
