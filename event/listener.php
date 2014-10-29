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

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\config\db_text */
	protected $config_text;

	/** @var \phpbb\controller\helper */
	protected $controller_helper;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\event\dispatcher_interface */
	protected $phpbb_dispatcher;

	/**
	* Constructor
	*
	* @param \phpbb\config\config                 $config             Config object
	* @param \phpbb\config\db_text                $config_text        DB text object
	* @param \phpbb\controller\helper             $controller_helper  Controller helper object
	* @param \phpbb\request\request               $request            Request object
	* @param \phpbb\template\template             $template           Template object
	* @param \phpbb\user                          $user               User object
	* @param \phpbb\event\dispatcher_interface    $phpbb_dispatcher   Event dispatcher
	* @return \phpbb\boardrules\event\listener
	* @access public
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\config\db_text $config_text, \phpbb\controller\helper $controller_helper, \phpbb\request\request $request, \phpbb\template\template $template, \phpbb\user $user, \phpbb\event\dispatcher_interface $phpbb_dispatcher)
	{
		$this->config = $config;
		$this->config_text = $config_text;
		$this->controller_helper = $controller_helper;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
		$this->dispatcher = $phpbb_dispatcher;
	}

	/**
	* Assign functions defined in this class to event listeners in the core
	*
	* @return array
	* @static
	* @access public
	*/
	static public function getSubscribedEvents()
	{
		return array(
			'core.page_header_after'	=> 'display_board_announcements',
		);
	}

	/**
	* Display board announcements
	*
	* @return null
	* @access public
	*/
	public function display_board_announcements($event)
	{
		// Get board announcement data from the config_text object
		$board_announcement_data = $this->config_text->get_array(array(
			'announcement_text',
			'announcement_uid',
			'announcement_bitfield',
			'announcement_options',
			'announcement_bgcolor',
			'announcement_timestamp',
		));

		// Get announcement cookie if one exists
		$cookie = $this->request->variable($this->config['cookie_name'] . '_baid', '', true, \phpbb\request\request_interface::COOKIE);

		// Do not continue if announcement has been disabled or dismissed
		if (!$this->config['board_announcements_enable'] || !$this->user->data['board_announcements_status'] || $cookie == $board_announcement_data['announcement_timestamp'])
		{
			return;
		}

		/**
		* Event to display announcement content
		*
		* @event phpbb.announcement.modify_content_for_display
		* @var string announcement_text     Announcement content
		* @var bool   content_html_enabled  Is HTML allowed in page content
		* @since 1.0.0
		*/
		$announcement_text = $board_announcement_data['announcement_text'];
		$content_html_enabled = false;
		$vars = array('announcement_text', 'content_html_enabled');
		extract($this->dispatcher->trigger_event('phpbb.announcement.modify_content_for_display', compact($vars)));

		// Prepare board announcement message for display
		$announcement_message = ($content_html_enabled) ? $announcement_text : generate_text_for_display(
			$board_announcement_data['announcement_text'],
			$board_announcement_data['announcement_uid'],
			$board_announcement_data['announcement_bitfield'],
			$board_announcement_data['announcement_options']
		);

		// Add board announcements language file
		$this->user->add_lang_ext('phpbb/boardannouncements', 'boardannouncements');

		// Output board announcement to the template
		$this->template->assign_vars(array(
			'S_BOARD_ANNOUNCEMENT'			=> true,

			'BOARD_ANNOUNCEMENT'			=> $announcement_message,
			'BOARD_ANNOUNCEMENT_BGCOLOR'	=> $board_announcement_data['announcement_bgcolor'],

			'U_BOARD_ANNOUNCEMENT_CLOSE'	=> $this->controller_helper->route('phpbb_boardannouncements_controller', array(
				'hash' => generate_link_hash('close_boardannouncement')
			)),
		));
	}
}
