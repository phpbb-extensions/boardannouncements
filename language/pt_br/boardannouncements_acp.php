<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* Portuguese Brazil translation by henrique.seven2011 (http://suportephpbb.com.br/)
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Configurações de anúncios',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Aqui você pode gerenciar e criar um anúncio que será exibido em cada página do seu fórum.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Ativar anúncio',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Quién puede ver este anúncio',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Permitir que usuários para fechar este anúncio',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Todos los usuários',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Cor de fundo do anúncio',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Você pode mudar a cor do anúncio usando um código hexadecimal de fundo (por exemplo: FFFF80). Deixe este campo em branco para usar a cor padrão.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Board announcement expiration date',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Set the date the announcement will expire and become disabled. Leave this field blank if you do not want the announcement to expire.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'The expiration date was invalid or has already expired.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_FORMAT'		=> 'YYYY-MM-DD HH:MM',

	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Mensagem de anúncio',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Anúncio - Prévia',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Anúncio foi atualizado.',
));
