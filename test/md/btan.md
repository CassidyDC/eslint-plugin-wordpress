# Block Theme Academy Notes

## Recommended Plugins for development

-   Query Monitor
-   Create Block Theme plugin (can use it to save changes done through the site editor to your theme files while also deleting the changes from the database so they belong to the theme).

## COURSE NOTES

-   You can edit almost all theme.json settings through the site editor interface and then save them. Which is generally faster than hand coding the theme.json file.

-   Testing data file: https://codex.wordpress.org/Theme_Unit_Test
-   If you use 5 sizes or less, you get t-shirt label sizes in the editor sidebar. Use more, and it becomes a dropdown list.

-   Removing settings based n post type or user role:

```PHP
function wpdc_remove_all_settings_for_pages( $theme_json ) {
	if ( ! is_admin() ) {
		return $theme_json;
	}

	if ( ! function_exists( 'get_current_screen' ) ) {
		require_once ABSPATH . '/wp-admin/includes/screen.php';
	}

	$current_screen = get_current_screen();

	if ( ! $current_screen instanceof WP_Screen ) {
		return $theme_json;
	}

	if ( $current_screen->post_type !== 'page' ) {
		return $theme_json;
	}

	return $theme_json->update_with( wpdc_get_remove_all_settings_json_as_array() );
}

function wpdc_remove_all_settings_non_admins( $theme_json ) {
	if ( ! is_admin() ) {
		return $theme_json;
	}

	if ( current_user_can( 'manage_options' ) ) {
		return $theme_json;
	}

	return $theme_json->update_with( wpdc_get_remove_all_settings_json_as_array() );
}

add_action( 'after_setup_theme', function () {
	add_filter( 'wp_theme_json_data_default', 'wpdc_remove_all_settings_for_pages' );
	add_filter( 'wp_theme_json_data_theme', 'wpdc_remove_all_settings_for_pages' );

	add_filter( 'wp_theme_json_data_default', 'wpdc_remove_all_settings_non_admins' );
	add_filter( 'wp_theme_json_data_theme', 'wpdc_remove_all_settings_non_admins' );
} );

function wpdc_get_remove_all_settings_json_as_array() {
	return json_decode(
		'{
			"version": 2,
			"settings": {
				"appearanceTools": false,
				"border": {
					"color": false,
					"radius": false,
					"style": false,
					"width": false
				},
				"color": {
					"background": false,
					"text": false,
					"link": false,
					"colorPalette": false,
					"custom": false,
					"customDuotone": false,
					"customGradient": false,
					"defaultDuotone": false,
					"defaultGradients": false,
					"defaultPalette": false
				},
				"layout": {
					"allowEditing": false
				},
				"spacing": {
					"blockGap": null,
					"margin": false,
					"padding": false,
					"units": []
				},
				"typography": {
					"customFontSize": false,
					"fontStyle": false,
					"fontWeight": false,
					"letterSpacing": false,
					"lineHeight": false,
					"textDecoration": false,
					"textTransform": false,
					"dropCap": false,
					"fontSizes": [],
					"fontFamilies": [],
					"writingMode": false
				}
			}
		}',
		true
	);
}
```

### Creating Layouts

-

## IMAGES

```PHP
/**
 * Use the content size for the default medium image size.
 */
function tt4_child_set_medium_image_size() {
	return 620;
}
add_filter( 'pre_option_medium_size_h', 'tt4_child_set_medium_image_size' );
add_filter( 'pre_option_medium_size_w', 'tt4_child_set_medium_image_size' );

/**
 * Use the wide size for the default large image size.
 */
function tt4_child_set_large_image_size() {
	return 1280;
}
add_filter( 'pre_option_large_size_h', 'tt4_child_set_large_image_size' );
add_filter( 'pre_option_large_size_w', 'tt4_child_set_large_image_size' );

/**
 * Improve the user experience by:
 *
 * - Rename the default medium and large image sizes in the interface.
 * - Removing the thumbnail size from the interface.
 */
function tt4_child_rename_medium_and_large_image_sizes( $sizes ) {
	$sizes['medium'] = 'Content size';
	$sizes['large'] = 'Wide size';

	// Optional: Remove thumbnail size for clarity
	unset( $sizes['thumbnail'] );

	return $sizes;
}
add_filter('image_size_names_choose', 'tt4_child_rename_medium_and_large_image_sizes');

/**
 * Set the largest image size WordPress will use for responsive images.
 *
 * It should be twice the size of the largest image size, which works well with
 * retina displays.
 */
function tt4_child_set_largest_image_size() {
	return tt4_child_set_large_image_size() * 2;
}
add_filter( 'max_srcset_image_width', 'tt4_child_set_largest_image_size' );

/**
 * Set the content width to the wide size.
 */
function tt4_child_set_content_width() {
	$GLOBALS['content_width'] = tt4_child_set_large_image_size();
}
add_action( 'after_setup_theme', 'tt4_child_set_content_width' );
```
