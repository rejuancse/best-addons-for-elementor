<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('WPEW_QUICK_VIEW_VERSION', '1.0.0' );
define('WPEW_QUICK_VIEW_FILE', __FILE__);
define('WPEW_QUICK_VIEW', true );
define('WPEW_QUICK_VIEW_URL', plugin_dir_url( __FILE__ ) );
define('WPEW_QUICK_VIEW_ASSETS_URL', WPEW_QUICK_VIEW_URL . 'assets' );
define('WPEW_QUICK_VIEW_DIR_PATH', plugin_dir_path( WPEW_QUICK_VIEW_FILE ) );
define('WPEW_QUICK_VIEW_BASE_NAME', plugin_basename( WPEW_QUICK_VIEW_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('wpew_extensions_lists_config', 'wpew_quick_view_config');
function wpew_quick_view_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Product Quick View', 'wpew' ),
		'description'   => __( 'WooCommerce product quick view extension', 'wpew' ),
		'path'			=> WPEW_QUICK_VIEW_DIR_PATH,
		'url'			=> plugin_dir_url( WPEW_QUICK_VIEW_FILE ),
		'basename'		=> WPEW_QUICK_VIEW_BASE_NAME,
	);
	$config[ WPEW_QUICK_VIEW_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = wpew_function()->get_addon_config( WPEW_QUICK_VIEW_BASE_NAME );
$isEnable = (bool) wpew_function()->avalue_dot( 'is_enable', $addonConfig );
if ( $isEnable ) {
	include_once 'classes/Init.php';
}

add_action( 'wpew_quickview_init', 'wpew_quickview_init' );
function wpew_quickview_init() {
	require_once 'includes/class.wpew-wcqv.php';
	WPEW_QUICK_VIEW();
}

add_action( 'plugins_loaded', 'wpew_quickview_install', 11 );
function wpew_quickview_install() {
	do_action( 'wpew_quickview_init' );
}
