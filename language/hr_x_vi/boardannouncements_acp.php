<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* Croatian translation by Ančica Sečan (http://ancica.sunceko.net)
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Postavke forumskih obavijesti',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Ovdje možete dodavati i upravljati forumskim obavijestima (a) koje će biti prikazane na svakoj stranici foruma.',



	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Opis',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'Opis je predugačak. Neki posebni znakovi zahtijevaju dodatni prostor za pohranu.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Kratak opis ove objave. Ovo će biti vidljivo samo ovdje u ACP-u radi lakšeg prepoznavanja ove objave.',

	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Tko može vidjeti ovu forumsku obavijest',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Omogućite korisnicima/ama zatvaranje ove forumske obavijesti',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Gdje bi ova najava trebala biti prikazana',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Svi/e',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Pozadinska boja forumske obavijesti',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_PICKER'	=> 'Alat za odabir pozadinske boje',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_HEX'		=> 'Heksadecimalni kod boje pozadine',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'Pozadinska boja mora biti šesteroznamenkasti heksadecimalni kod boje.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Odaberite boju pozadine za opciju „Prilagođena boja” ili unesite heksadecimalni kod od šest znakova.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Datum isteka forumske obavijesti',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Na postavljeni datum, forumska obavijest će isteći i postati onemogućena. Ukoliko ne želite da forumska obavijest istekne, ostavite ovo polje praznim.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Datum isteka je neispravan ili je već prošao.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Obavijest ploče ne sadrži nikakvu poruku',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Poruka forumske obavijesti',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Prikaz forumske obavijesti',
	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Forumska obavijest je ažurirana.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Najava',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Vidljivo za',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Posvuda',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Indeks odbora',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Nema najava na ploči za prikaz',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Napravite najavu',

	'BOARD_ANNOUNCEMENTS_EDIT'				=> 'Uredi najavu',
	'BOARD_ANNOUNCEMENTS_EDITOR_EXPLAIN'	=> 'Sastavite poruku, odaberite publiku i kontrolirajte kada će se pojaviti.',
	'BOARD_ANNOUNCEMENTS_CONTENT'			=> 'Sadržaj',
	'BOARD_ANNOUNCEMENTS_TITLE'				=> 'Naslov najave',
	'BOARD_ANNOUNCEMENTS_TITLE_EXPLAIN'		=> 'Izborni naslov prikazan iznad poruke najave.',
	'BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG'	=> 'Naslov najave mora imati 255 znakova ili manje.',
	'BOARD_ANNOUNCEMENTS_APPEARANCE'		=> 'Izgled',
	'BOARD_ANNOUNCEMENTS_TONE'				=> 'Ton boje',
	'BOARD_ANNOUNCEMENTS_TONE_EXPLAIN'		=> 'Odaberite unaprijed postavljenu shemu boja ili odaberite Prilagođenu boju da odaberete vlastitu.',
	'BOARD_ANNOUNCEMENTS_TONE_NEUTRAL'		=> 'Neutralan',
	'BOARD_ANNOUNCEMENTS_TONE_INFO'			=> 'Informacija',
	'BOARD_ANNOUNCEMENTS_TONE_SUCCESS'		=> 'Uspjeh',
	'BOARD_ANNOUNCEMENTS_TONE_WARNING'		=> 'Upozorenje',
	'BOARD_ANNOUNCEMENTS_TONE_CRITICAL'		=> 'Kritično',
	'BOARD_ANNOUNCEMENTS_TONE_CUSTOM'		=> 'Prilagođena boja',
	'BOARD_ANNOUNCEMENTS_TONE_INVALID'		=> 'Odaberite važeći ton boje.',
	'BOARD_ANNOUNCEMENTS_AUDIENCE_LOCATION'	=> 'Publika i lokacija',
	'BOARD_ANNOUNCEMENTS_SELECTED_GROUPS'	=> 'Odabrane grupe',
	'BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED'	=> 'Odaberite barem jednu grupu kada odaberete Odabrane grupe.',
	'BOARD_ANNOUNCEMENTS_SELECTED_LOCATIONS' => 'Odabrane lokacije',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_REQUIRED' => 'Odaberite najmanje jednu lokaciju kada odaberete Odabrane lokacije.',
	'BOARD_ANNOUNCEMENTS_LOCATION_MODE_INVALID' => 'Odaberite valjanu lokaciju prikaza.',
	'BOARD_ANNOUNCEMENTS_INCLUDE_CHILDREN'	=> 'Također prikazati u podforumima',
	'BOARD_ANNOUNCEMENTS_LOCATION_EMPTY'	=> 'Nijedna lokacija ne odgovara vašem pretraživanju.',
	'BOARD_ANNOUNCEMENTS_SCHEDULE_BEHAVIOR'	=> 'Raspored i ponašanje',
	'BOARD_ANNOUNCEMENTS_SCHEDULE'			=> 'Raspored',
	'BOARD_ANNOUNCEMENTS_START'				=> 'Datum početka',
	'BOARD_ANNOUNCEMENTS_START_EXPLAIN'		=> 'Ostavite prazno kako biste odmah počeli prikazivati ​​najavu.',
	'BOARD_ANNOUNCEMENTS_START_INVALID'		=> 'Datum početka nije valjan.',
	'BOARD_ANNOUNCEMENTS_FILTER'			=> 'Filter',
	'BOARD_ANNOUNCEMENTS_STATUS'			=> 'Status',
	'BOARD_ANNOUNCEMENTS_STATUS_ALL'		=> 'Sve',
	'BOARD_ANNOUNCEMENTS_STATUS_ACTIVE'		=> 'Aktivan',
	'BOARD_ANNOUNCEMENTS_STATUS_SCHEDULED'	=> 'Zakazano',
	'BOARD_ANNOUNCEMENTS_STATUS_DRAFT'		=> 'Nacrt',
	'BOARD_ANNOUNCEMENTS_STATUS_EXPIRED'	=> 'Istekao',
	'BOARD_ANNOUNCEMENTS_STATUS_ARCHIVED'	=> 'Arhivirano',
	'BOARD_ANNOUNCEMENTS_STATE_INVALID'		=> 'Odaberite važeći status.',
	'BOARD_ANNOUNCEMENTS_PUBLISH'			=> 'Objaviti',
	'BOARD_ANNOUNCEMENTS_PUBLISHED'			=> 'Objavljeno',
	'BOARD_ANNOUNCEMENTS_SHOW_AGAIN'		=> 'Pokaži ponovo svima',
	'BOARD_ANNOUNCEMENTS_SHOWN_AGAIN'		=> 'Obavijest će ponovno biti prikazana svima.',
	'BOARD_ANNOUNCEMENTS_ARCHIVE'			=> 'Arhiva',
	'BOARD_ANNOUNCEMENTS_ARCHIVED'			=> 'Obavijest je arhivirana.',
	'BOARD_ANNOUNCEMENTS_DUPLICATE'			=> 'Duplikat',
	'BOARD_ANNOUNCEMENTS_DUPLICATED'		=> 'Obavijest je duplicirana kao nacrt.',
	'BOARD_ANNOUNCEMENTS_COPY_OF'			=> 'Kopija %s',
	'BOARD_ANNOUNCEMENTS_NOW'				=> 'Odmah',
	'BOARD_ANNOUNCEMENTS_NO_END'			=> 'Nema datuma završetka',
	'BOARD_ANNOUNCEMENTS_UNTITLED'			=> 'Obavijest bez naslova',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH'	=> 'vidljivost najava na forumu',
	'BOARD_ANNOUNCEMENTS_GLOBAL_DISABLED'	=> 'Sve objave su trenutno skrivene.',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH_EXPLAIN' => 'Sakrijte ili prikažite sve najave bez promjene njihovih pojedinačnih statusa.',
	'BOARD_ANNOUNCEMENTS_DISMISS_EXPLAIN'	=> 'Posjetitelji mogu sakriti ovu najavu nakon što je pročitaju.',
	'BOARD_ANNOUNCEMENTS_REORDER_FILTERED'	=> 'Očistite filtre za promjenu redoslijeda najava.',
	'BOARD_ANNOUNCEMENTS_FILTER_EMPTY'		=> 'Nijedna objava ne odgovara ovim filtrima.',
	'BOARD_ANNOUNCEMENTS_BULK_ACTION'		=> 'Skupna akcija',
	'BOARD_ANNOUNCEMENTS_BULK_UPDATED'		=> 'Odabrane najave su ažurirane.',
	'BOARD_ANNOUNCEMENTS_DELETE_PERMANENTLY' => 'Izbriši trajno',
	'BOARD_ANNOUNCEMENTS_PREVIEW_MOBILE'	=> 'Mobilna širina',
	'BOARD_ANNOUNCEMENTS_JAVASCRIPT_REQUIRED' => 'JavaScript mora biti omogućen za pretpregled i punu funkcionalnost uređivača.',
	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Oglas na ploči je izbrisan',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Obavijest ploče nije bilo moguće izbrisati',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Obavijesti ploče nisu uspjele preuzeti zaključavanje tablice. Drugi proces može biti zaključavanje. Brave se prisilno otpuštaju nakon isteka vremena od 1 sata.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Tražena objava ne postoji.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Zatražena objava nema nadređenog.',
));
