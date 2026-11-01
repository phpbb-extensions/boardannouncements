<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* Danish translation by jask (phpbb3.dk) and scootergrisen
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Indstillinger for boardbekendtgørelser',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Her kan du håndtere og oprette en boardbekendtgørelse som vises på alle sider på dit board.',



	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Beskrivelse',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'Beskrivelsen er for lang. Nogle specialtegn kræver ekstra lagerplads.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'En kort beskrivelse af denne meddelelse. Dette vil kun være synligt her i ACP for at hjælpe med at identificere denne meddelelse.',

	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Hvem kan se boardbekendtgørelsen',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Tillad brugere at lukke boardbekendtgørelsen',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Hvor denne meddelelse skal vises',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Alle',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Baggrundsfarve for boardbekendtgørelse',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_PICKER'	=> 'Baggrundsfarvevælger',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_HEX'		=> 'Baggrundsfarve hexadecimal kode',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'Baggrundsfarven skal være en sekscifret hexadecimal farvekode.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Vælg en baggrundsfarve til indstillingen Brugerdefineret farve, eller indtast en seks-tegns hexadecimal kode.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Udløbsdato for boardbekendtgørelse',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Indstil datoen, hvor bekendtgørelsen udløber og deaktiveres. Lad feltet være tomt, hvis bekendtgørelsen ikke skal udløbe.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Udløbsdatoen var ugyldig eller er allerede udløbet.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Bestyrelsens meddelelse indeholder ingen besked',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Boardbekendtgørelsens tekst',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Forhåndsvis boardbekendtgørelse',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Boardbekendtgørelsen er opdateret.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Bekendtgørelse',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Synlig for',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Overalt',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Tavleindeks',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Der er ingen bestyrelsesmeddelelser at vise',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Opret meddelelse',

	'BOARD_ANNOUNCEMENTS_EDIT'				=> 'Rediger meddelelse',
	'BOARD_ANNOUNCEMENTS_EDITOR_EXPLAIN'	=> 'Skriv beskeden, vælg dens målgruppe, og kontroller, hvornår den vises.',
	'BOARD_ANNOUNCEMENTS_CONTENT'			=> 'Tilfreds',
	'BOARD_ANNOUNCEMENTS_TITLE'				=> 'Meddelelsesoverskrift',
	'BOARD_ANNOUNCEMENTS_TITLE_EXPLAIN'		=> 'Valgfri overskrift vist over meddelelsesmeddelelsen.',
	'BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG'	=> 'Meddelelsesoverskriften skal være på 255 tegn eller færre.',
	'BOARD_ANNOUNCEMENTS_APPEARANCE'		=> 'Udseende',
	'BOARD_ANNOUNCEMENTS_TONE'				=> 'Farvetone',
	'BOARD_ANNOUNCEMENTS_TONE_EXPLAIN'		=> 'Vælg et forudindstillet farveskema, eller vælg Brugerdefineret farve for at vælge din egen.',
	'BOARD_ANNOUNCEMENTS_TONE_NEUTRAL'		=> 'Neutral',
	'BOARD_ANNOUNCEMENTS_TONE_INFO'			=> 'Information',
	'BOARD_ANNOUNCEMENTS_TONE_SUCCESS'		=> 'Succes',
	'BOARD_ANNOUNCEMENTS_TONE_WARNING'		=> 'Advarsel',
	'BOARD_ANNOUNCEMENTS_TONE_CRITICAL'		=> 'Kritisk',
	'BOARD_ANNOUNCEMENTS_TONE_CUSTOM'		=> 'Brugerdefineret farve',
	'BOARD_ANNOUNCEMENTS_TONE_INVALID'		=> 'Vælg en gyldig farvetone.',
	'BOARD_ANNOUNCEMENTS_AUDIENCE_LOCATION'	=> 'Publikum og placering',
	'BOARD_ANNOUNCEMENTS_SELECTED_GROUPS'	=> 'Udvalgte grupper',
	'BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED'	=> 'Vælg mindst én gruppe, når Valgte grupper er valgt.',
	'BOARD_ANNOUNCEMENTS_SELECTED_LOCATIONS' => 'Udvalgte steder',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_REQUIRED' => 'Vælg mindst én placering, når Valgte placeringer er valgt.',
	'BOARD_ANNOUNCEMENTS_LOCATION_MODE_INVALID' => 'Vælg en gyldig visningsplacering.',
	'BOARD_ANNOUNCEMENTS_INCLUDE_CHILDREN'	=> 'Vises også i underfora',
	'BOARD_ANNOUNCEMENTS_LOCATION_EMPTY'	=> 'Ingen steder matcher din søgning.',
	'BOARD_ANNOUNCEMENTS_SCHEDULE_BEHAVIOR'	=> 'Tidsplan og adfærd',
	'BOARD_ANNOUNCEMENTS_SCHEDULE'			=> 'Skema',
	'BOARD_ANNOUNCEMENTS_START'				=> 'Startdato',
	'BOARD_ANNOUNCEMENTS_START_EXPLAIN'		=> 'Lad stå tomt for at begynde at vise meddelelsen med det samme.',
	'BOARD_ANNOUNCEMENTS_START_INVALID'		=> 'Startdatoen er ugyldig.',
	'BOARD_ANNOUNCEMENTS_FILTER'			=> 'Filter',
	'BOARD_ANNOUNCEMENTS_STATUS'			=> 'Status',
	'BOARD_ANNOUNCEMENTS_STATUS_ALL'		=> 'Alle',
	'BOARD_ANNOUNCEMENTS_STATUS_ACTIVE'		=> 'Aktiv',
	'BOARD_ANNOUNCEMENTS_STATUS_SCHEDULED'	=> 'Planlagt',
	'BOARD_ANNOUNCEMENTS_STATUS_DRAFT'		=> 'Udkast',
	'BOARD_ANNOUNCEMENTS_STATUS_EXPIRED'	=> 'Udløbet',
	'BOARD_ANNOUNCEMENTS_STATUS_ARCHIVED'	=> 'Arkiveret',
	'BOARD_ANNOUNCEMENTS_STATE_INVALID'		=> 'Vælg en gyldig status.',
	'BOARD_ANNOUNCEMENTS_PUBLISH'			=> 'Offentliggøre',
	'BOARD_ANNOUNCEMENTS_PUBLISHED'			=> 'Udgivet',
	'BOARD_ANNOUNCEMENTS_SHOW_AGAIN'		=> 'Vis igen til alle',
	'BOARD_ANNOUNCEMENTS_SHOWN_AGAIN'		=> 'Meddelelsen vil blive vist igen til alle.',
	'BOARD_ANNOUNCEMENTS_ARCHIVE'			=> 'Arkiv',
	'BOARD_ANNOUNCEMENTS_ARCHIVED'			=> 'Meddelelsen er arkiveret.',
	'BOARD_ANNOUNCEMENTS_DUPLICATE'			=> 'Duplikere',
	'BOARD_ANNOUNCEMENTS_DUPLICATED'		=> 'Meddelelse duplikeret som et udkast.',
	'BOARD_ANNOUNCEMENTS_COPY_OF'			=> 'Kopi af %s',
	'BOARD_ANNOUNCEMENTS_NOW'				=> 'Straks',
	'BOARD_ANNOUNCEMENTS_NO_END'			=> 'Ingen slutdato',
	'BOARD_ANNOUNCEMENTS_UNTITLED'			=> 'Unavngivet meddelelse',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH'	=> 'synlighed af forummeddelelser',
	'BOARD_ANNOUNCEMENTS_GLOBAL_DISABLED'	=> 'Alle meddelelser er i øjeblikket skjult.',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH_EXPLAIN' => 'Skjul eller vis alle meddelelser uden at ændre deres individuelle statusser.',
	'BOARD_ANNOUNCEMENTS_DISMISS_EXPLAIN'	=> 'Besøgende kan skjule denne meddelelse efter at have læst den.',
	'BOARD_ANNOUNCEMENTS_REORDER_FILTERED'	=> 'Ryd filtre for at ændre annonceringsrækkefølge.',
	'BOARD_ANNOUNCEMENTS_FILTER_EMPTY'		=> 'Ingen meddelelser matcher disse filtre.',
	'BOARD_ANNOUNCEMENTS_BULK_ACTION'		=> 'Massehandling',
	'BOARD_ANNOUNCEMENTS_BULK_UPDATED'		=> 'Udvalgte meddelelser blev opdateret.',
	'BOARD_ANNOUNCEMENTS_DELETE_PERMANENTLY' => 'Slet permanent',
	'BOARD_ANNOUNCEMENTS_PREVIEW_MOBILE'	=> 'Mobil bredde',
	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Bestyrelsens meddelelse blev slettet',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Bestyrelsens meddelelse kunne ikke slettes',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Bestyrelsesmeddelelser kunne ikke erhverve bordlåsen. En anden proces kan være at holde låsen. Låse tvangsudløses efter en timeout på 1 time.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Den ønskede meddelelse findes ikke.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Den ønskede meddelelse har ingen forælder.',
));
