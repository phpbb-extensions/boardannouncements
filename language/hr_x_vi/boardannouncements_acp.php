<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* Croatian translation by Ančica Sečan (http://ancica.sunceko.net)
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Postavke forumskih obavijesti',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Ovdje možete dodavati i upravljati forumskim obavijestima (a) koje će biti prikazane na svakoj stranici foruma.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Prikažite ovu forumsku obavijest',
	'BOARD_ANNOUNCEMENTS_INDEX_ONLY'		=> 'Prikažite samo na početnoj stranici foruma',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Tko može vidjeti ovu forumsku obavijest',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Omogućite korisnicima/ama zatvaranje ove forumske obavijesti',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Svi/e',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Pozadinska boja forumske obavijesti',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Pozadinsku boju forumske obavijesti možete mijenjati korištenjem hex kodova (npr.: FFFF80).<br>Za korištenje zadane boje, ostavite ovo polje praznim.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Datum isteka forumske obavijesti',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Na postavljeni datum, forumska obavijest će isteći i postati onemogućena. Ukoliko ne želite da forumska obavijest istekne, ostavite ovo polje praznim.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Datum isteka je neispravan ili je već prošao.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_FORMAT'		=> 'YYYY-MM-DD HH:MM',

	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Poruka forumske obavijesti',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Prikaz forumske obavijesti',
	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Forumska obavijest je ažurirana.',
));
