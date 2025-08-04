<?php
/**
 * Remove unwanted Core WordPress features
 *
 * @package CassidyWP\Banyan\Functions
 * @version 1.0.0
 */

declare( strict_types = 1 );
namespace CassidyWP\Banyan;

// phpcs:disable Squiz.PHP.CommentedOutCode.Found
// phpcs:disable Squiz.Commenting.InlineComment.InvalidEndChar

/**
 * Remove unwanted core blocks
 */
if ( ! function_exists( 'CassidyWP\Banyan\remove_core_blocks' ) ) :
	/**
	 * Remove unwanted core blocks from the editor (but not the registry)
	 *
	 * @since 2.0.3 Remove comment blocks.
	 * @since 3.0.0 Remove all unneeded blocks.
	 *
	 * @return string[] A list of core block slugs.
	 */
	function remove_core_blocks(): array {
		$blocks = \WP_Block_Type_Registry::get_instance()->get_all_registered();

		// Design.
		// unset( $blocks['core/button'] );
		// unset( $blocks['core/buttons'] );
		// unset( $blocks['core/column'] );
		// unset( $blocks['core/columns'] );
		// unset( $blocks['core/comment-template'] );
		// unset( $blocks['core/group'] );
		// unset( $blocks['core/home-link'] );
		unset( $blocks['core/more'] );
		// unset( $blocks['core/navigation-link'] );
		// unset( $blocks['core/navigation-submenu'] );
		unset( $blocks['core/nextpage'] ); // aka Page Break.
		unset( $blocks['core/separator'] );
		unset( $blocks['core/spacer'] );
		// unset( $blocks['core/text-columns'] );
		// Embed.
		// unset( $blocks['core/embed'] );
		// Media.
		unset( $blocks['core/audio'] );
		// unset( $blocks['core/cover'] );
		unset( $blocks['core/file'] );
		// unset( $blocks['core/gallery'] );
		// unset( $blocks['core/image'] );
		unset( $blocks['core/media-text'] );
		unset( $blocks['core/video'] );
		// Reusable.
		// unset( $blocks['core/block'] );
		// Text.
		unset( $blocks['core/code'] );
		// unset( $blocks['core/details'] );
		// unset( $blocks['core/footnotes'] );
		unset( $blocks['core/freeform'] ); // aka Classic
		// unset( $blocks['core/heading'] );
		// unset( $blocks['core/list'] );
		// unset( $blocks['core/list-item'] );
		// unset( $blocks['core/missing'] );
		// unset( $blocks['core/paragraph'] );
		unset( $blocks['core/preformatted'] );
		unset( $blocks['core/pullquote'] );
		// unset( $blocks['core/quote'] );
		// unset( $blocks['core/table'] );
		unset( $blocks['core/verse'] );
		// Theme.
		unset( $blocks['core/avatar'] );
		unset( $blocks['core/comment-author-name'] );
		unset( $blocks['core/comment-content'] );
		unset( $blocks['core/comment-date'] );
		unset( $blocks['core/comment-edit-link'] );
		unset( $blocks['core/comment-reply-link'] );
		unset( $blocks['core/comments'] );
		unset( $blocks['core/comments-pagination'] );
		unset( $blocks['core/comments-pagination-next'] );
		unset( $blocks['core/comments-pagination-numbers'] );
		unset( $blocks['core/comments-pagination-previous'] );
		unset( $blocks['core/comments-title'] );
		unset( $blocks['core/loginout'] );
		unset( $blocks['core/navigation'] );
		unset( $blocks['core/pattern'] );
		unset( $blocks['core/post-author'] );
		unset( $blocks['core/post-author-biography'] );
		unset( $blocks['core/post-author-name'] );
		unset( $blocks['core/post-comments'] );
		unset( $blocks['core/post-comments-form'] );
		unset( $blocks['core/post-content'] );
		unset( $blocks['core/post-date'] );
		unset( $blocks['core/post-excerpt'] );
		unset( $blocks['core/post-featured-image'] );
		unset( $blocks['core/post-navigation-link'] );
		unset( $blocks['core/post-template'] );
		unset( $blocks['core/post-terms'] );
		// unset( $blocks['core/post-title'] );
		unset( $blocks['core/query'] );
		unset( $blocks['core/query-no-results'] );
		unset( $blocks['core/query-pagination'] );
		unset( $blocks['core/query-pagination-next'] );
		unset( $blocks['core/query-pagination-numbers'] );
		unset( $blocks['core/query-pagination-previous'] );
		unset( $blocks['core/query-title'] );
		unset( $blocks['core/read-more'] );
		unset( $blocks['core/site-logo'] );
		unset( $blocks['core/site-tagline'] );
		unset( $blocks['core/site-title'] );
		unset( $blocks['core/template-part'] );
		unset( $blocks['core/term-description'] );
		// Widget.
		unset( $blocks['core/archives'] );
		unset( $blocks['core/calendar'] );
		unset( $blocks['core/categories'] );
		unset( $blocks['core/html'] );
		unset( $blocks['core/latest-comments'] );
		unset( $blocks['core/latest-posts'] );
		unset( $blocks['core/legacy-widget'] );
		unset( $blocks['core/page-list'] );
		unset( $blocks['core/page-list-item'] );
		unset( $blocks['core/rss'] );
		unset( $blocks['core/search'] );
		unset( $blocks['core/shortcode'] );
		unset( $blocks['core/social-link'] );
		unset( $blocks['core/social-links'] );
		unset( $blocks['core/tag-cloud'] );
		unset( $blocks['core/widget-group'] );

		return array_keys( $blocks );
	}
endif;

add_action( 'allowed_block_types_all', 'CassidyWP\Banyan\remove_core_blocks' );

/**
 * Remove unwanted core styles
 */
if ( ! function_exists( 'CassidyWP\Banyan\remove_core_block_styles' ) ) :
	/**
	 * Remove unwanted core block style
	 *
	 * @since 3.0.0
	 *
	 * @param array $settings Array of determined settings for registering a block type.
	 * @param array $metadata Metadata provided for registering a block type.
	 *
	 * @return array Filtered settings.
	 */
	function remove_core_block_styles( $settings, $metadata ) {
		if ( empty( $settings['styles'] ) ) {
			return $settings;
		}

		// The default block styles to remove for each block.
		switch ( $metadata['name'] ) {
			case 'core/image':
			case 'core/site-logo':
				$styles_to_remove = [ 'rounded' ];
				break;

			case 'core/quote':
				$styles_to_remove = [ 'plain' ];
				break;

			case 'core/separator':
				$styles_to_remove = [ 'dots', 'wide' ];
				break;

			case 'core/social-links':
				$styles_to_remove = [ 'logos-only', 'pill-shape' ];
				break;

			// case 'core/table':
			// $styles_to_remove = array( 'stripes' );
			// break;

			default:
				$styles_to_remove = [];
				break;
		}

		// Remove the block styles.
		foreach ( $styles_to_remove as $style_to_remove ) {
			$settings['styles'] = array_filter(
				$settings['styles'],
				function ( $style ) use ( $style_to_remove ) {
					return $style['name'] !== $style_to_remove;
				}
			);
		}

		// If there is only one block style left, it could be the default one. So remove it, as there's no need for a
		// default style if there are no other styles to choose from.
		if ( ! empty( $settings['styles'] ) && count( $settings['styles'] ) === 1 ) {
			$settings['styles'] = array_filter(
				$settings['styles'],
				function ( $style ) {
					return ! ( isset( $style['isDefault'] ) && $style['isDefault'] );
				}
			);
		}

		return $settings;
	}
endif;

add_filter( 'block_type_metadata_settings', 'CassidyWP\Banyan\remove_core_block_styles', 10, 2 );

/**
 * Remove core block patterns
 */
if ( ! function_exists( 'CassidyWP\Banyan\remove_core_block_patterns' ) ) :
	/**
	 * Remove core block patterns
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function remove_core_block_patterns(): void {
		remove_theme_support( 'core-block-patterns' );
	}
endif;

add_action( 'after_setup_theme', 'CassidyWP\Banyan\remove_core_block_patterns' );

/**
 * Remove Openverse
 */
if ( ! function_exists( 'CassidyWP\Banyan\disable_openverse' ) ) :
	/**
	 * Remove Openverse from the editor
	 *
	 * @since 1.2.0
	 * @param  array $editor_settings An array of settings for the editor.
	 * @return array The editor settings.
	 */
	function disable_openverse( array $editor_settings ): array {
		$editor_settings['enableOpenverseMediaCategory'] = false;
		return $editor_settings;
	}
endif;

add_filter( 'block_editor_settings_all', 'CassidyWP\Banyan\disable_openverse', 10, 2 );

/**
 * Remove the WordPress font library UI
 */
if ( ! function_exists( 'CassidyWP\Banyan\remove_font_library_ui' ) ) :
	/**
	 * Remove the WordPress font library UI
	 *
	 * @since 2.0.5
	 * @link https://developer.wordpress.org/reference/hooks/block_editor_settings_all/
	 * @param  array $editor_settings An array of settings for the editor.
	 * @return array The editor settings.
	 */
	function remove_font_library_ui( array $editor_settings ): array {
		$editor_settings['fontLibraryEnabled'] = false;
		return $editor_settings;
	}
endif;

add_filter( 'block_editor_settings_all', 'CassidyWP\Banyan\remove_font_library_ui' );

/**
 * Remove WordPress Remote Block Patterns from the editor block inserter.
 *
 * @since 1.2.0
 * @link https://developer.wordpress.org/block-editor/reference-guides/filters/editor-filters/#should_load_remote_block_patterns
 */
add_filter( 'should_load_remote_block_patterns', '__return_false' );

/**
 * Remove WordPress Block Directory from the editor block inserter.
 *
 * @since 1.0.0
 * @link https://developer.wordpress.org/block-editor/reference-guides/filters/editor-filters/#block-directory
 */
remove_action( 'enqueue_block_editor_assets', 'wp_enqueue_editor_block_directory_assets' );
