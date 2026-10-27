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
	'BOARD_ANNOUNCEMENTS_SETTINGS'			=> 'Board announcements settings',
	'BOARD_ANNOUNCEMENTS_SETTINGS_EXPLAIN'	=> 'Here you can create and manage your board’s announcements.',

	'BOARD_ANNOUNCEMENTS_ENABLE_ALL'		=> 'Enable board announcements',

	'BOARD_ANNOUNCEMENTS_OPTIONS'			=> 'Board announcement options',

	'BOARD_ANNOUNCEMENTS_DESC'				=> 'Description',
	'BOARD_ANNOUNCEMENTS_DESC_EXPLAIN'		=> 'A short description for this announcement. This will only be visible here in the ACP to help identify this announcement.',
	'BOARD_ANNOUNCEMENTS_DESC_TOO_LONG'		=> 'Description is too long. Some special characters require additional storage.',

	'BOARD_ANNOUNCEMENTS_ENABLE'			=> 'Display this announcement',
	'BOARD_ANNOUNCEMENTS_USERS'				=> 'Who can view this announcement',
	'BOARD_ANNOUNCEMENTS_DISMISS'			=> 'Allow users to dismiss this announcement',
	'BOARD_ANNOUNCEMENTS_LOCATIONS'			=> 'Limit where this announcement should be displayed',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_EXPLAIN'	=> 'Select one or more locations to display the announcement. To display it everywhere, leave the selection empty. Use Command (Mac) or Control (Windows) click to select multiple locations.',

	'BOARD_ANNOUNCEMENTS_EVERYONE'			=> 'Everyone',

	'BOARD_ANNOUNCEMENTS_BGCOLOR'			=> 'Background color',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_EXPLAIN'	=> 'You can change the background color of the announcement using a hex code (e.g: FFFF80). Leave this field blank to use the default color.',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_PICKER'	=> 'Background color picker',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_HEX'		=> 'Background color hexadecimal code',
	'BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID'	=> 'Background color must be a six-character hexadecimal color code.',

	'BOARD_ANNOUNCEMENTS_EXPIRY'			=> 'Expiration date',
	'BOARD_ANNOUNCEMENTS_EXPIRY_EXPLAIN'	=> 'Set the date the announcement will expire and become disabled. Leave this field blank if you do not want the announcement to expire.',
	'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID'	=> 'The expiration date was invalid or has already expired.',

	'BOARD_ANNOUNCEMENTS_TEXT_INVALID'		=> 'Board announcement contains no message',
	'BOARD_ANNOUNCEMENTS_TEXT'				=> 'Board announcement message',
	'BOARD_ANNOUNCEMENTS_PREVIEW'			=> 'Board announcement - Preview',

	'BOARD_ANNOUNCEMENTS_UPDATED'			=> 'Board announcement has been updated.',

	'BOARD_ANNOUNCEMENTS_TH_DESCRIPTION'	=> 'Description',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_WHERE'		=> 'Location',
	'BOARD_ANNOUNCEMENTS_TH_SHOW_TO'		=> 'Visible To',
	'BOARD_ANNOUNCEMENTS_TH_ENABLED'		=> 'Enabled',
	'BOARD_ANNOUNCEMENTS_TH_CREATED_DATE'	=> 'Creation Date',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRY_DATE'	=> 'Expiration Date',
	'BOARD_ANNOUNCEMENTS_TH_EXPIRED'		=> 'Expired',

	'BOARD_ANNOUNCEMENTS_EVERYWHERE'		=> 'Everywhere',
	'BOARD_ANNOUNCEMENTS_INDEX_PAGE'		=> 'Board Index',
	'BOARD_ANNOUNCEMENTS_FORUMS'			=> 'Selected Forums',

	'BOARD_ANNOUNCEMENTS_EMPTY'				=> 'There are no board announcements to display',
	'BOARD_ANNOUNCEMENTS_ADD'				=> 'Create Announcement',
	'BOARD_ANNOUNCEMENTS_EDIT'			=> 'Edit announcement',
	'BOARD_ANNOUNCEMENTS_EDITOR_EXPLAIN' => 'Compose the message, choose its audience, and control when it appears.',
	'BOARD_ANNOUNCEMENTS_CONTENT'		=> 'Content',
	'BOARD_ANNOUNCEMENTS_CONTENT_EXPLAIN' => 'Add an internal description and the content visitors will see.',
	'BOARD_ANNOUNCEMENTS_TITLE'			=> 'Public heading',
	'BOARD_ANNOUNCEMENTS_TITLE_EXPLAIN'	=> 'Optional heading shown above the announcement message.',
	'BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG' => 'Public heading must be 255 characters or fewer.',
	'BOARD_ANNOUNCEMENTS_APPEARANCE'	=> 'Appearance',
	'BOARD_ANNOUNCEMENTS_APPEARANCE_EXPLAIN' => 'Choose a semantic tone or provide a custom background color.',
	'BOARD_ANNOUNCEMENTS_TONE'			=> 'Tone',
	'BOARD_ANNOUNCEMENTS_TONE_NEUTRAL'	=> 'Neutral',
	'BOARD_ANNOUNCEMENTS_TONE_INFO'		=> 'Information',
	'BOARD_ANNOUNCEMENTS_TONE_SUCCESS'	=> 'Success',
	'BOARD_ANNOUNCEMENTS_TONE_WARNING'	=> 'Warning',
	'BOARD_ANNOUNCEMENTS_TONE_CRITICAL'	=> 'Critical',
	'BOARD_ANNOUNCEMENTS_TONE_CUSTOM'	=> 'Custom color',
	'BOARD_ANNOUNCEMENTS_TONE_INVALID'	=> 'Selected tone is invalid.',
	'BOARD_ANNOUNCEMENTS_AUDIENCE_LOCATION' => 'Audience and location',
	'BOARD_ANNOUNCEMENTS_SELECTED_GROUPS' => 'Selected groups',
	'BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED' => 'Select at least one group for a selected-groups audience.',
	'BOARD_ANNOUNCEMENTS_LOCATIONS_EXPLAIN_V2' => 'Leave every location clear to show everywhere, or select the board index and forums where this announcement belongs.',
	'BOARD_ANNOUNCEMENTS_INCLUDE_CHILDREN' => 'Also show in descendant forums',
	'BOARD_ANNOUNCEMENTS_SELECT_VISIBLE' => 'Select visible',
	'BOARD_ANNOUNCEMENTS_CLEAR_SELECTION' => 'Clear selection',
	'BOARD_ANNOUNCEMENTS_SELECTED' => 'selected',
	'BOARD_ANNOUNCEMENTS_LOCATION_EMPTY' => 'No locations match your search.',
	'BOARD_ANNOUNCEMENTS_SCHEDULE_BEHAVIOR' => 'Schedule and behavior',
	'BOARD_ANNOUNCEMENTS_SCHEDULE'		=> 'Schedule',
	'BOARD_ANNOUNCEMENTS_START'			=> 'Start date',
	'BOARD_ANNOUNCEMENTS_START_EXPLAIN'	=> 'Leave blank to begin showing the announcement immediately.',
	'BOARD_ANNOUNCEMENTS_START_INVALID'	=> 'Start date is invalid.',
	'BOARD_ANNOUNCEMENTS_STATUS'			=> 'Status',
	'BOARD_ANNOUNCEMENTS_STATUS_ALL'	=> 'All',
	'BOARD_ANNOUNCEMENTS_STATUS_ACTIVE'	=> 'Active',
	'BOARD_ANNOUNCEMENTS_STATUS_SCHEDULED' => 'Scheduled',
	'BOARD_ANNOUNCEMENTS_STATUS_DRAFT'	=> 'Draft',
	'BOARD_ANNOUNCEMENTS_STATUS_EXPIRED'	=> 'Expired',
	'BOARD_ANNOUNCEMENTS_STATUS_ARCHIVED' => 'Archived',
	'BOARD_ANNOUNCEMENTS_STATE_INVALID'	=> 'Selected publication state is invalid.',
	'BOARD_ANNOUNCEMENTS_PUBLISH'		=> 'Published',
	'BOARD_ANNOUNCEMENTS_SHOW_AGAIN'	=> 'Show again to everyone',
	'BOARD_ANNOUNCEMENTS_SHOWN_AGAIN' => 'Announcement will be shown again to everyone.',
	'BOARD_ANNOUNCEMENTS_ARCHIVE'		=> 'Archive',
	'BOARD_ANNOUNCEMENTS_ARCHIVED'		=> 'Announcement archived.',
	'BOARD_ANNOUNCEMENTS_DUPLICATE'		=> 'Duplicate',
	'BOARD_ANNOUNCEMENTS_DUPLICATED'	=> 'Announcement duplicated as a draft.',
	'BOARD_ANNOUNCEMENTS_COPY_OF'		=> 'Copy of %s',
	'BOARD_ANNOUNCEMENTS_NOW'			=> 'Immediately',
	'BOARD_ANNOUNCEMENTS_NO_END'		=> 'No end date',
	'BOARD_ANNOUNCEMENTS_UNTITLED'		=> 'Untitled announcement',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH' => 'Emergency display switch',
	'BOARD_ANNOUNCEMENTS_GLOBAL_DISABLED' => 'All announcements are currently hidden by the emergency display switch.',
	'BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH_EXPLAIN' => 'Hide or restore every announcement without changing individual publication settings.',
	'BOARD_ANNOUNCEMENTS_DISMISS_EXPLAIN' => 'Visitors may hide this announcement after reading it.',
	'BOARD_ANNOUNCEMENTS_REORDER_FILTERED' => 'Clear filters to change announcement order.',
	'BOARD_ANNOUNCEMENTS_FILTER_EMPTY'	=> 'No announcements match these filters.',
	'BOARD_ANNOUNCEMENTS_BULK_ACTION'	=> 'Bulk action',
	'BOARD_ANNOUNCEMENTS_BULK_UPDATED'	=> 'Selected announcements were updated.',
	'BOARD_ANNOUNCEMENTS_DELETE_PERMANENTLY' => 'Delete permanently',
	'BOARD_ANNOUNCEMENTS_PREVIEW_LIGHT' => 'Light',
	'BOARD_ANNOUNCEMENTS_PREVIEW_DARK' => 'Dark',
	'BOARD_ANNOUNCEMENTS_PREVIEW_MOBILE' => 'Mobile width',

	'BOARD_ANNOUNCEMENTS_DELETE_SUCCESS'	=> 'The board announcement was deleted',
	'BOARD_ANNOUNCEMENTS_DELETE_ERROR'		=> 'The board announcement could not be deleted',

	// Nested set exception messages (only appears in PHP error logging)
	// Translating these strings is optional.
	'BOARD_ANNOUNCEMENTS_LOCK_FAILED_ACQUIRE'	=> 'Board announcements failed to acquire the table lock. Another process may be holding the lock. Locks are forcibly released after a timeout of 1 hour.',
	'BOARD_ANNOUNCEMENTS_INVALID_ITEM'			=> 'The requested announcement does not exist.',
	'BOARD_ANNOUNCEMENTS_INVALID_PARENT'		=> 'The requested announcement has no parent.',
));
