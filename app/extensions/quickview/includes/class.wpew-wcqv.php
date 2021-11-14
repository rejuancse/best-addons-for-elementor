<?php
/**
 * Main class
 *
 * @author  WPEW
 * @package WPEW WooCommerce Quick View
 * @version 1.0.0
 */

defined( 'WPEW_QUICK_VIEW' ) || exit; // Exit if accessed directly.

if ( ! class_exists( 'WPEW_QUICK_VIEW' ) ) {
	/**
	 * WPEW WooCommerce Quick View
	 *
	 * @since 1.0.0
	 */
	class WPEW_QUICK_VIEW {

		/**
		 * Single instance of the class
		 *
		 * @since 1.0.0
		 * @var WPEW_QUICK_VIEW
		 */
		protected static $instance;

		/**
		 * Plugin version
		 *
		 * @since 1.0.0
		 * @var string
		 */
		public $version = WPEW_QUICK_VIEW_VERSION;

		/**
		 * Plugin object
		 *
		 * @since 1.0.0
		 * @var string
		 */
		public $obj = null;

		/**
		 * Returns single instance of the class
		 *
		 * @since 1.0.0
		 * @return WPEW_QUICK_VIEW
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function __construct() {
			if ( $this->can_load() ) {
				if ( $this->load_frontend() ) {
					require_once 'class.wpew-wcqv-frontend.php';
					WPEW_QUICK_VIEW_Frontend();
				}
			}
		}

		/**
		 * Check if the plugin can load. Exit if is WooCommerce AJAX.
		 *
		 * @since  1.0.0
		 * @return boolean
		 */
		public function can_load() {
			$action = array(
				'woocommerce_get_refreshed_fragments',
				'woocommerce_apply_coupon',
				'woocommerce_remove_coupon',
				'woocommerce_update_shipping_method',
				'woocommerce_update_order_review',
				'woocommerce_add_to_cart',
				'woocommerce_checkout',
			);

			if ( defined( 'DOING_AJAX' ) && DOING_AJAX && isset( $_REQUEST['action'] ) && in_array( $_REQUEST['action'], $action, true ) ) {
				return false;
			}

			return true;
		}

		/**
		 * Check if context is admin
		 *
		 * @since  1.0.0
		 * @return boolean
		 */
		public function is_admin() {
			$is_ajax = ( defined( 'DOING_AJAX' ) && DOING_AJAX && isset( $_REQUEST['context'] ) && 'frontend' === $_REQUEST['context'] );
			return apply_filters( 'wpew_quickview_is_admin', is_admin() && ! $is_ajax );
		}

		/**
		 * Check if load or not frontend
		 *
		 * @since  1.0.0
		 * @return boolean
		 */
		public function load_frontend() {
			$addonConfig = wpew_function()->get_addon_config( WPEW_QUICK_VIEW_BASE_NAME );
			$isEnable = (bool) wpew_function()->avalue_dot( 'is_enable', $addonConfig );
			if ( $isEnable ) {
				$enable           = get_option( 'wp_quick_view', 'true' ) === 'true';
				$enable_on_mobile = get_option( 'mobile_quick_view', 'true' ) === 'true';
				$is_mobile        = wp_is_mobile();
				return apply_filters( 'wpew_quickview_load_frontend', ( ! $is_mobile && $enable ) || ( $is_mobile && $enable_on_mobile ) );
			}
		}
	}
}

/**
 * Unique access to instance of WPEW_QUICK_VIEW class
 *
 * @since 1.0.0
 * @return WPEW_QUICK_VIEW
 */
function WPEW_QUICK_VIEW() { // phpcs:ignore
	return WPEW_QUICK_VIEW::get_instance();
}
