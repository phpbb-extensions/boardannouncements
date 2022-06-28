<?php
/**
*
* Board Announcements extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\boardannouncements\tests\functional;

/**
* @group functional
*/
class version_check_test extends \phpbb_functional_test_case
{
	/**
	* Define the extensions to be tested
	*
	* @return array vendor/name of extension(s) to test
	*/
	protected static function setup_extensions()
	{
		return array('phpbb/boardannouncements');
	}

	/**
	* Test extension manager version check
	*/
	public function test_version_check()
	{
		// Log in to the ACP
		$this->login();
		$this->admin_login();

		// Load language files
		$this->add_lang('acp/extensions');
		$this->add_lang_ext('phpbb/boardannouncements', array('boardannouncements_acp', 'info_acp_board_announcements'));

		// Load the Board Rules details
		$crawler = self::request('GET', 'adm/index.php?i=acp_extensions&mode=main&action=details&ext_name=phpbb%2Fboardannouncements&sid=' . $this->sid);

		// Assert extension is up-to-date
		self::assertGreaterThan(0, $crawler->filter('.successbox')->count());
		self::assertStringContainsString($this->lang('UP_TO_DATE', 'Board Announcements'), $crawler->text());
	}
}
