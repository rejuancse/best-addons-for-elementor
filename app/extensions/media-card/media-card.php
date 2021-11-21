<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('WPEW_MEDIA_CARD_FILE', __FILE__);
define('WPEW_MEDIA_DIR_PATHE', plugin_dir_path( WPEW_MEDIA_CARD_FILE ) );
define('WPEW_MEDIA_BASE_NAME', plugin_basename( WPEW_MEDIA_CARD_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('wpew_extensions_lists_config', 'wpew_MEDIA_CARD_config');
function wpew_MEDIA_CARD_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Media Card', 'wpew' ),
		'path'			=> WPEW_MEDIA_DIR_PATHE,
		'url'			=> plugin_dir_url( WPEW_MEDIA_CARD_FILE ),
		'basename'		=> WPEW_MEDIA_BASE_NAME,
	);
	$config[ WPEW_MEDIA_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = wpew_function()->get_addon_config( WPEW_MEDIA_BASE_NAME );
// $isEnable = (bool) wpew_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
