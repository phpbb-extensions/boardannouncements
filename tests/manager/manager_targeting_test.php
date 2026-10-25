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

	public function test_descendant_matching_and_cache()
	{
		self::assertTrue($this->manager->location_matches_descendant(11, [10]));
		self::assertFalse($this->manager->location_matches_descendant(12, [10]));
		self::assertFalse($this->manager->location_matches_descendant(0, [10]));
		self::assertFalse($this->manager->location_matches_descendant(11, []));

		$this->db->sql_query('UPDATE phpbb_forums SET left_id = 7, right_id = 8 WHERE forum_id = 11');
		self::assertTrue($this->manager->location_matches_descendant(11, [10]));
	}
}
