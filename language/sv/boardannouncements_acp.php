<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* Swedish translation by Holger (http://www.maskinisten.net)
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Inställningar för forummeddelanden',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Här kan du hantera och skapa ett forummeddelande som kommer att visas på varje sida i ditt forum.',



	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Beskrivning',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'Beskrivningen är för lång. Vissa specialtecken kräver ytterligare lagringsutrymme.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'En kort beskrivning av detta tillkännagivande. Detta kommer bara att vara synligt här i ACP för att hjälpa till att identifiera detta tillkännagivande.',

	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Vem kan se detta forummeddelande',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Tillåt användare att stänga detta forummeddelande',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Där detta meddelande ska visas',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Alla',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Forummeddelandets bakgrundsfärg',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_PICKER'	=> 'Bakgrundsfärgväljare',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_HEX'		=> 'Bakgrundsfärg hexadecimal kod',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'Bakgrundsfärgen måste vara en hexadecimal färgkod med sex tecken.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Välj en bakgrundsfärg för alternativet Anpassad färg eller ange en sexteckens hexadecimal kod.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Forummeddelandets utgångsdatum',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Ange datum då meddelandet upphör och bli inaktiverat. Lämna det här fältet tomt om du inte vill att meddelandet upphör att gälla.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Utgångsdatumet var ogiltigt eller har redan gått ut.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Styrelsens meddelande innehåller inget meddelande',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Forummeddelande',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Forummeddelande - förhandsgranskning',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Forummeddelandet har uppdaterats.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Meddelande',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Synlig för',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Överallt',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Styrelseindex',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Det finns inga styrelsemeddelanden att visa',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Skapa meddelande',

	'BOARD_ANNOUNCEMENTS_EDIT'				=> 'Redigera meddelande',
	'BOARD_ANNOUNCEMENTS_EDITOR_EXPLAIN'	=> 'Skriv meddelandet, välj dess målgrupp och kontrollera när det visas.',
	'BOARD_ANNOUNCEMENTS_CONTENT'			=> 'Innehåll',
	'BOARD_ANNOUNCEMENTS_TITLE'				=> 'Tillkännagivande rubrik',
	'BOARD_ANNOUNCEMENTS_TITLE_EXPLAIN'		=> 'Valfri rubrik visas ovanför meddelandet.',
	'BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG'	=> 'Meddelandets rubrik måste vara 255 tecken eller färre.',
	'BOARD_ANNOUNCEMENTS_APPEARANCE'		=> 'Utseende',
	'BOARD_ANNOUNCEMENTS_TONE'				=> 'Färgton',
	'BOARD_ANNOUNCEMENTS_TONE_EXPLAIN'		=> 'Välj ett förinställt färgschema eller välj Anpassad färg för att välja din egen.',
	'BOARD_ANNOUNCEMENTS_TONE_NEUTRAL'		=> 'Neutral',
	'BOARD_ANNOUNCEMENTS_TONE_INFO'			=> 'Information',
	'BOARD_ANNOUNCEMENTS_TONE_SUCCESS'		=> 'Framgång',
	'BOARD_ANNOUNCEMENTS_TONE_WARNING'		=> 'Varning',
	'BOARD_ANNOUNCEMENTS_TONE_CRITICAL'		=> 'Kritisk',
	'BOARD_ANNOUNCEMENTS_TONE_CUSTOM'		=> 'Anpassad färg',
	'BOARD_ANNOUNCEMENTS_TONE_INVALID'		=> 'Välj en giltig färgton.',
	'BOARD_ANNOUNCEMENTS_AUDIENCE_LOCATION'	=> 'Publik och plats',
	'BOARD_ANNOUNCEMENTS_SELECTED_GROUPS'	=> 'Utvalda grupper',
	'BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED'	=> 'Välj minst en grupp när Valda grupper är vald.',
	'BOARD_ANNOUNCEMENTS_SELECTED_LOCATIONS' => 'Utvalda platser',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_REQUIRED' => 'Välj minst en plats när Valda platser är vald.',
	'BOARD_ANNOUNCEMENTS_LOCATION_MODE_INVALID' => 'Välj en giltig visningsplats.',
	'BOARD_ANNOUNCEMENTS_INCLUDE_CHILDREN'	=> 'Visas även i underforum',
	'BOARD_ANNOUNCEMENTS_LOCATION_EMPTY'	=> 'Inga platser matchar din sökning.',
	'BOARD_ANNOUNCEMENTS_SCHEDULE_BEHAVIOR'	=> 'Schema och beteende',
	'BOARD_ANNOUNCEMENTS_SCHEDULE'			=> 'Schema',
	'BOARD_ANNOUNCEMENTS_START'				=> 'Startdatum',
	'BOARD_ANNOUNCEMENTS_START_EXPLAIN'		=> 'Lämna tomt för att börja visa meddelandet omedelbart.',
	'BOARD_ANNOUNCEMENTS_START_INVALID'		=> 'Startdatumet är ogiltigt.',
	'BOARD_ANNOUNCEMENTS_FILTER'			=> 'Filtrera',
	'BOARD_ANNOUNCEMENTS_STATUS'			=> 'Status',
	'BOARD_ANNOUNCEMENTS_STATUS_ALL'		=> 'Alla',
	'BOARD_ANNOUNCEMENTS_STATUS_ACTIVE'		=> 'Aktiv',
	'BOARD_ANNOUNCEMENTS_STATUS_SCHEDULED'	=> 'Schemalagt',
	'BOARD_ANNOUNCEMENTS_STATUS_DRAFT'		=> 'Förslag',
	'BOARD_ANNOUNCEMENTS_STATUS_EXPIRED'	=> 'Utgått',
	'BOARD_ANNOUNCEMENTS_STATUS_ARCHIVED'	=> 'Arkiverad',
	'BOARD_ANNOUNCEMENTS_STATE_INVALID'		=> 'Välj en giltig status.',
	'BOARD_ANNOUNCEMENTS_PUBLISH'			=> 'Publicera',
	'BOARD_ANNOUNCEMENTS_PUBLISHED'			=> 'Publicerad',
	'BOARD_ANNOUNCEMENTS_SHOW_AGAIN'		=> 'Visa igen för alla',
	'BOARD_ANNOUNCEMENTS_SHOWN_AGAIN'		=> 'Meddelandet kommer att visas igen för alla.',
	'BOARD_ANNOUNCEMENTS_ARCHIVE'			=> 'Arkiv',
	'BOARD_ANNOUNCEMENTS_ARCHIVED'			=> 'Tillkännagivandet arkiverat.',
	'BOARD_ANNOUNCEMENTS_DUPLICATE'			=> 'Duplicera',
	'BOARD_ANNOUNCEMENTS_DUPLICATED'		=> 'Meddelandet duplicerat som ett utkast.',
	'BOARD_ANNOUNCEMENTS_COPY_OF'			=> 'Kopia av %s',
	'BOARD_ANNOUNCEMENTS_NOW'				=> 'Omedelbart',
	'BOARD_ANNOUNCEMENTS_NO_END'			=> 'Inget slutdatum',
	'BOARD_ANNOUNCEMENTS_UNTITLED'			=> 'Namnlös meddelande',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH'	=> 'synlighet för forummeddelanden',
	'BOARD_ANNOUNCEMENTS_GLOBAL_DISABLED'	=> 'Alla meddelanden är för närvarande dolda.',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH_EXPLAIN' => 'Dölj eller visa alla meddelanden utan att ändra deras individuella status.',
	'BOARD_ANNOUNCEMENTS_DISMISS_EXPLAIN'	=> 'Besökare kan dölja detta meddelande efter att ha läst det.',
	'BOARD_ANNOUNCEMENTS_REORDER_FILTERED'	=> 'Rensa filter för att ändra meddelandeordning.',
	'BOARD_ANNOUNCEMENTS_FILTER_EMPTY'		=> 'Inga meddelanden matchar dessa filter.',
	'BOARD_ANNOUNCEMENTS_BULK_ACTION'		=> 'Bulkåtgärd',
	'BOARD_ANNOUNCEMENTS_BULK_UPDATED'		=> 'Utvalda meddelanden uppdaterades.',
	'BOARD_ANNOUNCEMENTS_DELETE_PERMANENTLY' => 'Ta bort permanent',
	'BOARD_ANNOUNCEMENTS_PREVIEW_MOBILE'	=> 'Mobil bredd',
	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Styrelsens kungörelse raderades',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Styrelsens meddelande kunde inte raderas',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Styrelsens meddelanden lyckades inte få bordslåset. En annan process kan vara att hålla låset. Lås tvångslöses efter en timeout på 1 timme.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Det begärda tillkännagivandet finns inte.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Det begärda meddelandet har ingen förälder.',
));
