/**
 * Internal dependencies
 */
import plugin from './plugin.js';
import * as flatConfigs from './configs/flat/index.js';

Object.assign( plugin.configs, flatConfigs );

export default plugin;
