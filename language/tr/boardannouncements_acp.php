<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Site Duyuruları ayarları',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Buradan sitenin her sayfasında görünecek site duyurusunu yönetebilir ve yeni bir duyuru oluşturabilirsin.',

	'BOARD_ANNOUNCEMENTS_ENABLE_ALL'		=> 'Site duyurularını etkinleştir',

	'BOARD_ANNOUNCEMENTS_OPTIONS'			=> 'Duyuru seçenekleri',

	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Tanım',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Bu duyuru için kısa bir tanım. Bu, yalnızca bu duyurunun tanımlanmasına yardımcı olmak için YKP’de görünür olacaktır.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Bu site duyurusunu göster',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Bu site duyurusunu kimler görebilir',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Kullanıcıların bu site duyurusunu savmalarına izin ver',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Limit where this announcement should be displayed',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_EXPLAIN'	=> 'Select one or more locations to display the announcement. To display it everywhere, leave the selection empty. Use Command (Mac) or Control (Windows) click to select multiple locations.',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Herkes',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Site duyurusu arkaplan rengi',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Site duyurusu arkaplan rengini hex kodu kullanarak değiştirebilirsin (ör: FFFF80). Varsayılan rengi kullanmak için boş bırak.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Site duyurusu son kullanma tarihi',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Duyurunun kullanımının sona ereceği tarihi ayarlayın ve böylece o tarihte devre dışı bırakın. Duyurunun sona ermesini istemiyorsanız bu alanı boş bırakın.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Son kullanma tarihi geçersiz veya zaten süresi dolmuş.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Site duyurusu mesaj içermiyor',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Site duyurusu mesajı',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Site duyurusu - Önizleme',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Site duyurusu güncellendi.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Tanım',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_WHERE'		=> 'Konum',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Şunlara görünür',
	'BOARD_ANNOUNCEMENTS_TH_ENABLED'		=> 'Etkinleştirilmiş',
	'BOARD_ANNOUNCEMENTS_TH_CREATED_DATE'	=> 'Oluşturma Tarihi',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRY_DATE'	=> 'Son yayınlanma tarihi',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRED'		=> 'Süresi bitmiş',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Her yer',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Board Index',
	'BOARD_ANNOUNCEMENTS_FORUMS'			=> 'Selected Forums',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Gösterilecek site duyurusu yok',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Duyuru Oluştur',

	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Site duyurusu silindi',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Site duyurusu silinemedi',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Site duyuruları tablo kilidini alamadı. Başka bir işlem kilidi tutuyor olabilir. Kilitler, 1 saatlik bir zaman aşımından sonra zorla açılır.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'İstenen duyuru mevcut değil.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'İstenen duyurunun üst öğesi yok.',
));
