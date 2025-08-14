/**
 * Prettier configuration.
 *
 * @file Manages the configuration settings for Prettier
 * @author Jacob Cassidy <jacob@cassidydc.com>
 * @see https://prettier.io/docs/configuration
 * @type {import("prettier").Config}
 * @version 1.0.0
 */

'use strict';

/**
 * External dependencies
 */
import prettierPackage from 'prettier/package.json' with { type: 'json' };

/**
 * Based on `@wordpress/prettier-config` package
 *
 * @typedef WPPrettierOptions
 * @property {boolean} [parenSpacing=true] Insert spaces inside parentheses.
 */
const isWPPrettier = prettierPackage.name === 'wp-prettier';
const customOptions = isWPPrettier ? { parenSpacing: true } : {};
const customStyleOptions = isWPPrettier ? { parenSpacing: false } : {};

const config = {
	plugins: [ 'prettier-plugin-multiline-arrays' ],
	overrides: [
		{
			files: '*.{css,sass,scss}',
			options: {
				printWidth: 600, // To not break long selector combinations
				singleQuote: false,
				...customStyleOptions,
			},
		},
		{
			files: [ '*.json', '*.jsonc' ],
			options: {
				multilineArraysWrapThreshold: 0,
			},
		},
	],
	arrowParens: 'always',
	bracketSameLine: false,
	bracketSpacing: true,
	printWidth: 80,
	semi: true,
	singleQuote: true,
	tabWidth: 4,
	trailingComma: 'es5',
	useTabs: true,
	...customOptions,
};

export default config;
