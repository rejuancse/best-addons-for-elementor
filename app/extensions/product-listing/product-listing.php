<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('WPEW_PRODUCT_LISTING_FILE', __FILE__);
define('WPEW_PRODUCT_DIR_PATHE', plugin_dir_path( WPEW_PRODUCT_LISTING_FILE ) );
define('WPEW_PRODUCT_BASE_NAME', plugin_basename( WPEW_PRODUCT_LISTING_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('wpew_extensions_lists_config', 'wpew_product_listing_config');
function wpew_product_listing_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Product Listing', 'wpew' ),
		'description'   => __( 'WooCommerce product listing', 'wpew' ),
		'path'			=> WPEW_PRODUCT_DIR_PATHE,
		'url'			=> plugin_dir_url( WPEW_PRODUCT_LISTING_FILE ),
		'basename'		=> WPEW_PRODUCT_BASE_NAME,
	);
	$config[ WPEW_PRODUCT_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = wpew_function()->get_addon_config( WPEW_PRODUCT_BASE_NAME );
$isEnable = (bool) wpew_function()->avalue_dot( 'is_enable', $addonConfig );
if ( $isEnable ) {
	include_once 'classes/Init.php';
}
