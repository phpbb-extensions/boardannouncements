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

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Bu site duyurusunu göster',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Bu site duyurusunu kimler görebilir',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Kullanıcıların bu site duyurusunu savmalarına izin ver',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Herkes',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Site duyurusu arkaplan rengi',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Site duyurusu arkaplan rengini hex kodu kullanarak değiştirebilirsin (ör: FFFF80). VArsayılan rengi kullanmak için boş bırak.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Site duyurusu son kullanma tarihi',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Duyurunun kullanımının sona ereceği tarihi ayarlayın ve böylece o tarihte devre dışı bırakın. Duyurunun sona ermesini istemiyorsanız bu alanı boş bırakın.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Son kullanma tarihi geçersiz veya zaten süresi dolmuş.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_FORMAT'		=> 'YYYY-AA-GG SS:DD',

	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Site duyurusu mesajı',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Site duyurusu - Önizleme',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Site duyurusu güncellendi.',
));
