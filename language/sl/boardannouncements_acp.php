<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
* Slovenian Translation - Marko K.(max, max-ima,...)
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Nastavitve obvestil na forumu',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Tukaj lahko upravljate in ustvarite obvestilo na plošči, ki bo prikazana na vsaki strani vašega foruma.',

	'BOARD_ANNOUNCEMENTS_ENABLE_ALL'		=> 'Omogoči obvestila na plošči',

	'BOARD_ANNOUNCEMENTS_OPTIONS'			=> 'Možnosti objave na plošči',

	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Opis',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Kratek opis za to objavo. To bo vidno samo tukaj v ACP, da bo lažje prepoznati to objavo.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Prikaži to obvestilo na plošči',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Kdo si lahko ogleda to obvestilo na forumu',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Dovoli uporabnikom, da opustijo to obvestilo na plošči',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Omejite, kje naj bo to obvestilo prikazano',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_EXPLAIN'	=> 'Izberite eno ali več lokacij za prikaz obvestila. Če ga želite prikazati povsod, pustite izbor prazen. Uporabite Command (Mac) ali Control (Windows) kliknite, da izberete več lokacij.',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Vsi',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Barva ozadja za obvestilo na tabli',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Barvo ozadja obvestila lahko spremenite s šestnajstiško kodo (npr.: FFFF80). Pustite to polje prazno, če želite uporabiti privzeto barvo.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Datum izteka obvestila na plošči',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Nastavite datum, ko bo obvestilo poteklo in postalo onemogočena. Pustite to polje prazno, če ne želite, da obvestilo poteče.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Datum poteka je bil neveljaven ali je že potekel.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Obvestilo na plošči ne vsebuje nobenega sporočila',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Sporočilo z obvestilom na plošči',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Obvestilo plošče - Predogled',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Obvestilo je bilo posodobljeno.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Opis',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_WHERE'		=> 'Lokacija',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Vidno za',
	'BOARD_ANNOUNCEMENTS_TH_ENABLED'		=> 'Omogočeno',
	'BOARD_ANNOUNCEMENTS_TH_CREATED_DATE'	=> 'Datum nastanka',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRY_DATE'	=> 'Datum poteka',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRED'		=> 'potekel',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Povsod',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Indeks odbora',
	'BOARD_ANNOUNCEMENTS_FORUMS'			=> 'Izbrani forumi',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Ni obvestil na plošči za prikaz',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Ustvari obvestilo',

	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Obvestilo na tabli je bilo izbrisano',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Objave na tabli ni bilo mogoče izbrisati',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Obvestila na plošči niso uspela pridobiti ključavnice tabele. Drug postopek morda drži ključavnico. Zaklepi se na silo sprostijo po preteku 1 ure.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Zahtevana objava ne obstaja.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Zahtevana objava nima nadrejenega elementa.',
));
