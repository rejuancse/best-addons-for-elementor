<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('XEWC_PRODUCT_SEARCH_FILE', __FILE__);
define('XEWC_SEARCH_DIR_PATHE', plugin_dir_path( XEWC_PRODUCT_SEARCH_FILE ) );
define('XEWC_SEARCH_BASE_NAME', plugin_basename( XEWC_PRODUCT_SEARCH_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('xewc_extensions_lists_config', 'xewc_product_search_config');
function xewc_product_search_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Product Search', 'xewc' ),
		'description'   => __( 'WooCommerce product search using ajax request', 'xewc' ),
		'path'			=> XEWC_SEARCH_DIR_PATHE,
		'url'			=> plugin_dir_url( XEWC_PRODUCT_SEARCH_FILE ),
		'basename'		=> XEWC_SEARCH_BASE_NAME,
	);
	$config[ XEWC_SEARCH_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = xewc_function()->get_addon_config( XEWC_SEARCH_BASE_NAME );
$isEnable = (bool) xewc_function()->avalue_dot( 'is_enable', $addonConfig );
if ( $isEnable ) {
	include_once 'classes/Init.php';
}
