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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Impostazioni annunci',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Qui è possibile gestire e creare un annuncio che sarà mostrato in ogni pagina del forum.',



	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Descrizione',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'La descrizione è troppo lunga. Alcuni caratteri speciali richiedono spazio di archiviazione aggiuntivo.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Una breve descrizione di questo annuncio. Questo sarà visibile solo qui nell’ACP per aiutare a identificare questo annuncio.',

	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Chi può vedere quest’annuncio',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Permetti agli utenti di chiudere quest’annuncio',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Dove dovrebbe essere visualizzato questo annuncio',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Tutti',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Colore di sfondo annuncio',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_PICKER'	=> 'Selettore colore di sfondo',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_HEX'		=> 'Codice esadecimale del colore di sfondo',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'Il colore di sfondo deve essere un codice colore esadecimale di sei caratteri.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Scegli un colore di sfondo per l\'opzione Colore personalizzato oppure inserisci un codice esadecimale di sei caratteri.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Data di scadenza annuncio',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Imposta la data in cui scadrà l’annuncio. Per non avere una scadenza, lasciare questo campo in bianco.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Data di scadenza non valida o già trascorsa.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'L’annuncio del forum non contiene alcun messaggio',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Testo dell’annuncio',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Anteprima annuncio',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'L’annuncio è stato aggiornato.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Annuncio',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Visibile a',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Ovunque',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Indice del consiglio',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Non ci sono annunci del forum da visualizzare',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Crea annuncio',

	'BOARD_ANNOUNCEMENTS_EDIT'				=> 'Modifica annuncio',
	'BOARD_ANNOUNCEMENTS_EDITOR_EXPLAIN'	=> 'Componi il messaggio, scegli il suo pubblico e controlla quando verrà visualizzato.',
	'BOARD_ANNOUNCEMENTS_CONTENT'			=> 'Contenuto',
	'BOARD_ANNOUNCEMENTS_TITLE'				=> 'Titolo dell\'annuncio',
	'BOARD_ANNOUNCEMENTS_TITLE_EXPLAIN'		=> 'Intestazione facoltativa visualizzata sopra il messaggio di annuncio.',
	'BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG'	=> 'L\'intestazione dell\'annuncio deve contenere al massimo 255 caratteri.',
	'BOARD_ANNOUNCEMENTS_APPEARANCE'		=> 'Aspetto',
	'BOARD_ANNOUNCEMENTS_TONE'				=> 'Tonalità di colore',
	'BOARD_ANNOUNCEMENTS_TONE_EXPLAIN'		=> 'Scegli una combinazione di colori preimpostata o seleziona Colore personalizzato per sceglierne uno tuo.',
	'BOARD_ANNOUNCEMENTS_TONE_NEUTRAL'		=> 'Neutro',
	'BOARD_ANNOUNCEMENTS_TONE_INFO'			=> 'Informazioni',
	'BOARD_ANNOUNCEMENTS_TONE_SUCCESS'		=> 'Successo',
	'BOARD_ANNOUNCEMENTS_TONE_WARNING'		=> 'Avvertimento',
	'BOARD_ANNOUNCEMENTS_TONE_CRITICAL'		=> 'Critico',
	'BOARD_ANNOUNCEMENTS_TONE_CUSTOM'		=> 'Colore personalizzato',
	'BOARD_ANNOUNCEMENTS_TONE_INVALID'		=> 'Seleziona una tonalità di colore valida.',
	'BOARD_ANNOUNCEMENTS_AUDIENCE_LOCATION'	=> 'Pubblico e posizione',
	'BOARD_ANNOUNCEMENTS_SELECTED_GROUPS'	=> 'Gruppi selezionati',
	'BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED'	=> 'Selezionare almeno un gruppo quando si sceglie Gruppi selezionati.',
	'BOARD_ANNOUNCEMENTS_SELECTED_LOCATIONS' => 'Località selezionate',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_REQUIRED' => 'Selezionare almeno una posizione quando si sceglie Posizioni selezionate.',
	'BOARD_ANNOUNCEMENTS_LOCATION_MODE_INVALID' => 'Seleziona una posizione di visualizzazione valida.',
	'BOARD_ANNOUNCEMENTS_INCLUDE_CHILDREN'	=> 'Visualizzato anche nei sottoforum',
	'BOARD_ANNOUNCEMENTS_LOCATION_EMPTY'	=> 'Nessuna località corrisponde alla tua ricerca.',
	'BOARD_ANNOUNCEMENTS_SCHEDULE_BEHAVIOR'	=> 'Orari e comportamenti',
	'BOARD_ANNOUNCEMENTS_SCHEDULE'			=> 'Programma',
	'BOARD_ANNOUNCEMENTS_START'				=> 'Data di inizio',
	'BOARD_ANNOUNCEMENTS_START_EXPLAIN'		=> 'Lascia vuoto per iniziare a mostrare immediatamente l\'annuncio.',
	'BOARD_ANNOUNCEMENTS_START_INVALID'		=> 'La data di inizio non è valida.',
	'BOARD_ANNOUNCEMENTS_FILTER'			=> 'Filtro',
	'BOARD_ANNOUNCEMENTS_STATUS'			=> 'Stato',
	'BOARD_ANNOUNCEMENTS_STATUS_ALL'		=> 'Tutto',
	'BOARD_ANNOUNCEMENTS_STATUS_ACTIVE'		=> 'Attivo',
	'BOARD_ANNOUNCEMENTS_STATUS_SCHEDULED'	=> 'Programmato',
	'BOARD_ANNOUNCEMENTS_STATUS_DRAFT'		=> 'Bozza',
	'BOARD_ANNOUNCEMENTS_STATUS_EXPIRED'	=> 'Scaduto',
	'BOARD_ANNOUNCEMENTS_STATUS_ARCHIVED'	=> 'Archiviato',
	'BOARD_ANNOUNCEMENTS_STATE_INVALID'		=> 'Seleziona uno stato valido.',
	'BOARD_ANNOUNCEMENTS_PUBLISH'			=> 'Pubblicare',
	'BOARD_ANNOUNCEMENTS_PUBLISHED'			=> 'Pubblicato',
	'BOARD_ANNOUNCEMENTS_SHOW_AGAIN'		=> 'Mostralo di nuovo a tutti',
	'BOARD_ANNOUNCEMENTS_SHOWN_AGAIN'		=> 'L\'annuncio verrà mostrato nuovamente a tutti.',
	'BOARD_ANNOUNCEMENTS_ARCHIVE'			=> 'Archivio',
	'BOARD_ANNOUNCEMENTS_ARCHIVED'			=> 'Annuncio archiviato.',
	'BOARD_ANNOUNCEMENTS_DUPLICATE'			=> 'Duplicato',
	'BOARD_ANNOUNCEMENTS_DUPLICATED'		=> 'Annuncio duplicato come bozza.',
	'BOARD_ANNOUNCEMENTS_COPY_OF'			=> 'Copia di %s',
	'BOARD_ANNOUNCEMENTS_NOW'				=> 'Immediatamente',
	'BOARD_ANNOUNCEMENTS_NO_END'			=> 'Nessuna data di fine',
	'BOARD_ANNOUNCEMENTS_UNTITLED'			=> 'Annuncio senza titolo',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH'	=> 'visibilità degli annunci nel forum',
	'BOARD_ANNOUNCEMENTS_GLOBAL_DISABLED'	=> 'Tutti gli annunci sono attualmente nascosti.',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH_EXPLAIN' => 'Nascondi o mostra tutti gli annunci senza modificare i loro stati individuali.',
	'BOARD_ANNOUNCEMENTS_DISMISS_EXPLAIN'	=> 'I visitatori possono nascondere questo annuncio dopo averlo letto.',
	'BOARD_ANNOUNCEMENTS_REORDER_FILTERED'	=> 'Cancella i filtri per modificare l\'ordine degli annunci.',
	'BOARD_ANNOUNCEMENTS_FILTER_EMPTY'		=> 'Nessun annuncio corrisponde a questi filtri.',
	'BOARD_ANNOUNCEMENTS_BULK_ACTION'		=> 'Azione collettiva',
	'BOARD_ANNOUNCEMENTS_BULK_UPDATED'		=> 'Gli annunci selezionati sono stati aggiornati.',
	'BOARD_ANNOUNCEMENTS_DELETE_PERMANENTLY' => 'Elimina definitivamente',
	'BOARD_ANNOUNCEMENTS_PREVIEW_MOBILE'	=> 'Larghezza mobile',
	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'L’annuncio del consiglio è stato cancellato',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Impossibile eliminare l’annuncio del consiglio',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Gli annunci del forum non sono riusciti ad acquisire il blocco del tavolo. Un altro processo potrebbe trattenere il blocco. I blocchi vengono rilasciati forzatamente dopo un timeout di 1 ora.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'L’annuncio richiesto non esiste.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'L’annuncio richiesto non ha genitore.',
));
