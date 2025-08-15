/**
 * External dependencies
 */
import jest from 'eslint-plugin-jest';
import globals from 'globals';

export default {
	...jest.configs[ 'flat/recommended' ],
	name: '@wordpress/test-e2e',
	languageOptions: {
		globals: {
			...jest.configs[ 'flat/recommended' ].languageOptions.globals,
			...globals.browser,
			browser: 'readonly',
			page: 'readonly',
			wp: 'readonly',
		},
	},
};
