<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* French translation by ForumsFaciles (www.forumsfaciles.fr) & Galixte (http://www.galixte.com)
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
// ’ « » “ ” …
//

$lang = array_merge($lang, array(
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Paramètres de l’annonce du forum',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Sur cette page vous pouvez gérer et créer une annonce de forum qui sera affichée sur chaque page de votre forum.',

	'BOARD_ANNOUNCEMENTS_ENABLE_ALL'		=> 'Enable board announcements',

	'BOARD_ANNOUNCEMENTS_OPTIONS'			=> 'Announcement options',

	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Description',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'A short description for this announcement. This will only be visible here in the ACP to help identify this announcement.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Afficher l’annonce du forum',
	'BOARD_ANNOUNCEMENTS_INDEX_ONLY'		=> 'Afficher l’annonce uniquement sur la page de l’index du forum',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Qui peut voir l’annonce du forum',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Permettre aux utilisateurs de masquer l’annonce du forum',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Tous les utilisateurs',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Couleur d’arrière-plan de l’annonce du forum',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Vous pouvez modifier la couleur d’arrière-plan de l’annonce en utilisant un code hexadécimal (ex.: FFFF80). Laissez ce champ vide pour utiliser la couleur par défaut.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Date d’expiration de l’annonce du forum',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Permet de définir la date d’expiration, après laquelle, l’annonce du forum sera désactivée. Laisser ce champ vide pour ne pas expirer l’annonce du forum.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'La date d’expiration était invalide ou a déjà expirée.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Board announcement contains no message',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Message de l’annonce du forum',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Aperçu de l’annonce du forum',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'L’annonce du forum a été mise à jour.',

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
