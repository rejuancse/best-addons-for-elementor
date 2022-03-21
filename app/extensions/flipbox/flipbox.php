<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('EAFE_FLIPBOX_FILE', __FILE__);
define('EAFE_FLIPBOX_DIR_PATHE', plugin_dir_path( EAFE_FLIPBOX_FILE ) );
define('EAFE_FLIPBOX_BASE_NAME', plugin_basename( EAFE_FLIPBOX_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('eafe_extensions_lists_config', 'eafe_flipbox_config');
function eafe_flipbox_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Flip Box', 'eafe' ),
		'path'			=> EAFE_FLIPBOX_DIR_PATHE,
		'url'			=> plugin_dir_url( EAFE_FLIPBOX_FILE ),
		'basename'		=> EAFE_FLIPBOX_BASE_NAME,
	);
	$config[ EAFE_FLIPBOX_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = eafe_function()->get_addon_config( EAFE_FLIPBOX_BASE_NAME );
// $isEnable = (bool) eafe_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
