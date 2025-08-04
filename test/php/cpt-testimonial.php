<?php
/**
 * Create and modify the Testimonial Custom Post Type (CPT)
 *
 * @package CassidyWP\Banyan\Functions
 * @version 1.0.0
 */

declare( strict_types = 1 );
namespace CassidyWP\Banyan;

/**
 * Create custom post type for Testimonial
 */
if ( ! function_exists( 'CassidyWP\Banyan\add_testimonial_cpt' ) ) :
	/**
	 * Create custom post type for Testimonial
	 *
	 * @since 1.1.0
	 * @return void
	 */
	function add_testimonial_cpt(): void {
		$labels = [
			'name'                     => __( 'Testimonials', 'banyan' ),
			'singular_name'            => __( 'Testimonial', 'banyan' ),
			'add_new'                  => __( 'Add New Testimonial', 'banyan' ),
			'add_new_item'             => __( 'Add New Testimonial', 'banyan' ),
			'edit_item'                => __( 'Edit Testimonial', 'banyan' ),
			'update_item'              => __( 'Update Testimonial', 'banyan' ),
			'new_item'                 => __( 'New Testimonial', 'banyan' ),
			'view_item'                => __( 'View Testimonial', 'banyan' ),
			'view_items'               => __( 'View Testimonial', 'banyan' ),
			'search_items'             => __( 'Search Testimonial', 'banyan' ),
			'not_found'                => __( 'No testimonials found.', 'banyan' ),
			'not_found_in_trash'       => __( 'No testimonials found in Trash', 'banyan' ),
			'all_items'                => __( 'All Testimonials', 'banyan' ),
			'archive'                  => __( 'Testimonial Archives', 'banyan' ),
			'attributes'               => __( 'Testimonial Attributes', 'banyan' ),
			'item_published'           => __( 'Testimonial Published', 'banyan' ),
			'item_published_privately' => __( 'Testimonial Published', 'banyan' ),
			'item_reverted_to_draft'   => __( 'Testimonial reverted to draft', 'banyan' ),
			'item_updated'             => __( 'Testimonial Updated', 'banyan' ),
		];
		$args   = [
			'labels'             => $labels,
			'description'        => __( 'Displays a testimonial', 'banyan' ),
			'public'             => false,
			'publicly_queryable' => true,
			'has_archive'        => false,
			'hierarchical'       => false,
			'show_ui'            => true,
			'show_in_rest'       => true,
			'menu_icon'          => 'dashicons-heart',
			'supports'           => [ 'title', 'editor', 'revisions' ],
		];
		register_post_type( 'testimonial', $args );
	}
endif;

add_action( 'init', 'CassidyWP\Banyan\add_testimonial_cpt' );
