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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Setări anunţuri forum',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Aici puteţi gestiona sau crea anunţuri care vor fi afişate pe fiecare pagină a forumului.',

	'BOARD_ANNOUNCEMENTS_ENABLE_ALL'		=> 'Activați anunțurile pe forum',

	'BOARD_ANNOUNCEMENTS_OPTIONS'			=> 'Opțiuni',

	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Descriere',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'Descrierea este prea lungă. Unele caractere speciale necesită spațiu de stocare suplimentar.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'O scurtă descriere pentru acest anunț. Acest lucru va fi vizibil doar aici în ACP pentru a ajuta la identificarea acestui anunț.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Afişează acest anunţ',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Cine poate vedea acest anunț',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Permite utilizatorilor să respingă anunţul',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Limitați locul unde ar trebui să fie afișat acest anunț',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_EXPLAIN'	=> 'Selectați una sau mai multe locații pentru a afișa anunțul. Pentru a-l afișa peste tot, lăsați selecția goală. Utilizați Command (Mac) sau Control (Windows) faceți clic pentru a selecta mai multe locații.',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Toată lumea',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Culoarea background-ului',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'Culoarea de fundal trebuie să fie un cod de culoare hexazecimal format din șase caractere.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Puteţi schimba culoarea de fundal a anunţului folosind un cod hex (Ex: FFFF80). Lasă acest câmp necompletat pentru a utiliza culoarea prestabilită.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Data de expirare a anunțului',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Setați data la care anunțul va expira și va deveni dezactivat. Lăsați acest câmp necompletat dacă nu doriți ca anunțul să expire.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Data de expirare a fost nevalidă sau a expirat deja.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Anunțul forumului nu conține niciun mesaj',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Mesaj anunţ forum',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Anunţ forum - Previzualizare',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Anunţul a fost actualizat.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Descriere',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_WHERE'		=> 'Locaţie',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Vizibil Pentru',
	'BOARD_ANNOUNCEMENTS_TH_ENABLED'		=> 'Activat',
	'BOARD_ANNOUNCEMENTS_TH_CREATED_DATE'	=> 'Data creării',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRY_DATE'	=> 'Data expirării',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRED'		=> 'Expirat',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Peste tot',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Prima pagină',
	'BOARD_ANNOUNCEMENTS_FORUMS'			=> 'Forumurile selectate',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Nu există anunțuri de afișat',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Creați anunț',

	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Anunțul a fost șters',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Anunțul forumului nu a putut fi șters',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Anunțurile de pe ofrum nu au reușit să obțină blocarea tabelului. Un alt proces poate ține acest blocaj. Blocajele sunt eliberate forțat după un timeout de 1 oră.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Anunțul solicitat nu există.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Anunțul solicitat nu are părinte.',
));
