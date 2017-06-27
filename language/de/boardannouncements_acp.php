<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* German (Casual) translation by Talk19Zehn (www.ongray-design.de)
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

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Diese Board-Ankündigung anzeigen',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Wer kann diese Board-Ankündigung sehen',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Nutzern erlauben, die Board-Ankündigung zu schließen',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Alle',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Hintergrundfarbe für die Board-Ankündigung einstellen',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Die Hintergrundfarbe kannst du im HEX-Code (Beispiel: #FFFF80) hinterlegen. Lasse den Wert frei, um die Standardfarbe zu nutzen.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Ablaufdatum der Board-Ankündigung einstellen',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Setzen Sie das Datum, an dem die Ansage abläuft und deaktiviert wird. Lassen Sie dieses Feld leer, wenn Sie nicht möchten, dass die Ankündigung abläuft.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Das Verfallsdatum war ungültig oder ist bereits abgelaufen.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_FORMAT'		=> 'YYYY-MM-DD HH:MM',

	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Text der Board-Ankündigung',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Vorschau der Board-Ankündigung',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Die Board-Ankündigung wurde aktualisiert.',
));
