<?php
/**
 * Add Zendesk help widget script to HTML head.
 *
 * @package CassidyWP\Banyan\Functions
 * @version 1.0.0
 */

declare( strict_types = 1 );
namespace CassidyWP\Banyan;

/**
 * Add Zendesk help widget script to HTML head
 */
if ( ! function_exists( 'CassidyWP\Banyan\add_widget_to_head' ) ) :
	/**
	 * Add Zendesk help widget script to HTML head
	 *
	 * @phpcs:disable WordPress.WP.EnqueuedResources.NonEnqueuedScript
	 *
	 * @since 1.0.0
	 * @link https://developer.zendesk.com/api-reference/widget/settings/#color
	 * @return void
	 */
	function add_widget_to_head(): void {
		echo '<script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=ed15122a-1f2c-4519-84ea-ddc8dbbe5f4d" defer></script>
		<script type="text/javascript" defer>
		window.zESettings = {
			webWidget: {
				color: {
					theme: "#2099d5",
					launcher: "#2099d5",
					launcherText: "#fff",
					button: "#2b2f6f",
					header: "#2b2f6f",
				},
			}
		};
		</script>';
	}
endif;

add_action( 'wp_head', 'CassidyWP\Banyan\add_widget_to_head' );
