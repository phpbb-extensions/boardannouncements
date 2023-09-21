<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* French translation by ForumsFaciles (www.forumsfaciles.fr) anf Fred Rimbert (https://forums.caforum.fr)
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
	// ACP Module
	'ACP_BOARD_ANNOUNCEMENTS'				=> 'Annonce du forum',
	'ACP_BOARD_ANNOUNCEMENTS_SETTINGS'		=> 'Paramètres de l’annonce',

	// ACP Logs
	'BOARD_ANNOUNCEMENTS_CREATED_LOG'		=> '<strong>Une annonce de forum a été créée</strong><br>» %s',
	'BOARD_ANNOUNCEMENTS_UPDATED_LOG'		=> '<strong>Une annonce de forum a été modifiée</strong><br>» %s',
	'BOARD_ANNOUNCEMENTS_DELETED_LOG'		=> '<strong>Une annonce de forum a été supprimée</strong><br>» %s',
));
