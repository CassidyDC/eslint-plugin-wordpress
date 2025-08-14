/**
 * External dependencies
 */
import globals from 'globals';
import importXPlugin from 'eslint-plugin-import-x';

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
		plugins: { import: importXPlugin },
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
			'import-x/internal-regex': wpPackagesRegExp,
			'import-x/extensions': [ '.js', '.jsx' ],
		},
		rules: {
			'import-x/no-extraneous-dependencies': [
				'error',
				{
					peerDependencies: true,
				},
			],
			'import-x/no-unresolved': [
				'error',
				{
					ignore: [ wpPackagesRegExp ],
				},
			],
			'import-x/default': 'warn',
			'import-x/named': 'warn',
		},
	},
];

export default config;
