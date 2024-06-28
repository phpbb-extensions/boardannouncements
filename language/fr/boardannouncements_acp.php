<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* French translation by ForumsFaciles (www.forumsfaciles.fr) & Galixte (http://www.galixte.com) & Fred Rimbert (https://forums.caforum.fr)
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

	'BOARD_ANNOUNCEMENTS_ENABLE_ALL'		=> 'Activer les annonces du forum',

	'BOARD_ANNOUNCEMENTS_OPTIONS'			=> 'Options d‘annonce',

	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Description',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Une brève description de cette annonce. Cela ne sera visible qu‘ici dans le PCA pour aider à identifier cette annonce.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Afficher l’annonce du forum',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Qui peut voir l’annonce du forum',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Permettre aux utilisateurs de masquer l’annonce du forum',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Limit where this announcement should be displayed',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_EXPLAIN'	=> 'Select one or more locations to display the announcement. To display it everywhere, leave the selection empty. Use Command (Mac) or Control (Windows) click to select multiple locations.',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Tous les utilisateurs',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Couleur d’arrière-plan de l’annonce du forum',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Vous pouvez modifier la couleur d’arrière-plan de l’annonce en utilisant un code hexadécimal (ex.: FFFF80). Laissez ce champ vide pour utiliser la couleur par défaut.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Date d’expiration de l’annonce du forum',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Permet de définir la date d’expiration, après laquelle, l’annonce du forum sera désactivée. Laisser ce champ vide pour ne pas expirer l’annonce du forum.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'La date d’expiration était invalide ou a déjà expirée.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'L‘annonce du forum ne contient aucun message',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Message de l’annonce du forum',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Aperçu de l’annonce du forum',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'L’annonce du forum a été mise à jour.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Description',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_WHERE'		=> 'Emplacement',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Visible pour',
	'BOARD_ANNOUNCEMENTS_TH_ENABLED'		=> 'Activée',
	'BOARD_ANNOUNCEMENTS_TH_CREATED_DATE'	=> 'Date de création',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRY_DATE'	=> 'Date d‘expiration',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRED'		=> 'Expirée',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Partout',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Board Index',
	'BOARD_ANNOUNCEMENTS_FORUMS'			=> 'Selected Forums',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Il n‘y a aucune annonce à afficher',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Créer une annonce',

	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'L‘annonce du forum a été supprimée',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'L‘annonce du forum n‘a pas pu être supprimée',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Les annonces du forum n‘ont pas réussi à acquérir le verrou de table. Un autre processus peut maintenir le verrou. Les verrous sont libérés de force après un délai d‘attente d‘une heure.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'L‘annonce demandée n‘existe pas.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'L‘annonce demandée n‘a pas de parent.',
));
