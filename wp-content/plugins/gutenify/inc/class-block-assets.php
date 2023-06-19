<?php
/**
 * Load assets for our blocks.
 *
 * @package Gutenify
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load general assets for our blocks.
 *
 * @since 1.0.0
 */
class Gutenify_Block_Assets {
	/**
	 * This plugin's instance.
	 *
	 * @var Gutenify_Block_Assets
	 */
	private static $instance;

	/**
	 * Registers the plugin.
	 *
	 * @return Gutenify_Block_Assets
	 */
	public static function register() {
		if ( null === self::$instance ) {
			self::$instance = new Gutenify_Block_Assets();
		}

		return self::$instance;
	}

	/**
	 * The Constructor.
	 */
	public function __construct() {
		// add_action( 'enqueue_block_assets', array( $this, 'block_assets' ) );
		add_action( 'init', array( $this, 'editor_assets' ) );
		add_action( 'init', array( $this, 'register_assets' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'add_block_inline_css' ), 200 );
		add_action( 'admin_footer', array( $this, 'add_admin_global_inline_css' ), 200 );
		add_action( 'wp_enqueue_scripts', array( $this, 'frontend_scripts' ), 9 );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
		add_action( 'block_type_metadata', array( $this, 'block_type_metadata' ) );
	}

	/**
	 * Enqueue block assets for use within Gutenberg.
	 *
	 * @access public
	 */
	public function block_assets() {
		if ( is_admin() ) {
			return false;
		}
		global $post;

		// Only load the front end CSS if a Gutenify is in use.
		$has_gutenify = ! is_singular();

		if ( ! is_admin() && is_singular() ) {
			$wp_post = get_post( $post );

			// This is similar to has_block() in core, but will match anything
			// in the gutenify/* namespace.
			if ( $wp_post instanceof WP_Post ) {
				$has_gutenify = ! empty(
					array_filter(
						array(
							false !== strpos( $wp_post->post_content, '<!-- wp:gutenify/' ),
							has_block( 'core/block', $wp_post ),
							has_block( 'core/button', $wp_post ),
							has_block( 'core/cover', $wp_post ),
							has_block( 'core/heading', $wp_post ),
							has_block( 'core/image', $wp_post ),
							has_block( 'core/gallery', $wp_post ),
							has_block( 'core/list', $wp_post ),
							has_block( 'core/paragraph', $wp_post ),
							has_block( 'core/pullquote', $wp_post ),
							has_block( 'core/quote', $wp_post ),
						)
					)
				);
			}
		}

		// if ( ! $has_gutenify && ! $this->is_page_gutenberg() ) {
		// return;
		// }



		// Styles.
		// $name       = 'gutenify-blocks';
		// $asset_file = gutenify_get_block_asset_file_values( sprintf( '%sdist/' . $name . '.asset.php', GUTENIFY_BASE_DIR ) );

		// $rtl        = ! is_rtl() ? '' : '-rtl';

		// $deps = array( 'gutenify-fontawesome-style' );

		// if ( $fonts_url ) {
		// 	$deps[] = 'gutenify-fonts';
		// }

		global $wp_styles;
		if ( in_array( 'global-styles', $wp_styles->queue ) ) {
			$deps[] = 'global-styles';
		}
		if ( in_array( 'woocommerce-layout', $wp_styles->queue ) ) {
			$deps[] = 'woocommerce-layout';
		}

		// wp_enqueue_style( 'gutenify-frontend', GUTENIFY_BASE_URL . 'dist/style-' . $name . $rtl . '.css', $deps, $asset_file['version'] );

	}

	/**
	 * Enqueue block assets for use within Gutenberg.
	 *
	 * @access public
	 */
	public function editor_assets() {


		// Styles.
		// $name       = 'gutenify-blocks';
		// $filepath   = 'dist/' . $name;
		// $asset_file = gutenify_get_block_asset_file_values( sprintf( '%s' . $filepath . '.asset.php', GUTENIFY_BASE_DIR ) );


		// $deps = array( 'gutenify-fontawesome' );

		// if ( $fonts_url ) {
		// 	$deps[] = 'gutenify-fonts';
		// }

		// if ( class_exists( 'woocommerce' ) ) {
		// 	$deps[] = 'wc-blocks-editor-style';
		// }

		// wp_enqueue_style( 'gutenify-editor', GUTENIFY_BASE_URL . $filepath . '.css', $deps, $asset_file['version'] );

		// Scripts.
		// $name       = 'gutenify-blocks';
		// $filepath   = 'dist/' . $name;
		// $asset_file = gutenify_get_block_asset_file_values( $filepath );

		// wp_register_script(
		// 	'gutenify-editor',
		// 	GUTENIFY_BASE_URL . $filepath . '.js',
		// 	array_merge( $asset_file['dependencies'], array( 'wp-api', 'gutenify-global' ) ),
		// 	$asset_file['version'],
		// 	true
		// );

		$post_id = filter_input( INPUT_GET, 'post', FILTER_SANITIZE_NUMBER_INT );

		wp_localize_script(
			'gutenify-editor',
			'gutenify_block_data',
			array(
				'plugin_directory_url'     => esc_url( GUTENIFY_BASE_URL ),
				'site_url'                 => esc_url( site_url() ),
				'settings_url'             => esc_url( admin_url( 'edit.php?post_type=gutenify_template&page=gutenify-settings' ) ),
				'add_template_url'         => esc_url( admin_url( 'post-new.php?post_type=gutenify_template' ) ),
				'is_woocommerce_activated' => class_exists( 'woocommerce' ),
			)
		);

		$localized_values = array(
			'font_families'        => gutenify_font_families(),
			'plugin_directory_url' => esc_url( GUTENIFY_BASE_URL ),
			'site_url'             => esc_url( site_url() ),
		);
		wp_localize_script(
			'gutenify-editor',
			'_gutenify',
			apply_filters( 'gutenify-admin-localized-values', $localized_values ),
		);

		$localized_vars = array(
			'site_url'             => esc_url( site_url() ),
			'plugin_directory_url' => esc_url( GUTENIFY_BASE_URL ),
			'gutenify_version'     => GUTENIFY_VERSION,
			'pro_license_status'   => apply_filters( 'gutenify_pro_license_status', false ),
			'is_pro_activated'     => apply_filters( 'gutenify_pro_activation_status', false ),
		);

		wp_localize_script( 'gutenify-editor', '_gutenify_vars', apply_filters( 'gutenify--editor--localized-vars', $localized_vars ) );
	}

	/**
	 * Enqueue front-end assets for blocks.
	 *
	 * @access public
	 * @since 1.9.5
	 */
	public function frontend_scripts() {
		// Scripts.
		// $filepath       = 'dist/frontend';
		// $asset_file = gutenify_get_block_asset_file_values( sprintf( '%s' . $filepath . '/index.asset.php', GUTENIFY_BASE_DIR ) );
		// $asset_file['dependencies'] = 'gutenify-swiper';

		// Enqueue frontend scripts.
		wp_enqueue_script( 'gutenify-frontend' );
	}

	/**
	 * Return whether a post type should display the Block Editor.
	 *
	 * @param string $post_type The post_type slug to check.
	 */
	protected function is_post_type_gutenberg( $post_type ) {
		return use_block_editor_for_post_type( $post_type );
	}

	/**
	 * Return whether the page we are on is loading the Block Editor.
	 */
	protected function is_page_gutenberg() {
		if ( ! is_admin() ) {
			return false;
		}

		$admin_page = wp_basename( esc_url( $_SERVER['REQUEST_URI'] ) );

		if ( false !== strpos( $admin_page, 'post-new.php' ) && empty( $_GET['post_type'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			return true;
		}

		if ( false !== strpos( $admin_page, 'post-new.php' ) && isset( $_GET['post_type'] ) && $this->is_post_type_gutenberg( $_GET['post_type'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			return true;
		}

		if ( false !== strpos( $admin_page, 'post.php' ) ) {
			$wp_post = get_post( $_GET['post'] ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( isset( $wp_post ) && isset( $wp_post->post_type ) && $this->is_post_type_gutenberg( $wp_post->post_type ) ) {
				return true;
			}
		}

		if ( false !== strpos( $admin_page, 'revision.php' ) ) {
			$wp_post     = get_post( $_GET['revision'] ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$post_parent = get_post( $wp_post->post_parent );
			if ( isset( $post_parent ) && isset( $post_parent->post_type ) && $this->is_post_type_gutenberg( $post_parent->post_type ) ) {
				return true;
			}
		}
		return false;
	}

	/**
	 * Add inline css
	 *
	 * @return void
	 */
	public static function add_block_inline_css() {
		if ( is_singular() ) {
			global $post;
			$post_meta           = get_post_meta( $post->ID );
			$custom_css = ! empty( $post_meta['gutenify_custom_css'][0] ) ? $post_meta['gutenify_custom_css'][0] : '';
			wp_add_inline_style( 'gutenify-frontend', $custom_css );
		}
		$gutenify_global_style = get_option( 'gutenify_global_style' );


		if ( $gutenify_global_style ) {
			$handle = 'gutenify-global-inline-handle';
			wp_enqueue_style( $handle );
			wp_add_inline_style( $handle, $gutenify_global_style );
		}
	}

	/**
	 * Add Global inline css
	 *
	 * @return void
	 */
	public static function add_admin_global_inline_css() {

		$gutenify_admin_global_style = get_option( 'gutenify_admin_global_style' );

		if ( $gutenify_admin_global_style ) {
			$handle = 'gutenify-global-inline-handle';
			wp_enqueue_style( $handle );
			wp_add_inline_style( $handle, $gutenify_admin_global_style );
		}
	}

	/**
	 * Admin scripts.
	 *
	 * @return mixed
	 */
	public function admin_scripts() {
		$constants = include GUTENIFY_BASE_DIR . 'inc/constants.php';
		$plugin_main_slug = $constants['plugin_main_slug'];
		$plugin_main_function_prefix = $constants['plugin_main_function_prefix'];
		$plugin_main_base_url = $constants['plugin_main_base_url'];
		$plugin_main_version = $constants['plugin_main_version'];


		global $wp_version;
		$localized_vars = array(
			// 'site_url'             => esc_url( site_url() ),
			// 'plugin_directory_url' => esc_url( $plugin_main_base_url ),
			// $plugin_main_function_prefix . '_version'     => $plugin_main_version,
			// 'pro_license_status'   => apply_filters( $plugin_main_function_prefix . '_pro_license_status', false ),
			// 'is_pro_activated'     => apply_filters( $plugin_main_function_prefix . '_pro_activation_status', false ),
			// 'is_block_theme'           => wp_is_block_theme(), // function_exists( 'wp_get_theme' ) && ! empty( wp_get_theme()->is_block_theme() ),
			// 'is_woocommerce_activated' => class_exists( 'woocommerce' ),
			// 'gutenify_com_server_url'  => defined( 'GUTENIFY_COM_SERVER_URL' ) ? trailingslashit( GUTENIFY_COM_SERVER_URL ) : trailingslashit( 'https://api.gutenify.com/' ),
			// 'font_families'            => gutenify_font_families(),
			// 'wp_version'              => $wp_version,
		);

		// Getting Started.
		if ( ( ! empty( $_GET['page'] ) && $plugin_main_slug === $_GET['page'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			// Scripts.
			$handle       = $plugin_main_slug . '-admin-getting-started';
			wp_enqueue_script( $handle );
			wp_enqueue_style( $handle );

			// wp_localize_script( $handle, '_' . $plugin_main_function_prefix . '_vars', $localized_vars );
		}

		// Site options
		if ( ( ! empty( $_GET['page'] ) && 'gutenify-site-options' === $_GET['page'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			// Scripts.
			$name       = 'gutenify-site-options-admin';
			$filepath   = 'dist/' . $name;
			$asset_file = gutenify_get_block_asset_file_values( sprintf( '%s' . $filepath . '.asset.php', GUTENIFY_BASE_DIR ) );

			wp_enqueue_script(
				'gutenify-site-options-admin',
				GUTENIFY_BASE_URL . $filepath . '.js',
				$asset_file['dependencies'],
				$asset_file['version'],
				true
			);

			// Styles.
			$name       = 'gutenify-site-options-admin-style';
			$filepath   = 'dist/' . $name;
			$asset_file = gutenify_get_block_asset_file_values( sprintf( '%s' . $filepath . '.asset.php', GUTENIFY_BASE_DIR ) );
			$rtl        = ! is_rtl() ? '' : '-rtl';

			wp_enqueue_style(
				$name,
				GUTENIFY_BASE_URL . $filepath . $rtl . '.css',
				array( 'gutenify-fontawesome-style', 'wp-components' ),
				$asset_file['version']
			);

			wp_localize_script(
				'gutenify-site-options-admin',
				'_gutenify_site_options',
				array(
					'site_url'                 => esc_url( site_url() ),
					'gutenify_com_server_url'  => defined( 'GUTENIFY_COM_SERVER_URL' ) ? trailingslashit( GUTENIFY_COM_SERVER_URL ) : trailingslashit( 'https://api.gutenify.com/' ),
					'is_block_theme'           => function_exists( 'wp_get_theme' ) && ! empty( wp_get_theme()->is_block_theme() ),
					'is_woocommerce_activated' => class_exists( 'woocommerce' ),
					'pro_license_status'       => apply_filters( 'gutenify_pro_license_status', false ),
				)
			);
		}

		// if ( ! empty( $_GET['post_type'] ) && 'gutenify_kit' === $_GET['post_type'] ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( ( ! empty( $_GET['page'] ) && 'gutenify-template-kits' === $_GET['page'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			// Scripts.
			$name       = 'gutenify-kit-admin';
			$filepath   = 'dist/' . $name;
			$asset_file = gutenify_get_block_asset_file_values( sprintf( '%s' . $filepath . '.asset.php', GUTENIFY_BASE_DIR ) );

			wp_enqueue_script(
				'gutenify-kit-admin',
				GUTENIFY_BASE_URL . $filepath . '.js',
				$asset_file['dependencies'],
				$asset_file['version'],
				true
			);

			// Styles.
			$name       = 'gutenify-kit-admin';
			$filepath   = 'dist/' . $name;
			$asset_file = gutenify_get_block_asset_file_values( sprintf( '%s' . $filepath . '.asset.php', GUTENIFY_BASE_DIR ) );
			$rtl        = ! is_rtl() ? '' : '-rtl';

			wp_enqueue_style(
				$name,
				GUTENIFY_BASE_URL . $filepath . $rtl . '.css',
				array( 'gutenify-fontawesome-style', 'wp-components' ),
				$asset_file['version']
			);

			wp_localize_script(
				'gutenify-kit-admin',
				'_gutenify_kit',
				array(
					'plugin_directory_url'     => esc_url( GUTENIFY_BASE_URL ),
					'site_url'                 => esc_url( site_url() ),
					'gutenify_com_server_url'  => defined( 'GUTENIFY_COM_SERVER_URL' ) ? trailingslashit( GUTENIFY_COM_SERVER_URL ) : trailingslashit( 'https://api.gutenify.com/' ),
					'is_block_theme'           => wp_is_block_theme(), // function_exists( 'wp_get_theme' ) && ! empty( wp_get_theme()->is_block_theme() ),
					'is_woocommerce_activated' => class_exists( 'woocommerce' ),
					'pro_license_status'       => apply_filters( 'gutenify_pro_license_status', false ),
				)
			);

			wp_localize_script(
				'gutenify-kit-admin',
				'_gutenify_vars',
				array(
					'plugin_directory_url'     => esc_url( GUTENIFY_BASE_URL ),
					'site_url'                 => esc_url( site_url() ),
					'gutenify_com_server_url'  => defined( 'GUTENIFY_COM_SERVER_URL' ) ? trailingslashit( GUTENIFY_COM_SERVER_URL ) : trailingslashit( 'https://api.gutenify.com/' ),
					'is_block_theme'           => wp_is_block_theme(), // function_exists( 'wp_get_theme' ) && ! empty( wp_get_theme()->is_block_theme() ),
					'is_woocommerce_activated' => class_exists( 'woocommerce' ),
					'pro_license_status'       => apply_filters( 'gutenify_pro_license_status', false ),
					'font_families'            => gutenify_font_families(),
					'is_pro_activated'         => apply_filters( 'gutenify_pro_activation_status', false ),
				)
			);
		}

		if ( ( ! empty( $_GET['page'] ) && $plugin_main_slug . '-demo-importer' === $_GET['page'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			// Scripts.
			$handle       = $plugin_main_slug . '-admin-demo-importer';
			wp_enqueue_script( $handle );
			wp_enqueue_style( $handle );

			// $localized_vars = array_merge( $localized_vars, array() );
			// wp_localize_script( $handle, '_' . $plugin_main_function_prefix . '_vars', $localized_vars);
		}

		if ( ( ! empty( $_GET['page'] ) && 'gutenify-start-up' === $_GET['page'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			// Scripts.
			$name       = 'start-up-admin';
			$handle       = 'gutenify-' . $name;
			$filepath   = 'dist/admin/' . $name;
			$asset_file = gutenify_get_block_asset_file_values( sprintf( '%s' . $filepath . '.asset.php', GUTENIFY_BASE_DIR ) );

			wp_enqueue_script( $handle, GUTENIFY_BASE_URL . $filepath . '/index.js', $asset_file['dependencies'], $asset_file['version'], true );

			$deps[] = 'wp-components';
			wp_enqueue_style( $handle, GUTENIFY_BASE_URL . $filepath . '/index.css', $deps, $asset_file['version'] );

			$theme = wp_get_theme();
			$localized_vars = array(
				'site_url' => esc_url( site_url() ),
				'theme_slug' => $theme->template,
			);

			wp_localize_script( $handle, '_gutenify_start_up_vars', apply_filters( 'gutenify--start-up--localized-vars', $localized_vars ) );
			wp_localize_script( $handle,
				'_gutenify_vars',
				array(
					'plugin_directory_url'     => esc_url( GUTENIFY_BASE_URL ),
					'site_url'                 => esc_url( site_url() ),
					'gutenify_com_server_url'  => defined( 'GUTENIFY_COM_SERVER_URL' ) ? trailingslashit( GUTENIFY_COM_SERVER_URL ) : trailingslashit( 'https://api.gutenify.com/' ),
					'is_block_theme'           => wp_is_block_theme(), // function_exists( 'wp_get_theme' ) && ! empty( wp_get_theme()->is_block_theme() ),
					'is_woocommerce_activated' => class_exists( 'woocommerce' ),
					'pro_license_status'       => apply_filters( 'gutenify_pro_license_status', false ),
					'font_families'            => gutenify_font_families(),
					'is_pro_activated'         => apply_filters( 'gutenify_pro_activation_status', false ),
				)
			);
		}

		if ( ( ! empty( $_GET['page'] ) &&  $plugin_main_slug . '-settings' === $_GET['page'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$handle = $plugin_main_slug . '-admin-settings';
			wp_enqueue_script( $handle );
			wp_enqueue_style( $handle );
		}
	}

	/**
	 * Register plugin assets.
	 *
	 * @return void
	 */
	public function register_assets() {
		$constants = include GUTENIFY_BASE_DIR . 'inc/constants.php';
		$plugin_main_slug = $constants['plugin_main_slug'];
		$plugin_main_function_prefix = $constants['plugin_main_function_prefix'];
		$plugin_main_base_url = $constants['plugin_main_base_url'];
		$plugin_main_version = $constants['plugin_main_version'];
		$plugin_main_post_type_prefix = $constants['plugin_main_post_type_prefix'];

		global $wp_version;

		// Admin and Frontend localized vars.
		$localized_vars = array(
			'site_url'             => esc_url( site_url() ),
			$plugin_main_function_prefix . '_version'     => $plugin_main_version,
			'is_woocommerce_activated' => class_exists( 'woocommerce' ),
			'wp_version'              => $wp_version,
			'add_template_url'         => esc_url( admin_url( 'post-new.php?post_type=' . $plugin_main_post_type_prefix . '_template' ) ),
			'pro_account_url' => esc_url( admin_url( 'admin.php?page=' . $plugin_main_slug . '-pro-license' ) )
		);

		// Register anonymous handle.
		$handle = $plugin_main_slug . '-global-inline-handle';
		wp_register_style( $handle, false );
		wp_register_script( $handle, false );

		if ( is_admin() ) {
			$localized_vars = array_merge( $localized_vars, array(
				'site_url'             => esc_url( site_url() ),
				'plugin_directory_url' => esc_url( $plugin_main_base_url ),
				$plugin_main_function_prefix . '_version'     => $plugin_main_version,
				'pro_license_status'   => apply_filters( $plugin_main_function_prefix . '_pro_license_status', false ),
				'is_pro_activated'     => gutenify_is_pro_active(),
				'is_block_theme'           => wp_is_block_theme(), // function_exists( 'wp_get_theme' ) && ! empty( wp_get_theme()->is_block_theme() ),
				'is_woocommerce_activated' => class_exists( 'woocommerce' ),
				'gutenify_com_server_url'  => defined( 'GUTENIFY_COM_SERVER_URL' ) ? trailingslashit( GUTENIFY_COM_SERVER_URL ) : trailingslashit( 'https://api.gutenify.com/' ),
				'font_families'            => gutenify_font_families(),
				'wp_version'              => $wp_version,
				'active_blocks' => \gutenify\Helpers::active_blocks(),
			) );
		}

		// Components
		$name = $plugin_main_slug . '-components';
		$asset_file = gutenify_get_block_asset_file_values( sprintf( '%sdist/components/index.asset.php', GUTENIFY_BASE_DIR ) );
		$asset_file['dependencies'][] = $plugin_main_slug . '-global-inline-handle';
		// error_log( print_r( $asset_file,true ));
		wp_register_script( $name, GUTENIFY_BASE_URL . 'dist/components/index.js', $asset_file['dependencies'], $asset_file['version'] );
		wp_register_style( $name, GUTENIFY_BASE_URL . 'dist/components/index.css', array('wp-components'), $asset_file['version'] );

		wp_localize_script( $name, 'gutenify_components_vars', array(
				'brand_color'     => '#2196f3',
		) );


		// Scrollmagic JS.
		$name     = $plugin_main_slug . '-scrollmagic';
		$filepath = 'assets/js/lib/scrollmagic';
		wp_register_script( $name, GUTENIFY_BASE_URL . $filepath . '/ScrollMagic.min.js', array( 'jquery' ), '2.0.8', false );
		wp_register_script( $name, GUTENIFY_BASE_URL . $filepath . '/ScrollMagic.min.js', array( 'jquery' ), '2.0.8', false );

		// Isotope JS.
		$name     = 'gutenify-isotope';
		$filepath = 'assets/js/lib/isotope.pkgd';
		wp_register_script( $name, GUTENIFY_BASE_URL . $filepath . '.js', array( 'jquery' ), '3.0.6', false );

		// Regsiter fonts url.
		$fonts_url = gutenify_fonts_url();
		wp_register_style( $plugin_main_slug . '-fonts', $fonts_url, array(), null );

		wp_register_style( $plugin_main_slug . '-fontawesome', GUTENIFY_BASE_URL . '/assets/fontawesome/css/all.css', array(), 'v4' );

		// Swiper JS.
		wp_register_script( $plugin_main_slug . '-swiper', GUTENIFY_BASE_URL . 'assets/js/lib/swiper-bundle.js', array( 'jquery' ), '6.8.2', false );

		// Swiper styles.
		wp_register_style( $plugin_main_slug . '-swiper', GUTENIFY_BASE_URL . 'assets/css/lib/swiper-bundle.min.css', array(), '6.8.2' );

		// Magnific JS.
		wp_register_script( 'jquery-magnific-popup', GUTENIFY_BASE_URL . 'assets/js/lib/jquery.magnific-popup.js', array( 'jquery' ), '1.1.0', true );

		// Magnific style.
		wp_register_style( 'jquery-magnific-popup', GUTENIFY_BASE_URL . 'assets/css/lib/magnific-popup.css', array(), '1.1.0' );

		// Marquee JS.
		wp_register_script( 'jquery-marquee', GUTENIFY_BASE_URL . 'assets/js/lib/jquery.marquee.js', array( 'jquery' ), '1.6.0', true );

		$asset_paths = array(
			// Admin.
			'admin-global' => array(
				'path' => 'dist/admin/global'
			),
			'extend-block-inspector-controls' => array(
				'path' => 'dist/extend/block-inspector-controls'
			),
			'extend-block-dynamic-css' => array(
				'path' => 'dist/extend/block-dynamic-css'
			),
			'extend-block-custom-attributes' => array(
				'path' => 'dist/extend/block-custom-attributes'
			),
			'extend-block-custom-classname' => array(
				'path' => 'dist/extend/block-custom-classname'
			),
			'extend-block-spacing' => array(
				'path' => 'dist/extend/block-spacing'
			),
			'extend-block-custom-css' => array(
				'path' => 'dist/extend/block-custom-css'
			),
			'extend-block-pro-notice' => array(
				'path' => 'dist/extend/block-pro-notice'
			),

			// Common scripts
			'common-scripts-slider' => array(
				'path' => 'dist/common-scripts/slider'
			),

			// Admin.
			'admin-settings' => array(
				'path' => 'dist/admin/pages/settings',
				'js_dependencies' => array( $plugin_main_slug . '-admin-global', $plugin_main_slug . '-components' ),
				'style_dependencies' => array( $plugin_main_slug . '-fontawesome', $plugin_main_slug . '-admin-global', 'wp-components' )
			),

			'admin-getting-started' => array(
				'path' => 'dist/admin/pages/getting-started',
				'js_dependencies' => array( $plugin_main_slug . '-global-inline-handle', $plugin_main_slug . '-components' ),
				'style_dependencies' => array( $plugin_main_slug . '-fontawesome', $plugin_main_slug . '-admin-global', 'wp-components' )
			),

			'admin-demo-importer' => array(
				'path' => 'dist/admin/pages/demo-importer',
				'js_dependencies' => array( $plugin_main_slug . '-global-inline-handle', $plugin_main_slug . '-components' ),
				'style_dependencies' => array( 'wp-components' )
			),

			// Frontend.
			'frontend' => array(
				'path' => 'dist/frontend',
				'js_dependencies' => array( $plugin_main_slug . '-swiper', $plugin_main_slug . '-scrollmagic' ),
				'style_dependencies' => array( $plugin_main_slug . '-fontawesome', $plugin_main_slug . '-fonts' ) //, 'global-styles', 'woocommerce-layout'
			),
		);

		foreach( $asset_paths as $handle => $asset ) {
			$path = $asset['path'];
			$asset_file = gutenify_get_block_asset_file_values( sprintf( '%s' . $path . '/index.asset.php', GUTENIFY_BASE_DIR ) );
			$handle = $plugin_main_slug . '-' . str_replace( '/', '-', $handle );

			$deps = ! empty( $asset['js_dependencies'] ) ? array_merge( $asset_file['dependencies'], $asset['js_dependencies'] ) : $asset_file['dependencies'];
			wp_register_script( $handle, $constants['plugin_main_base_url'] . $path .'/index.js', $deps, $asset_file['version'], true );

			if ( file_exists( $constants['plugin_main_base_dir'] . $path .'/index.css' )) {
				$deps = ! empty( $asset['style_dependencies'] ) ? $asset['style_dependencies'] : array();
				wp_register_style( $handle, $constants['plugin_main_base_url'] . $path .'/index.css', $deps, $asset_file['version'] );
			}
		}

		// Localize vars.
		wp_localize_script( $plugin_main_slug . '-global-inline-handle', '_' . $plugin_main_function_prefix . '_vars', apply_filters( $plugin_main_slug . '--editor--localized-vars', $localized_vars ) );
	}

	public function block_type_metadata( $metadata ) {
		$constants = include GUTENIFY_BASE_DIR . 'inc/constants.php';
		$plugin_main_slug = $constants['plugin_main_slug'];

		$metadata['script'] = ! empty( $metadata['script'] ) ? $metadata['script'] : array( );
		$metadata['script'] = is_array( $metadata['script'] ) ? $metadata['script'] : array( $metadata['script'] );

		$metadata['script'][] = $plugin_main_slug . '-global-inline-handle';
		// $metadata['script'][] = $plugin_main_slug . '-frontend';

		$metadata['editorScript'] = ! empty( $metadata['editorScript'] ) ? $metadata['editorScript'] : array( );
		$metadata['editorScript'] = is_array( $metadata['editorScript'] ) ? $metadata['editorScript'] : array( $metadata['editorScript'] );
		$metadata['editorScript'][] = $plugin_main_slug . '-extend-block-inspector-controls';
		$metadata['editorScript'][] = $plugin_main_slug . '-extend-block-dynamic-css';
		$metadata['editorScript'][] = $plugin_main_slug . '-extend-block-custom-attributes';
		$metadata['editorScript'][] = $plugin_main_slug . '-extend-block-custom-classname';
		$metadata['editorScript'][] = $plugin_main_slug . '-extend-block-spacing';
		$metadata['editorScript'][] = $plugin_main_slug . '-extend-block-pro-notice';
		$metadata['editorScript'][] = $plugin_main_slug . '-admin-global';

		if ( gutenify_is_pro_active() ) {
			$metadata['editorScript'][] = $plugin_main_slug . '-extend-block-custom-css';
		}

		$metadata['style'] = ! empty( $metadata['style'] ) ? $metadata['style'] : array( );
		$metadata['style'] = is_array( $metadata['style'] ) ? $metadata['style'] : array( $metadata['style'] );

		// $metadata['style'][] = 'frontend-animation';

		$metadata['editorStyle'] = ! empty( $metadata['editorStyle'] ) ? $metadata['editorStyle'] : array( );
		$metadata['editorStyle'] = is_array( $metadata['editorStyle'] ) ? $metadata['editorStyle'] : array( $metadata['editorStyle'] );
		$metadata['editorStyle'][] = $plugin_main_slug . '-admin-global';
		$metadata['editorStyle'][] = $plugin_main_slug . '-fontawesome';
		$metadata['editorStyle'][] = $plugin_main_slug . '-extend-block-pro-notice';


		return $metadata;
	}
}

Gutenify_Block_Assets::register();
