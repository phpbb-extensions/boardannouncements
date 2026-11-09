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



	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Descripción',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'La descripción es demasiado larga. Algunos caracteres especiales requieren espacio de almacenamiento adicional.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Una breve descripción de este anuncio. Esto solo será visible aquí en el PCA para ayudar a identificar este anuncio.',

	'BOARD_ANNOUNCEMENTS_USERS'				=> '¿Quién puede ver los anuncios del foro?',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Permitir a los usuarios descartar este Anuncio del Foro',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Dónde debe mostrarse este anuncio',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Todos los usarios',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Color del fondo del anuncio del foro',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_PICKER'	=> 'Selector de color de fondo',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_HEX'		=> 'Código hexadecimal del color de fondo',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'El color de fondo debe ser un código de color hexadecimal de seis caracteres.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Elige un color de fondo para la opción Color personalizado o introduce un código hexadecimal de seis caracteres.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Fecha de caducidad del anuncio del foro',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Establece la fecha en que el anuncio expirará y se desactivará. Deja este campo en blanco si no deseas que el anuncio expire.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'La fecha de caducidad no es válida, o ya ha caducado.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'El anuncio del foro no contiene ningún mensaje.',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Mensaje del anuncio del foro',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Anuncio del foro - Vista previa',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Anuncio del foro ha sido actualizado.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Anuncio',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Visible a',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'En todos lados',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Índice del tablero',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'No hay anuncios del foro para mostrar',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Crear anuncio',

	'BOARD_ANNOUNCEMENTS_EDIT'				=> 'Editar anuncio',
	'BOARD_ANNOUNCEMENTS_EDITOR_EXPLAIN'	=> 'Redacta el mensaje, elige su audiencia y controla cuándo aparece.',
	'BOARD_ANNOUNCEMENTS_CONTENT'			=> 'Contenido',
	'BOARD_ANNOUNCEMENTS_TITLE'				=> 'Encabezado del anuncio',
	'BOARD_ANNOUNCEMENTS_TITLE_EXPLAIN'		=> 'Encabezado opcional que se muestra encima del mensaje de anuncio.',
	'BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG'	=> 'El encabezado del anuncio debe tener 255 caracteres o menos.',
	'BOARD_ANNOUNCEMENTS_APPEARANCE'		=> 'Apariencia',
	'BOARD_ANNOUNCEMENTS_TONE'				=> 'tono de color',
	'BOARD_ANNOUNCEMENTS_TONE_EXPLAIN'		=> 'Elige un esquema de color preestablecido o selecciona Color personalizado para elegir el tuyo.',
	'BOARD_ANNOUNCEMENTS_TONE_NEUTRAL'		=> 'Neutral',
	'BOARD_ANNOUNCEMENTS_TONE_INFO'			=> 'Información',
	'BOARD_ANNOUNCEMENTS_TONE_SUCCESS'		=> 'Éxito',
	'BOARD_ANNOUNCEMENTS_TONE_WARNING'		=> 'Advertencia',
	'BOARD_ANNOUNCEMENTS_TONE_CRITICAL'		=> 'Crítico',
	'BOARD_ANNOUNCEMENTS_TONE_CUSTOM'		=> 'Color personalizado',
	'BOARD_ANNOUNCEMENTS_TONE_INVALID'		=> 'Selecciona un tono de color válido.',
	'BOARD_ANNOUNCEMENTS_AUDIENCE_LOCATION'	=> 'Audiencia y ubicación',
	'BOARD_ANNOUNCEMENTS_SELECTED_GROUPS'	=> 'Grupos seleccionados',
	'BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED'	=> 'Selecciona al menos un grupo cuando se elija Grupos seleccionados.',
	'BOARD_ANNOUNCEMENTS_SELECTED_LOCATIONS' => 'Ubicaciones seleccionadas',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_REQUIRED' => 'Selecciona al menos una ubicación cuando se elija Ubicaciones seleccionadas.',
	'BOARD_ANNOUNCEMENTS_LOCATION_MODE_INVALID' => 'Selecciona una ubicación de visualización válida.',
	'BOARD_ANNOUNCEMENTS_INCLUDE_CHILDREN'	=> 'Mostrar también en subforos',
	'BOARD_ANNOUNCEMENTS_LOCATION_EMPTY'	=> 'Ninguna ubicación coincide con tu búsqueda.',
	'BOARD_ANNOUNCEMENTS_SCHEDULE_BEHAVIOR'	=> 'Horario y comportamiento',
	'BOARD_ANNOUNCEMENTS_SCHEDULE'			=> 'Cronograma',
	'BOARD_ANNOUNCEMENTS_START'				=> 'Fecha de inicio',
	'BOARD_ANNOUNCEMENTS_START_EXPLAIN'		=> 'Déjalo en blanco para comenzar a mostrar el anuncio de inmediato.',
	'BOARD_ANNOUNCEMENTS_START_INVALID'		=> 'La fecha de inicio no es válida.',
	'BOARD_ANNOUNCEMENTS_FILTER'			=> 'Filtrar',
	'BOARD_ANNOUNCEMENTS_STATUS'			=> 'Estado',
	'BOARD_ANNOUNCEMENTS_STATUS_ALL'		=> 'Todo',
	'BOARD_ANNOUNCEMENTS_STATUS_ACTIVE'		=> 'Activo',
	'BOARD_ANNOUNCEMENTS_STATUS_SCHEDULED'	=> 'Programado',
	'BOARD_ANNOUNCEMENTS_STATUS_DRAFT'		=> 'Borrador',
	'BOARD_ANNOUNCEMENTS_STATUS_EXPIRED'	=> 'Venció',
	'BOARD_ANNOUNCEMENTS_STATUS_ARCHIVED'	=> 'Archivado',
	'BOARD_ANNOUNCEMENTS_STATE_INVALID'		=> 'Selecciona un estado válido.',
	'BOARD_ANNOUNCEMENTS_PUBLISH'			=> 'Publicar',
	'BOARD_ANNOUNCEMENTS_PUBLISHED'			=> 'Publicado',
	'BOARD_ANNOUNCEMENTS_SHOW_AGAIN'		=> 'Mostrar de nuevo a todos',
	'BOARD_ANNOUNCEMENTS_SHOWN_AGAIN'		=> 'El anuncio se mostrará nuevamente a todos.',
	'BOARD_ANNOUNCEMENTS_ARCHIVE'			=> 'Archivo',
	'BOARD_ANNOUNCEMENTS_ARCHIVED'			=> 'Anuncio archivado.',
	'BOARD_ANNOUNCEMENTS_DUPLICATE'			=> 'Duplicado',
	'BOARD_ANNOUNCEMENTS_DUPLICATED'		=> 'Anuncio duplicado como borrador.',
	'BOARD_ANNOUNCEMENTS_COPY_OF'			=> 'Copia de %s',
	'BOARD_ANNOUNCEMENTS_NOW'				=> 'Inmediatamente',
	'BOARD_ANNOUNCEMENTS_NO_END'			=> 'Sin fecha de finalización',
	'BOARD_ANNOUNCEMENTS_UNTITLED'			=> 'Anuncio sin título',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH'	=> 'visibilidad de los anuncios del foro',
	'BOARD_ANNOUNCEMENTS_GLOBAL_DISABLED'	=> 'Todos los anuncios están actualmente ocultos.',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH_EXPLAIN' => 'Oculta o muestra todos los anuncios sin cambiar sus estados individuales.',
	'BOARD_ANNOUNCEMENTS_DISMISS_EXPLAIN'	=> 'Los visitantes pueden ocultar este anuncio después de leerlo.',
	'BOARD_ANNOUNCEMENTS_REORDER_FILTERED'	=> 'Borra los filtros para cambiar el orden de los anuncios.',
	'BOARD_ANNOUNCEMENTS_FILTER_EMPTY'		=> 'Ningún anuncio coincide con estos filtros.',
	'BOARD_ANNOUNCEMENTS_BULK_ACTION'		=> 'Acción masiva',
	'BOARD_ANNOUNCEMENTS_BULK_UPDATED'		=> 'Se actualizaron los anuncios seleccionados.',
	'BOARD_ANNOUNCEMENTS_DELETE_PERMANENTLY' => 'Eliminar permanentemente',
	'BOARD_ANNOUNCEMENTS_PREVIEW_MOBILE'	=> 'Ancho móvil',
	'BOARD_ANNOUNCEMENTS_JAVASCRIPT_REQUIRED' => 'JavaScript debe estar habilitado para la vista previa y todas las funciones del editor.',
	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'El anuncio del foro fue eliminado.',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'No se pudo eliminar el anuncio del foro.',

	// Nested set exception messages (only appears in PHP error logging)
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Los anuncios del foro no lograron adquirir el bloqueo de la tabla. Otro proceso puede estar sosteniendo la cerradura. Los bloqueos se liberan a la fuerza después de un tiempo de espera de 1 hora.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'El anuncio solicitado no existe.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'El anuncio solicitado no tiene padre.',
));
