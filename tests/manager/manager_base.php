<?php
/**
 *
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2023 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\boardannouncements\tests\manager;

class manager_base extends \phpbb_database_test_case
{
	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\boardannouncements\manager\manager */
	protected $manager;

	/**
	 * @inheritdoc
	 */
	protected static function setup_extensions()
	{
		return ['phpbb/boardannouncements'];
	}

	/**
	 * @inheritdoc
	 */
	public function getDataSet()
	{
		return $this->createXMLDataSet(__DIR__ . '/../fixtures/board_announcements.xml');
	}

	/**
	 * @inheritdoc
	 */
	protected function setUp(): void
	{
		parent::setUp();

		$this->db = $this->new_dbal();

		$config = new \phpbb\config\config(['boardannouncements.table_lock.board_announcements_table' => 0]);
		$lock = new \phpbb\lock\db('boardannouncements.table_lock.board_announcements_table', $config, $this->db);

		$this->manager = new \phpbb\boardannouncements\manager\manager(
			new \phpbb\boardannouncements\manager\nestedset(
				$this->db,
				$lock,
				'phpbb_board_announcements',
				'phpbb_board_announcements_track'
			)
		);
	}

}
