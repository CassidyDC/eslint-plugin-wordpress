/**
 * External dependencies
 */
import { cosmiconfigSync } from 'cosmiconfig';
import babelParser from '@babel/eslint-parser';

/**
 * Internal dependencies
 */
import es5 from './es5.js';

const config = {
	name: '@wordpress/esnext',
	languageOptions: {
		ecmaVersion: 6,
		parser: babelParser,
		parserOptions: {
			sourceType: 'module',
		},
	},
	rules: {
		// Disable ES5-specific (extended from ES5)
		'vars-on-top': 'off',

		// Enable ESNext-specific.
		'arrow-parens': [ 'error', 'always' ],
		'arrow-spacing': 'error',
		'computed-property-spacing': [ 'error', 'always' ],
		'constructor-super': 'error',
		'no-const-assign': 'error',
		'no-dupe-class-members': 'error',
		'no-duplicate-imports': 'error',
		'no-useless-computed-key': 'error',
		'no-useless-constructor': 'error',
		'no-var': 'error',
		'object-shorthand': 'error',
		'prefer-const': [
			'error',
			{
				destructuring: 'all',
			},
		],
		quotes: [
			'error',
			'single',
			{ allowTemplateLiterals: true, avoidEscape: true },
		],
		'space-unary-ops': [
			'error',
			{
				overrides: {
					'!': true,
					yield: true,
				},
			},
		],
		'template-curly-spacing': [ 'error', 'always' ],
	},
};

// It won't recognize the `babel.config.json` file used in the project until the upstream bug in `cosmiconfig` is fixed:
// https://github.com/davidtheclark/cosmiconfig/issues/246.
const result = cosmiconfigSync( 'babel' ).search();
if ( ! result || ! result.filepath ) {
	config.languageOptions = {
		...config?.languageOptions,
		parser: babelParser,
		parserOptions: {
			...config?.languageOptions?.parserOptions,
			requireConfigFile: false,
			babelOptions: {
				configFile: false,
				presets: [ '@wordpress/babel-preset-default' ],
			},
		},
	};
}

export default [ ...es5, config ];
