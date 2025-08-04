<?php
/**
 * Sets custom logo attributes
 *
 * @package CassidyWP\Banyan\Functions
 * @version 1.0.0
 */

declare( strict_types = 1 );
namespace CassidyWP\Banyan;

/**
 * Set theme logo attributes
 */
if ( ! function_exists( 'CassidyWP\Banyan\add_img_attributes' ) ) :
	/**
	 * Set theme logo attributes
	 *
	 * @since 1.0.0
	 * @param  array $attr An array of images and their attributes.
	 * @return array A list of images and their attributes.
	 */
	function add_img_attributes( array $attr ): array {
		if ( 'custom-logo' === $attr['class'] ) {
			$attr['width']  = '310';
			$attr['height'] = '160';
		}
		return $attr;
	}
endif;

add_filter( 'wp_get_attachment_image_attributes', 'CassidyWP\Banyan\add_img_attributes', 10, 3 );
