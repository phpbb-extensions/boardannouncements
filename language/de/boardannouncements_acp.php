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



	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Beschreibung',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'Die Beschreibung ist zu lang. Einige Sonderzeichen benötigen zusätzlichen Speicherplatz.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Eine kurze Beschreibung für diese Ankündigung. Dies wird lediglich im ACP angezeigt, um bei der Identifizierung dieser Ankündigung zu helfen.',

	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Wer kann diese Board-Ankündigung sehen',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Mitgliedern erlauben, die Board-Ankündigung zu schließen',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Wo diese Ankündigung angezeigt werden soll',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Alle',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Hintergrundfarbe der Board-Ankündigung',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_PICKER'	=> 'Auswahl der Hintergrundfarbe',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_HEX'		=> 'Hexadezimalcode für die Hintergrundfarbe',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'Die Hintergrundfarbe muss ein sechsstelliger hexadezimaler Farbcode sein.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Wähle eine Hintergrundfarbe für die Option „Benutzerdefinierte Farbe“ oder gib einen sechsstelligen Hexadezimalcode ein.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Ablaufdatum der Board-Ankündigung einstellen',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Setze das Datum, an dem die Ankündigung abläuft und deaktiviert wird. Lasse dieses Feld leer, wenn du nicht willst, dass die Ankündigung abläuft.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Das Ablaufdatum war ungültig oder ist bereits abgelaufen.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Die Board-Ankündigung enthält keine Nachricht',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Text der Board-Ankündigung',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Vorschau der Board-Ankündigung',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Die Board-Ankündigung wurde aktualisiert.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Bekanntmachung',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Sichtbar für',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Überall',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Board-Index',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Da sind keine Board-Ankündigungen zur Anzeige',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Erstelle Ankündigung',

	'BOARD_ANNOUNCEMENTS_EDIT'				=> 'Ankündigung bearbeiten',
	'BOARD_ANNOUNCEMENTS_EDITOR_EXPLAIN'	=> 'Verfasse die Nachricht, wähle ihre Zielgruppe aus und lege fest, wann sie erscheint.',
	'BOARD_ANNOUNCEMENTS_CONTENT'			=> 'Inhalt',
	'BOARD_ANNOUNCEMENTS_TITLE'				=> 'Überschrift der Ankündigung',
	'BOARD_ANNOUNCEMENTS_TITLE_EXPLAIN'		=> 'Optionale Überschrift, die über der Ankündigungsnachricht angezeigt wird.',
	'BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG'	=> 'Die Überschrift der Ankündigung darf maximal 255 Zeichen lang sein.',
	'BOARD_ANNOUNCEMENTS_APPEARANCE'		=> 'Aussehen',
	'BOARD_ANNOUNCEMENTS_TONE'				=> 'Farbton',
	'BOARD_ANNOUNCEMENTS_TONE_EXPLAIN'		=> 'Wähle ein voreingestelltes Farbschema oder „Benutzerdefinierte Farbe“, um eine eigene Farbe auszuwählen.',
	'BOARD_ANNOUNCEMENTS_TONE_NEUTRAL'		=> 'Neutral',
	'BOARD_ANNOUNCEMENTS_TONE_INFO'			=> 'Information',
	'BOARD_ANNOUNCEMENTS_TONE_SUCCESS'		=> 'Erfolg',
	'BOARD_ANNOUNCEMENTS_TONE_WARNING'		=> 'Warnung',
	'BOARD_ANNOUNCEMENTS_TONE_CRITICAL'		=> 'Kritisch',
	'BOARD_ANNOUNCEMENTS_TONE_CUSTOM'		=> 'Benutzerdefinierte Farbe',
	'BOARD_ANNOUNCEMENTS_TONE_INVALID'		=> 'Wähle einen gültigen Farbton.',
	'BOARD_ANNOUNCEMENTS_AUDIENCE_LOCATION'	=> 'Publikum und Ort',
	'BOARD_ANNOUNCEMENTS_SELECTED_GROUPS'	=> 'Ausgewählte Gruppen',
	'BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED'	=> 'Wähle mindestens eine Gruppe aus, wenn „Ausgewählte Gruppen“ ausgewählt ist.',
	'BOARD_ANNOUNCEMENTS_SELECTED_LOCATIONS' => 'Ausgewählte Standorte',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_REQUIRED' => 'Wähle mindestens einen Standort aus, wenn „Ausgewählte Standorte“ ausgewählt ist.',
	'BOARD_ANNOUNCEMENTS_LOCATION_MODE_INVALID' => 'Wähle einen gültigen Anzeigeort.',
	'BOARD_ANNOUNCEMENTS_INCLUDE_CHILDREN'	=> 'Wird auch in Unterforen angezeigt',
	'BOARD_ANNOUNCEMENTS_LOCATION_EMPTY'	=> 'Zu deiner Suche passen keine Standorte.',
	'BOARD_ANNOUNCEMENTS_SCHEDULE_BEHAVIOR'	=> 'Zeitplan und Verhalten',
	'BOARD_ANNOUNCEMENTS_SCHEDULE'			=> 'Zeitplan',
	'BOARD_ANNOUNCEMENTS_START'				=> 'Startdatum',
	'BOARD_ANNOUNCEMENTS_START_EXPLAIN'		=> 'Lasse das Feld leer, um die Ankündigung sofort anzuzeigen.',
	'BOARD_ANNOUNCEMENTS_START_INVALID'		=> 'Das Startdatum ist ungültig.',
	'BOARD_ANNOUNCEMENTS_FILTER'			=> 'Filter',
	'BOARD_ANNOUNCEMENTS_STATUS'			=> 'Status',
	'BOARD_ANNOUNCEMENTS_STATUS_ALL'		=> 'Alle',
	'BOARD_ANNOUNCEMENTS_STATUS_ACTIVE'		=> 'Aktiv',
	'BOARD_ANNOUNCEMENTS_STATUS_SCHEDULED'	=> 'Geplant',
	'BOARD_ANNOUNCEMENTS_STATUS_DRAFT'		=> 'Entwurf',
	'BOARD_ANNOUNCEMENTS_STATUS_EXPIRED'	=> 'Abgelaufen',
	'BOARD_ANNOUNCEMENTS_STATUS_ARCHIVED'	=> 'Archiviert',
	'BOARD_ANNOUNCEMENTS_STATE_INVALID'		=> 'Wähle einen gültigen Status aus.',
	'BOARD_ANNOUNCEMENTS_PUBLISH'			=> 'Veröffentlichen',
	'BOARD_ANNOUNCEMENTS_PUBLISHED'			=> 'Veröffentlicht',
	'BOARD_ANNOUNCEMENTS_SHOW_AGAIN'		=> 'Nochmals allen zeigen',
	'BOARD_ANNOUNCEMENTS_SHOWN_AGAIN'		=> 'Die Ankündigung wird allen noch einmal angezeigt.',
	'BOARD_ANNOUNCEMENTS_ARCHIVE'			=> 'Archiv',
	'BOARD_ANNOUNCEMENTS_ARCHIVED'			=> 'Ankündigung archiviert.',
	'BOARD_ANNOUNCEMENTS_DUPLICATE'			=> 'Duplikat',
	'BOARD_ANNOUNCEMENTS_DUPLICATED'		=> 'Ankündigung als Entwurf dupliziert.',
	'BOARD_ANNOUNCEMENTS_COPY_OF'			=> 'Kopie von %s',
	'BOARD_ANNOUNCEMENTS_NOW'				=> 'Sofort',
	'BOARD_ANNOUNCEMENTS_NO_END'			=> 'Kein Enddatum',
	'BOARD_ANNOUNCEMENTS_UNTITLED'			=> 'Ankündigung ohne Titel',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH'	=> 'Sichtbarkeit von Forumsankündigungen',
	'BOARD_ANNOUNCEMENTS_GLOBAL_DISABLED'	=> 'Alle Ankündigungen sind derzeit ausgeblendet.',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH_EXPLAIN' => 'Alle Ankündigungen ausblenden oder anzeigen, ohne ihren individuellen Status zu ändern.',
	'BOARD_ANNOUNCEMENTS_DISMISS_EXPLAIN'	=> 'Besucher können diese Ankündigung nach dem Lesen ausblenden.',
	'BOARD_ANNOUNCEMENTS_REORDER_FILTERED'	=> 'Lösche die Filter, um die Ankündigungsreihenfolge zu ändern.',
	'BOARD_ANNOUNCEMENTS_FILTER_EMPTY'		=> 'Keine Ankündigungen entsprechen diesen Filtern.',
	'BOARD_ANNOUNCEMENTS_BULK_ACTION'		=> 'Massenaktion',
	'BOARD_ANNOUNCEMENTS_BULK_UPDATED'		=> 'Ausgewählte Ankündigungen wurden aktualisiert.',
	'BOARD_ANNOUNCEMENTS_DELETE_PERMANENTLY' => 'Dauerhaft löschen',
	'BOARD_ANNOUNCEMENTS_PREVIEW_MOBILE'	=> 'Mobile Breite',
	'BOARD_ANNOUNCEMENTS_JAVASCRIPT_REQUIRED' => 'JavaScript muss für die Vorschau und den vollen Funktionsumfang des Editors aktiviert sein.',
	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Die Board-Ankündigung wurde gelöscht',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Die Board-Ankündigung konnte nicht gelöscht werden',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Board-Ankündigung konnte die Tabellensperre nicht erlangen. Möglicherweise hält ein anderer Prozess die Sperre aufrecht. Sperren werden nach einer Zeitüberschreitung von 1 Stunde zwangsweise freigegeben.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Die angefragte Ankündigung existiert nicht.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Die angefragte Ankündigung hat kein übergeordnetes Element.',
));
