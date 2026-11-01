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



	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Tanım',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'Açıklama çok uzun. Bazı özel karakterler ek depolama alanı gerektirir.',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'Bu duyuru için kısa bir tanım. Bu, yalnızca bu duyurunun tanımlanmasına yardımcı olmak için YKP’de görünür olacaktır.',

	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Bu site duyurusunu kimler görebilir',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Kullanıcıların bu site duyurusunu savmalarına izin ver',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Bu duyurunun nerede görüntülenmesi gerektiği',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Herkes',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Site duyurusu arkaplan rengi',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_PICKER'	=> 'Arka plan rengi seçici',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_HEX'		=> 'Arka plan rengi onaltılık kod',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'Arka plan rengi altı karakterli onaltılık bir renk kodu olmalıdır.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'Özel renk seçeneği için bir arka plan rengi seçin veya altı karakterli onaltılık bir kod girin.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Site duyurusu son kullanma tarihi',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Duyurunun kullanımının sona ereceği tarihi ayarlayın ve böylece o tarihte devre dışı bırakın. Duyurunun sona ermesini istemiyorsanız bu alanı boş bırakın.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'Son kullanma tarihi geçersiz veya zaten süresi dolmuş.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Site duyurusu mesaj içermiyor',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Site duyurusu mesajı',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Site duyurusu - Önizleme',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Site duyurusu güncellendi.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Duyuru',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Şunlara görünür',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Her yer',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Yönetim Kurulu İndeksi',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'Gösterilecek site duyurusu yok',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Duyuru Oluştur',

	'BOARD_ANNOUNCEMENTS_EDIT'				=> 'Duyuru düzenle',
	'BOARD_ANNOUNCEMENTS_EDITOR_EXPLAIN'	=> 'Mesajı oluşturun, hedef kitlesini seçin ve ne zaman görüneceğini kontrol edin.',
	'BOARD_ANNOUNCEMENTS_CONTENT'			=> 'İçerik',
	'BOARD_ANNOUNCEMENTS_TITLE'				=> 'Duyuru başlığı',
	'BOARD_ANNOUNCEMENTS_TITLE_EXPLAIN'		=> 'Duyuru mesajının üzerinde görüntülenen isteğe bağlı başlık.',
	'BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG'	=> 'Duyuru başlığı 255 karakter veya daha az olmalıdır.',
	'BOARD_ANNOUNCEMENTS_APPEARANCE'		=> 'Dış görünüş',
	'BOARD_ANNOUNCEMENTS_TONE'				=> 'Renk tonu',
	'BOARD_ANNOUNCEMENTS_TONE_EXPLAIN'		=> 'Önceden ayarlanmış bir renk şeması seçin veya kendinizinkini seçmek için Özel renk\'i seçin.',
	'BOARD_ANNOUNCEMENTS_TONE_NEUTRAL'		=> 'Doğal',
	'BOARD_ANNOUNCEMENTS_TONE_INFO'			=> 'Bilgi',
	'BOARD_ANNOUNCEMENTS_TONE_SUCCESS'		=> 'Başarı',
	'BOARD_ANNOUNCEMENTS_TONE_WARNING'		=> 'Uyarı',
	'BOARD_ANNOUNCEMENTS_TONE_CRITICAL'		=> 'Kritik',
	'BOARD_ANNOUNCEMENTS_TONE_CUSTOM'		=> 'Özel renk',
	'BOARD_ANNOUNCEMENTS_TONE_INVALID'		=> 'Geçerli bir renk tonu seçin.',
	'BOARD_ANNOUNCEMENTS_AUDIENCE_LOCATION'	=> 'Hedef kitle ve konum',
	'BOARD_ANNOUNCEMENTS_SELECTED_GROUPS'	=> 'Seçilen gruplar',
	'BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED'	=> 'Seçilen gruplar seçildiğinde en az bir grup seçin.',
	'BOARD_ANNOUNCEMENTS_SELECTED_LOCATIONS' => 'Seçilen konumlar',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_REQUIRED' => 'Seçilen konumlar seçildiğinde en az bir konum seçin.',
	'BOARD_ANNOUNCEMENTS_LOCATION_MODE_INVALID' => 'Geçerli bir görüntüleme konumu seçin.',
	'BOARD_ANNOUNCEMENTS_INCLUDE_CHILDREN'	=> 'Alt forumlarda da görüntüle',
	'BOARD_ANNOUNCEMENTS_LOCATION_EMPTY'	=> 'Aramanızla eşleşen konum yok.',
	'BOARD_ANNOUNCEMENTS_SCHEDULE_BEHAVIOR'	=> 'Program ve davranış',
	'BOARD_ANNOUNCEMENTS_SCHEDULE'			=> 'Takvim',
	'BOARD_ANNOUNCEMENTS_START'				=> 'Başlangıç ​​tarihi',
	'BOARD_ANNOUNCEMENTS_START_EXPLAIN'		=> 'Duyuruyu hemen göstermeye başlamak için boş bırakın.',
	'BOARD_ANNOUNCEMENTS_START_INVALID'		=> 'Başlangıç ​​tarihi geçersiz.',
	'BOARD_ANNOUNCEMENTS_FILTER'			=> 'Filtre',
	'BOARD_ANNOUNCEMENTS_STATUS'			=> 'Durum',
	'BOARD_ANNOUNCEMENTS_STATUS_ALL'		=> 'Tüm',
	'BOARD_ANNOUNCEMENTS_STATUS_ACTIVE'		=> 'Aktif',
	'BOARD_ANNOUNCEMENTS_STATUS_SCHEDULED'	=> 'planlanmış',
	'BOARD_ANNOUNCEMENTS_STATUS_DRAFT'		=> 'Taslak',
	'BOARD_ANNOUNCEMENTS_STATUS_EXPIRED'	=> 'Günü geçmiş',
	'BOARD_ANNOUNCEMENTS_STATUS_ARCHIVED'	=> 'Arşivlendi',
	'BOARD_ANNOUNCEMENTS_STATE_INVALID'		=> 'Geçerli bir durum seçin.',
	'BOARD_ANNOUNCEMENTS_PUBLISH'			=> 'Yayınla',
	'BOARD_ANNOUNCEMENTS_PUBLISHED'			=> 'Yayınlandı',
	'BOARD_ANNOUNCEMENTS_SHOW_AGAIN'		=> 'Herkese tekrar göster',
	'BOARD_ANNOUNCEMENTS_SHOWN_AGAIN'		=> 'Duyuru herkese tekrar gösterilecektir.',
	'BOARD_ANNOUNCEMENTS_ARCHIVE'			=> 'Arşiv',
	'BOARD_ANNOUNCEMENTS_ARCHIVED'			=> 'Duyuru arşivlendi.',
	'BOARD_ANNOUNCEMENTS_DUPLICATE'			=> 'Kopyalamak',
	'BOARD_ANNOUNCEMENTS_DUPLICATED'		=> 'Duyuru taslak olarak çoğaltılmıştır.',
	'BOARD_ANNOUNCEMENTS_COPY_OF'			=> '%s kopyası',
	'BOARD_ANNOUNCEMENTS_NOW'				=> 'Hemen',
	'BOARD_ANNOUNCEMENTS_NO_END'			=> 'Bitiş tarihi yok',
	'BOARD_ANNOUNCEMENTS_UNTITLED'			=> 'Başlıksız duyuru',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH'	=> 'forum duyurularının görünürlüğü',
	'BOARD_ANNOUNCEMENTS_GLOBAL_DISABLED'	=> 'Tüm duyurular şu anda gizlidir.',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH_EXPLAIN' => 'Tüm duyuruları bireysel durumlarını değiştirmeden gizleyin veya gösterin.',
	'BOARD_ANNOUNCEMENTS_DISMISS_EXPLAIN'	=> 'Ziyaretçiler bu duyuruyu okuduktan sonra gizleyebilirler.',
	'BOARD_ANNOUNCEMENTS_REORDER_FILTERED'	=> 'Duyuru sırasını değiştirmek için filtreleri temizleyin.',
	'BOARD_ANNOUNCEMENTS_FILTER_EMPTY'		=> 'Bu filtrelerle eşleşen duyuru yok.',
	'BOARD_ANNOUNCEMENTS_BULK_ACTION'		=> 'Toplu işlem',
	'BOARD_ANNOUNCEMENTS_BULK_UPDATED'		=> 'Seçilen duyurular güncellendi.',
	'BOARD_ANNOUNCEMENTS_DELETE_PERMANENTLY' => 'Kalıcı olarak sil',
	'BOARD_ANNOUNCEMENTS_PREVIEW_MOBILE'	=> 'Mobil genişlik',
	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'Site duyurusu silindi',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'Site duyurusu silinemedi',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Site duyuruları tablo kilidini alamadı. Başka bir işlem kilidi tutuyor olabilir. Kilitler, 1 saatlik bir zaman aşımından sonra zorla açılır.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'İstenen duyuru mevcut değil.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'İstenen duyurunun üst öğesi yok.',
));
