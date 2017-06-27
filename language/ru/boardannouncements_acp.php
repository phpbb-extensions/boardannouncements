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

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Показывать эту доску объявлений',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Кто может видеть доску объявлений',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Разрешить пользователям выключать это объявление',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Все',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Цвет фона объявления',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Вы можете изменить цвет фона объявления, используя шестнадцатеричный код (например: FFFF80). Оставьте это поле пустым, чтобы использовать цвет фона по умолчанию.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Срок действия объявления',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Установка даты и времени, при наступлении которых объявление будет отключено. Оставьте поле пустым, чтобы сделать объявление постоянным.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Дата задана некорректно или уже прошла.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_FORMAT'		=> 'ГГГГ-ММ-ДД ЧЧ:ММ',

	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Сообщение доски объявлений',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Доска объявлений - Предпросмотр',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Доска объявлений была обновлена.',
));
