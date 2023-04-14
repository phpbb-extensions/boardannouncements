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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Налаштування дошки оголошень',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Тут ви можете керувати та створювати оголошення, які будуть відображатися на кожній сторінці вашого сайту.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Показувати цю дошку оголошень',
	'BOARD_ANNOUNCEMENTS_INDEX_ONLY'		=> 'Відображення лише на головній сторінці',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Хто може бачити дошку оголошень',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Дозволити користувачам вимикати це оголошення',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Все',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Колір фону оголошення',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Ви можете змінити колір фону оголошення за допомогою шістнадцяткового коду (наприклад: FFFF80). Залишіть це поле порожнім, щоб використовувати колір фону за замовчуванням.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Термін дії оголошення',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Встановлення дати та часу, при настанні яких оголошення буде вимкнено. Залишіть поле порожнім, щоб зробити оголошення постійним.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Дата задано некоректно або вже пройшла.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_FORMAT'		=> 'РРРР-ММ-ДД ЧЧ:ХХ',

	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Повідомлення дошки оголошень',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Дошка оголошень - Перегляд',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Дошка оголошень була оновлена.',
));
