/**
 * External dependencies
 */
import jest from 'eslint-plugin-jest';

export default [
	jest.configs[ 'flat/recommended' ],
	{
		name: '@wordpress/test-unit',
		rules: {
			'jest/expect-expect': [
				'error',
				{ assertFunctionNames: [ 'expect', 'measurePerformance' ] },
			],
		},
	},
];
