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



	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Description',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'La description est trop longue. Certains caractères spéciaux nécessitent un espace de stockage supplémentaire.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Une brève description de cette annonce. Cela ne sera visible qu‘ici dans le PCA pour aider à identifier cette annonce.',

	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Qui peut voir l’annonce du forum',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Permettre aux utilisateurs de masquer l’annonce du forum',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Où cette annonce doit être affichée',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Tous les utilisateurs',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Couleur d’arrière-plan de l’annonce du forum',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_PICKER'	=> 'Sélecteur de couleur d\'arrière-plan',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_HEX'		=> 'Code hexadécimal de la couleur de fond',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'La couleur d’arrière-plan doit être un code couleur hexadécimal à six caractères.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Choisissez une couleur d\'arrière-plan pour l\'option Couleur personnalisée ou entrez un code hexadécimal à six caractères.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Date d’expiration de l’annonce du forum',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Permet de définir la date d’expiration, après laquelle, l’annonce du forum sera désactivée. Laisser ce champ vide pour ne pas expirer l’annonce du forum.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'La date d’expiration était invalide ou a déjà expirée.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'L‘annonce du forum ne contient aucun message',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Message de l’annonce du forum',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Aperçu de l’annonce du forum',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'L’annonce du forum a été mise à jour.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Annonce',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Visible pour',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Partout',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Index du forum',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Il n‘y a aucune annonce à afficher',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Créer une annonce',

	'BOARD_ANNOUNCEMENTS_EDIT'				=> 'Modifier l\'annonce',
	'BOARD_ANNOUNCEMENTS_EDITOR_EXPLAIN'	=> 'Composez le message, choisissez son public et contrôlez le moment où il apparaît.',
	'BOARD_ANNOUNCEMENTS_CONTENT'			=> 'Contenu',
	'BOARD_ANNOUNCEMENTS_TITLE'				=> 'En-tête de l\'annonce',
	'BOARD_ANNOUNCEMENTS_TITLE_EXPLAIN'		=> 'Titre facultatif affiché au-dessus du message d’annonce.',
	'BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG'	=> 'Le titre de l’annonce doit comporter 255 caractères ou moins.',
	'BOARD_ANNOUNCEMENTS_APPEARANCE'		=> 'Apparence',
	'BOARD_ANNOUNCEMENTS_TONE'				=> 'Tonalité de couleur',
	'BOARD_ANNOUNCEMENTS_TONE_EXPLAIN'		=> 'Choisissez un jeu de couleurs prédéfini ou sélectionnez Couleur personnalisée pour choisir la vôtre.',
	'BOARD_ANNOUNCEMENTS_TONE_NEUTRAL'		=> 'Neutre',
	'BOARD_ANNOUNCEMENTS_TONE_INFO'			=> 'Information',
	'BOARD_ANNOUNCEMENTS_TONE_SUCCESS'		=> 'Succès',
	'BOARD_ANNOUNCEMENTS_TONE_WARNING'		=> 'Avertissement',
	'BOARD_ANNOUNCEMENTS_TONE_CRITICAL'		=> 'Critique',
	'BOARD_ANNOUNCEMENTS_TONE_CUSTOM'		=> 'Couleur personnalisée',
	'BOARD_ANNOUNCEMENTS_TONE_INVALID'		=> 'Sélectionnez une tonalité de couleur valide.',
	'BOARD_ANNOUNCEMENTS_AUDIENCE_LOCATION'	=> 'Public et emplacement',
	'BOARD_ANNOUNCEMENTS_SELECTED_GROUPS'	=> 'Groupes sélectionnés',
	'BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED'	=> 'Sélectionnez au moins un groupe lorsque l\'option Groupes sélectionnés est sélectionnée.',
	'BOARD_ANNOUNCEMENTS_SELECTED_LOCATIONS' => 'Emplacements sélectionnés',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_REQUIRED' => 'Sélectionnez au moins un emplacement lorsque Emplacements sélectionnés est choisi.',
	'BOARD_ANNOUNCEMENTS_LOCATION_MODE_INVALID' => 'Sélectionnez un emplacement d\'affichage valide.',
	'BOARD_ANNOUNCEMENTS_INCLUDE_CHILDREN'	=> 'Afficher également dans les sous-forums',
	'BOARD_ANNOUNCEMENTS_LOCATION_EMPTY'	=> 'Aucun emplacement ne correspond à votre recherche.',
	'BOARD_ANNOUNCEMENTS_SCHEDULE_BEHAVIOR'	=> 'Horaire et comportement',
	'BOARD_ANNOUNCEMENTS_SCHEDULE'			=> 'Calendrier',
	'BOARD_ANNOUNCEMENTS_START'				=> 'Date de début',
	'BOARD_ANNOUNCEMENTS_START_EXPLAIN'		=> 'Laissez ce champ vide pour commencer à afficher l\'annonce immédiatement.',
	'BOARD_ANNOUNCEMENTS_START_INVALID'		=> 'La date de début n\'est pas valide.',
	'BOARD_ANNOUNCEMENTS_FILTER'			=> 'Filtre',
	'BOARD_ANNOUNCEMENTS_STATUS'			=> 'Statut',
	'BOARD_ANNOUNCEMENTS_STATUS_ALL'		=> 'Tous',
	'BOARD_ANNOUNCEMENTS_STATUS_ACTIVE'		=> 'Actif',
	'BOARD_ANNOUNCEMENTS_STATUS_SCHEDULED'	=> 'Programmé',
	'BOARD_ANNOUNCEMENTS_STATUS_DRAFT'		=> 'Brouillon',
	'BOARD_ANNOUNCEMENTS_STATUS_EXPIRED'	=> 'Expiré',
	'BOARD_ANNOUNCEMENTS_STATUS_ARCHIVED'	=> 'Archivé',
	'BOARD_ANNOUNCEMENTS_STATE_INVALID'		=> 'Sélectionnez un statut valide.',
	'BOARD_ANNOUNCEMENTS_PUBLISH'			=> 'Publier',
	'BOARD_ANNOUNCEMENTS_PUBLISHED'			=> 'Publié',
	'BOARD_ANNOUNCEMENTS_SHOW_AGAIN'		=> 'Montrez à nouveau à tout le monde',
	'BOARD_ANNOUNCEMENTS_SHOWN_AGAIN'		=> 'L\'annonce sera à nouveau diffusée à tout le monde.',
	'BOARD_ANNOUNCEMENTS_ARCHIVE'			=> 'Archive',
	'BOARD_ANNOUNCEMENTS_ARCHIVED'			=> 'Annonce archivée.',
	'BOARD_ANNOUNCEMENTS_DUPLICATE'			=> 'Double',
	'BOARD_ANNOUNCEMENTS_DUPLICATED'		=> 'Annonce dupliquée sous forme de brouillon.',
	'BOARD_ANNOUNCEMENTS_COPY_OF'			=> 'Copie de %s',
	'BOARD_ANNOUNCEMENTS_NOW'				=> 'Immédiatement',
	'BOARD_ANNOUNCEMENTS_NO_END'			=> 'Pas de date de fin',
	'BOARD_ANNOUNCEMENTS_UNTITLED'			=> 'Annonce sans titre',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH'	=> 'visibilité des annonces du forum',
	'BOARD_ANNOUNCEMENTS_GLOBAL_DISABLED'	=> 'Toutes les annonces sont actuellement masquées.',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH_EXPLAIN' => 'Masquez ou affichez toutes les annonces sans modifier leurs statuts individuels.',
	'BOARD_ANNOUNCEMENTS_DISMISS_EXPLAIN'	=> 'Les visiteurs peuvent masquer cette annonce après l\'avoir lue.',
	'BOARD_ANNOUNCEMENTS_REORDER_FILTERED'	=> 'Effacez les filtres pour modifier l’ordre des annonces.',
	'BOARD_ANNOUNCEMENTS_FILTER_EMPTY'		=> 'Aucune annonce ne correspond à ces filtres.',
	'BOARD_ANNOUNCEMENTS_BULK_ACTION'		=> 'Action groupée',
	'BOARD_ANNOUNCEMENTS_BULK_UPDATED'		=> 'Les annonces sélectionnées ont été mises à jour.',
	'BOARD_ANNOUNCEMENTS_DELETE_PERMANENTLY' => 'Supprimer définitivement',
	'BOARD_ANNOUNCEMENTS_PREVIEW_MOBILE'	=> 'Largeur mobile',
	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'L‘annonce du forum a été supprimée',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'L‘annonce du forum n‘a pas pu être supprimée',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Les annonces du forum n‘ont pas réussi à acquérir le verrou de table. Un autre processus peut maintenir le verrou. Les verrous sont libérés de force après un délai d‘attente d‘une heure.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'L‘annonce demandée n‘existe pas.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'L‘annonce demandée n‘a pas de parent.',
));
