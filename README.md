# ESLint Plugin WordPress

This ESLint plugin adapts the `@wordpress/eslint-plugin` for use with the modern ESLint v9+ flat config format. It enables you to configure ESLint using an `eslint.config.js` file, replacing the legacy `.eslintrc` approach for a more streamlined and flexible setup.

## Installation

Install the module

```shell
npm install @cassidydc/eslint-plugin-wordpress --save-dev
```

## Additional Suggested Packages

### WP Prettier

A fork of Prettier that introduces the `--paren-spacing` option, enabling formatting that aligns with WordPress Coding Standards.

Install the module

```shell
npm install prettier@npm:wp-prettier@latest --save-dev
```

## WordPress Overrides

WordPress's packages are often slow to update dependencies due to their interconnected monorepo and the need for backward compatibility. As a result, some packages used by this plugin, such as `@wordpress/babel-preset-default` and `@wordpress/prettier-config`, may include outdated dependencies that could have known security vulnerabilities.

If you encounter an outdated or vulnerable dependency in a WordPress package, you can use the `overrides` field in your project's root `package.json` to specify a patched version.

For example, at the time of writing, `@wordpress/babel-preset-default` depended on an older version of `@babel/runtime` (v7.25.7) that contains a security issue. To ensure your project uses a secure version, add an override such as this:

```json
{
	"overrides": {
		"@wordpress/babel-preset-default": {
			"@babel/runtime": "^7.28.2"
		}
	}
}
```

## Usage

The following example files should be placed in your project's root directory.

### Example `package.json` file

```json
{
	"name": "example-wordpress-project",
	"version": "1.0.0",
	"type": "module",
	"devDependencies": {
		"@cassidydc/eslint-plugin-wordpress": "^1.0.7",
		"prettier": "npm:wp-prettier@^3.0.3"
	},
	"overrides": {
		"@wordpress/babel-preset-default": {
			"@babel/runtime": "^7.28.2"
		}
	},
	"scripts": {
		"format": "npx prettier . --write",
		"lint:scripts": "npx eslint",
		"lint:scripts:fix": "npx eslint --fix"
	}
}
```

### Example `eslint.config.js` file

```js
/**
 * ESLint configuration.
 * @see https://eslint.org/docs/latest/use/configure/configuration-files
 * @type {import("eslint").Linter.Config[]}
 */

'use strict';

import globals from 'globals';
import js from '@eslint/js';
import tseslint from 'typescript-eslint';
import wordpress from '@cassidydc/eslint-plugin-wordpress';
import { defineConfig, globalIgnores } from 'eslint/config';
import { importX } from 'eslint-plugin-import-x';

export default defineConfig( [
	globalIgnores( [
		'**/.dev-assets/',
		'**/build/',
		'**/vendor/',
		'**/*.min.js',
	] ),
	{
		plugins: {
			'import-x': importX,
			js,
			tseslint,
			wordpress,
		},
		extends: [
			'import-x/recommended',
			'js/recommended',
			'tseslint/recommended',
			'wordpress/recommended',
		],
		files: [ '**/*.{js,mjs,cjs,ts,mts,cts,jsx,tsx}' ],
		languageOptions: {
			globals: {
				...globals.browser,
			},
		},
		linterOptions: {
			reportUnusedInlineConfigs: 'warn',
		},
		rules: {
			'@typescript-eslint/no-require-imports': 'warn',
			'no-unused-vars': 'warn',
			yoda: [ 'warn', 'never' ],
		},
	},
] );
```

### Example `prettier.config.js` file

```js
/**
 * Prettier configuration.
 * @see https://prettier.io/docs/configuration
 * @type {import("prettier").Config}
 */

'use strict';

import wpConfig from '@wordpress/prettier-config';

const config = {
	...wpConfig,
	plugins: [ 'prettier-plugin-multiline-arrays' ],
	overrides: [
		...wpConfig.overrides,
		{
			files: '*.{css,sass,scss}',
			options: {
				printWidth: 600, // To not break long selector combinations
			},
		},
		{
			files: [ '*.json', '*.jsonc' ],
			options: {
				multilineArraysWrapThreshold: 0,
			},
		},
	],
};

export default config;
```

### Scripts

You can then use the following scripts from your command line:

| Command                   | Action                                                                 |
| ------------------------- | ---------------------------------------------------------------------- |
| `npm run format`          | Formats files with Prettier                                            |
| `npm run lint:script`     | Lists all problems found by ESLint                                     |
| `npm run lint:script:fix` | Auto-fixes problems found by ESLint (not all issues can be auto-fixed) |

## Found an Issue?

If you come across any issues, please report them on [GitHub](https://github.com/cassidydc/eslint-plugin-wordpress/issues).
