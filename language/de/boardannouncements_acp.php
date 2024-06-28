<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* German (Casual) translation by Talk19Zehn (www.ongray-design.de) and Scanialady (https://ladyscommunity.de)
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Einstellungen Board-Ankündigungen',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Hier kannst du deine Board-Ankündigungen verwalten.',

	'BOARD_ANNOUNCEMENTS_ENABLE_ALL'		=> 'Aktiviere Board-Ankündigungen',

	'BOARD_ANNOUNCEMENTS_OPTIONS'			=> 'Ankündigungsoptionen',

	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Beschreibung',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Eine kurze Beschreibung für diese Ankündigung. Dies wird lediglich im ACP angezeigt, um bei der Identifizierung dieser Ankündigung zu helfen.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Diese Board-Ankündigung anzeigen',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Wer kann diese Board-Ankündigung sehen',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Mitgliedern erlauben, die Board-Ankündigung zu schließen',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Limit where this announcement should be displayed',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_EXPLAIN'	=> 'Select one or more locations to display the announcement. To display it everywhere, leave the selection empty. Use Command (Mac) or Control (Windows) click to select multiple locations.',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Alle',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Hintergrundfarbe der Board-Ankündigung',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Du kannst die Hintergrundfarbe der Ankündigung mittels HEX-Code ändern (Beispiel: #FFFF80). Lasse den Wert frei, um die Standardfarbe zu nutzen.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Ablaufdatum der Board-Ankündigung einstellen',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Setze das Datum, an dem die Ankündigung abläuft und deaktiviert wird. Lasse dieses Feld leer, wenn du nicht willst, dass die Ankündigung abläuft.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Das Ablaufdatum war ungültig oder ist bereits abgelaufen.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Die Board-Ankündigung enthält keine Nachricht',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Text der Board-Ankündigung',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Vorschau der Board-Ankündigung',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Die Board-Ankündigung wurde aktualisiert.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Beschreibung',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_WHERE'		=> 'Anzeigeort',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Sichtbar für',
	'BOARD_ANNOUNCEMENTS_TH_ENABLED'		=> 'Aktiviert',
	'BOARD_ANNOUNCEMENTS_TH_CREATED_DATE'	=> 'Erstelldatum',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRY_DATE'	=> 'Ablaufdatum',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRED'		=> 'Abgelaufen',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Überall',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Board Index',
	'BOARD_ANNOUNCEMENTS_FORUMS'			=> 'Selected Forums',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Da sind keine Board-Ankündigungen zur Anzeige',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Erstelle Ankündigung',

	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Die Board-Ankündigung wurde gelöscht',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Die Board-Ankündigung konnte nicht gelöscht werden',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Board-Ankündigung konnte die Tabellensperre nicht erlangen. Möglicherweise hält ein anderer Prozess die Sperre aufrecht. Sperren werden nach einer Zeitüberschreitung von 1 Stunde zwangsweise freigegeben.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Die angefragte Ankündigung existiert nicht.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Die angefragte Ankündigung hat kein übergeordnetes Element.',
));
