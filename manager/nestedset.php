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

/**
 * Nested set class for Topic Prefixes
 */
class nestedset extends \phpbb\tree\nestedset
{

	/** @var string */
	protected $tracking_table_name;
	/**
	 * Construct
	 *
	 * @param \phpbb\db\driver\driver_interface $db         Database connection
	 * @param \phpbb\lock\db                    $lock       Lock class used to lock the table when moving forums around
	 * @param string                            $table_name Table name
	 * @param string                            $tracking_table_name Table name
	 */
	public function __construct(\phpbb\db\driver\driver_interface $db, \phpbb\lock\db $lock, $table_name, $tracking_table_name)
	{
		parent::__construct(
			$db,
			$lock,
			$table_name,
			'BOARD_ANNOUNCEMENTS_',
			'',
			[],
			[
				'item_id'		=> 'announcement_id',
				'parent_id'		=> 'announcement_parent_id',
				'left_id'		=> 'announcement_left_id',
				'right_id'		=> 'announcement_right_id',
				'item_parents'	=> 'announcement_parents',
			]
		);
		$this->tracking_table_name = $tracking_table_name;
	}

	/**
	 * Update a nested item
	 *
	 * @param int   $item_id   The item identifier
	 * @param array $item_data SQL array of data to update
	 * @return mixed Number of the affected rows updated, or false
	 * @throws \OutOfBoundsException
	 */
	public function update_item($item_id, array $item_data)
	{
		if (!$item_id)
		{
			throw new \OutOfBoundsException($this->message_prefix . 'INVALID_ITEM');
		}

		$sql = 'UPDATE ' . $this->table_name . '
			SET ' . $this->db->sql_build_array('UPDATE', $item_data) . '
			WHERE ' . $this->column_item_id . ' = ' . (int) $item_id;
		$this->db->sql_query($sql);

		return $this->db->sql_affectedrows();
	}

	/**
	 * Get one column of data from an item
	 *
	 * @param int $item_id The item identifier
	 * @param string $column The name of a column
	 * @return string|false The value in the column
	 */
	public function get_item_column($item_id, $column)
	{
		$sql = 'SELECT ' . $this->db->sql_escape($column) . '
			FROM ' . $this->table_name . '
			WHERE announcement_id = ' . (int) $item_id;
		$result = $this->db->sql_query($sql);
		$value = $this->db->sql_fetchfield($column);
		$this->db->sql_freeresult($result);

		return $value;
	}

	/**
	 * Run a query on a given SQL statement
	 *
	 * @param string $sql SQL statement
	 * @return array Array of data
	 */
	public function get_from_query($sql)
	{
		$result = $this->db->sql_query($sql);
		$rows = $this->db->sql_fetchrowset($result);
		$this->db->sql_freeresult($result);

		return $rows !== false ? $rows : [];
	}

	/**
	 * Delete items from the tracking table with the given item_id
	 *
	 * @param int $item_id The item identifier
	 * @return int|false Number of rows affected, or false
	 */
	public function delete_tracked_items($item_id)
	{
		$sql = 'DELETE FROM ' . $this->tracking_table_name . '
			WHERE ' . $this->column_item_id . ' = ' . (int) $item_id;
		$this->db->sql_query($sql);

		return $this->db->sql_affectedrows();
	}

	/**
	 * Insert new data for the given item_id into the tracking table
	 *
	 * @param int $item_id The item identifier
	 * @param array $data An array of data
	 * @return int|false Number of rows affected, or false
	 */
	public function insert_tracked_item($item_id, $data)
	{
		$sql = 'INSERT INTO ' . $this->tracking_table_name . ' ' . $this->db->sql_build_array('INSERT', array_merge($data, [
			$this->column_item_id => (int) $item_id
		]));
		$this->db->sql_query($sql);

		return $this->db->sql_affectedrows();
	}
}
