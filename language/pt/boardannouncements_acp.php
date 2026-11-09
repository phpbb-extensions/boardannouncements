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



	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Descrição',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'A descrição é demasiado longa. Alguns caracteres especiais requerem espaço de armazenamento adicional.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Uma breve descrição deste anúncio. Isto só estará visível aqui no ACP para ajudar a identificar este anúncio.',

	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Quem pode ver este comunicado',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Permitir aos utilizadores fechar este comunicado',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Onde este anúncio deve ser exibido',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Todos os usuários',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Cor do fundo do comunicado',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_PICKER'	=> 'Seletor de cores de fundo',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_HEX'		=> 'Código hexadecimal da cor de fundo',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'A cor de fundo deve ser um código de cor hexadecimal de seis caracteres.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Escolha uma cor de fundo para a opção Cor personalizada ou introduza um código hexadecimal de seis caracteres.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Data de expiração do anúncio',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Defina a data em que o anúncio expirará e ficará desabilitado. Deixe este campo em branco se você não quiser que o anúncio expire.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'A data de validade foi inválida ou já expirou.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'O anúncio do quadro não contém nenhuma mensagem',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Mensagem do comunicado',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Pré visualizar comunicado',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Comunicado atualizado com sucesso.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Anúncio',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Visível para',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Em todos os lugares',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Índice do Conselho',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Não há anúncios do quadro para exibir',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Criar anúncio',

	'BOARD_ANNOUNCEMENTS_EDIT'				=> 'Editar anúncio',
	'BOARD_ANNOUNCEMENTS_EDITOR_EXPLAIN'	=> 'Componha a mensagem, escolha o seu público e controle quando esta irá aparecer.',
	'BOARD_ANNOUNCEMENTS_CONTENT'			=> 'Conteúdo',
	'BOARD_ANNOUNCEMENTS_TITLE'				=> 'Título do anúncio',
	'BOARD_ANNOUNCEMENTS_TITLE_EXPLAIN'		=> 'Título opcional apresentado acima da mensagem de anúncio.',
	'BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG'	=> 'O cabeçalho do anúncio deve ter 255 caracteres ou menos.',
	'BOARD_ANNOUNCEMENTS_APPEARANCE'		=> 'Aspeto',
	'BOARD_ANNOUNCEMENTS_TONE'				=> 'Tom de cor',
	'BOARD_ANNOUNCEMENTS_TONE_EXPLAIN'		=> 'Escolha um esquema de cores predefinido ou selecione Cor personalizada para escolher a sua.',
	'BOARD_ANNOUNCEMENTS_TONE_NEUTRAL'		=> 'Neutro',
	'BOARD_ANNOUNCEMENTS_TONE_INFO'			=> 'Informação',
	'BOARD_ANNOUNCEMENTS_TONE_SUCCESS'		=> 'Sucesso',
	'BOARD_ANNOUNCEMENTS_TONE_WARNING'		=> 'Aviso',
	'BOARD_ANNOUNCEMENTS_TONE_CRITICAL'		=> 'Crítico',
	'BOARD_ANNOUNCEMENTS_TONE_CUSTOM'		=> 'Cor personalizada',
	'BOARD_ANNOUNCEMENTS_TONE_INVALID'		=> 'Selecione um tom de cor válido.',
	'BOARD_ANNOUNCEMENTS_AUDIENCE_LOCATION'	=> 'Público e localização',
	'BOARD_ANNOUNCEMENTS_SELECTED_GROUPS'	=> 'Grupos selecionados',
	'BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED'	=> 'Selecione pelo menos um grupo quando for escolhido Grupos selecionados.',
	'BOARD_ANNOUNCEMENTS_SELECTED_LOCATIONS' => 'Locais selecionados',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_REQUIRED' => 'Selecione pelo menos um local quando for escolhido Locais selecionados.',
	'BOARD_ANNOUNCEMENTS_LOCATION_MODE_INVALID' => 'Selecione um local de visualização válido.',
	'BOARD_ANNOUNCEMENTS_INCLUDE_CHILDREN'	=> 'Também exibir em subfóruns',
	'BOARD_ANNOUNCEMENTS_LOCATION_EMPTY'	=> 'Nenhum local corresponde à sua pesquisa.',
	'BOARD_ANNOUNCEMENTS_SCHEDULE_BEHAVIOR'	=> 'Cronograma e comportamento',
	'BOARD_ANNOUNCEMENTS_SCHEDULE'			=> 'Horário',
	'BOARD_ANNOUNCEMENTS_START'				=> 'Data de início',
	'BOARD_ANNOUNCEMENTS_START_EXPLAIN'		=> 'Deixe em branco para começar a exibir o anúncio imediatamente.',
	'BOARD_ANNOUNCEMENTS_START_INVALID'		=> 'A data de início é inválida.',
	'BOARD_ANNOUNCEMENTS_FILTER'			=> 'Filtro',
	'BOARD_ANNOUNCEMENTS_STATUS'			=> 'Estatuto',
	'BOARD_ANNOUNCEMENTS_STATUS_ALL'		=> 'Tudo',
	'BOARD_ANNOUNCEMENTS_STATUS_ACTIVE'		=> 'Ativo',
	'BOARD_ANNOUNCEMENTS_STATUS_SCHEDULED'	=> 'Agendado',
	'BOARD_ANNOUNCEMENTS_STATUS_DRAFT'		=> 'Rascunho',
	'BOARD_ANNOUNCEMENTS_STATUS_EXPIRED'	=> 'Expirado',
	'BOARD_ANNOUNCEMENTS_STATUS_ARCHIVED'	=> 'Arquivado',
	'BOARD_ANNOUNCEMENTS_STATE_INVALID'		=> 'Selecione um estado válido.',
	'BOARD_ANNOUNCEMENTS_PUBLISH'			=> 'Publicar',
	'BOARD_ANNOUNCEMENTS_PUBLISHED'			=> 'Publicado',
	'BOARD_ANNOUNCEMENTS_SHOW_AGAIN'		=> 'Mostrar novamente a todos',
	'BOARD_ANNOUNCEMENTS_SHOWN_AGAIN'		=> 'O anúncio será mostrado novamente a todos.',
	'BOARD_ANNOUNCEMENTS_ARCHIVE'			=> 'Arquivo',
	'BOARD_ANNOUNCEMENTS_ARCHIVED'			=> 'Anúncio arquivado.',
	'BOARD_ANNOUNCEMENTS_DUPLICATE'			=> 'Duplicado',
	'BOARD_ANNOUNCEMENTS_DUPLICATED'		=> 'Anúncio duplicado como rascunho.',
	'BOARD_ANNOUNCEMENTS_COPY_OF'			=> 'Cópia de %s',
	'BOARD_ANNOUNCEMENTS_NOW'				=> 'Imediatamente',
	'BOARD_ANNOUNCEMENTS_NO_END'			=> 'Sem data de fim',
	'BOARD_ANNOUNCEMENTS_UNTITLED'			=> 'Anúncio sem título',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH'	=> 'visibilidade dos anúncios do fórum',
	'BOARD_ANNOUNCEMENTS_GLOBAL_DISABLED'	=> 'Todos os anúncios estão atualmente ocultos.',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH_EXPLAIN' => 'Oculte ou mostre todos os anúncios sem alterar os seus estados individuais.',
	'BOARD_ANNOUNCEMENTS_DISMISS_EXPLAIN'	=> 'Os visitantes podem ocultar este anúncio após a sua leitura.',
	'BOARD_ANNOUNCEMENTS_REORDER_FILTERED'	=> 'Limpe os filtros para alterar a ordem dos anúncios.',
	'BOARD_ANNOUNCEMENTS_FILTER_EMPTY'		=> 'Nenhum anúncio corresponde a estes filtros.',
	'BOARD_ANNOUNCEMENTS_BULK_ACTION'		=> 'Ação em massa',
	'BOARD_ANNOUNCEMENTS_BULK_UPDATED'		=> 'Os anúncios selecionados foram atualizados.',
	'BOARD_ANNOUNCEMENTS_DELETE_PERMANENTLY' => 'Apagar permanentemente',
	'BOARD_ANNOUNCEMENTS_PREVIEW_MOBILE'	=> 'Largura móvel',
	'BOARD_ANNOUNCEMENTS_JAVASCRIPT_REQUIRED' => 'O JavaScript tem de estar ativado para a pré-visualização e todas as funcionalidades do editor.',
	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'O anúncio do conselho foi excluído',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Não foi possível excluir o anúncio do conselho',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Os anúncios do conselho não conseguiram adquirir o bloqueio da mesa. Outro processo pode estar segurando o bloqueio. Os bloqueios são liberados à força após um tempo limite de 1 hora.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'O anúncio solicitado não existe.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'O anúncio solicitado não tem pai.',
));
