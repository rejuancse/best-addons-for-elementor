<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('WPEW_ANIMATED_HEADLINE_FILE', __FILE__);
define('WPEW_ANIMATED_DIR_PATHE', plugin_dir_path( WPEW_ANIMATED_HEADLINE_FILE ) );
define('WPEW_ANIMATED_BASE_NAME', plugin_basename( WPEW_ANIMATED_HEADLINE_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('wpew_extensions_lists_config', 'wpew_animated_headine_config');
function wpew_animated_headine_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Animated Headine', 'wpew' ),
		'path'			=> WPEW_ANIMATED_DIR_PATHE,
		'url'			=> plugin_dir_url( WPEW_ANIMATED_HEADLINE_FILE ),
		'basename'		=> WPEW_ANIMATED_BASE_NAME,
	);
	$config[ WPEW_ANIMATED_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = wpew_function()->get_addon_config( WPEW_ANIMATED_BASE_NAME );
// $isEnable = (bool) wpew_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
