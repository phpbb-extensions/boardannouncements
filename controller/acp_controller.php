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
use phpbb\boardannouncements\helper\color;
use phpbb\boardannouncements\manager\manager;
use phpbb\config\config;
use phpbb\controller\helper;
use phpbb\db\driver\driver_interface;
use phpbb\group\helper as group_helper;
use phpbb\json_response;
use phpbb\language\language;
use phpbb\log\log;
use phpbb\request\request;
use phpbb\template\template;
use phpbb\user;

class acp_controller
{
	/** @var manager */
	protected $manager;

	/** @var driver_interface */
	protected $db;

	/** @var config */
	protected $config;

	/** @var group_helper */
	protected $group_helper;

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
	 * @param driver_interface $db
	 * @param config $config
	 * @param group_helper $group_helper
	 * @param helper $controller_helper
	 * @param language $language
	 * @param log $log
	 * @param request $request
	 * @param template $template
	 * @param user $user
	 * @param $phpbb_root_path
	 * @param $php_ext
	 */
	public function __construct(manager $manager, driver_interface $db, config $config, group_helper $group_helper, helper $controller_helper, language $language, log $log, request $request, template $template, user $user, $phpbb_root_path, $php_ext)
	{
		$this->manager = $manager;
		$this->db = $db;
		$this->config = $config;
		$this->group_helper = $group_helper;
		$this->controller_helper = $controller_helper;
		$this->language = $language;
		$this->log = $log;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
		$this->phpbb_root_path = $phpbb_root_path;
		$this->php_ext = $php_ext;

		$this->language->add_lang('posting');
		$this->language->add_lang('boardannouncements', 'phpbb/boardannouncements');
		$this->language->add_lang('boardannouncements_acp', 'phpbb/boardannouncements');
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
	 * @throws \Throwable Any action failure
	 */
	public function mode_manage()
	{
		$actions = [
			'add'		=> [$this, 'action_add'],
			'preview'	=> [$this, 'action_preview'],
			'delete'	=> [$this, 'action_delete'],
			'move'		=> [$this, 'action_move'],
			'settings'	=> [$this, 'action_settings'],
			'archive'	=> [$this, 'action_archive'],
			'reset'		=> [$this, 'action_reset'],
			'duplicate'	=> [$this, 'action_duplicate'],
			'bulk'		=> [$this, 'action_bulk'],
		];
		$action = $this->request->variable('action', '');
		if (isset($actions[$action]))
		{
			$actions[$action]();
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
		$status_filter = $this->request->variable('status', ext::STATUS_ALL);
		$query = trim($this->request->variable('q', '', true));
		$normalized_query = utf8_strtolower($query);
		if (!in_array($status_filter, ext::FILTER_STATUSES, true))
		{
			$status_filter = ext::STATUS_ALL;
		}

		$announcements = array_values($this->manager->get_announcements());
		$announcement_defaults = $this->announcement_defaults();
		$last_index = count($announcements) - 1;
		$filters_active = $status_filter !== ext::STATUS_ALL || $query !== '';
		foreach ($announcements as $index => $row)
		{
			$row += $announcement_defaults;
			$status = $this->get_status($row);
			if ($status_filter !== ext::STATUS_ALL && $status !== $status_filter)
			{
				continue;
			}
			$search_text = utf8_decode_ncr(implode(' ', [
				$row['announcement_description'],
				$row['announcement_title'],
				$row['announcement_text'],
			]));
			$search_text = utf8_strtolower($search_text);
			if ($normalized_query !== '' && strpos($search_text, $normalized_query) === false)
			{
				continue;
			}

			$this->template->assign_block_vars('announcements' , [
				'ID'           => $row['announcement_id'],
				'DESCRIPTION'  => $this->get_announcement_label($row),
				'STATUS'       => $status,
				'TONE'         => $row['announcement_tone'],
				'USERS'        => $row['announcement_users'],
				'CREATED_DATE' => $row['announcement_timestamp'] ? $this->user->format_date($row['announcement_timestamp'], ext::DATE_FORMAT) : '',
				'START_DATE'   => $row['announcement_start'] ? $this->user->format_date($row['announcement_start'], ext::DATE_FORMAT) : '',
				'EXPIRY_DATE'  => $row['announcement_expiry'] ? $this->user->format_date($row['announcement_expiry'], ext::DATE_FORMAT) : '',
				'S_EXPIRED'    => $status === ext::STATUS_EXPIRED,
				'S_ENABLED'    => $status === ext::STATUS_ACTIVE || $status === ext::STATUS_SCHEDULED,
				'S_ARCHIVED'   => $status === ext::STATUS_ARCHIVED,
				'DISMISSABLE'  => (bool) $row['announcement_dismissable'],
				'LOCATIONS'    => $this->manager->decode_json($row['announcement_locations']),
				'S_MOVE_UP_DISABLED' => $filters_active || $index === 0,
				'S_MOVE_DOWN_DISABLED' => $filters_active || $index === $last_index,
				'U_EDIT'       => $this->u_action . '&amp;action=add&amp;id=' . $row['announcement_id'],
				'U_DELETE'     => $this->u_action . '&amp;action=delete&amp;id=' . $row['announcement_id'],
				'U_ARCHIVE'    => $this->u_action . '&amp;action=archive&amp;id=' . $row['announcement_id'] . '&amp;hash=' . generate_link_hash('archive' . $row['announcement_id']),
				'U_RESET'      => $this->u_action . '&amp;action=reset&amp;id=' . $row['announcement_id'] . '&amp;hash=' . generate_link_hash('reset' . $row['announcement_id']),
				'U_DUPLICATE'  => $this->u_action . '&amp;action=duplicate&amp;id=' . $row['announcement_id'] . '&amp;hash=' . generate_link_hash('duplicate' . $row['announcement_id']),
				'U_MOVE_UP'    => $this->u_action . '&amp;action=move&amp;id=' . $row['announcement_id'] . '&amp;dir=up&amp;hash=' . generate_link_hash('up' . $row['announcement_id']),
				'U_MOVE_DOWN'  => $this->u_action . '&amp;action=move&amp;id=' . $row['announcement_id'] . '&amp;dir=down&amp;hash=' . generate_link_hash('down' . $row['announcement_id']),
			]);
		}

		// Set output vars for display in the template
		$this->template->assign_vars([
			'U_ACTION'							=> $this->u_action,
			'U_ACTION_ADD'						=> $this->u_action . '&amp;action=add',
			'BOARD_ANNOUNCEMENTS_ENABLED_ALL'	=> $this->config['board_announcements_enable'],
			'S_STATUS_FILTER' => $status_filter,
			'S_SEARCH_QUERY' => $query,
			'S_FILTERS_ACTIVE' => $filters_active,
		]);

		add_form_key('board_announcement_settings');
	}

	/**
	 * Add, update and preview an announcement
	 *
	 * @return void
	 * @throws \Throwable Any transaction failure
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
		$data = array_replace($this->announcement_defaults(), $this->manager->announcement_columns());
		$id = $this->request->variable('id', 0);
		if ($id)
		{
			$stored_data = $this->manager->get_announcement($id);

			if (!$stored_data)
			{
				$this->error('BOARD_ANNOUNCEMENTS_INVALID_ITEM');
			}
			$data = array_replace($data, $stored_data);
		}
		if ($data['announcement_bgcolor'] !== '')
		{
			$data['announcement_tone'] = ext::TONE_CUSTOM;
		}
		$location_mode = $this->get_location_mode($data['announcement_locations']);
		$selected_groups = $id ? $this->manager->get_announcement_groups($id) : [];

		// If form is submitted
		$submit = $this->request->is_set_post('submit');
		if ($submit)
		{
			// Test if form key is valid
			if (!check_form_key($form_name))
			{
				$errors[] = $this->language->lang('FORM_INVALID');
			}

			// Get new announcement values from the form
			// Store the latest edit time without changing dismissal state.
			$data['announcement_timestamp'] = max(time(), (int) ($data['announcement_timestamp'] ?? 0) + 1);
			$data['announcement_text'] = $this->request->variable('board_announcements_text', '', true);
			$data['announcement_description'] = $this->request->variable('board_announcements_description', '', true);
			$data['announcement_title'] = $this->request->variable('board_announcements_title', '', true);
			$data['announcement_tone'] = $this->request->variable('board_announcements_tone', ext::TONE_INFO);
			$data['announcement_bgcolor'] = $data['announcement_tone'] === ext::TONE_CUSTOM
				? ltrim(trim($this->request->variable('board_announcements_bgcolor', '', true)), '#')
				: '';
			$data['announcement_state'] = $this->request->variable('board_announcements_state', ext::STATUS_DRAFT);
			$data['announcement_enabled'] = $data['announcement_state'] === ext::STATUS_PUBLISHED;
			$data['announcement_users'] = $this->request->variable('board_announcements_users', ext::ALL);
			$selected_groups = $this->request->variable('board_announcements_groups', [0]);
			if ((int) $data['announcement_users'] !== ext::GROUPS)
			{
				$selected_groups = [];
			}
			$location_mode = $this->request->variable('board_announcements_location_mode', 'everywhere');
			$selected_locations = array_values(array_filter(array_map('intval', $this->request->variable('board_announcements_locations', [0]))));
			switch ($location_mode)
			{
				case 'everywhere':
					$data['announcement_locations'] = [];
					$data['announcement_include_children'] = false;
				break;

				case 'index':
					$data['announcement_locations'] = [ext::INDEX_ONLY];
					$data['announcement_include_children'] = false;
				break;

				case 'selected':
					$data['announcement_locations'] = $selected_locations;
					$data['announcement_include_children'] = $this->request->variable('board_announcements_include_children', false);
					if (!$selected_locations)
					{
						$errors[] = $this->language->lang('BOARD_ANNOUNCEMENTS_LOCATIONS_REQUIRED');
					}
				break;

				default:
					$data['announcement_locations'] = [];
					$data['announcement_include_children'] = false;
					$errors[] = $this->language->lang('BOARD_ANNOUNCEMENTS_LOCATION_MODE_INVALID');
			}
			$data['announcement_dismissable'] = $this->request->variable('board_announcements_dismiss', true);
			$data['announcement_start'] = $this->request->variable('board_announcements_start', '');
			$data['announcement_expiry'] = $this->request->variable('board_announcements_expiry', '');
			$data['announcement_updated_at'] = time();
			$data['announcement_updated_by'] = (int) $this->user->data['user_id'];
			if (!$id)
			{
				$data['announcement_created_by'] = (int) $this->user->data['user_id'];
			}

			// MSSQL requires all Unicode to be encoded; other DBMS only require four-byte Unicode.
			$encode_unicode = strpos($this->db->get_sql_layer(), 'mssql') === 0 ? 'utf8_encode_ncr' : 'utf8_encode_ucr';
			foreach (['announcement_description', 'announcement_title'] as $field)
			{
				$data[$field] = $encode_unicode($data[$field]);
			}
			if (utf8_strlen($data['announcement_description']) > 255)
			{
				$errors[] = $this->language->lang('BOARD_ANNOUNCEMENTS_DESC_TOO_LONG');
			}
			if (utf8_strlen($data['announcement_title']) > 255)
			{
				$errors[] = $this->language->lang('BOARD_ANNOUNCEMENTS_TITLE_TOO_LONG');
			}

			if ($data['announcement_bgcolor'] !== '' && !preg_match('/\A[0-9a-f]{6}\z/i', $data['announcement_bgcolor']))
			{
				$errors[] = $this->language->lang('BOARD_ANNOUNCEMENTS_BGCOLOR_INVALID');
			}
			if (!in_array($data['announcement_tone'], ext::TONES, true))
			{
				$errors[] = $this->language->lang('BOARD_ANNOUNCEMENTS_TONE_INVALID');
			}
			if (!in_array($data['announcement_state'], ext::PERSISTED_STATUSES, true))
			{
				$errors[] = $this->language->lang('BOARD_ANNOUNCEMENTS_STATE_INVALID');
			}
			if ((int) $data['announcement_users'] === ext::GROUPS && !array_filter($selected_groups))
			{
				$errors[] = $this->language->lang('BOARD_ANNOUNCEMENTS_GROUPS_REQUIRED');
			}

			$data['announcement_start'] = $this->parse_date($data['announcement_start'], $errors, 'BOARD_ANNOUNCEMENTS_START_INVALID');

			if ($data['announcement_text'] === '')
			{
				$errors[] = $this->language->lang('BOARD_ANNOUNCEMENTS_TEXT_INVALID');
			}

			$expiry = $this->parse_date($data['announcement_expiry'], $errors, 'BOARD_ANNOUNCEMENTS_EXPIRY_INVALID');
			$data['announcement_expiry'] = $expiry;

			if ($expiry)
			{
				$expires_at_or_before_start = $data['announcement_start'] && $expiry <= $data['announcement_start'];
				$published_with_past_expiry = $data['announcement_state'] === ext::STATUS_PUBLISHED && $expiry < time();

				if ($expires_at_or_before_start || $published_with_past_expiry)
				{
					$errors[] = $this->language->lang('BOARD_ANNOUNCEMENTS_EXPIRY_INVALID');
				}
			}

			// Locations array should be json encoded for storage in the DB
			$data['announcement_locations'] = json_encode(array_values(array_filter($data['announcement_locations'])));

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
			if (empty($errors))
			{
				if ($id)
				{
					if (!$this->manager->update_announcement($id, $data, $selected_groups))
					{
						$this->error('BOARD_ANNOUNCEMENTS_INVALID_ITEM');
					}

					$this->log_change('BOARD_ANNOUNCEMENTS_UPDATED_LOG', $this->get_announcement_label($data));
				}
				else
				{
					$this->manager->save_announcement($data, $selected_groups);
					$this->log_change('BOARD_ANNOUNCEMENTS_CREATED_LOG', $this->get_announcement_label($data));
				}

				// Output message to user for the announcement update
				$this->success('BOARD_ANNOUNCEMENTS_UPDATED');
			}
		}

		// Prepare a fresh announcement preview
		$announcement_text_preview = $id ? generate_text_for_display($data['announcement_text'], $data['announcement_uid'], $data['announcement_bitfield'], $data['announcement_flags']) : '';

		// Prepare the announcement text for editing inside the text box
		$announcement_text_edit = generate_text_for_edit($data['announcement_text'], $data['announcement_uid'], $data['announcement_flags']);

		// Output data to the template
		$this->template->assign_vars([
			'ERRORS'						=> implode('<br>', $errors),
			'BOARD_ANNOUNCEMENTS_ENABLED'	=> $data['announcement_enabled'],
			'BOARD_ANNOUNCEMENTS_DISMISS'	=> $data['announcement_dismissable'],
			'BOARD_ANNOUNCEMENTS_DESC'		=> $data['announcement_description'],
			'BOARD_ANNOUNCEMENTS_TITLE'		=> $data['announcement_title'],
			'BOARD_ANNOUNCEMENTS_TEXT'		=> $announcement_text_edit['text'],
			'BOARD_ANNOUNCEMENTS_PREVIEW'	=> $announcement_text_preview,
			'BOARD_ANNOUNCEMENTS_EXPIRY'	=> $data['announcement_expiry'] ? $this->user->format_date($data['announcement_expiry'], ext::DATE_FORMAT) : '',
			'BOARD_ANNOUNCEMENTS_START'		=> $data['announcement_start'] ? $this->user->format_date($data['announcement_start'], ext::DATE_FORMAT) : '',
			'BOARD_ANNOUNCEMENTS_BGCOLOR'	=> $data['announcement_bgcolor'],
			'BOARD_ANNOUNCEMENTS_COLOR_PICKER' => '#' . ($data['announcement_bgcolor'] ?: 'e8f1fa'),
			'BOARD_ANNOUNCEMENTS_TEXTCOLOR' => color::contrast_color($data['announcement_bgcolor']),
			'BOARD_ANNOUNCEMENTS_TONE'		=> $data['announcement_tone'],
			'BOARD_ANNOUNCEMENTS_STATE'		=> $data['announcement_state'],
			'BOARD_ANNOUNCEMENTS_GROUPS'	=> $this->get_group_options((array) $selected_groups),

			'BOARD_ANNOUNCEMENTS_LOCATIONS'	=> $this->get_location_options($data['announcement_locations']),
			'BOARD_ANNOUNCEMENTS_LOCATION_MODE' => $location_mode,
			'BOARD_ANNOUNCEMENTS_INCLUDE_CHILDREN' => $data['announcement_include_children'],

			'S_BOARD_ANNOUNCEMENTS_USERS'	=> build_select([
				ext::ALL		=> 'BOARD_ANNOUNCEMENTS_EVERYONE',
				ext::MEMBERS	=> 'G_REGISTERED',
				ext::GUESTS		=> 'G_GUESTS',
				ext::GROUPS		=> 'BOARD_ANNOUNCEMENTS_SELECTED_GROUPS',
			], $data['announcement_users']),
			'S_BOARD_ANNOUNCEMENTS_GROUPS'	=> (int) $data['announcement_users'] === ext::GROUPS,

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
			'S_EDIT_ANNOUNCEMENT'	=> (bool) $id,

			'START_DATE_PLACEHOLDER' => $this->user->format_date(time(), ext::DATE_FORMAT),
			'EXPIRY_DATE_PLACEHOLDER' => $this->user->format_date(time() + 7 * 86400, ext::DATE_FORMAT),

			'U_BACK'				=> $this->u_action,
			'U_ACTION'				=> $this->u_action . '&amp;action=add' . ($id ? '&amp;id=' . (int) $id : ''),
		]);

		// Build custom bbcodes array
		display_custom_bbcodes();
	}

	/**
	 * Generate an announcement preview without validating or saving announcement settings
	 *
	 * @return void
	 */
	protected function action_preview()
	{
		if (!check_form_key('add_board_announcements'))
		{
			$this->error('FORM_INVALID');
		}

		$text = $this->request->variable('board_announcements_text', '', true);
		$title = $this->request->variable('board_announcements_title', '', true);
		$dismissable = $this->request->variable('board_announcements_dismiss', true);
		$tone = $this->request->variable('board_announcements_tone', ext::TONE_INFO);
		if (!in_array($tone, ext::TONES, true))
		{
			$tone = ext::TONE_INFO;
		}

		$bgcolor = $tone === ext::TONE_CUSTOM
			? ltrim(trim($this->request->variable('board_announcements_bgcolor', '', true)), '#')
			: '';
		if ($bgcolor !== '' && !preg_match('/\A[0-9a-f]{6}\z/i', $bgcolor))
		{
			$bgcolor = '';
		}

		$uid = '';
		$bitfield = '';
		$flags = 0;
		generate_text_for_storage(
			$text,
			$uid,
			$bitfield,
			$flags,
			!$this->request->variable('disable_bbcode', false),
			!$this->request->variable('disable_magic_url', false),
			!$this->request->variable('disable_smilies', false)
		);

		$this->template->assign_vars([
			'BOARD_ANNOUNCEMENTS_PREVIEW' => generate_text_for_display($text, $uid, $bitfield, $flags),
			'BOARD_ANNOUNCEMENTS_TITLE' => $title,
			'BOARD_ANNOUNCEMENTS_DISMISS' => $dismissable,
			'BOARD_ANNOUNCEMENTS_TONE' => $tone,
			'BOARD_ANNOUNCEMENTS_BGCOLOR' => $bgcolor,
			'BOARD_ANNOUNCEMENTS_TEXTCOLOR' => color::contrast_color($bgcolor),
		]);
		$this->template->set_filenames([
			'board_announcements_preview' => '@phpbb_boardannouncements/announcement_preview.html',
		]);

		$json_response = new json_response;
		$json_response->send([
			'success' => true,
			'preview_html' => $this->template->assign_display('board_announcements_preview'),
		]);
	}

	/**
	 * Archive an announcement.
	 *
	 * @return void
	 * @throws \Throwable Any transaction failure
	 */
	protected function action_archive()
	{
		$id = $this->request->variable('id', 0);
		if (!$this->check_hash('archive' . $id) || !$this->manager->update_announcement($id, [
			'announcement_state' => ext::STATUS_ARCHIVED,
			'announcement_enabled' => 0,
			'announcement_updated_at' => time(),
			'announcement_updated_by' => (int) $this->user->data['user_id'],
		]))
		{
			$this->error('FORM_INVALID');
		}
		$this->success('BOARD_ANNOUNCEMENTS_ARCHIVED');
	}

	/**
	 * Reset dismissals so an announcement is shown again.
	 *
	 * @return void
	 * @throws \Throwable Any transaction failure
	 */
	protected function action_reset()
	{
		$id = $this->request->variable('id', 0);
		if (!$this->check_hash('reset' . $id) || !$this->manager->show_announcement_again($id))
		{
			$this->error('FORM_INVALID');
		}
		$this->success('BOARD_ANNOUNCEMENTS_SHOWN_AGAIN');
	}

	/**
	 * Duplicate an announcement as a draft.
	 *
	 * @return void
	 * @throws \Throwable Any transaction failure
	 */
	protected function action_duplicate()
	{
		$id = $this->request->variable('id', 0);
		$data = $this->manager->get_announcement($id);
		if (!$data || !$this->check_hash('duplicate' . $id))
		{
			$this->error('FORM_INVALID');
		}
		unset($data['announcement_id']);
		$description = $data['announcement_description'] ?: $this->language->lang('BOARD_ANNOUNCEMENTS_UNTITLED');
		$data['announcement_description'] = $this->truncate_description_for_storage(
			$this->language->lang('BOARD_ANNOUNCEMENTS_COPY_OF', $description),
			255
		);
		$data['announcement_state'] = ext::STATUS_DRAFT;
		$data['announcement_enabled'] = 0;
		$data['announcement_revision'] = 1;
		$data['announcement_timestamp'] = time();
		$data['announcement_updated_at'] = time();
		$data['announcement_created_by'] = (int) $this->user->data['user_id'];
		$data['announcement_updated_by'] = (int) $this->user->data['user_id'];
		$this->manager->save_announcement($data, $this->manager->get_announcement_groups($id));
		$this->success('BOARD_ANNOUNCEMENTS_DUPLICATED');
	}

	/**
	 * Apply a bulk action to selected announcements.
	 *
	 * @return void
	 * @throws \Throwable Any transaction failure
	 */
	protected function action_bulk()
	{
		if (!check_form_key('board_announcement_settings'))
		{
			$this->error('FORM_INVALID');
		}
		$ids = array_unique(array_filter(array_map('intval', $this->request->variable('announcement_ids', [0]))));
		$bulk_action = $this->request->variable('bulk_action', '');
		if (!$ids || !in_array($bulk_action, ['publish', 'draft', 'archive', 'delete'], true))
		{
			$this->error('FORM_INVALID');
		}
		if ($bulk_action === 'delete' && !confirm_box(true))
		{
			confirm_box(false, $this->language->lang('CONFIRM_OPERATION'), build_hidden_fields([
				'action' => 'bulk',
				'bulk_action' => 'delete',
				'announcement_ids' => $ids,
				'creation_time' => $this->request->variable('creation_time', 0),
				'form_token' => $this->request->variable('form_token', ''),
			]));
			return;
		}
		foreach ($ids as $id)
		{
			if ($bulk_action === 'delete')
			{
				$announcement = $this->manager->get_announcement($id);
				try
				{
					$success = $this->manager->delete_announcement($id);
				}
				catch (\OutOfBoundsException $e)
				{
					continue;
				}
				if ($success)
				{
					$this->log_change('BOARD_ANNOUNCEMENTS_DELETED_LOG', $this->get_announcement_label(array_replace($this->announcement_defaults(), $announcement)));
				}
				continue;
			}
			$state = $bulk_action === 'publish' ? ext::STATUS_PUBLISHED : ($bulk_action === 'archive' ? ext::STATUS_ARCHIVED : ext::STATUS_DRAFT);
			$this->manager->update_announcement($id, [
				'announcement_state' => $state,
				'announcement_enabled' => $state === ext::STATUS_PUBLISHED,
				'announcement_updated_at' => time(),
				'announcement_updated_by' => (int) $this->user->data['user_id'],
			]);
		}
		$this->success('BOARD_ANNOUNCEMENTS_BULK_UPDATED');
	}

	/**
	 * Delete an announcement
	 *
	 * @return void
	 * @throws \Throwable Any transaction failure
	 */
	protected function action_delete()
	{
		$id = $this->request->variable('id', 0);
		if (confirm_box(true))
		{
			// Get announcement data for logs before deletion
			$announcement = $this->manager->get_announcement($id);

			// Delete announcement
			try
			{
				$success = $this->manager->delete_announcement($id);
			}
			catch (\OutOfBoundsException $e)
			{
				$success = false;
			}

			// Report the deletion result to the caller
			if (!$success)
			{
				$this->error('BOARD_ANNOUNCEMENTS_DELETE_ERROR');
			}
			else
			{
				$this->log_change('BOARD_ANNOUNCEMENTS_DELETED_LOG', $this->get_announcement_label(array_replace($this->announcement_defaults(), $announcement)));

				if ($this->request->is_ajax())
				{
					$json_response = new json_response;
					$json_response->send(['success' => true]);
				}
				else
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

			// Return to list when confirmation is canceled or invalid
			$this->list_announcements();
		}
	}

	/**
	 * Move an announcement up or down
	 *
	 * @return void
	 * @throws \RuntimeException When the nested-set lock cannot be acquired
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
			$json_response = new json_response;
			$json_response->send(['success' => true]);
		}

		$this->list_announcements();
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

		$enabled = $this->request->variable('board_announcements_enable_all', 0);
		$this->config->set('board_announcements_enable', $enabled);

		if ($this->request->is_ajax())
		{
			$json_response = new json_response;
			$json_response->send([
				'success' => true,
				'enabled' => (bool) $enabled,
			]);
		}

		$this->success('CONFIG_UPDATED');
	}

	/**
	 * Print success message.
	 *
	 * @param	string	$msg	Message lang key
	 * @return void
	 */
	protected function success($msg)
	{
		trigger_error($this->language->lang($msg) . adm_back_link($this->u_action));
	}

	/**
	 * Print error message.
	 *
	 * @param	string	$msg	Message lang key
	 * @return void
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
	 * @param string $log_operation Log operation language key
	 * @param string $announcement_label Human-readable announcement label
	 * @return void
	 */
	protected function log_change($log_operation, $announcement_label)
	{
		$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, $log_operation, time(), [utf8_encode_ncr($announcement_label)]);
	}

	/**
	 * Get an array of available locations for the announcement
	 *
	 * @param string $locations JSON-encoded selected location identifiers
	 * @return array Available location options
	 */
	protected function get_location_options($locations)
	{
		$selected = !empty($locations) ? $this->manager->decode_json($locations) : [];

		$forum_list = make_forum_select($selected, false, false, false, false, false, true);
		foreach ($forum_list as &$forum)
		{
			$forum['depth'] = substr_count($forum['padding'], '&nbsp; &nbsp;');
		}
		unset($forum);

		// Add the index page to the list
		$forum_list[ext::INDEX_ONLY] = [
			'padding'    => '',
			'depth'      => 0,
			'selected'   => in_array(ext::INDEX_ONLY, $selected),
			'forum_id'   => ext::INDEX_ONLY,
			'forum_name' => $this->language->lang('BOARD_ANNOUNCEMENTS_INDEX_PAGE')
		];

		ksort($forum_list);

		return $forum_list;
	}

	/**
	 * Derive the ACP location mode from stored location identifiers.
	 *
	 * @param string|array $locations Stored location identifiers
	 * @return string Location mode
	 */
	protected function get_location_mode($locations)
	{
		$selected = is_array($locations) ? $locations : (!empty($locations) ? $this->manager->decode_json($locations) : []);
		$selected = array_values(array_filter(array_map('intval', (array) $selected)));

		if (!$selected)
		{
			return 'everywhere';
		}

		return count($selected) === 1 && $selected[0] === ext::INDEX_ONLY ? 'index' : 'selected';
	}

	/**
	 * Derive display status from announcement data.
	 *
	 * @param array $row Announcement data
	 * @return string Announcement status
	 */
	protected function get_status(array $row)
	{
		if (($row['announcement_state'] ?? '') === ext::STATUS_ARCHIVED)
		{
			return ext::STATUS_ARCHIVED;
		}
		if (empty($row['announcement_enabled']) || ($row['announcement_state'] ?? '') === ext::STATUS_DRAFT)
		{
			return ext::STATUS_DRAFT;
		}
		if (!empty($row['announcement_start']) && $row['announcement_start'] > time())
		{
			return ext::STATUS_SCHEDULED;
		}
		if (!empty($row['announcement_expiry']) && $row['announcement_expiry'] <= time())
		{
			return ext::STATUS_EXPIRED;
		}
		return ext::STATUS_ACTIVE;
	}

	/**
	 * Get the announcement label displayed in ACP lists and logs.
	 *
	 * @param array $row Announcement data
	 * @return string Announcement label
	 */
	protected function get_announcement_label(array $row)
	{
		if ($row['announcement_description'] !== '')
		{
			return $row['announcement_description'];
		}
		if ($row['announcement_title'] !== '')
		{
			return $row['announcement_title'];
		}

		$description = $row['announcement_text'];
		strip_bbcode($description, $row['announcement_uid']);
		$description = html_entity_decode(utf8_decode_ncr($description), ENT_COMPAT, 'UTF-8');
		$description = trim(preg_replace('/\s+/u', ' ', $description));
		if ($description === '')
		{
			return $this->language->lang('BOARD_ANNOUNCEMENTS_UNTITLED');
		}

		$truncated = utf8_strlen($description) > 20;
		$description = utf8_htmlspecialchars(utf8_substr($description, 0, 20));

		return $description . ($truncated ? $this->language->lang('ELLIPSIS') : '');
	}

	/**
	 * Truncate an announcement description to its encoded storage limit.
	 *
	 * @param string $description Description text
	 * @param int    $max_length  Maximum stored length
	 * @return string Encoded description
	 */
	protected function truncate_description_for_storage($description, $max_length)
	{
		$description = utf8_decode_ncr($description);
		$encode_unicode = strpos($this->db->get_sql_layer(), 'mssql') === 0 ? 'utf8_encode_ncr' : 'utf8_encode_ucr';
		$encoded = $encode_unicode($description);

		while (utf8_strlen($encoded) > $max_length)
		{
			$description = utf8_substr($description, 0, -1);
			$encoded = $encode_unicode($description);
		}

		return $encoded;
	}

	/**
	 * Parse an ACP date value and collect validation errors.
	 *
	 * @param string $value Date value
	 * @param array  $errors Validation errors
	 * @param string $error_key Language key used when parsing fails
	 * @return int Parsed timestamp, or zero for an empty or invalid value
	 */
	protected function parse_date($value, array &$errors, $error_key)
	{
		if ($value === '')
		{
			return 0;
		}
		$timestamp = (int) $this->user->get_timestamp_from_format(ext::DATE_FORMAT, $value);
		$parse_errors = \DateTime::getLastErrors();
		if (!$timestamp || ($parse_errors !== false && ($parse_errors['warning_count'] || $parse_errors['error_count'])))
		{
			$errors[] = $this->language->lang($error_key);
			return 0;
		}
		return $timestamp;
	}

	/**
	 * Get selectable group options for the ACP editor.
	 *
	 * @param array $selected Selected group identifiers
	 * @return array Group options
	 */
	protected function get_group_options(array $selected)
	{
		$options = [];
		$sql = 'SELECT group_id, group_name
			FROM ' . GROUPS_TABLE . '
			ORDER BY group_type DESC, group_name ASC';
		$result = $this->db->sql_query($sql);
		while ($row = $this->db->sql_fetchrow($result))
		{
			$options[] = [
				'ID' => (int) $row['group_id'],
				'NAME' => $this->group_helper->get_name($row['group_name']),
				'S_SELECTED' => in_array((int) $row['group_id'], array_map('intval', $selected), true),
			];
		}
		$this->db->sql_freeresult($result);
		return $options;
	}

	/**
	 * Defaults keep ACP rendering compatible with announcements created before 2.0.
	 *
	 * @return array Default announcement data
	 */
	protected function announcement_defaults()
	{
		return [
			'announcement_id' => 0,
			'announcement_text' => '',
			'announcement_description' => '',
			'announcement_title' => '',
			'announcement_bgcolor' => '',
			'announcement_enabled' => false,
			'announcement_tone' => ext::TONE_INFO,
			'announcement_state' => ext::STATUS_DRAFT,
			'announcement_start' => 0,
			'announcement_include_children' => false,
			'announcement_locations' => '',
			'announcement_dismissable' => true,
			'announcement_users' => ext::ALL,
			'announcement_revision' => 1,
			'announcement_timestamp' => 0,
			'announcement_expiry' => 0,
			'announcement_uid' => '',
			'announcement_bitfield' => '',
			'announcement_flags' => OPTION_FLAG_BBCODE + OPTION_FLAG_SMILIES + OPTION_FLAG_LINKS,
		];
	}
}
