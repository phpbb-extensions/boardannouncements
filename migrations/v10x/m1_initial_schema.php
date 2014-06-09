<?php
/**
*
* @package Board Announcements Extension
* @copyright (c) 2014 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace phpbb\boardannouncements\migrations\v10x;

/**
* Migration stage 1: Initial schema changes to the database
*/
class m1_initial_schema extends \phpbb\db\migration\migration
{
	/**
	* Add the board announcements column to the users table.
	*
	* @return array Array of table schema
	* @access public
	*/
	public function update_schema()
	{
		return array(
			'add_columns'	=> array(
				$this->table_prefix . 'users'	=> array(
					'board_announcements_status'	=> array('BOOL', 0),
				),
			),
		);
	}

	/**
	* Drop the board announcements column from the users table.
	*
	* @return array Array of table schema
	* @access public
	*/
	public function revert_schema()
	{
		return array(
			'drop_columns'	=> array(
				$this->table_prefix . 'users'	=> array(
					'board_announcements_status',
				),
			),
		);
	}
}
