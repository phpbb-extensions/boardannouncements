<?php
/**
 *
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2023 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\boardannouncements\migrations\v10x;

use phpbb\boardannouncements\manager\nestedset;

/**
 * Migration stage 10: Migrate and clean out old board announcement data
 */
class m10_update_data extends \phpbb\db\migration\container_aware_migration
{
	/**
	 * {@inheritdoc}
	 */
	public static function depends_on()
	{
		return [
			'\phpbb\boardannouncements\migrations\v10x\m1_initial_schema',
			'\phpbb\boardannouncements\migrations\v10x\m2_initial_data',
			'\phpbb\boardannouncements\migrations\v10x\m4_announcements_dismiss_config',
			'\phpbb\boardannouncements\migrations\v10x\m6_update_config',
			'\phpbb\boardannouncements\migrations\v10x\m7_announcements_expiry',
			'\phpbb\boardannouncements\migrations\v10x\m8_index_only',
			'\phpbb\boardannouncements\migrations\v10x\m9_schema_update',
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function effectively_installed()
	{
		return !$this->config->offsetExists('board_announcements_dismiss');
	}

	public function update_data()
	{
		return [
			['custom', [[$this, 'convert_board_announcements']]],
			['config.remove', ['board_announcements_dismiss']],
			['config.remove', ['board_announcements_users']],
			['config.remove', ['board_announcements_expiry']],
			['config.remove', ['board_announcements_index_only']],
			['config_text.remove', ['announcement_text']],
			['config_text.remove', ['announcement_uid']],
			['config_text.remove', ['announcement_bitfield']],
			['config_text.remove', ['announcement_options']],
			['config_text.remove', ['announcement_bgcolor']],
			['config_text.remove', ['announcement_timestamp']],
		];
	}

	public function convert_board_announcements()
	{
		$config_text = $this->container->get('config_text');

		$import_data = [];
		$import_data['announcement_description'] = '';
		$import_data['announcement_text']        = $config_text->get('announcement_text');
		$import_data['announcement_bgcolor']     = $config_text->get('announcement_bgcolor');
		$import_data['announcement_timestamp']   = (int) $config_text->get('announcement_timestamp');
		$import_data['announcement_enabled']     = (int) $this->config->offsetGet('board_announcements_enable');
		$import_data['announcement_indexonly']   = (int) $this->config->offsetGet('board_announcements_index_only');
		$import_data['announcement_dismissable'] = (int) $this->config->offsetGet('board_announcements_dismiss');
		$import_data['announcement_users']       = (int) $this->config->offsetGet('board_announcements_users');
		$import_data['announcement_expiry']      = (int) $this->config->offsetGet('board_announcements_expiry');

		// If we have data to import, let's go!! :)
		if (!empty($import_data['announcement_text'] ))
		{
			$nestedset = $this->get_nestedset();
			$nestedset->insert($import_data);
		}
	}

	/**
	 * Get the board announcements nested set object
	 *
	 * @return nestedset
	 */
	public function get_nestedset()
	{
		/** @var \phpbb\db\driver\driver_interface $db */
		$db = $this->container->get('dbal.conn');

		$lock = new \phpbb\lock\db('boardannouncements.table_lock.board_announcements_table', $this->config, $db);

		return new nestedset($db, $lock, $this->table_prefix . 'board_announcements', $this->table_prefix . 'board_announcements_track');
	}
}