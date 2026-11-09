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



	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Sự miêu tả',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'Mô tả quá dài. Một số ký tự đặc biệt cần thêm dung lượng lưu trữ.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Một mô tả ngắn cho thông báo này. Điều này sẽ chỉ hiển thị ở đây trong ACP để giúp xác định thông báo này.',

	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Ai có thể thấy thông báo',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Cho phép thành viên tắt thông báo',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Thông báo này sẽ được hiển thị ở đâu',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Mọi người',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Màu nền của khung thông báo',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_PICKER'	=> 'Bộ chọn màu nền',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_HEX'		=> 'Mã thập lục phân màu nền',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'Màu nền phải là mã màu thập lục phân gồm sáu ký tự.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Chọn màu nền cho tùy chọn Màu tùy chỉnh hoặc nhập mã thập lục phân gồm sáu ký tự.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Ngày hết hạn',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Đặt ngày thông báo sẽ hết hạn và bị vô hiệu hóa. Để trống trường này nếu bạn không muốn thông báo hết hạn.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Ngày hết hạn không hợp lệ hoặc đã hết hạn.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Thông báo trên bảng không có tin nhắn',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Nội dung thông báo',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Xem trước nội dung thông báo',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Nội dung thông báo đã được cập nhật.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Thông báo',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Hiển thị với',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Mọi nơi',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Chỉ số bảng',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Không có thông báo bảng nào để hiển thị',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Tạo thông báo',

	'BOARD_ANNOUNCEMENTS_EDIT'				=> 'Chỉnh sửa thông báo',
	'BOARD_ANNOUNCEMENTS_EDITOR_EXPLAIN'	=> 'Soạn tin nhắn, chọn đối tượng và kiểm soát thời điểm tin nhắn xuất hiện.',
	'BOARD_ANNOUNCEMENTS_CONTENT'			=> 'Nội dung',
	'BOARD_ANNOUNCEMENTS_TITLE'				=> 'Tiêu đề thông báo',
	'BOARD_ANNOUNCEMENTS_TITLE_EXPLAIN'		=> 'Tiêu đề tùy chọn hiển thị phía trên thông báo thông báo.',
	'BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG'	=> 'Tiêu đề thông báo phải có 255 ký tự trở xuống.',
	'BOARD_ANNOUNCEMENTS_APPEARANCE'		=> 'Vẻ bề ngoài',
	'BOARD_ANNOUNCEMENTS_TONE'				=> 'Tông màu',
	'BOARD_ANNOUNCEMENTS_TONE_EXPLAIN'		=> 'Chọn một bảng màu đặt sẵn hoặc chọn Màu tùy chỉnh để chọn màu của riêng bạn.',
	'BOARD_ANNOUNCEMENTS_TONE_NEUTRAL'		=> 'Trung lập',
	'BOARD_ANNOUNCEMENTS_TONE_INFO'			=> 'Thông tin',
	'BOARD_ANNOUNCEMENTS_TONE_SUCCESS'		=> 'Thành công',
	'BOARD_ANNOUNCEMENTS_TONE_WARNING'		=> 'Cảnh báo',
	'BOARD_ANNOUNCEMENTS_TONE_CRITICAL'		=> 'Phê bình',
	'BOARD_ANNOUNCEMENTS_TONE_CUSTOM'		=> 'Màu tùy chỉnh',
	'BOARD_ANNOUNCEMENTS_TONE_INVALID'		=> 'Chọn tông màu hợp lệ.',
	'BOARD_ANNOUNCEMENTS_AUDIENCE_LOCATION'	=> 'Đối tượng và địa điểm',
	'BOARD_ANNOUNCEMENTS_SELECTED_GROUPS'	=> 'Nhóm đã chọn',
	'BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED'	=> 'Chọn ít nhất một nhóm khi Nhóm đã chọn được chọn.',
	'BOARD_ANNOUNCEMENTS_SELECTED_LOCATIONS' => 'Địa điểm đã chọn',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_REQUIRED' => 'Chọn ít nhất một vị trí khi chọn Vị trí đã chọn.',
	'BOARD_ANNOUNCEMENTS_LOCATION_MODE_INVALID' => 'Chọn vị trí hiển thị hợp lệ.',
	'BOARD_ANNOUNCEMENTS_INCLUDE_CHILDREN'	=> 'Cũng hiển thị trong các diễn đàn con',
	'BOARD_ANNOUNCEMENTS_LOCATION_EMPTY'	=> 'Không có vị trí nào phù hợp với tìm kiếm của bạn.',
	'BOARD_ANNOUNCEMENTS_SCHEDULE_BEHAVIOR'	=> 'Lịch trình và hành vi',
	'BOARD_ANNOUNCEMENTS_SCHEDULE'			=> 'Lịch trình',
	'BOARD_ANNOUNCEMENTS_START'				=> 'Ngày bắt đầu',
	'BOARD_ANNOUNCEMENTS_START_EXPLAIN'		=> 'Để trống để bắt đầu hiển thị thông báo ngay lập tức.',
	'BOARD_ANNOUNCEMENTS_START_INVALID'		=> 'Ngày bắt đầu không hợp lệ.',
	'BOARD_ANNOUNCEMENTS_FILTER'			=> 'Lọc',
	'BOARD_ANNOUNCEMENTS_STATUS'			=> 'Trạng thái',
	'BOARD_ANNOUNCEMENTS_STATUS_ALL'		=> 'Tất cả',
	'BOARD_ANNOUNCEMENTS_STATUS_ACTIVE'		=> 'Tích cực',
	'BOARD_ANNOUNCEMENTS_STATUS_SCHEDULED'	=> 'Đã lên lịch',
	'BOARD_ANNOUNCEMENTS_STATUS_DRAFT'		=> 'Bản nháp',
	'BOARD_ANNOUNCEMENTS_STATUS_EXPIRED'	=> 'Hết hạn',
	'BOARD_ANNOUNCEMENTS_STATUS_ARCHIVED'	=> 'Đã lưu trữ',
	'BOARD_ANNOUNCEMENTS_STATE_INVALID'		=> 'Chọn trạng thái hợp lệ.',
	'BOARD_ANNOUNCEMENTS_PUBLISH'			=> 'Xuất bản',
	'BOARD_ANNOUNCEMENTS_PUBLISHED'			=> 'Đã xuất bản',
	'BOARD_ANNOUNCEMENTS_SHOW_AGAIN'		=> 'Hiển thị lại cho mọi người',
	'BOARD_ANNOUNCEMENTS_SHOWN_AGAIN'		=> 'Thông báo sẽ được hiển thị lại cho mọi người.',
	'BOARD_ANNOUNCEMENTS_ARCHIVE'			=> 'Lưu trữ',
	'BOARD_ANNOUNCEMENTS_ARCHIVED'			=> 'Thông báo đã được lưu trữ.',
	'BOARD_ANNOUNCEMENTS_DUPLICATE'			=> 'Nhân bản',
	'BOARD_ANNOUNCEMENTS_DUPLICATED'		=> 'Thông báo được sao chép dưới dạng bản nháp.',
	'BOARD_ANNOUNCEMENTS_COPY_OF'			=> 'Bản sao của %s',
	'BOARD_ANNOUNCEMENTS_NOW'				=> 'Ngay lập tức',
	'BOARD_ANNOUNCEMENTS_NO_END'			=> 'Không có ngày kết thúc',
	'BOARD_ANNOUNCEMENTS_UNTITLED'			=> 'Thông báo không có tiêu đề',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH'	=> 'khả năng hiển thị thông báo diễn đàn',
	'BOARD_ANNOUNCEMENTS_GLOBAL_DISABLED'	=> 'Tất cả các thông báo hiện đang bị ẩn.',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH_EXPLAIN' => 'Ẩn hoặc hiển thị tất cả thông báo mà không thay đổi trạng thái riêng lẻ của chúng.',
	'BOARD_ANNOUNCEMENTS_DISMISS_EXPLAIN'	=> 'Khách truy cập có thể ẩn thông báo này sau khi đọc nó.',
	'BOARD_ANNOUNCEMENTS_REORDER_FILTERED'	=> 'Xóa bộ lọc để thay đổi thứ tự thông báo.',
	'BOARD_ANNOUNCEMENTS_FILTER_EMPTY'		=> 'Không có thông báo nào phù hợp với các bộ lọc này.',
	'BOARD_ANNOUNCEMENTS_BULK_ACTION'		=> 'Hành động hàng loạt',
	'BOARD_ANNOUNCEMENTS_BULK_UPDATED'		=> 'Thông báo được chọn đã được cập nhật.',
	'BOARD_ANNOUNCEMENTS_DELETE_PERMANENTLY' => 'Xóa vĩnh viễn',
	'BOARD_ANNOUNCEMENTS_PREVIEW_MOBILE'	=> 'Chiều rộng di động',
	'BOARD_ANNOUNCEMENTS_JAVASCRIPT_REQUIRED' => 'Phải bật JavaScript để xem trước và sử dụng đầy đủ chức năng của trình soạn thảo.',
	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Thông báo trên bảng đã bị xóa',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Không thể xóa thông báo trên bảng',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Thông báo của hội đồng quản trị không thể lấy được khóa bảng. Một quá trình khác có thể đang giữ khóa. Khóa sẽ bị buộc phải mở sau khi hết thời gian 1 giờ.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Thông báo được yêu cầu không tồn tại.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Thông báo được yêu cầu không có phụ huynh.',
));
