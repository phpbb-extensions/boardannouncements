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

	/** @var string */
	protected $announcements_table;

	/** @var string */
	protected $announcements_tracking_table;

	/**
	 * Constructor
	 *
	 * @param \phpbb\boardannouncements\manager\nestedset $nestedset
	 * @param string $announcements_table
	 * @param string $announcements_tracking_table
	 */
	public function __construct(\phpbb\boardannouncements\manager\nestedset $nestedset, $announcements_table, $announcements_tracking_table)
	{
		$this->nestedset = $nestedset;
		$this->announcements_table = $announcements_table;
		$this->announcements_tracking_table = $announcements_tracking_table;
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

		return count($data) ? $data[$id] : [];
	}

	/**
	 * Get all board announcements
	 *
	 * @return array Array of announcements data, or empty array
	 */
	public function get_announcements()
	{
		return $this->nestedset->get_all_tree_data();
	}

	/**
	 * Get all board announcements that can be seen by the user
	 *
	 * @param int $user_id A user identifier
	 * @return array Array of announcements data, or empty array
	 */
	public function get_visible_announcements($user_id)
	{
		$sql = "SELECT b.announcement_id, b.announcement_text, b.announcement_bgcolor, b.announcement_indexonly, b.announcement_dismissable, b.announcement_users, b.announcement_timestamp, b.announcement_expiry
			FROM $this->announcements_table b
			LEFT JOIN $this->announcements_tracking_table u
			    ON u.announcement_id = b.announcement_id
			    AND u.user_id = " . (int) $user_id . '
			WHERE u.announcement_id IS NULL
				AND b.announcement_enabled = 1
				AND (b.announcement_expiry = 0 OR b.announcement_expiry > ' . time() . ')';
		return $this->nestedset->get_from_query($sql);
	}

	/**
	 * Get one column of announcement data
	 *
	 * @param int $id An announcement identifier
	 * @param string $column Name of a column
	 * @return string|false The value of the column
	 */
	public function get_announcement_data($id, $column)
	{
		return $this->nestedset->get_item_column($id, $column);
	}

	/**
	 * Save an announcement to the database
	 *
	 * @param array $data An array of announcement data
	 */
	public function save_announcement($data)
	{
		$this->nestedset->insert($this->intersect_data($data));
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
	 * Set an announcement to disabled state
	 *
	 * @param int $id An announcement identifier
	 * @return bool Return enabled state of announcement, true if still enabled, false if successfully disabled
	 */
	public function disable_announcement($id)
	{
		return $this->nestedset->update_item($id, ['announcement_enabled' => 0]) === false;
	}

	/**
	 * Delete a board announcement
	 *
	 * @param int $id An announcement identifier
	 * @return bool
	 */
	public function delete_announcement($id)
	{
		$deleted = (bool) $this->nestedset->delete($id);

		if ($deleted)
		{
			$this->delete_announcement_tracking($id);
		}

		return $deleted;
	}

	/**
	 * Delete user tracking for a board announcement
	 *
	 * @param int $id An announcement identifier
	 * @return bool
	 */
	public function delete_announcement_tracking($id)
	{
		return (bool) $this->nestedset->delete_tracked_items($id);
	}

	/**
	 * Closing an announcement, store the user and announcement ids for tracking purposes
	 *
	 * @param int $id An announcement identifier
	 * @param int $user_id An user identifier
	 * @return bool
	 */
	public function close_announcement($id, $user_id)
	{
		return (bool) $this->nestedset->insert_tracked_item($id, ['user_id' => (int) $user_id]);
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
			'announcement_bgcolor'		=> '',
			'announcement_enabled'		=> '',
			'announcement_indexonly'	=> '',
			'announcement_dismissable'	=> '',
			'announcement_users'		=> '',
			'announcement_timestamp'	=> '',
			'announcement_expiry'		=> '',
		];
	}
}
