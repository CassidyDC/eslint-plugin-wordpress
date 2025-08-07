# Changelog for ESLint Plugin WordPress

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.1.2] - 2025-08-07

### Added

-   Added `index.d.ts` file for types declarations.
-   Add types property and types file to `package.json`.

## [1.1.1] - 2025-08-06

### Changed

-   Reverted change from `jsdoc.configs[ 'flat/recommended' ]` to `jsdoc.default.configs[ 'flat/recommended' ]` since flat is added to `./index.js`.

## [1.1.0] - 2025-08-06

### Changed

-   Updated example eslint.config.js code in README.md.
-   Updated config object in `./index.js` to point to flat directory.

### Removed

-   Removed `./configs/index.js` since it's not needed after update to `./index.js`

## [1.0.9] - 2025-08-06

### Added

-   Added `configs/index.js` to export all configs.

## [1.0.8] - 2025-08-06

### Added

-   Added JSDoc to `eslint.config.mjs`.
-   Added package details to `README.md`.

### Changed

-   Updated CHANGELOG with v1.0.2 - v1.0.8 notes.
-   Updated homepage url and format script in `package.json`.
-   Updated `wordPress` variable name to `wordpress` in `eslint.config.mjs`.

## [1.0.7] - 2025-08-06

### Added

-   Added `@wordpress/babel-preset-default` override for `@babel/runtime` for package development only.

### Removed

-   Removed `postinstall` packages, patch, and scripts since they don't work on a dependency's dependencies.
-   Removed `@wordpress/babel-preset-default` files and patch since patches are not working for a dependency's dependencies.
-   Removed tracking of any node_modules in this repo.

## [1.0.6] - 2025-08-06

### Changed

-   Replaced package.json's overrides with `postinstall-postinstall` package and script.

## [1.0.5] - 2025-08-06

### Added

-   Added filenames to the package.json "files" object and added an ignore rule for the `./rules/__tests__` directory.

### Changed

-   Updated package.json's repository url.

## [1.0.4] - 2025-08-06

### Added

-   Added `@wordpress/babel-preset-default` override for `@babel/runtime` for package's dependency.
-   Added postinstall patch-package script.

## [1.0.3] - 2025-08-05

### Added

-   Added `@babel/runtime`, `eslint-plugin-jest`, `"eslint-plugin-playwright`, and `patch-package` as a package dependencies.
-   Added official `@wordpress/babel-preset-default` package for patching.
-   Added a patch for `@wordpress/babel-preset-default` to override the outdated version of `@babel/runtime` used.

### Changed

-   Changed `jsdoc.configs[ 'flat/recommended' ]` to `jsdoc.default.configs[ 'flat/recommended' ]` for modern syntax.
-   Replaced `@wordpress/babel-preset-default` override of `@babel/runtime` with a patch-package

### Removed

-   Removed "@cassidydc/eslint-plugin-wordpress" as parent override to dependencies overrides.

## [1.0.2] - 2025-08-05

### Added

-   Added "@cassidydc/eslint-plugin-wordpress" as parent override to dependencies overrides.
-   Added CHANGELOG notes for v1.0.0 and v1.0.1.

### Changed

-   Formatted files with Prettier.

## [1.0.1] - 2025-08-05

### Added

-   Added a `@babel/runtime` minimum version override for the `@wordpress/babel-preset-default` package to remove security vulnerabilities.

## [1.0.0] - 2025-08-05

### Added

-   Added files from the official `@wordpress/eslint-plugin` package to convert to ESLint v9+ flat config syntax.
-   Added `*.test.js` extension to all `./rules/__tests__` files.
-   Added `CHANGELOG.md`, `LICENSE`, `package.json`, and `README.md` files.
-   Added `plugin.js` file from [Gutenberg PR 65648 - Upgrade ESLint to v9](https://github.com/WordPress/gutenberg/pull/65648)
-   Added development config files:
    -   `.editorconfig`
    -   `.gitignore`
    -   `.markdownlint-cli2.jsonc`
    -   `.prettierignore`
    -   `babel.config.js` (for running Jest tests)
    -   `eslint.config.mjs`
    -   `jest.config.js`
    -   `prettier.config.mjs`

### Changed

-   Replaced code syntax yoda conditions with non-yoda conditions.
-   Replaced instances of `parserOptions` with `languageOptions` to modernize Jest tests.
-   Updated `./configs/flat/*`, `./rules/*`, `./utils/*`, `index.js` files with [Gutenberg PR 65648 - Upgrade ESLint to v9](https://github.com/WordPress/gutenberg/pull/65648) for converting rules to use ESLint 9+ flat syntax.
