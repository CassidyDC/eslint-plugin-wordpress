/**
 * Internal dependencies
 */
import {
	TRANSLATION_FUNCTIONS,
	REGEXP_SPRINTF_PLACEHOLDER,
	REGEXP_SPRINTF_PLACEHOLDER_UNORDERED,
} from './constants.js';
import { getTranslateFunctionArgs } from './get-translate-function-args.js';
import { getTextContentFromNode } from './get-text-content-from-node.js';
import { getTranslateFunctionName } from './get-translate-function-name.js';
import { isPackageInstalled } from './is-package-installed.js';

export {
	TRANSLATION_FUNCTIONS,
	REGEXP_SPRINTF_PLACEHOLDER,
	REGEXP_SPRINTF_PLACEHOLDER_UNORDERED,
	getTranslateFunctionArgs,
	getTextContentFromNode,
	getTranslateFunctionName,
	isPackageInstalled,
};
