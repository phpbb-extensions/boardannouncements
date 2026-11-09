<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* Ελληνική μετάφραση [el]
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Ρυθμίσεις ανακοινώσεων Δ. Συζήτησης',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Εδώ μπορείτε να διαχειριστείτε και να δημιουργήσετε την ανακοίνωση που θα εμφανίζεται σε κάθε σελίδα της Δ. Συζήτησή σας.',



	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Περιγραφή',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'Η περιγραφή είναι πολύ μεγάλη. Ορισμένοι ειδικοί χαρακτήρες απαιτούν επιπλέον χώρο αποθήκευσης.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Μια σύντομη περιγραφή της ανακοίνωσης. Αυτή θα είναι ορατή μόνο στο ACP για να αναγνωρίζετε την ανακοίνωση.',

	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Ποιος μπορεί να δει αυτή την ανακοίνωση',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Επιτρέψτε στα μέλη να κλείνουν το πλαίσιο της ανακοίνωσης',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Πού πρέπει να εμφανίζεται αυτή η ανακοίνωση',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Καθένας',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Χρώμα φόντου ανακοίνωσης',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_PICKER'	=> 'Επιλογέας χρώματος φόντου',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_HEX'		=> 'Δεκαεξαδικός κώδικας χρώματος φόντου',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'Το χρώμα φόντου πρέπει να είναι ένας εξαψήφιος δεκαεξαδικός κωδικός χρώματος.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Επιλέξτε ένα χρώμα φόντου για την επιλογή Προσαρμοσμένο χρώμα ή εισαγάγετε έναν δεκαεξαδικό κώδικα έξι χαρακτήρων.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Ημερομηνία λήξης ανακοίνωσης',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Ορίστε την ημερομηνία λήξης της ανακοίνωσης. Αφήστε το πεδίο κενό αν η ανακοίνωση δεν θα έχει ημερομηνία λήξης.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Η ημερομηνία λήξης είναι άκυρη ή έχει ήδη παρέλθει.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Η ανακοίνωση δεν περιέχει κανένα μήνυμα',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Μήνυμα ανακοίνωσης',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Προεπισκόπιση μηνύματος',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Η ανακοίνωση έχει ενημερωθεί.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Ανακοίνωση',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Εμφανής στους',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Παντού',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Ευρετήριο πινάκων',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Δεν υπάρχουν ανακοινώσεις για εμφάνιση',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Δημιουργία ανακοίνωσης',

	'BOARD_ANNOUNCEMENTS_EDIT'				=> 'Επεξεργασία ανακοίνωσης',
	'BOARD_ANNOUNCEMENTS_EDITOR_EXPLAIN'	=> 'Συνθέστε το μήνυμα, επιλέξτε το κοινό του και ελέγξτε πότε εμφανίζεται.',
	'BOARD_ANNOUNCEMENTS_CONTENT'			=> 'Περιεχόμενο',
	'BOARD_ANNOUNCEMENTS_TITLE'				=> 'Επικεφαλίδα ανακοίνωσης',
	'BOARD_ANNOUNCEMENTS_TITLE_EXPLAIN'		=> 'Προαιρετική επικεφαλίδα εμφανίζεται πάνω από το μήνυμα ανακοίνωσης.',
	'BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG'	=> 'Η επικεφαλίδα της ανακοίνωσης πρέπει να αποτελείται από 255 χαρακτήρες ή λιγότερους.',
	'BOARD_ANNOUNCEMENTS_APPEARANCE'		=> 'Εμφάνιση',
	'BOARD_ANNOUNCEMENTS_TONE'				=> 'Χρωματικός τόνος',
	'BOARD_ANNOUNCEMENTS_TONE_EXPLAIN'		=> 'Επιλέξτε έναν προκαθορισμένο συνδυασμό χρωμάτων ή επιλέξτε Προσαρμοσμένο χρώμα για να επιλέξετε το δικό σας.',
	'BOARD_ANNOUNCEMENTS_TONE_NEUTRAL'		=> 'Ουδέτερος',
	'BOARD_ANNOUNCEMENTS_TONE_INFO'			=> 'Πληροφορίες',
	'BOARD_ANNOUNCEMENTS_TONE_SUCCESS'		=> 'Επιτυχία',
	'BOARD_ANNOUNCEMENTS_TONE_WARNING'		=> 'Προειδοποίηση',
	'BOARD_ANNOUNCEMENTS_TONE_CRITICAL'		=> 'Κρίσιμος',
	'BOARD_ANNOUNCEMENTS_TONE_CUSTOM'		=> 'Προσαρμοσμένο χρώμα',
	'BOARD_ANNOUNCEMENTS_TONE_INVALID'		=> 'Επιλέξτε έναν έγκυρο χρωματικό τόνο.',
	'BOARD_ANNOUNCEMENTS_AUDIENCE_LOCATION'	=> 'Κοινό και τοποθεσία',
	'BOARD_ANNOUNCEMENTS_SELECTED_GROUPS'	=> 'Επιλεγμένες ομάδες',
	'BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED'	=> 'Επιλέξτε τουλάχιστον μία ομάδα όταν επιλέγεται Επιλεγμένες ομάδες.',
	'BOARD_ANNOUNCEMENTS_SELECTED_LOCATIONS' => 'Επιλεγμένες τοποθεσίες',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_REQUIRED' => 'Επιλέξτε τουλάχιστον μία τοποθεσία όταν επιλέγετε Επιλεγμένες τοποθεσίες.',
	'BOARD_ANNOUNCEMENTS_LOCATION_MODE_INVALID' => 'Επιλέξτε μια έγκυρη τοποθεσία εμφάνισης.',
	'BOARD_ANNOUNCEMENTS_INCLUDE_CHILDREN'	=> 'Εμφάνιση επίσης σε υποφόρουμ',
	'BOARD_ANNOUNCEMENTS_LOCATION_EMPTY'	=> 'Καμία τοποθεσία δεν αντιστοιχεί στην αναζήτησή σας.',
	'BOARD_ANNOUNCEMENTS_SCHEDULE_BEHAVIOR'	=> 'Πρόγραμμα και συμπεριφορά',
	'BOARD_ANNOUNCEMENTS_SCHEDULE'			=> 'Πρόγραμμα',
	'BOARD_ANNOUNCEMENTS_START'				=> 'Ημερομηνία έναρξης',
	'BOARD_ANNOUNCEMENTS_START_EXPLAIN'		=> 'Αφήστε το κενό για να αρχίσετε να εμφανίζεται αμέσως η ανακοίνωση.',
	'BOARD_ANNOUNCEMENTS_START_INVALID'		=> 'Η ημερομηνία έναρξης δεν είναι έγκυρη.',
	'BOARD_ANNOUNCEMENTS_FILTER'			=> 'Φίλτρο',
	'BOARD_ANNOUNCEMENTS_STATUS'			=> 'Κατάσταση',
	'BOARD_ANNOUNCEMENTS_STATUS_ALL'		=> 'Ολοι',
	'BOARD_ANNOUNCEMENTS_STATUS_ACTIVE'		=> 'Ενεργός',
	'BOARD_ANNOUNCEMENTS_STATUS_SCHEDULED'	=> 'Προγραμματισμένος',
	'BOARD_ANNOUNCEMENTS_STATUS_DRAFT'		=> 'Προσχέδιο',
	'BOARD_ANNOUNCEMENTS_STATUS_EXPIRED'	=> 'Λήξη',
	'BOARD_ANNOUNCEMENTS_STATUS_ARCHIVED'	=> 'Αρχειοθετήθηκε',
	'BOARD_ANNOUNCEMENTS_STATE_INVALID'		=> 'Επιλέξτε μια έγκυρη κατάσταση.',
	'BOARD_ANNOUNCEMENTS_PUBLISH'			=> 'Δημοσιεύω',
	'BOARD_ANNOUNCEMENTS_PUBLISHED'			=> 'Δημοσιεύθηκε',
	'BOARD_ANNOUNCEMENTS_SHOW_AGAIN'		=> 'Εμφάνιση ξανά σε όλους',
	'BOARD_ANNOUNCEMENTS_SHOWN_AGAIN'		=> 'Η ανακοίνωση θα εμφανιστεί ξανά σε όλους.',
	'BOARD_ANNOUNCEMENTS_ARCHIVE'			=> 'Αρχείο',
	'BOARD_ANNOUNCEMENTS_ARCHIVED'			=> 'Η ανακοίνωση αρχειοθετήθηκε.',
	'BOARD_ANNOUNCEMENTS_DUPLICATE'			=> 'Αντίγραφο',
	'BOARD_ANNOUNCEMENTS_DUPLICATED'		=> 'Η ανακοίνωση επαναλαμβάνεται ως προσχέδιο.',
	'BOARD_ANNOUNCEMENTS_COPY_OF'			=> 'Αντίγραφο του %s',
	'BOARD_ANNOUNCEMENTS_NOW'				=> 'Αμέσως',
	'BOARD_ANNOUNCEMENTS_NO_END'			=> 'Χωρίς ημερομηνία λήξης',
	'BOARD_ANNOUNCEMENTS_UNTITLED'			=> 'Ανακοίνωση χωρίς τίτλο',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH'	=> 'ορατότητα ανακοινώσεων φόρουμ',
	'BOARD_ANNOUNCEMENTS_GLOBAL_DISABLED'	=> 'Όλες οι ανακοινώσεις είναι προς το παρόν κρυφές.',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH_EXPLAIN' => 'Απόκρυψη ή εμφάνιση όλων των ανακοινώσεων χωρίς αλλαγή της ατομικής τους κατάστασης.',
	'BOARD_ANNOUNCEMENTS_DISMISS_EXPLAIN'	=> 'Οι επισκέπτες μπορούν να αποκρύψουν αυτήν την ανακοίνωση αφού τη διαβάσουν.',
	'BOARD_ANNOUNCEMENTS_REORDER_FILTERED'	=> 'Εκκαθάριση φίλτρων για αλλαγή σειράς ανακοινώσεων.',
	'BOARD_ANNOUNCEMENTS_FILTER_EMPTY'		=> 'Δεν υπάρχουν ανακοινώσεις που να αντιστοιχούν σε αυτά τα φίλτρα.',
	'BOARD_ANNOUNCEMENTS_BULK_ACTION'		=> 'Μαζική δράση',
	'BOARD_ANNOUNCEMENTS_BULK_UPDATED'		=> 'Οι επιλεγμένες ανακοινώσεις ενημερώθηκαν.',
	'BOARD_ANNOUNCEMENTS_DELETE_PERMANENTLY' => 'Διαγραφή οριστικά',
	'BOARD_ANNOUNCEMENTS_PREVIEW_MOBILE'	=> 'Πλάτος κινητού',
	'BOARD_ANNOUNCEMENTS_JAVASCRIPT_REQUIRED' => 'Η JavaScript πρέπει να είναι ενεργοποιημένη για την προεπισκόπηση και την πλήρη λειτουργικότητα του επεξεργαστή.',
	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Η ανακοίνωση έχει διαγράφηκε',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Η ανακοίνωση δεν μπορεί να διαγραφεί',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Η ανακοίνωση απέτυχε να κλειδώσει τον πίνακα. Μια άλλη διεργασία μπορεί να έχει κλειδώσει τον πίνακα. Τα κλειδώματα αυτά απελευθερώνονται μετά από περίοδο 1 ώρας.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Η ζητούμενη ανακοίνωση δεν υπάρχει.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Η ζητούμενη ανακοίνωση δεν έχει γονέα.',
));
