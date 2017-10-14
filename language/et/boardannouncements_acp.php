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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Foorumi teadaande seaded',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Siin lehel saad hallata ja luua foorumi teadaannet, mida näidatakse igal foorumi leheküljel.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Näita seda foorumi teadaannet',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Kes saab vaadata foorumi teadaannet',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Luba liikmetel sellest foorumi teadaandest keelduda',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Igaüks',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> '“Foorumi teadaande” tagatausta värv',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Sa saad muuta tagatausta värvi teadaandel, kasutades hex koodi (näiteks: FFFF80). Jäta see väli tühjaks, et kasutada vaikimisi värvi.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Foorumi teadaanne aegumise kuupäev',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Määrake kuupäev väljakuulutamist aegub ja invaliidistunud. Jäta see väli tühjaks, kui sa ei taha teadaanne kehtivuse.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Aegumiskuupäev oli vigane või on juba lõppenud.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_FORMAT'		=> 'YYYY-MM-DD HH:MM',

	'BOARD_ANNOUNCEMENTS_TEXT'				=> '“Foorumi teadaande” sisu',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> '“Foorumi teadaande” eelvaade',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> '“Foorumi teadaanne” on uuendatud.',
));
