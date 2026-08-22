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

	'BOARD_ANNOUNCEMENTS_ENABLE_ALL'		=> 'Ativar anúncios do quadro',

	'BOARD_ANNOUNCEMENTS_OPTIONS'			=> 'Announcement options',

	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Descrição',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Uma breve descrição deste anúncio. Isto só estará visível aqui no ACP para ajudar a identificar este anúncio.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Ativar o comunicado',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Quem pode ver este comunicado',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Permitir aos utilizadores fechar este comunicado',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Limite onde este anúncio deve ser exibido',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_EXPLAIN'	=> 'Selecione um ou mais locais para exibir o anúncio. Para exibi-lo em qualquer lugar, deixe a seleção vazia. Use Command (Mac) ou Control (Windows) e clique para selecionar vários locais.',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Todos os usuários',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Cor do fundo do comunicado',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Pode mudar a cor do fundo do comunicado usando um código hexadecimal (exemplo: FFFF80). Deixe este campo em branco para usar a cor padrão.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Data de expiração do anúncio',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Defina a data em que o anúncio expirará e ficará desabilitado. Deixe este campo em branco se você não quiser que o anúncio expire.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'A data de validade foi inválida ou já expirou.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'O anúncio do quadro não contém nenhuma mensagem',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Mensagem do comunicado',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Pré visualizar comunicado',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Comunicado atualizado com sucesso.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Descrição',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_WHERE'		=> 'Localização',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Visível para',
	'BOARD_ANNOUNCEMENTS_TH_ENABLED'		=> 'Habilitado',
	'BOARD_ANNOUNCEMENTS_TH_CREATED_DATE'	=> 'Data de criação',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRY_DATE'	=> 'Data de validade',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRED'		=> 'Expirado',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Em todos os lugares',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Índice do Conselho',
	'BOARD_ANNOUNCEMENTS_FORUMS'			=> 'Fóruns selecionados',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Não há anúncios do quadro para exibir',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Criar anúncio',

	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'O anúncio do conselho foi excluído',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Não foi possível excluir o anúncio do conselho',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Os anúncios do conselho não conseguiram adquirir o bloqueio da mesa. Outro processo pode estar segurando o bloqueio. Os bloqueios são liberados à força após um tempo limite de 1 hora.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'O anúncio solicitado não existe.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'O anúncio solicitado não tem pai.',
));
