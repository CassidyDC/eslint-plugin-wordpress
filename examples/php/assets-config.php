<?php
/**
 * Configuration functions to set assets properties
 *
 * @package CassidyWP\Banyan\Functions
 * @version 1.0.0
 */

declare(strict_types=1);
namespace CassidyWP\Banyan;

/**
 * Sets theme assets properties
 *
 * Configurable asset properties: `file|cat|handle|deps|(media|args)`.
 *
 * @since 2.0.7
 * @param  string $asset_type The type of asset being retrieved: `style|script|editor_ui_style|editor_ui_script`.
 * @return array A list of assets properties.
 */
function get_theme_assets_config( string $asset_type ): array {
	// Theme stylesheet assets' configuration settings: `file|handle|deps|media`.
	$styles_config = [
		'type'   => 'style',
		'assets' => [
			[
				'file' => 'screen.css',
			],
		],
	];

	// Theme script asset configuration settings: `file|cat|handle|deps|args`.
	$scripts_config = [
		'type'   => 'script',
		'assets' => [
			[
				'file' => 'script.js',
			],
			[
				'file' => 'splide-config.js',
			],
			[
				'file' => 'wow.min.js',
				'cat'  => 'library',
			],
			[
				'file' => 'splide.min.js',
				'cat'  => 'library',
			],
		],
	];

	// Editor UI stylesheet asset configuration settings: `file|handle|deps|media`.
	$editor_ui_styles_config = [
		'type'   => 'editor_ui_style',
		'assets' => [],
	];

	// Editor UI script asset configuration settings: `file|handle|deps|args`.
	$editor_ui_scripts_config = [
		'type'   => 'editor_ui_script',
		'assets' => [
			[
				'file' => 'editor.js',
				'args' => true, // Do not defer.
			],
		],
	];

	// Sets which config settings to return.
	$assets_config = match ( $asset_type ) {
		'styles'            => $styles_config,
		'scripts'           => $scripts_config,
		'editor_ui_styles'  => $editor_ui_styles_config,
		'editor_ui_scripts' => $editor_ui_scripts_config,
	};

	return process_theme_assets( $assets_config );
}

/**
 * Sets editor stylesheets properties for `add_editor_style()`
 *
 * Configurable asset properties: `file`.
 *
 * @since 2.0.7
 * @return array A multidimensional array of editor stylesheet properties.
 */
function get_editor_styles_config(): array {
	$editor_styles_config = [
		[
			'file' => 'editor.css',
		],
	];

	return process_editor_styles( $editor_styles_config );
}

/**
 * Sets block pattern categories properties
 *
 * @since 2.0.7
 * @return array A multidimensional array of block pattern categories properties.
 */
function get_block_pattern_categories_config(): array {
	return [
		'alerts'   => [
			'label'       => __( 'Alerts', 'banyan' ),
			'description' => __( 'A collection of alert patterns.', 'banyan' ),
		],
		'cards'    => [
			'label'       => __( 'Cards', 'banyan' ),
			'description' => __( 'A collection of card patterns.', 'banyan' ),
		],
		'grids'    => [
			'label'       => __( 'Grids', 'banyan' ),
			'description' => __( 'A collection of grid layout patterns.', 'banyan' ),
		],
		'heroes'   => [
			'label'       => __( 'Heroes', 'banyan' ),
			'description' => __( 'A collection of header heroes patterns.', 'banyan' ),
		],
		'pages'    => [
			'label'       => __( 'Pages', 'banyan' ),
			'description' => __( 'A collection of of full page layouts.', 'banyan' ),
		],
		'sections' => [
			'label'       => __( 'Sections', 'banyan' ),
			'description' => __( 'A collection of page sections.', 'banyan' ),
		],
	];
}

/**
 * Sets individual block stylesheets properties
 *
 * Properties are auto-generated with `process_block_styles()`. Nothing to configure here.
 *
 * @since 2.0.7
 * @return array List of individual block stylesheet properties.
 */
function get_block_styles_config(): array {
	return process_block_styles();
}
