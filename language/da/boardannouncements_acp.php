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

	'BOARD_ANNOUNCEMENTS_ENABLE_ALL'		=> 'Aktiver bestyrelsesmeddelelser',

	'BOARD_ANNOUNCEMENTS_OPTIONS'			=> 'Announcement options',

	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Beskrivelse',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'Beskrivelsen er for lang. Nogle specialtegn kræver ekstra lagerplads.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'En kort beskrivelse af denne meddelelse. Dette vil kun være synligt her i ACP for at hjælpe med at identificere denne meddelelse.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Vis boardbekendtgørelsen',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Hvem kan se boardbekendtgørelsen',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Tillad brugere at lukke boardbekendtgørelsen',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Begræns, hvor denne meddelelse skal vises',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_EXPLAIN'	=> 'Vælg en eller flere steder for at vise meddelelsen. For at vise det overalt, lad valget stå tomt. Brug Kommando (Mac) eller Kontrol (Windows) klik for at vælge flere placeringer.',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Alle',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Baggrundsfarve for boardbekendtgørelse',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'Baggrundsfarven skal være en sekscifret hexadecimal farvekode.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Du kan ændre bekendtgørelsens baggrundsfarve med en hex-kode (f.eks.: FFFF80). Lad feltet være tomt, for at anvende standardfarven.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Udløbsdato for boardbekendtgørelse',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Indstil datoen, hvor bekendtgørelsen udløber og deaktiveres. Lad feltet være tomt, hvis bekendtgørelsen ikke skal udløbe.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Udløbsdatoen var ugyldig eller er allerede udløbet.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Bestyrelsens meddelelse indeholder ingen besked',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Boardbekendtgørelsens tekst',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Forhåndsvis boardbekendtgørelse',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Boardbekendtgørelsen er opdateret.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Beskrivelse',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_WHERE'		=> 'Beliggenhed',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Synlig for',
	'BOARD_ANNOUNCEMENTS_TH_ENABLED'		=> 'Aktiveret',
	'BOARD_ANNOUNCEMENTS_TH_CREATED_DATE'	=> 'Oprettelsesdato',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRY_DATE'	=> 'Udløbsdato',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRED'		=> 'Udløbet',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Overalt',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Tavleindeks',
	'BOARD_ANNOUNCEMENTS_FORUMS'			=> 'Udvalgte fora',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Der er ingen bestyrelsesmeddelelser at vise',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Opret meddelelse',

	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Bestyrelsens meddelelse blev slettet',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Bestyrelsens meddelelse kunne ikke slettes',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Bestyrelsesmeddelelser kunne ikke erhverve bordlåsen. En anden proces kan være at holde låsen. Låse tvangsudløses efter en timeout på 1 time.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Den ønskede meddelelse findes ikke.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Den ønskede meddelelse har ingen forælder.',
));
