<?php
/**
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2026 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 */

namespace phpbb\boardannouncements\tests\manager;

class manager_transaction_test extends manager_base
{
	/** @var failing_nestedset */
	protected $failing_nestedset;

	protected function setUp(): void
	{
		parent::setUp();
		if ($this->db->get_sql_layer() === 'mysqli')
		{
			$table_status = $this->db->get_table_status('phpbb_board_announcements');
			if (isset($table_status['Engine']) && $table_status['Engine'] === 'MyISAM')
			{
				self::markTestSkipped('MyISAM does not support transaction rollback.');
			}
		}

		$config = new \phpbb\config\config(['boardannouncements.table_lock.board_announcements_table' => 0]);
		$this->failing_nestedset = new failing_nestedset(
			$this->db,
			new \phpbb\lock\db('boardannouncements.table_lock.board_announcements_table', $config, $this->db),
			'phpbb_board_announcements',
			'phpbb_board_announcements_track',
			'phpbb_board_announcement_groups',
			'phpbb_user_group',
			'phpbb_forums'
		);
		$this->manager = new \phpbb\boardannouncements\manager\manager($this->failing_nestedset);
	}

	public function test_insert_and_group_mapping_roll_back_together()
	{
		$before = count($this->manager->get_announcements());
		$this->failing_nestedset->fail_groups = true;

		try
		{
			$this->manager->save_announcement(array_replace($this->manager->announcement_columns(), [
				'announcement_text' => 'Atomic insert',
				'announcement_description' => 'Atomic insert',
			]), [10]);
			self::fail('Expected injected group mapping failure.');
		}
		catch (\RuntimeException $e)
		{
			self::assertSame('Injected group mapping failure', $e->getMessage());
		}

		self::assertCount($before, $this->manager->get_announcements());
	}

	public function test_update_and_group_replacement_roll_back_together()
	{
		$this->manager->set_announcement_groups(1, [10]);
		$original = $this->manager->get_announcement_data(1, 'announcement_description');
		$this->failing_nestedset->fail_groups = true;

		try
		{
			$this->manager->update_announcement(1, ['announcement_description' => 'Changed'], [20]);
			self::fail('Expected injected group mapping failure.');
		}
		catch (\RuntimeException $e)
		{
			self::assertSame('Injected group mapping failure', $e->getMessage());
		}

		self::assertSame($original, $this->manager->get_announcement_data(1, 'announcement_description'));
		self::assertSame([10], $this->manager->get_announcement_groups(1));
	}

	public function test_delete_and_relations_roll_back_together()
	{
		$this->manager->set_announcement_groups(2, [10]);
		$this->failing_nestedset->fail_groups = true;

		try
		{
			$this->manager->delete_announcement(2);
			self::fail('Expected injected group mapping failure.');
		}
		catch (\RuntimeException $e)
		{
			self::assertSame('Injected group mapping failure', $e->getMessage());
		}

		self::assertNotEmpty($this->manager->get_announcement(2));
		self::assertSame([10], $this->manager->get_announcement_groups(2));
		self::assertSame(1, $this->count_dismissals(2, 200));
	}

	public function test_revision_and_dismissal_reset_roll_back_together()
	{
		$revision = (int) $this->manager->get_announcement_data(2, 'announcement_revision');
		$this->failing_nestedset->fail_tracking = true;

		try
		{
			$this->manager->show_announcement_again(2);
			self::fail('Expected injected tracking failure.');
		}
		catch (\RuntimeException $e)
		{
			self::assertSame('Injected tracking failure', $e->getMessage());
		}

		self::assertSame($revision, (int) $this->manager->get_announcement_data(2, 'announcement_revision'));
		self::assertSame(1, $this->count_dismissals(2, 200));
	}
}

class failing_nestedset extends \phpbb\boardannouncements\manager\nestedset
{
	/** @var bool */
	public $fail_groups = false;

	/** @var bool */
	public $fail_tracking = false;

	protected function replace_announcement_groups($item_id, array $group_ids)
	{
		parent::replace_announcement_groups($item_id, $group_ids);
		if ($this->fail_groups)
		{
			throw new \RuntimeException('Injected group mapping failure');
		}
	}

	public function delete_tracked_items($item_id)
	{
		$result = parent::delete_tracked_items($item_id);
		if ($this->fail_tracking)
		{
			throw new \RuntimeException('Injected tracking failure');
		}

		return $result;
	}
}
