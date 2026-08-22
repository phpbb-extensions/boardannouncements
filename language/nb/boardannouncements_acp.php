<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* Norwegian translation by Rolv R. Hauge (http://rolvhauge.no)
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Instillinger for forummeldinger',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Her kan du behandle og opprette en forummelding som vil bli vist på hver side i forumet ditt.',

	'BOARD_ANNOUNCEMENTS_ENABLE_ALL'		=> 'Aktiver tavlekunngjøringer',

	'BOARD_ANNOUNCEMENTS_OPTIONS'			=> 'Announcement options',

	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Beskrivelse',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'En kort beskrivelse av denne kunngjøringen. Dette vil bare være synlig her i ACP for å hjelpe med å identifisere denne kunngjøringen.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Vis denne forummeldingen',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Hvem kan se denne forummeldingen',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'La brukere lukke denne forummeldingen',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Begrens hvor denne kunngjøringen skal vises',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_EXPLAIN'	=> 'Velg ett eller flere steder for å vise kunngjøringen. For å vise den overalt, la utvalget stå tomt. Bruk Kommando (Mac) eller Kontroll (Windows) klikk for å velge flere plasseringer.',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Alle',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Bakgrunnsfarge for forummeldingen',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Du kan endre bakgrunnsfarge for forummeldingen ved å angi en hex-kode (f.eks.: FFFF80). La dette feltet stå tomt for å bruke standardfargen.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Utløpsdato for forummeldingen',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Still inn datoen da kunngjøringen vil utløpe og bli deaktivert. La feltet være tomt hvis du ikke vil at kunngjøringen skal utløpe.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Utløpsdatoen var ugyldig eller er allerede utløpt.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Styrekunngjøring inneholder ingen melding',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Forummelding',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Forummelding - forhåndsvisning',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Forummeldingen har blitt oppdatert.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Beskrivelse',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_WHERE'		=> 'Sted',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Synlig for',
	'BOARD_ANNOUNCEMENTS_TH_ENABLED'		=> 'Aktivert',
	'BOARD_ANNOUNCEMENTS_TH_CREATED_DATE'	=> 'Opprettelsesdato',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRY_DATE'	=> 'Utløpsdato',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRED'		=> 'Utløpt',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Overalt',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Styreindeks',
	'BOARD_ANNOUNCEMENTS_FORUMS'			=> 'Utvalgte fora',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Det er ingen tavlekunngjøringer å vise',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Lag kunngjøring',

	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Styrekunngjøringen ble slettet',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Styrekunngjøringen kunne ikke slettes',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Styrekunngjøringer klarte ikke å skaffe bordlåsen. En annen prosess kan være å holde låsen. Låser tvangsutløses etter en timeout på 1 time.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Den forespurte kunngjøringen eksisterer ikke.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Den forespurte kunngjøringen har ingen forelder.',
));
