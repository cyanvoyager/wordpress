<?php
namespace gutenify;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Assets {
	public static function init() {
		add_action( 'init', array( __CLASS__, 'register' ) );
	}

	public static function register() {
		$active_blocks = Helpers::active_blocks();
		$plugin_constants = Helpers::plugin_constants();
		$plugin_main_slug = $plugin_constants['plugin_main_slug'];
		$base_dir = $plugin_constants['plugin_main_base_dir'];
		$base_url = $plugin_constants['plugin_main_base_url'];

		foreach( $active_blocks as $block_name ) {

			$asset_file = Helpers::asset_file_values( sprintf( '%s' . 'dist/blocks/' . $block_name . '/index.asset.php', $base_dir ) );

			$handle = $plugin_main_slug . '--' . $block_name;
			wp_register_script( $handle, $base_url . 'dist/blocks/' . $block_name . '/index.js', $asset_file['dependencies'], $asset_file['version'], true );

			if ( file_exists( sprintf( '%s' . 'dist/blocks/' . $block_name . '/index.css', $base_dir ) ) ) {
				wp_register_style( $handle . '--editor', $base_url . 'dist/blocks/' . $block_name . '/index.css', array(), $asset_file['version'] );
			}

			if ( file_exists( sprintf( '%s' . 'dist/blocks/' . $block_name . '/style-index.css', $base_dir ) ) ) {
				wp_register_style( $handle . '--frontend', $base_url . 'dist/blocks/' . $block_name . '/style-index.css', array(), $asset_file['version'] );
			}

			if ( file_exists( sprintf( '%s' . 'dist/blocks/' . $block_name . '/scripts/script.js', $base_dir ) ) ) {
				$asset_file = Helpers::asset_file_values( sprintf( '%s' . 'dist/blocks/' . $block_name . '/scripts/script.asset.php', $base_dir ) );
				wp_register_script( $handle . '--view-script', $base_url . 'dist/blocks/' . $block_name . '/scripts/script.js', $asset_file['dependencies'], $asset_file['version'], true );
			}
		}
	}
}

Assets::init();
