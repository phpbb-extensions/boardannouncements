<?php
/**
 *
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\boardannouncements\event;

use phpbb\boardannouncements\manager\manager;
use phpbb\config\config;
use phpbb\controller\helper;
use phpbb\language\language;
use phpbb\request\request;
use phpbb\template\template;
use phpbb\user;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event listener
 */
class listener implements EventSubscriberInterface
{
	/** @var manager $manager */
	protected $manager;

	/** @var config $config */
	protected $config;

	/** @var helper $controller_helper */
	protected $controller_helper;

	/** @var language $language */
	protected $language;

	/** @var request $request */
	protected $request;

	/** @var template $template */
	protected $template;

	/** @var user $user */
	protected $user;

	/** @var string $php_ext */
	protected $php_ext;

	/**
	 * Constructor
	 *
	 * @param manager $manager
	 * @param config $config Config object
	 * @param helper $controller_helper Controller helper object
	 * @param language $language Language object
	 * @param request $request Request object
	 * @param template $template Template object
	 * @param user $user User object
	 * @param string $php_ext PHP extension
	 * @access public
	 */
	public function __construct(manager $manager, config $config, helper $controller_helper, language $language, request $request, template $template, user $user, $php_ext)
	{
		$this->manager = $manager;
		$this->config = $config;
		$this->controller_helper = $controller_helper;
		$this->language = $language;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
		$this->php_ext = $php_ext;
	}

	/**
	 * Assign functions defined in this class to event listeners in the core
	 *
	 * @return array
	 * @static
	 * @access public
	 */
	public static function getSubscribedEvents()
	{
		return [
			'core.page_header_after' => 'display_board_announcements',
		];
	}

	/**
	 * Display board announcements
	 *
	 * @return void
	 * @access public
	 */
	public function display_board_announcements()
	{
		// Do not continue if board announcements are disabled
		if (!$this->config['board_announcements_enable'])
		{
			return;
		}

		// Add board announcements language file
		$this->language->add_lang('boardannouncements', 'phpbb/boardannouncements');

		$board_announcements_data = $this->manager->get_visible_announcements($this->user->data['user_id']);

		foreach ($board_announcements_data as $data)
		{
			// Do not continue if announcements are only displayed on the board index, and the user is not currently viewing the board index
			if ($data['announcement_indexonly'] && $this->user->page['page_name'] !== "index.$this->php_ext")
			{
				continue;
			}

			// Do not continue if announcement has been dismissed
			if ($this->request->variable($this->config['cookie_name'] . '_ba_' . $data['announcement_id'], '', true, \phpbb\request\request_interface::COOKIE) == $data['announcement_timestamp'])
			{
				continue;
			}

			// Output board announcement to the template
			$this->template->assign_block_vars('board_announcements', [
				'BOARD_ANNOUNCEMENT_ID'			=> $data['announcement_id'],
				'S_BOARD_ANNOUNCEMENT_DISMISS'	=> (bool) $data['announcement_dismissable'],
				'BOARD_ANNOUNCEMENT'			=> generate_text_for_display($data['announcement_text'], $data['announcement_uid'], $data['announcement_bitfield'], $data['announcement_flags']),
				'BOARD_ANNOUNCEMENT_BGCOLOR'	=> $data['announcement_bgcolor'],
				'U_BOARD_ANNOUNCEMENT_CLOSE'	=> $this->controller_helper->route('phpbb_boardannouncements_controller', [
					'id'	=> (int) $data['announcement_id'],
					'hash'	=> generate_link_hash('close_boardannouncement')
				]),
			]);
		}
	}
}
