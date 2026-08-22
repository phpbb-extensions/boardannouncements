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

	'BOARD_ANNOUNCEMENTS_ENABLE_ALL'		=> 'Povolit oznámení na nástěnce',

	'BOARD_ANNOUNCEMENTS_OPTIONS'			=> 'Announcement options',

	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Popis',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Krátký popis tohoto oznámení. Toto bude viditelné pouze zde v AKT, aby bylo možné toto oznámení identifikovat.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Zobrazí toto oznámení',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Komu nechat zobrazit toto oznámení',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Povolit uživatelům odmítnout toto oznámení',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Omezte, kde se má toto oznámení zobrazovat',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_EXPLAIN'	=> 'Vyberte jedno nebo více umístění pro zobrazení oznámení. Chcete-li jej zobrazit všude, ponechte výběr prázdný. Pomocí Command (Mac) nebo Control (Windows) kliknutím vyberte více umístění.',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Každý',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Barva pozadí oznámení',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Můžete změnit barvu pozadí (například: FFFF80). Ponechte toto pole prázdné pokud chcete výchozí barvu.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Datum vypršení platnosti oznámení',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Nastavte datum vypršení platnosti oznámení a jeho zrušení. Nechte toto pole prázdné, pokud nechcete, aby oznámení vypršela.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Datum vypršení platnosti bylo neplatné nebo již vypršela.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Oznámení rady neobsahuje žádnou zprávu',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Board oznámení zpráva',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Board oznámení - náhled',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Board oznámení bylo aktualizováno.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Popis',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_WHERE'		=> 'Umístění',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Viditelné pro',
	'BOARD_ANNOUNCEMENTS_TH_ENABLED'		=> 'Povoleno',
	'BOARD_ANNOUNCEMENTS_TH_CREATED_DATE'	=> 'Datum vytvoření',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRY_DATE'	=> 'Datum spotřeby',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRED'		=> 'Platnost vypršela',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Všude',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Index desky',
	'BOARD_ANNOUNCEMENTS_FORUMS'			=> 'Vybraná fóra',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Nejsou zde žádná oznámení na fóru k zobrazení',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Vytvořit oznámení',

	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Oznámení rady bylo smazáno',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Oznámení fóra se nepodařilo smazat',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Oznámení rady se nepodařilo získat zámek stolu. Dalším procesem může být držení zámku. Zámky jsou násilně uvolněny po uplynutí 1 hodiny.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Požadované oznámení neexistuje.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Požadované oznámení nemá rodiče.',
));
