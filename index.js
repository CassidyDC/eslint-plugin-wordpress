/**
 * Internal dependencies
 */
const plugin = require( './plugin' );

Object.assign( plugin.configs, require( './configs/flat' ) );

module.exports = plugin;
