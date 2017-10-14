<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* Norwegian translation by Rolv R. Hauge (http://rolvhauge.no)
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Instillinger for forummeldinger',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Her kan du behandle og opprette en forummelding som vil bli vist på hver side i forumet ditt.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Vis denne forummeldingen',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Hvem kan se denne forummeldingen',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'La brukere lukke denne forummeldingen',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Alle',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Bakgrunnsfarge for forummeldingen',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Du kan endre bakgrunnsfarge for forummeldingen ved å angi en hex-kode (f.eks.: FFFF80). La dette feltet stå tomt for å bruke standardfargen.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Utløpsdato for forummeldingen',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Still inn datoen da kunngjøringen vil utløpe og bli deaktivert. La feltet være tomt hvis du ikke vil at kunngjøringen skal utløpe.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Utløpsdatoen var ugyldig eller er allerede utløpt.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_FORMAT'		=> 'YYYY-MM-DD HH:MM',

	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Forummelding',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Forummelding - forhåndsvisning',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Forummeldingen har blitt oppdatert.',
));
