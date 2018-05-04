<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* Slovak translation by Senky (https://github.com/senky)
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Nastavenia oznámení fóra',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Tu môžete spravovať a vytvárať oznam fóra, ktorý bude zobrazený na každej stránke vášho fóra.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Zobraziť tento oznam',
	'BOARD_ANNOUNCEMENTS_INDEX_ONLY'		=> 'Display on board index only',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Kto môže vidieť tento oznam',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Povoliť používateľom skyť tento oznam',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Každý',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Farba pozadia tohto oznamu',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Môžete zmeniť farbu pozadia tohto oznamu použitím hex kódu (napr: FFFF80). Pre predvolenú farbu nechajte toto pole prázdne.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Dátum platnosti oznamu',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Nastavte dátum, kedy skončí platnosť oznamu a bude vypnutý. Ak nechcete aby oznam expiroval, nechajte toto pole prázdne.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Dátum platnosti je nesprávny alebo už starý.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_FORMAT'		=> 'RRRR-MM-DD HH:MM',

	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Text oznamu fóra',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Oznam fóra - Náhľad',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Oznam fóra bol aktualizovaný.',
));
