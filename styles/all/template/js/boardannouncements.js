/* global phpbb */

(() => {
	'use strict';

	phpbb.addAjaxCallback('close_announcement', (res) => {
		if (!res.success) {
			return;
		}
		const announcement = document.getElementById(`phpbb_announcement_${res.id}`);
		if (!announcement) {
			return;
		}
		announcement.remove();
	});
})();
