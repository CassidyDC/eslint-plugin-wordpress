/**
 * External dependencies
 */
import playwright from 'eslint-plugin-playwright';

export default {
	...playwright.configs[ 'flat/recommended' ],
	name: '@wordpress/test-playwright',
};
