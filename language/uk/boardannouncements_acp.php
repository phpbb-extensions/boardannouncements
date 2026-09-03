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

	'BOARD_ANNOUNCEMENTS_ENABLE_ALL'		=> 'Увімкнути оголошення на дошці',

	'BOARD_ANNOUNCEMENTS_OPTIONS'			=> 'Announcement options',

	'BOARD_ANNOUNCEMENTS_DESC'				=> 'опис',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'Опис задовгий. Деякі спеціальні символи потребують додаткового місця для зберігання.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Короткий опис цього оголошення. Це буде видно лише тут, у ACP, щоб допомогти ідентифікувати це оголошення.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Показувати цю дошку оголошень',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Хто може бачити дошку оголошень',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Дозволити користувачам вимикати це оголошення',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Обмежте, де має відображатися це оголошення',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_EXPLAIN'	=> 'Виберіть одне або кілька місць для відображення оголошення. Щоб відображати його всюди, залиште поле порожнім. Використовуйте Command (Mac) або Control (Windows), клацніть, щоб вибрати кілька місць.',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Все',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Колір фону оголошення',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'Колір фону має бути шестизначним шістнадцятковим кодом кольору.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Ви можете змінити колір фону оголошення за допомогою шістнадцяткового коду (наприклад: FFFF80). Залишіть це поле порожнім, щоб використовувати колір фону за замовчуванням.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Термін дії оголошення',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Встановлення дати та часу, при настанні яких оголошення буде вимкнено. Залишіть поле порожнім, щоб зробити оголошення постійним.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Дата задано некоректно або вже пройшла.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Оголошення дошки не містить жодного повідомлення',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Повідомлення дошки оголошень',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Дошка оголошень - Перегляд',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Дошка оголошень була оновлена.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'опис',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_WHERE'		=> 'Розташування',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Видно для',
	'BOARD_ANNOUNCEMENTS_TH_ENABLED'		=> 'Увімкнено',
	'BOARD_ANNOUNCEMENTS_TH_CREATED_DATE'	=> 'Дата створення',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRY_DATE'	=> 'Термін придатності',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRED'		=> 'Термін дії минув',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'всюди',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Індекс дошки',
	'BOARD_ANNOUNCEMENTS_FORUMS'			=> 'Вибрані форуми',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Немає оголошень на дошці для відображення',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Створити оголошення',

	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Оголошення з дошки видалено',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Не вдалося видалити оголошення з дошки',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Оголошенням дошки не вдалося отримати блокування таблиці. Інший процес може утримувати блокування. Блокування примусово звільняються після тайм-ауту в 1 годину.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Потрібне оголошення не існує.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Запитане оголошення не має батьківського елемента.',
));
