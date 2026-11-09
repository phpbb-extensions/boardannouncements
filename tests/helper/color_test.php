<?php
/**
 *
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2026 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\boardannouncements\tests\helper;

use phpbb\boardannouncements\helper\color;

class color_test extends \phpbb_test_case
{
	/**
	 * @dataProvider contrast_color_data
	 */
	public function test_contrast_color($background, $expected)
	{
		self::assertSame($expected, color::contrast_color($background));
	}

	public function contrast_color_data()
	{
		return [
			'invalid' => ['fff', ''],
			'black' => ['000000', 'ffffff'],
			'mid gray' => ['767676', '000000'],
			'white' => ['ffffff', '000000'],
		];
	}
}
