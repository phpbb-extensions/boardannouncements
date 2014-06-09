<?php
/**
*
* @package Board Announcements Extension
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
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

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/**
	* Constructor
	*
	* @param \phpbb\config\config        $config             Config object
	* @param \phpbb\template\template    $template           Template object
	* @param \phpbb\user                 $user               User object
	* @return \phpbb\boardrules\event\listener
	* @access public
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\template\template $template, \phpbb\user $user)
	{
		$this->config = $config;
		$this->template = $template;
		$this->user = $user;
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
	* @todo: 1. Update the link used for closing the announcement
	*        2. Do not use global phpbb_container
	*/
	public function display_board_announcements()
	{
		global $phpbb_container;

		// Instantiate the config_text object
		$config_text = $phpbb_container->get('config_text');

		// Get board announcement data from the config_text object
		$board_announcement_data = $config_text->get_array(array(
			'announcement_text',
			'announcement_uid',
			'announcement_bitfield',
			'announcement_options',
			'announcement_color',
		));

		// Prepare board announcement message for display
		$announcement_message = generate_text_for_display(
			$board_announcement_data['announcement_text'],
			$board_announcement_data['announcement_uid'],
			$board_announcement_data['announcement_bitfield'],
			$board_announcement_data['announcement_options']
		);

		// Output board announcement to the template
		$this->template->assign_vars(array(
			'S_BOARD_ANNOUNCEMENT'			=> ($this->config['board_announcements_enable'] && $this->user->data['board_announcements_status']) ? true : false,

			'BOARD_ANNOUNCEMENT'			=> $announcement_message,
			'BOARD_ANNOUNCEMENT_COLOR'		=> $board_announcement_data['announcement_color'],

			'U_BOARD_ANNOUNCEMENT_CLOSE'	=> '#', // TBD eg: app.php/announcement/close
		));
	}
}
