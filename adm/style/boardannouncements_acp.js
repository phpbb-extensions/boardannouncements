(function () {
	'use strict';

	function onReady(callback) {
		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', callback);
		} else {
			callback();
		}
	}

	function filterItems(input, items, attribute) {
		var query = input.value.toLocaleLowerCase().trim();
		items.forEach(function (item) {
			item.hidden = (item.getAttribute(attribute) || '').indexOf(query) === -1;
		});
	}

	onReady(function () {
		var selectAll = document.querySelector('[data-ba-select-all]');
		if (selectAll) {
			selectAll.addEventListener('change', function () {
				document.querySelectorAll('input[name="announcement_ids[]"]').forEach(function (checkbox) {
					checkbox.checked = selectAll.checked;
				});
			});
		}

		var editor = document.querySelector('[data-ba-editor]');
		if (!editor) {
			return;
		}

		window.form_name = 'add_board_announcements';
		window.text_name = 'board_announcements_text';
		window.load_draft = false;
		window.upload = false;
		window.imageTag = false;

		if (window.jQuery) {
			var $ = window.jQuery;
			var color = editor.getAttribute('data-bgcolor') || '';
			var $colorInput = $('#board_announcements_bgcolor');
			if ($colorInput.length && typeof $colorInput.colpick === 'function') {
				$colorInput.colpick({
					layout: 'hex',
					submit: 0,
					onBeforeShow: function () {
						if (color !== '') {
							$(this).colpickSetColor(color);
							color = '';
						}
					},
					onChange: function (hsb, hex, rgb, element, bySetColor) {
						$(element).css('border-inline-end', '20px solid #' + hex);
						if (!bySetColor) {
							$(element).val(hex);
						}
					}
				}).on('keyup', function () {
					$(this).colpickSetColor(this.value || 'ffffff');
				});
			}

			var $dates = $('#board_announcements_start, #board_announcements_expiry');
			if ($dates.length && typeof $dates.datetimepicker === 'function') {
				$.datetimepicker.setLocale(editor.getAttribute('data-user-lang'));
				$dates.datetimepicker({
					format: editor.getAttribute('data-date-format'),
					validateOnBlur: false,
					minDate: 0
				});
			}
		}

		var textarea = document.getElementById('board_announcements_text');
		if (textarea) {
			['select', 'click', 'keyup'].forEach(function (eventName) {
				textarea.addEventListener(eventName, function (event) {
					if (typeof storeCaret === 'function') {
						storeCaret(event.target);
					}
				});
			});
			textarea.addEventListener('focus', function () {
				if (typeof initInsertions === 'function') {
					initInsertions();
				}
			});
		}

		var audience = document.getElementById('board_announcements_users');
		var groups = editor.querySelector('[data-ba-groups]');
		if (audience && groups) {
			var updateGroups = function () {
				var active = audience.value === editor.getAttribute('data-groups-value');
				groups.hidden = !active;
				audience.setAttribute('aria-expanded', active ? 'true' : 'false');
				groups.querySelectorAll('input, select, button').forEach(function (control) {
					control.disabled = !active;
				});
			};
			audience.addEventListener('change', updateGroups);
			updateGroups();
		}

		var groupSearch = editor.querySelector('[data-ba-group-search]');
		if (groupSearch) {
			var groupItems = editor.querySelectorAll('[data-ba-group-name]');
			groupSearch.addEventListener('input', function () {
				filterItems(groupSearch, groupItems, 'data-ba-group-name');
			});
		}

		var locationSearch = document.getElementById('board_announcements_location_search');
		if (locationSearch) {
			var locations = document.querySelectorAll('[data-ba-location-name]');
			var locationCheckboxes = document.querySelectorAll('input[name="board_announcements_locations[]"]');
			var locationCount = document.querySelector('[data-ba-location-count]');
			var locationEmpty = document.querySelector('[data-ba-location-empty]');
			var updateLocationCount = function () {
				locationCount.textContent = document.querySelectorAll('input[name="board_announcements_locations[]"]:checked').length;
			};
			var updateLocationFilter = function () {
				filterItems(locationSearch, locations, 'data-ba-location-name');
				locationEmpty.hidden = Array.prototype.some.call(locations, function (location) {
					return !location.hidden;
				});
			};
			locationSearch.addEventListener('input', function () {
				updateLocationFilter();
			});
			document.querySelector('[data-ba-select-visible]').addEventListener('click', function () {
				locations.forEach(function (location) {
					var checkbox = location.querySelector('input[type="checkbox"]');
					if (!location.hidden && checkbox) {
						checkbox.checked = true;
					}
				});
				updateLocationCount();
			});
			document.querySelector('[data-ba-clear-locations]').addEventListener('click', function () {
				locationCheckboxes.forEach(function (checkbox) {
					checkbox.checked = false;
				});
				updateLocationCount();
			});
			locationCheckboxes.forEach(function (checkbox) {
				checkbox.addEventListener('change', updateLocationCount);
			});
			updateLocationCount();
		}

		var tone = document.getElementById('board_announcements_tone');
		var customColor = editor.querySelector('[data-ba-custom-color]');
		var colorInput = document.getElementById('board_announcements_bgcolor');
		if (tone && customColor && colorInput) {
			var updateCustomColor = function () {
				var custom = tone.value === 'custom';
				customColor.hidden = !custom;
				colorInput.disabled = !custom;
			};
			tone.addEventListener('change', updateCustomColor);
			updateCustomColor();
		}

		var preview = document.getElementById('ba-preview');
		if (preview) {
			document.querySelectorAll('[data-ba-preview-theme]').forEach(function (button) {
				button.addEventListener('click', function () {
					preview.setAttribute('data-theme', button.getAttribute('data-ba-preview-theme'));
				});
			});

			var mobileButton = document.querySelector('[data-ba-preview-mobile]');
			if (mobileButton) {
				mobileButton.addEventListener('click', function () {
					preview.toggleAttribute('data-mobile');
				});
			}
		}
	});
}());
