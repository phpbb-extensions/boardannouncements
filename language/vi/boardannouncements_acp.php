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

	'BOARD_ANNOUNCEMENTS_ENABLE_ALL'		=> 'Bật thông báo trên bảng',

	'BOARD_ANNOUNCEMENTS_OPTIONS'			=> 'Announcement options',

	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Sự miêu tả',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Một mô tả ngắn cho thông báo này. Điều này sẽ chỉ hiển thị ở đây trong ACP để giúp xác định thông báo này.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Hiển thị thông báo',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Ai có thể thấy thông báo',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Cho phép thành viên tắt thông báo',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Giới hạn vị trí hiển thị thông báo này',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_EXPLAIN'	=> 'Chọn một hoặc nhiều vị trí để hiển thị thông báo. Để hiển thị nó ở mọi nơi, hãy để trống vùng chọn. Sử dụng Command (Mac) hoặc Control (Windows) nhấp chuột để chọn nhiều vị trí.',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Mọi người',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Màu nền của khung thông báo',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Bạn có thể thay đổi màu nền của thông báo bằng mã hex (ví dụ: FFFF80). Để trống trường này để sử dụng màu mặc định.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Ngày hết hạn',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Đặt ngày thông báo sẽ hết hạn và bị vô hiệu hóa. Để trống trường này nếu bạn không muốn thông báo hết hạn.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Ngày hết hạn không hợp lệ hoặc đã hết hạn.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Thông báo trên bảng không có tin nhắn',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Nội dung thông báo',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Xem trước nội dung thông báo',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Nội dung thông báo đã được cập nhật.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Sự miêu tả',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_WHERE'		=> 'Vị trí',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Hiển thị với',
	'BOARD_ANNOUNCEMENTS_TH_ENABLED'		=> 'Đã bật',
	'BOARD_ANNOUNCEMENTS_TH_CREATED_DATE'	=> 'Ngày tạo',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRY_DATE'	=> 'Ngày hết hạn',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRED'		=> 'Hết hạn',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Mọi nơi',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Chỉ số bảng',
	'BOARD_ANNOUNCEMENTS_FORUMS'			=> 'Diễn đàn đã chọn',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Không có thông báo bảng nào để hiển thị',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Tạo thông báo',

	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Thông báo trên bảng đã bị xóa',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Không thể xóa thông báo trên bảng',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Thông báo của hội đồng quản trị không thể lấy được khóa bảng. Một quá trình khác có thể đang giữ khóa. Khóa sẽ bị buộc phải mở sau khi hết thời gian 1 giờ.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Thông báo được yêu cầu không tồn tại.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Thông báo được yêu cầu không có phụ huynh.',
));
