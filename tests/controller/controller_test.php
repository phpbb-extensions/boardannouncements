<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
*
* @copyright (c) 2015 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardannouncements\tests\controller;

class controller_test extends \phpbb_database_test_case
{
	static protected function setup_extensions()
	{
		return array('phpbb/boardannouncements');
	}

	public function getDataSet()
	{
		return $this->createXMLDataSet(dirname(__FILE__) . '/fixtures/users.xml');
	}

	public function test_fake()
	{
	}
}
