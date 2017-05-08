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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Impostazioni annunci',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Qui è possibile gestire e creare un annuncio che sarà mostrato in ogni pagina del forum.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Abilita annuncio',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Chi può vedere quest’annuncio',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Permetti agli utenti di chiudere quest’annuncio',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Tutti',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Colore di sfondo annuncio',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'È possibile cambiare il colore di sfondo dell’annuncio usando un codice esadecimale (per esempio FFFF80). Lasciare questo campo in bianco per usare il colore predefinito.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Data di scadenza annuncio',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Imposta la data in cui scadrà l’annuncio. Per non avere una scadenza, lasciare questo campo in bianco.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Data di scadenza non valida o già trascorsa.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_FORMAT'		=> 'YYYY-MM-DD HH:MM',

	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Testo dell’annuncio',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Anteprima annuncio',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'L’annuncio è stato aggiornato.',
));
