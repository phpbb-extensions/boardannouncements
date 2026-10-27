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
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH', $crawler->text());

		// Enable announcements
		$form = $crawler->filter('#board_announcement_settings')->form();
		$values = ['board_announcements_enable_all' => true];
		$form->setValues($values);
		$crawler = self::submit($form);
		$this->assertContainsLang('CONFIG_UPDATED', $crawler->text());

		// Load Add page
		$crawler = self::request('GET', $this->get_acp_page('add'));

		// Test that our settings fields are found
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_STATUS', $crawler->text());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_DISMISS', $crawler->text());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_USERS', $crawler->text());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_LOCATIONS', $crawler->text());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_DESC', $crawler->text());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_EXPIRY', $crawler->text());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_BGCOLOR', $crawler->text());
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_TEXT', $crawler->text());
		self::assertStringContainsString($this->lang('G_REGISTERED'), $crawler->filter('[data-ba-groups]')->text());
		self::assertCount(1, $crawler->filter('[data-ba-groups][hidden]'));
		self::assertSame('false', $crawler->filter('#board_announcements_users')->attr('aria-expanded'));
		self::assertGreaterThan(0, $crawler->filter('#board_announcements_locations input[type="checkbox"][name="board_announcements_locations[]"]')->count());
		self::assertCount(0, $crawler->filter('select[name="board_announcements_locations[]"]'));
		self::assertCount(0, $crawler->filter('[name="board_announcements_placement"], [name="board_announcements_cta_label"], [name="board_announcements_cta_url"]'));
		self::assertCount(1, $crawler->filter('#board_announcements_state option[value="draft"]:selected'));
		self::assertNotSame('', $crawler->filter('#board_announcements_start')->attr('placeholder'));
		self::assertNotSame('', $crawler->filter('#board_announcements_expiry')->attr('placeholder'));
		self::assertNotSame($crawler->filter('#board_announcements_start')->attr('placeholder'), $crawler->filter('#board_announcements_expiry')->attr('placeholder'));
		self::assertCount(1, $crawler->filter('[data-ba-custom-color]:not([hidden])'));
		self::assertSame('color', $crawler->filter('#board_announcements_bgcolor_picker')->attr('type'));
		self::assertSame('#e8f1fa', $crawler->filter('#board_announcements_bgcolor_picker')->attr('value'));
		self::assertNull($crawler->filter('#board_announcements_bgcolor')->attr('pattern'));
		self::assertCount(1, $crawler->filter('[data-ba-custom-color].is-disabled[aria-disabled="true"]'));
		self::assertCount(1, $crawler->filter('#board_announcements_bgcolor_picker[disabled]'));
		self::assertCount(1, $crawler->filter('#board_announcements_bgcolor[disabled]'));

		$values = [
			'board_announcements_state'			=> ext::STATE_PUBLISHED,
			'board_announcements_tone'			=> 'custom',
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
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_EMERGENCY_SWITCH', $crawler->text());
		$this->assertStringContainsString($values['board_announcements_description'], $crawler->filter('table > tbody')->text());
	}

	/**
	 * Test ACP search and status filters preserve module routing.
	 */
	public function test_acp_filters()
	{
		$this->login();
		$this->admin_login();

		$crawler = self::request('GET', $this->get_acp_page());
		$form = $crawler->filter('#board_announcement_filters')->form();
		$form->setValues(['q' => 'board announcement test', 'status' => 'active']);
		$crawler = self::submit($form);
		self::assertStringContainsString('Test announcement', $crawler->filter('.board-announcements-list > tbody')->text());
		self::assertCount(2, $crawler->filter('.ba-action-group .is-disabled'));

		$form = $crawler->filter('#board_announcement_filters')->form();
		$form->setValues(['q' => 'does not exist', 'status' => 'active']);
		$crawler = self::submit($form);
		$this->assertContainsLang('BOARD_ANNOUNCEMENTS_FILTER_EMPTY', $crawler->filter('.ba-empty')->text());

		$crawler = self::request('GET', $this->get_acp_page());
		self::assertStringContainsString('Test announcement', $crawler->filter('.board-announcements-list > tbody')->text());
	}

	/**
	 * Re-show controls keep a fixed action slot and are disabled when dismissal is unavailable.
	 */
	public function test_acp_reshow_action_alignment()
	{
		$this->login();
		$this->admin_login();

		$crawler = self::request('GET', $this->get_acp_page());
		self::assertSame(
			$crawler->filter('input[name="announcement_ids[]"]')->count(),
			$crawler->filter('.ba-show-again-action')->count()
		);
		$row = $crawler->filterXPath('//input[@name="announcement_ids[]" and @value="1"]/ancestor::tr');
		self::assertCount(1, $row->filter('a.ba-show-again-action'));

		$this->db->sql_query('UPDATE phpbb_board_announcements SET announcement_dismissable = 0 WHERE announcement_id = 1');
		try
		{
			$crawler = self::request('GET', $this->get_acp_page());
			$row = $crawler->filterXPath('//input[@name="announcement_ids[]" and @value="1"]/ancestor::tr');
			self::assertCount(1, $row->filter('span.ba-show-again-action.is-disabled[aria-disabled="true"]'));
			self::assertCount(0, $row->filter('a.ba-show-again-action'));
		}
		finally
		{
			$this->db->sql_query('UPDATE phpbb_board_announcements SET announcement_dismissable = 1 WHERE announcement_id = 1');
		}
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
		$hash = $this->mock_link_hash('close_boardannouncement1');

		// Wrong ID
		$crawler = self::request('POST', 'app.php/boardannouncements/close/0?hash=' . $hash . '&sid=' . $this->sid, [], false);
		self::assert_response_status_code(403);
		$this->assertContainsLang('NO_AUTH_OPERATION', $crawler->text());

		// Wrong link hash
		$crawler = self::request('POST', 'app.php/boardannouncements/close/1?hash=wrong&sid=' . $this->sid, [], false);
		self::assert_response_status_code(403);
		$this->assertContainsLang('NO_AUTH_OPERATION', $crawler->text());

		// Missing link hash
		$crawler = self::request('POST', 'app.php/boardannouncements/close/1?sid=' . $this->sid, [], false);
		self::assert_response_status_code(403);
		$this->assertContainsLang('NO_AUTH_OPERATION', $crawler->text());

		// Hash bound to a different announcement
		$crawler = self::request('POST', 'app.php/boardannouncements/close/2?hash=' . $hash . '&sid=' . $this->sid, [], false);
		self::assert_response_status_code(403);
		$this->assertContainsLang('NO_AUTH_OPERATION', $crawler->text());

		// GET requests cannot mutate dismissal state
		self::request('GET', 'app.php/boardannouncements/close/1?hash=' . $hash . '&sid=' . $this->sid, [], false);
		self::assert_response_status_code(405);
	}

	/**
	 * Test closing the board announcement
	 */
	public function test_close_announcement()
	{
		$this->login();

		$crawler = self::request('GET', 'index.php?sid=' . $this->sid);
		$form = $crawler->filter('#phpbb_announcement_1 .phpbb-announcement__dismiss-form')->form();
		self::assertSame('POST', $form->getMethod());

		$hash = $this->mock_link_hash('close_boardannouncement1');
		self::request('POST', 'app.php/boardannouncements/close/1?hash=' . $hash . '&location=' . ext::INDEX_ONLY . '&sid=' . $this->sid);
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
		self::assertCount(1, $crawler->filter('#board_announcements_tone option[value="custom"]:selected'));
		self::assertCount(1, $crawler->filter('.ba-editor-main > .ba-preview-card + [aria-labelledby="ba-content-title"]'));
		self::assertCount(1, $crawler->filter('#ba-preview[data-theme="light"]'));
		self::assertCount(1, $crawler->filter('#board_announcements_locations input[value="-1"]:checked'));
		self::assertSame('#ff0000', $crawler->filter('#board_announcements_bgcolor_picker')->attr('value'));
		self::assertCount(1, $crawler->filter('[data-ba-custom-color]:not(.is-disabled)[aria-disabled="false"]'));
		self::assertCount(0, $crawler->filter('#board_announcements_bgcolor_picker[disabled], #board_announcements_bgcolor[disabled]'));

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

		// Test new-topic page in forum 2
		$crawler = self::request('GET', 'posting.php?mode=post&f=2&sid=' . $this->sid);
		self::assertCount(1, $crawler->filter('#phpbb_announcement_' . $everywhere_id));
		self::assertCount(0, $crawler->filter('#phpbb_announcement_' . $index_id));
		self::assertCount(1, $crawler->filter('#phpbb_announcement_' . $forum_id));
		self::assertCount(1, $crawler->filter('#phpbb_announcement_' . $index_forum_id));

		// Test reply page, where forum ID is not present in query string
		$crawler = self::request('GET', 'posting.php?mode=reply&t=1&sid=' . $this->sid);
		self::assertCount(1, $crawler->filter('#phpbb_announcement_' . $everywhere_id));
		self::assertCount(0, $crawler->filter('#phpbb_announcement_' . $index_id));
		self::assertCount(1, $crawler->filter('#phpbb_announcement_' . $forum_id));
		self::assertCount(1, $crawler->filter('#phpbb_announcement_' . $index_forum_id));

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

		// Test forum ID query fallback
		$crawler = self::request('GET', 'memberlist.php?f=2&amp;sid=' . $this->sid);
		self::assertCount(1, $crawler->filter('#phpbb_announcement_' . $everywhere_id));
		self::assertCount(0, $crawler->filter('#phpbb_announcement_' . $index_id));
		self::assertCount(1, $crawler->filter('#phpbb_announcement_' . $forum_id));
		self::assertCount(1, $crawler->filter('#phpbb_announcement_' . $index_forum_id));
	}

	/**
	 * Test bots receive guest announcements, not registered-user announcements
	 */
	public function test_bot_audience()
	{
		$this->login();
		$this->admin_login();

		$members_id = $this->create_announcement([
			'board_announcements_users' => ext::MEMBERS,
			'board_announcements_description' => 'Members announcement',
		]);
		$guests_id = $this->create_announcement([
			'board_announcements_users' => ext::GUESTS,
			'board_announcements_description' => 'Guests announcement',
		]);

		self::$client->restart();
		self::$client->setHeader('User-Agent', 'Googlebot/2.1 (+http://www.google.com/bot.html)');
		$crawler = self::request('GET', 'index.php');

		self::assertCount(0, $crawler->filter('#phpbb_announcement_' . $members_id));
		self::assertCount(1, $crawler->filter('#phpbb_announcement_' . $guests_id));

		self::$client->restart();
	}

	/**
	 * Test encoded Unicode descriptions are decoded when rendered in the ACP
	 */
	public function test_unicode_description_rendering()
	{
		$this->login();
		$this->admin_login();

		$description = 'Unicode 😀 中文 Кириллица announcement';
		$id = $this->create_announcement([
			'board_announcements_description' => $description,
		]);

		$this->get_db();
		$sql = 'SELECT announcement_description
			FROM phpbb_board_announcements
			WHERE announcement_id = ' . (int) $id;
		$result = $this->db->sql_query($sql);
		$stored_description = $this->db->sql_fetchfield('announcement_description');
		$this->db->sql_freeresult($result);

		$expected_description = strpos($this->db->get_sql_layer(), 'mssql') === 0
			? utf8_encode_ncr($description)
			: utf8_encode_ucr($description);
		self::assertSame($expected_description, $stored_description);

		$crawler = self::request('GET', $this->get_acp_page());
		self::assertStringContainsString($description, $crawler->filter('table > tbody')->text());

		$crawler = self::request('GET', $this->get_acp_page('add', $id));
		self::assertSame($description, $crawler->filter('#board_announcements_description')->attr('value'));

		$crawler = self::request('GET', 'adm/index.php?i=acp_logs&mode=admin&sid=' . $this->sid);
		self::assertStringContainsString(strip_tags($this->lang('BOARD_ANNOUNCEMENTS_CREATED_LOG', $description)), $crawler->text());
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
		return 'adm/index.php?i=\phpbb\boardannouncements\acp\board_announcements_module&mode=settings' . ($action ? "&action=$action"  : '') . ($id ? "&id=$id" : '') . "&sid=$this->sid";
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
			'board_announcements_state'			=> ext::STATE_PUBLISHED,
			'board_announcements_tone'			=> 'info',
			'board_announcements_start'			=> '',
			'board_announcements_dismiss'		=> false,
			'board_announcements_users'			=> 0,
			'board_announcements_locations'		=> [],
			'board_announcements_bgcolor'		=> '',
			'board_announcements_expiry'		=> '',
			'board_announcements_description'	=> 'Test announcement',
			'board_announcements_text'			=> 'This is a board announcement test.',
		], $data);
		$locations = $values['board_announcements_locations'];
		$bgcolor = $values['board_announcements_bgcolor'];
		unset($values['board_announcements_locations'], $values['board_announcements_bgcolor']);
		$form->setValues($values);

		// DomCrawler does not combine checkbox fields sharing an array name.
		$post = $form->getPhpValues();
		$post['board_announcements_locations'] = $locations;
		if ($values['board_announcements_tone'] === 'custom')
		{
			$post['board_announcements_bgcolor'] = $bgcolor;
		}
		$post['submit'] = $this->lang('SUBMIT');
		$crawler = self::request('POST', $this->get_acp_page('add'), $post);
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
