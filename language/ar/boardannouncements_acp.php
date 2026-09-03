<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* Arabic translation by dzyasseron (http://tajribaty.com/phpbb)
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'إعدادات لوحة الإعلانات',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'هنا يمكنك إدارة وإنشاء لوحات إعلانية تظهر في جميع صفحات منتداك.',

	'BOARD_ANNOUNCEMENTS_ENABLE_ALL'		=> 'تمكين إعلانات المجلس',

	'BOARD_ANNOUNCEMENTS_OPTIONS'			=> 'Announcement options',

	'BOARD_ANNOUNCEMENTS_DESC'				=> 'وصف',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'الوصف طويل جدًا. تتطلب بعض الأحرف الخاصة مساحة تخزين إضافية.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'وصف موجز لهذا الإعلان. سيكون هذا مرئيًا هنا فقط في ACP للمساعدة في تحديد هذا الإعلان.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'عرض لوحة الإعلانات هذه',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'من يستطيع مشاهدة لوحة الإعلانات هذه',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'السماح للمستخدمين برفض لوحة الإعلانات هذه',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'تحديد المكان الذي يجب أن يتم عرض هذا الإعلان فيه',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_EXPLAIN'	=> 'حدد موقعًا واحدًا أو أكثر لعرض الإعلان. لعرضه في كل مكان، اترك التحديد فارغًا. استخدم زر الأوامر (Mac) أو التحكم (Windows) لتحديد مواقع متعددة.',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'كل واحد',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'لون خلفية لوحة الإعلانات',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'يجب أن يكون لون الخلفية رمز لون سداسي عشري مكونًا من ستة أحرف.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'يمكنك تغيير لون خلفية لوحة الاعلانات باستعمال كود hex (مثل: FFFF80). اترك هذا الحقل فارغا لاستعمال اللون الافتراضي.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'تاريخ نهاية لوحة الإعلانات',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'ضع تاريخ لإخفاء لوحة الإعلانات أوتوماتيكيا. اتركها فارغة لجعل لوحة الإعلانات دائمة وغير محددة بتاريخ.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'تاريخ الانتهاء غير صالح أو أنه مضى.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'إعلان المنتدى لا يحتوي على رسالة',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'رسالة لوحة الاعلانات',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'معاينة - لوحة الاعلانات',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'تم تحديث لوحة الاعلانات.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'وصف',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_WHERE'		=> 'موقع',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'مرئي ل',
	'BOARD_ANNOUNCEMENTS_TH_ENABLED'		=> 'ممكّن',
	'BOARD_ANNOUNCEMENTS_TH_CREATED_DATE'	=> 'تاريخ الإنشاء',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRY_DATE'	=> 'تاريخ انتهاء الصلاحية',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRED'		=> 'منتهي الصلاحية',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'في كل مكان',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'مؤشر المجلس',
	'BOARD_ANNOUNCEMENTS_FORUMS'			=> 'المنتديات المختارة',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'لا توجد إعلانات لوحة لعرضها',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'إنشاء إعلان',

	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'تم حذف إعلان المجلس',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'لا يمكن حذف إعلان المجلس',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'فشلت إعلانات اللوحة في الحصول على قفل الجدول. قد تكون عملية أخرى هي الضغط على القفل. يتم تحرير الأقفال قسراً بعد مهلة قدرها ساعة واحدة.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'الإعلان المطلوب غير موجود.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'الإعلان المطلوب ليس له أصل.',
));
