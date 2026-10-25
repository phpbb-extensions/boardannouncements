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
	protected $auth;
	protected $config;
	protected $request;
	protected $user;
	protected $manager;
	protected $dispatcher;

	public function __construct($auth, $config, $request, $user, $manager, $dispatcher = null)
	{
		$this->auth = $auth;
		$this->config = $config;
		$this->request = $request;
		$this->user = $user;
		$this->manager = $manager;
		$this->dispatcher = $dispatcher;
	}

	public function is_visible(array $announcement, $location, $check_dismissal = true)
	{
		$visible = $this->is_active($announcement)
			&& $this->matches_audience($announcement)
			&& $this->matches_location($announcement, $location)
			&& (!$check_dismissal || !$this->is_dismissed($announcement));
		if ($this->dispatcher)
		{
			/**
			 * Change whether an announcement is visible for current request.
			 *
			 * @event phpbb.boardannouncements.visibility
			 * @var array announcement Announcement row
			 * @var int location Current forum or index identifier
			 * @var bool visible Calculated visibility
			 * @since 2.0.0
			 */
			$vars = ['announcement', 'location', 'visible'];
			extract($this->dispatcher->trigger_event('phpbb.boardannouncements.visibility', compact($vars)));
		}
		return (bool) $visible;
	}

	public function is_active(array $announcement, $now = null)
	{
		$now = $now === null ? time() : (int) $now;
		return !empty($announcement['announcement_enabled'])
			&& ($announcement['announcement_state'] ?? ext::STATE_PUBLISHED) === ext::STATE_PUBLISHED
			&& (empty($announcement['announcement_start']) || (int) $announcement['announcement_start'] <= $now)
			&& (empty($announcement['announcement_expiry']) || (int) $announcement['announcement_expiry'] > $now);
	}

	public function matches_audience(array $announcement)
	{
		$audience = (int) $announcement['announcement_users'];
		$is_registered = !empty($this->user->data['is_registered']);
		if (($audience === ext::MEMBERS && !$is_registered) || ($audience === ext::GUESTS && $is_registered))
		{
			return false;
		}

		return $audience !== ext::GROUPS || ($is_registered && $this->manager->user_matches_groups($announcement['announcement_id'], $this->user->data['user_id']));
	}

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

		return $location <= 0 || (!in_array($location, $this->user->get_passworded_forums()) && $this->auth->acl_get('f_read', $location));
	}

	public function is_dismissed(array $announcement)
	{
		$cookie_name = $this->config['cookie_name'] . '_ba_' . (int) $announcement['announcement_id'];
		$revision = (int) ($announcement['announcement_revision'] ?? 1);
		return (int) $this->request->variable($cookie_name, 0, false, request_interface::COOKIE) === $revision;
	}
}
