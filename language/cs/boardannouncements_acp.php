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



	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Popis',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'Popis je příliš dlouhý. Některé speciální znaky vyžadují další úložný prostor.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Krátký popis tohoto oznámení. Toto bude viditelné pouze zde v AKT, aby bylo možné toto oznámení identifikovat.',

	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Komu nechat zobrazit toto oznámení',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Povolit uživatelům odmítnout toto oznámení',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Kde má být toto oznámení zobrazeno',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Každý',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Barva pozadí oznámení',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_PICKER'	=> 'Výběr barvy pozadí',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_HEX'		=> 'Hexadecimální kód barvy pozadí',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'Barva pozadí musí být šestimístný hexadecimální kód barvy.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Vyberte barvu pozadí pro volbu Vlastní barva nebo zadejte šestimístný hexadecimální kód.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Datum vypršení platnosti oznámení',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Nastavte datum vypršení platnosti oznámení a jeho zrušení. Nechte toto pole prázdné, pokud nechcete, aby oznámení vypršela.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Datum vypršení platnosti bylo neplatné nebo již vypršela.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Oznámení rady neobsahuje žádnou zprávu',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Board oznámení zpráva',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Board oznámení - náhled',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Board oznámení bylo aktualizováno.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Oznámení',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Viditelné pro',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Všude',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Index desky',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Nejsou zde žádná oznámení na fóru k zobrazení',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Vytvořit oznámení',

	'BOARD_ANNOUNCEMENTS_EDIT'				=> 'Upravit oznámení',
	'BOARD_ANNOUNCEMENTS_EDITOR_EXPLAIN'	=> 'Vytvořte zprávu, vyberte její publikum a určete, kdy se zobrazí.',
	'BOARD_ANNOUNCEMENTS_CONTENT'			=> 'Obsah',
	'BOARD_ANNOUNCEMENTS_TITLE'				=> 'Nadpis oznámení',
	'BOARD_ANNOUNCEMENTS_TITLE_EXPLAIN'		=> 'Volitelný nadpis zobrazený nad oznamovací zprávou.',
	'BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG'	=> 'Nadpis oznámení musí mít 255 znaků nebo méně.',
	'BOARD_ANNOUNCEMENTS_APPEARANCE'		=> 'Vzhled',
	'BOARD_ANNOUNCEMENTS_TONE'				=> 'Barevný tón',
	'BOARD_ANNOUNCEMENTS_TONE_EXPLAIN'		=> 'Vyberte přednastavené barevné schéma nebo vyberte Vlastní barvu a vyberte si vlastní.',
	'BOARD_ANNOUNCEMENTS_TONE_NEUTRAL'		=> 'Neutrální',
	'BOARD_ANNOUNCEMENTS_TONE_INFO'			=> 'Informace',
	'BOARD_ANNOUNCEMENTS_TONE_SUCCESS'		=> 'Úspěch',
	'BOARD_ANNOUNCEMENTS_TONE_WARNING'		=> 'Varování',
	'BOARD_ANNOUNCEMENTS_TONE_CRITICAL'		=> 'Kritické',
	'BOARD_ANNOUNCEMENTS_TONE_CUSTOM'		=> 'Vlastní barva',
	'BOARD_ANNOUNCEMENTS_TONE_INVALID'		=> 'Vyberte platný barevný tón.',
	'BOARD_ANNOUNCEMENTS_AUDIENCE_LOCATION'	=> 'Publikum a umístění',
	'BOARD_ANNOUNCEMENTS_SELECTED_GROUPS'	=> 'Vybrané skupiny',
	'BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED'	=> 'Vyberte alespoň jednu skupinu, když je vybrána možnost Vybrané skupiny.',
	'BOARD_ANNOUNCEMENTS_SELECTED_LOCATIONS' => 'Vybrané lokality',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_REQUIRED' => 'Vyberte alespoň jedno umístění, když je vybrána možnost Vybraná umístění.',
	'BOARD_ANNOUNCEMENTS_LOCATION_MODE_INVALID' => 'Vyberte platné umístění zobrazení.',
	'BOARD_ANNOUNCEMENTS_INCLUDE_CHILDREN'	=> 'Zobrazovat také v podfórech',
	'BOARD_ANNOUNCEMENTS_LOCATION_EMPTY'	=> 'Vašemu vyhledávání neodpovídají žádná místa.',
	'BOARD_ANNOUNCEMENTS_SCHEDULE_BEHAVIOR'	=> 'Rozvrh a chování',
	'BOARD_ANNOUNCEMENTS_SCHEDULE'			=> 'Naplánovat',
	'BOARD_ANNOUNCEMENTS_START'				=> 'Datum zahájení',
	'BOARD_ANNOUNCEMENTS_START_EXPLAIN'		=> 'Chcete-li oznámení začít zobrazovat okamžitě, ponechte prázdné.',
	'BOARD_ANNOUNCEMENTS_START_INVALID'		=> 'Datum zahájení je neplatné.',
	'BOARD_ANNOUNCEMENTS_FILTER'			=> 'Filtr',
	'BOARD_ANNOUNCEMENTS_STATUS'			=> 'Postavení',
	'BOARD_ANNOUNCEMENTS_STATUS_ALL'		=> 'Vše',
	'BOARD_ANNOUNCEMENTS_STATUS_ACTIVE'		=> 'Aktivní',
	'BOARD_ANNOUNCEMENTS_STATUS_SCHEDULED'	=> 'Naplánováno',
	'BOARD_ANNOUNCEMENTS_STATUS_DRAFT'		=> 'Návrh',
	'BOARD_ANNOUNCEMENTS_STATUS_EXPIRED'	=> 'Platnost vypršela',
	'BOARD_ANNOUNCEMENTS_STATUS_ARCHIVED'	=> 'Archivováno',
	'BOARD_ANNOUNCEMENTS_STATE_INVALID'		=> 'Vyberte platný stav.',
	'BOARD_ANNOUNCEMENTS_PUBLISH'			=> 'Publikovat',
	'BOARD_ANNOUNCEMENTS_PUBLISHED'			=> 'Publikováno',
	'BOARD_ANNOUNCEMENTS_SHOW_AGAIN'		=> 'Ukažte znovu všem',
	'BOARD_ANNOUNCEMENTS_SHOWN_AGAIN'		=> 'Oznámení se znovu zobrazí všem.',
	'BOARD_ANNOUNCEMENTS_ARCHIVE'			=> 'Archiv',
	'BOARD_ANNOUNCEMENTS_ARCHIVED'			=> 'Oznámení archivováno.',
	'BOARD_ANNOUNCEMENTS_DUPLICATE'			=> 'Duplikát',
	'BOARD_ANNOUNCEMENTS_DUPLICATED'		=> 'Oznámení duplikováno jako koncept.',
	'BOARD_ANNOUNCEMENTS_COPY_OF'			=> 'Kopie %s',
	'BOARD_ANNOUNCEMENTS_NOW'				=> 'Ihned',
	'BOARD_ANNOUNCEMENTS_NO_END'			=> 'Žádné datum ukončení',
	'BOARD_ANNOUNCEMENTS_UNTITLED'			=> 'Oznámení bez názvu',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH'	=> 'viditelnost oznámení na fóru',
	'BOARD_ANNOUNCEMENTS_GLOBAL_DISABLED'	=> 'Všechna oznámení jsou aktuálně skryta.',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH_EXPLAIN' => 'Skrýt nebo zobrazit všechna oznámení, aniž by se změnil jejich individuální stav.',
	'BOARD_ANNOUNCEMENTS_DISMISS_EXPLAIN'	=> 'Návštěvníci mohou toto oznámení po přečtení skrýt.',
	'BOARD_ANNOUNCEMENTS_REORDER_FILTERED'	=> 'Chcete-li změnit pořadí oznámení, vymažte filtry.',
	'BOARD_ANNOUNCEMENTS_FILTER_EMPTY'		=> 'Těmto filtrům neodpovídají žádná oznámení.',
	'BOARD_ANNOUNCEMENTS_BULK_ACTION'		=> 'Hromadná akce',
	'BOARD_ANNOUNCEMENTS_BULK_UPDATED'		=> 'Vybraná oznámení byla aktualizována.',
	'BOARD_ANNOUNCEMENTS_DELETE_PERMANENTLY' => 'Smazat trvale',
	'BOARD_ANNOUNCEMENTS_PREVIEW_MOBILE'	=> 'Mobilní šířka',
	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Oznámení rady bylo smazáno',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Oznámení fóra se nepodařilo smazat',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Oznámení rady se nepodařilo získat zámek stolu. Dalším procesem může být držení zámku. Zámky jsou násilně uvolněny po uplynutí 1 hodiny.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Požadované oznámení neexistuje.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Požadované oznámení nemá rodiče.',
));
