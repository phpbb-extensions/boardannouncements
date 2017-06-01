<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* @Traduzido por: http://phpbbportugal.com - segundo as normas do Acordo Ortográfico
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Gerir comunicado',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Aqui pode gerir e criar um comunicado que será exibido em cada página do seu Fórum.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Ativar o comunicado',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Quem pode ver este comunicado',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Permitir aos utilizadores fechar este comunicado',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Todos os usuários',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Cor do fundo do comunicado',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Pode mudar a cor do fundo do comunicado usando um código hexadecimal (exemplo: FFFF80). Deixe este campo em branco para usar a cor padrão.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Data de expiração do anúncio',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Defina a data em que o anúncio expirará e ficará desabilitado. Deixe este campo em branco se você não quiser que o anúncio expire.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'A data de validade foi inválida ou já expirou.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_FORMAT'		=> 'YYYY-MM-DD HH:MM',

	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Mensagem do comunicado',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Pré visualizar comunicado',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Comunicado atualizado com sucesso.',
));
