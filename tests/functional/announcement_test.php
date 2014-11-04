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
class announcement_test extends \phpbb_functional_test_case
{
	/**
	* Define the extensions to be tested
	*
	* @return array vendor/name of extension(s) to test
	* @access static
	*/
	static protected function setup_extensions()
	{
		return array('phpbb/boardannouncements');
	}

	public function setUp()
	{
		parent::setUp();
		$this->add_lang_ext('phpbb/boardannouncements', array('boardannouncements_acp', 'info_acp_board_announcements'));
	}

	/**
	* Test board announcement ACP page and save settings
	*
	* @access public
	*/
	public function test_set_acp_settings()
	{
		$this->login();
		$this->admin_login();

		// Load ACP page
		$crawler = self::request('GET', 'adm/index.php?i=\phpbb\boardannouncements\acp\board_announcements_module&amp;mode=settings&sid=' . $this->sid);

		// Test that our settings fields are found
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_ENABLE', $crawler->text());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_GUESTS', $crawler->text());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_DISMISS', $crawler->text());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_BGCOLOR', $crawler->text());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_TEXT', $crawler->text());

		// Set some form values
		$form = $crawler->selectButton($this->lang('SUBMIT'))->form();
		$values = $form->getValues();
		$values = array(
			'board_announcements_enable'	=> true,
			'board_announcements_guests'	=> true,
			'board_announcements_dismiss'	=> true,
			'board_announcements_bgcolor'	=> 'ff0000',
			'board_announcements_text'		=> 'This is a board announcement test.',
		);
		$form->setValues($values);

		// Submit form and test success
		$crawler = self::submit($form);
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_UPDATED', $crawler->text());
	}

	/**
	* Test loading the board announcement as a user
	*
	* @access public
	*/
	public function test_view_as_user()
	{
		$crawler = self::request('GET', 'index.php');
		$this->assertContains('This is a board announcement test.', $crawler->filter('#phpbb_announcement')->text());
	}

	/**
	* Test loading the board announcement as a guest
	*
	* @access public
	*/
	public function test_view_as_guest()
	{
		$this->logout();

		$crawler = self::request('GET', 'index.php');
		$this->assertContains('This is a board announcement test.', $crawler->filter('#phpbb_announcement')->text());
	}

	/**
	* Test closing the board announcement
	*
	* @access public
	*/
	public function test_close_announcement()
	{
		$this->login();

		self::request('GET', 'app.php/boardannouncements/close?hash=' . $this->mock_link_hash('close_boardannouncement') . '&sid=' . $this->sid);
		$crawler = self::request('GET', 'index.php');
		$this->assertCount(0, $crawler->filter('#phpbb_announcement'));
	}

	/**
	* Test closing the board announcement failure
	*
	* @access public
	*/
	public function test_close_announcement_fail()
	{
		// Wrong hash
		$crawler = self::request('GET', 'app.php/boardannouncements/close?hash=wrong&sid=' . $this->sid);
		$this->assertContainsLang('GENERAL_ERROR', $crawler->text());

		// No hash
		$crawler = self::request('GET', 'app.php/boardannouncements/close?sid=' . $this->sid);
		$this->assertContainsLang('GENERAL_ERROR', $crawler->text());
	}

	/**
	* Create a link hash for the user 'admin'
	*
	* @param string  $link_name The name of the link
	* @return string the hash
	*/
	protected function mock_link_hash($link_name)
	{
		$this->get_db();

		$sql = "SELECT user_form_salt
			FROM phpbb_users
			WHERE username = 'admin'";
		$result = $this->db->sql_query($sql);
		$user_form_salt = $this->db->sql_fetchfield('user_form_salt');
		$this->db->sql_freeresult($result);

		return substr(sha1($user_form_salt . $link_name), 0, 8);
	}
}
