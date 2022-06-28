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

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Hiển thị thông báo',
	'BOARD_ANNOUNCEMENTS_INDEX_ONLY'		=> 'Chỉ hiển thị ở trang chủ',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Ai có thể thấy thông báo',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Cho phép thành viên tắt thông báo',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Mọi người',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Màu nền của khung thông báo',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Bạn có thể thay đổi màu nền của thông báo bằng mã hex (ví dụ: FFFF80). Để trống trường này để sử dụng màu mặc định.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Ngày hết hạn',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Đặt ngày thông báo sẽ hết hạn và bị vô hiệu hóa. Để trống trường này nếu bạn không muốn thông báo hết hạn.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Ngày hết hạn không hợp lệ hoặc đã hết hạn.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_FORMAT'		=> 'YYYY-MM-DD HH:MM',

	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Nội dung thông báo',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Xem trước nội dung thông báo',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Nội dung thông báo đã được cập nhật.',
));
