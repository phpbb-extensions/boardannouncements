<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* Spanish translation by Raul [ThE KuKa] (www.phpbb-es.com)
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Ajustes de anuncios del foro',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Aquí puede gestionar y crear un anuncio del foro que se mostrará en cada página de su foro.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Mostrar este Anuncio del Foro',
	'BOARD_ANNOUNCEMENTS_GUESTS'			=> 'Permitir a los invitados ver los anuncios del foro',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Permitir a los usuarios descartar este Anuncio del Foro',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Color del fondo del anuncio del foro',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Puede cambiar el color del fondo del anuncio usando código hexadecimal (por ejemplo: FFFF80). Deje este campo en blanco para usar el color por defecto.',

	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Mensaje del anuncio del foro',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Anuncio del foro - Vista previa',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Anuncio del foro ha sido actualizado.',
));
