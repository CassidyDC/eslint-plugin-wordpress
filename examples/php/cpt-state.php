<?php
/**
 * Create and modify the State Custom Post Type (CPT)
 *
 * @package CassidyWP\Banyan\Functions
 * @version 1.0.0
 */

declare( strict_types = 1 );
namespace CassidyWP\Banyan;

/**
 * Create custom post type for State
 */
if ( ! function_exists( 'CassidyWP\Banyan\add_state_cpt' ) ) :
	/**
	 * Create custom post type for State
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function add_state_cpt(): void {
		$labels = [
			'name'                     => __( 'State Pages', 'banyan' ),
			'singular_name'            => __( 'State Page', 'banyan' ),
			'add_new'                  => __( 'Add New State', 'banyan' ),
			'add_new_item'             => __( 'Add New State', 'banyan' ),
			'edit_item'                => __( 'Edit State', 'banyan' ),
			'update_item'              => __( 'Update State', 'banyan' ),
			'new_item'                 => __( 'New State', 'banyan' ),
			'view_item'                => __( 'View State Page', 'banyan' ),
			'view_items'               => __( 'View State Pages', 'banyan' ),
			'search_items'             => __( 'Search State Pages', 'banyan' ),
			'not_found'                => __( 'No state pages found.', 'banyan' ),
			'not_found_in_trash'       => __( 'No state pages found in Trash', 'banyan' ),
			'all_items'                => __( 'All State Pages', 'banyan' ),
			'archive'                  => __( 'State Archives', 'banyan' ),
			'attributes'               => __( 'State Attributes', 'banyan' ),
			'item_published'           => __( 'State Published', 'banyan' ),
			'item_published_privately' => __( 'State Published', 'banyan' ),
			'item_reverted_to_draft'   => __( 'State reverted to draft', 'banyan' ),
			'item_updated'             => __( 'State Updated', 'banyan' ),
		];
		$args   = [
			'labels'       => $labels,
			'description'  => __( 'Displays a state page', 'banyan' ),
			'public'       => true,
			'hierarchical' => false,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-admin-page',
			'supports'     => [ 'title', 'editor', 'author', 'revisions', 'excerpt', 'thumbnail' ],
			'rewrite'      => [ 'slug' => 'state-directory' ],
		];
		register_post_type( 'state', $args );
	}
endif;

add_action( 'init', 'CassidyWP\Banyan\add_state_cpt' );
