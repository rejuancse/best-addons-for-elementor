<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defined the main file
 */
define('WPEW_BLOG_GRID_FILE', __FILE__);
define('WPEW_BLOG_DIR_PATHE', plugin_dir_path( WPEW_BLOG_GRID_FILE ) );
define('WPEW_BLOG_BASE_NAME', plugin_basename( WPEW_BLOG_GRID_FILE ) );

/**
 * Showing config for extensions central lists
 */
add_filter('wpew_extensions_lists_config', 'wpew_blog_grid_config');
function wpew_blog_grid_config( $config ) {
	$basicConfig = array(
		'name'          => __( 'Blog Grid', 'wpew' ),
		'path'			=> WPEW_BLOG_DIR_PATHE,
		'url'			=> plugin_dir_url( WPEW_BLOG_GRID_FILE ),
		'basename'		=> WPEW_BLOG_BASE_NAME,
	);
	$config[ WPEW_BLOG_BASE_NAME ] = $basicConfig;
	return $config;
}

$addonConfig = wpew_function()->get_addon_config( WPEW_BLOG_BASE_NAME );
// $isEnable = (bool) wpew_function()->avalue_dot( 'is_enable', $addonConfig );
// if ( $isEnable ) {
// 	include_once 'classes/Init.php';
// }
