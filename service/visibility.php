<?php
/**
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2026 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 */

namespace phpbb\boardannouncements\service;

use phpbb\boardannouncements\ext;
use phpbb\request\request_interface;

class visibility
{
	/** @var \phpbb\auth\auth Authorization service */
	protected $auth;

	/** @var \phpbb\config\config Configuration */
	protected $config;

	/** @var \phpbb\request\request Request */
	protected $request;

	/** @var \phpbb\user Current user */
	protected $user;

	/** @var \phpbb\boardannouncements\manager\manager Announcement manager */
	protected $manager;

	/** @var array|null Password-protected forum identifiers for current request */
	protected $passworded_forums;

	/**
	 * Constructor.
	 *
	 * @param \phpbb\auth\auth                          $auth    Authorization service
	 * @param \phpbb\config\config                     $config  Configuration
	 * @param \phpbb\request\request                   $request Request
	 * @param \phpbb\user                              $user    Current user
	 * @param \phpbb\boardannouncements\manager\manager $manager Announcement manager
	 */
	public function __construct($auth, $config, $request, $user, $manager)
	{
		$this->auth = $auth;
		$this->config = $config;
		$this->request = $request;
		$this->user = $user;
		$this->manager = $manager;
	}

	/**
	 * Check whether an announcement is visible at a location.
	 *
	 * @param array $announcement   Announcement data
	 * @param int   $location       Forum identifier
	 * @param bool  $check_dismissal Whether to check dismissal state
	 * @return bool True when visible
	 */
	public function is_visible(array $announcement, $location, $check_dismissal = true)
	{
		return $this->is_active($announcement)
			&& $this->matches_audience($announcement)
			&& $this->matches_location($announcement, $location)
			&& (!$check_dismissal || empty($announcement['announcement_dismissable']) || !$this->is_dismissed($announcement));
	}

	/**
	 * Check whether an announcement is active.
	 *
	 * @param array    $announcement Announcement data
	 * @param int|null $now          Timestamp used for comparison
	 * @return bool True when active
	 */
	public function is_active(array $announcement, $now = null)
	{
		$now = $now === null ? time() : (int) $now;
		return !empty($announcement['announcement_enabled'])
			&& ($announcement['announcement_state'] ?? ext::STATUS_PUBLISHED) === ext::STATUS_PUBLISHED
			&& (empty($announcement['announcement_start']) || (int) $announcement['announcement_start'] <= $now)
			&& (empty($announcement['announcement_expiry']) || (int) $announcement['announcement_expiry'] > $now);
	}

	/**
	 * Check whether current user belongs to announcement audience.
	 *
	 * @param array $announcement Announcement data
	 * @return bool True when audience matches
	 */
	public function matches_audience(array $announcement)
	{
		$audience = (int) $announcement['announcement_users'];
		$is_registered = !empty($this->user->data['is_registered']);
		$is_bot = !empty($this->user->data['is_bot']);
		if (($audience === ext::MEMBERS && !$is_registered) || ($audience === ext::GUESTS && ($is_registered || $is_bot)))
		{
			return false;
		}

		return $audience !== ext::GROUPS || $this->manager->user_matches_groups($announcement['announcement_id'], $this->user->data['user_id']);
	}

	/**
	 * Check whether announcement targets a location.
	 *
	 * @param array $announcement Announcement data
	 * @param int   $location     Forum identifier
	 * @return bool True when location matches and is readable
	 */
	public function matches_location(array $announcement, $location)
	{
		$locations = $this->manager->decode_json($announcement['announcement_locations']);
		if (empty($locations))
		{
			return true;
		}

		$location = (int) $location;
		$locations = array_map('intval', (array) $locations);
		if (!in_array($location, $locations, true) && (empty($announcement['announcement_include_children']) || !$this->manager->location_matches_descendant($location, $locations)))
		{
			return false;
		}

		if ($location <= 0)
		{
			return true;
		}

		if ($this->passworded_forums === null)
		{
			$this->passworded_forums = $this->user->get_passworded_forums();
		}

		return !in_array($location, $this->passworded_forums) && $this->auth->acl_get('f_read', $location);
	}

	/**
	 * Check whether current browser dismissed an announcement revision.
	 *
	 * @param array $announcement Announcement data
	 * @return bool True when dismissed
	 */
	public function is_dismissed(array $announcement)
	{
		$cookie_name = $this->config['cookie_name'] . '_ba_' . (int) $announcement['announcement_id'];
		$revision = (int) ($announcement['announcement_revision'] ?? 1);
		return (int) $this->request->variable($cookie_name, 0, false, request_interface::COOKIE) === $revision;
	}
}
