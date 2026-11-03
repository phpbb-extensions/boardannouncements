<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* Estonian translation by phpBBeesti.com <http://www.phpbbeesti.com>
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Foorumi Teadaannete seaded',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Siin saate hallata ja luua foorumil olevat teadaannet, mis kuvatakse teie foorumi kõigil lehtedel.',



	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Kirjeldus',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'Kirjeldus on liiga pikk. Mõned erimärgid vajavad täiendavat salvestusruumi.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Selle teadaande lühikirjeldus. See on nähtav ainult siin AKV-s, et aidata seda teadaannet tuvastada.',

	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Kes saab vaadata seda Foorumi Teadaannet',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Luba kasutajatel keelata Foorumi Teadaannet',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Kus see teade tuleks kuvada',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Igaüks',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Foorumi Teadaannete tausta värv',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_PICKER'	=> 'Taustavärvi valija',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_HEX'		=> 'Taustavärvi kuueteistkümnendkood',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'Taustavärv peab olema kuuekohaline kuueteistkümnendsüsteemis värvikood.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Valige suvandi Kohandatud värv taustavärv või sisestage kuuekohaline kuueteistkümnendkood.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Foorumi Teadaande aegumise kuupäev',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Määrake kuupäev, millal teadeanne lõppeb ja muutub nähtamatuks. Jätke see väli tühjaks, kui te ei soovi, et teadeanne aeguks.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Aegumise kuupäev on vigane või on juba aegunud.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Juhatuse teade ei sisalda teadet',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Foorumi Teadaande sõnum',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Foorumi Teadaande - Eelvaade',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Foorumi Teadaanne on uuendatud.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Teadaanne',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Nähtav:',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Igal pool',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Juhatuse indeks',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Kuvamiseks pole tahvliteateid',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Loo teadaanne',

	'BOARD_ANNOUNCEMENTS_EDIT'				=> 'Muuda teadaannet',
	'BOARD_ANNOUNCEMENTS_EDITOR_EXPLAIN'	=> 'Koostage sõnum, valige selle sihtrühm ja kontrollige, millal see kuvatakse.',
	'BOARD_ANNOUNCEMENTS_CONTENT'			=> 'Sisu',
	'BOARD_ANNOUNCEMENTS_TITLE'				=> 'Kuulutuse pealkiri',
	'BOARD_ANNOUNCEMENTS_TITLE_EXPLAIN'		=> 'Valikuline pealkiri, mis kuvatakse teadaande sõnumi kohal.',
	'BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG'	=> 'Teadaannete päis peab olema 255 tähemärki või vähem.',
	'BOARD_ANNOUNCEMENTS_APPEARANCE'		=> 'Välimus',
	'BOARD_ANNOUNCEMENTS_TONE'				=> 'Värvi toon',
	'BOARD_ANNOUNCEMENTS_TONE_EXPLAIN'		=> 'Valige eelseadistatud värviskeem või valige oma värvi valimiseks Kohandatud värv.',
	'BOARD_ANNOUNCEMENTS_TONE_NEUTRAL'		=> 'Neutraalne',
	'BOARD_ANNOUNCEMENTS_TONE_INFO'			=> 'Teave',
	'BOARD_ANNOUNCEMENTS_TONE_SUCCESS'		=> 'Edu',
	'BOARD_ANNOUNCEMENTS_TONE_WARNING'		=> 'Hoiatus',
	'BOARD_ANNOUNCEMENTS_TONE_CRITICAL'		=> 'Kriitiline',
	'BOARD_ANNOUNCEMENTS_TONE_CUSTOM'		=> 'Kohandatud värv',
	'BOARD_ANNOUNCEMENTS_TONE_INVALID'		=> 'Valige sobiv värvitoon.',
	'BOARD_ANNOUNCEMENTS_AUDIENCE_LOCATION'	=> 'Publik ja asukoht',
	'BOARD_ANNOUNCEMENTS_SELECTED_GROUPS'	=> 'Valitud rühmad',
	'BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED'	=> 'Valige vähemalt üks rühm, kui on valitud Valitud rühmad.',
	'BOARD_ANNOUNCEMENTS_SELECTED_LOCATIONS' => 'Valitud asukohad',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_REQUIRED' => 'Valige vähemalt üks asukoht, kui on valitud Valitud asukohad.',
	'BOARD_ANNOUNCEMENTS_LOCATION_MODE_INVALID' => 'Valige sobiv kuvamiskoht.',
	'BOARD_ANNOUNCEMENTS_INCLUDE_CHILDREN'	=> 'Kuva ka alafoorumites',
	'BOARD_ANNOUNCEMENTS_LOCATION_EMPTY'	=> 'Teie otsingule ei vasta ükski asukoht.',
	'BOARD_ANNOUNCEMENTS_SCHEDULE_BEHAVIOR'	=> 'Ajakava ja käitumine',
	'BOARD_ANNOUNCEMENTS_SCHEDULE'			=> 'Ajakava',
	'BOARD_ANNOUNCEMENTS_START'				=> 'Alguskuupäev',
	'BOARD_ANNOUNCEMENTS_START_EXPLAIN'		=> 'Teate koheseks kuvamiseks jätke väli tühjaks.',
	'BOARD_ANNOUNCEMENTS_START_INVALID'		=> 'Alguskuupäev on kehtetu.',
	'BOARD_ANNOUNCEMENTS_FILTER'			=> 'Filter',
	'BOARD_ANNOUNCEMENTS_STATUS'			=> 'Olek',
	'BOARD_ANNOUNCEMENTS_STATUS_ALL'		=> 'Kõik',
	'BOARD_ANNOUNCEMENTS_STATUS_ACTIVE'		=> 'Aktiivne',
	'BOARD_ANNOUNCEMENTS_STATUS_SCHEDULED'	=> 'Planeeritud',
	'BOARD_ANNOUNCEMENTS_STATUS_DRAFT'		=> 'Mustand',
	'BOARD_ANNOUNCEMENTS_STATUS_EXPIRED'	=> 'Aegunud',
	'BOARD_ANNOUNCEMENTS_STATUS_ARCHIVED'	=> 'Arhiveeritud',
	'BOARD_ANNOUNCEMENTS_STATE_INVALID'		=> 'Valige kehtiv olek.',
	'BOARD_ANNOUNCEMENTS_PUBLISH'			=> 'Avalda',
	'BOARD_ANNOUNCEMENTS_PUBLISHED'			=> 'Avaldatud',
	'BOARD_ANNOUNCEMENTS_SHOW_AGAIN'		=> 'Näita uuesti kõigile',
	'BOARD_ANNOUNCEMENTS_SHOWN_AGAIN'		=> 'Teadaannet näidatakse taas kõigile.',
	'BOARD_ANNOUNCEMENTS_ARCHIVE'			=> 'Arhiiv',
	'BOARD_ANNOUNCEMENTS_ARCHIVED'			=> 'Teade arhiveeritud.',
	'BOARD_ANNOUNCEMENTS_DUPLICATE'			=> 'Duplikaat',
	'BOARD_ANNOUNCEMENTS_DUPLICATED'		=> 'Teadaanne dubleeritud mustandina.',
	'BOARD_ANNOUNCEMENTS_COPY_OF'			=> '%s koopia',
	'BOARD_ANNOUNCEMENTS_NOW'				=> 'Kohe',
	'BOARD_ANNOUNCEMENTS_NO_END'			=> 'Lõppkuupäev puudub',
	'BOARD_ANNOUNCEMENTS_UNTITLED'			=> 'Pealkirjata teadaanne',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH'	=> 'foorumi teadaannete nähtavus',
	'BOARD_ANNOUNCEMENTS_GLOBAL_DISABLED'	=> 'Kõik teadaanded on praegu peidetud.',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH_EXPLAIN' => 'Peida või kuva kõik teadaanded nende individuaalseid olekuid muutmata.',
	'BOARD_ANNOUNCEMENTS_DISMISS_EXPLAIN'	=> 'Külastajad võivad selle teadaande pärast lugemist peita.',
	'BOARD_ANNOUNCEMENTS_REORDER_FILTERED'	=> 'Teadete järjekorra muutmiseks tühjendage filtrid.',
	'BOARD_ANNOUNCEMENTS_FILTER_EMPTY'		=> 'Nendele filtritele ei vasta ükski teadaanne.',
	'BOARD_ANNOUNCEMENTS_BULK_ACTION'		=> 'Hulgitegevus',
	'BOARD_ANNOUNCEMENTS_BULK_UPDATED'		=> 'Valitud teateid värskendati.',
	'BOARD_ANNOUNCEMENTS_DELETE_PERMANENTLY' => 'Kustuta jäädavalt',
	'BOARD_ANNOUNCEMENTS_PREVIEW_MOBILE'	=> 'Mobiilne laius',
	'BOARD_ANNOUNCEMENTS_JAVASCRIPT_REQUIRED' => 'Eelvaate ja redaktori täieliku funktsionaalsuse kasutamiseks peab JavaScript olema lubatud.',
	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Juhatuse teade kustutati',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Juhatuse teadet ei saanud kustutada',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Tahvli teadaannetel ei õnnestunud laualukku hankida. Teine protsess võib olla luku hoidmine. Lukud vabastatakse sunniviisiliselt pärast 1 tunni möödumist.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Soovitud teadaannet pole olemas.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Taotletud teadaandel pole vanemat.',
));
