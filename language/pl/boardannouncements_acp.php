<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* Polish translation by Pico (aka Pico88)
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
* Polskie tłumaczenie: Tomasz Hetman - ToTemat YT
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Ustawienia ogłoszeń witryny',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Tutaj możesz tworzyć i zarządzać ogłoszeniami na swojej witrynie.',



	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Opis',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'Opis jest zbyt długi. Niektóre znaki specjalne wymagają dodatkowego miejsca.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Krótki opis ogłoszenia. Będzie on widoczny tylko tutaj, w Panelu Administracyjnym, aby ułatwić identyfikację ogłoszenia.',

	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Kto może widzieć to ogłoszenie',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Pozwól użytkownikom na ukrycie tego ogłoszenia',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Gdzie powinno być wyświetlane to ogłoszenie',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Wszyscy',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Kolor tła',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_PICKER'	=> 'Selektor kolorów tła',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_HEX'		=> 'Kod szesnastkowy koloru tła',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'Kolor tła musi być sześciocyfrowym szesnastkowym kodem koloru.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Wybierz kolor tła dla opcji Kolor niestandardowy lub wprowadź sześcioznakowy kod szesnastkowy.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Data wygaśnięcia',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Ustaw datę, po której ogłoszenie wygaśnie i zostanie wyłączone. Pozostaw puste, jeśli ogłoszenie ma nie wygasać.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Data wygaśnięcia jest nieprawidłowa lub już minęła.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Ogłoszenie witryny nie zawiera treści',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Treść ogłoszenia witryny',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Podgląd ogłoszenia witryny',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Ogłoszenie witryny zostało zaktualizowane.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Ogłoszenie',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Widoczne dla',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Wszędzie',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Strona główna forum',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Brak ogłoszeń do wyświetlenia',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Utwórz ogłoszenie',

	'BOARD_ANNOUNCEMENTS_EDIT'				=> 'Edytuj ogłoszenie',
	'BOARD_ANNOUNCEMENTS_EDITOR_EXPLAIN'	=> 'Skomponuj wiadomość, wybierz odbiorców i kontroluj, kiedy się pojawi.',
	'BOARD_ANNOUNCEMENTS_CONTENT'			=> 'Treść',
	'BOARD_ANNOUNCEMENTS_TITLE'				=> 'Nagłówek ogłoszenia',
	'BOARD_ANNOUNCEMENTS_TITLE_EXPLAIN'		=> 'Opcjonalny nagłówek wyświetlany nad komunikatem ogłoszenia.',
	'BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG'	=> 'Nagłówek ogłoszenia może mieć maksymalnie 255 znaków.',
	'BOARD_ANNOUNCEMENTS_APPEARANCE'		=> 'Wygląd',
	'BOARD_ANNOUNCEMENTS_TONE'				=> 'Ton koloru',
	'BOARD_ANNOUNCEMENTS_TONE_EXPLAIN'		=> 'Wybierz gotowy schemat kolorów lub wybierz opcję Kolor niestandardowy, aby wybrać własny.',
	'BOARD_ANNOUNCEMENTS_TONE_NEUTRAL'		=> 'Neutralny',
	'BOARD_ANNOUNCEMENTS_TONE_INFO'			=> 'Informacja',
	'BOARD_ANNOUNCEMENTS_TONE_SUCCESS'		=> 'Sukces',
	'BOARD_ANNOUNCEMENTS_TONE_WARNING'		=> 'Ostrzeżenie',
	'BOARD_ANNOUNCEMENTS_TONE_CRITICAL'		=> 'Krytyczny',
	'BOARD_ANNOUNCEMENTS_TONE_CUSTOM'		=> 'Kolor niestandardowy',
	'BOARD_ANNOUNCEMENTS_TONE_INVALID'		=> 'Wybierz prawidłowy odcień koloru.',
	'BOARD_ANNOUNCEMENTS_AUDIENCE_LOCATION'	=> 'Publiczność i lokalizacja',
	'BOARD_ANNOUNCEMENTS_SELECTED_GROUPS'	=> 'Wybrane grupy',
	'BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED'	=> 'Wybierz co najmniej jedną grupę, jeśli wybrana jest opcja Wybrane grupy.',
	'BOARD_ANNOUNCEMENTS_SELECTED_LOCATIONS' => 'Wybrane lokalizacje',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_REQUIRED' => 'Wybierz co najmniej jedną lokalizację, gdy wybrana jest opcja Wybrane lokalizacje.',
	'BOARD_ANNOUNCEMENTS_LOCATION_MODE_INVALID' => 'Wybierz prawidłową lokalizację wyświetlania.',
	'BOARD_ANNOUNCEMENTS_INCLUDE_CHILDREN'	=> 'Wyświetlaj także na podforach',
	'BOARD_ANNOUNCEMENTS_LOCATION_EMPTY'	=> 'Żadna lokalizacja nie pasuje do Twojego wyszukiwania.',
	'BOARD_ANNOUNCEMENTS_SCHEDULE_BEHAVIOR'	=> 'Harmonogram i zachowanie',
	'BOARD_ANNOUNCEMENTS_SCHEDULE'			=> 'Harmonogram',
	'BOARD_ANNOUNCEMENTS_START'				=> 'Data rozpoczęcia',
	'BOARD_ANNOUNCEMENTS_START_EXPLAIN'		=> 'Pozostaw puste, aby natychmiast rozpocząć wyświetlanie ogłoszenia.',
	'BOARD_ANNOUNCEMENTS_START_INVALID'		=> 'Data rozpoczęcia jest nieprawidłowa.',
	'BOARD_ANNOUNCEMENTS_FILTER'			=> 'Filtr',
	'BOARD_ANNOUNCEMENTS_STATUS'			=> 'Status',
	'BOARD_ANNOUNCEMENTS_STATUS_ALL'		=> 'Wszystko',
	'BOARD_ANNOUNCEMENTS_STATUS_ACTIVE'		=> 'Aktywny',
	'BOARD_ANNOUNCEMENTS_STATUS_SCHEDULED'	=> 'Zaplanowany',
	'BOARD_ANNOUNCEMENTS_STATUS_DRAFT'		=> 'Projekt',
	'BOARD_ANNOUNCEMENTS_STATUS_EXPIRED'	=> 'Wygasły',
	'BOARD_ANNOUNCEMENTS_STATUS_ARCHIVED'	=> 'Zarchiwizowane',
	'BOARD_ANNOUNCEMENTS_STATE_INVALID'		=> 'Wybierz prawidłowy status.',
	'BOARD_ANNOUNCEMENTS_PUBLISH'			=> 'Publikować',
	'BOARD_ANNOUNCEMENTS_PUBLISHED'			=> 'Opublikowany',
	'BOARD_ANNOUNCEMENTS_SHOW_AGAIN'		=> 'Pokaż wszystkim jeszcze raz',
	'BOARD_ANNOUNCEMENTS_SHOWN_AGAIN'		=> 'Ogłoszenie zostanie ponownie wyświetlone wszystkim.',
	'BOARD_ANNOUNCEMENTS_ARCHIVE'			=> 'Archiwum',
	'BOARD_ANNOUNCEMENTS_ARCHIVED'			=> 'Ogłoszenie zarchiwizowane.',
	'BOARD_ANNOUNCEMENTS_DUPLICATE'			=> 'Duplikat',
	'BOARD_ANNOUNCEMENTS_DUPLICATED'		=> 'Ogłoszenie powielone jako wersja robocza.',
	'BOARD_ANNOUNCEMENTS_COPY_OF'			=> 'Kopia %s',
	'BOARD_ANNOUNCEMENTS_NOW'				=> 'Natychmiast',
	'BOARD_ANNOUNCEMENTS_NO_END'			=> 'Brak daty końcowej',
	'BOARD_ANNOUNCEMENTS_UNTITLED'			=> 'Ogłoszenie bez tytułu',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH'	=> 'widoczność ogłoszeń na forum',
	'BOARD_ANNOUNCEMENTS_GLOBAL_DISABLED'	=> 'Wszystkie ogłoszenia są obecnie ukryte.',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH_EXPLAIN' => 'Ukryj lub pokaż wszystkie ogłoszenia bez zmiany ich poszczególnych statusów.',
	'BOARD_ANNOUNCEMENTS_DISMISS_EXPLAIN'	=> 'Odwiedzający mogą ukryć to ogłoszenie po jego przeczytaniu.',
	'BOARD_ANNOUNCEMENTS_REORDER_FILTERED'	=> 'Wyczyść filtry, aby zmienić kolejność ogłoszeń.',
	'BOARD_ANNOUNCEMENTS_FILTER_EMPTY'		=> 'Żadne ogłoszenia nie pasują do tych filtrów.',
	'BOARD_ANNOUNCEMENTS_BULK_ACTION'		=> 'Akcja masowa',
	'BOARD_ANNOUNCEMENTS_BULK_UPDATED'		=> 'Wybrane ogłoszenia zostały zaktualizowane.',
	'BOARD_ANNOUNCEMENTS_DELETE_PERMANENTLY' => 'Usuń trwale',
	'BOARD_ANNOUNCEMENTS_PREVIEW_MOBILE'	=> 'Szerokość mobilna',
	'BOARD_ANNOUNCEMENTS_JAVASCRIPT_REQUIRED' => 'JavaScript musi być włączony, aby korzystać z podglądu i pełnej funkcjonalności edytora.',
	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Ogłoszenie witryny zostało usunięte',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Nie udało się usunąć ogłoszenia witryny',

	// Komunikaty wyjątków Nested Set (pojawiają się tylko w logach błędów PHP)
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Ogłoszenia witryny nie mogły uzyskać blokady tabeli. Inny proces może trzymać blokadę. Blokady są wymuszane po upływie godziny.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Żądane ogłoszenie nie istnieje.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Żądane ogłoszenie nie posiada nadrzędnego elementu.',
));
