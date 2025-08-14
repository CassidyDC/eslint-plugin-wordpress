/**
 * ESLint flat configuration.
 * @see https://eslint.org/docs/latest/use/configure/configuration-files-new
 * @type {import("eslint").Linter.Config[]}
 */

import js from '@eslint/js';
import globals from 'globals';
import wordpress from './configs/flat/recommended.js';

export default [
	js.configs.recommended,
	...wordpress,
	{
		ignores: [ '**/.dev-assets/', '**/*.min.js' ],
	},
	{
		files: [ '**/*.{js,mjs,cjs,ts,mts,cts,jsx,tsx}' ],
		languageOptions: {
			globals: {
				...globals.browser,
				...globals.jest,
			},
		},
		rules: {
			'no-unused-vars': 'warn',
			yoda: [ 'warn', 'never' ],
		},
	},
];
