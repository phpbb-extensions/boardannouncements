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



	'BOARD_ANNOUNCEMENTS_DESC'				=> 'وصف',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'الوصف طويل جدًا. تتطلب بعض الأحرف الخاصة مساحة تخزين إضافية.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'وصف موجز لهذا الإعلان. سيكون هذا مرئيًا هنا فقط في ACP للمساعدة في تحديد هذا الإعلان.',

	'BOARD_ANNOUNCEMENTS_USERS'				=> 'من يستطيع مشاهدة لوحة الإعلانات هذه',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'السماح للمستخدمين برفض لوحة الإعلانات هذه',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'حيث يجب أن يتم عرض هذا الإعلان',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'كل واحد',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'لون خلفية لوحة الإعلانات',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_PICKER'	=> 'منتقي لون الخلفية',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_HEX'		=> 'لون الخلفية رمز سداسي عشري',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'يجب أن يكون لون الخلفية رمز لون سداسي عشري مكونًا من ستة أحرف.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'اختر لون خلفية لخيار اللون المخصص، أو أدخل رمزًا سداسيًا عشريًا مكونًا من ستة أحرف.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'تاريخ نهاية لوحة الإعلانات',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'ضع تاريخ لإخفاء لوحة الإعلانات أوتوماتيكيا. اتركها فارغة لجعل لوحة الإعلانات دائمة وغير محددة بتاريخ.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'تاريخ الانتهاء غير صالح أو أنه مضى.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'إعلان المنتدى لا يحتوي على رسالة',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'رسالة لوحة الاعلانات',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'معاينة - لوحة الاعلانات',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'تم تحديث لوحة الاعلانات.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'إعلان',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'مرئي ل',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'في كل مكان',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'مؤشر المجلس',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'لا توجد إعلانات لوحة لعرضها',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'إنشاء إعلان',

	'BOARD_ANNOUNCEMENTS_EDIT'				=> 'تعديل اعلان',
	'BOARD_ANNOUNCEMENTS_EDITOR_EXPLAIN'	=> 'قم بتأليف الرسالة واختيار جمهورها والتحكم في وقت ظهورها.',
	'BOARD_ANNOUNCEMENTS_CONTENT'			=> 'محتوى',
	'BOARD_ANNOUNCEMENTS_TITLE'				=> 'عنوان الإعلان',
	'BOARD_ANNOUNCEMENTS_TITLE_EXPLAIN'		=> 'يتم عرض عنوان اختياري أعلى رسالة الإعلان.',
	'BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG'	=> 'يجب أن يكون عنوان الإعلان 255 حرفًا أو أقل.',
	'BOARD_ANNOUNCEMENTS_APPEARANCE'		=> 'مظهر',
	'BOARD_ANNOUNCEMENTS_TONE'				=> 'نغمة اللون',
	'BOARD_ANNOUNCEMENTS_TONE_EXPLAIN'		=> 'اختر نظام ألوان محدد مسبقًا، أو حدد لونًا مخصصًا لاختيار اللون الخاص بك.',
	'BOARD_ANNOUNCEMENTS_TONE_NEUTRAL'		=> 'حيادي',
	'BOARD_ANNOUNCEMENTS_TONE_INFO'			=> 'معلومة',
	'BOARD_ANNOUNCEMENTS_TONE_SUCCESS'		=> 'نجاح',
	'BOARD_ANNOUNCEMENTS_TONE_WARNING'		=> 'تحذير',
	'BOARD_ANNOUNCEMENTS_TONE_CRITICAL'		=> 'شديد الأهمية',
	'BOARD_ANNOUNCEMENTS_TONE_CUSTOM'		=> 'لون مخصص',
	'BOARD_ANNOUNCEMENTS_TONE_INVALID'		=> 'حدد درجة لون صالحة.',
	'BOARD_ANNOUNCEMENTS_AUDIENCE_LOCATION'	=> 'الجمهور والموقع',
	'BOARD_ANNOUNCEMENTS_SELECTED_GROUPS'	=> 'المجموعات المختارة',
	'BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED'	=> 'حدد مجموعة واحدة على الأقل عند اختيار المجموعات المحددة.',
	'BOARD_ANNOUNCEMENTS_SELECTED_LOCATIONS' => 'المواقع المختارة',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_REQUIRED' => 'حدد موقعًا واحدًا على الأقل عند اختيار المواقع المحددة.',
	'BOARD_ANNOUNCEMENTS_LOCATION_MODE_INVALID' => 'حدد موقع عرض صالحًا.',
	'BOARD_ANNOUNCEMENTS_INCLUDE_CHILDREN'	=> 'عرض أيضا في المنتديات الفرعية',
	'BOARD_ANNOUNCEMENTS_LOCATION_EMPTY'	=> 'لا توجد مواقع تطابق بحثك.',
	'BOARD_ANNOUNCEMENTS_SCHEDULE_BEHAVIOR'	=> 'الجدول الزمني والسلوك',
	'BOARD_ANNOUNCEMENTS_SCHEDULE'			=> 'جدول',
	'BOARD_ANNOUNCEMENTS_START'				=> 'تاريخ البدء',
	'BOARD_ANNOUNCEMENTS_START_EXPLAIN'		=> 'اتركه فارغًا لبدء عرض الإعلان فورًا.',
	'BOARD_ANNOUNCEMENTS_START_INVALID'		=> 'تاريخ البدء غير صالح.',
	'BOARD_ANNOUNCEMENTS_FILTER'			=> 'فلتر',
	'BOARD_ANNOUNCEMENTS_STATUS'			=> 'حالة',
	'BOARD_ANNOUNCEMENTS_STATUS_ALL'		=> 'الجميع',
	'BOARD_ANNOUNCEMENTS_STATUS_ACTIVE'		=> 'نشيط',
	'BOARD_ANNOUNCEMENTS_STATUS_SCHEDULED'	=> 'المقرر',
	'BOARD_ANNOUNCEMENTS_STATUS_DRAFT'		=> 'مسودة',
	'BOARD_ANNOUNCEMENTS_STATUS_EXPIRED'	=> 'منتهي الصلاحية',
	'BOARD_ANNOUNCEMENTS_STATUS_ARCHIVED'	=> 'مؤرشف',
	'BOARD_ANNOUNCEMENTS_STATE_INVALID'		=> 'حدد حالة صالحة.',
	'BOARD_ANNOUNCEMENTS_PUBLISH'			=> 'نشر',
	'BOARD_ANNOUNCEMENTS_PUBLISHED'			=> 'تم النشر',
	'BOARD_ANNOUNCEMENTS_SHOW_AGAIN'		=> 'تظهر مرة أخرى للجميع',
	'BOARD_ANNOUNCEMENTS_SHOWN_AGAIN'		=> 'سيتم عرض الإعلان مرة أخرى للجميع.',
	'BOARD_ANNOUNCEMENTS_ARCHIVE'			=> 'أرشيف',
	'BOARD_ANNOUNCEMENTS_ARCHIVED'			=> 'تم أرشفة الإعلان.',
	'BOARD_ANNOUNCEMENTS_DUPLICATE'			=> 'ينسخ',
	'BOARD_ANNOUNCEMENTS_DUPLICATED'		=> 'تم تكرار الإعلان كمسودة.',
	'BOARD_ANNOUNCEMENTS_COPY_OF'			=> 'نسخة من %s',
	'BOARD_ANNOUNCEMENTS_NOW'				=> 'في الحال',
	'BOARD_ANNOUNCEMENTS_NO_END'			=> 'لا يوجد تاريخ انتهاء',
	'BOARD_ANNOUNCEMENTS_UNTITLED'			=> 'إعلان بدون عنوان',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH'	=> 'رؤية إعلانات المنتدى',
	'BOARD_ANNOUNCEMENTS_GLOBAL_DISABLED'	=> 'جميع الإعلانات مخفية حاليا.',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH_EXPLAIN' => 'إخفاء أو إظهار جميع الإعلانات دون تغيير حالاتها الفردية.',
	'BOARD_ANNOUNCEMENTS_DISMISS_EXPLAIN'	=> 'يمكن للزائرين إخفاء هذا الإعلان بعد قراءته.',
	'BOARD_ANNOUNCEMENTS_REORDER_FILTERED'	=> 'مسح عوامل التصفية لتغيير ترتيب الإعلان.',
	'BOARD_ANNOUNCEMENTS_FILTER_EMPTY'		=> 'لا توجد إعلانات تتطابق مع عوامل التصفية هذه.',
	'BOARD_ANNOUNCEMENTS_BULK_ACTION'		=> 'العمل بالجملة',
	'BOARD_ANNOUNCEMENTS_BULK_UPDATED'		=> 'تم تحديث الإعلانات المختارة.',
	'BOARD_ANNOUNCEMENTS_DELETE_PERMANENTLY' => 'حذف نهائيا',
	'BOARD_ANNOUNCEMENTS_PREVIEW_MOBILE'	=> 'عرض الجوال',
	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'تم حذف إعلان المجلس',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'لا يمكن حذف إعلان المجلس',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'فشلت إعلانات اللوحة في الحصول على قفل الجدول. قد تكون عملية أخرى هي الضغط على القفل. يتم تحرير الأقفال قسراً بعد مهلة قدرها ساعة واحدة.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'الإعلان المطلوب غير موجود.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'الإعلان المطلوب ليس له أصل.',
));
