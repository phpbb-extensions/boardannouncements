<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* Swedish translation by Holger (http://www.maskinisten.net)
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Inställningar för forummeddelanden',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Här kan du hantera och skapa ett forummeddelande som kommer att visas på varje sida i ditt forum.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Visa detta forummeddelande',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Vem kan se detta forummeddelande',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Tillåt användare att stänga detta forummeddelande',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Alla',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Forummeddelandets bakgrundsfärg',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Du kan ändra forummeddelandets bakgrundsfärg genom att ange en hex-kod (t.ex.: FFFF80). Lämna fältet tomt om du vill använda standardfärgen.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Forummeddelandets utgångsdatum',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Ange datum då meddelandet upphör och bli inaktiverat. Lämna det här fältet tomt om du inte vill att meddelandet upphör att gälla.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Utgångsdatumet var ogiltigt eller har redan gått ut.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_FORMAT'		=> 'YYYY-MM-DD HH:MM',

	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Forummeddelande',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Forummeddelande - förhandsgranskning',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Forummeddelandet har uppdaterats.',
));
