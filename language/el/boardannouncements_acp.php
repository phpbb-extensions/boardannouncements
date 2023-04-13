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

	'BOARD_ANNOUNCEMENTS_ENABLE_ALL'		=> 'Enable board announcements',

	'BOARD_ANNOUNCEMENTS_OPTIONS'			=> 'Announcement options',

	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Description',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'A short description for this announcement. This will only be visible here in the ACP to help identify this announcement.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Εμφάνιση της ανακοίνωσης',
	'BOARD_ANNOUNCEMENTS_INDEX_ONLY'		=> 'Εμφάνιση μόνο στην Αρχική Σελίδα',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Ποιος μπορεί να δει αυτή την ανακοίνωσης',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Επιτρέψτε στα μέλη να κλείνουν το πλαίσιο της ανακοίνωσης',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Καθένας',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Χρώμα φόντου ανακοίνωσης',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Μπορείτε να αλλάξετε το χρώμα του φόντου της ανακοίνωσης χρησιμοποιώντας δεκαεξαδικό κωδικό χρώματος (π.χ: FFFF80). Αφήστε αυτό το πεδίο κενό για να χρησιμοποιήσετε το προεπιλεγμένο χρώμα.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Ημερομηνία λήξης ανακοίνωσης',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Ορίστε την ημερομηνία λήξης της ανακοίνωσης. Αφήστε το πεδίο κενό αν η ανακοίνωση δεν θα έχει ημερομηνία λήξης.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Η ημερομηνία λήξης είναι άκυρη ή έχει ήδη παρέλθει.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Board announcement contains no message',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Μήνυμα ανακοίνωσης',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Προεπισκόπιση μηνύματος',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Η ανακοίνωση έχει ενημερωθεί.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Description',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_WHERE'		=> 'Location',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Visible To',
	'BOARD_ANNOUNCEMENTS_TH_ENABLED'		=> 'Enabled',
	'BOARD_ANNOUNCEMENTS_TH_CREATED_DATE'	=> 'Creation Date',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRY_DATE'	=> 'Expiration Date',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRED'		=> 'Expired',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Everywhere',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'There are no board announcements to display',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Create Announcement',

	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'The board announcement was deleted',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'The board announcement could not be deleted',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Board announcements failed to acquire the table lock. Another process may be holding the lock. Locks are forcibly released after a timeout of 1 hour.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'The requested announcement does not exist.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'The requested announcement has no parent.',
));
