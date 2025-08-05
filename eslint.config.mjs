// import { defineConfig } from 'eslint/config';
import js from '@eslint/js';
import globals from 'globals';
import wordPress from './configs/flat/recommended.js';

export default [
	js.configs.recommended,
	...wordPress,
	{
		ignores: [ '**/.dev-assets/', '**/*.min.js' ],
	},
	{
		files: [ '**/*.{js,mjs,cjs,ts,mts,cts,jsx,tsx}' ],
		languageOptions: {
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
