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



	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Popis',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'Popis je príliš dlhý. Niektoré špeciálne znaky vyžadujú ďalší úložný priestor.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Krátky popis tohto oznámenia. Toto bude viditeľné iba tu v administrátorskom paneli, aby to pomohlo identifikovať toto oznámenie.',

	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Kto môže vidieť tento oznam',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Povoliť používateľom skyť tento oznam',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Kde by sa toto oznámenie malo zobraziť',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Každý',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Farba pozadia tohto oznamu',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_PICKER'	=> 'Výber farby pozadia',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_HEX'		=> 'Šestnástkový kód farby pozadia',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'Farba pozadia musí byť šesťmiestny hexadecimálny kód farby.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Vyberte farbu pozadia pre možnosť Vlastná farba alebo zadajte šesťmiestny hexadecimálny kód.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Dátum platnosti oznamu',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Nastavte dátum, kedy skončí platnosť oznamu a bude vypnutý. Ak nechcete aby oznam expiroval, nechajte toto pole prázdne.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Dátum platnosti je nesprávny alebo už starý.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Oznámenie rady neobsahuje žiadnu správu',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Text oznamu fóra',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Oznam fóra - Náhľad',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Oznam fóra bol aktualizovaný.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Oznámenie',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Viditeľné pre',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Všade',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Obsah fóra',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Neexistujú žiadne oznámenia na zobrazenie',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Vytvoriť oznámenie',

	'BOARD_ANNOUNCEMENTS_EDIT'				=> 'Upraviť oznámenie',
	'BOARD_ANNOUNCEMENTS_EDITOR_EXPLAIN'	=> 'Vytvorte správu, vyberte jej publikum a ovládajte, kedy sa zobrazí.',
	'BOARD_ANNOUNCEMENTS_CONTENT'			=> 'Obsah',
	'BOARD_ANNOUNCEMENTS_TITLE'				=> 'Nadpis oznámenia',
	'BOARD_ANNOUNCEMENTS_TITLE_EXPLAIN'		=> 'Voliteľný nadpis zobrazený nad oznamovacou správou.',
	'BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG'	=> 'Nadpis oznámenia môže mať maximálne 255 znakov.',
	'BOARD_ANNOUNCEMENTS_APPEARANCE'		=> 'Vzhľad',
	'BOARD_ANNOUNCEMENTS_TONE'				=> 'Farebný tón',
	'BOARD_ANNOUNCEMENTS_TONE_EXPLAIN'		=> 'Vyberte prednastavenú farebnú schému alebo vyberte možnosť Vlastná farba a vyberte si vlastnú.',
	'BOARD_ANNOUNCEMENTS_TONE_NEUTRAL'		=> 'Neutrálne',
	'BOARD_ANNOUNCEMENTS_TONE_INFO'			=> 'Informácie',
	'BOARD_ANNOUNCEMENTS_TONE_SUCCESS'		=> 'Úspech',
	'BOARD_ANNOUNCEMENTS_TONE_WARNING'		=> 'POZOR',
	'BOARD_ANNOUNCEMENTS_TONE_CRITICAL'		=> 'Kritické',
	'BOARD_ANNOUNCEMENTS_TONE_CUSTOM'		=> 'Vlastná farba',
	'BOARD_ANNOUNCEMENTS_TONE_INVALID'		=> 'Vyberte platný farebný tón.',
	'BOARD_ANNOUNCEMENTS_AUDIENCE_LOCATION'	=> 'Publikum a umiestnenie',
	'BOARD_ANNOUNCEMENTS_SELECTED_GROUPS'	=> 'Vybrané skupiny',
	'BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED'	=> 'Vyberte aspoň jednu skupinu, keď je vybratá možnosť Vybraté skupiny.',
	'BOARD_ANNOUNCEMENTS_SELECTED_LOCATIONS' => 'Vybrané lokality',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_REQUIRED' => 'Keď je vybratá možnosť Vybrané polohy, vyberte aspoň jedno miesto.',
	'BOARD_ANNOUNCEMENTS_LOCATION_MODE_INVALID' => 'Vyberte platné umiestnenie zobrazenia.',
	'BOARD_ANNOUNCEMENTS_INCLUDE_CHILDREN'	=> 'Zobrazovať aj v podfórach',
	'BOARD_ANNOUNCEMENTS_LOCATION_EMPTY'	=> 'Vášmu vyhľadávaniu nezodpovedajú žiadne miesta.',
	'BOARD_ANNOUNCEMENTS_SCHEDULE_BEHAVIOR'	=> 'Rozvrh a správanie',
	'BOARD_ANNOUNCEMENTS_SCHEDULE'			=> 'Rozvrh',
	'BOARD_ANNOUNCEMENTS_START'				=> 'Dátum začiatku',
	'BOARD_ANNOUNCEMENTS_START_EXPLAIN'		=> 'Nechajte prázdne, aby sa oznámenie začalo zobrazovať okamžite.',
	'BOARD_ANNOUNCEMENTS_START_INVALID'		=> 'Dátum začiatku je neplatný.',
	'BOARD_ANNOUNCEMENTS_FILTER'			=> 'Filter',
	'BOARD_ANNOUNCEMENTS_STATUS'			=> 'Stav',
	'BOARD_ANNOUNCEMENTS_STATUS_ALL'		=> 'Všetky',
	'BOARD_ANNOUNCEMENTS_STATUS_ACTIVE'		=> 'Aktívne',
	'BOARD_ANNOUNCEMENTS_STATUS_SCHEDULED'	=> 'Naplánované',
	'BOARD_ANNOUNCEMENTS_STATUS_DRAFT'		=> 'Návrh',
	'BOARD_ANNOUNCEMENTS_STATUS_EXPIRED'	=> 'Platnosť vypršala',
	'BOARD_ANNOUNCEMENTS_STATUS_ARCHIVED'	=> 'Archivované',
	'BOARD_ANNOUNCEMENTS_STATE_INVALID'		=> 'Vyberte platný stav.',
	'BOARD_ANNOUNCEMENTS_PUBLISH'			=> 'Publikovať',
	'BOARD_ANNOUNCEMENTS_PUBLISHED'			=> 'Zverejnené',
	'BOARD_ANNOUNCEMENTS_SHOW_AGAIN'		=> 'Ukážte to znova všetkým',
	'BOARD_ANNOUNCEMENTS_SHOWN_AGAIN'		=> 'Oznámenie sa znova zobrazí všetkým.',
	'BOARD_ANNOUNCEMENTS_ARCHIVE'			=> 'Archív',
	'BOARD_ANNOUNCEMENTS_ARCHIVED'			=> 'Oznámenie bolo archivované.',
	'BOARD_ANNOUNCEMENTS_DUPLICATE'			=> 'Duplicitné',
	'BOARD_ANNOUNCEMENTS_DUPLICATED'		=> 'Oznámenie duplikované ako koncept.',
	'BOARD_ANNOUNCEMENTS_COPY_OF'			=> 'Kópia %s',
	'BOARD_ANNOUNCEMENTS_NOW'				=> 'Okamžite',
	'BOARD_ANNOUNCEMENTS_NO_END'			=> 'Bez dátumu ukončenia',
	'BOARD_ANNOUNCEMENTS_UNTITLED'			=> 'Oznámenie bez názvu',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH'	=> 'viditeľnosť oznámení na fóre',
	'BOARD_ANNOUNCEMENTS_GLOBAL_DISABLED'	=> 'Všetky oznámenia sú momentálne skryté.',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH_EXPLAIN' => 'Skryť alebo zobraziť všetky oznámenia bez zmeny ich jednotlivých stavov.',
	'BOARD_ANNOUNCEMENTS_DISMISS_EXPLAIN'	=> 'Návštevníci môžu tento oznam po prečítaní skryť.',
	'BOARD_ANNOUNCEMENTS_REORDER_FILTERED'	=> 'Ak chcete zmeniť poradie oznámení, vymažte filtre.',
	'BOARD_ANNOUNCEMENTS_FILTER_EMPTY'		=> 'Týmto filtrom nezodpovedajú žiadne oznámenia.',
	'BOARD_ANNOUNCEMENTS_BULK_ACTION'		=> 'Hromadná akcia',
	'BOARD_ANNOUNCEMENTS_BULK_UPDATED'		=> 'Vybrané oznámenia boli aktualizované.',
	'BOARD_ANNOUNCEMENTS_DELETE_PERMANENTLY' => 'Natrvalo odstrániť',
	'BOARD_ANNOUNCEMENTS_PREVIEW_MOBILE'	=> 'Mobilná šírka',
	'BOARD_ANNOUNCEMENTS_JAVASCRIPT_REQUIRED' => 'Pre náhľad a plnú funkčnosť editora musí byť povolený JavaScript.',
	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Oznámenie rady bolo vymazané',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Oznámenie sa nepodarilo odstrániť',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Oznámeniam sa nepodarilo získať zamknutie tabuľky. Iný proces môže držať tabuľku zamknutú. Zamknutie sa násilne uvoľní po uplynutí 1 hodiny.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Požadované oznámenie neexistuje.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Požadované oznámenie nemá nadradenie.',
));
