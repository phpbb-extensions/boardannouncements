<?php
/**
 *
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2024 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\boardannouncements\migrations\v10x;

use phpbb\boardannouncements\ext;
use phpbb\boardannouncements\manager\nestedset;

/**
 * Migration stage 13: Migrate existing index only data to location data
 */
class m13_locations_data extends \phpbb\db\migration\container_aware_migration
{
	/**
	 * {@inheritdoc}
	 */
	public static function depends_on()
	{
		return [
			'\phpbb\boardannouncements\migrations\v10x\m12_locations',
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function effectively_installed()
	{
		$sql = 'SELECT announcement_id
			FROM ' . $this->table_prefix . "board_announcements
			WHERE announcement_locations != ''";
		$result = $this->db->sql_query_limit($sql, 1);
		$row = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		return $row !== false;
	}

	/**
	 * {@inheritdoc}
	 */
	public function update_data()
	{
		return [
			['custom', [[$this, 'copy_locations']]],
		];
	}

	/**
	 * Copy values of announcement_indexonly to announcement_locations
	 * for existing announcements. New values should be -1 for index only,
	 * empty string for everywhere (all other integers will be for forums).
	 *
	 * @return void
	 */
	public function copy_locations()
	{
		$sql = 'SELECT announcement_id, announcement_indexonly
			FROM ' . $this->table_prefix . 'board_announcements';
		$result = $this->db->sql_query($sql);
		$rows = $this->db->sql_fetchrowset($result);
		$this->db->sql_freeresult($result);

		if (!empty($rows))
		{
			$this->db->sql_transaction('begin');

			foreach ($rows as $row)
			{
				$this->get_nestedset()->update_item($row['announcement_id'], [
					'announcement_locations' => $row['announcement_indexonly'] ? json_encode([ext::INDEX_ONLY]) : ''
				]);
			}

			$this->db->sql_transaction('commit');
		}
	}

	/**
	 * Get the board announcements nested set object
	 *
	 * @return nestedset
	 */
	protected function get_nestedset()
	{
		/** @var \phpbb\db\driver\driver_interface $db */
		$db = $this->container->get('dbal.conn');

		return new nestedset(
			$db,
			new \phpbb\lock\db('boardannouncements.table_lock.board_announcements_table', $this->config, $db),
			$this->table_prefix . 'board_announcements',
			$this->table_prefix . 'board_announcements_track'
		);
	}
}
