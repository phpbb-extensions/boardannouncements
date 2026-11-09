<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* Norwegian translation by Rolv R. Hauge (http://rolvhauge.no)
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Instillinger for forummeldinger',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Her kan du behandle og opprette en forummelding som vil bli vist på hver side i forumet ditt.',



	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Beskrivelse',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'Beskrivelsen er for lang. Noen spesialtegn krever ekstra lagringsplass.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'En kort beskrivelse av denne kunngjøringen. Dette vil bare være synlig her i ACP for å hjelpe med å identifisere denne kunngjøringen.',

	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Hvem kan se denne forummeldingen',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'La brukere lukke denne forummeldingen',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Hvor denne kunngjøringen skal vises',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Alle',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Bakgrunnsfarge for forummeldingen',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_PICKER'	=> 'Bakgrunnsfargevelger',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_HEX'		=> 'Bakgrunnsfarge heksadesimal kode',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'Bakgrunnsfargen må være en sekssifret heksadesimal fargekode.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Velg en bakgrunnsfarge for alternativet Egendefinert farge, eller skriv inn en seks-tegns heksadesimal kode.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Utløpsdato for forummeldingen',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Still inn datoen da kunngjøringen vil utløpe og bli deaktivert. La feltet være tomt hvis du ikke vil at kunngjøringen skal utløpe.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Utløpsdatoen var ugyldig eller er allerede utløpt.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Styrekunngjøring inneholder ingen melding',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Forummelding',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Forummelding - forhåndsvisning',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Forummeldingen har blitt oppdatert.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Kunngjøring',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Synlig for',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Overalt',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Styreindeks',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Det er ingen tavlekunngjøringer å vise',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Lag kunngjøring',

	'BOARD_ANNOUNCEMENTS_EDIT'				=> 'Rediger kunngjøringen',
	'BOARD_ANNOUNCEMENTS_EDITOR_EXPLAIN'	=> 'Skriv meldingen, velg målgruppen og kontroller når den vises.',
	'BOARD_ANNOUNCEMENTS_CONTENT'			=> 'Innhold',
	'BOARD_ANNOUNCEMENTS_TITLE'				=> 'Kunngjøringsoverskrift',
	'BOARD_ANNOUNCEMENTS_TITLE_EXPLAIN'		=> 'Valgfri overskrift vist over kunngjøringsmeldingen.',
	'BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG'	=> 'Kunngjøringsoverskriften må være på 255 tegn eller færre.',
	'BOARD_ANNOUNCEMENTS_APPEARANCE'		=> 'Utseende',
	'BOARD_ANNOUNCEMENTS_TONE'				=> 'Fargetone',
	'BOARD_ANNOUNCEMENTS_TONE_EXPLAIN'		=> 'Velg et forhåndsinnstilt fargeskjema, eller velg Egendefinert farge for å velge din egen.',
	'BOARD_ANNOUNCEMENTS_TONE_NEUTRAL'		=> 'Nøytral',
	'BOARD_ANNOUNCEMENTS_TONE_INFO'			=> 'Informasjon',
	'BOARD_ANNOUNCEMENTS_TONE_SUCCESS'		=> 'Suksess',
	'BOARD_ANNOUNCEMENTS_TONE_WARNING'		=> 'Advarsel',
	'BOARD_ANNOUNCEMENTS_TONE_CRITICAL'		=> 'Kritisk',
	'BOARD_ANNOUNCEMENTS_TONE_CUSTOM'		=> 'Egendefinert farge',
	'BOARD_ANNOUNCEMENTS_TONE_INVALID'		=> 'Velg en gyldig fargetone.',
	'BOARD_ANNOUNCEMENTS_AUDIENCE_LOCATION'	=> 'Publikum og plassering',
	'BOARD_ANNOUNCEMENTS_SELECTED_GROUPS'	=> 'Utvalgte grupper',
	'BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED'	=> 'Velg minst én gruppe når Valgte grupper er valgt.',
	'BOARD_ANNOUNCEMENTS_SELECTED_LOCATIONS' => 'Utvalgte steder',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_REQUIRED' => 'Velg minst ett sted når Valgte steder er valgt.',
	'BOARD_ANNOUNCEMENTS_LOCATION_MODE_INVALID' => 'Velg et gyldig visningssted.',
	'BOARD_ANNOUNCEMENTS_INCLUDE_CHILDREN'	=> 'Vises også i underfora',
	'BOARD_ANNOUNCEMENTS_LOCATION_EMPTY'	=> 'Ingen steder samsvarer med søket ditt.',
	'BOARD_ANNOUNCEMENTS_SCHEDULE_BEHAVIOR'	=> 'Tidsplan og oppførsel',
	'BOARD_ANNOUNCEMENTS_SCHEDULE'			=> 'Rute',
	'BOARD_ANNOUNCEMENTS_START'				=> 'Startdato',
	'BOARD_ANNOUNCEMENTS_START_EXPLAIN'		=> 'La stå tomt for å begynne å vise kunngjøringen umiddelbart.',
	'BOARD_ANNOUNCEMENTS_START_INVALID'		=> 'Startdatoen er ugyldig.',
	'BOARD_ANNOUNCEMENTS_FILTER'			=> 'Filter',
	'BOARD_ANNOUNCEMENTS_STATUS'			=> 'Status',
	'BOARD_ANNOUNCEMENTS_STATUS_ALL'		=> 'Alle',
	'BOARD_ANNOUNCEMENTS_STATUS_ACTIVE'		=> 'Aktiv',
	'BOARD_ANNOUNCEMENTS_STATUS_SCHEDULED'	=> 'Planlagt',
	'BOARD_ANNOUNCEMENTS_STATUS_DRAFT'		=> 'Utkast',
	'BOARD_ANNOUNCEMENTS_STATUS_EXPIRED'	=> 'Utløpt',
	'BOARD_ANNOUNCEMENTS_STATUS_ARCHIVED'	=> 'Arkivert',
	'BOARD_ANNOUNCEMENTS_STATE_INVALID'		=> 'Velg en gyldig status.',
	'BOARD_ANNOUNCEMENTS_PUBLISH'			=> 'Utgi',
	'BOARD_ANNOUNCEMENTS_PUBLISHED'			=> 'Publisert',
	'BOARD_ANNOUNCEMENTS_SHOW_AGAIN'		=> 'Vis igjen til alle',
	'BOARD_ANNOUNCEMENTS_SHOWN_AGAIN'		=> 'Kunngjøringen vises igjen til alle.',
	'BOARD_ANNOUNCEMENTS_ARCHIVE'			=> 'Arkiv',
	'BOARD_ANNOUNCEMENTS_ARCHIVED'			=> 'Kunngjøring arkivert.',
	'BOARD_ANNOUNCEMENTS_DUPLICATE'			=> 'Kopiere',
	'BOARD_ANNOUNCEMENTS_DUPLICATED'		=> 'Kunngjøring duplisert som et utkast.',
	'BOARD_ANNOUNCEMENTS_COPY_OF'			=> 'Kopi av %s',
	'BOARD_ANNOUNCEMENTS_NOW'				=> 'Øyeblikkelig',
	'BOARD_ANNOUNCEMENTS_NO_END'			=> 'Ingen sluttdato',
	'BOARD_ANNOUNCEMENTS_UNTITLED'			=> 'Unavngitt kunngjøring',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH'	=> 'forum kunngjøringer synlighet',
	'BOARD_ANNOUNCEMENTS_GLOBAL_DISABLED'	=> 'Alle kunngjøringer er for øyeblikket skjult.',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH_EXPLAIN' => 'Skjul eller vis alle kunngjøringer uten å endre deres individuelle statuser.',
	'BOARD_ANNOUNCEMENTS_DISMISS_EXPLAIN'	=> 'Besøkende kan skjule denne kunngjøringen etter å ha lest den.',
	'BOARD_ANNOUNCEMENTS_REORDER_FILTERED'	=> 'Tøm filtre for å endre kunngjøringsrekkefølge.',
	'BOARD_ANNOUNCEMENTS_FILTER_EMPTY'		=> 'Ingen kunngjøringer samsvarer med disse filtrene.',
	'BOARD_ANNOUNCEMENTS_BULK_ACTION'		=> 'Massehandling',
	'BOARD_ANNOUNCEMENTS_BULK_UPDATED'		=> 'Utvalgte kunngjøringer ble oppdatert.',
	'BOARD_ANNOUNCEMENTS_DELETE_PERMANENTLY' => 'Slett permanent',
	'BOARD_ANNOUNCEMENTS_PREVIEW_MOBILE'	=> 'Mobil bredde',
	'BOARD_ANNOUNCEMENTS_JAVASCRIPT_REQUIRED' => 'JavaScript må være aktivert for forhåndsvisning og full redigeringsfunksjonalitet.',
	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Styrekunngjøringen ble slettet',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Styrekunngjøringen kunne ikke slettes',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Styrekunngjøringer klarte ikke å skaffe bordlåsen. En annen prosess kan være å holde låsen. Låser tvangsutløses etter en timeout på 1 time.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Den forespurte kunngjøringen eksisterer ikke.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Den forespurte kunngjøringen har ingen forelder.',
));
