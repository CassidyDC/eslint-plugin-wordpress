/**
 * ESLint configuration.
 *
 * @file Manages the flat configuration settings for ESLint
 * @author Jacob Cassidy <jacob@cassidydc.com>
 * @see https://eslint.org/docs/latest/use/configure/configuration-files
 * @type {import("eslint").Linter.Config[]}
 * @version 1.0.0
 */

'use strict';

import globals from 'globals';
import js from '@eslint/js';
import tseslint from 'typescript-eslint';
import wordpress from './index.js';
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
			'js/recommended',
			'tseslint/recommended',
			'wordpress/recommended',
			'import-x/recommended',
		],
		files: [ '**/*.{js,mjs,cjs,ts,mts,cts,jsx,tsx}' ],
		languageOptions: {
			ecmaVersion: 'latest',
			sourceType: 'module',
			globals: {
				...globals.browser,
				...globals.jest,
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
