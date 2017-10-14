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

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'הצג את הכרזת המערכת',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'מי רשאי לצפות בהכרזה זו',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'אפשר למשתמשים להסתיר את הכרזת המערכת',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'כל אחד',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'צבע רקע של הכרזת המערכת',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'אתה יכול לשנות את צבע הרקע של ההכרזה באמצעות שימוש בקוד HEX (לדוגמה:FFF80).אל תכתוב דבר אם ברצונך להשתמש בצבע ברירת מחדל.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'מועד הפסקת פרסום של הכרזת פורום',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'בחר תאריך שבו ההכרזה תפסיק להיות מפורסמת. השאר ריק אם ברצונך שההכרזה לא תופסק.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'תאריך הפסקת הפרסום שגוי או הינו בעבר.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_FORMAT'		=> 'YYYY-MM-DD HH:MM',

	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'תוכן הכרזת המערכת',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'תצוגה מקדימה של הכרזת המערכת',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'הכרזת המערכת עודכנה.',
));
