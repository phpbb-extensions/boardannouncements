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

use phpbb\boardannouncements\ext;

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

		$crawler = self::request('GET', $this->get_acp_page());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_ENABLE_ALL', $crawler->text());

		// Enable announcements
		$form = $crawler->selectButton($this->lang('SUBMIT'))->form();
		$values = ['board_announcements_enable_all' => true];
		$form->setValues($values);
		$crawler = self::submit($form);
		$this->assertContainsLang('CONFIG_UPDATED', $crawler->text());

		// Load Add page
		$crawler = self::request('GET', $this->get_acp_page('add'));

		// Test that our settings fields are found
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_ENABLE', $crawler->text());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_DISMISS', $crawler->text());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_USERS', $crawler->text());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_LOCATIONS', $crawler->text());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_DESC', $crawler->text());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_EXPIRY', $crawler->text());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_BGCOLOR', $crawler->text());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_TEXT', $crawler->text());

		$values = [
			'board_announcements_enabled'		=> true,
			'board_announcements_users'			=> 0,
			'board_announcements_dismiss'		=> true,
			'board_announcements_locations'		=> [ext::INDEX_ONLY],
			'board_announcements_bgcolor'		=> 'ff0000',
			'board_announcements_description'	=> 'Test announcement',
			'board_announcements_text'			=> 'This is a board announcement test.',
		];

		$this->create_announcement($values);

		// Confirm the log entry has been added correctly
		$crawler = self::request('GET', 'adm/index.php?i=acp_logs&mode=admin&sid=' . $this->sid);
		self::assertStringContainsString(strip_tags($this->lang('BOARD_ANNOUNCEMENTS_CREATED_LOG', $values['board_announcements_description'])), $crawler->text());

		// Confirm ACP page shows added announcement
		$crawler = self::request('GET', $this->get_acp_page());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_ENABLE_ALL', $crawler->text());
		$this->assertStringContainsString($values['board_announcements_description'], $crawler->filter('table > tbody > tr > td')->text());
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
	 * Test announcement edit, preview and delete
	 */
	public function test_acp_editing()
	{
		$this->login();
		$this->admin_login();

		// Test editing announcement and preview works
		$crawler = self::request('GET', $this->get_acp_page('add', 1));
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_PREVIEW', $crawler->text());
		$this->assertStringContainsString('This is a board announcement test.', $crawler->text());

		// Test deleting the announcement works
		$crawler = self::request('GET', $this->get_acp_page('delete', 1));
		$this->assertContainsLang('CONFIRM_OPERATION', $crawler->text());
		$form_data = ['confirm' => $this->lang('YES')];
		$form = $crawler->selectButton($this->lang('YES'))->form();
		$crawler = self::submit($form, $form_data);
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_DELETE_SUCCESS', $crawler->filter('.successbox')->text());

		// Confirm the log entry has been added correctly
		$crawler = self::request('GET', 'adm/index.php?i=acp_logs&mode=admin&sid=' . $this->sid);
		self::assertStringContainsString(strip_tags($this->lang('BOARD_ANNOUNCEMENTS_DELETED_LOG', 'Test announcement')), $crawler->text());

		// Confirm ACP page shows no more announcements
		$crawler = self::request('GET', $this->get_acp_page());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_EMPTY', $crawler->text());
	}

	/**
	 * Test announcements only show at locations where they are assigned
	 */
	public function test_locations()
	{
		$this->login();
		$this->admin_login();

		// show everywhere
		$everywhere_id = $this->create_announcement([
			'board_announcements_locations'		=> [],
			'board_announcements_description'	=> 'Everywhere announcement',
			'board_announcements_text'			=> 'Everywhere announcement',
		]);

		// show index only
		$index_id = $this->create_announcement([
			'board_announcements_locations'		=> [ext::INDEX_ONLY],
			'board_announcements_description'	=> 'Board index announcement',
			'board_announcements_text'			=> 'Board index announcement',
		]);

		// show in forum 2 only
		$forum_id = $this->create_announcement([
			'board_announcements_locations'		=> [2],
			'board_announcements_description'	=> 'Forum announcement',
			'board_announcements_text'			=> 'Forum announcement',
		]);

		// show in forum 2 and index
		$index_forum_id = $this->create_announcement([
			'board_announcements_locations'		=> [ext::INDEX_ONLY, 2],
			'board_announcements_description'	=> 'Forum and Index announcement',
			'board_announcements_text'			=> 'Forum and Index announcement',
		]);

		// Test board index - see everywhere, index and index+forum
		$crawler = self::request('GET', 'index.php?sid=' . $this->sid);
		self::assertCount(1, $crawler->filter('#phpbb_announcement_' . $everywhere_id));
		self::assertCount(1, $crawler->filter('#phpbb_announcement_' . $index_id));
		self::assertCount(0, $crawler->filter('#phpbb_announcement_' . $forum_id));
		self::assertCount(1, $crawler->filter('#phpbb_announcement_' . $index_forum_id));
		self::assertStringContainsString('Everywhere announcement', $crawler->filter('#phpbb_announcement_' . $everywhere_id)->text());
		self::assertStringContainsString('Board index announcement', $crawler->filter('#phpbb_announcement_' . $index_id)->text());
		self::assertStringContainsString('Forum and Index announcement', $crawler->filter('#phpbb_announcement_' . $index_forum_id)->text());

		// Test forum 2 page - see everywhere, forum and index+forum
		$crawler = self::request('GET', 'viewforum.php?f=2&amp;sid=' . $this->sid);
		self::assertCount(1, $crawler->filter('#phpbb_announcement_' . $everywhere_id));
		self::assertCount(0, $crawler->filter('#phpbb_announcement_' . $index_id));
		self::assertCount(1, $crawler->filter('#phpbb_announcement_' . $forum_id));
		self::assertCount(1, $crawler->filter('#phpbb_announcement_' . $index_forum_id));
		self::assertStringContainsString('Everywhere announcement', $crawler->filter('#phpbb_announcement_' . $everywhere_id)->text());
		self::assertStringContainsString('Forum announcement', $crawler->filter('#phpbb_announcement_' . $forum_id)->text());
		self::assertStringContainsString('Forum and Index announcement', $crawler->filter('#phpbb_announcement_' . $index_forum_id)->text());

		// Test forum 1 page - see everywhere
		$crawler = self::request('GET', 'viewforum.php?f=1&amp;sid=' . $this->sid);
		self::assertCount(1, $crawler->filter('#phpbb_announcement_' . $everywhere_id));
		self::assertCount(0, $crawler->filter('#phpbb_announcement_' . $index_id));
		self::assertCount(0, $crawler->filter('#phpbb_announcement_' . $forum_id));
		self::assertCount(0, $crawler->filter('#phpbb_announcement_' . $index_forum_id));
		self::assertStringContainsString('Everywhere announcement', $crawler->filter('#phpbb_announcement_' . $everywhere_id)->text());

		// Test FAQ page - see everywhere
		$crawler = self::request('GET', 'viewonline.php?sid=' . $this->sid);
		self::assertCount(1, $crawler->filter('#phpbb_announcement_' . $everywhere_id));
		self::assertCount(0, $crawler->filter('#phpbb_announcement_' . $index_id));
		self::assertCount(0, $crawler->filter('#phpbb_announcement_' . $forum_id));
		self::assertCount(0, $crawler->filter('#phpbb_announcement_' . $index_forum_id));
		self::assertStringContainsString('Everywhere announcement', $crawler->filter('#phpbb_announcement_' . $everywhere_id)->text());
	}

	/**
	 * Get the board announcements ACP page link to crawl
	 *
	 * @param string $action
	 * @param int $id
	 * @return string
	 */
	protected function get_acp_page($action = '', $id = 0)
	{
		return 'adm/index.php?i=-phpbb-boardannouncements-acp-board_announcements_module&mode=settings' . ($action ? "&action=$action"  : '') . ($id ? "&id=$id" : '') . "&sid=$this->sid";
	}

	/**
	 * Create an announcement
	 *
	 * @param array $data
	 * @return int count of announcements created
	 */
	protected function create_announcement($data)
	{
		static $counter = 0;

		// Load Add page
		$crawler = self::request('GET', $this->get_acp_page('add'));

		// Set some form values
		$form = $crawler->selectButton($this->lang('SUBMIT'))->form();
		$values = array_merge([
			'board_announcements_enabled'		=> 1,
			'board_announcements_dismiss'		=> 0,
			'board_announcements_users'			=> 0,
			'board_announcements_locations'		=> [],
			'board_announcements_bgcolor'		=> 'ff0000',
			'board_announcements_expiry'		=> '',
			'board_announcements_description'	=> 'Test announcement',
			'board_announcements_text'			=> 'This is a board announcement test.',
		], $data);
		$form->setValues($values);

		// Submit form and test success
		$crawler = self::submit($form);
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_UPDATED', $crawler->text());

		return ++$counter;
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
