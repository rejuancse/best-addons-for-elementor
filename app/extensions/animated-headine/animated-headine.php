<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('EAFE_ANIMATED_HEADLINE_FILE', __FILE__);
define('EAFE_ANIMATED_DIR_PATHE', plugin_dir_path( EAFE_ANIMATED_HEADLINE_FILE ) );
define('EAFE_ANIMATED_BASE_NAME', plugin_basename( EAFE_ANIMATED_HEADLINE_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('eafe_extensions_lists_config', 'eafe_animated_headine_config');
function eafe_animated_headine_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Animated Headine', 'eafe' ),
		'path'			=> EAFE_ANIMATED_DIR_PATHE,
		'url'			=> plugin_dir_url( EAFE_ANIMATED_HEADLINE_FILE ),
		'basename'		=> EAFE_ANIMATED_BASE_NAME,
	);
	$config[ EAFE_ANIMATED_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = eafe_function()->get_addon_config( EAFE_ANIMATED_BASE_NAME );
// $isEnable = (bool) eafe_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
