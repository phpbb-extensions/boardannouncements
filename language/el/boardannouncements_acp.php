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

	'BOARD_ANNOUNCEMENTS_ENABLE_ALL'		=> 'Ενεργοποίηση ανακοινώσεων Δ. Συζήτησης',

	'BOARD_ANNOUNCEMENTS_OPTIONS'			=> 'Επιλογές ανακοινώσεων',

	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Περιγραφή',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Μια σύντομη περιγραφή της ανακοίνωσης. Αυτή θα είναι ορατή μόνο στο ACP για να αναγνωρίζετε την ανακοίνωση.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Εμφάνιση της ανακοίνωσης',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Ποιος μπορεί να δει αυτή την ανακοίνωσης',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Επιτρέψτε στα μέλη να κλείνουν το πλαίσιο της ανακοίνωσης',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Limit where this announcement should be displayed',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_EXPLAIN'	=> 'Select one or more locations to display the announcement. To display it everywhere, leave the selection empty. Use Command (Mac) or Control (Windows) click to select multiple locations.',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Καθένας',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Χρώμα φόντου ανακοίνωσης',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Μπορείτε να αλλάξετε το χρώμα του φόντου της ανακοίνωσης χρησιμοποιώντας δεκαεξαδικό κωδικό χρώματος (π.χ: FFFF80). Αφήστε αυτό το πεδίο κενό για να χρησιμοποιήσετε το προεπιλεγμένο χρώμα.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Ημερομηνία λήξης ανακοίνωσης',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Ορίστε την ημερομηνία λήξης της ανακοίνωσης. Αφήστε το πεδίο κενό αν η ανακοίνωση δεν θα έχει ημερομηνία λήξης.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Η ημερομηνία λήξης είναι άκυρη ή έχει ήδη παρέλθει.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Η ανακοίνωση δεν περιέχει κανένα μήνυμα',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Μήνυμα ανακοίνωσης',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Προεπισκόπιση μηνύματος',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Η ανακοίνωση έχει ενημερωθεί.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Περιγραφή',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_WHERE'		=> 'Τοποθεσία',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Εμφανής στους',
	'BOARD_ANNOUNCEMENTS_TH_ENABLED'		=> 'Ενεργοποιημένη',
	'BOARD_ANNOUNCEMENTS_TH_CREATED_DATE'	=> 'Ημερομηνία δημιουργίας',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRY_DATE'	=> 'Ημερομηνία λήξης',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRED'		=> 'Έληξε',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Παντού',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Board Index',
	'BOARD_ANNOUNCEMENTS_FORUMS'			=> 'Selected Forums',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Δεν υπάρχουν ανακοινώσεις για εμφάνιση',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Δημιουργία ανακοίνωσης',

	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Η ανακοίνωση έχει διαγράφηκε',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Η ανακοίνωση δεν μπορεί να διαγραφεί',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Η ανακοίνωση απέτυχε να κλειδώσει τον πίνακα. Μια άλλη διεργασία μπορεί να έχει κλειδώσει τον πίνακα. Τα κλειδώματα αυτά απελευθερώνονται μετά από περίοδο 1 ώρας.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'Η ζητούμενη ανακοίνωση δεν υπάρχει.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'Η ζητούμενη ανακοίνωση δεν έχει γονέα.',
));
