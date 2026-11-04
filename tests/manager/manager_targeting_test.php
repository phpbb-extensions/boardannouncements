<?php
/**
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2026 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 */

namespace phpbb\boardannouncements\tests\manager;

class manager_targeting_test extends manager_base
{
	public function test_save_and_update_store_group_mappings_with_announcement()
	{
		$result = $this->manager->save_announcement(array_replace($this->manager->announcement_columns(), [
			'announcement_text' => 'Grouped announcement',
			'announcement_description' => 'Grouped announcement',
		]), [10]);
		$id = (int) $result['announcement_id'];

		self::assertSame([10], $this->manager->get_announcement_groups($id));
		self::assertTrue($this->manager->update_announcement($id, ['announcement_description' => 'Updated group'], [20]));
		self::assertSame('Updated group', $this->manager->get_announcement_data($id, 'announcement_description'));
		self::assertSame([20], $this->manager->get_announcement_groups($id));
	}

	/**
	 * @throws \Throwable
	 */
	public function test_group_only_update_replaces_group_mappings()
	{
		$description = $this->manager->get_announcement_data(1, 'announcement_description');
		$this->manager->set_announcement_groups(1, [10]);

		self::assertTrue($this->manager->update_announcement(1, [
			'announcement_description' => $description,
		], [20]));
		self::assertSame($description, $this->manager->get_announcement_data(1, 'announcement_description'));
		self::assertSame([20], $this->manager->get_announcement_groups(1));
	}

	public function test_group_mapping_and_membership()
	{
		$this->manager->set_announcement_groups(1, [10, 10, 0, -1]);

		self::assertSame([10], $this->manager->get_announcement_groups(1));
		self::assertTrue($this->manager->user_matches_groups(1, 100));
		self::assertFalse($this->manager->user_matches_groups(1, 101));
		self::assertFalse($this->manager->user_matches_groups(1, 102));
	}

	public function test_replacing_and_clearing_group_mapping()
	{
		$this->manager->set_announcement_groups(1, [10]);
		$this->manager->set_announcement_groups(1, [20]);
		self::assertSame([20], $this->manager->get_announcement_groups(1));

		$this->manager->set_announcement_groups(1, []);
		self::assertSame([], $this->manager->get_announcement_groups(1));
	}

	public function test_group_membership_is_batched_per_user()
	{
		$this->manager->set_announcement_groups(1, [10]);
		$this->manager->set_announcement_groups(2, [10]);

		$query_count = $this->db->sql_num_queries();
		self::assertTrue($this->manager->user_matches_groups(1, 100));
		self::assertTrue($this->manager->user_matches_groups(2, 100));
		self::assertFalse($this->manager->user_matches_groups(3, 100));
		self::assertSame($query_count + 1, $this->db->sql_num_queries());

		self::assertFalse($this->manager->user_matches_groups(1, 102));
		self::assertSame($query_count + 2, $this->db->sql_num_queries());
	}

	public function test_group_mapping_change_invalidates_membership_cache()
	{
		$this->manager->set_announcement_groups(1, [10]);
		self::assertTrue($this->manager->user_matches_groups(1, 100));

		$this->manager->set_announcement_groups(1, [20]);
		$query_count = $this->db->sql_num_queries();
		self::assertFalse($this->manager->user_matches_groups(1, 100));
		self::assertSame($query_count + 1, $this->db->sql_num_queries());
	}

	public function test_descendant_matching_and_cache()
	{
		$query_count = $this->db->sql_num_queries();
		self::assertTrue($this->manager->location_matches_descendant(11, [10]));
		self::assertSame($query_count + 1, $this->db->sql_num_queries());

		self::assertFalse($this->manager->location_matches_descendant(11, [12]));
		self::assertSame($query_count + 1, $this->db->sql_num_queries());

		self::assertFalse($this->manager->location_matches_descendant(0, [10]));
		self::assertFalse($this->manager->location_matches_descendant(11, []));
		self::assertSame($query_count + 1, $this->db->sql_num_queries());

		self::assertFalse($this->manager->location_matches_descendant(12, [10]));
		self::assertSame($query_count + 2, $this->db->sql_num_queries());

		$this->db->sql_query('UPDATE phpbb_forums SET left_id = 7, right_id = 8 WHERE forum_id = 11');
		self::assertTrue($this->manager->location_matches_descendant(11, [10]));
	}
}
