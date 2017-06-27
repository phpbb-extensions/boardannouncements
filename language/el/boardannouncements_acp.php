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

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Εμφάνιση της ανακοίνωσης',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Ποιος μπορεί να δει αυτή την ανακοίνωσης',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Επιτρέψτε στα μέλη να κλείνουν το πλαίσιο της ανακοίνωσης',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Καθένας',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Χρώμα φόντου ανακοίνωσης',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Μπορείτε να αλλάξετε το χρώμα του φόντου της ανακοίνωσης χρησιμοποιώντας δεκαεξαδικό κωδικό χρώματος (π.χ: FFFF80). Αφήστε αυτό το πεδίο κενό για να χρησιμοποιήσετε το προεπιλεγμένο χρώμα.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Ημερομηνία λήξης ανακοίνωσης',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Ορίστε την ημερομηνία λήξης της ανακοίνωσης. Αφήστε το πεδίο κενό αν η ανακοίνωση δεν θα έχει ημερομηνία λήξης.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Η ημερομηνία λήξης είναι άκυρη ή έχει ήδη παρέλθει.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_FORMAT'		=> 'ΕΕΕΕ-ΜΜ-ΗΗ ΩΩ:ΛΛ',

	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Μήνυμα ανακοίνωσης',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Προεπισκόπιση μηνύματος',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Η ανακοίνωση έχει ενημερωθεί.',
));
