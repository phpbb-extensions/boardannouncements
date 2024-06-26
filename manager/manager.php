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
		$data = $this->nestedset->where_visible($user_id)->get_all_tree_data();

		if ((int) $user_id === ANONYMOUS)
		{
			return array_filter($data, [$this, 'filter_members']);
		}

		return array_filter($data, [$this, 'filter_guests']);
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
		$updated = (bool) $this->nestedset->update_item($id, $this->intersect_data($data));

		if ($updated)
		{
			$this->delete_announcement_tracking($id);
		}

		return $updated;
	}

	/**
	 * Delete an announcement from the database
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
	 * Get expired announcements
	 *
	 * @param string $column Get only a single column of announcement data
	 * @return array An array of expired announcements or announcement column data, or empty if none
	 */
	public function get_expired_announcements($column)
	{
		$data = array_filter($this->get_announcements(), [$this, 'filter_expired']);

		return $column ? array_column($data, $column) : $data;
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
	 * Filter members only announcements
	 *
	 * @param array $row
	 * @return bool
	 */
	protected function filter_members(array $row)
	{
		return (int) $row['announcement_users'] !== \phpbb\boardannouncements\ext::MEMBERS;
	}

	/**
	 * Filter guests only announcements
	 *
	 * @param array $row
	 * @return bool
	 */
	protected function filter_guests(array $row)
	{
		return (int) $row['announcement_users'] !== \phpbb\boardannouncements\ext::GUESTS;
	}

	/**
	 * Filter enabled expired announcements
	 *
	 * @param array $row
	 * @return bool
	 */
	protected function filter_expired(array $row)
	{
		return $row['announcement_enabled'] && $row['announcement_expiry'] && (int) $row['announcement_expiry'] < time();
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
			'announcement_enabled'		=> true,
			'announcement_locations'	=> '',
			'announcement_dismissable'	=> true,
			'announcement_users'		=> \phpbb\boardannouncements\ext::ALL,
			'announcement_timestamp'	=> 0,
			'announcement_expiry'		=> 0,
			'announcement_uid'			=> '',
			'announcement_bitfield'		=> '',
			'announcement_flags'			=> OPTION_FLAG_BBCODE + OPTION_FLAG_SMILIES + OPTION_FLAG_LINKS,
		];
	}
}
