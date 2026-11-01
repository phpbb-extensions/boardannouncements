<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* Dutch translation by Dutch Translators (https://github.com/dutch-translators)
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Forum aankondigings instellingen',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Hier kan je een forum aankondiging beheren en aanmaken, die weergegeven zal worden op elke pagina van je forum.',



	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Beschrijving',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'De beschrijving is te lang. Sommige speciale tekens vereisen extra opslagruimte.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Een korte beschrijving van deze aankondiging. Dit zal alleen hier in de ACS zichtbaar zijn om deze aankondiging te helpen identificeren.',

	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Wie kan deze forum aankondiging bekijken',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Sta gebruikers toe om deze forum aankondiging te sluiten',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Waar deze aankondiging moet worden weergegeven',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Iedereen',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Forum aankondiging achtergrondkleur',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_PICKER'	=> 'Achtergrondkleurkiezer',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_HEX'		=> 'Achtergrondkleur hexadecimale code',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'De achtergrondkleur moet een hexadecimale kleurcode van zes tekens zijn.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Kies een achtergrondkleur voor de optie Aangepaste kleur of voer een hexadecimale code van zes tekens in.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Vervaldatum forum aankondiging',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Stel een datum in waarop de forum aankondiging vervalt en uitgeschakeld wordt. Laat dit veld leeg als je de forum aankondiging niet wilt laten vervallen.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'De vervaldatum is ongeldig of is al verlopen.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Bestuursmededeling bevat geen bericht',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Forum aankondigings-bericht',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Forum aankondiging - Voorbeeld',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Forum aankondiging is bijgewerkt.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Aankondiging',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Zichtbaar voor',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Overal',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Bestuursindex',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Er zijn geen bordmededelingen om weer te geven',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Aankondiging maken',

	'BOARD_ANNOUNCEMENTS_EDIT'				=> 'Aankondiging bewerken',
	'BOARD_ANNOUNCEMENTS_EDITOR_EXPLAIN'	=> 'Stel het bericht samen, kies het publiek en bepaal wanneer het verschijnt.',
	'BOARD_ANNOUNCEMENTS_CONTENT'			=> 'Inhoud',
	'BOARD_ANNOUNCEMENTS_TITLE'				=> 'Aankondiging kop',
	'BOARD_ANNOUNCEMENTS_TITLE_EXPLAIN'		=> 'Optionele kop weergegeven boven het aankondigingsbericht.',
	'BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG'	=> 'De kop van de aankondiging mag maximaal 255 tekens lang zijn.',
	'BOARD_ANNOUNCEMENTS_APPEARANCE'		=> 'Verschijning',
	'BOARD_ANNOUNCEMENTS_TONE'				=> 'Kleurtoon',
	'BOARD_ANNOUNCEMENTS_TONE_EXPLAIN'		=> 'Kies een vooraf ingesteld kleurenschema of selecteer Aangepaste kleur om uw eigen kleur te kiezen.',
	'BOARD_ANNOUNCEMENTS_TONE_NEUTRAL'		=> 'Neutrale',
	'BOARD_ANNOUNCEMENTS_TONE_INFO'			=> 'Informatie',
	'BOARD_ANNOUNCEMENTS_TONE_SUCCESS'		=> 'Succes',
	'BOARD_ANNOUNCEMENTS_TONE_WARNING'		=> 'Waarschuwing',
	'BOARD_ANNOUNCEMENTS_TONE_CRITICAL'		=> 'Kritisch',
	'BOARD_ANNOUNCEMENTS_TONE_CUSTOM'		=> 'Aangepaste kleur',
	'BOARD_ANNOUNCEMENTS_TONE_INVALID'		=> 'Selecteer een geldige kleurtoon.',
	'BOARD_ANNOUNCEMENTS_AUDIENCE_LOCATION'	=> 'Publiek en locatie',
	'BOARD_ANNOUNCEMENTS_SELECTED_GROUPS'	=> 'Geselecteerde groepen',
	'BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED'	=> 'Selecteer ten minste één groep wanneer Geselecteerde groepen is gekozen.',
	'BOARD_ANNOUNCEMENTS_SELECTED_LOCATIONS' => 'Geselecteerde locaties',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_REQUIRED' => 'Selecteer ten minste één locatie wanneer Geselecteerde locaties is gekozen.',
	'BOARD_ANNOUNCEMENTS_LOCATION_MODE_INVALID' => 'Selecteer een geldige weergavelocatie.',
	'BOARD_ANNOUNCEMENTS_INCLUDE_CHILDREN'	=> 'Wordt ook weergegeven in subforums',
	'BOARD_ANNOUNCEMENTS_LOCATION_EMPTY'	=> 'Er zijn geen locaties die overeenkomen met uw zoekopdracht.',
	'BOARD_ANNOUNCEMENTS_SCHEDULE_BEHAVIOR'	=> 'Schema en gedrag',
	'BOARD_ANNOUNCEMENTS_SCHEDULE'			=> 'Schema',
	'BOARD_ANNOUNCEMENTS_START'				=> 'Startdatum',
	'BOARD_ANNOUNCEMENTS_START_EXPLAIN'		=> 'Laat dit veld leeg als u de aankondiging onmiddellijk wilt weergeven.',
	'BOARD_ANNOUNCEMENTS_START_INVALID'		=> 'Startdatum is ongeldig.',
	'BOARD_ANNOUNCEMENTS_FILTER'			=> 'Filter',
	'BOARD_ANNOUNCEMENTS_STATUS'			=> 'Status',
	'BOARD_ANNOUNCEMENTS_STATUS_ALL'		=> 'Alle',
	'BOARD_ANNOUNCEMENTS_STATUS_ACTIVE'		=> 'Actief',
	'BOARD_ANNOUNCEMENTS_STATUS_SCHEDULED'	=> 'Gepland',
	'BOARD_ANNOUNCEMENTS_STATUS_DRAFT'		=> 'Voorlopige versie',
	'BOARD_ANNOUNCEMENTS_STATUS_EXPIRED'	=> 'Verlopen',
	'BOARD_ANNOUNCEMENTS_STATUS_ARCHIVED'	=> 'Gearchiveerd',
	'BOARD_ANNOUNCEMENTS_STATE_INVALID'		=> 'Selecteer een geldige status.',
	'BOARD_ANNOUNCEMENTS_PUBLISH'			=> 'Publiceren',
	'BOARD_ANNOUNCEMENTS_PUBLISHED'			=> 'Gepubliceerd',
	'BOARD_ANNOUNCEMENTS_SHOW_AGAIN'		=> 'Laat het nog eens aan iedereen zien',
	'BOARD_ANNOUNCEMENTS_SHOWN_AGAIN'		=> 'De aankondiging wordt opnieuw aan iedereen getoond.',
	'BOARD_ANNOUNCEMENTS_ARCHIVE'			=> 'Archief',
	'BOARD_ANNOUNCEMENTS_ARCHIVED'			=> 'Aankondiging gearchiveerd.',
	'BOARD_ANNOUNCEMENTS_DUPLICATE'			=> 'Duplicaat',
	'BOARD_ANNOUNCEMENTS_DUPLICATED'		=> 'Aankondiging gedupliceerd als concept.',
	'BOARD_ANNOUNCEMENTS_COPY_OF'			=> 'Kopie van %s',
	'BOARD_ANNOUNCEMENTS_NOW'				=> 'Onmiddellijk',
	'BOARD_ANNOUNCEMENTS_NO_END'			=> 'Geen einddatum',
	'BOARD_ANNOUNCEMENTS_UNTITLED'			=> 'Naamloze aankondiging',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH'	=> 'zichtbaarheid van forumaankondigingen',
	'BOARD_ANNOUNCEMENTS_GLOBAL_DISABLED'	=> 'Alle aankondigingen zijn momenteel verborgen.',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH_EXPLAIN' => 'Verberg of toon alle aankondigingen zonder hun individuele status te wijzigen.',
	'BOARD_ANNOUNCEMENTS_DISMISS_EXPLAIN'	=> 'Bezoekers kunnen deze aankondiging verbergen nadat ze deze hebben gelezen.',
	'BOARD_ANNOUNCEMENTS_REORDER_FILTERED'	=> 'Wis filters om de volgorde van aankondigingen te wijzigen.',
	'BOARD_ANNOUNCEMENTS_FILTER_EMPTY'		=> 'Er zijn geen aankondigingen die overeenkomen met deze filters.',
	'BOARD_ANNOUNCEMENTS_BULK_ACTION'		=> 'Bulkactie',
	'BOARD_ANNOUNCEMENTS_BULK_UPDATED'		=> 'Geselecteerde aankondigingen zijn bijgewerkt.',
	'BOARD_ANNOUNCEMENTS_DELETE_PERMANENTLY' => 'Permanent verwijderen',
	'BOARD_ANNOUNCEMENTS_PREVIEW_MOBILE'	=> 'Mobiele breedte',
	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'De bestuursmededeling is verwijderd',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'De bestuursmededeling kon niet worden verwijderd',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Bestuursaankondigingen slaagden er niet in het tafelslot te verkrijgen. Een ander proces kan het slot vasthouden. Sloten worden na een time-out van 1 uur geforceerd vrijgegeven.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'De gevraagde aankondiging bestaat niet.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'De gevraagde mededeling heeft geen ouder.',
));
