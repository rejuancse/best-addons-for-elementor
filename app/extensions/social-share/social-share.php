<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('EAFE_SOCIAL_SHARE_FILE', __FILE__);
define('EAFE_SOCIAL_SHARE_DIR_PATHE', plugin_dir_path( EAFE_SOCIAL_SHARE_FILE ) );
define('EAFE_SOCIAL_SHARE_BASE_NAME', plugin_basename( EAFE_SOCIAL_SHARE_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('eafe_extensions_lists_config', 'eafe_social_share_config');
function eafe_social_share_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Social Share', 'eafe' ),
		'path'			=> EAFE_SOCIAL_SHARE_DIR_PATHE,
		'url'			=> plugin_dir_url( EAFE_SOCIAL_SHARE_FILE ),
		'basename'		=> EAFE_SOCIAL_SHARE_BASE_NAME,
	);
	$config[ EAFE_SOCIAL_SHARE_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = eafe_function()->get_addon_config( EAFE_SOCIAL_SHARE_BASE_NAME );
// $isEnable = (bool) eafe_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
