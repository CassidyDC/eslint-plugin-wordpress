# Changelog for ESLint Plugin WordPress

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

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
