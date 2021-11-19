<?php

defined( 'ABSPATH' ) || exit;

/**
 * Showing config for extensions central lists
 */
add_filter('wpew_extensions_lists_config', 'wpew_timeline_config');
function wpew_timeline_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Time Line', 'wpew' ),
		'description'   => __( 'WooCommerce Time Line', 'wpew' ),
		'path'			=> WPEW_DIR_PATH,
		'url'			=> plugin_dir_url( WPEW_FILE ),
		'basename'		=> WPEW_BASENAME,
	);
	$config[ WPEW_BASENAME ] = $basicConfig;
	return $config;
}

$addonConfig = wpew_function()->get_addon_config( WPEW_BASENAME );
// $isEnable = (bool) wpew_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
