# Configuration Settings Extension

- Version: 1.3
- Author: Stephen Bau (stephen@domain7.com)
- Website: http://www.domain7.com/
- Build Date: 5 February 2011
- Requirements: Symphony 2.2


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