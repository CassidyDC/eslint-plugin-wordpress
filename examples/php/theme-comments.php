<?php
/**
 * Remove comments from theme.
 *
 * @package CassidyWP\Banyan\Functions
 * @version 1.0.0
 */

declare( strict_types = 1 );
namespace CassidyWP\Banyan;

/**
 * Disable comments and trackbacks
 *
 * @since 1.0.0
 */
add_filter( 'comments_open', '__return_false', 20, 2 );
add_filter( 'pings_open', '__return_false', 20, 2 );

/**
 * Remove comments menu links from WP Admin menu
 */
if ( ! function_exists( 'CassidyWP\Banyan\remove_admin_comments_menus' ) ) :
	/**
	 * Remove comments menu links from WP Admin menu
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function remove_admin_comments_menus(): void {
		// Remove 'Comments' in WP Admin parent-level menu.
		remove_menu_page( 'edit-comments.php' );

		// Remove 'Discussion' in WP Admin > Settings submenu.
		remove_submenu_page( 'options-general.php', 'options-discussion.php' );
	}
endif;

add_action( 'admin_menu', 'CassidyWP\Banyan\remove_admin_comments_menus' );

/**
 * Redirect comments admin page to WP Admin dashboard page
 */
if ( ! function_exists( 'CassidyWP\Banyan\redirect_admin_comments_page' ) ) :
	/**
	 * Redirect comments admin page to WP Admin dashboard page
	 *
	 * @since 1.0.0
	 * @global string $pagenow Returns the filename for the current page
	 * @return void
	 */
	function redirect_admin_comments_page(): void {
		global $pagenow;

		if ( 'edit-comments.php' === $pagenow ) {
			wp_safe_redirect( admin_url() );
			exit;
		}
	}
endif;

add_action( 'admin_init', 'CassidyWP\Banyan\redirect_admin_comments_page' );

/**
 * Remove post type support for comments and trackbacks from all post types (hides related metaboxes)
 */
if ( ! function_exists( 'CassidyWP\Banyan\disable_admin_comments_page' ) ) :
	/**
	 * Remove post type support for comments and trackbacks from all post types (hides related metaboxes).
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function disable_admin_comments_page(): void {
		$post_types = get_post_types();
		foreach ( $post_types as $post_type ) {
			if ( post_type_supports( $post_type, 'comments' ) ) {
				remove_post_type_support( $post_type, 'comments' );
				remove_post_type_support( $post_type, 'trackbacks' );
			}
		}
	}
endif;

add_action( 'admin_init', 'CassidyWP\Banyan\disable_admin_comments_page' );

/**
 * Disable any existing comments
 */
if ( ! function_exists( 'CassidyWP\Banyan\disable_existing_comments' ) ) :
	/**
	 * Disable any existing comments
	 *
	 * @since 1.0.0
	 * @param  array $comments An array of comments.
	 * @return array an empty array.
	 */
	function disable_existing_comments( array $comments ): array {
		$comments = [];
		return $comments;
	}
endif;

add_filter( 'comments_array', 'CassidyWP\Banyan\disable_existing_comments', 10, 2 );
