# WP Translate Fixer

## Overview
WP Translate Fixer is a custom code snippet designed to fix translation loading issues for WordPress themes and plugins. It seamlessly handles compatibility for translations in both older and newer versions of WordPress (especially version 6.7 and above).  

## Features
- Automatically detects text domain for themes and plugins.
- Ensures translation files are properly loaded for the given locale.
- Supports both themes and plugins.
- Handles compatibility with WordPress versions below 6.7.

## Installation
1. Copy the code snippet from the repository.
2. Paste the code into:
   - The `functions.php` file of your theme, **or**
   - The main file of your plugin.
3. Make sure your translation files are located in the `languages` folder within your theme or plugin directory.

## Usage
The snippet will:
- Detect your theme or plugin's text domain automatically.
- Load the appropriate `.mo` file for the current locale.

For WordPress versions 6.7 and above, it ensures the correct `.mo` file is read directly. For older versions, it uses the standard `load_plugin_textdomain` function.

## Example
For a theme:
- Place your translation files in `wp-content/themes/your-theme/languages`.
  
For a plugin:
- Place your translation files in `wp-content/plugins/your-plugin/languages`.

## Compatibility
- WordPress 6.7 and above.
- Backward compatible with older WordPress versions.

## License
This project is open-source and licensed under the MIT License.