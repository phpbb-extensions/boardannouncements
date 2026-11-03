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
 * Nested set class
 */
class nestedset extends \phpbb\tree\nestedset
{
	/** @var string */
	protected $groups_table;

	/** @var string */
	protected $user_group_table;

	/** @var string */
	protected $forums_table;

	/** @var array */
	protected $ancestor_cache = [];

	/** @var array */
	protected $user_group_announcements = [];

	/**
	 * Construct
	 *
	 * @param \phpbb\db\driver\driver_interface $db         Database connection
	 * @param \phpbb\lock\db                    $lock       Lock class used to lock the table when moving forums around
	 * @param string                            $table_name Table name
	 * @param string                            $groups_table Announcement group map table (legacy migrations pass their former tracking table)
	 * @param string                            $user_group_table User group membership table; omitted by legacy migrations
	 * @param string                            $forums_table Forums table; omitted by legacy migrations
	 */
	public function __construct(\phpbb\db\driver\driver_interface $db, \phpbb\lock\db $lock, $table_name, $groups_table, $user_group_table = '', $forums_table = '')
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
		$this->groups_table = $groups_table;
		$this->user_group_table = $user_group_table;
		$this->forums_table = $forums_table;
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
		if (!$item_id || empty($item_data))
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
	 * Get groups assigned to an announcement.
	 *
	 * @param int $item_id Announcement identifier
	 * @return array Group identifiers
	 */
	public function get_announcement_groups($item_id)
	{
		$sql = 'SELECT group_id FROM ' . $this->groups_table . '
			WHERE announcement_id = ' . (int) $item_id;
		$result = $this->db->sql_query($sql);
		$groups = array_map('intval', array_column($this->db->sql_fetchrowset($result), 'group_id'));
		$this->db->sql_freeresult($result);

		return $groups;
	}

	/**
	 * Replace groups assigned to an announcement.
	 *
	 * @param int   $item_id Announcement identifier
	 * @param array $group_ids Group identifiers
	 * @return void
	 */
	public function set_announcement_groups($item_id, array $group_ids)
	{
		$this->user_group_announcements = [];
		$this->db->sql_query('DELETE FROM ' . $this->groups_table . ' WHERE announcement_id = ' . (int) $item_id);
		$rows = [];
		foreach (array_unique(array_map('intval', $group_ids)) as $group_id)
		{
			if ($group_id > 0)
			{
				$rows[] = ['announcement_id' => (int) $item_id, 'group_id' => $group_id];
			}
		}
		if ($rows)
		{
			$this->db->sql_multi_insert($this->groups_table, $rows);
		}
	}

	/**
	 * Check whether a user belongs to an announcement's assigned groups.
	 *
	 * @param int $item_id Announcement identifier
	 * @param int $user_id User identifier
	 * @return bool True when the user belongs to an assigned group
	 */
	public function user_matches_groups($item_id, $user_id)
	{
		$user_id = (int) $user_id;
		if (!isset($this->user_group_announcements[$user_id]))
		{
			$sql = 'SELECT DISTINCT ag.announcement_id
				FROM ' . $this->groups_table . ' ag
				INNER JOIN ' . $this->user_group_table . ' ug ON ug.group_id = ag.group_id
				WHERE ug.user_id = ' . $user_id . '
					AND ug.user_pending = 0';
			$result = $this->db->sql_query($sql);
			$announcement_ids = array_map('intval', array_column($this->db->sql_fetchrowset($result), 'announcement_id'));
			$this->db->sql_freeresult($result);
			$this->user_group_announcements[$user_id] = array_fill_keys($announcement_ids, true);
		}

		return isset($this->user_group_announcements[$user_id][(int) $item_id]);
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
		$location = (int) $location;
		$selected = array_values(array_filter(array_map('intval', $selected), static function ($id) {
			return $id > 0;
		}));
		if (!$selected || $location <= 0)
		{
			return false;
		}

		if (!isset($this->ancestor_cache[$location]))
		{
			$sql = 'SELECT parent.forum_id
				FROM ' . $this->forums_table . ' child, ' . $this->forums_table . ' parent
				WHERE child.forum_id = ' . $location . '
					AND child.left_id > parent.left_id
					AND child.right_id < parent.right_id';
			$result = $this->db->sql_query($sql);
			$ancestor_ids = array_map('intval', array_column($this->db->sql_fetchrowset($result), 'forum_id'));
			$this->db->sql_freeresult($result);
			$this->ancestor_cache[$location] = array_fill_keys($ancestor_ids, true);
		}

		foreach ($selected as $forum_id)
		{
			if (isset($this->ancestor_cache[$location][$forum_id]))
			{
				return true;
			}
		}

		return false;
	}
}
