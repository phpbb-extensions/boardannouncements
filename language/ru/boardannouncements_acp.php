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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Настройки объявлений',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Здесь вы можете создавать и управлять объявлениями, которые будут отображаться на страницах вашей конференции.',

	'BOARD_ANNOUNCEMENTS_ENABLE_ALL'		=> 'Разрешить объявления',

	'BOARD_ANNOUNCEMENTS_OPTIONS'			=> 'Параметры объявления',

	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Описание',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Краткое описание, которое будет видно только в ACP и поможет идентифицировать данное объявление.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Показывать это объявление',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Кто может видеть это объявление',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Разрешить пользователям скрывать это объявление',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Limit where this announcement should be displayed',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_EXPLAIN'	=> 'Select one or more locations to display the announcement. To display it everywhere, leave the selection empty. Use Command (Mac) or Control (Windows) click to select multiple locations.',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Все',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Цвет фона',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Вы можете изменить цвет фона объявления, используя шестнадцатеричный код (например: FFFF80). Оставьте это поле пустым, чтобы использовать цвет фона по умолчанию.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Срок действия',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Установка даты и времени, при наступлении которых объявление будет отключено. Оставьте поле пустым, чтобы сделать объявление постоянным.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Дата задана некорректно или уже прошла',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Отсутствует текст объявления',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Текст объявления',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Предпросмотр объявления',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Изменения в объявлении сохранены',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Описание',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_WHERE'		=> 'Размещение',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Видимость',
	'BOARD_ANNOUNCEMENTS_TH_ENABLED'		=> 'Включено',
	'BOARD_ANNOUNCEMENTS_TH_CREATED_DATE'	=> 'Дата создания',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRY_DATE'	=> 'Дата завершения',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRED'		=> 'Завершено',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Везде',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Board Index',
	'BOARD_ANNOUNCEMENTS_FORUMS'			=> 'Selected Forums',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Нет объявлений для отображения',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Создать объявление',

	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Объявление было удалено',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Объявление не может быть удалено',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Board announcements failed to acquire the table lock. Another process may be holding the lock. Locks are forcibly released after a timeout of 1 hour.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'The requested announcement does not exist.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'The requested announcement has no parent.',
));
