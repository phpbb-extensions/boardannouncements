<?php
/**
 *
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2023 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\boardannouncements\controller;

use phpbb\boardannouncements\ext;
use phpbb\boardannouncements\manager\manager;
use phpbb\config\config;
use phpbb\controller\helper;
use phpbb\language\language;
use phpbb\log\log;
use phpbb\request\request;
use phpbb\template\template;
use phpbb\user;

class acp_controller
{
	/** @var manager */
	protected $manager;

	/** @var config */
	protected $config;

	/** @var helper */
	protected $controller_helper;

	/** @var language */
	protected $language;

	/** @var log */
	protected $log;

	/** @var request */
	protected $request;

	/** @var template */
	protected $template;

	/** @var user */
	protected $user;

	/** @var string */
	protected $phpbb_root_path;

	/** @var string */
	protected $php_ext;

	/** @var string */
	protected $u_action;

	/**
	 * Constructor
	 *
	 * @param manager $manager
	 * @param config $config
	 * @param helper $controller_helper
	 * @param language $language
	 * @param log $log
	 * @param request $request
	 * @param template $template
	 * @param user $user
	 * @param $phpbb_root_path
	 * @param $php_ext
	 */
	public function __construct(manager $manager, config $config, helper $controller_helper, language $language, log $log, request $request, template $template, user $user, $phpbb_root_path, $php_ext)
	{
		$this->manager = $manager;
		$this->config = $config;
		$this->controller_helper = $controller_helper;
		$this->language = $language;
		$this->log = $log;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
		$this->phpbb_root_path = $phpbb_root_path;
		$this->php_ext = $php_ext;

		$this->language->add_lang('posting');
		$this->language->add_lang( 'boardannouncements_acp', 'phpbb/boardannouncements');
	}

	/**
	 * Set page url
	 *
	 * @param	string	$u_action	Custom form action
	 * @return	void
	 */
	public function set_page_url($u_action)
	{
		$this->u_action = $u_action;
	}

	/**
	 * Handle user request for management mode
	 *
	 * @return	void
	 */
	public function mode_manage()
	{
		// Trigger specific action
		$action = $this->request->variable('action', '');
		if (in_array($action, ['add', 'delete', 'move', 'settings']))
		{
			$this->{'action_' . $action}();
		}
		else
		{
			// Otherwise default to this
			$this->list_announcements();
		}
	}

	/**
	 * Generate a list of all board announcements for the ACP
	 *
	 * @return void
	 */
	protected function list_announcements()
	{
		foreach ($this->manager->get_announcements() as $row)
		{
			$enabled = (int) $row['announcement_enabled'];
			$expired = (int) $row['announcement_expiry'] > 0 && (int) $row['announcement_expiry'] < time();

			// if an enabled ad has expired, let's disable it now
			if ($expired && $enabled)
			{
				$enabled = $this->manager->disable_announcement($row['announcement_id']);
			}

			$this->template->assign_block_vars('announcements' , [
				'DESCRIPTION'  => $row['announcement_description'],
				'USERS'        => $row['announcement_users'],
				'CREATED_DATE' => $row['announcement_timestamp'],
				'EXPIRY_DATE'  => $row['announcement_expiry'],
				'S_EXPIRED'    => $expired,
				'S_ENABLED'    => $enabled,
				'LOCATIONS'    => $this->manager->decode_json($row['announcement_locations']),
				'U_EDIT'       => $this->u_action . '&amp;action=add&amp;id=' . $row['announcement_id'],
				'U_DELETE'     => $this->u_action . '&amp;action=delete&amp;id=' . $row['announcement_id'],
				'U_MOVE_UP'    => $this->u_action . '&amp;action=move&amp;id=' . $row['announcement_id'] . '&amp;dir=up&amp;hash=' . generate_link_hash('up' . $row['announcement_id']),
				'U_MOVE_DOWN'  => $this->u_action . '&amp;action=move&amp;id=' . $row['announcement_id'] . '&amp;dir=down&amp;hash=' . generate_link_hash('down' . $row['announcement_id']),
			]);
		}

		// Set output vars for display in the template
		$this->template->assign_vars([
			'U_ACTION'							=> $this->u_action,
			'U_ACTION_ADD'						=> $this->u_action . '&amp;action=add',
			'BOARD_ANNOUNCEMENTS_ENABLED_ALL'	=> $this->config['board_announcements_enable'],
		]);

		add_form_key('board_announcement_settings');
	}

	/**
	 * Add, update and preview an announcement
	 *
	 * @return void
	 */
	protected function action_add()
	{
		// Define the name of the form for use as a form key
		$form_name = 'add_board_announcements';
		add_form_key($form_name);

		// Set an empty error array
		$errors = [];

		// Include files needed for displaying BBCodes
		if (!function_exists('display_custom_bbcodes'))
		{
			include $this->phpbb_root_path . 'includes/functions_display.' . $this->php_ext;
		}

		// Get board announcement data from the database if it already exists
		$data = $this->manager->announcement_columns();
		$id = $this->request->variable('id', 0);
		if ($id)
		{
			$data = $this->manager->get_announcement($id);
		}

		// If form is submitted or previewed
		$submit  = $this->request->is_set_post('submit');
		$preview = $this->request->is_set_post('preview');
		if ($submit || $preview)
		{
			// Test if form key is valid
			if (!check_form_key($form_name))
			{
				$errors[] = $this->language->lang('FORM_INVALID');
			}

			// Get new announcement values from the form
			$data['announcement_timestamp']	= time();
			$data['announcement_text'] = $this->request->variable('board_announcements_text', '', true);
			$data['announcement_description'] = $this->request->variable('board_announcements_description', '', true);
			$data['announcement_bgcolor'] = $this->request->variable('board_announcements_bgcolor', '', true);
			$data['announcement_enabled'] = $this->request->variable('board_announcements_enabled', true);
			$data['announcement_users'] = $this->request->variable('board_announcements_users', ext::ALL);
			$data['announcement_locations'] = $this->request->variable('board_announcements_locations', [0]);
			$data['announcement_dismissable'] = $this->request->variable('board_announcements_dismiss', true);
			$data['announcement_expiry'] = $this->request->variable('board_announcements_expiry', '');

			if ($data['announcement_text'] === '')
			{
				$errors[] = $this->language->lang('BOARD_ANNOUNCEMENTS_TEXT_INVALID');
			}

			// Special handling for the expiration date, convert from date string to timestamp
			if ($data['announcement_expiry'] !== '')
			{
				$data['announcement_expiry'] = $this->user->get_timestamp_from_format(ext::DATE_FORMAT, $data['announcement_expiry']);
				if ($data['announcement_expiry'] < time())
				{
					$errors[] = $this->language->lang('BOARD_ANNOUNCEMENTS_EXPIRY_INVALID');
				}
			}
			else
			{
				$data['announcement_expiry'] = 0;
			}

			// Locations array should be json encoded for storage in the DB
			$data['announcement_locations'] = json_encode($data['announcement_locations']);

			// Prepare announcement text for storage
			generate_text_for_storage(
				$data['announcement_text'],
				$data['announcement_uid'],
				$data['announcement_bitfield'],
				$data['announcement_flags'],
				!$this->request->variable('disable_bbcode', false),
				!$this->request->variable('disable_magic_url', false),
				!$this->request->variable('disable_smilies', false)
			);

			// Store the announcement text and settings if submitted with no errors
			if ($submit && empty($errors))
			{
				if ($id)
				{
					$this->manager->update_announcement($id, $data);
					$this->log_change('BOARD_ANNOUNCEMENTS_UPDATED_LOG', $data['announcement_description']);
				}
				else
				{
					$this->manager->save_announcement($data);
					$this->log_change('BOARD_ANNOUNCEMENTS_CREATED_LOG', $data['announcement_description']);
				}

				// Output message to user for the announcement update
				$this->success('BOARD_ANNOUNCEMENTS_UPDATED');
			}
		}

		// Prepare a fresh announcement preview
		$announcement_text_preview = $id || $preview ? generate_text_for_display($data['announcement_text'], $data['announcement_uid'], $data['announcement_bitfield'], $data['announcement_flags']) : '';

		// Prepare the announcement text for editing inside the text box
		$announcement_text_edit = generate_text_for_edit($data['announcement_text'], $data['announcement_uid'], $data['announcement_flags']);

		// Output data to the template
		$this->template->assign_vars([
			'ERRORS'						=> implode('<br>', $errors),
			'BOARD_ANNOUNCEMENTS_ENABLED'	=> $data['announcement_enabled'],
			'BOARD_ANNOUNCEMENTS_DISMISS'	=> $data['announcement_dismissable'],
			'BOARD_ANNOUNCEMENTS_DESC'		=> $data['announcement_description'],
			'BOARD_ANNOUNCEMENTS_TEXT'		=> $announcement_text_edit['text'],
			'BOARD_ANNOUNCEMENTS_PREVIEW'	=> $announcement_text_preview,
			'BOARD_ANNOUNCEMENTS_EXPIRY'	=> $data['announcement_expiry'] ? $this->user->format_date($data['announcement_expiry'], ext::DATE_FORMAT) : '',
			'BOARD_ANNOUNCEMENTS_BGCOLOR'	=> $data['announcement_bgcolor'],

			'BOARD_ANNOUNCEMENTS_LOCATIONS'	=> $this->get_location_options($data['announcement_locations']),

			'S_BOARD_ANNOUNCEMENTS_USERS'	=> build_select([
				ext::ALL		=> 'BOARD_ANNOUNCEMENTS_EVERYONE',
				ext::MEMBERS	=> 'G_REGISTERED',
				ext::GUESTS		=> 'G_GUESTS',
			], $data['announcement_users']),

			'S_BBCODE_DISABLE_CHECKED'		=> !$announcement_text_edit['allow_bbcode'],
			'S_SMILIES_DISABLE_CHECKED'		=> !$announcement_text_edit['allow_smilies'],
			'S_MAGIC_URL_DISABLE_CHECKED'	=> !$announcement_text_edit['allow_urls'],

			'BBCODE_STATUS'			=> $this->language->lang('BBCODE_IS_ON', '<a href="' . $this->controller_helper->route('phpbb_help_bbcode_controller') . '">', '</a>'),
			'SMILIES_STATUS'		=> $this->language->lang('SMILIES_ARE_ON'),
			'IMG_STATUS'			=> $this->language->lang('IMAGES_ARE_ON'),
			'URL_STATUS'			=> $this->language->lang('URL_IS_ON'),

			'S_BBCODE_ALLOWED'		=> true,
			'S_SMILIES_ALLOWED'		=> true,
			'S_BBCODE_IMG'			=> true,
			'S_LINKS_ALLOWED'		=> true,
			'S_ADD_ANNOUNCEMENT'	=> true,

			'PICKER_DATE_FORMAT'	=> ext::DATE_FORMAT,

			'U_BACK'				=> $this->u_action,
			'U_ACTION'				=> $this->u_action . '&amp;action=add' . ($id ? '&amp;id=' . (int) $id : ''),
		]);

		// Build custom bbcodes array
		display_custom_bbcodes();
	}

	/**
	 * Delete an announcement
	 *
	 * @return void
	 */
	protected function action_delete()
	{
		$id = $this->request->variable('id', 0);
		if (confirm_box(true))
		{
			// Get announcement description for logs
			$description = $this->manager->get_announcement_data($id, 'announcement_description');

			// Delete announcement
			$success = $this->manager->delete_announcement($id);

			// Only notify user on error or if not ajax
			if (!$success)
			{
				$this->error('BOARD_ANNOUNCEMENTS_DELETE_ERROR');
			}
			else
			{
				$this->log_change('BOARD_ANNOUNCEMENTS_DELETED_LOG', $description);

				if (!$this->request->is_ajax())
				{
					$this->success('BOARD_ANNOUNCEMENTS_DELETE_SUCCESS');
				}
			}
		}
		else
		{
			confirm_box(false, $this->language->lang('CONFIRM_OPERATION'), build_hidden_fields([
				'id'     => $id,
				'i'      => $this->request->variable('i', ''),
				'mode'   => $this->request->variable('mode', ''),
				'action' => 'delete',
			]));

			// When you don't confirm deleting action
			$this->list_announcements();
		}
	}

	/**
	 * Move an announcement up or down
	 *
	 * @return void
	 */
	protected function action_move()
	{
		$id = $this->request->variable('id', 0);
		$dir = $this->request->variable('dir', '');

		if (!$this->check_hash($dir . $id))
		{
			$this->error('FORM_INVALID');
		}

		try
		{
			$this->manager->move_announcement($id, $dir);
		}
		catch (\OutOfBoundsException $e)
		{
			$this->error($e->getMessage());
		}

		if ($this->request->is_ajax())
		{
			$json_response = new \phpbb\json_response;
			$json_response->send(['success' => true]);
		}
	}

	/**
	 * Submit settings
	 *
	 * @return void
	 */
	protected function action_settings()
	{
		if (!check_form_key('board_announcement_settings'))
		{
			$this->error('FORM_INVALID');
		}

		$this->config->set('board_announcements_enable', $this->request->variable('board_announcements_enable_all', 0));

		$this->success('CONFIG_UPDATED');
	}

	/**
	 * Print success message.
	 *
	 * @param	string	$msg	Message lang key
	 */
	protected function success($msg)
	{
		trigger_error($this->language->lang($msg) . adm_back_link($this->u_action));
	}

	/**
	 * Print error message.
	 *
	 * @param	string	$msg	Message lang key
	 */
	protected function error($msg)
	{
		trigger_error($this->language->lang($msg) . adm_back_link($this->u_action), E_USER_WARNING);
	}

	/**
	 * Check link hash helper
	 *
	 * @param string $hash A hashed string
	 * @return bool True if hash matches, false if not
	 */
	protected function check_hash($hash)
	{
		return check_link_hash($this->request->variable('hash', ''), $hash);
	}

	/**
	 * Add operations to the system log
	 *
	 * @param string $msg
	 * @param string $params
	 * @return void
	 */
	protected function log_change($msg, $params)
	{
		$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, $msg, time(), [$params]);
	}

	/**
	 * Get an array of available locations for the announcement
	 *
	 * @param string $locations
	 * @return array
	 */
	protected function get_location_options($locations)
	{
		$selected = !empty($locations) ? $this->manager->decode_json($locations) : [];

		$forum_list = make_forum_select($selected, false, false, false, false, false, true);

		// Add the index page to the list
		$forum_list[ext::INDEX_ONLY] = [
			'padding'    => '',
			'selected'   => in_array(ext::INDEX_ONLY, $selected),
			'forum_id'   => ext::INDEX_ONLY,
			'forum_name' => $this->language->lang('BOARD_ANNOUNCEMENTS_INDEX_PAGE')
		];

		ksort($forum_list);

		return $forum_list;
	}
}
