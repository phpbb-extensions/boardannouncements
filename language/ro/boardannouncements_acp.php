<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Setări anunţuri forum',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Aici puteţi gestiona sau crea anunţuri care vor fi afişate pe fiecare pagină a forumului.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Afişează acest anunţ',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Cine poate vedea acest anunț',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Permite utilizatorilor să respingă anunţul',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Toata lumea',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Culoarea background-ului',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Puteţi schimba culoarea de fundal a anunţului folosind un cod hex (Ex: FFFF80). Lasă acest câmp necompletat pentru a utiliza culoarea prestabilită.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Anunt data de expirare',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Setați data la care anunța va expira și va deveni dezactivată. Lăsați acest câmp necompletat dacă nu doriți ca anunțul să expire.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Data de expirare a fost nevalidă sau a expirat deja.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_FORMAT'		=> 'YYYY-MM-DD HH:MM',

	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Mesaj anunţ forum',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Anunţ forum - Previzualizare',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Anunţul a fost actualizat.',
));
