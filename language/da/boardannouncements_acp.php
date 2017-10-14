<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* Danish translation by jask (phpbb3.dk)
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Boardannonceringer',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Her kan du oprette og ændre annonceringer som vises på alle sider på dit board.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Aktiver boardannonceringer',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Hvem kan se dette boardannonceringer',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Tillad at brugere kan afvise denne boardannoncering',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Alle',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Baggrundsfarve',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Du kan ændre boardannonceringens baggrundsfarve med en hexcode for den ønskede farve (f.eks: FFFF80). Efterlades feltet tomt anvendes standardfarven.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Board annoncering udløbsdato',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Indstil datoen, hvor meddelelsen udløber og deaktiveres. Lad feltet være tomt, hvis du ikke ønsker, at meddelelsen skal udløbe.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Udløbsdatoen var ugyldig eller er allerede udløbet.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_FORMAT'		=> 'YYYY-MM-DD HH:MM',

	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Annonceringens test',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Vis annoncering',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Boardannoncering er opdateret.',
));
