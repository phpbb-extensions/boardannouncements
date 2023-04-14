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
	 */
	protected static function setup_extensions()
	{
		return ['phpbb/boardannouncements'];
	}

	protected function setUp(): void
	{
		parent::setUp();
		$this->add_lang_ext('phpbb/boardannouncements', ['boardannouncements_acp', 'info_acp_board_announcements']);
	}

	/**
	 * Test board announcement ACP page and save settings
	 */
	public function test_set_acp_settings()
	{
		$this->login();
		$this->admin_login();

		$crawler = self::request('GET', 'adm/index.php?i=\phpbb\boardannouncements\acp\board_announcements_module&mode=settings&sid=' . $this->sid);
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_ENABLE_ALL', $crawler->text());

		// Enable announcements
		$form = $crawler->selectButton($this->lang('SUBMIT'))->form();
		$values = ['board_announcements_enable_all' => true];
		$form->setValues($values);
		$crawler = self::submit($form);
		$this->assertContainsLang('CONFIG_UPDATED', $crawler->text());

		// Load Add page
		$crawler = self::request('GET', 'adm/index.php?i=\phpbb\boardannouncements\acp\board_announcements_module&mode=settings&action=add&sid=' . $this->sid);

		// Test that our settings fields are found
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_ENABLE', $crawler->text());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_INDEX_ONLY', $crawler->text());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_DISMISS', $crawler->text());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_USERS', $crawler->text());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_DESC', $crawler->text());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_EXPIRY', $crawler->text());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_BGCOLOR', $crawler->text());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_TEXT', $crawler->text());

		// Set some form values
		$form = $crawler->selectButton($this->lang('SUBMIT'))->form();
		$values = [
			'board_announcements_enabled'		=> true,
			'board_announcements_index_only'	=> true,
			'board_announcements_users'			=> 0,
			'board_announcements_dismiss'		=> true,
			'board_announcements_bgcolor'		=> 'ff0000',
			'board_announcements_description'	=> 'Test announcement',
			'board_announcements_text'			=> 'This is a board announcement test.',
		];
		$form->setValues($values);

		// Submit form and test success
		$crawler = self::submit($form);
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_UPDATED', $crawler->text());

		// Confirm the log entry has been added correctly
		$crawler = self::request('GET', 'adm/index.php?i=acp_logs&mode=admin&sid=' . $this->sid);
		self::assertStringContainsString(strip_tags($this->lang('BOARD_ANNOUNCEMENTS_CREATED_LOG', $values['board_announcements_description'])), $crawler->text());

		// Confirm ACP page shows added announcement
		$crawler = self::request('GET', 'adm/index.php?i=\phpbb\boardannouncements\acp\board_announcements_module&mode=settings&sid=' . $this->sid);
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_ENABLE_ALL', $crawler->text());
		$this->assertStringContainsString($values['board_announcements_description'], $crawler->text());
	}

	/**
	 * Test loading the board announcement as a user
	 */
	public function test_view_as_user()
	{
		$this->login();
		$crawler = self::request('GET', 'index.php?sid=' . $this->sid);
		self::assertStringContainsString('This is a board announcement test.', $crawler->filter('#phpbb_announcement_1')->text());
	}

	/**
	 * Test board announcement displays on index only (as configured in test_set_acp_settings)
	 */
	public function test_view_off_index()
	{
		$this->login();
		$crawler = self::request('GET', 'memberlist.php?sid=' . $this->sid);
		self::assertCount(0, $crawler->filter('#phpbb_announcement_1'));
	}

	/**
	 * Test loading the board announcement as a guest
	 */
	public function test_view_as_guest()
	{
		$crawler = self::request('GET', 'index.php?sid=' . $this->sid);
		self::assertStringContainsString($this->lang('LOGIN'), $crawler->filter('.navbar')->text());
		self::assertStringContainsString('This is a board announcement test.', $crawler->filter('#phpbb_announcement_1')->text());
	}

	/**
	 * Test closing the board announcement failure
	 */
	public function test_close_announcement_fail()
	{
		$this->login();

		// Wrong ID
		$crawler = self::request('GET', 'app.php/boardannouncements/close/0?hash=' . $this->mock_link_hash('close_boardannouncement') . '&sid=' . $this->sid, [], false);
		self::assert_response_status_code(403);
		$this->assertContainsLang('NO_AUTH_OPERATION', $crawler->text());

		// Wrong hash
		$crawler = self::request('GET', 'app.php/boardannouncements/close/1?hash=wrong&sid=' . $this->sid, [], false);
		self::assert_response_status_code(403);
		$this->assertContainsLang('NO_AUTH_OPERATION', $crawler->text());

		// No hash
		$crawler = self::request('GET', 'app.php/boardannouncements/close/1?sid=' . $this->sid, [], false);
		self::assert_response_status_code(403);
		$this->assertContainsLang('NO_AUTH_OPERATION', $crawler->text());
	}

	/**
	 * Test closing the board announcement
	 */
	public function test_close_announcement()
	{
		$this->login();

		self::request('GET', 'app.php/boardannouncements/close/1?hash=' . $this->mock_link_hash('close_boardannouncement') . '&sid=' . $this->sid);
		$crawler = self::request('GET', 'index.php?sid=' . $this->sid);
		self::assertCount(0, $crawler->filter('#phpbb_announcement_1'));
	}

	/**
	 * Create a link hash for the user 'admin'
	 *
	 * @param string $link_name The name of the link
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
