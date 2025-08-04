/**
 * For a detailed explanation regarding each configuration property, visit:
 * https://jestjs.io/docs/configuration
 */

/** @type {import('jest').Config} */
const config = {
	testEnvironment: 'node',
	transform: {
		'\\.[jt]sx?$': 'babel-jest',
	},
};

module.exports = config;
