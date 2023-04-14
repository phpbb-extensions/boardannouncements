<?php
/**
 *
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2023 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\boardannouncements\cron;

use phpbb\boardannouncements\manager\manager;
use phpbb\config\config;

class disable_expired extends \phpbb\cron\task\base
{
	/** @var config */
	protected $config;

	/** @var manager */
	protected $manager;

	/**
	 * Constructor
	 *
	 * @param config $config Config object
	 * @param manager $manager Board announcements manager object
	 */
	public function __construct(config $config, manager $manager)
	{
		$this->config = $config;
		$this->manager = $manager;
	}

	/**
	 * Runs this cron task.
	 *
	 * @return void
	 */
	public function run()
	{
		foreach ($this->manager->get_expired_announcements('announcement_id') as $id)
		{
			$this->manager->disable_announcement($id);
		}

		$this->config->set('board_announcements_cron_last_run', time(), false);
	}

	/**
	 * Returns whether this cron task should run now, because enough time has passed since the last run.
	 *
	 * @return bool
	 */
	public function should_run()
	{
		return $this->config['board_announcements_cron_last_run'] < strtotime('24 hours ago');
	}
}
