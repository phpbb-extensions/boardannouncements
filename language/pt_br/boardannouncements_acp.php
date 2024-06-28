<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* Brazilian Portuguese translation by henrique.seven2011 (http://suportephpbb.com.br/) and updates by eunaumtenhoid (c) 2017 [ver 1.0.6] (https://github.com/phpBBTraducoes) and Fred Hareon
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Configurações do Board Announcements',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Aqui você pode criar e gerenciar os anúncios do seu fórum.',

	'BOARD_ANNOUNCEMENTS_ENABLE_ALL'		=> 'Ativar o Board Announcements',

	'BOARD_ANNOUNCEMENTS_OPTIONS'			=> 'Opções de anúncio',

	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Descrição',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Uma breve descrição para este anúncio. Isso só será visível aqui no ACP para ajudar a identificar este anúncio.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Exibir este anúncio',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Quem pode ver este anúncio',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Permitir que os usuários fechem este anúncio',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Limit where this announcement should be displayed',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_EXPLAIN'	=> 'Select one or more locations to display the announcement. To display it everywhere, leave the selection empty. Use Command (Mac) or Control (Windows) click to select multiple locations.',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Todos',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Cor de fundo do anúncio',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Você pode alterar a cor de fundo do anúncio usando um código hexadecimal (por exemplo: FFFF80). Deixe este campo em branco para usar a cor padrão.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Data de validade do anúncio',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Defina a data em que o anúncio irá expirar e ficar desativado. Deixe este campo em branco se você não deseja que o anúncio expire.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'A data de validade era inválida ou já expirou.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'O anúncio não contém nenhuma mensagem',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Mensagem do anúncio',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Anúncio - Prévia',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'O anúncio foi atualizado.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Descrição',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_WHERE'		=> 'Localização',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Visível Para',
	'BOARD_ANNOUNCEMENTS_TH_ENABLED'		=> 'Ativo',
	'BOARD_ANNOUNCEMENTS_TH_CREATED_DATE'	=> 'Data de Criação',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRY_DATE'	=> 'Data de Expiração',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRED'		=> 'Expirado',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Todos os lugares',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Board Index',
	'BOARD_ANNOUNCEMENTS_FORUMS'			=> 'Selected Forums',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Não há nenhum anúncio para exibir',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Criar Anúncio',

	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'O anúncio foi excluído',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'O anúncio não pode ser excluído',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'O Board Announcements falhou em adquirir o bloqueio de tabela. Outro processo pode estar segurando o bloqueio. Os bloqueios são lançados à força após um tempo limite de 1 hora.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'O anúncio solicitado não existe.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'O anúncio solicitado não possui um parentesco.',
));
