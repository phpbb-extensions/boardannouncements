<?php
/**
 *
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2014, 2023 phpBB Limited <https://www.phpbb.com>
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
		$sql = "SELECT b.*
			FROM $this->announcements_table b
			LEFT JOIN $this->announcements_tracking_table u
			    ON u.announcement_id = b.announcement_id
			    AND u.user_id = " . (int) $user_id . '
			WHERE u.announcement_id IS NULL
				AND b.announcement_enabled = 1';
		$result = $this->db->sql_query($sql);
		$data = $this->db->sql_fetchrowset($result);
		$this->db->sql_freeresult($result);

		return $data !== false ? $data : [];
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

		$sql = 'UPDATE ' . $this->announcements_table . '
			SET ' . $this->db->sql_build_array('UPDATE', $data) . '
			WHERE announcement_id = ' . (int) $id;
		$this->db->sql_query($sql);

		return (bool) $this->db->sql_affectedrows();
	}

	/**
	 * Set an announcement to disabled state
	 *
	 * @param int $id An announcement identifier
	 * @return void
	 */
	public function disable_announcement($id)
	{
		$sql = "UPDATE $this->announcements_table
			SET announcement_enable = 0
			WHERE announcement_id = " . (int) $id;
		$this->db->sql_query($sql);
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
		return array_intersect_key($data, [
			'announcement_text'			=> '',
			'announcement_bgcolor'		=> '',
			'announcement_enabled'		=> '',
			'announcement_indexonly'	=> '',
			'announcement_dismissable'	=> '',
			'announcement_users'		=> '',
			'announcement_timestamp'	=> '',
			'announcement_expiry'		=> '',
		]);
	}

}
