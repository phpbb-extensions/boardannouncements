// Add an AJAX callback function
phpbb.addAjaxCallback('close_announcement', function(res) {
//	if (res.success) {	// un-comment this line when we have an AJAX response working
		phpbb.toggleDisplay('phpbb_announcement', -1);
//	}	// un-comment this line when we have an AJAX response working
});
