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
	public const DATE_FORMAT = 'Y-m-d H:i';

	/**
	 * Enable extension if phpBB minimum version requirement is met
	 *
	 * Requires >= phpBB 3.3.0 and < 4.0.0-dev
	 *
	 * @return bool
	 * @aceess public
	 */
	public function is_enableable()
	{
		return phpbb_version_compare(PHPBB_VERSION, '3.3.0', '>=')
			&& phpbb_version_compare(PHPBB_VERSION, '4.0.0-dev', '<');
	}
}
