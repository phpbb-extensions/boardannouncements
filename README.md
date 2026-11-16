# phpBB Board Announcements Extension

Board Announcements lets you display important messages across your phpBB forum or in selected forums.

- Drafts and scheduled announcements
- Audience selection by user group
- Forum and subforum selection
- Custom headings and colour schemes
- Dismissible announcements
- Announcement duplication and archiving

Requires phpBB 3.3.2 or later, including phpBB 4.

[![Build Status](https://github.com/phpbb-extensions/boardannouncements/actions/workflows/tests.yml/badge.svg)](https://github.com/phpbb-extensions/boardannouncements/actions)
[![codecov](https://codecov.io/gh/phpbb-extensions/boardannouncements/branch/master/graph/badge.svg?token=9laLSqCOgN)](https://codecov.io/gh/phpbb-extensions/boardannouncements)

## Install

1. [Download the latest validated release](https://www.phpbb.com/customise/db/extension/boardannouncements/).
2. Unzip the downloaded release and copy it to the `ext` directory of your phpBB board.
3. Navigate in the ACP to `Customise -> Manage extensions`.
4. Look for `Board Announcements` under the Disabled Extensions list, and click its `Enable` link.
5. Set up and configure Board Announcements by navigating in the ACP to `Extensions` -> `Board Announcements`.

Grant `Can manage board announcements` under Administrative permissions to staff who should manage notices. Existing Full and Standard Administrator roles receive this permission during upgrade.

## Uninstall

1. Navigate in the ACP to `Customise -> Extension Management -> Extensions`.
2. Look for `Board Announcements` under the Enabled Extensions list, and click its `Disable` link.
3. To permanently uninstall, click `Delete Data` and then delete the `/ext/phpbb/boardannouncements` directory.

## Support

* **Important: Only official release versions validated by the phpBB Extensions Team should be installed on a live forum. Pre-release (beta, RC) versions downloaded from this repository are only to be used for testing on offline/development forums and are not officially supported.**
* Report bugs and other issues to our [Issue Tracker](https://github.com/phpbb-extensions/boardannouncements/issues).
* Support requests should be posted and discussed in the [Board Announcements topic at phpBB.com](https://www.phpbb.com/customise/db/extension/boardannouncements/support).

## Translations

* Translations should be posted to the [Board Announcements topic at phpBB.com](https://www.phpbb.com/customise/db/extension/boardannouncements/support/topic/130751). We accept pull requests for translation corrections, but we do not accept pull requests for new translations.

## Licence
[GNU General Public License v2](https://opensource.org/licenses/GPL-2.0)
