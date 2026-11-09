<?php
/**
 *
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2026 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\boardannouncements\helper;

class color
{
	/**
	 * Select black or white text with sufficient contrast against a background color.
	 *
	 * @param string $hex Six-digit hexadecimal background color
	 * @return string Six-digit hexadecimal foreground color, or an empty string for invalid input
	 */
	public static function contrast_color($hex)
	{
		if (!preg_match('/\A[0-9a-f]{6}\z/i', $hex))
		{
			return '';
		}

		$channels = [hexdec(substr($hex, 0, 2)), hexdec(substr($hex, 2, 2)), hexdec(substr($hex, 4, 2))];
		foreach ($channels as $key => $channel)
		{
			$channel /= 255;
			$channels[$key] = $channel <= 0.04045 ? $channel / 12.92 : (($channel + 0.055) / 1.055) ** 2.4;
		}

		$luminance = 0.2126 * $channels[0] + 0.7152 * $channels[1] + 0.0722 * $channels[2];
		return $luminance > 0.179 ? '000000' : 'ffffff';
	}
}
