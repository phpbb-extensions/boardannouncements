<?php
/**
*
* @package Board Announcements Extension
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardannouncements\acp;

class board_announcements_module
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var ContainerBuilder */
	protected $phpbb_container;

	/** @var string */
	protected $phpbb_root_path;

	/** @var string */
	protected $php_ext;

	public $u_action;

	public function main($id, $mode)
	{
		global $config, $db, $request, $template, $user, $phpbb_container, $phpbb_root_path, $phpEx;

		$this->config = $config;
		$this->db = $db;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
		$this->phpbb_container = $phpbb_container;
		$this->phpbb_root_path = $phpbb_root_path;
		$this->php_ext = $phpEx;

		// Add the posting lang file needed by BBCodes
		$this->user->add_lang(array('posting'));

		// Load a template from adm/style for our ACP page
		$this->tpl_name = 'board_announcements';

		// Set the page title for our ACP page
		$this->page_title = 'ACP_BOARD_ANNOUNCEMENTS_SETTINGS';

		// Define the name of the form for use as a form key
		$form_name = 'acp_board_announcements';
		add_form_key($form_name);

		// Set an empty error string
		$error = '';

		// Include files needed for displaying BBCodes
		if (!function_exists('display_custom_bbcodes'))
		{
			include($this->phpbb_root_path . 'includes/functions_display.' . $this->php_ext);
		}

		// Instantiate a config_text object
		$config_text = $this->phpbb_container->get('config_text');

		// Get all board announcement data from the config_text table in the database
		$board_announcement_data = $config_text->get_array(array(
			'announcement_text',
			'announcement_uid',
			'announcement_bitfield',
			'announcement_options',
			'announcement_bgcolor',
		));

		// Assign the board announcement data to variables we can play with below
		$announcement_text		= $board_announcement_data['announcement_text'];
		$announcement_uid		= $board_announcement_data['announcement_uid'];
		$announcement_bitfield	= $board_announcement_data['announcement_bitfield'];
		$announcement_options	= $board_announcement_data['announcement_options'];
		$announcement_bgcolor	= $board_announcement_data['announcement_bgcolor'];

		// If form is submitted or previewed
		if ($this->request->is_set_post('submit') || $this->request->is_set_post('preview'))
		{
			// Test if form key is valid
			if (!check_form_key($form_name))
			{
				$error = $this->user->lang('FORM_INVALID');
			}

			// Get new announcement text and bgcolor values from the form
			$announcement_text = $this->request->variable('board_announcements_text', '', true);
			$announcement_bgcolor = $this->request->variable('board_announcements_bgcolor', '', true);

			// Prepare announcement text for storage
			generate_text_for_storage(
				$announcement_text,
				$announcement_uid,
				$announcement_bitfield,
				$announcement_options,
				!$this->request->variable('disable_bbcode', false),
				!$this->request->variable('disable_magic_url', false),
				!$this->request->variable('disable_smilies', false)
			);

			// Store the announcement text and settings if submitted with no errors
			if (empty($error) && $this->request->is_set_post('submit'))
			{
				// Store the config enable/disable state
				$this->config->set('board_announcements_enable', $this->request->variable('board_announcements_enable', false));

				// Store the announcement settings to the config_table in the database
				$config_text->set_array(array(
					'announcement_text'			=> $announcement_text,
					'announcement_uid'			=> $announcement_uid,
					'announcement_bitfield'		=> $announcement_bitfield,
					'announcement_options'		=> $announcement_options,
					'announcement_bgcolor'		=> $announcement_bgcolor,
				));

				// Set the board_announcements_status for all normal users
				// to 1 when an announcement is created, or 0 when announcement is empty
				$announcement_status = (!empty($announcement_text)) ? 1 : 0;
				$sql = 'UPDATE ' . USERS_TABLE . '
					SET board_announcements_status = ' . $announcement_status . '
					WHERE user_type <> ' . USER_IGNORE;
				$this->db->sql_query($sql);

				// Log the announcement update
				$log = $this->phpbb_container->get('log');
				$log->add('admin', $this->user->data['user_id'], $this->user->ip, 'BOARD_ANNOUNCEMENTS_UPDATED');

				// Output message to user for the announcement update
				trigger_error($this->user->lang('BOARD_ANNOUNCEMENTS_UPDATED') . adm_back_link($this->u_action));
			}
		}

		// Prepare a fresh announcement preview
		$announcement_text_preview = '';
		if ($this->request->is_set_post('preview'))
		{
			$announcement_text_preview = generate_text_for_display($announcement_text, $announcement_uid, $announcement_bitfield, $announcement_options);
		}

		// prepare the announcement text for editing inside the textbox
		$announcement_text_edit = generate_text_for_edit($announcement_text, $announcement_uid, $announcement_options);

		// Output data to the template
		$this->template->assign_vars(array(
			'ERRORS'						=> $error,
			'BOARD_ANNOUNCEMENTS_ENABLED'	=> $this->config['board_announcements_enable'],

			'BOARD_ANNOUNCEMENTS_TEXT'		=> $announcement_text_edit['text'],
			'BOARD_ANNOUNCEMENTS_PREVIEW'	=> $announcement_text_preview,

			'BOARD_ANNOUNCEMENTS_BGCOLOR'	=> $announcement_bgcolor,

			'S_BBCODE_DISABLE_CHECKED'		=> !$announcement_text_edit['allow_bbcode'],
			'S_SMILIES_DISABLE_CHECKED'		=> !$announcement_text_edit['allow_smilies'],
			'S_MAGIC_URL_DISABLE_CHECKED'	=> !$announcement_text_edit['allow_urls'],

			'BBCODE_STATUS'			=> $this->user->lang('BBCODE_IS_ON', '<a href="' . append_sid("{$this->phpbb_root_path}faq.$this->php_ext", 'mode=bbcode') . '">', '</a>'),
			'SMILIES_STATUS'		=> $this->user->lang('SMILIES_ARE_ON'),
			'IMG_STATUS'			=> $this->user->lang('IMAGES_ARE_ON'),
			'FLASH_STATUS'			=> $this->user->lang('FLASH_IS_ON'),
			'URL_STATUS'			=> $this->user->lang('URL_IS_ON'),

			'S_BBCODE_ALLOWED'		=> true,
			'S_SMILIES_ALLOWED'		=> true,
			'S_BBCODE_IMG'			=> true,
			'S_BBCODE_FLASH'		=> true,
			'S_LINKS_ALLOWED'		=> true,

			'U_ACTION'				=> $this->u_action,
		));

		// Assigning custom bbcodes
		display_custom_bbcodes();
	}
}
