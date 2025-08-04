// import { defineConfig } from 'eslint/config';
import globals from 'globals';
import js from '@eslint/js';
import babelParser from '@babel/eslint-parser';
import wordPress from './configs/flat/recommended.js';

export default [
	js.configs.recommended,
	...wordPress,
	{
		ignores: [ '**/.dev-assets/', '**/*.min.js' ],
	},
	{
		files: [ '**/*.js' ],
		languageOptions: {
			parser: babelParser,
			parserOptions: {
				requireConfigFile: false,
				babelOptions: {
					presets: [ '@babel/preset-react' ],
				},
				ecmaFeatures: {
					jsx: true,
				},
			},
			globals: {
				...globals.browser,
				...globals.jest,
				Splide: 'readonly',
			},
		},
		rules: {
			'no-unused-vars': 'warn',
			yoda: [ 'warn', 'never' ],
		},
	},
];
