<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
* Slovenian Translation - Marko K.(max, max-ima,...)
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Nastavitve obvestil na forumu',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Tukaj lahko upravljate in ustvarite obvestilo na plošči, ki bo prikazana na vsaki strani vašega foruma.',



	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Opis',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'Opis je predolg. Nekateri posebni znaki zahtevajo dodaten prostor za shranjevanje.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Kratek opis za to objavo. To bo vidno samo tukaj v ACP, da bo lažje prepoznati to objavo.',

	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Kdo si lahko ogleda to obvestilo na forumu',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Dovoli uporabnikom, da opustijo to obvestilo na plošči',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Kje naj bo to obvestilo prikazano',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Vsi',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Barva ozadja za obvestilo na tabli',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_PICKER'	=> 'Izbirnik barv ozadja',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_HEX'		=> 'Šestnajstiška koda barve ozadja',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'Barva ozadja mora biti šestmestna šestnajstiška barvna koda.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Izberite barvo ozadja za možnost Barva po meri ali vnesite šestmestno šestnajstiško kodo.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Datum izteka obvestila na plošči',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Nastavite datum, ko bo obvestilo poteklo in postalo onemogočena. Pustite to polje prazno, če ne želite, da obvestilo poteče.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Datum poteka je bil neveljaven ali je že potekel.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Obvestilo na plošči ne vsebuje nobenega sporočila',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Sporočilo z obvestilom na plošči',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Obvestilo plošče - Predogled',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Obvestilo je bilo posodobljeno.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Obvestilo',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Vidno za',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Povsod',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Indeks odbora',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Ni obvestil na plošči za prikaz',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Ustvari obvestilo',

	'BOARD_ANNOUNCEMENTS_EDIT'				=> 'Uredi obvestilo',
	'BOARD_ANNOUNCEMENTS_EDITOR_EXPLAIN'	=> 'Sestavite sporočilo, izberite njegovo občinstvo in nadzirajte, kdaj se pojavi.',
	'BOARD_ANNOUNCEMENTS_CONTENT'			=> 'Vsebina',
	'BOARD_ANNOUNCEMENTS_TITLE'				=> 'Naslov obvestila',
	'BOARD_ANNOUNCEMENTS_TITLE_EXPLAIN'		=> 'Izbirni naslov, prikazan nad obvestilnim sporočilom.',
	'BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG'	=> 'Naslov obvestila mora imeti 255 znakov ali manj.',
	'BOARD_ANNOUNCEMENTS_APPEARANCE'		=> 'Videz',
	'BOARD_ANNOUNCEMENTS_TONE'				=> 'Barvni ton',
	'BOARD_ANNOUNCEMENTS_TONE_EXPLAIN'		=> 'Izberite prednastavljeno barvno shemo ali izberite barvo po meri, da izberete svojo.',
	'BOARD_ANNOUNCEMENTS_TONE_NEUTRAL'		=> 'Nevtralno',
	'BOARD_ANNOUNCEMENTS_TONE_INFO'			=> 'Informacije',
	'BOARD_ANNOUNCEMENTS_TONE_SUCCESS'		=> 'Uspeh',
	'BOARD_ANNOUNCEMENTS_TONE_WARNING'		=> 'Opozorilo',
	'BOARD_ANNOUNCEMENTS_TONE_CRITICAL'		=> 'Kritično',
	'BOARD_ANNOUNCEMENTS_TONE_CUSTOM'		=> 'Barva po meri',
	'BOARD_ANNOUNCEMENTS_TONE_INVALID'		=> 'Izberite veljaven barvni ton.',
	'BOARD_ANNOUNCEMENTS_AUDIENCE_LOCATION'	=> 'Publika in lokacija',
	'BOARD_ANNOUNCEMENTS_SELECTED_GROUPS'	=> 'Izbrane skupine',
	'BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED'	=> 'Izberite vsaj eno skupino, ko izberete Izbrane skupine.',
	'BOARD_ANNOUNCEMENTS_SELECTED_LOCATIONS' => 'Izbrane lokacije',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_REQUIRED' => 'Ko izberete Izbrane lokacije, izberite vsaj eno lokacijo.',
	'BOARD_ANNOUNCEMENTS_LOCATION_MODE_INVALID' => 'Izberite veljavno lokacijo prikaza.',
	'BOARD_ANNOUNCEMENTS_INCLUDE_CHILDREN'	=> 'Prikaz tudi v podforumih',
	'BOARD_ANNOUNCEMENTS_LOCATION_EMPTY'	=> 'Nobena lokacija ne ustreza vašemu iskanju.',
	'BOARD_ANNOUNCEMENTS_SCHEDULE_BEHAVIOR'	=> 'Urnik in obnašanje',
	'BOARD_ANNOUNCEMENTS_SCHEDULE'			=> 'Urnik',
	'BOARD_ANNOUNCEMENTS_START'				=> 'Začetni datum',
	'BOARD_ANNOUNCEMENTS_START_EXPLAIN'		=> 'Pustite prazno, če želite takoj začeti prikazovati obvestilo.',
	'BOARD_ANNOUNCEMENTS_START_INVALID'		=> 'Začetni datum ni veljaven.',
	'BOARD_ANNOUNCEMENTS_FILTER'			=> 'Filter',
	'BOARD_ANNOUNCEMENTS_STATUS'			=> 'Stanje',
	'BOARD_ANNOUNCEMENTS_STATUS_ALL'		=> 'Vse',
	'BOARD_ANNOUNCEMENTS_STATUS_ACTIVE'		=> 'Aktiven',
	'BOARD_ANNOUNCEMENTS_STATUS_SCHEDULED'	=> 'Načrtovano',
	'BOARD_ANNOUNCEMENTS_STATUS_DRAFT'		=> 'Osnutek',
	'BOARD_ANNOUNCEMENTS_STATUS_EXPIRED'	=> 'potekel',
	'BOARD_ANNOUNCEMENTS_STATUS_ARCHIVED'	=> 'Arhivirano',
	'BOARD_ANNOUNCEMENTS_STATE_INVALID'		=> 'Izberite veljavno stanje.',
	'BOARD_ANNOUNCEMENTS_PUBLISH'			=> 'Objavi',
	'BOARD_ANNOUNCEMENTS_PUBLISHED'			=> 'Objavljeno',
	'BOARD_ANNOUNCEMENTS_SHOW_AGAIN'		=> 'Ponovno pokaži vsem',
	'BOARD_ANNOUNCEMENTS_SHOWN_AGAIN'		=> 'Obvestilo bo znova prikazano vsem.',
	'BOARD_ANNOUNCEMENTS_ARCHIVE'			=> 'Arhiv',
	'BOARD_ANNOUNCEMENTS_ARCHIVED'			=> 'Obvestilo je arhivirano.',
	'BOARD_ANNOUNCEMENTS_DUPLICATE'			=> 'Dvojnik',
	'BOARD_ANNOUNCEMENTS_DUPLICATED'		=> 'Obvestilo je podvojeno kot osnutek.',
	'BOARD_ANNOUNCEMENTS_COPY_OF'			=> 'Kopija %s',
	'BOARD_ANNOUNCEMENTS_NOW'				=> 'takoj',
	'BOARD_ANNOUNCEMENTS_NO_END'			=> 'Ni končnega datuma',
	'BOARD_ANNOUNCEMENTS_UNTITLED'			=> 'Obvestilo brez naslova',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH'	=> 'vidnost objav na forumu',
	'BOARD_ANNOUNCEMENTS_GLOBAL_DISABLED'	=> 'Vse objave so trenutno skrite.',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH_EXPLAIN' => 'Skrijte ali pokažite vsa obvestila, ne da bi spremenili njihova posamezna stanja.',
	'BOARD_ANNOUNCEMENTS_DISMISS_EXPLAIN'	=> 'Obiskovalci lahko skrijejo to objavo, potem ko jo preberejo.',
	'BOARD_ANNOUNCEMENTS_REORDER_FILTERED'	=> 'Počistite filtre, da spremenite vrstni red objav.',
	'BOARD_ANNOUNCEMENTS_FILTER_EMPTY'		=> 'Nobena objava ne ustreza tem filtrom.',
	'BOARD_ANNOUNCEMENTS_BULK_ACTION'		=> 'Množično ukrepanje',
	'BOARD_ANNOUNCEMENTS_BULK_UPDATED'		=> 'Izbrane objave so bile posodobljene.',
	'BOARD_ANNOUNCEMENTS_DELETE_PERMANENTLY' => 'Trajno izbriši',
	'BOARD_ANNOUNCEMENTS_PREVIEW_MOBILE'	=> 'Mobilna širina',
	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Obvestilo na tabli je bilo izbrisano',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Objave na tabli ni bilo mogoče izbrisati',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Obvestila na plošči niso uspela pridobiti ključavnice tabele. Drug postopek morda drži ključavnico. Zaklepi se na silo sprostijo po preteku 1 ure.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Zahtevana objava ne obstaja.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Zahtevana objava nima nadrejenega elementa.',
));
