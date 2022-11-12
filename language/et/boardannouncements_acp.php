<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* Estonian translation by phpBBeesti.com <http://www.phpbbeesti.com>
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Foorumi Teadaannete seaded',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Siin saate hallata ja luua foorumil olevat teadaannet, mis kuvatakse teie foorumi kõigil lehtedel.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Kuva see Foorumi Teadaanne',
	'BOARD_ANNOUNCEMENTS_INDEX_ONLY'		=> 'Display on board index only',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Kes saab vaadata seda Foorumi Teadaannet',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Luba kasutajatel keelata Foorumi Teadaannet',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Igaüks',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Foorumi Teadaannete tausta värv',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Te saate muuta teate taustavärvi hex-koodi abil (näiteks: FFFF80). Vaikimisi värvi kasutamiseks jätke see väli tühjaks.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Foorumi Teadaande aegumise kuupäev',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Määrake kuupäev, millal teadeanne lõppeb ja muutub nähtamatuks. Jätke see väli tühjaks, kui te ei soovi, et teadeanne aeguks.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Aegumise kuupäev on vigane või on juba aegunud.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_FORMAT'		=> 'AAAA-KK-PP HH:MM',

	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Foorumi Teadaande sõnum',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Foorumi Teadaande - Eelvaade',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Foorumi Teadaanne on uuendatud.',
));
