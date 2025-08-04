# Changelog for Banyan Utility Custom WordPress Block Theme

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased] - (v3.0.0 - Theme Upgrade)

### Added

-   Added 'Alerts', 'Cards', and 'Grids' pattern categories.
-   Added `subtitle.json` style file for paragraph block.
-   Added default color for headings in `theme.json`
-   Added functions to remove unwanted core blocks and block styles.
-   Added library of custom patterns (see theme's `/patterns` directory).

### Changed

-   Changed comment beginnings to avoid pulling into vscode todo tree extension regex.
-   Fixed spelling of "Heroes" in Block pattern categories.
-   Fixed the units' input's name attribute.
-   Moved `support` directory into `inc` directory and update JS fetch URL to match.
-   Moved function files from `/inc` to `/inc/func`.
-   Refactored `_site-footer.scss` into `template-parts.css`
-   Refactored editor script to remove all embedded block variations unless explicitly allowed in the script.
-   Refactored footer section patterns and template part.
-   Separated footer bar into its own pattern (`/patterns/section-footer-bar.php`).
-   Sorted `theme.json` properties alphabetically.
-   Updated `package.json` package versions to latest and added override for `cross-spawn` to remove vulnerabilities.
-   Updated `theme.json` variables to use pipe symbol syntax for the style engine.
-   Updated editor UI script's `$args` to remove script's `defer` setting.
-   Updated section patterns included in the footer template.
-   Updated theme version to 3.0.0.0

### Removed

-   Removed 'Boxes' pattern category (using 'Cards' instead).
-   Removed archived patterns.
-   Removed legacy support files and functions.
-   Removed styles and files for the unreleased custom "Table of Contents" block.
-   Removed the `build` directory from the repo since those are auto generated from the `src` files.
-   Removed the separator block styles and replaced with `.section-heading` style.

## [2.4.0] (Support Upgrade) - 2024-11-08

### Added

-   Added `once: true` to scripts `DOMContentLoaded` event listener so the event listener is removed after it runs.

### Changed

-   Full refactor of legacy support form code using vanilla JavaScript to replace Angular.
-   Refactored mobile menu add/remove event listeners

## [2.3.0] - 2024-10-19

### Added

-   Added webpack ignore comments to CSS SVGs URLs so they are not processed into data images.

### Changed

-   Moved all patterns to be refactored to `patterns/archive` directory.
-   Replaced deprecated SASS `@import` rule with `@use` rule.
-   Replaced hardcoded CSS absolute URLs with relative URLs so they work regardless oe what domain the theme is hosted on.
-   Updated footer section pattern names for better organization.
-   Updated packages in `packages.json` to the latest versions.

## [2.2.0] - 2024-10-12

### Changed

-   Fixed error when `updateFullHeightSize()` has no `.entry-content` element to iterate over.
-   Replaced section code in `templates/404.html` with a section pattern.
-   Replaced the code in `parts/footer.html` with section patterns, so dynamic URLs can be used for images to work on any domain.
-   Updated ddev `config.yaml` with post-start hook to add `WP_DEVELOPMENT_MODE` to `wp-config.php`.

## [2.1.0] - 2024-10-04

### Added

-   Added PHP 8.0 or greater requirement.
-   Added check for minified JS files before attempting to copy any.

### Changed

-   Formatted HTML files with VSCode default HTML formatter (replacing Prettier for HTML).
-   Refactored CSS and SCSS files to fix Stylelint issues.
-   Switched to [Semantic Versioning](https://semver.org/spec/v2.0.0.html) for theme and CHANGELOG.
-   Updated `.gitignore` list.
-   Updated config function names in `assets-config.php`, `assets-enqueue.php`, and `assets-register.php` for clarity.

## [2.0.7] - 2024-08-09

### Added

-   Added `"editor.insertSpaces": false` and `"editor.tabSize": 4` to VSCode workspace `settings.json`.
-   Added `'use strict'` to `splide-config.js`.
-   Added `.prettierignore` file to ignore build files.
-   Added `.prettierrc.js` file to include `@wordpress/prettierconfig` and set `printWidth: 120` for code formatting.
-   Added `assets-config.php` for setting stylesheet and script assets for theme.
-   Added `assets-process.php` for automatically setting asset properties for registering and enqueueing.
-   Added `copy-webpack-plugin` and `glob` devDependencies to `package.json`.
-   Added `devDependencies` in package.json for build process:
-   Added `node_modules` to `.gitignore`.
-   Added `webpack.config.js` file with `globSync()` to auto-generate paths to files for wp-scripts build process.

```json
"devDependencies": {
		"@wordpress/icons": "^10.4.0",
		"@wordpress/prettier-config": "^4.4.0",
		"@wordpress/scripts": "^28.4.0",
		"copy-webpack-plugin": "^12.0.2",
		"glob": "^10.3.10",
		"path": "^0.12.7",
		"prettier": "npm:wp-prettier@^3.0.3",
		"webpack-remove-empty-scripts": "^1.0.4"
	}
```

-   Added overrides in package.json to remove 4 severe vulnerabilities in wp-scripts:

```json
	"overrides": {
		"ws": "^8.18.0",
		"lighthouse": "^12.1.0",
		"puppeteer-core": "^22.13.1"
	}
```

-   Added wp-script npm run scripts in package.json:

```json
"scripts": {
		"start": "wp-scripts start",
		"build": "wp-scripts build",
		"format": "wp-scripts format",
		"lint:css": "wp-scripts lint-style",
		"lint:js": "wp-scripts lint-js"
}
```

### Modified

-   Formatted JS files with wp-prettier at 120 printWidth.
-   Refactored editor UI scripts to import scripts from the newly created `modules` directory into `editor.js`.
-   Refactored register and enqueue functions for WP build script setup. Now renamed to `assets-register.php` and `assets-enqueue.php`.
-   Renamed SCSS `modules` directory to `components`.
-   Renamed `base.scss` to `screen.scss`.
-   Renamed blocks `banyan` directory to `custom` and added `banyan` prefix to custom block names.
-   Replaced `const { assign, merge } = lodash;` with `import { assign, merge } from 'lodash';` so lodash gets added as a script dependency in `editor.assets.php`.
-   Replaced `wp.domReady()` with `DOMContentLoaded` eventListener
-   Updated theme build files with files generated from wp-scripts build process.
-   Updated theme version to 2.0.7 in theme's `style.css`.
-   Upgraded DDEV (modified `config.yaml`).

### Removed

-   Deleted `esbuild.config.js` (replaced with `webpack.config.js` for wp-scripts).
-   Removed `"type": "module"` from `package.json`.
-   Removed esbuild packages from package.json.

## [2.0.6] - 2024-08-01

### Added

-   Added `remove_font_library_ui()` function to remove WordPress default font library UI.

### Modified

-   Moved style for heading text color from theme.json to standalone block stylesheet with `:root :where()` so it doesn't override global styles.
-   Updated `theme.json` use new `customSpacingSize` and `defaultSpacingSizes` properties.

## [2.0.5] - 2024-07-18

### Added

-   Added `@version 1.0.0` to all PHP file docBlocks (functions & patterns).
-   Added `THEME_PREFIX` constant for use in functions.
-   Added theme namespace to all function files.

### Modified

-   Merged `inc/core-blocks.php` and `inc/core-openverse.php` into `inc/core-cleanup.php`.
-   Renamed `src/base/scss/base` to `src/base/scss/defaults`.
-   Renamed `src/base/scss/defaults/_defaults` to `src/base/scss/defaults/_elements.scss`.
-   Renamed `src/main` to `src/base`.
-   Replaced `sass/sass/sass` package with `esbuild-sass-plugin`.
-   Replaced `src/build-scripts/` files with `esbuild.config.js` to streamline build process.
-   Updated @package names to use namespace styled names.

## [2.0.4] - 2024-07-13

### Added

-   Added Insightly script to site head.

## [2.0.3] - 2024-06-24

### Added

-   Added `Boxes` to theme block pattern categories.
-   Added `[author_name]` shortcode with `author_override` custom field.
-   Added `box-event.php` pattern.
-   Added `src/blocks/css/banyan/table-of-contents.css` for theme specific CSS custom properties for TOC block.
-   Added docBlock return comments for all functions.

### Modified

-   Formatted all files to conform with WP coding standards.
-   Refactored `modifyHeaderMenu()` function in `src/main/js/script.js` to be more performant.
-   Renamed `inc/core-block-directory.php` to `inc/core-blocks.php`.
-   Renamed `inc/core-block-patterns.php` to `inc/theme-block-patterns.php`
-   Updated `footer.html` template with absolute URL for images so they show up in the site editor.
-   Updated `hero-single.php` pattern to use `[author_name]` shortcode.
-   Updated package name from 'banyan' to 'Banyan'.
-   Updated site-header navigation to include logins in the secondary nav.

### Removed

-   Removed `block-removals.js` to use the PHP `unset()` function to remove comment blocks.

## [2.0.2] - 2024-04-27

### Modified

-   Updated focus outline styles.
-   Updated radio input styles.

## [2.0.1] - 2024-04-26

### Modified

-   Changed mobile breakpoint from 1280 to 1140 since the primary nav is narrower after menu consolidation.
-   Refactored site-header with secondary nav.

## [2.0.0] - 2024-04-05

### Banyan Changeover Updates

-   Change package name to "Banyan"
-   Change theme name, text domain, namespace, and slug to banyan in all files
-   Reorganized sitewide header and navigation
-   Update `theme.json` brand colors and styles
-   Update brand colors used throughout the site blocks
-   Update the CSS and SCSS for rebranding to Banyan
-   Update theme version to 2.0.0

## [1.3.6] - 2024-04-04

> Changelog for Multifamily Utility Company block theme

-   Removed `/inc/head-favicon.php` and the included filepath in the `functions.php` file since favicons can be directly added to the `WP Admin > Settings > General > Site Icon` setting.
-   Updated `.wp-block-separator` border-width in `theme.json` from 0.0625rem to 0.125rem (equivalence of 2px) for visual change when upgrading to WordPress core v6.5.
-   Updated single-hero.php pattern's element widths

### CSS Changes

-   Added `.has-white-color` override for site footer links
-   Added `.padded-section` for scroll anchor sections
-   Added alternating table row colors
-   Added max-width for post-terms inside of cover blocks
-   Added normal column flex layout for single state pages on mobile
-   Added underline to links in white text
-   Updated inc-5000 media breakpoint from 768px to 782px to match WP breakpoint
-   Updated max width of post terms to match default content width

## [1.3.5] - 2024-03-03

### Added

-   New build process that processes `/src/` files and places the minified production versions in the `/build/` directory.
-   New build script using the shell command `npm run build` (see README.md for more info).

### Modified

-   Blocks JavaScript in now part of the `/build/` directory.
-   Blocks now use native CSS nesting (previously used processed SCSS).
-   Minified files now use the file tag of `.min.js` or `.min.css`.
-   Removed all CSS and JS from the `assets` directory. CSS and JS are now in the `/build/` dir. Images and fonts remain in the `assets` dir.

## [1.3.4] - 2024-02-17

### Added

-   Added editor style for inline margin offset for `.footer-bottom-bar` when editing as a pattern, so it matches the front-end design.
-   Added the `package-lock.json` file to the git repository.

### Modified

-   Updated CSS :not selectors for box padding in `src/scss/modules/_boxes.scss`.
-   Updated CSS selectors for double top margin for h2 in `/src/scss/modules/_typography.scss`.
-   Updated `/inc/head-favicons.php` favicons path from `/assets/images/favicons/*` to the application's root directory.
-   Updated `wp-image-####` in patterns and templates to match production image IDs.
-   Updated formatting for `/parts/footer.php` to remove whitespace when editor uses `white-space: pre-wrap;`.

### Removed

-   Removed `.main-content` selector for h2 in `/src/scss/modules/_typography.scss` so the editor inherits the style since .main-content is part of the page template and is not added to the editor.
-   Removed `package-lock.json` from the `.gitignore` list.
-   Removed the `/assets/images/favicons/` directory and its assets, and placed the assets in the application's root directory.

## [1.3.3] - 2024-02-08\_

### Modified

-   Added "lodash" dep to block scripts in the `multifamilyutility_enqueue_block_editor_assets()` PHP function so it loads theme block scripts after the core lodash script.
-   Added button outline styles to the editor stylesheet to override the `.editor-styles-wrapper` selector applied on buttons to match the front-end styles.

## [1.3.2] - 2024-02-07

### Modified

-   Moved the PHP function action and filter hooks outside the function_exist conditional statements for all functions, so they still run even if the function is overridden elsewhere.
-   Refactored the `multifamilyutility_add_scripts_to_head()` function in `/inc/head-scripts.php` to inline styles instead of adding the `js-only.css` stylesheet link. This removes the initial flash of elements before they're animated on the front-end.
-   Updated `README.md` to document how the theme is built so future developers can get up-to-speed quickly.
-   Updated the theme description in `style.css` to remove the "Full-Site Editing" text since all block themes contain site editors now.

### Removed

-   Removed .noJS class from CSS.
-   Removed `/inc/theme-body-tag.php` since `noJS` is no longer needed after adding the `.header-mobile-bar` block to the `.site-header`.
-   Removed `/inc/wp-lazy-load.php` since WP v6.4 fixed the issue with lazy load previously being applied to the site header logo.
-   Removed `js-only.css`
-   Removed `removeNoJSClass()` function from scripts.js

## [1.3.1] - 2024-02-07

### Added

-   Added `.header-mobile-bar` HTML block to `.site-header` in `/parts/header.html`.

### Modified

-   Refactor `modifyHeaderMenu()` to use HTML `.header-mobile-bar` block instead of JavaScript

### Removed

-   Removed JavaScript created `.header-mobile-bar` block in favor of an extra HTML block.

## [1.3.0] - 2024-01-28

### Modified

-   Full SCSS refactor to use enqueued blocks CSS and update UX accessibility for users of modified browser font size.
-   Moved block modifications from plugin to theme.
-   Refactored `setArticleBoxHeight()` JavaScript.

### Removed

-   Removed the custom `muc-block-toggle` block since the native `wp-block-details` block is now available in WP core v6.3, which was released on August 8, 2023.

## [1.2.0] - 2023-12-23

### Added

-   Added `add_filter( 'should_load_remote_block_patterns', '__return_false' )` hook to remove WordPress Remote Block Patterns from the editor block inserter. See: [Block Patterns](https://developer.wordpress.org/block-editor/reference-guides/filters/editor-filters/#should_load_remote_block_patterns).
-   Added `multifamilyutility_disable_openverse` function to remove openverse from editor.
-   Added `remove_action( 'enqueue_block_editor_assets', 'wp_enqueue_editor_block_directory_assets' )` hook to remove the default WP Block Directory. See: [Block Directory](https://developer.wordpress.org/block-editor/reference-guides/filters/editor-filters/#block-directory).

### Modified

-   Moved favicons from root directory to `wp-content/themes/multifamilyutility/assets/images/favicon/`.
-   Restructured functions from `functions.php` to individual labeled files in the `/inc/` directory.

### Removed

-   Removed `add_editor_style( 'assets/css/editor.css' )` hook as it has been superseded by the `enqueue_block_editor_assets` hook. See: [Enqueueing assets in the Editor](https://developer.wordpress.org/block-editor/how-to-guides/enqueueing-assets-in-the-editor/).
-   Removed `add_theme_support( 'wp-block-styles' )` hook to reduce additional opinionated styles from WordPress. See: [Default block styles](https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#default-block-styles)
