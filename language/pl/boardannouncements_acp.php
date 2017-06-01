<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* Polish translation by Pico (aka Pico88)
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Ustawienia ogłoszeń',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Tutaj możesz zarządzać i stworzyć ogłoszenie, które będzie wyświetlane na każdej stronie forum.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Wyświetlaj ogłoszenie',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Kto może zobaczyć tę zobaczyć ogłoszenie',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Zezwalaj użytkownikom na zamknięcie ogłoszenia',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Wszyscy',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Kolor tła ogłoszenia',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Możesz zmienić kolor tła ogłoszenia używając kodu hex (szesnastkowego) np.: FFFF80. Pozostaw pole puste, aby użyć domyślnego koloru.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Deska data ważności ogłoszenia',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Ustaw datę wygaśnięcia ogłoszenia i stanie się niedostępna. Pozostaw puste pole, jeśli nie chcesz, aby ogłoszenie przestało obowiązywać.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Data ważności była nieprawidłowa lub już wygasła.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_FORMAT'		=> 'YYYY-MM-DD HH:MM',

	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Treść ogłoszenia',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Ogłoszenie - Podgląd',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Ogłoszenie zostało zaktualizowane.',
));
