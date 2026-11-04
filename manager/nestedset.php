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
 * Announcement persistence and targeting queries built on phpBB's nested-set storage.
 */
class nestedset extends \phpbb\tree\nestedset
{
	/** @var string */
	protected $groups_table;

	/** @var string */
	protected $user_group_table;

	/** @var string */
	protected $forums_table;

	/** @var string */
	protected $tracking_table;

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
	 * @param string                            $tracking_table Announcement dismissal tracking table
	 * @param string                            $groups_table Announcement group map table; omitted by legacy migrations
	 * @param string                            $user_group_table User group membership table; omitted by legacy migrations
	 * @param string                            $forums_table Forums table; omitted by legacy migrations
	 */
	public function __construct(\phpbb\db\driver\driver_interface $db, \phpbb\lock\db $lock, $table_name, $tracking_table, $groups_table = '', $user_group_table = '', $forums_table = '')
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
		$this->tracking_table = $tracking_table;
		$this->groups_table = $groups_table;
		$this->user_group_table = $user_group_table;
		$this->forums_table = $forums_table;
	}

	/**
	 * Remove frontend restrictions from announcement queries.
	 *
	 * @return nestedset This object for method chaining
	 */
	public function where_all()
	{
		$this->sql_where = '';

		return $this;
	}

	/**
	 * Restrict queries to published items not dismissed by a registered user.
	 *
	 * This deliberately covers database eligibility only. Audience and location
	 * policy remain in the visibility service.
	 *
	 * @param int $user_id Registered user identifier, or zero for guests
	 * @return nestedset This object for method chaining
	 */
	public function where_published($user_id = 0)
	{
		$user_id = (int) $user_id;
		$this->sql_where = "%1\$sannouncement_state = 'published'";
		if ($user_id > 0 && $user_id !== ANONYMOUS)
		{
			$this->sql_where .= ' AND (%1$sannouncement_dismissable = 0 OR %1$s' . $this->column_item_id . ' NOT IN (
				SELECT ' . $this->column_item_id . ' FROM ' . $this->tracking_table . '
				WHERE user_id = ' . $user_id . '
			))';
		}

		return $this;
	}

	/**
	 * Insert an item and its group mappings atomically.
	 *
	 * @param array $item_data Announcement data
	 * @param array $group_ids Assigned group identifiers
	 * @return mixed Nested-set insert result
	 * @throws \Throwable Any transaction failure
	 */
	public function insert_with_groups(array $item_data, array $group_ids = [])
	{
		$this->where_all();
		if (!$group_ids)
		{
			return $this->insert($item_data);
		}

		return $this->transactional(function () use ($item_data, $group_ids) {
			$result = $this->insert($item_data);
			$item_id = is_array($result) ? (int) ($result[$this->column_item_id] ?? 0) : (int) $result;
			$this->replace_announcement_groups($item_id, $group_ids);

			return $result;
		});
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
	 * Update an item and optionally replace its group mappings atomically.
	 *
	 * @param int        $item_id Announcement identifier
	 * @param array      $item_data Announcement data
	 * @param array|null $group_ids Replacement group identifiers, or null to leave unchanged
	 * @return mixed Number of affected rows, or false
	 * @throws \OutOfBoundsException When the announcement data is invalid
	 * @throws \Throwable Any other transaction failure
	 */
	public function update_with_groups($item_id, array $item_data, array $group_ids = null)
	{
		if ($group_ids === null)
		{
			return $this->update_item($item_id, $item_data);
		}

		return $this->transactional(function () use ($item_id, $item_data, $group_ids) {
			$updated = $this->update_item($item_id, $item_data);
			if ($updated)
			{
				$this->replace_announcement_groups($item_id, $group_ids);
			}

			return $updated;
		});
	}

	/**
	 * Delete an item and all extension-owned relations atomically.
	 *
	 * @param int $item_id Announcement identifier
	 * @return mixed Nested-set delete result
	 * @throws \OutOfBoundsException When the announcement does not exist
	 * @throws \Throwable Any other transaction failure
	 */
	public function delete_with_relations($item_id)
	{
		$this->where_all();
		return $this->transactional(function () use ($item_id) {
			$deleted = parent::delete($item_id);
			if ($deleted)
			{
				$this->replace_announcement_groups($item_id, []);
				$this->delete_tracked_items($item_id);
			}

			return $deleted;
		});
	}

	/**
	 * Increment an item revision and clear registered dismissals atomically.
	 *
	 * @param int $item_id Announcement identifier
	 * @return int|false Number of affected rows, or false
	 * @throws \Throwable Any transaction failure
	 */
	public function show_again($item_id)
	{
		if (!$item_id)
		{
			return false;
		}

		return $this->transactional(function () use ($item_id) {
			$sql = 'UPDATE ' . $this->table_name . '
				SET announcement_revision = announcement_revision + 1
				WHERE ' . $this->column_item_id . ' = ' . (int) $item_id;
			$this->db->sql_query($sql);
			$updated = $this->db->sql_affectedrows();
			if ($updated)
			{
				$this->delete_tracked_items($item_id);
			}

			return $updated;
		});
	}

	/**
	 * Record an announcement dismissal for a registered user.
	 *
	 * @param int $item_id Announcement identifier
	 * @param int $user_id User identifier
	 * @return int|false Number of affected rows, one when already tracked, or false
	 * @throws \OutOfBoundsException When the announcement does not exist
	 */
	public function insert_tracked_item($item_id, $user_id)
	{
		$user_id = (int) $user_id;
		if ($user_id <= 0 || $user_id === ANONYMOUS)
		{
			return false;
		}

		if (empty($this->get_subtree_data($item_id)))
		{
			throw new \OutOfBoundsException($this->message_prefix . 'INVALID_ITEM');
		}

		$sql = 'SELECT 1 AS tracked
			FROM ' . $this->tracking_table . '
			WHERE ' . $this->column_item_id . ' = ' . (int) $item_id . '
				AND user_id = ' . $user_id;
		$result = $this->db->sql_query_limit($sql, 1);
		$tracked = (bool) $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);
		if ($tracked)
		{
			return 1;
		}

		$sql = 'INSERT INTO ' . $this->tracking_table . ' ' . $this->db->sql_build_array('INSERT', [
				$this->column_item_id => (int) $item_id,
				'user_id' => $user_id,
			]);
		$this->db->sql_query($sql);

		return $this->db->sql_affectedrows();
	}

	/**
	 * Delete every registered-user dismissal for an announcement.
	 *
	 * @param int $item_id Announcement identifier
	 * @return int|false Number of affected rows, or false
	 * @throws \OutOfBoundsException When the announcement identifier is invalid
	 */
	public function delete_tracked_items($item_id)
	{
		if (!$item_id)
		{
			throw new \OutOfBoundsException($this->message_prefix . 'INVALID_ITEM');
		}

		$sql = 'DELETE FROM ' . $this->tracking_table . '
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
	 * @param int $item_id Announcement identifier
	 * @param array $group_ids Group identifiers
	 * @return void
	 * @throws \Throwable Any transaction failure
	 */
	public function set_announcement_groups($item_id, array $group_ids)
	{
		$this->transactional(function () use ($item_id, $group_ids) {
			$this->replace_announcement_groups($item_id, $group_ids);
		});
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

	/**
	 * Replace group mappings inside the caller's transaction.
	 *
	 * @param int   $item_id Announcement identifier
	 * @param array $group_ids Group identifiers
	 * @return void
	 */
	protected function replace_announcement_groups($item_id, array $group_ids)
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
	 * Execute a database operation atomically, rolling back and propagating failures.
	 *
	 * @param callable $operation Operation to execute
	 * @return mixed Operation result
	 * @throws \Throwable Any operation failure after the transaction is rolled back
	 */
	protected function transactional(callable $operation)
	{
		$this->db->sql_transaction('begin');
		try
		{
			$result = $operation();
			$this->db->sql_transaction('commit');

			return $result;
		}
		catch (\Throwable $e)
		{
			$this->db->sql_transaction('rollback');
			throw $e;
		}
	}
}
