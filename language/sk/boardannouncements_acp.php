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

	'BOARD_ANNOUNCEMENTS_ENABLE_ALL'		=> 'Povoliť oznamy na nástenke',

	'BOARD_ANNOUNCEMENTS_OPTIONS'			=> 'Možnosti oznámenia',

	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Popis',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'Popis je príliš dlhý. Niektoré špeciálne znaky vyžadujú ďalší úložný priestor.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Krátky popis tohto oznámenia. Toto bude viditeľné iba tu v administrátorskom paneli, aby to pomohlo identifikovať toto oznámenie.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Zobraziť tento oznam',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Kto môže vidieť tento oznam',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Povoliť používateľom skyť tento oznam',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Obmedzte, kde sa má toto oznámenie zobraziť',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_EXPLAIN'	=> 'Vyberte jedno alebo viac miest na zobrazenie oznámenia. Ak ho chcete zobraziť všade, ponechajte výber prázdny.',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Každý',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Farba pozadia tohto oznamu',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'Farba pozadia musí byť šesťmiestny hexadecimálny kód farby.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Môžete zmeniť farbu pozadia tohto oznamu použitím hex kódu (napr: FFFF80). Pre predvolenú farbu nechajte toto pole prázdne.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Dátum platnosti oznamu',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Nastavte dátum, kedy skončí platnosť oznamu a bude vypnutý. Ak nechcete aby oznam expiroval, nechajte toto pole prázdne.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Dátum platnosti je nesprávny alebo už starý.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Oznámenie rady neobsahuje žiadnu správu',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Text oznamu fóra',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Oznam fóra - Náhľad',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Oznam fóra bol aktualizovaný.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Popis',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_WHERE'		=> 'Lokalizácia',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Viditeľné pre',
	'BOARD_ANNOUNCEMENTS_TH_ENABLED'		=> 'Zapnuté',
	'BOARD_ANNOUNCEMENTS_TH_CREATED_DATE'	=> 'Dátum vytvorenia',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRY_DATE'	=> 'Dátum expirácie',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRED'		=> 'Platnosť vypršala',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Všade',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Obsah fóra',
	'BOARD_ANNOUNCEMENTS_FORUMS'			=> 'Vybraté fóra',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Neexistujú žiadne oznámenia na zobrazenie',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Vytvoriť oznámenie',

	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Oznámenie rady bolo vymazané',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Oznámenie sa nepodarilo odstrániť',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Oznámeniam sa nepodarilo získať zamknutie tabuľky. Iný proces môže držať tabuľku zamknutú. Zamknutie sa násilne uvoľní po uplynutí 1 hodiny.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Požadované oznámenie neexistuje.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Požadované oznámenie nemá nadradenie.',
));
