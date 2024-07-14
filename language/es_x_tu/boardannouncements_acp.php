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
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Aquí puedes gestionar y crear un anuncio del foro que se mostrará en cada página de tu foro.',

	'BOARD_ANNOUNCEMENTS_ENABLE_ALL'		=> 'Habilitar anuncios del foro',

	'BOARD_ANNOUNCEMENTS_OPTIONS'			=> 'Opciones del anuncio',

	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Descripción',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Una breve descripción de este anuncio. Esto solo será visible aquí en el PCA para ayudar a identificar este anuncio.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Mostrar este Anuncio del Foro',
	'BOARD_ANNOUNCEMENTS_USERS'				=> '¿Quién puede ver los anuncios del foro?',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Permitir a los usuarios descartar este Anuncio del Foro',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Limit where this announcement should be displayed',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_EXPLAIN'	=> 'Select one or more locations to display the announcement. To display it everywhere, leave the selection empty. Use Command (Mac) or Control (Windows) click to select multiple locations.',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Todos los usarios',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Color del fondo del anuncio del foro',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Puedes cambiar el color del fondo del anuncio usando código hexadecimal (por ejemplo: FFFF80). Deja este campo en blanco para usar el color por defecto.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Fecha de caducidad del anuncio del foro',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Establece la fecha en que el anuncio expirará y se desactivará. Deja este campo en blanco si no deseas que el anuncio expire.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'La fecha de caducidad no es válida, o ya ha caducado.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'El anuncio del foro no contiene ningún mensaje.',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Mensaje del anuncio del foro',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Anuncio del foro - Vista previa',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Anuncio del foro ha sido actualizado.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Descripción',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_WHERE'		=> 'Ubicación',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Visible a',
	'BOARD_ANNOUNCEMENTS_TH_ENABLED'		=> 'Activado',
	'BOARD_ANNOUNCEMENTS_TH_CREATED_DATE'	=> 'Fecha de creación',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRY_DATE'	=> 'Fecha de caducidad',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRED'		=> 'Expirado',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'En todos lados',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Board Index',
	'BOARD_ANNOUNCEMENTS_FORUMS'			=> 'Selected Forums',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'No hay anuncios del foro para mostrar',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Crear anuncio',

	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'El anuncio del foro fue eliminado.',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'No se pudo eliminar el anuncio del foro.',

	// Nested set exception messages (only appears in PHP error logging)
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Los anuncios del foro no lograron adquirir el bloqueo de la tabla. Otro proceso puede estar sosteniendo la cerradura. Los bloqueos se liberan a la fuerza después de un tiempo de espera de 1 hora.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'El anuncio solicitado no existe.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'El anuncio solicitado no tiene padre.',
));
