<?php
/**
 * Creates shortcodes for the theme
 *
 * @package CassidyWP\Banyan\Functions
 * @version 1.0.0
 */

declare( strict_types = 1 );
namespace CassidyWP\Banyan;

/**
 * Create 'year' shortcode
 */
if ( ! function_exists( 'CassidyWP\Banyan\display_current_year' ) ) :
	/**
	 * Create 'year' shortcode
	 *
	 * @since 1.0.0
	 * @return string The current year using Greenwich Mean Time (GMT)
	 */
	function display_current_year(): string {
		$year = gmdate( 'Y' );
		return $year;
	}
endif;

add_shortcode( 'year', 'CassidyWP\Banyan\display_current_year' );

/**
 * Create 'author_name' shortcode to allow custom field override
 */
if ( ! function_exists( 'CassidyWP\Banyan\display_author_name' ) ) :
	/**
	 * Create 'author_name' shortcode to allow custom field override
	 *
	 * @since 2.0.2
	 * @return string The author's name
	 */
	function display_author_name(): string {
		$author          = get_the_author();
		$author_override = get_post_meta( get_the_id(), 'author_override', true );
		if ( $author_override ) {
			$author = $author_override;
		}

		return $author;
	}
endif;

add_shortcode( 'author_name', 'CassidyWP\Banyan\display_author_name' );
