<?php
/**
 * Create and modify the City Custom Post Type (CPT)
 *
 * @package CassidyWP\Banyan\Functions
 * @version 1.0.0
 */

declare( strict_types = 1 );
namespace CassidyWP\Banyan;

/**
 * Create custom post type for City
 */
if ( ! function_exists( 'CassidyWP\Banyan\add_city_cpt' ) ) :
	/**
	 * Create custom post type for City
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function add_city_cpt(): void {
		$labels = [
			'name'                     => __( 'City Pages', 'banyan' ),
			'singular_name'            => __( 'City Page', 'banyan' ),
			'add_new'                  => __( 'Add New City', 'banyan' ),
			'add_new_item'             => __( 'Add New City', 'banyan' ),
			'edit_item'                => __( 'Edit City', 'banyan' ),
			'update_item'              => __( 'Update City', 'banyan' ),
			'new_item'                 => __( 'New City', 'banyan' ),
			'view_item'                => __( 'View City Page', 'banyan' ),
			'view_items'               => __( 'View City Pages', 'banyan' ),
			'search_items'             => __( 'Search City Pages', 'banyan' ),
			'not_found'                => __( 'No city pages found.', 'banyan' ),
			'not_found_in_trash'       => __( 'No city pages found in Trash', 'banyan' ),
			'all_items'                => __( 'All City Pages', 'banyan' ),
			'archive'                  => __( 'City Archives', 'banyan' ),
			'attributes'               => __( 'City Attributes', 'banyan' ),
			'item_published'           => __( 'City Published', 'banyan' ),
			'item_published_privately' => __( 'City Published', 'banyan' ),
			'item_reverted_to_draft'   => __( 'City reverted to draft', 'banyan' ),
			'item_updated'             => __( 'City Updated', 'banyan' ),
		];
		$args   = [
			'labels'       => $labels,
			'description'  => __( 'Displays a city page', 'banyan' ),
			'public'       => true,
			'hierarchical' => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-admin-page',
			'supports'     => [ 'title', 'editor', 'author', 'revisions', 'excerpt', 'thumbnail' ],
			'rewrite'      => true,
		];
		register_post_type( 'city', $args );
	}
endif;

add_action( 'init', 'CassidyWP\Banyan\add_city_cpt' );

/**
 * Make pretty permalink for City CPT pages
 */
if ( ! function_exists( 'CassidyWP\Banyan\city_permalinks' ) ) :
	/**
	 * Make pretty permalink for City CPT pages
	 *
	 * @since 1.0.0
	 * @link https://developer.wordpress.org/reference/hooks/post_type_link/
	 * @param  string   $post_link The post's permalink.
	 * @param  \WP_Post $post The post in question.
	 * @return string The post's permalink.
	 */
	function city_permalinks( string $post_link, \WP_Post $post ): string {
		if ( 'city' === $post->post_type && 'publish' === $post->post_status ) {
			$post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
		}
		return $post_link;
	}
endif;

add_filter( 'post_type_link', 'CassidyWP\Banyan\city_permalinks', 10, 3 );

/**
 * Add City CPT to main query
 */
if ( ! function_exists( 'CassidyWP\Banyan\add_city_post_type_to_main_query' ) ) :
	/**
	 * Add City CPT to main query
	 *
	 * @since 1.0.0
	 * @param  \WP_Query $query The main query.
	 * @return void
	 */
	function add_city_post_type_to_main_query( \WP_Query $query ): void {
		// Bail if this is not the main query.
		if ( ! $query->is_main_query() ) {
			return;
		}
		// Bail if this query doesn't match our very specific rewrite rule.
		if ( ! isset( $query->query['page'] ) || 2 !== count( $query->query ) ) {
			return;
		}
		// Bail if we're not querying based on the post name.
		if ( empty( $query->query['name'] ) ) {
			return;
		}
		// Add City post-type to the list of post types WP will include when it queries based on the post name.
		$query->set( 'post_type', [ 'post', 'page', 'city' ] );
	}
endif;

add_action( 'pre_get_posts', 'CassidyWP\Banyan\add_city_post_type_to_main_query' );
