/**
 * External dependencies
 */
import globals from 'globals';
import importPlugin from 'eslint-plugin-import';

/**
 * Internal dependencies
 */
import jsxA11y from './jsx-a11y.js';
import custom from './custom.js';
import react from './react.js';
import esnext from './esnext.js';
import i18n from './i18n.js';

// Exclude bundled WordPress packages from the list.
const wpPackagesRegExp = '^@wordpress/(?!(icons|interface|style-engine))';

const config = [
	...jsxA11y,
	...custom,
	...react,
	...esnext,
	i18n,
	{
		name: '@wordpress/formatting',
		plugins: { import: importPlugin },
		languageOptions: {
			globals: {
				...globals.node,
				window: true,
				document: true,
				SCRIPT_DEBUG: 'readonly',
				wp: 'readonly',
			},
		},
		settings: {
			'import/internal-regex': wpPackagesRegExp,
			'import/extensions': [ '.js', '.jsx' ],
		},
		rules: {
			'import/no-extraneous-dependencies': [
				'error',
				{
					peerDependencies: true,
				},
			],
			'import/no-unresolved': [
				'error',
				{
					ignore: [ wpPackagesRegExp ],
				},
			],
			'import/default': 'warn',
			'import/named': 'warn',
		},
	},
];

export default config;
