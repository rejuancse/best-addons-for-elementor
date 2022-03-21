<?php

defined( 'ABSPATH' ) || exit;

/**
 * Showing config for extensions central lists
 */
add_filter('eafe_extensions_lists_config', 'eafe_timeline_config');
function eafe_timeline_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Time Line', 'eafe' ),
		'description'   => __( 'WooCommerce Time Line', 'eafe' ),
		'path'			=> EAFE_DIR_PATH,
		'url'			=> plugin_dir_url( EAFE_FILE ),
		'basename'		=> EAFE_BASENAME,
	);
	$config[ EAFE_BASENAME ] = $basicConfig;
	return $config;
}

$addonConfig = eafe_function()->get_addon_config( EAFE_BASENAME );
// $isEnable = (bool) eafe_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
