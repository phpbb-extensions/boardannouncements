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

use phpbb\boardannouncements\ext;

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
	 * Get all board announcements for administration.
	 *
	 * @return array Array of announcements data, or empty array
	 */
	public function get_announcements()
	{
		return $this->nestedset->where_all()->get_all_tree_data();
	}

	/**
	 * Get published announcements eligible for frontend visibility checks.
	 *
	 * Audience, location, forum permissions, and guest cookies are evaluated by
	 * the visibility service after this database-level eligibility query.
	 *
	 * @param int $user_id Registered user identifier, or zero for guests
	 * @return array Array of published announcement data, or empty array
	 */
	public function get_published_announcements($user_id = 0)
	{
		$this->nestedset->where_published($user_id);
		try
		{
			return $this->nestedset->get_all_tree_data();
		}
		finally
		{
			$this->nestedset->where_all();
		}
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
	 * @param array $group_ids Assigned group identifiers
	 * @throws \Throwable Any transaction failure
	 */
	public function save_announcement($data, array $group_ids = [])
	{
		return $this->nestedset->insert_with_groups($this->intersect_data($data), $group_ids);
	}

	/**
	 * Update an announcement in the database
	 *
	 * @param int $id An announcement identifier
	 * @param array $data An array of announcement data
	 * @param array|null $group_ids Replacement group identifiers, or null to leave unchanged
	 * @return bool
	 * @throws \OutOfBoundsException When the announcement data is invalid
	 * @throws \Throwable Any other transaction failure
	 */
	public function update_announcement($id, $data, array $group_ids = null)
	{
		return (bool) $this->nestedset->update_with_groups($id, $this->intersect_data($data), $group_ids);
	}

	/**
	 * Delete an announcement from the database
	 *
	 * @param int $id An announcement identifier
	 * @return bool
	 * @throws \OutOfBoundsException When the announcement does not exist
	 * @throws \Throwable Any other transaction failure
	 */
	public function delete_announcement($id)
	{
		return (bool) $this->nestedset->delete_with_relations($id);
	}

	/**
	 * Move an announcement up or down
	 *
	 * @param int $id An announcement identifier
	 * @param string $direction up or down
	 * @param int $amount
	 * @return void
	 * @throws \OutOfBoundsException When the announcement does not exist
	 * @throws \RuntimeException When the nested-set lock cannot be acquired
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
	 * @throws \Throwable Any transaction failure
	 */
	public function show_announcement_again($id)
	{
		return (bool) $this->nestedset->show_again($id);
	}

	/**
	 * Store a registered user's announcement dismissal.
	 *
	 * @param int $id Announcement identifier
	 * @param int $user_id User identifier
	 * @return bool True when stored or already present
	 * @throws \OutOfBoundsException When the announcement does not exist
	 */
	public function close_announcement($id, $user_id)
	{
		return (bool) $this->nestedset->insert_tracked_item($id, $user_id);
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
	 * @throws \Throwable Any transaction failure
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
			'announcement_tone'			=> ext::TONE_INFO,
			'announcement_state'		=> ext::STATUS_DRAFT,
			'announcement_start'		=> 0,
			'announcement_include_children' => false,
			'announcement_locations'	=> '',
			'announcement_dismissable'	=> true,
			'announcement_users'		=> ext::ALL,
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
