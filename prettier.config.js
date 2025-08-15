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
