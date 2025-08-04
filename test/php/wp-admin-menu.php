<?php
/**
 * WordPress Admin Menu Modifications
 *
 * @package CassidyWP\Banyan\Functions
 * @version 1.0.0
 */

declare( strict_types = 1 );
namespace CassidyWP\Banyan;

/**
 * Check for specific plugins, and if they exist, move them to the Settings submenu
 */
if ( ! function_exists( 'CassidyWP\Banyan\move_menu_to_settings_submenu' ) ) :
	/**
	 * Check for specific plugins, and if they exist, move them to the Settings submenu
	 *
	 * @since 1.2.0
	 * @global array $menu A multidimensional array of WP Admin menu items
	 * @return void
	 */
	function move_menu_to_settings_submenu(): void {
		global $menu;

		$plugins_to_check = [
			'CookieYes',
			'WP Mail Logging',
		];

		foreach ( $menu as $menu_item ) {
			foreach ( $plugins_to_check as $plugin_name ) {
				if ( $menu_item[0] === $plugin_name ) {
					remove_menu_page( $menu_item[2] );
					add_submenu_page(
						'options-general.php',  // $parent_slug
						$menu_item[0],          // $page_title
						$menu_item[0],          // $menu_title
						$menu_item[1],          // $capability
						$menu_item[2],          // $menu_slug
					);
				}
			}
		}
	}
endif;

add_action( 'admin_menu', 'CassidyWP\Banyan\move_menu_to_settings_submenu' );

/**
 * Alphabetically reorder non-default Settings submenu items
 */
if ( ! function_exists( 'CassidyWP\Banyan\reorder_settings_submenu' ) ) :
	/**
	 * Alphabetically reorder non-default Settings submenu items
	 *
	 * @since 1.2.0
	 * @global array $submenu An array of WP Admin menu item slugs that contain an array of submenu items
	 * @return void
	 */
	function reorder_settings_submenu(): void {
		global $submenu;

		$settings_submenu = &$submenu['options-general.php'];

		if ( isset( $settings_submenu ) ) {

			$default_settings_submenu_names = [
				'General',
				'Writing',
				'Reading',
				'Media',
				'Permalinks',
				'Privacy',
			];

			$default_settings_submenu = array_filter(
				$submenu['options-general.php'],
				function ( array $names ) use ( $default_settings_submenu_names ): bool {
					return in_array( $names[0], $default_settings_submenu_names, true );
				}
			);

			$remaining_settings_submenu = array_filter(
				$submenu['options-general.php'],
				function ( array $names ) use ( $default_settings_submenu_names ): bool {
					return ! in_array( $names[0], $default_settings_submenu_names, true );
				}
			);

			// Alphabetically sort the remaining submenu.
			usort(
				$remaining_settings_submenu,
				function ( array $a, array $b ): int {
					return strcmp( $a[0], $b[0] );
				}
			);

			$new_settings_submenu = array_merge( $default_settings_submenu, $remaining_settings_submenu );

			// Unset original Settings submenu items.
			foreach ( $settings_submenu as $key => $value ) {
				unset( $settings_submenu[ $key ] );
			}

			// Set new settings submenu items.
			foreach ( $new_settings_submenu as $key => $value ) {
				$settings_submenu[ $key ] = $value;
			}
		}
	}
endif;

add_action( 'admin_menu', 'CassidyWP\Banyan\reorder_settings_submenu', 999 );

/**
 * Customize the admin menu order
 */
if ( ! function_exists( 'CassidyWP\Banyan\custom_menu_order' ) ) :
	/**
	 * Customize the admin menu order. Additional menu items are placed last in alphabetically order.
	 *
	 * @since 1.2.0
	 * @global array $menu A multidimensional array of WP Admin menu items.
	 * @return array An updated list of WP Admin menu items.
	 */
	function custom_menu_order(): array {
		global $menu;

		$main_menu_items = [
			'index.php',                            // Dashboard.
			'separator1',                           // First separator.
			'edit.php',                             // Posts.
			'upload.php',                           // Media.
			'edit.php?post_type=page',              // Pages.
			'edit.php?post_type=city',              // CPT City Pages.
			'edit.php?post_type=state',             // CPT State Pages.
			'edit.php?post_type=testimonial',       // CPT Testimonials.
			'gf_edit_forms',                        // Gravity Forms plugin.
			'separator2',                           // Second separator.
			'themes.php',                           // Appearance.
			'plugins.php',                          // Plugins.
			'users.php',                            // Users.
			'tools.php',                            // Tools.
			'options-general.php',                  // Settings.
			'separator-last',                       // Last separator.
		];

		$remaining_menu = array_filter(
			$menu,
			function ( array $items ) use ( $main_menu_items ): bool {
				return ! in_array( $items[2], $main_menu_items, true );
			}
		);

		// Alphabetically sort the remaining menu.
		usort(
			$remaining_menu,
			function ( array $a, array $b ): int {
				return strcmp( $a[0], $b[0] );
			}
		);

		// Array of remaining menu slugs.
		$remaining_menu_items = array_column( $remaining_menu, 2 );

		return array_merge( $main_menu_items, $remaining_menu_items );
	}
endif;

add_filter( 'custom_menu_order', '__return_true' );
add_filter( 'menu_order', 'CassidyWP\Banyan\custom_menu_order', 10, 1 );

/**
 * Remove `Appearance > Customize` submenu
 */
if ( ! function_exists( 'CassidyWP\Banyan\remove_customize_menu' ) ) :
	/**
	 * Remove `Appearance > Customize` submenu (not used for this theme but Yoast SEO adds it for breadcrumbs which can alternatively be found under `WP Admin > Yoast SEO > Settings > Advanced > Breadcrumbs`). This is also removed from the admin bar in inc/wp-admin-bar.php.
	 *
	 * @since 1.2.0
	 * @global array $submenu An array of WP Admin menu item slugs that contain an array of submenu items
	 * @return void
	 */
	function remove_customize_menu(): void {
		global $submenu;
		$customize_regex = '/customize.php(\?.*)?$/';

		// Check if the "Customize" menu exists and remove it if true.
		if ( isset( $submenu['themes.php'] ) && is_array( $submenu['themes.php'] ) ) {
			foreach ( $submenu['themes.php'] as $key => $menu_item ) {
				if ( preg_match( $customize_regex, $menu_item[2] ) ) {
					unset( $submenu['themes.php'][ $key ] );
					break;
				}
			}
		}
	}
endif;

add_action( 'admin_menu', 'CassidyWP\Banyan\remove_customize_menu', 999 );
