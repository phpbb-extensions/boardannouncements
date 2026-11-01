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



	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Описание',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'Описание слишком длинное. Некоторые специальные символы требуют дополнительного места для хранения.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Краткое описание, которое будет видно только в ACP и поможет идентифицировать данное объявление.',

	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Кто может видеть это объявление',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Разрешить пользователям скрывать это объявление',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Где должно быть размещено это объявление',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Все',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Цвет фона',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_PICKER'	=> 'Выбор цвета фона',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_HEX'		=> 'Шестнадцатеричный код цвета фона',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'Цвет фона должен быть шестизначным шестнадцатеричным кодом цвета.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Выберите цвет фона для параметра «Пользовательский цвет» или введите шестизначный шестнадцатеричный код.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Срок действия',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Установка даты и времени, при наступлении которых объявление будет отключено. Оставьте поле пустым, чтобы сделать объявление постоянным.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Дата задана некорректно или уже прошла',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Отсутствует текст объявления',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Текст объявления',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Предпросмотр объявления',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Изменения в объявлении сохранены',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Объявление',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Видимость',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Везде',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Индекс Совета',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Нет объявлений для отображения',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Создать объявление',

	'BOARD_ANNOUNCEMENTS_EDIT'				=> 'Изменить объявление',
	'BOARD_ANNOUNCEMENTS_EDITOR_EXPLAIN'	=> 'Составьте сообщение, выберите его аудиторию и укажите, когда оно появится.',
	'BOARD_ANNOUNCEMENTS_CONTENT'			=> 'Содержание',
	'BOARD_ANNOUNCEMENTS_TITLE'				=> 'Заголовок объявления',
	'BOARD_ANNOUNCEMENTS_TITLE_EXPLAIN'		=> 'Необязательный заголовок, отображаемый над сообщением с объявлением.',
	'BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG'	=> 'Заголовок объявления должен содержать не более 255 символов.',
	'BOARD_ANNOUNCEMENTS_APPEARANCE'		=> 'Появление',
	'BOARD_ANNOUNCEMENTS_TONE'				=> 'Цветовой тон',
	'BOARD_ANNOUNCEMENTS_TONE_EXPLAIN'		=> 'Выберите предустановленную цветовую схему или выберите «Пользовательский цвет», чтобы выбрать свою собственную.',
	'BOARD_ANNOUNCEMENTS_TONE_NEUTRAL'		=> 'Нейтральный',
	'BOARD_ANNOUNCEMENTS_TONE_INFO'			=> 'Информация',
	'BOARD_ANNOUNCEMENTS_TONE_SUCCESS'		=> 'Успех',
	'BOARD_ANNOUNCEMENTS_TONE_WARNING'		=> 'Предупреждение',
	'BOARD_ANNOUNCEMENTS_TONE_CRITICAL'		=> 'Критический',
	'BOARD_ANNOUNCEMENTS_TONE_CUSTOM'		=> 'Пользовательский цвет',
	'BOARD_ANNOUNCEMENTS_TONE_INVALID'		=> 'Выберите допустимый цветовой тон.',
	'BOARD_ANNOUNCEMENTS_AUDIENCE_LOCATION'	=> 'Аудитория и местоположение',
	'BOARD_ANNOUNCEMENTS_SELECTED_GROUPS'	=> 'Выбранные группы',
	'BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED'	=> 'Выберите хотя бы одну группу, если выбран параметр «Выбранные группы».',
	'BOARD_ANNOUNCEMENTS_SELECTED_LOCATIONS' => 'Выбранные места',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_REQUIRED' => 'Выберите хотя бы одно местоположение, если выбрано Выбранные местоположения.',
	'BOARD_ANNOUNCEMENTS_LOCATION_MODE_INVALID' => 'Выберите допустимое место отображения.',
	'BOARD_ANNOUNCEMENTS_INCLUDE_CHILDREN'	=> 'Также отображать в подфорумах',
	'BOARD_ANNOUNCEMENTS_LOCATION_EMPTY'	=> 'Нет местоположений, соответствующих вашему запросу.',
	'BOARD_ANNOUNCEMENTS_SCHEDULE_BEHAVIOR'	=> 'Расписание и поведение',
	'BOARD_ANNOUNCEMENTS_SCHEDULE'			=> 'Расписание',
	'BOARD_ANNOUNCEMENTS_START'				=> 'Дата начала',
	'BOARD_ANNOUNCEMENTS_START_EXPLAIN'		=> 'Оставьте поле пустым, чтобы объявление начало показываться немедленно.',
	'BOARD_ANNOUNCEMENTS_START_INVALID'		=> 'Дата начала недействительна.',
	'BOARD_ANNOUNCEMENTS_FILTER'			=> 'Фильтр',
	'BOARD_ANNOUNCEMENTS_STATUS'			=> 'Статус',
	'BOARD_ANNOUNCEMENTS_STATUS_ALL'		=> 'Все',
	'BOARD_ANNOUNCEMENTS_STATUS_ACTIVE'		=> 'Активный',
	'BOARD_ANNOUNCEMENTS_STATUS_SCHEDULED'	=> 'Запланировано',
	'BOARD_ANNOUNCEMENTS_STATUS_DRAFT'		=> 'Черновик',
	'BOARD_ANNOUNCEMENTS_STATUS_EXPIRED'	=> 'Истекший',
	'BOARD_ANNOUNCEMENTS_STATUS_ARCHIVED'	=> 'В архиве',
	'BOARD_ANNOUNCEMENTS_STATE_INVALID'		=> 'Выберите действительный статус.',
	'BOARD_ANNOUNCEMENTS_PUBLISH'			=> 'Публиковать',
	'BOARD_ANNOUNCEMENTS_PUBLISHED'			=> 'Опубликовано',
	'BOARD_ANNOUNCEMENTS_SHOW_AGAIN'		=> 'Показать еще раз всем',
	'BOARD_ANNOUNCEMENTS_SHOWN_AGAIN'		=> 'Объявление снова будет показано всем.',
	'BOARD_ANNOUNCEMENTS_ARCHIVE'			=> 'Архив',
	'BOARD_ANNOUNCEMENTS_ARCHIVED'			=> 'Объявление в архиве.',
	'BOARD_ANNOUNCEMENTS_DUPLICATE'			=> 'Дублировать',
	'BOARD_ANNOUNCEMENTS_DUPLICATED'		=> 'Объявление продублировано как черновик.',
	'BOARD_ANNOUNCEMENTS_COPY_OF'			=> 'Копия %s',
	'BOARD_ANNOUNCEMENTS_NOW'				=> 'Немедленно',
	'BOARD_ANNOUNCEMENTS_NO_END'			=> 'Нет даты окончания',
	'BOARD_ANNOUNCEMENTS_UNTITLED'			=> 'Объявление без названия',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH'	=> 'видимость объявлений на форуме',
	'BOARD_ANNOUNCEMENTS_GLOBAL_DISABLED'	=> 'Все объявления на данный момент скрыты.',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH_EXPLAIN' => 'Скрыть или показать все объявления, не меняя их отдельных статусов.',
	'BOARD_ANNOUNCEMENTS_DISMISS_EXPLAIN'	=> 'Посетители могут скрыть это объявление после прочтения.',
	'BOARD_ANNOUNCEMENTS_REORDER_FILTERED'	=> 'Очистите фильтры, чтобы изменить порядок объявлений.',
	'BOARD_ANNOUNCEMENTS_FILTER_EMPTY'		=> 'Ни одно объявление не соответствует этим фильтрам.',
	'BOARD_ANNOUNCEMENTS_BULK_ACTION'		=> 'Массовое действие',
	'BOARD_ANNOUNCEMENTS_BULK_UPDATED'		=> 'Выбранные объявления обновлены.',
	'BOARD_ANNOUNCEMENTS_DELETE_PERMANENTLY' => 'Удалить навсегда',
	'BOARD_ANNOUNCEMENTS_PREVIEW_MOBILE'	=> 'Мобильная ширина',
	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Объявление было удалено',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Объявление не может быть удалено',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Объявления на форуме не смогли получить блокировку таблицы. Другой процесс может удерживать блокировку. Блокировки принудительно снимаются по истечении таймаута в 1 час.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Запрошенное объявление не существует.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Запрошенное объявление не имеет родительского элемента.',
));
