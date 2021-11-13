<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('XEWC_QUICK_VIEW_VERSION', '1.0.0' );
define('XEWC_QUICK_VIEW_FILE', __FILE__);
define('XEWC_QUICK_VIEW', true );
define('XEWC_QUICK_VIEW_URL', plugin_dir_url( __FILE__ ) );
define('XEWC_QUICK_VIEW_ASSETS_URL', XEWC_QUICK_VIEW_URL . 'assets' );
define('XEWC_QUICK_VIEW_DIR_PATH', plugin_dir_path( XEWC_QUICK_VIEW_FILE ) );
define('XEWC_QUICK_VIEW_BASE_NAME', plugin_basename( XEWC_QUICK_VIEW_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('xewc_extensions_lists_config', 'xewc_quick_view_config');
function xewc_quick_view_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Product Quick View', 'xewc' ),
		'description'   => __( 'WooCommerce product quick view extension', 'xewc' ),
		'path'			=> XEWC_QUICK_VIEW_DIR_PATH,
		'url'			=> plugin_dir_url( XEWC_QUICK_VIEW_FILE ),
		'basename'		=> XEWC_QUICK_VIEW_BASE_NAME,
	);
	$config[ XEWC_QUICK_VIEW_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = xewc_function()->get_addon_config( XEWC_QUICK_VIEW_BASE_NAME );
$isEnable = (bool) xewc_function()->avalue_dot( 'is_enable', $addonConfig );
if ( $isEnable ) {
	include_once 'classes/Init.php';
}

add_action( 'xewc_quickview_init', 'xewc_quickview_init' );
function xewc_quickview_init() {
	require_once 'includes/class.xewc-wcqv.php';
	XEWC_QUICK_VIEW();
}

add_action( 'plugins_loaded', 'xewc_quickview_install', 11 );
function xewc_quickview_install() {
	do_action( 'xewc_quickview_init' );
}
