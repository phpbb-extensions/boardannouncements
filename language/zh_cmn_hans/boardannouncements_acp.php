<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
* @简体中文语言　David Yin <https://www.phpbbchinese.com/>
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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> '论坛公告设定',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> '在这里，您可以建立并管理论坛公告，它将会显示在论坛的每个页面。',



	'BOARD_ANNOUNCEMENTS_DESC'				=> '描述',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> '描述过长。某些特殊字符需要额外的存储空间。',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> '一个简短的公告描述。只显示在 ACP，用于标识此公告。',

	'BOARD_ANNOUNCEMENTS_USERS'				=> '允许查看公告的用户',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> '允许用户关闭这条论坛公告',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> '该公告应显示在何处',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> '所有用户',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> '论坛公告背景颜色',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_PICKER'	=> '背景颜色选择器',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_HEX'		=> '背景颜色十六进制代码',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> '背景颜色必须是六位十六进制颜色代码。',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> '为自定义颜色选项选择背景颜色，或输入六字符的十六进制代码。',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> '论坛公告到期日期',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> '设置论坛公告自动过期失效的日期。留空将长期有效。',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> '到期日期无效或者已经过期。',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> '论坛公告没有内容',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> '论坛公告信息',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> '论坛公告 -  预览',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> '论坛公告已更新。',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> '公告',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> '显示给',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> '任何地方',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> '论坛首页',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> '没有论坛公告可显示',
	'BOARD_ANNOUNCEMENTS_ADD'				=> '创建论坛公告',

	'BOARD_ANNOUNCEMENTS_EDIT'				=> '编辑公告',
	'BOARD_ANNOUNCEMENTS_EDITOR_EXPLAIN'	=> '撰写消息、选择受众并控制消息的显示时间。',
	'BOARD_ANNOUNCEMENTS_CONTENT'			=> '内容',
	'BOARD_ANNOUNCEMENTS_TITLE'				=> '公告标题',
	'BOARD_ANNOUNCEMENTS_TITLE_EXPLAIN'		=> '公告消息上方显示的可选标题。',
	'BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG'	=> '公告标题不得超过 255 个字符。',
	'BOARD_ANNOUNCEMENTS_APPEARANCE'		=> '外貌',
	'BOARD_ANNOUNCEMENTS_TONE'				=> '色调',
	'BOARD_ANNOUNCEMENTS_TONE_EXPLAIN'		=> '选择预设的配色方案，或选择自定义颜色来选择您自己的配色方案。',
	'BOARD_ANNOUNCEMENTS_TONE_NEUTRAL'		=> '中性的',
	'BOARD_ANNOUNCEMENTS_TONE_INFO'			=> '信息',
	'BOARD_ANNOUNCEMENTS_TONE_SUCCESS'		=> '成功',
	'BOARD_ANNOUNCEMENTS_TONE_WARNING'		=> '警告',
	'BOARD_ANNOUNCEMENTS_TONE_CRITICAL'		=> '批判的',
	'BOARD_ANNOUNCEMENTS_TONE_CUSTOM'		=> '定制颜色',
	'BOARD_ANNOUNCEMENTS_TONE_INVALID'		=> '选择有效的色调。',
	'BOARD_ANNOUNCEMENTS_AUDIENCE_LOCATION'	=> '受众及地点',
	'BOARD_ANNOUNCEMENTS_SELECTED_GROUPS'	=> '选定的组',
	'BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED'	=> '选择“选定组”时，至少选择一组。',
	'BOARD_ANNOUNCEMENTS_SELECTED_LOCATIONS' => '选定地点',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_REQUIRED' => '选择“选定位置”时，至少选择一个位置。',
	'BOARD_ANNOUNCEMENTS_LOCATION_MODE_INVALID' => '选择有效的显示位置。',
	'BOARD_ANNOUNCEMENTS_INCLUDE_CHILDREN'	=> '也显示在子论坛中',
	'BOARD_ANNOUNCEMENTS_LOCATION_EMPTY'	=> '没有符合您搜索条件的地点。',
	'BOARD_ANNOUNCEMENTS_SCHEDULE_BEHAVIOR'	=> '时间表和行为',
	'BOARD_ANNOUNCEMENTS_SCHEDULE'			=> '日程',
	'BOARD_ANNOUNCEMENTS_START'				=> '开始日期',
	'BOARD_ANNOUNCEMENTS_START_EXPLAIN'		=> '留空可立即开始显示公告。',
	'BOARD_ANNOUNCEMENTS_START_INVALID'		=> '开始日期无效。',
	'BOARD_ANNOUNCEMENTS_FILTER'			=> '筛选',
	'BOARD_ANNOUNCEMENTS_STATUS'			=> '地位',
	'BOARD_ANNOUNCEMENTS_STATUS_ALL'		=> '全部',
	'BOARD_ANNOUNCEMENTS_STATUS_ACTIVE'		=> '积极的',
	'BOARD_ANNOUNCEMENTS_STATUS_SCHEDULED'	=> '预定',
	'BOARD_ANNOUNCEMENTS_STATUS_DRAFT'		=> '草稿',
	'BOARD_ANNOUNCEMENTS_STATUS_EXPIRED'	=> '已到期',
	'BOARD_ANNOUNCEMENTS_STATUS_ARCHIVED'	=> '已存档',
	'BOARD_ANNOUNCEMENTS_STATE_INVALID'		=> '选择有效状态。',
	'BOARD_ANNOUNCEMENTS_PUBLISH'			=> '发布',
	'BOARD_ANNOUNCEMENTS_PUBLISHED'			=> '已发表',
	'BOARD_ANNOUNCEMENTS_SHOW_AGAIN'		=> '再次展现给大家',
	'BOARD_ANNOUNCEMENTS_SHOWN_AGAIN'		=> '公告将再次向大家展示。',
	'BOARD_ANNOUNCEMENTS_ARCHIVE'			=> '档案',
	'BOARD_ANNOUNCEMENTS_ARCHIVED'			=> '公告已存档。',
	'BOARD_ANNOUNCEMENTS_DUPLICATE'			=> '复制',
	'BOARD_ANNOUNCEMENTS_DUPLICATED'		=> '公告复制为草稿。',
	'BOARD_ANNOUNCEMENTS_COPY_OF'			=> '%s 的副本',
	'BOARD_ANNOUNCEMENTS_NOW'				=> '立即地',
	'BOARD_ANNOUNCEMENTS_NO_END'			=> '无结束日期',
	'BOARD_ANNOUNCEMENTS_UNTITLED'			=> '无标题公告',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH'	=> '论坛公告可见度',
	'BOARD_ANNOUNCEMENTS_GLOBAL_DISABLED'	=> '目前所有公告均处于隐藏状态。',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH_EXPLAIN' => '隐藏或显示所有公告，而不更改其各自的状态。',
	'BOARD_ANNOUNCEMENTS_DISMISS_EXPLAIN'	=> '访客阅读后可以隐藏此公告。',
	'BOARD_ANNOUNCEMENTS_REORDER_FILTERED'	=> '清除过滤器以更改公告顺序。',
	'BOARD_ANNOUNCEMENTS_FILTER_EMPTY'		=> '没有符合这些过滤器的公告。',
	'BOARD_ANNOUNCEMENTS_BULK_ACTION'		=> '批量操作',
	'BOARD_ANNOUNCEMENTS_BULK_UPDATED'		=> '选定的公告已更新。',
	'BOARD_ANNOUNCEMENTS_DELETE_PERMANENTLY' => '永久删除',
	'BOARD_ANNOUNCEMENTS_PREVIEW_MOBILE'	=> '移动宽度',
	'BOARD_ANNOUNCEMENTS_JAVASCRIPT_REQUIRED' => '必须启用 JavaScript 才能使用预览和编辑器的完整功能。',
	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> '此公告已成功删除',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> '此公告无法删除',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> '董事会公告未能获取表锁。另一个进程可能正在持有锁。超时1小时后强制释放锁。',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> '所请求的公告不存在。',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> '所请求的公告没有父级。',
));
