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

use phpbb\db\driver\driver_interface;

class manager
{
	/** @var driver_interface */
	protected $db;

	/** @var string */
	protected $announcements_table;

	/** @var string */
	protected $announcements_tracking_table;

	/**
	 * Constructor
	 *
	 * @param driver_interface $db
	 * @param string $announcements_table
	 * @param string $announcements_tracking_table
	 */
	public function __construct(driver_interface $db, $announcements_table, $announcements_tracking_table)
	{
		$this->db = $db;
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
		$sql = 'SELECT *
			FROM ' . $this->announcements_table . '
			WHERE announcement_id = ' . (int) $id;
		$result = $this->db->sql_query($sql);
		$data = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		return $data !== false ? $data : [];
	}

	/**
	 * Get all board announcements
	 *
	 * @return array Array of announcements data, or empty array
	 */
	public function get_announcements()
	{
		$sql = "SELECT * FROM $this->announcements_table";
		$result = $this->db->sql_query($sql);
		$data = $this->db->sql_fetchrowset($result);
		$this->db->sql_freeresult($result);

		return $data !== false ? $data : [];
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
		$result = $this->db->sql_query($sql);
		$data = $this->db->sql_fetchrowset($result);
		$this->db->sql_freeresult($result);

		return $data !== false ? $data : [];
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
		$sql = 'SELECT ' . $this->db->sql_escape($column) . '
			FROM ' . $this->announcements_table . '
			WHERE announcement_id = ' . (int) $id;
		$result = $this->db->sql_query($sql);
		$value = $this->db->sql_fetchfield($column);
		$this->db->sql_freeresult($result);

		return $value;
	}

	/**
	 * Save an announcement to the database
	 *
	 * @param array $data An array of announcement data
	 * @return int
	 */
	public function save_announcement($data)
	{
		$data = $this->intersect_data($data);

		$sql = "INSERT INTO " . $this->announcements_table . ' ' . $this->db->sql_build_array('INSERT', $data);
		$this->db->sql_query($sql);

		return (int) $this->db->sql_nextid();
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
		$data = $this->intersect_data($data);

		$sql = "UPDATE $this->announcements_table
			SET " . $this->db->sql_build_array('UPDATE', $data) . '
			WHERE announcement_id = ' . (int) $id;
		$this->db->sql_query($sql);

		return (bool) $this->db->sql_affectedrows();
	}

	/**
	 * Delete a board announcement
	 *
	 * @param int $id An announcement identifier
	 * @return bool
	 */
	public function delete_announcement($id)
	{
		$sql = "DELETE FROM $this->announcements_table
			WHERE announcement_id = " . (int) $id;
		$this->db->sql_query($sql);

		$deleted = (bool) $this->db->sql_affectedrows();

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
		$sql = "DELETE FROM $this->announcements_tracking_table
			WHERE announcement_id = " . (int) $id;
		$this->db->sql_query($sql);

		return (bool) $this->db->sql_affectedrows();
	}

	/**
	 * Set an announcement to disabled state
	 *
	 * @param int $id An announcement identifier
	 * @return bool Return enabled state of announcement, true if still enabled, false if successfully disabled
	 */
	public function disable_announcement($id)
	{
		$sql = "UPDATE $this->announcements_table
			SET announcement_enabled = 0
			WHERE announcement_id = " . (int) $id;
		$this->db->sql_query($sql);

		return !$this->db->sql_affectedrows();
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
		$sql = 'INSERT INTO ' . $this->announcements_tracking_table . ' ' . $this->db->sql_build_array('INSERT', [
			'user_id'			=> (int) $user_id,
			'announcement_id'	=> (int) $id,
		]);
		$this->db->sql_query($sql);

		return (bool) $this->db->sql_affectedrows();
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
