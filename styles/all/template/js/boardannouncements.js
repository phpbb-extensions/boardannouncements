(function() {
	'use strict';

	phpbb.addAjaxCallback('close_announcement', function(res) {
		if (!res.success) {
			return;
		}
		var announcement = document.getElementById('phpbb_announcement_' + res.id);
		if (!announcement) {
			return;
		}
		announcement.remove();
	});
}());
