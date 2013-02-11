# Configuration Settings Extension

- Version: 1.7
- Author: Stephen Bau (bauhouse@gmail.com)
- Website: http://stephenbau.com/
- Build Date: 11 February 2013
- Requirements: Symphony 2.3


## Note

Be sure that your configuration settings are backed up before using this extension. The only thing this extension does is modify the `manifest/config.php` file. So, if anything goes wrong when saving the configuration settings with this extension, you'll be able to restore the original configuration settings by manually overwriting the file.

## Installation

1. Upload the 'configuration' folder in this archive to your Symphony 'extensions' folder.
2. Enable it by selecting the "Configuration Settings" Extension, choose Enable from the with-selected menu, then click Apply.
3. You can now edit the Configuration Settings file (/manifest/config.php) from within the Symphony administration interface.


## Usage

- A "Configuration" menu is added to the Symphony administration interface that provides an an "Edit Configuration Settings" page.
- The current version of Symphony is displayed on the "Preferences" page.
- Modify the Site Name on the "Preferences" page.


## Change Log

Version 1.7 - 11 February 2013

- Add Italian language translation

Version 1.6 - 29 October 2012

- Set the database settings fields to be read-only, not disabled
- Add `Read Only` to the label of database field inputs

Version 1.5 - 6 October 2012

- Moved the Configuration page into the System menu
- Formatted legend and setting field labels to use title case
- Disabled the database settings fields to make them read-only

Version 1.4 - 5 October 2012

- Updated for Symphony 2.3 (Contributed by [Brian Zerangue](http://symphony-cms.com/get-involved/member/bzerangue/).)

Version 1.3.5 - 5 November 2011

- Handle special characters for the Site Name setting on the Preferences page

Version 1.3.4 - 5 November 2011

- Fixed a minor bug when using this in conjunction with search index: Escape value output for parameters in case they contain special characters. (Contributed by [David Anderson](http://symphony-cms.com/get-involved/member/davjand/).)
- Update Romanian translation. (Contributed by [Vlad Ghita](http://symphony-cms.com/get-involved/member/vladG/).)

Version 1.3.3 - 10 February 2011

- Enable localization.
- Integrate Romanian translation. (Contributed by [Vlad Ghita](http://symphony-cms.com/get-involved/member/vladG/).)

Version 1.3.2 - 10 February 2011

- Reformat Configuration Settings page as an edit form rather than an index table to be more consistent with Symphony interface conventions.

Version 1.3.1 - 10 February 2011

- Replace deprecated accessors for forward compatibility.

Version 1.3 - 5 February 2011

- Removed the ability to display the current version of Symphony to the "Preferences" page.
- Update extension for Symphony 2.2.

Version 1.2 - 12 August 2009

- Limit access of Configuration Settings page to Developers.

Version 1.1 - 12 August 2009

- Removed Configuration Overview page.
- Removed the ability to modify `group` and `name` indices of the configuration settings array.
- Moved Configuration page to System menu. 
- Added the ability to display the current version of Symphony to the "Preferences" page.
- Added the ability to modify the Site Name on the "Preferences" page.

Version 1.0 - 2 January 2009

- Initial Release