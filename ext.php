<?php
/**
 *
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2015 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\boardannouncements;

/**
 * Extension class for custom enable/disable/purge actions
 */
class ext extends \phpbb\extension\base
{
	public const INDEX_ONLY = -1;
	public const ALL = 0;
	public const MEMBERS = 1;
	public const GUESTS = 2;
	public const GROUPS = 3;
	public const STATUS_DRAFT = 'draft';
	public const STATUS_PUBLISHED = 'published';
	public const STATUS_ARCHIVED = 'archived';
	public const STATUS_ALL = 'all';
	public const STATUS_ACTIVE = 'active';
	public const STATUS_SCHEDULED = 'scheduled';
	public const STATUS_EXPIRED = 'expired';
	public const PERSISTED_STATUSES = [
		self::STATUS_DRAFT,
		self::STATUS_PUBLISHED,
		self::STATUS_ARCHIVED,
	];
	public const FILTER_STATUSES = [
		self::STATUS_ALL,
		self::STATUS_ACTIVE,
		self::STATUS_SCHEDULED,
		self::STATUS_DRAFT,
		self::STATUS_EXPIRED,
		self::STATUS_ARCHIVED,
	];
	public const TONE_NEUTRAL = 'neutral';
	public const TONE_INFO = 'info';
	public const TONE_SUCCESS = 'success';
	public const TONE_WARNING = 'warning';
	public const TONE_CRITICAL = 'critical';
	public const TONE_CUSTOM = 'custom';
	public const TONES = [
		self::TONE_NEUTRAL,
		self::TONE_INFO,
		self::TONE_SUCCESS,
		self::TONE_WARNING,
		self::TONE_CRITICAL,
		self::TONE_CUSTOM,
	];
	public const DATE_FORMAT = 'Y-m-d H:i';

	/**
	 * Enable extension if phpBB minimum version requirement is met
	 *
	 * Requires >= phpBB 3.3.2
	 *
	 * @return bool
	 * @access public
	 */
	public function is_enableable()
	{
		return phpbb_version_compare(PHPBB_VERSION, '3.3.2', '>=');
	}
}
