/*global storeCaret, initInsertions, VanillaCalendarPro */

(() => {
	'use strict';

	function onReady(callback) {
		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', callback);
		} else {
			callback();
		}
	}

	function filterItems(input, items, attribute) {
		const query = input.value.toLocaleLowerCase().trim();
		items.forEach((item) => {
			item.hidden = !(item.getAttribute(attribute) || '').includes(query);
		});
	}

	function parseDateTime(value) {
		const match = String(value || '').trim().match(/^(\d{4})-(\d{2})-(\d{2}) ([01]\d|2[0-3]):([0-5]\d)$/);
		if (!match) {
			return null;
		}

		const year = Number(match[1]);
		const month = Number(match[2]);
		const day = Number(match[3]);
		const date = new Date(year, month - 1, day);
		if (date.getFullYear() !== year || date.getMonth() !== month - 1 || date.getDate() !== day) {
			return null;
		}

		return {
			date: `${match[1]}-${match[2]}-${match[3]}`,
			time: `${match[4]}:${match[5]}`,
		};
	}

	function getDefaultTime() {
		const now = new Date();
		return `${String(now.getHours()).padStart(2, '0')}:${String(now.getMinutes()).padStart(2, '0')}`;
	}

	function syncDatePicker(calendar, input) {
		const value = parseDateTime(input.value);
		const selectedDates = calendar.context.selectedDates || [];
		if (!value) {
			if (!input.value.trim() && selectedDates.length) {
				calendar.set({ selectedDates: [] });
			}
			return;
		}

		if (selectedDates[0] !== value.date || calendar.context.selectedTime !== value.time) {
			calendar.set({
				selectedDates: [ value.date ],
				selectedTime: value.time,
			});
		}
	}

	function getCalendarLocale(value) {
		const locale = String(value || '').replace(/_/g, '-');
		try {
			new Intl.DateTimeFormat(locale).format();
			return locale;
		} catch (error) {
			return 'en-GB';
		}
	}

	function initializeDatePicker(input, locale) {
		if (!input || typeof VanillaCalendarPro === 'undefined') {
			return;
		}

		/** @type {typeof import('vanilla-calendar-pro')} */
		const calendarPro = VanillaCalendarPro;
		const { Calendar, time } = calendarPro;
		const initialValue = parseDateTime(input.value);
		/** @type {import('vanilla-calendar-pro').Options} */
		const options = {
			extensions: [ time ],
			inputMode: true,
			positionToInput: 'auto',
			locale,
			firstWeekday: 0,
			disableDatesPast: true,
			enableDateToggle: false,
			enableJumpToSelectedDate: true,
			selectionDatesMode: 'single',
			selectionTimeMode: 24,
			selectedDates: initialValue ? [ initialValue.date ] : [],
			selectedTime: initialValue ? initialValue.time : getDefaultTime(),
			selectedTheme: 'light',
			styles: { calendar: 'vc ba-calendar' },
			timeStepMinute: 1,
			onChangeToInput(self) {
				const selectedDate = self.context.selectedDates[0];
				if (!selectedDate) {
					return;
				}

				input.value = `${selectedDate} ${self.context.selectedTime}`;
				input.dispatchEvent(new Event('change', { bubbles: true }));
			},
			onShow(self) {
				syncDatePicker(self, input);
			},
		};
		const calendar = new Calendar(input, options);
		calendar.init();
		input.addEventListener('input', () => syncDatePicker(calendar, input));
	}

	onReady(() => {
		const settingsForm = document.getElementById('board_announcement_settings');
		if (settingsForm && window.phpbb) {
			const warning = document.querySelector('[data-ba-global-disabled]');
			let savedValue = settingsForm.querySelector('input[name="board_announcements_enable_all"]:checked').value;

			const restoreValue = () => {
				const savedRadio = settingsForm.querySelector(`input[name="board_announcements_enable_all"][value="${savedValue}"]`);
				if (savedRadio) {
					savedRadio.checked = true;
				}
			};

			window.phpbb.addAjaxCallback('board_announcements_toggle', (response) => {
				if (!response.success) {
					restoreValue();
					return;
				}

				savedValue = response.enabled ? '1' : '0';
				if (warning) {
					warning.hidden = response.enabled;
				}
			});

			settingsForm.addEventListener('change', (event) => {
				if (event.target.name !== 'board_announcements_enable_all') {
					return;
				}

				if (typeof settingsForm.requestSubmit === 'function') {
					settingsForm.requestSubmit();
				} else {
					const submitButton = document.createElement('button');
					submitButton.type = 'submit';
					submitButton.hidden = true;
					settingsForm.appendChild(submitButton);
					submitButton.click();
					submitButton.remove();
				}
			});
		}

		const selectAll = document.querySelector('[data-ba-select-all]');
		if (selectAll) {
			selectAll.addEventListener('change', () => {
				document.querySelectorAll('input[name="announcement_ids[]"]').forEach((checkbox) => {
					checkbox.checked = selectAll.checked;
				});
			});
		}

		const editor = document.querySelector('[data-ba-editor]');
		if (!editor) {
			return;
		}

		window.form_name = 'add_board_announcements';
		window.text_name = 'board_announcements_text';
		window.load_draft = false;
		window.upload = false;
		window.imageTag = false;

		const previewButton = editor.querySelector('[data-ba-preview-request]');
		const previewSlot = editor.querySelector('[data-ba-preview-slot]');
		const dismissControls = editor.querySelectorAll('input[name="board_announcements_dismiss"]');
		const updatePreviewDismiss = () => {
			const selected = editor.querySelector('input[name="board_announcements_dismiss"]:checked');
			const previewDismiss = previewSlot && previewSlot.querySelector('[data-ba-preview-dismiss]');
			if (selected && previewDismiss) {
				previewDismiss.hidden = selected.value !== '1';
			}
		};
		dismissControls.forEach((control) => control.addEventListener('change', updatePreviewDismiss));
		updatePreviewDismiss();
		if (previewButton && previewSlot && window.phpbb) {
			let previewRequested = false;

			window.phpbb.addAjaxCallback('board_announcements_preview', (response) => {
				if (!response.success || typeof response.preview_html !== 'string') {
					return;
				}

				const currentPreview = previewSlot.querySelector('#ba-preview');
				const mobile = currentPreview && currentPreview.hasAttribute('data-mobile');
				previewSlot.innerHTML = response.preview_html;

				const updatedPreview = previewSlot.querySelector('#ba-preview');
				if (mobile && updatedPreview) {
					updatedPreview.setAttribute('data-mobile', '');
				}
				updatePreviewDismiss();
				window.scrollTo(0, 0);
			});

			window.phpbb.ajaxify({
				selector: editor,
				callback: 'board_announcements_preview',
				filter(data) {
					if (!previewRequested) {
						return false;
					}

					previewRequested = false;
					data.push({ name: 'action', value: 'preview' });
					return true;
				},
			});

			previewButton.addEventListener('click', () => {
				previewRequested = true;
				if (typeof editor.requestSubmit === 'function') {
					editor.requestSubmit();
				} else {
					const submitButton = document.createElement('button');
					submitButton.type = 'submit';
					submitButton.hidden = true;
					editor.appendChild(submitButton);
					submitButton.click();
					submitButton.remove();
				}
			});
		}

		editor.addEventListener('click', (event) => {
			const mobileButton = event.target.closest('[data-ba-preview-mobile]');
			if (!mobileButton) {
				return;
			}

			const preview = previewSlot && previewSlot.querySelector('#ba-preview');
			if (preview) {
				preview.toggleAttribute('data-mobile');
			}
		});

		const calendarLocale = getCalendarLocale(editor.getAttribute('data-user-lang'));
		initializeDatePicker(document.getElementById('board_announcements_start'), calendarLocale);
		initializeDatePicker(document.getElementById('board_announcements_expiry'), calendarLocale);

		const textarea = document.getElementById('board_announcements_text');
		if (textarea) {
			[ 'select', 'click', 'keyup' ].forEach((eventName) => {
				textarea.addEventListener(eventName, (event) => {
					if (typeof storeCaret === 'function') {
						storeCaret(event.target);
					}
				});
			});
			textarea.addEventListener('focus', () => {
				if (typeof initInsertions === 'function') {
					initInsertions();
				}
			});
		}

		const audience = document.getElementById('board_announcements_users');
		const groups = editor.querySelector('[data-ba-groups]');
		if (audience && groups) {
			const updateGroups = () => {
				const active = audience.value === editor.getAttribute('data-groups-value');
				groups.hidden = !active;
				audience.setAttribute('aria-expanded', active ? 'true' : 'false');
				groups.querySelectorAll('input, select, button').forEach((control) => {
					control.disabled = !active;
				});
			};
			audience.addEventListener('change', updateGroups);
			updateGroups();
		}

		const groupSearch = editor.querySelector('[data-ba-group-search]');
		if (groupSearch) {
			const groupItems = editor.querySelectorAll('[data-ba-group-name]');
			groupSearch.addEventListener('input', () => {
				filterItems(groupSearch, groupItems, 'data-ba-group-name');
			});
		}

		const locationMode = document.getElementById('board_announcements_location_mode');
		const locationPanel = editor.querySelector('[data-ba-locations]');
		if (locationMode && locationPanel) {
			const updateLocations = () => {
				const active = locationMode.value === 'selected';
				locationPanel.hidden = !active;
				locationMode.setAttribute('aria-expanded', active ? 'true' : 'false');
				locationPanel.querySelectorAll('input, select, button').forEach((control) => {
					control.disabled = !active;
				});
			};
			locationMode.addEventListener('change', updateLocations);
			updateLocations();
		}

		const locationSearch = document.getElementById('board_announcements_location_search');
		if (locationSearch) {
			const locations = document.querySelectorAll('[data-ba-location-name]');
			const locationEmpty = document.querySelector('[data-ba-location-empty]');
			const updateLocationFilter = () => {
				filterItems(locationSearch, locations, 'data-ba-location-name');
				locationEmpty.hidden = Array.from(locations).some((location) => !location.hidden);
			};
			locationSearch.addEventListener('input', updateLocationFilter);
		}

		const tone = document.getElementById('board_announcements_tone');
		const customColor = editor.querySelector('[data-ba-custom-color]');
		const colorInput = document.getElementById('board_announcements_bgcolor');
		const colorPicker = document.getElementById('board_announcements_bgcolor_picker');
		const normalizeColor = (value) => String(value || '').replace(/^#/, '').trim().toUpperCase();
		if (colorInput && colorPicker) {
			const updatePicker = () => {
				const color = normalizeColor(colorInput.value);
				if (/^[0-9A-F]{6}$/.test(color)) {
					colorPicker.value = `#${color}`;
				}
			};
			colorPicker.addEventListener('input', () => {
				colorInput.value = normalizeColor(colorPicker.value);
			});
			colorInput.addEventListener('input', updatePicker);
			colorInput.addEventListener('blur', () => {
				colorInput.value = normalizeColor(colorInput.value);
			});
			updatePicker();
		}

		if (tone && customColor && colorInput && colorPicker) {
			const updateCustomColor = () => {
				const custom = tone.value === editor.dataset.customTone;
				customColor.classList.toggle('is-disabled', !custom);
				customColor.setAttribute('aria-disabled', custom ? 'false' : 'true');
				colorInput.disabled = !custom;
				colorPicker.disabled = !custom;
				if (custom && !/^[0-9A-F]{6}$/i.test(colorInput.value)) {
					colorInput.value = normalizeColor(colorPicker.value);
				}
			};
			tone.addEventListener('change', updateCustomColor);
			updateCustomColor();
		}

	});
})();
