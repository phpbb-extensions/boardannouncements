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



	'BOARD_ANNOUNCEMENTS_DESC'				=> 'опис',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'Опис задовгий. Деякі спеціальні символи потребують додаткового місця для зберігання.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Короткий опис цього оголошення. Це буде видно лише тут, у ACP, щоб допомогти ідентифікувати це оголошення.',

	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Хто може бачити дошку оголошень',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Дозволити користувачам вимикати це оголошення',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Де має відображатися це оголошення',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Все',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Колір фону оголошення',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_PICKER'	=> 'Вибір кольору фону',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_HEX'		=> 'Шістнадцятковий код кольору фону',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'Колір фону має бути шестизначним шістнадцятковим кодом кольору.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Виберіть колір фону для параметра «Користувацький колір» або введіть шестизначний шістнадцятковий код.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Термін дії оголошення',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Встановлення дати та часу, при настанні яких оголошення буде вимкнено. Залишіть поле порожнім, щоб зробити оголошення постійним.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Дата задано некоректно або вже пройшла.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Оголошення дошки не містить жодного повідомлення',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Повідомлення дошки оголошень',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Дошка оголошень - Перегляд',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Дошка оголошень була оновлена.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Оголошення',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Видно для',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'всюди',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Індекс дошки',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Немає оголошень на дошці для відображення',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Створити оголошення',

	'BOARD_ANNOUNCEMENTS_EDIT'				=> 'Редагувати оголошення',
	'BOARD_ANNOUNCEMENTS_EDITOR_EXPLAIN'	=> 'Створіть повідомлення, виберіть його аудиторію та визначте, коли воно з’явиться.',
	'BOARD_ANNOUNCEMENTS_CONTENT'			=> 'Зміст',
	'BOARD_ANNOUNCEMENTS_TITLE'				=> 'Заголовок оголошення',
	'BOARD_ANNOUNCEMENTS_TITLE_EXPLAIN'		=> 'Додатковий заголовок, що відображається над повідомленням оголошення.',
	'BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG'	=> 'Заголовок оголошення має містити не більше 255 символів.',
	'BOARD_ANNOUNCEMENTS_APPEARANCE'		=> 'Зовнішній вигляд',
	'BOARD_ANNOUNCEMENTS_TONE'				=> 'Колірний тон',
	'BOARD_ANNOUNCEMENTS_TONE_EXPLAIN'		=> 'Виберіть попередньо встановлену колірну схему або виберіть «Користувацький колір», щоб вибрати власний.',
	'BOARD_ANNOUNCEMENTS_TONE_NEUTRAL'		=> 'Нейтральний',
	'BOARD_ANNOUNCEMENTS_TONE_INFO'			=> 'Інформація',
	'BOARD_ANNOUNCEMENTS_TONE_SUCCESS'		=> 'Успіх',
	'BOARD_ANNOUNCEMENTS_TONE_WARNING'		=> 'УВАГА',
	'BOARD_ANNOUNCEMENTS_TONE_CRITICAL'		=> 'Критичний',
	'BOARD_ANNOUNCEMENTS_TONE_CUSTOM'		=> 'Індивідуальний колір',
	'BOARD_ANNOUNCEMENTS_TONE_INVALID'		=> 'Виберіть правильний колірний тон.',
	'BOARD_ANNOUNCEMENTS_AUDIENCE_LOCATION'	=> 'Аудиторія та локація',
	'BOARD_ANNOUNCEMENTS_SELECTED_GROUPS'	=> 'Вибрані групи',
	'BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED'	=> 'Виберіть принаймні одну групу, коли вибрано Вибрані групи.',
	'BOARD_ANNOUNCEMENTS_SELECTED_LOCATIONS' => 'Вибрані локації',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_REQUIRED' => 'Виберіть принаймні одне місце, коли вибрано Вибрані місця.',
	'BOARD_ANNOUNCEMENTS_LOCATION_MODE_INVALID' => 'Виберіть дійсне місце відображення.',
	'BOARD_ANNOUNCEMENTS_INCLUDE_CHILDREN'	=> 'Також відображати в підфорумах',
	'BOARD_ANNOUNCEMENTS_LOCATION_EMPTY'	=> 'Немає місць, які відповідають вашому пошуку.',
	'BOARD_ANNOUNCEMENTS_SCHEDULE_BEHAVIOR'	=> 'Розклад і поведінка',
	'BOARD_ANNOUNCEMENTS_SCHEDULE'			=> 'розклад',
	'BOARD_ANNOUNCEMENTS_START'				=> 'Дата початку',
	'BOARD_ANNOUNCEMENTS_START_EXPLAIN'		=> 'Залиште поле порожнім, щоб негайно почати показ оголошення.',
	'BOARD_ANNOUNCEMENTS_START_INVALID'		=> 'Дата початку недійсна.',
	'BOARD_ANNOUNCEMENTS_FILTER'			=> 'фільтр',
	'BOARD_ANNOUNCEMENTS_STATUS'			=> 'Статус',
	'BOARD_ANNOUNCEMENTS_STATUS_ALL'		=> 'все',
	'BOARD_ANNOUNCEMENTS_STATUS_ACTIVE'		=> 'Активний',
	'BOARD_ANNOUNCEMENTS_STATUS_SCHEDULED'	=> 'За розкладом',
	'BOARD_ANNOUNCEMENTS_STATUS_DRAFT'		=> 'Чернетка',
	'BOARD_ANNOUNCEMENTS_STATUS_EXPIRED'	=> 'Термін дії минув',
	'BOARD_ANNOUNCEMENTS_STATUS_ARCHIVED'	=> 'Архівовано',
	'BOARD_ANNOUNCEMENTS_STATE_INVALID'		=> 'Виберіть дійсний статус.',
	'BOARD_ANNOUNCEMENTS_PUBLISH'			=> 'Опублікувати',
	'BOARD_ANNOUNCEMENTS_PUBLISHED'			=> 'Опубліковано',
	'BOARD_ANNOUNCEMENTS_SHOW_AGAIN'		=> 'Покажіть знову всім',
	'BOARD_ANNOUNCEMENTS_SHOWN_AGAIN'		=> 'Оголошення знову буде показано всім.',
	'BOARD_ANNOUNCEMENTS_ARCHIVE'			=> 'Архів',
	'BOARD_ANNOUNCEMENTS_ARCHIVED'			=> 'Оголошення заархівовано.',
	'BOARD_ANNOUNCEMENTS_DUPLICATE'			=> 'дублікат',
	'BOARD_ANNOUNCEMENTS_DUPLICATED'		=> 'Оголошення дублюється як чернетка.',
	'BOARD_ANNOUNCEMENTS_COPY_OF'			=> 'Копія %s',
	'BOARD_ANNOUNCEMENTS_NOW'				=> 'Негайно',
	'BOARD_ANNOUNCEMENTS_NO_END'			=> 'Немає кінцевої дати',
	'BOARD_ANNOUNCEMENTS_UNTITLED'			=> 'Оголошення без назви',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH'	=> 'видимість оголошень на форумі',
	'BOARD_ANNOUNCEMENTS_GLOBAL_DISABLED'	=> 'Наразі всі оголошення приховано.',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH_EXPLAIN' => 'Приховайте або показуйте всі оголошення, не змінюючи їхні індивідуальні статуси.',
	'BOARD_ANNOUNCEMENTS_DISMISS_EXPLAIN'	=> 'Відвідувачі можуть приховати це оголошення після його прочитання.',
	'BOARD_ANNOUNCEMENTS_REORDER_FILTERED'	=> 'Очистіть фільтри, щоб змінити порядок оголошень.',
	'BOARD_ANNOUNCEMENTS_FILTER_EMPTY'		=> 'Жодне оголошення не відповідає цим фільтрам.',
	'BOARD_ANNOUNCEMENTS_BULK_ACTION'		=> 'Масова дія',
	'BOARD_ANNOUNCEMENTS_BULK_UPDATED'		=> 'Вибрані оголошення оновлено.',
	'BOARD_ANNOUNCEMENTS_DELETE_PERMANENTLY' => 'Видалити остаточно',
	'BOARD_ANNOUNCEMENTS_PREVIEW_MOBILE'	=> 'Мобільна ширина',
	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Оголошення з дошки видалено',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Не вдалося видалити оголошення з дошки',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Оголошенням дошки не вдалося отримати блокування таблиці. Інший процес може утримувати блокування. Блокування примусово звільняються після тайм-ауту в 1 годину.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Потрібне оголошення не існує.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Запитане оголошення не має батьківського елемента.',
));
