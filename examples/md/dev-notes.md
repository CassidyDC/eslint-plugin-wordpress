# DEVELOPMENT NOTES

## Package.json

See: https://wordpress.org/support/topic/wordpress-scripts-and-vulnerability-warnings/
See: https://github.com/WordPress/gutenberg/issues/63771

### Overrides

The following code was added to the `package.json` file to remove the 5 high severity vulnerabilities from `@wordpress/scripts`. This can be removed in the future when the vulnerabilities have been fixed in the @wordpress package:

```json
"overrides": {
  "ws": "^8.18.0",
  "lighthouse": "^12.1.0",
  "puppeteer-core": "^22.13.1"
}
```

### Prettier

-   `"prettier": "npm:wp-prettier@^3.0.3"` adds the `"parenSpacing": true|false` option for matching WP Coding Standards.
-   `@wordpress/prettier-config` sets the prettier rules, which is imported with `.prettierrc.js`.

"ignoreFiles": [
"assets/scss/vendor/**/*.scss"
],
"color-no-invalid-hex": true,
"rule-empty-line-before": [
"always",
{
"ignore": [ "after-comment" ]
}
],

Note: adding `overrides` in `.prettierrc.js` breaks the `@wordpress/prettier-config/index.js` overrides.

## Ignore comments options

```css
/* prettier-ignore */

/* stylelint-disable-next-line -- no-descending-specificity conflict ' */
/* stylelint-disable-line -- Splide class doesn't follow BEM format */

/* stylelint-disable selector-class-pattern -- For non-BEM .splide**pagination**page */
/* stylelint-enable */
```
