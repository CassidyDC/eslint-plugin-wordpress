/**
 * Internal dependencies
 */
import pkg from './package.json' with { type: 'json' };
import rules from './rules/index.js';

const { name, version } = pkg;

export default {
	meta: {
		name,
		version,
	},
	configs: {},
	rules,
};
