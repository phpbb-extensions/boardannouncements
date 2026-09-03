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

	'BOARD_ANNOUNCEMENTS_ENABLE_ALL'		=> 'Włącz ogłoszenia witryny',

	'BOARD_ANNOUNCEMENTS_OPTIONS'			=> 'Opcje ogłoszeń witryny',

	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Opis',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'Opis jest zbyt długi. Niektóre znaki specjalne wymagają dodatkowego miejsca.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Krótki opis ogłoszenia. Będzie on widoczny tylko tutaj, w Panelu Administracyjnym, aby ułatwić identyfikację ogłoszenia.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Wyświetlaj to ogłoszenie',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Kto może widzieć to ogłoszenie',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Pozwól użytkownikom na ukrycie tego ogłoszenia',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Ogranicz miejsca wyświetlania tego ogłoszenia',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_EXPLAIN'	=> 'Wybierz jedną lub więcej lokalizacji, w których ma być wyświetlane ogłoszenie. Aby wyświetlać je wszędzie, pozostaw pole puste. Użyj klawisza Command (Mac) lub Control (Windows), aby wybrać wiele lokalizacji.',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Wszyscy',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Kolor tła',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'Kolor tła musi być sześciocyfrowym szesnastkowym kodem koloru.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Możesz zmienić kolor tła ogłoszenia, używając kodu hex (np. FFFF80). Pozostaw to pole puste, aby użyć domyślnego koloru.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Data wygaśnięcia',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Ustaw datę, po której ogłoszenie wygaśnie i zostanie wyłączone. Pozostaw puste, jeśli ogłoszenie ma nie wygasać.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Data wygaśnięcia jest nieprawidłowa lub już minęła.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Ogłoszenie witryny nie zawiera treści',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Treść ogłoszenia witryny',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Podgląd ogłoszenia witryny',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Ogłoszenie witryny zostało zaktualizowane.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Opis',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_WHERE'		=> 'Lokalizacja',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Widoczne dla',
	'BOARD_ANNOUNCEMENTS_TH_ENABLED'		=> 'Włączone',
	'BOARD_ANNOUNCEMENTS_TH_CREATED_DATE'	=> 'Data utworzenia',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRY_DATE'	=> 'Data wygaśnięcia',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRED'		=> 'Wygasło',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Wszędzie',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Strona główna forum',
	'BOARD_ANNOUNCEMENTS_FORUMS'			=> 'Wybrane fora',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Brak ogłoszeń do wyświetlenia',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Utwórz ogłoszenie',

	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Ogłoszenie witryny zostało usunięte',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Nie udało się usunąć ogłoszenia witryny',

	// Komunikaty wyjątków Nested Set (pojawiają się tylko w logach błędów PHP)
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Ogłoszenia witryny nie mogły uzyskać blokady tabeli. Inny proces może trzymać blokadę. Blokady są wymuszane po upływie godziny.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Żądane ogłoszenie nie istnieje.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Żądane ogłoszenie nie posiada nadrzędnego elementu.',
));
