# Changelog

## 1.3.0 - 2024-06-28

- Feature: Announcements can now be assigned to one or more specific forums, in addition to the usual options of Board Index only or Everywhere.
- Updated language packs:
	- Brazilian Portuguese
	- Chinese (simplified)
	- Greek
- Added language packs:
	- Slovenian

## 1.2.1 - 2023-07-30

- Fixed a bug when using non-English in the ACP where the DatePicker would enter an expiration date that is not understood by PHP, reverted to the numerical date style as used in prior versions.
- Updated French, German, and Turkish language packs

## 1.2.0 - 2023-04-15

- Feature: Multiple announcements are now supported!
	- Unlimited, sortable, and individually customisable.
- Dropped support for phpBB 3.2.x. Now requires phpBB 3.3.0 or newer
- Added language packs:
	- Ukrainian
	- Spanish (casual honorifics)

## 1.1.1 - 2022-06-27

- Replaced the close announcement icon image with a Font Awesome icon
- Minor under the hood updates
- Added language packs:
	- Vietnamese

## 1.1.0 - 2018-05-12

- Feature: added the option to display the announcement on the board index only
- Dropped support for phpBB 3.1.x. Now requires phpBB 3.2.0 or newer
- Added language packs:
	- Slovakian

## 1.0.6 - 2017-05-07

- Feature: added the option to set an expiration date/time for the announcement
- Added language packs:
	- Czech
	- Turkish

## 1.0.5 - 2016-10-26

- Announcement can now be shown to only registered users, only guests, or everybody
- Added language packs:
	- Chinese (simplified)
	- Croatian (formal honorifics)
	- German (casual)
	- German (formal honorifics)
	- Norwegian

## 1.0.4 - 2015-07-04

- Fixed an issue where announcement disappears after a new user registers

## 1.0.3 - 2015-05-22

- Improve performance by caching the board announcement query
- Do not allow bots to close announcements
- Minor coding improvements
- Added language packs:
	- Brazilian Portuguese
	- Chinese (traditional)
	- Croatian
	- Danish
	- Greek
	- Hebrew
	- Italian
- Require phpBB 3.1.3 or newer

## 1.0.2 - 2015-01-04

- Fixed some very minor coding issues
- Switched to Titania hosted version checking

## 1.0.1 - 2014-11-28

- Add new option to toggle the ability for users to close announcements
	- Allow users to dismiss this board announcement: Yes / No
- Updated some language in the ACP
	- Display this board announcement: Yes / No
- No longer query announcement data when announcement is not being shown
- Updated routing.yml option `pattern` to `path`
- Fixed some coding guidelines issues
- Added language packs:
	- Arabic
	- Dutch
	- Estonian
	- French
	- Polish
	- Portuguese
	- Romanian
	- Russian
	- Spanish
	- Swedish

## 1.0.0 - 2014-10-22

- First release
