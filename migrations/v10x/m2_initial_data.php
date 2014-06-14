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
* Migration stage 2: Initial data changes to the database
*/
class m2_initial_data extends \phpbb\db\migration\migration
{
	/**
	* Assign migration file dependencies for this migration
	*
	* @return array Array of migration files
	* @static
	* @access public
	*/
	static public function depends_on()
	{
		return array('\phpbb\boardannouncements\migrations\v10x\m1_initial_schema');
	}

	/**
	* Add board announcements data to the database.
	*
	* @return array Array of table data
	* @access public
	*/
	public function update_data()
	{
		return array(
			array('config.add', array('board_announcements_enable', 0)),
			array('config.add', array('board_announcements_guests', 0)),
			array('custom', array(array($this, 'add_announcements_info'))),
		);
	}

	/**
	* This is a custom function that will add board announcements
	* data fields to the config_text table of the database.
	*
	* @return null
	* @access public
	*/
	public function add_announcements_info()
	{
		$config_text = new \phpbb\config\db_text($this->db, $this->table_prefix . 'config_text');
		$config_text->set_array(array(
			'announcement_text'			=> '',
			'announcement_uid'			=> '',
			'announcement_bitfield'		=> '',
			'announcement_options'		=> OPTION_FLAG_BBCODE + OPTION_FLAG_SMILIES + OPTION_FLAG_LINKS,
			'announcement_bgcolor'		=> '',
			'announcement_timestamp'	=> '',
		));
	}

	/**
	* Delete board announcements data to the database.
	* We must run a custom function to revert the database.
	*
	* @return array Array of table data
	* @access public
	*/
	public function revert_data()
	{
		return array(
			array('custom', array(array($this, 'drop_announcements_info'))),
		);
	}

	/**
	* This is a custom function that will drop board announcements
	* data fields from the config_text table of the database.
	*
	* @return null
	* @access public
	*/
	public function drop_announcements_info()
	{
		$config_text = new \phpbb\config\db_text($this->db, $this->table_prefix . 'config_text');
		$config_text->delete_array(array(
			'announcement_text',
			'announcement_uid',
			'announcement_bitfield',
			'announcement_options',
			'announcement_bgcolor',
			'announcement_timestamp',
		));
	}
}
