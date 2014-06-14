<?php
/**
*
* @package Board Announcements Extension
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardannouncements\event;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\controller\helper */
	protected $controller_helper;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var Container */
	protected $phpbb_container;

	/**
	* Constructor
	*
	* @param \phpbb\config\config        $config             Config object
	* @param \phpbb\controller\helper    $controller_helper  Controller helper object
	* @param \phpbb\request\request      $request     Request object
	* @param \phpbb\template\template    $template           Template object
	* @param \phpbb\user                 $user               User object
	* @param Container                   $phpbb_container    Service container object
	* @return \phpbb\boardrules\event\listener
	* @access public
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\controller\helper $controller_helper, \phpbb\request\request $request, \phpbb\template\template $template, \phpbb\user $user, Container $phpbb_container)
	{
		$this->config = $config;
		$this->controller_helper = $controller_helper;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
		$this->phpbb_container = $phpbb_container;
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
			'core.user_setup'			=> 'load_language_on_setup',
			'core.page_header_after'	=> 'display_board_announcements',
		);
	}

	/**
	* Load common board announcement language files during user setup
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'phpbb/boardannouncements',
			'lang_set' => 'boardannouncements_common',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	/**
	* Display board announcements
	*
	* @return null
	* @access public
	*/
	public function display_board_announcements($event)
	{
		// Instantiate the config_text object
		$config_text = $this->phpbb_container->get('config_text');

		// Get board announcement data from the config_text object
		$board_announcement_data = $config_text->get_array(array(
			'announcement_text',
			'announcement_uid',
			'announcement_bitfield',
			'announcement_options',
			'announcement_bgcolor',
			'announcement_timestamp',
		));

		// Prepare board announcement message for display
		$announcement_message = generate_text_for_display(
			$board_announcement_data['announcement_text'],
			$board_announcement_data['announcement_uid'],
			$board_announcement_data['announcement_bitfield'],
			$board_announcement_data['announcement_options']
		);

		// Display announcement conditions
		$display_announcement = (
			$this->config['board_announcements_enable'] &&
			$this->user->data['board_announcements_status'] &&
			!$this->request->variable($this->config['cookie_name'] . '_ba_' . $board_announcement_data['announcement_timestamp'], '', true, \phpbb\request\request_interface::COOKIE)
		) ? true : false;

		// Output board announcement to the template
		$this->template->assign_vars(array(
			'S_BOARD_ANNOUNCEMENT'			=> $display_announcement,

			'BOARD_ANNOUNCEMENT'			=> $announcement_message,
			'BOARD_ANNOUNCEMENT_BGCOLOR'	=> $board_announcement_data['announcement_bgcolor'],

			'U_BOARD_ANNOUNCEMENT_CLOSE'	=> $this->controller_helper->route('phpbb_boardannouncements_controller', array(
				'action' => 'close',
				'hash' => generate_link_hash('close_boardannouncement')
			)),
		));
	}
}
