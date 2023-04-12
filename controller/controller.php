<?php
/**
 *
 * Board Announcements extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbb\boardannouncements\controller;

use phpbb\boardannouncements\manager\manager;
use phpbb\exception\http_exception;
use phpbb\request\request;
use phpbb\user;
use Symfony\Component\HttpFoundation\JsonResponse;

class controller
{
	/** @var manager $manager */
	protected $manager;

	/** @var request */
	protected $request;

	/** @var user */
	protected $user;

	/**
	 * Constructor
	 *
	 * @param manager $manager
	 * @param request $request Request object
	 * @param user $user User object
	 * @access public
	 */
	public function __construct(manager $manager, request $request, user $user)
	{
		$this->manager = $manager;
		$this->request = $request;
		$this->user = $user;
	}

	/**
	* Board Announcements controller accessed from the URL /boardannouncements/close/id
	*
	* @throws http_exception A http exception
	* @return JsonResponse A Symfony JSON Response object
	* @access public
	*/
	public function close_announcement($id)
	{
		// Get the announcements data
		$announcement = $this->manager->get_announcement($id);

		// Check for unauthorized attacks
		if (empty($announcement) || !$announcement['announcement_dismissable'] || !check_link_hash($this->request->variable('hash', ''), 'close_boardannouncement'))
		{
			throw new http_exception(403, 'NO_AUTH_OPERATION');
		}

		// Set a cookie
		$this->user->set_cookie('ba_' . $announcement['announcement_id'], $announcement['announcement_timestamp'], strtotime('+1 year'));
		$response = true;

		// Close the announcement for registered users
		if ($this->user->data['is_registered'])
		{
			$response = $this->manager->close_announcement($announcement['announcement_id'], $this->user->data['user_id']);
		}

		// Send a JSON response if an AJAX request was used
		if ($this->request->is_ajax())
		{
			return new JsonResponse([
				'success' 	=> $response,
				'id'		=> (int) $announcement['announcement_id']
			]);
		}

		// Redirect the user back to their last viewed page (non-AJAX requests)
		$redirect = $this->request->variable('redirect', $this->user->data['session_page']);
		$redirect = reapply_sid($redirect);
		redirect($redirect);

		// We shouldn't get here, but throw a http exception just in case
		throw new http_exception(500, 'GENERAL_ERROR');
	}
}
