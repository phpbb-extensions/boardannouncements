<?php
/**
 *
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2023 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\boardannouncements\manager;

class manager
{
	/** @var \phpbb\boardannouncements\manager\nestedset */
	protected $nestedset;

	/**
	 * Constructor
	 *
	 * @param \phpbb\boardannouncements\manager\nestedset $nestedset
	 */
	public function __construct(\phpbb\boardannouncements\manager\nestedset $nestedset)
	{
		$this->nestedset = $nestedset;
	}

	/**
	 * Get a board announcement
	 *
	 * @param int $id Announcement ID
	 * @return array Array of announcement data, or empty array
	 */
	public function get_announcement($id)
	{
		$data = $this->nestedset->get_subtree_data($id);

		return $data[$id] ?? [];
	}

	/**
	 * Get board announcements, optionally excluding a user's dismissals.
	 *
	 * @param int $user_id Registered user identifier, or zero for all announcements
	 * @return array Array of announcements data, or empty array
	 */
	public function get_announcements($user_id = 0)
	{
		return $this->nestedset->where_visible($user_id)->get_all_tree_data();
	}

	/**
	 * Get one column of announcement data
	 *
	 * @param int $id An announcement identifier
	 * @param string $column Name of a column
	 * @return string The value of the column
	 */
	public function get_announcement_data($id, $column)
	{
		$data = $this->nestedset->get_subtree_data($id);

		return $data[$id][$column] ?? '';
	}

	/**
	 * Save an announcement to the database
	 *
	 * @param array $data An array of announcement data
	 */
	public function save_announcement($data)
	{
		return $this->nestedset->insert($this->intersect_data($data));
	}

	/**
	 * Update an announcement in the database
	 *
	 * @param int $id An announcement identifier
	 * @param array $data An array of announcement data
	 * @return bool
	 */
	public function update_announcement($id, $data)
	{
		return (bool) $this->nestedset->update_item($id, $this->intersect_data($data));
	}

	/**
	 * Delete an announcement from the database
	 *
	 * @param int $id An announcement identifier
	 * @return bool
	 */
	public function delete_announcement($id)
	{
		$this->set_announcement_groups($id, []);
		$deleted = (bool) $this->nestedset->delete($id);
		if ($deleted)
		{
			$this->delete_announcement_tracking($id);
		}

		return $deleted;
	}

	/**
	 * Move an announcement up or down
	 *
	 * @param int $id An announcement identifier
	 * @param string $direction up or down
	 * @param int $amount
	 * @return void
	 */
	public function move_announcement($id, $direction = 'up', $amount = 1)
	{
		$amount = (int) $amount;
		$this->nestedset->move($id, ($direction !== 'up' ? -$amount : $amount));
	}

	/**
	 * Increment an announcement revision so dismissed users see it again.
	 *
	 * @param int $id Announcement identifier
	 * @return bool True when the revision was updated, false when not found
	 */
	public function show_announcement_again($id)
	{
		$announcement = $this->get_announcement($id);
		if (!$announcement)
		{
			return false;
		}

		$updated = (bool) $this->nestedset->update_item($id, [
			'announcement_revision' => (int) $announcement['announcement_revision'] + 1,
		]);
		if ($updated)
		{
			$this->delete_announcement_tracking($id);
		}

		return $updated;
	}

	/**
	 * Store a registered user's announcement dismissal.
	 *
	 * @param int $id Announcement identifier
	 * @param int $user_id User identifier
	 * @return bool True when stored or already present
	 */
	public function close_announcement($id, $user_id)
	{
		return (bool) $this->nestedset->insert_tracked_item($id, $user_id);
	}

	/**
	 * Delete every registered-user dismissal for an announcement.
	 *
	 * @param int $id Announcement identifier
	 * @return bool True when any dismissal was deleted
	 */
	public function delete_announcement_tracking($id)
	{
		return (bool) $this->nestedset->delete_tracked_items($id);
	}

	/**
	 * Get groups assigned to an announcement.
	 *
	 * @param int $id Announcement identifier
	 * @return array Group identifiers
	 */
	public function get_announcement_groups($id)
	{
		return $this->nestedset->get_announcement_groups($id);
	}

	/**
	 * Replace groups assigned to an announcement.
	 *
	 * @param int   $id Announcement identifier
	 * @param array $group_ids Group identifiers
	 * @return void
	 */
	public function set_announcement_groups($id, array $group_ids)
	{
		$this->nestedset->set_announcement_groups($id, $group_ids);
	}

	/**
	 * Check whether a user belongs to an announcement's assigned groups.
	 *
	 * @param int $id Announcement identifier
	 * @param int $user_id User identifier
	 * @return bool True when the user belongs to an assigned group
	 */
	public function user_matches_groups($id, $user_id)
	{
		return $this->nestedset->user_matches_groups($id, $user_id);
	}

	/**
	 * Check whether a location descends from a selected forum.
	 *
	 * @param int   $location Forum identifier
	 * @param array $selected Selected forum identifiers
	 * @return bool True when the location is a descendant
	 */
	public function location_matches_descendant($location, array $selected)
	{
		return $this->nestedset->location_matches_descendant($location, $selected);
	}

	/**
	 * Decode JSON data
	 *
	 * @param string $data
	 * @return mixed decoded json data or original data if not valid json
	 */
	public function decode_json($data)
	{
		$result = json_decode($data, true);
		return json_last_error() === JSON_ERROR_NONE ? $result : $data;
	}

	/**
	 * Make sure only necessary data make their way to SQL query
	 *
	 * @param	array	$data	List of data to query the database
	 * @return	array	Cleaned data that contain only valid keys
	 */
	protected function intersect_data($data)
	{
		return array_intersect_key($data, $this->announcement_columns());
	}

	/**
	 * Get array of announcement data columns
	 *
	 * @return array
	 */
	public function announcement_columns()
	{
		return [
			'announcement_text'			=> '',
			'announcement_description'	=> '',
			'announcement_title'		=> '',
			'announcement_bgcolor'		=> '',
			'announcement_enabled'		=> false,
			'announcement_tone'			=> 'info',
			'announcement_state'		=> 'draft',
			'announcement_start'		=> 0,
			'announcement_include_children' => false,
			'announcement_locations'	=> '',
			'announcement_dismissable'	=> true,
			'announcement_users'		=> \phpbb\boardannouncements\ext::ALL,
			'announcement_revision'		=> 1,
			'announcement_created_by'	=> 0,
			'announcement_updated_at'	=> 0,
			'announcement_updated_by'	=> 0,
			'announcement_timestamp'	=> 0,
			'announcement_expiry'		=> 0,
			'announcement_uid'			=> '',
			'announcement_bitfield'		=> '',
			'announcement_flags'		=> OPTION_FLAG_BBCODE + OPTION_FLAG_SMILIES + OPTION_FLAG_LINKS,
		];
	}
}
