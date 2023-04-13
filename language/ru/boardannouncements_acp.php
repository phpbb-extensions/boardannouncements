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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Настройки доски объявлений',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Здесь вы можете управлять и создавать объявления, которые будут отображаться на каждой странице вашего сайта.',

	'BOARD_ANNOUNCEMENTS_ENABLE_ALL'		=> 'Enable board announcements',

	'BOARD_ANNOUNCEMENTS_OPTIONS'			=> 'Announcement options',

	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Description',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'A short description for this announcement. This will only be visible here in the ACP to help identify this announcement.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Показывать эту доску объявлений',
	'BOARD_ANNOUNCEMENTS_INDEX_ONLY'		=> 'Display on board index only',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Кто может видеть доску объявлений',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Разрешить пользователям выключать это объявление',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Все',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Цвет фона объявления',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Вы можете изменить цвет фона объявления, используя шестнадцатеричный код (например: FFFF80). Оставьте это поле пустым, чтобы использовать цвет фона по умолчанию.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Срок действия объявления',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Установка даты и времени, при наступлении которых объявление будет отключено. Оставьте поле пустым, чтобы сделать объявление постоянным.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Дата задана некорректно или уже прошла.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Board announcement contains no message',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Сообщение доски объявлений',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Доска объявлений - Предпросмотр',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Доска объявлений была обновлена.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Description',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_WHERE'		=> 'Location',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Visible To',
	'BOARD_ANNOUNCEMENTS_TH_ENABLED'		=> 'Enabled',
	'BOARD_ANNOUNCEMENTS_TH_CREATED_DATE'	=> 'Creation Date',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRY_DATE'	=> 'Expiration Date',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRED'		=> 'Expired',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Everywhere',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'There are no board announcements to display',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Create Announcement',

	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'The board announcement was deleted',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'The board announcement could not be deleted',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Board announcements failed to acquire the table lock. Another process may be holding the lock. Locks are forcibly released after a timeout of 1 hour.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'The requested announcement does not exist.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'The requested announcement has no parent.',
));
