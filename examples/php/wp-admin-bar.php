<?php
/**
 * WordPress Admin Bar Modifications
 *
 * @package CassidyWP\Banyan\Functions
 * @version 1.0.0
 */

declare( strict_types = 1 );
namespace CassidyWP\Banyan;

/**
 * Modify the WordPress Admin Bar
 */
if ( ! function_exists( 'CassidyWP\Banyan\modify_admin_bar' ) ) :
	/**
	 * Modify the WordPress Admin Bar
	 *
	 * @since 1.2.0
	 * @link https://developer.wordpress.org/reference/hooks/admin_bar_menu/
	 * @param  \WP_Admin_Bar $wp_admin_bar The WordPress Admin Bar object.
	 * @return void
	 */
	function modify_admin_bar( \WP_Admin_Bar $wp_admin_bar ): void {
		if ( is_admin_bar_showing() ) {
			// Remove Customize link (not used for this theme but Yoast SEO adds it for breadcrumbs which can be found under `WP Admin > Yoast SEO > Settings > Advanced > Breadcrumbs`). This is also removed from the admin menu in inc/wp-admin-menu.php.
			$wp_admin_bar->remove_node( 'customize' );

			// Remove WP Logo (for less clutter).
			$wp_admin_bar->remove_node( 'wp-logo' );

			// Remove comments link (not used for this theme).
			$wp_admin_bar->remove_node( 'comments' );
		}
	}
endif;

add_action( 'admin_bar_menu', 'CassidyWP\Banyan\modify_admin_bar', 999 );
