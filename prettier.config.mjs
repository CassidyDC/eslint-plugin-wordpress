/**
 * Prettier configuration.
 * @see https://prettier.io/docs/configuration
 * @type {import("prettier").Config}
 */

import wpConfig from '@wordpress/prettier-config';

const config = {
	...wpConfig,
	printWidth: 120,
};

export default config;
