<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('WPEW_SOCIAL_SHARE_FILE', __FILE__);
define('WPEW_SOCIAL_SHARE_DIR_PATHE', plugin_dir_path( WPEW_SOCIAL_SHARE_FILE ) );
define('WPEW_SOCIAL_SHARE_BASE_NAME', plugin_basename( WPEW_SOCIAL_SHARE_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('wpew_extensions_lists_config', 'wpew_social_share_config');
function wpew_social_share_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Social Share', 'wpew' ),
		'path'			=> WPEW_SOCIAL_SHARE_DIR_PATHE,
		'url'			=> plugin_dir_url( WPEW_SOCIAL_SHARE_FILE ),
		'basename'		=> WPEW_SOCIAL_SHARE_BASE_NAME,
	);
	$config[ WPEW_SOCIAL_SHARE_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = wpew_function()->get_addon_config( WPEW_SOCIAL_SHARE_BASE_NAME );
// $isEnable = (bool) wpew_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
