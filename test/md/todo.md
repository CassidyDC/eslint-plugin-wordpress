# TO DO

[ ] Convert all config files from commonJS to ESM.
[ ] Covert .eslintrc
[ ] Convert stylelint.config
[ ] Maybe convert webpack.config

[ ] Remove: `wp-block-columns` after removing it from patterns in the unset function
[ ] Update `README.md` with updated development instructions
[ ] Check if SCSS is still needed for the editor in WP 6.7
[ ] Print out 2FA recovery codes
[ ] Update CSS to use :root :where()
[ ] Turn off all unneeded blocks
[ ] Reduce settings clutter by only allowing needed settings
[ ] Update theme.json with all settings:

name: 'lodash',
message: 'Please use native functionality instead.',

name: 'classnames',
message:
"Please use `clsx` instead. It's a lighter and faster drop-in replacement for `classnames`.",

```json
("background": {},
"blocks": {},
"dimensions": {},
"lightbox": {},
"position": {},
"shadow": {},)
```

[] Create style json files for different components.

<!-- ADD PATTERNS -->

```json
{
	"$schema": "https://schemas.wp.org/wp/6.7/theme.json",
	"version": 3,
	"settings": {},
	"styles": {},
	"customTemplates": [],
	"templateParts": [],
	"patterns": []
}
```

<!-- ADD BUTTON SETTINGS -->

// - Color (Primary, Secondary, White, Green) // .has-button-color-primary
// - Size (XS, S, M, L, XL) // .has-button-size-x-small
// - Style (Fill or Outline) // .has-button-style-outline button
// - Width (25, 50, 75, 100) // DEFAULT WIDTH SETTING (see WidthPanel)

Primary Secondary Tertiary White P S T W

Color
Size

<!-- STYLELINT RULES -->
<!-- https://www.npmjs.com/package/stylelint-config-alphabetical-order -->

-   properties are ordered alphabetically
-   the all property comes first regardless
-   declarations come before nested rules
-   custom properties come before properties
-   nested style rules come before nested at-rules

## COMPLETED

[x] Move function in `inc/` to `inc/func/` and update called URLS.
[x] Move `support/` to `inc/support/` and update called URLS.
[x] Can the patterns directory have subdirectories? No
