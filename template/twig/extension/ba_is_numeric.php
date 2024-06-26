<?php
/**
 *
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2024 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\boardannouncements\template\twig\extension;

class ba_is_numeric extends \Twig\Extension\AbstractExtension
{
	/**
	 * Get the name of this extension
	 *
	 * @return string
	 */
	public function getName()
	{
		return 'ba_is_numeric';
	}

	/**
	 * Returns a list of global functions to add to the existing list.
	 *
	 * @return array An array of global functions
	 */
	public function getFunctions()
	{
		return [
			new \Twig\TwigFunction('ba_is_numeric', [$this, 'is_numeric']),
		];
	}

	/**
	 * Check if a value is numeric
	 *
	 * @return bool
	 */
	public function is_numeric($value)
	{
		return is_numeric($value);
	}
}
