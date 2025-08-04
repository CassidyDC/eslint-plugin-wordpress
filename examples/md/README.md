# Banyan &bull; Custom WP Block Theme

| Table of Content                                              |
| ------------------------------------------------------------- |
| [Building The Source Files](#building-the-source-files)       |
| [Core Block Modifications](#core-block-modifications)         |
| [Included Third-Party Scripts](#included-third-party-scripts) |
| [Theme File Structure](#theme-file-structure)                 |

## Building The Source Files

CSS and JavaScript files are processed and minified for use in production. The source files are in the `/src/` directory, and the build process (explained below) creates the production files in the `/build/` directory.

You must install a few command line packages to run the build process:

1. Install [Node](https://nodejs.org/en) if you don't currently have it.
    - This will install both Node and the Node Package Manager (npm).
2. Install [Sass](https://sass-lang.com/install/).
    - If you use [Homebrew](https:/brew.sh/), you can install Dart Sass with the `brew install sass/sass/sass` command. Otherwise, the recommended package is [Sass Embedded](https://www.npmjs.com/package/sass-embedded) using the per-project `npm i sass-embedded` or the global `npm i -g sass-embedded` installation command.
3. In the command line, go to the theme's root `/banyan/` directory and run `npm install`. This will install the `/node_modules/` directory with the build process packages and dependencies from the `package.json` file.

You should now be able to run the build process scripts. In the command line, go to the theme's root `/banyan/` directory and enter `npm run build`. This will run the CSS, JS, and SCSS (Sass) build processes one after the next.

If you want to build just one type of files, you can append the type to the run command:

| TYPE       | RUN SCRIPT           |
| ---------- | -------------------- |
| All        | `npm run build`      |
| CSS        | `npm run build:css`  |
| JavaScript | `npm run build:js`   |
| Sass       | `npm run build:scss` |

The above commands run the build process once. If you want to keep the build process running so files are rebuilt each time you save a change in the source file, you'll need to run the "watch" command instead:

| TYPE       | WATCH SCRIPT         |
| ---------- | -------------------- |
| CSS        | `npm run watch:css`  |
| JavaScript | `npm run watch:js`   |
| Sass       | `npm run watch:scss` |

> Note: There is no all-in-one watch command; you must open separate shell sessions to run each watch process concurrently.

## Core Block Modifications

The following block features are added in the `/banyan/build/blocks/js/` JavaScript files:

### Removed Core Blocks

-   `core/latest-comments`
-   `core/comments`
-   `core/post-comments-form`

### Filtered Core Blocks

-   `core/button`: added button size selection setting for _Large_, _Small_, and _Tiny_ buttons (default is _Medium_).
-   `core/separator`: added support for left and right alignment currently lacking in core.

### Core Block Variations

-   `core/columns`: added 4-columns alignwide variation.

## Included Third-Party Scripts

### Splide

-   **File**: `/banyan/build/main/js/splide.min.js` [[Source](https://github.com/Splidejs/splide/blob/master/dist/js/splide.min.js)]
-   **Purpose**: Create touch and mouse-friendly sliders. Used for the testimonial slider.

### Wow

-   **File**: `/banyan/build/main/js/wow.min.js` [[Source](https://github.com/graingert/WOW/blob/master/dist/wow.min.js)]
-   **Purpose**: Animate elements when scrolled into view.

## Theme File Structure

### `/.vscode`

The formatting settings for PHP files for this project when using Visual Studio Code.

### `/assets`

The font and image assets used in the theme.

### `/build`

The production-minified JavaScript and CSS files used by the theme. Built from the source files in `/src`.

### `/inc`

The organized PHP functions to add/remove/modify theme features. Files are imported into the theme's `functions.php` file.

### `/parts`

The reusable theme parts that are used in `/templates/*` files. These parts are also included in the WP Site Editor and can be customized there.

> Note: Customizations to parts in the WP Site Editor are not saved to the theme's files (they're added to the WP database). You'll need to manually add the changes (copy/paste the blocks) to the theme files to save them here. This is the case for all files in the block theme that are editable via the WP Site Editor (such as the `/patterns` and `/templates` files).

### `/patterns`

The theme block patterns for building pages/posts in the WordPress Block editor. Includes single component patterns, such as an alert box, and full page/post patterns for design layouts.

### `/src`

The source files for generating production-ready CSS and JavaScript with the build process. The `/src/blocks` directory contains files for modifying the blocks directly through the WP system, while `/src/main` contains theme files that don't directly integrate into the WP system.

### `/support`

The legacy Angular files for the Zendesk support page features.

### `/templates`

| Template                  | Purpose                                                                                                 |
| ------------------------- | ------------------------------------------------------------------------------------------------------- |
| `404.html`                | Displays the "Page Not Found" content.                                                                  |
| `archive.html`            | Default template for category, tag, author, or other archive page.                                      |
| `blank.html`              | Displays the page/post without the site-header and site-footer when the **Blank** template is selected. |
| `home.html`               | Default template for the posts page, aka the blog.                                                      |
| `index.html`              | Default template used when no other template is suitable.                                               |
| `page-support.html`       | Displays the interactive support box when the **Support Page** template is selected.                    |
| `page.html`               | Default template for pages.                                                                             |
| `search.html`             | Default template for searches.                                                                          |
| `single-city.html`        | Default template for the **city** custom post type.                                                     |
| `single-state.html`       | Default template for the **state** custom post type.                                                    |
| `single-testimonial.html` | Default template for the **testimonial** custom post type.                                              |
| `single.html`             | Default template for posts.                                                                             |

### Other Theme Files

| File             | Purpose                                                                                                                                 |
| ---------------- | --------------------------------------------------------------------------------------------------------------------------------------- |
| `.gitignore`     | List of files Git ignores when pushing to the repository.                                                                               |
| `CHANGELOG.md`   | List of changes made with each updated version of the theme.                                                                            |
| `functions.php`  | List of PHP functions included in the theme.                                                                                            |
| `package.json`   | List of packages, dependencies, and scripts needed to build production-ready files from the source files.                               |
| `README.md`      | This file; documents how the theme is built.                                                                                            |
| `screenshot.png` | Screenshot of theme used in the `WP Admin > Appearance > Themes` page. Screenshot size: 1200 x 900px.                                   |
| `style.css`      | Displays theme details on the `WP Admin > Appearance > Themes` page. Not used as a CSS file in this theme.                              |
| `theme.json`     | Generates theme CSS styles. Used as the first level for styling the theme when there are native block settings that can be styled here. |
