<?php
/**
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2026 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 */

namespace phpbb\boardannouncements\tests\migrations;

class legacy_upgrade_test extends \phpbb_database_test_case
{
	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\db\tools\tools_interface */
	protected $db_tools;

	protected static function setup_extensions()
	{
		return ['phpbb/boardannouncements'];
	}

	public function getDataSet()
	{
		return $this->createXMLDataSet(__DIR__ . '/../fixtures/legacy_upgrade.xml');
	}

	protected function setUp(): void
	{
		parent::setUp();
		$this->db = $this->new_dbal();
		$this->db_tools = (new \phpbb\db\tools\factory())->get($this->new_doctrine_dbal());

		$migration = $this->migration('\phpbb\boardannouncements\migrations\v20x\m1_schema');
		$this->db_tools->perform_schema_changes($migration->revert_schema());
	}

	public function test_v131_database_and_acl_data_upgrade_through_phpbb_migrator()
	{
		global $cache, $config, $db, $phpbb_dispatcher, $phpbb_root_path, $phpEx;

		$config = new \phpbb\config\config([]);
		$db = $this->db;
		$phpbb_dispatcher = new \phpbb\event\dispatcher();
		$cache_driver = new \phpbb\cache\driver\dummy();
		$cache = new \phpbb\cache\service($cache_driver, $config, $this->db, $phpbb_dispatcher, $phpbb_root_path, $phpEx);
		$auth = new \phpbb\auth\auth();

		$container = new \Symfony\Component\DependencyInjection\ContainerBuilder();
		$container->set('cache', $cache);
		$container->set('event_dispatcher', $phpbb_dispatcher);
		$permission = new \phpbb\db\migration\tool\permission($this->db, $cache, $auth, $phpbb_root_path, $phpEx);

		$migrator = new \phpbb\db\migrator(
			$container,
			$config,
			$this->db,
			$this->db_tools,
			'phpbb_migrations',
			$phpbb_root_path,
			$phpEx,
			'phpbb_',
			self::get_core_tables(),
			[$permission],
			new \phpbb\db\migration\helper()
		);
		$migrator->create_migrations_table();
		$migrator->populate_migrations(['\phpbb\boardannouncements\migrations\v10x\m15_unicode_description']);
		$migrator->set_migrations([
			'\phpbb\boardannouncements\migrations\v20x\m1_schema',
			'\phpbb\boardannouncements\migrations\v20x\m2_data',
		]);
		while (!$migrator->finished())
		{
			$migrator->update();
		}

		self::assertTrue($this->db_tools->sql_column_exists('phpbb_board_announcements', 'announcement_state'));
		self::assertTrue($this->db_tools->sql_table_exists('phpbb_board_announcement_groups'));
		self::assertEquals([
			['announcement_id' => '1', 'announcement_enabled' => '1', 'announcement_state' => 'published', 'announcement_tone' => 'custom', 'announcement_updated_at' => '100'],
			['announcement_id' => '2', 'announcement_enabled' => '0', 'announcement_state' => 'draft', 'announcement_tone' => 'info', 'announcement_updated_at' => '200'],
			['announcement_id' => '3', 'announcement_enabled' => '1', 'announcement_state' => 'published', 'announcement_tone' => 'info', 'announcement_updated_at' => '300'],
		], $this->rows('SELECT announcement_id, announcement_enabled, announcement_state, announcement_tone, announcement_updated_at
			FROM phpbb_board_announcements ORDER BY announcement_id'));
		self::assertSame('1', $this->field('SELECT COUNT(*) AS total FROM phpbb_board_announcements_track WHERE announcement_id = 1 AND user_id = 42', 'total'));
		self::assertSame('ext_phpbb/boardannouncements && acl_a_boardannouncements', $this->field('SELECT module_auth FROM phpbb_modules WHERE module_id = 1', 'module_auth'));

		$new_option_id = (int) $this->field("SELECT auth_option_id FROM phpbb_acl_options WHERE auth_option = 'a_boardannouncements'", 'auth_option_id');
		self::assertGreaterThan(0, $new_option_id);
		self::assertSame('1', $this->field('SELECT COUNT(*) AS total FROM phpbb_acl_roles_data WHERE role_id = 11 AND auth_option_id = ' . $new_option_id . ' AND auth_setting = 1', 'total'));
		self::assertSame('1', $this->field('SELECT COUNT(*) AS total FROM phpbb_acl_roles_data WHERE role_id = 12 AND auth_option_id = ' . $new_option_id . ' AND auth_setting = 1', 'total'));
	}

	protected function migration($class)
	{
		global $phpbb_root_path, $phpEx;

		return new $class(new \phpbb\config\config([]), $this->db, $this->db_tools, $phpbb_root_path, $phpEx, 'phpbb_', self::get_core_tables());
	}

	protected function rows($sql)
	{
		$result = $this->db->sql_query($sql);
		$rows = $this->db->sql_fetchrowset($result);
		$this->db->sql_freeresult($result);

		return $rows;
	}

	protected function field($sql, $field)
	{
		$result = $this->db->sql_query($sql);
		$value = $this->db->sql_fetchfield($field);
		$this->db->sql_freeresult($result);

		return (string) $value;
	}
}
