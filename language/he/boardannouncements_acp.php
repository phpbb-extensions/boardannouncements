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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'הגדרות הכרזות מערכת',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'כאן תוכל לנהל וליצור הכרזת מערכת שתופיע בכל עמוד במערכת שלך.',



	'BOARD_ANNOUNCEMENTS_DESC'				=> 'תֵאוּר',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'התיאור ארוך מדי. תווים מיוחדים מסוימים דורשים שטח אחסון נוסף.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'תיאור קצר להודעה זו. זה יהיה גלוי רק כאן ב-ACP כדי לסייע בזיהוי ההודעה הזו.',

	'BOARD_ANNOUNCEMENTS_USERS'				=> 'מי רשאי לצפות בהכרזה זו',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'אפשר למשתמשים להסתיר את הכרזת המערכת',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'היכן יש להציג הודעה זו',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'כל אחד',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'צבע רקע של הכרזת המערכת',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_PICKER'	=> 'בוחר צבעי רקע',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_HEX'		=> 'צבע רקע קוד הקסדצימלי',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'צבע הרקע חייב להיות קוד צבע הקסדצימלי בן שישה תווים.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'בחר צבע רקע עבור האפשרות צבע מותאם אישית, או הזן קוד הקסדצימלי בן שישה תווים.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'מועד הפסקת פרסום של הכרזת פורום',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'בחר תאריך שבו ההכרזה תפסיק להיות מפורסמת. השאר ריק אם ברצונך שההכרזה לא תופסק.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'תאריך הפסקת הפרסום שגוי או הינו בעבר.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'הודעת המועצה אינה מכילה הודעה',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'תוכן הכרזת המערכת',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'תצוגה מקדימה של הכרזת המערכת',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'הכרזת המערכת עודכנה.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'הַכרָזָה',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'גלוי ל',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'בְּכָל מָקוֹם',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'אינדקס לוח',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'אין הודעות לוח להצגה',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'צור הודעה',

	'BOARD_ANNOUNCEMENTS_EDIT'				=> 'ערוך הודעה',
	'BOARD_ANNOUNCEMENTS_EDITOR_EXPLAIN'	=> 'צור את ההודעה, בחר את הקהל שלה, ושלוט מתי היא מופיעה.',
	'BOARD_ANNOUNCEMENTS_CONTENT'			=> 'תוֹכֶן',
	'BOARD_ANNOUNCEMENTS_TITLE'				=> 'כותרת הכרזה',
	'BOARD_ANNOUNCEMENTS_TITLE_EXPLAIN'		=> 'כותרת אופציונלית מוצגת מעל הודעת ההכרזה.',
	'BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG'	=> 'כותרת ההודעה חייבת להכיל 255 תווים או פחות.',
	'BOARD_ANNOUNCEMENTS_APPEARANCE'		=> 'הוֹפָעָה',
	'BOARD_ANNOUNCEMENTS_TONE'				=> 'גוון צבע',
	'BOARD_ANNOUNCEMENTS_TONE_EXPLAIN'		=> 'בחר ערכת צבעים מוגדרת מראש, או בחר צבע מותאם אישית כדי לבחור צבע משלך.',
	'BOARD_ANNOUNCEMENTS_TONE_NEUTRAL'		=> 'נֵטרָלִי',
	'BOARD_ANNOUNCEMENTS_TONE_INFO'			=> 'מֵידָע',
	'BOARD_ANNOUNCEMENTS_TONE_SUCCESS'		=> 'הַצלָחָה',
	'BOARD_ANNOUNCEMENTS_TONE_WARNING'		=> 'אַזהָרָה',
	'BOARD_ANNOUNCEMENTS_TONE_CRITICAL'		=> 'קרִיטִי',
	'BOARD_ANNOUNCEMENTS_TONE_CUSTOM'		=> 'צבע מותאם אישית',
	'BOARD_ANNOUNCEMENTS_TONE_INVALID'		=> 'בחר גוון צבע חוקי.',
	'BOARD_ANNOUNCEMENTS_AUDIENCE_LOCATION'	=> 'קהל ומיקום',
	'BOARD_ANNOUNCEMENTS_SELECTED_GROUPS'	=> 'קבוצות נבחרות',
	'BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED'	=> 'בחר קבוצה אחת לפחות כאשר נבחרה קבוצות נבחרות.',
	'BOARD_ANNOUNCEMENTS_SELECTED_LOCATIONS' => 'מיקומים נבחרים',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_REQUIRED' => 'בחר מיקום אחד לפחות כאשר נבחרים מיקומים נבחרים.',
	'BOARD_ANNOUNCEMENTS_LOCATION_MODE_INVALID' => 'בחר מיקום תצוגה חוקי.',
	'BOARD_ANNOUNCEMENTS_INCLUDE_CHILDREN'	=> 'הצג גם בתתי פורומים',
	'BOARD_ANNOUNCEMENTS_LOCATION_EMPTY'	=> 'אין מיקומים שתואמים לחיפוש שלך.',
	'BOARD_ANNOUNCEMENTS_SCHEDULE_BEHAVIOR'	=> 'לוח זמנים והתנהגות',
	'BOARD_ANNOUNCEMENTS_SCHEDULE'			=> 'לוּחַ זְמַנִים',
	'BOARD_ANNOUNCEMENTS_START'				=> 'תאריך התחלה',
	'BOARD_ANNOUNCEMENTS_START_EXPLAIN'		=> 'השאר ריק כדי להתחיל להציג את ההודעה באופן מיידי.',
	'BOARD_ANNOUNCEMENTS_START_INVALID'		=> 'תאריך ההתחלה אינו חוקי.',
	'BOARD_ANNOUNCEMENTS_FILTER'			=> 'לְסַנֵן',
	'BOARD_ANNOUNCEMENTS_STATUS'			=> 'סטָטוּס',
	'BOARD_ANNOUNCEMENTS_STATUS_ALL'		=> 'כֹּל',
	'BOARD_ANNOUNCEMENTS_STATUS_ACTIVE'		=> 'פָּעִיל',
	'BOARD_ANNOUNCEMENTS_STATUS_SCHEDULED'	=> 'מתוזמן',
	'BOARD_ANNOUNCEMENTS_STATUS_DRAFT'		=> 'טְיוּטָה',
	'BOARD_ANNOUNCEMENTS_STATUS_EXPIRED'	=> 'פג תוקף',
	'BOARD_ANNOUNCEMENTS_STATUS_ARCHIVED'	=> 'בארכיון',
	'BOARD_ANNOUNCEMENTS_STATE_INVALID'		=> 'בחר סטטוס חוקי.',
	'BOARD_ANNOUNCEMENTS_PUBLISH'			=> 'לְפַרְסֵם',
	'BOARD_ANNOUNCEMENTS_PUBLISHED'			=> 'פורסם',
	'BOARD_ANNOUNCEMENTS_SHOW_AGAIN'		=> 'הצג שוב לכולם',
	'BOARD_ANNOUNCEMENTS_SHOWN_AGAIN'		=> 'ההודעה תוצג שוב לכולם.',
	'BOARD_ANNOUNCEMENTS_ARCHIVE'			=> 'ארכיון',
	'BOARD_ANNOUNCEMENTS_ARCHIVED'			=> 'ההודעה הועברה לארכיון.',
	'BOARD_ANNOUNCEMENTS_DUPLICATE'			=> 'לְשַׁכְפֵּל',
	'BOARD_ANNOUNCEMENTS_DUPLICATED'		=> 'ההודעה שוכפלה כטיוטה.',
	'BOARD_ANNOUNCEMENTS_COPY_OF'			=> 'עותק של %s',
	'BOARD_ANNOUNCEMENTS_NOW'				=> 'מִיָד',
	'BOARD_ANNOUNCEMENTS_NO_END'			=> 'אין תאריך סיום',
	'BOARD_ANNOUNCEMENTS_UNTITLED'			=> 'הודעה ללא כותרת',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH'	=> 'נראות הודעות הפורום',
	'BOARD_ANNOUNCEMENTS_GLOBAL_DISABLED'	=> 'כל ההודעות מוסתרות כרגע.',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH_EXPLAIN' => 'הסתר או הצג את כל ההודעות מבלי לשנות את הסטטוסים האישיים שלהן.',
	'BOARD_ANNOUNCEMENTS_DISMISS_EXPLAIN'	=> 'מבקרים עשויים להסתיר הודעה זו לאחר קריאתה.',
	'BOARD_ANNOUNCEMENTS_REORDER_FILTERED'	=> 'נקה מסננים כדי לשנות את סדר ההכרזה.',
	'BOARD_ANNOUNCEMENTS_FILTER_EMPTY'		=> 'אין הודעות שתואמות למסננים אלו.',
	'BOARD_ANNOUNCEMENTS_BULK_ACTION'		=> 'פעולה בתפזורת',
	'BOARD_ANNOUNCEMENTS_BULK_UPDATED'		=> 'הודעות נבחרות עודכנו.',
	'BOARD_ANNOUNCEMENTS_DELETE_PERMANENTLY' => 'מחק לצמיתות',
	'BOARD_ANNOUNCEMENTS_PREVIEW_MOBILE'	=> 'רוחב נייד',
	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'הודעת הדירקטוריון נמחקה',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'לא ניתן היה למחוק את הודעת הדירקטוריון',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'הודעות המועצה לא הצליחו להשיג את מנעול השולחן. תהליך אחר עשוי להיות החזקת המנעול. מנעולים משוחררים בכוח לאחר פסק זמן של שעה.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'ההודעה המבוקשת לא קיימת.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'להודעה המבוקשת אין הורה.',
));
