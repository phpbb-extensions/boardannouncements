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



	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Descriere',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'Descrierea este prea lungă. Unele caractere speciale necesită spațiu de stocare suplimentar.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'O scurtă descriere pentru acest anunț. Acest lucru va fi vizibil doar aici în ACP pentru a ajuta la identificarea acestui anunț.',

	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Cine poate vedea acest anunț',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Permite utilizatorilor să respingă anunţul',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Unde ar trebui să fie afișat acest anunț',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Toată lumea',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Culoarea background-ului',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_PICKER'	=> 'Selector de culoare de fundal',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_HEX'		=> 'Cod hexazecimal de culoare de fundal',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'Culoarea de fundal trebuie să fie un cod de culoare hexazecimal format din șase caractere.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Alegeți o culoare de fundal pentru opțiunea Culoare personalizată sau introduceți un cod hexazecimal de șase caractere.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Data de expirare a anunțului',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Setați data la care anunțul va expira și va deveni dezactivat. Lăsați acest câmp necompletat dacă nu doriți ca anunțul să expire.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Data de expirare a fost nevalidă sau a expirat deja.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Anunțul forumului nu conține niciun mesaj',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Mesaj anunţ forum',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Anunţ forum - Previzualizare',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Anunţul a fost actualizat.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Anunţ',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Vizibil Pentru',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Peste tot',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Prima pagină',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Nu există anunțuri de afișat',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Creați anunț',

	'BOARD_ANNOUNCEMENTS_EDIT'				=> 'Editați anunțul',
	'BOARD_ANNOUNCEMENTS_EDITOR_EXPLAIN'	=> 'Compuneți mesajul, alegeți-i publicul și controlați când apare.',
	'BOARD_ANNOUNCEMENTS_CONTENT'			=> 'Conţinut',
	'BOARD_ANNOUNCEMENTS_TITLE'				=> 'Titlul anunțului',
	'BOARD_ANNOUNCEMENTS_TITLE_EXPLAIN'		=> 'Titlu opțional afișat deasupra mesajului de anunț.',
	'BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG'	=> 'Titlul anunțului trebuie să aibă 255 de caractere sau mai puțin.',
	'BOARD_ANNOUNCEMENTS_APPEARANCE'		=> 'Aspect',
	'BOARD_ANNOUNCEMENTS_TONE'				=> 'Ton de culoare',
	'BOARD_ANNOUNCEMENTS_TONE_EXPLAIN'		=> 'Alegeți o schemă de culori prestabilită sau selectați Culoare personalizată pentru a vă alege pe a dvs.',
	'BOARD_ANNOUNCEMENTS_TONE_NEUTRAL'		=> 'Neutru',
	'BOARD_ANNOUNCEMENTS_TONE_INFO'			=> 'Informaţii',
	'BOARD_ANNOUNCEMENTS_TONE_SUCCESS'		=> 'Succes',
	'BOARD_ANNOUNCEMENTS_TONE_WARNING'		=> 'Avertizare',
	'BOARD_ANNOUNCEMENTS_TONE_CRITICAL'		=> 'Critic',
	'BOARD_ANNOUNCEMENTS_TONE_CUSTOM'		=> 'Culoare personalizată',
	'BOARD_ANNOUNCEMENTS_TONE_INVALID'		=> 'Selectați un ton de culoare valid.',
	'BOARD_ANNOUNCEMENTS_AUDIENCE_LOCATION'	=> 'Audiență și locație',
	'BOARD_ANNOUNCEMENTS_SELECTED_GROUPS'	=> 'Grupuri selectate',
	'BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED'	=> 'Selectați cel puțin un grup când este selectat Grupuri selectate.',
	'BOARD_ANNOUNCEMENTS_SELECTED_LOCATIONS' => 'Locații selectate',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_REQUIRED' => 'Selectați cel puțin o locație când este aleasă Locații selectate.',
	'BOARD_ANNOUNCEMENTS_LOCATION_MODE_INVALID' => 'Selectați o locație de afișare validă.',
	'BOARD_ANNOUNCEMENTS_INCLUDE_CHILDREN'	=> 'Afișați și în subforumuri',
	'BOARD_ANNOUNCEMENTS_LOCATION_EMPTY'	=> 'Nicio locație nu corespunde căutării dvs.',
	'BOARD_ANNOUNCEMENTS_SCHEDULE_BEHAVIOR'	=> 'Program și comportament',
	'BOARD_ANNOUNCEMENTS_SCHEDULE'			=> 'Programa',
	'BOARD_ANNOUNCEMENTS_START'				=> 'Data de începere',
	'BOARD_ANNOUNCEMENTS_START_EXPLAIN'		=> 'Lăsați necompletat pentru a începe să afișați imediat anunțul.',
	'BOARD_ANNOUNCEMENTS_START_INVALID'		=> 'Data de începere este nevalidă.',
	'BOARD_ANNOUNCEMENTS_FILTER'			=> 'Filtra',
	'BOARD_ANNOUNCEMENTS_STATUS'			=> 'Stare',
	'BOARD_ANNOUNCEMENTS_STATUS_ALL'		=> 'Toate',
	'BOARD_ANNOUNCEMENTS_STATUS_ACTIVE'		=> 'Activ',
	'BOARD_ANNOUNCEMENTS_STATUS_SCHEDULED'	=> 'Programat',
	'BOARD_ANNOUNCEMENTS_STATUS_DRAFT'		=> 'Proiect',
	'BOARD_ANNOUNCEMENTS_STATUS_EXPIRED'	=> 'Expirat',
	'BOARD_ANNOUNCEMENTS_STATUS_ARCHIVED'	=> 'Arhivat',
	'BOARD_ANNOUNCEMENTS_STATE_INVALID'		=> 'Selectați o stare validă.',
	'BOARD_ANNOUNCEMENTS_PUBLISH'			=> 'Publica',
	'BOARD_ANNOUNCEMENTS_PUBLISHED'			=> 'Publicat',
	'BOARD_ANNOUNCEMENTS_SHOW_AGAIN'		=> 'Arată din nou tuturor',
	'BOARD_ANNOUNCEMENTS_SHOWN_AGAIN'		=> 'Anunțul va fi afișat din nou tuturor.',
	'BOARD_ANNOUNCEMENTS_ARCHIVE'			=> 'Arhivă',
	'BOARD_ANNOUNCEMENTS_ARCHIVED'			=> 'Anunț arhivat.',
	'BOARD_ANNOUNCEMENTS_DUPLICATE'			=> 'Duplicat',
	'BOARD_ANNOUNCEMENTS_DUPLICATED'		=> 'Anunț duplicat ca schiță.',
	'BOARD_ANNOUNCEMENTS_COPY_OF'			=> 'Copie a lui %s',
	'BOARD_ANNOUNCEMENTS_NOW'				=> 'Imediat',
	'BOARD_ANNOUNCEMENTS_NO_END'			=> 'Fără dată de încheiere',
	'BOARD_ANNOUNCEMENTS_UNTITLED'			=> 'Anunț fără titlu',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH'	=> 'vizibilitatea anunțurilor pe forum',
	'BOARD_ANNOUNCEMENTS_GLOBAL_DISABLED'	=> 'Toate anunțurile sunt ascunse momentan.',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH_EXPLAIN' => 'Ascundeți sau afișați toate anunțurile fără a modifica starea lor individuală.',
	'BOARD_ANNOUNCEMENTS_DISMISS_EXPLAIN'	=> 'Vizitatorii pot ascunde acest anunț după ce îl citesc.',
	'BOARD_ANNOUNCEMENTS_REORDER_FILTERED'	=> 'Ștergeți filtrele pentru a schimba ordinea anunțurilor.',
	'BOARD_ANNOUNCEMENTS_FILTER_EMPTY'		=> 'Niciun anunț nu corespunde acestor filtre.',
	'BOARD_ANNOUNCEMENTS_BULK_ACTION'		=> 'Acțiune în masă',
	'BOARD_ANNOUNCEMENTS_BULK_UPDATED'		=> 'Anunțurile selectate au fost actualizate.',
	'BOARD_ANNOUNCEMENTS_DELETE_PERMANENTLY' => 'Ștergeți definitiv',
	'BOARD_ANNOUNCEMENTS_PREVIEW_MOBILE'	=> 'Lățimea mobilă',
	'BOARD_ANNOUNCEMENTS_JAVASCRIPT_REQUIRED' => 'JavaScript trebuie activat pentru previzualizare și funcționalitatea completă a editorului.',
	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Anunțul a fost șters',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Anunțul forumului nu a putut fi șters',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Anunțurile de pe ofrum nu au reușit să obțină blocarea tabelului. Un alt proces poate ține acest blocaj. Blocajele sunt eliberate forțat după un timeout de 1 oră.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Anunțul solicitat nu există.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Anunțul solicitat nu are părinte.',
));
