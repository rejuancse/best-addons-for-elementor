<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('EAFE_BLOG_GRID_FILE', __FILE__);
define('EAFE_BLOG_DIR_PATHE', plugin_dir_path( EAFE_BLOG_GRID_FILE ) );
define('EAFE_BLOG_BASE_NAME', plugin_basename( EAFE_BLOG_GRID_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('eafe_extensions_lists_config', 'eafe_blog_grid_config');
function eafe_blog_grid_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Blog Grid', 'eafe' ),
		'path'			=> EAFE_BLOG_DIR_PATHE,
		'url'			=> plugin_dir_url( EAFE_BLOG_GRID_FILE ),
		'basename'		=> EAFE_BLOG_BASE_NAME,
	);
	$config[ EAFE_BLOG_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = eafe_function()->get_addon_config( EAFE_BLOG_BASE_NAME );
// $isEnable = (bool) eafe_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
