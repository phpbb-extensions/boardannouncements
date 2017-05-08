<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* Czech - translation by Josef Kažimír (www.webcrew.cz) "kazimir@webcrew.cz"
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Nastavení Board oznámení',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Zde můžete spravovat a vytvořit oznámení, které se bude zobrazovat na každé stránce vašeho fóra.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Zobrazí toto oznámení',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Komu nechat zobrazit toto oznámení',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Povolit uživatelům odmítnout toto oznámení',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Každý',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Barva pozadí oznámení',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Můžete změnit barvu pozadí (například: FFFF80). Ponechte toto pole prázdné pokud chcete výchozí barvu.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Datum vypršení platnosti oznámení',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Nastavte datum vypršení platnosti oznámení a jeho zrušení. Nechte toto pole prázdné, pokud nechcete, aby oznámení vypršela.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Datum vypršení platnosti bylo neplatné nebo již vypršela.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_FORMAT'		=> 'YYYY-MM-DD HH:MM',

	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Board oznámení zpráva',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Board oznámení - náhled',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Board oznámení bylo aktualizováno.',
));
