<?php
namespace gutenify;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Helpers {
	public static function active_blocks() {
		$plugin_constants = self::plugin_constants();
		$function_prefix = $plugin_constants['plugin_main_function_prefix'];
		return apply_filters( $function_prefix . '_active_blocks', array(
			'templates-browser',
			'advance-slide-item',
			'advance-slider',
			'buttons',
			'button',
			'container',
			'content-toggle-item',
			'faqs',
			'gallery-carousel',
			'grid',
			'grid-item',
			'icon',
			'info-box',
			'map',
			'post-carousel',
			'post-list',
			'section-title',
			'service',
			'slide-item',
			'slider',
			'star-rating',
			'team-member',
			'team',
			'testimonial',
			'testimonials',
			'wc-product-carousel',
			'wc-product-list',
		) );
	}

	public static function plugin_constants() {
		$consts = include GUTENIFY_BASE_DIR . 'inc/constants.php';
		$function_prefix = $consts['plugin_main_function_prefix'];
		return apply_filters( $function_prefix . '_plugin_constants', $consts );
	}

	public static function asset_file_values( $path ) {
		$plugin_constants = self::plugin_constants();
		$version = $plugin_constants['plugin_main_version'];

		$asset_path = $path;

		return file_exists( $asset_path )
			? include $asset_path
			: array(
				'dependencies' => array(),
				'version'      => $version,
			);

	}
}
