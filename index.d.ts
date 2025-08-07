import type { Linter, Rule } from 'eslint';

/** WordPress ESLint plugin configurations */
type AllConfigs = {
	/** Custom configuration for specific WordPress development patterns */
	custom: Linter.Config[];
	/** ES5 compatibility configuration for legacy WordPress environments */
	es5: Linter.Config[];
	/** ESNext configuration for modern JavaScript features */
	esnext: Linter.Config[];
	/** Internationalization rules for WordPress translation functions */
	i18n: Linter.Config[];
	/** JSDoc documentation rules for WordPress coding standards */
	jsdoc: Linter.Config[];
	/** JSHint compatibility rules for WordPress development */
	jshint: Linter.Config[];
	/** JSX accessibility rules for WordPress Gutenberg development */
	'jsx-a11y': Linter.Config[];
	/** React rules for WordPress Gutenberg block development */
	react: Linter.Config[];
	/** Recommended configuration for WordPress development */
	recommended: Linter.Config[];
	/** Recommended configuration with automatic code formatting */
	'recommended-with-formatting': Linter.Config[];
	/** Configuration for WordPress end-to-end testing */
	'test-e2e': Linter.Config[];
	/** Configuration for WordPress Playwright testing */
	'test-playwright': Linter.Config[];
	/** Configuration for WordPress unit testing */
	'test-unit': Linter.Config[];
	flat: Record< keyof AllConfigs, WordPressFlatConfig[] >;
};

/** WordPress ESLint plugin rules */
type AllRules = {
	'data-no-store-string-literals': Rule.RuleModule;
	'dependency-group': Rule.RuleModule;
	'i18n-ellipsis': Rule.RuleModule;
	'i18n-hyphenated-range': Rule.RuleModule;
	'i18n-no-collapsible-whitespace': Rule.RuleModule;
	'i18n-no-flanking-whitespace': Rule.RuleModule;
	'i18n-no-placeholders-only': Rule.RuleModule;
	'i18n-no-variables': Rule.RuleModule;
	'i18n-text-domain': Rule.RuleModule;
	'i18n-translator-comments': Rule.RuleModule;
	'no-base-control-with-label-without-id': Rule.RuleModule;
	'no-global-active-element': Rule.RuleModule;
	'no-global-get-selection': Rule.RuleModule;
	'no-unguarded-get-range-at': Rule.RuleModule;
	'no-unsafe-wp-apis': Rule.RuleModule;
	'no-unused-vars-before-return': Rule.RuleModule;
	'no-wp-process-env': Rule.RuleModule;
	'react-no-unsafe-timeout': Rule.RuleModule;
	'valid-sprintf': Rule.RuleModule;
	'wp-global-usage': Rule.RuleModule;
};

/** WordPress ESLint Plugin flat configuration */
type WordPressFlatConfig = {
	/** Plugins object containing the WordPress plugin */
	plugins?: Record< string, any >;
	/** ESLint rules configuration */
	rules?: Linter.RulesRecord;
	/** Language options including parser settings */
	languageOptions?: Linter.LanguageOptions;
	/** Files to include/exclude */
	files?: string[];
	/** Files to ignore */
	ignores?: string[];
};

declare const plugin: {
	readonly meta: {
		readonly name: string;
		readonly version: string;
	};
	readonly rules: AllRules;
	readonly configs: AllConfigs;
};

declare namespace plugin {
	export { WordPressFlatConfig };
}

export = plugin;
