import wordpressPlugin from '../../plugin.js';

export default {
	name: '@wordpress/i18n',
	plugins: {
		'@wordpress': wordpressPlugin,
	},
	rules: {
		'@wordpress/valid-sprintf': 'error',
		'@wordpress/i18n-translator-comments': 'error',
		'@wordpress/i18n-text-domain': 'error',
		'@wordpress/i18n-no-collapsible-whitespace': 'error',
		'@wordpress/i18n-no-placeholders-only': 'error',
		'@wordpress/i18n-no-variables': 'error',
		'@wordpress/i18n-ellipsis': 'error',
		'@wordpress/i18n-no-flanking-whitespace': 'error',
		'@wordpress/i18n-hyphenated-range': 'error',
	},
};
