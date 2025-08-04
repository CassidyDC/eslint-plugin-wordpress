<?php
/**
 * Add scripts to HTML head
 *
 * @package CassidyWP\Banyan\Functions
 * @version 1.0.0
 */

declare( strict_types = 1 );
namespace CassidyWP\Banyan;

/**
 * Add wow style to HTML head to hide elements until wow.js activates them
 */
if ( ! function_exists( 'CassidyWP\Banyan\add_scripts_to_head' ) ) :
	/**
	 * Add wow style to HTML head to hide elements until wow.js activates them
	 *
	 * @since 1.3.0
	 * @return void
	 */
	function add_scripts_to_head(): void {
		echo '<script> (function () {
			const head = document.querySelector("head");
			if (head) {
				const wowStyle = document.createElement("style");
				wowStyle.innerHTML = ".wow {visibility: hidden;}";
				head.appendChild(wowStyle);
			}
		}());</script>';
	}
endif;

add_action( 'wp_head', 'CassidyWP\Banyan\add_scripts_to_head', 1 );
