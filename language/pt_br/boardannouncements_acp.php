<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* Brazilian Portuguese translation by henrique.seven2011 (http://suportephpbb.com.br/) and update by eunaumtenhoid (c) 2017 [ver 1.0.6] (https://github.com/phpBBTraducoes)
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Configurações do Board announcements',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Aqui você pode gerenciar e criar um anúncio que será exibido em cada página do seu fórum.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Ativar o board announcement',
	'BOARD_ANNOUNCEMENTS_INDEX_ONLY'		=> 'Exibir apenas no índice',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Quem pode ver este anúncio',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Permitir que os usuários fechem este anúncio',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Todos',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Cor de fundo do anúncio',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Você pode mudar a cor do anúncio usando um código hexadecimal de fundo (por exemplo: FFFF80). Deixe este campo em branco para usar a cor padrão.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Data de expiração do anúncio',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Defina a data em que o anúncio expirará e ficará desabilitado. Deixe este campo em branco se você não quiser que o anúncio expire.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'A data de expiração foi inválida ou já expirou.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_FORMAT'		=> 'AAAA-MM-DD HH:MM',

	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Mensagem de anúncio',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Anúncio - Prévia',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Board announcement foi atualizado.',
));
