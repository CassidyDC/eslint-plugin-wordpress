import dataNoStoreStringLiterals from './data-no-store-string-literals.js';
import dependencyGroup from './dependency-group.js';
import i18nEllipsis from './i18n-ellipsis.js';
import i18nHyphenatedRange from './i18n-hyphenated-range.js';
import i18nNoCollapsibleWhitespace from './i18n-no-collapsible-whitespace.js';
import i18nNoFlankingWhitespace from './i18n-no-flanking-whitespace.js';
import i18nNoPlaceholdersOnly from './i18n-no-placeholders-only.js';
import i18nNoVariables from './i18n-no-variables.js';
import i18nTextDomain from './i18n-text-domain.js';
import i18nTranslatorComments from './i18n-translator-comments.js';
import noBaseControlWithLabelWithoutId from './no-base-control-with-label-without-id.js';
import noGlobalActiveElement from './no-global-active-element.js';
import noGlobalGetSelection from './no-global-get-selection.js';
import noUnguardedGetRangeAt from './no-unguarded-get-range-at.js';
import noUnsafeWpApis from './no-unsafe-wp-apis.js';
import noUnusedVarsBeforeReturn from './no-unused-vars-before-return.js';
import noWpProcessEnv from './no-wp-process-env.js';
import reactNoUnsafeTimeout from './react-no-unsafe-timeout.js';
import validSprintf from './valid-sprintf.js';
import wpGlobalUsage from './wp-global-usage.js';

export default {
	'data-no-store-string-literals': dataNoStoreStringLiterals,
	'dependency-group': dependencyGroup,
	'i18n-ellipsis': i18nEllipsis,
	'i18n-hyphenated-range': i18nHyphenatedRange,
	'i18n-no-collapsible-whitespace': i18nNoCollapsibleWhitespace,
	'i18n-no-flanking-whitespace': i18nNoFlankingWhitespace,
	'i18n-no-placeholders-only': i18nNoPlaceholdersOnly,
	'i18n-no-variables': i18nNoVariables,
	'i18n-text-domain': i18nTextDomain,
	'i18n-translator-comments': i18nTranslatorComments,
	'no-base-control-with-label-without-id': noBaseControlWithLabelWithoutId,
	'no-global-active-element': noGlobalActiveElement,
	'no-global-get-selection': noGlobalGetSelection,
	'no-unguarded-get-range-at': noUnguardedGetRangeAt,
	'no-unsafe-wp-apis': noUnsafeWpApis,
	'no-unused-vars-before-return': noUnusedVarsBeforeReturn,
	'no-wp-process-env': noWpProcessEnv,
	'react-no-unsafe-timeout': reactNoUnsafeTimeout,
	'valid-sprintf': validSprintf,
	'wp-global-usage': wpGlobalUsage,
};
