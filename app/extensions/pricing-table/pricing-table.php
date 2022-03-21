<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('EAFE_PRICING_TABLE_FILE', __FILE__);
define('EAFE_PRICING_TABLE_DIR_PATHE', plugin_dir_path( EAFE_PRICING_TABLE_FILE ) );
define('EAFE_PRICING_TABLE_BASE_NAME', plugin_basename( EAFE_PRICING_TABLE_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('eafe_extensions_lists_config', 'eafe_PRICING_TABLE_config');
function eafe_PRICING_TABLE_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Pricing Table', 'eafe' ),
		'description'   => __( 'WooCommerce Pricing Table', 'eafe' ),
		'path'			=> EAFE_PRICING_TABLE_DIR_PATHE,
		'url'			=> plugin_dir_url( EAFE_PRICING_TABLE_FILE ),
		'basename'		=> EAFE_PRICING_TABLE_BASE_NAME,
	);
	$config[ EAFE_PRICING_TABLE_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = eafe_function()->get_addon_config( EAFE_PRICING_TABLE_BASE_NAME );
// $isEnable = (bool) eafe_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
