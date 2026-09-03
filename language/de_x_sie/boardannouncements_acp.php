<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* German (Formal honorifics) translation by Talk19Zehn (www.ongray-design.de)
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Ankündigungen - Einstellungen',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Verwaltung der Board-Ankündigung, die auf jeder Seite im Board angezeigt werden wird.',

	'BOARD_ANNOUNCEMENTS_ENABLE_ALL'		=> 'Aktivieren Sie Board-Ankündigungen',

	'BOARD_ANNOUNCEMENTS_OPTIONS'			=> 'Announcement options',

	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Beschreibung',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'Die Beschreibung ist zu lang. Einige Sonderzeichen benötigen zusätzlichen Speicherplatz.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Eine kurze Beschreibung für diese Ankündigung. Dies wird hier im ACP nur sichtbar sein, um die Identifizierung dieser Ankündigung zu erleichtern.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Diese Board-Ankündigung anzeigen',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Wer kann diese Board-Ankündigung sehen',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Nutzern erlauben, die Board-Ankündigung zu schließen',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Begrenzen Sie, wo diese Ankündigung angezeigt werden soll',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_EXPLAIN'	=> 'Wählen Sie einen oder mehrere Orte aus, an denen die Ankündigung angezeigt werden soll. Um es überall anzuzeigen, lassen Sie die Auswahl leer. Klicken Sie mit der Befehlstaste (Mac) oder der Strg-Taste (Windows), um mehrere Speicherorte auszuwählen.',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Alle',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Hintergrundfarbe für die Board-Ankündigung einstellen',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'Die Hintergrundfarbe muss ein sechsstelliger hexadezimaler Farbcode sein.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Die Hintergrundfarbe können Sie im HEX-Code (Beispiel: #FFFF80) hinterlegen. Anmerkung: Farbwert freilassen, um die Standardfarbe zu nutzen.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Ablaufdatum der Board-Ankündigung einstellen',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Setzen Sie das Datum, an dem die Ansage abläuft und deaktiviert wird. Lassen Sie dieses Feld leer, wenn Sie nicht möchten, dass die Ankündigung abläuft.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Das Verfallsdatum war ungültig oder ist bereits abgelaufen.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Die Board-Ankündigung enthält keine Nachricht',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Text der Board-Ankündigung',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Vorschau der Board-Ankündigung',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Die Board-Ankündigung wurde aktualisiert.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Beschreibung',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_WHERE'		=> 'Standort',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Sichtbar für',
	'BOARD_ANNOUNCEMENTS_TH_ENABLED'		=> 'Ermöglicht',
	'BOARD_ANNOUNCEMENTS_TH_CREATED_DATE'	=> 'Erstellungsdatum',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRY_DATE'	=> 'Verfallsdatum',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRED'		=> 'Abgelaufen',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Überall',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Board-Index',
	'BOARD_ANNOUNCEMENTS_FORUMS'			=> 'Ausgewählte Foren',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Es sind keine anzuzeigenden Board-Ankündigungen vorhanden',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Ankündigung erstellen',

	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Die Vorstandsmitteilung wurde gelöscht',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Die Board-Ankündigung konnte nicht gelöscht werden',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Vorstandsankündigungen konnten die Tabellensperre nicht erlangen. Möglicherweise hält ein anderer Prozess die Sperre aufrecht. Sperren werden nach einer Zeitüberschreitung von 1 Stunde zwangsweise freigegeben.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Die angeforderte Ankündigung existiert nicht.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Die angeforderte Ankündigung hat kein übergeordnetes Element.',
));
