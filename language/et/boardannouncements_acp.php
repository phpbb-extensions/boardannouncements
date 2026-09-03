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

	'BOARD_ANNOUNCEMENTS_ENABLE_ALL'		=> 'Luba tahvliteated',

	'BOARD_ANNOUNCEMENTS_OPTIONS'			=> 'Announcement options',

	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Kirjeldus',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'Kirjeldus on liiga pikk. Mõned erimärgid vajavad täiendavat salvestusruumi.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Selle teadaande lühikirjeldus. See on nähtav ainult siin AKV-s, et aidata seda teadaannet tuvastada.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Kuva see Foorumi Teadaanne',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Kes saab vaadata seda Foorumi Teadaannet',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Luba kasutajatel keelata Foorumi Teadaannet',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Piirake selle teadaande kuvamiskohta',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_EXPLAIN'	=> 'Valige teadaande kuvamiseks üks või mitu asukohta. Selle kõikjal kuvamiseks jätke valik tühjaks. Mitme asukoha valimiseks kasutage käsu (Mac) või Control (Windows) klõpsamist.',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Igaüks',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Foorumi Teadaannete tausta värv',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'Taustavärv peab olema kuuekohaline kuueteistkümnendsüsteemis värvikood.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Te saate muuta teate taustavärvi hex-koodi abil (näiteks: FFFF80). Vaikimisi värvi kasutamiseks jätke see väli tühjaks.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Foorumi Teadaande aegumise kuupäev',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Määrake kuupäev, millal teadeanne lõppeb ja muutub nähtamatuks. Jätke see väli tühjaks, kui te ei soovi, et teadeanne aeguks.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Aegumise kuupäev on vigane või on juba aegunud.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Juhatuse teade ei sisalda teadet',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Foorumi Teadaande sõnum',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Foorumi Teadaande - Eelvaade',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Foorumi Teadaanne on uuendatud.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Kirjeldus',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_WHERE'		=> 'Asukoht',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Nähtav:',
	'BOARD_ANNOUNCEMENTS_TH_ENABLED'		=> 'Lubatud',
	'BOARD_ANNOUNCEMENTS_TH_CREATED_DATE'	=> 'Loomise kuupäev',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRY_DATE'	=> 'Aegumiskuupäev',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRED'		=> 'Aegunud',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Igal pool',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Juhatuse indeks',
	'BOARD_ANNOUNCEMENTS_FORUMS'			=> 'Valitud foorumid',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Kuvamiseks pole tahvliteateid',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Loo teadaanne',

	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Juhatuse teade kustutati',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Juhatuse teadet ei saanud kustutada',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Tahvli teadaannetel ei õnnestunud laualukku hankida. Teine protsess võib olla luku hoidmine. Lukud vabastatakse sunniviisiliselt pärast 1 tunni möödumist.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Soovitud teadaannet pole olemas.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Taotletud teadaandel pole vanemat.',
));
