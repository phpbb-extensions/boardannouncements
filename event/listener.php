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

use phpbb\boardannouncements\ext;
use phpbb\boardannouncements\manager\manager;
use phpbb\config\config;
use phpbb\controller\helper;
use phpbb\language\language;
use phpbb\request\request;
use phpbb\boardannouncements\service\visibility;
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
	protected $visibility;

	/** @var int $location */
	protected $location;

	/**
	 * Constructor
	 *
	 * @param manager $manager Board announcements manager object
	 * @param config $config Config object
	 * @param helper $controller_helper Controller helper object
	 * @param language $language Language object
	 * @param request $request Request object
	 * @param template $template Template object
	 * @param user $user User object
	 * @param string $php_ext PHP extension
	 * @access public
	 */
	public function __construct(manager $manager, config $config, helper $controller_helper, language $language, request $request, template $template, user $user, $php_ext, visibility $visibility)
	{
		$this->manager = $manager;
		$this->config = $config;
		$this->controller_helper = $controller_helper;
		$this->language = $language;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
		$this->visibility = $visibility;
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
			'core.posting_modify_row_data' => 'set_posting_location',
		];
	}

	/**
	 * Display board announcements
	 *
	 * @param \phpbb\event\data $event Event data
	 * @return void
	 * @access public
	 */
	public function display_board_announcements($event)
	{
		// Do not continue if board announcements are disabled
		if (!$this->config['board_announcements_enable'])
		{
			return;
		}

		// Add board announcements language file
		$this->language->add_lang('boardannouncements', 'phpbb/boardannouncements');

		$this->get_current_location($event);

		$board_announcements_data = $this->manager->get_announcements();

		foreach ($board_announcements_data as $data)
		{
			if (!$this->visibility->is_visible($data, $this->location))
			{
				continue;
			}

			$tone = in_array($data['announcement_tone'], ext::TONES, true) ? $data['announcement_tone'] : 'info';

			// Output board announcement to the template
			$this->template->assign_block_vars('board_announcements', [
				'BOARD_ANNOUNCEMENT_ID'			=> $data['announcement_id'],
				'BOARD_ANNOUNCEMENT_TITLE'		=> $data['announcement_title'],
				'BOARD_ANNOUNCEMENT_TONE'		=> $tone,
				'S_BOARD_ANNOUNCEMENT_DISMISS'	=> (bool) $data['announcement_dismissable'],
				'BOARD_ANNOUNCEMENT'			=> generate_text_for_display($data['announcement_text'], $data['announcement_uid'], $data['announcement_bitfield'], $data['announcement_flags']),
				'BOARD_ANNOUNCEMENT_BGCOLOR'	=> $data['announcement_bgcolor'],
				'BOARD_ANNOUNCEMENT_TEXTCOLOR'	=> $this->contrast_color($data['announcement_bgcolor']),
				'BOARD_ANNOUNCEMENT_LOCATION'	=> $this->location,
				'U_BOARD_ANNOUNCEMENT_CLOSE'	=> $this->controller_helper->route('phpbb_boardannouncements_controller', [
					'id'		=> (int) $data['announcement_id'],
					'hash'		=> generate_link_hash('close_boardannouncement' . $data['announcement_id']),
					'location'	=> $this->location,
				]),
			]);
		}
	}

	protected function contrast_color($hex)
	{
		if (!preg_match('/\A[0-9a-f]{6}\z/i', $hex))
		{
			return '';
		}
		$channels = [hexdec(substr($hex, 0, 2)), hexdec(substr($hex, 2, 2)), hexdec(substr($hex, 4, 2))];
		foreach ($channels as &$channel)
		{
			$channel /= 255;
			$channel = $channel <= 0.04045 ? $channel / 12.92 : pow(($channel + 0.055) / 1.055, 2.4);
		}
		$luminance = 0.2126 * $channels[0] + 0.7152 * $channels[1] + 0.0722 * $channels[2];
		return $luminance > 0.179 ? '111111' : 'ffffff';
	}

	/**
	 * Store the forum resolved by posting.php
	 *
	 * @param \phpbb\event\data $event Event data
	 * @return void
	 * @access public
	 */
	public function set_posting_location($event)
	{
		$this->location = (int) $event['forum_id'];
	}

	/**
	 * Get the current location, board index or a forum_id
	 *
	 * @param \phpbb\event\data|null $event Event data
	 * @return int
	 */
	protected function get_current_location($event = null)
	{
		if ($event === null)
		{
			return $this->location ?? 0;
		}

		if ($this->user->page['page_name'] === "index.$this->php_ext")
		{
			return $this->location = ext::INDEX_ONLY;
		}

		if ($event['item'] !== 'forum')
		{
			return $this->location = 0;
		}

		$location = (int) $event['item_id'] ?: $this->request->variable('f', 0);

		return $location ? ($this->location = $location) : ($this->location ?? 0);
	}
}
