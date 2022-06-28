<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* Dutch translation by Dutch Translators (https://github.com/dutch-translators)
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Forum aankondigings instellingen',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Hier kan je een forum aankondiging beheren en aanmaken, die weergegeven zal worden op elke pagina van je forum.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Laat deze forum aankondiging zien',
	'BOARD_ANNOUNCEMENTS_INDEX_ONLY'		=> 'Toon enkel op de forum index pagina',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Wie kan deze forum aankondiging bekijken',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Sta gebruikers toe om deze forum aankondiging te sluiten',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Iedereen',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Forum aankondiging achtergrondkleur',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Je kan de achtergrondkleur van de aankondiging veranderen door gebruik te maken van een hex-code (bijv.: FFFF80). Laat dit veld leeg om de standaard kleur te gebruiken.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Vervaldatum forum aankondiging',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Stel een datum in waarop de forum aankondiging vervalt en uitgeschakeld wordt. Laat dit veld leeg als je de forum aankondiging niet wilt laten vervallen.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'De vervaldatum is ongeldig of is al verlopen.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_FORMAT'		=> 'YYYY-MM-DD HH:MM',

	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Forum aankondigings-bericht',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Forum aankondiging - Voorbeeld',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Forum aankondiging is bijgewerkt.',
));
