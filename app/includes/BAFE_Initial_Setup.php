<?php
namespace BAFE;

defined( 'ABSPATH' ) || exit;

if (! class_exists('BAFE_Initial_Setup')) {

    class BAFE_Initial_Setup {

        public function __construct() {
            add_action( 'admin_init', array( $this, 'bafe_initial_compatibility_check') );
            add_action('wp_ajax_bafe_install_elementor_plugin', array($this, 'bafe_install_elementor_plugin'));
            add_action('admin_action_bafe_activate_elementor_free', array($this, 'bafe_activate_elementor_free'));
        }

        public function bafe_initial_compatibility_check() {
            if (version_compare( BAFE_VERSION, '1.0.0', '>')) {
                $option_check = get_option('bafe_show_description');
                if($option_check != 'true' && $option_check != 'false'){
                    $default_value = array(
                        'bafe_show_description' => 'true',
                        'bafe_show_terms_and_conditions' => 'true'
                    );
                    foreach ($default_value as $key => $value ) {
                        update_option( $key , $value );
                    }
                }
            }
        }
        
        /**
         * Do some task during plugin activation
         */
        public function bafe_initial_plugin_activation() {
            if (get_option('wp_bafe_is_used')) { // Check is plugin used before or not
                return false;
            }
            self::update_option();
        }

        /**
         * Insert settings option data
         */
        public function update_option() {
            $init_setup_data = array(
                'wp_bafe_is_used' => BAFE_VERSION,
                'vendor_type' => 'elementor',
                'bafe_show_description' => 'true',
            );

            foreach ($init_setup_data as $key => $value ) {
                update_option( $key , $value );
            }
    
            //Upload Permission
            update_option( 'wp_user_role_selector', array('administrator', 'editor', 'author', 'shop_manager') );
            $role_list = get_option( 'wp_user_role_selector' );
            if( is_array( $role_list ) ){
                if( !empty( $role_list ) ){
                    foreach( $role_list as $val ){
                        $role = get_role( $val );
                        if ($role){
	                        $role->add_cap( 'product_form_submit' );
	                        $role->add_cap( 'upload_files' );
                        }
                    }
                }
            }
        }

        /**
         * Reset method, the ajax will call that method for Reset Settings
         */
        public function settings_reset() {
            self::update_option();
        }

        /**
         * Deactivation Hook For BAFE
         */
        public function initial_plugin_deactivation(){}

        public function activation_css() {
            ?>
            <style type="text/css">
                .bafe-install-notice{
                    padding: 20px;
                }
                .bafe-install-notice-inner{
                    display: flex;
                    align-items: center;
                }
                .bafe-install-notice-inner .button{
                    padding: 5px 30px;
                    height: auto;
                    line-height: 20px;
                    text-transform: capitalize;
                }
                .bafe-install-notice-content{
                    flex-grow: 1;
                    padding-left: 20px;
                    padding-right: 20px;
                }
                .bafe-install-notice-icon img{
                    width: 64px;
                    border-radius: 4px;
                    display: block;
                }
                .bafe-install-notice-content h2{
                    margin-top: 0;
                    margin-bottom: 5px;
                }
                .bafe-install-notice-content p{
                    margin-top: 0;
                    margin-bottom: 0px;
                    padding: 0;
                }
            </style>

            <script type="text/javascript">
                jQuery(document).ready(function($){
                    'use strict';
                    $(document).on('click', '.install-bafe-button', function(e){
                        e.preventDefault();
                        var $btn = $(this);
                        $.ajax({
                            type: 'POST',
                            url: ajaxurl,
                            data: {install_plugin: 'elementor', action: 'bafe_install_elementor_plugin'},
                            beforeSend: function(){
                                $btn.addClass('updating-message');
                            },
                            success: function (data) {
                                $('.install-bafe-button').remove();
                                $('#bafe_install_msg').html(data);
                            },
                            complete: function () {
                                $btn.removeClass('updating-message');
                            }
                        });
                    });
                });
            </script>
            <?php
        }
        
        /**
         * Show notice if there is no elementor
         */
        public function bafe_free_plugin_installed_but_inactive_notice(){
            $this->activation_css();
            ?>
            <div class="notice notice-error bafe-install-notice">
                <div class="bafe-install-notice-inner">
                    <div class="bafe-install-notice-icon">
                        <img src="<?php echo BAFE_DIR_URL.'assets/images/elementor-icon.jpg'; ?>" alt="logo" />
                    </div>
                    <div class="bafe-install-notice-content">
                        <h2><?php _e('Thanks for using Best Addons For Elementor', 'bafe'); ?></h2>
                        <?php 
                            printf(
                                '<p>%1$s <a target="_blank" href="%2$s">%3$s</a> %4$s</p>', 
                                __('You must have','bafe'), 
                                'https://wordpress.org/plugins/elementor/', 
                                __('Elementor', 'bafe'), 
                                __('installed and activated on this website in order to use Best Addons For Elementor.','bafe')
                            );
                        ?>
                    </div>
                    <div class="bafe-install-notice-button">
                        <a  class="button button-primary" href="<?php echo add_query_arg(array('action' => 'bafe_activate_elementor_free'), admin_url()); ?>"><?php _e('Activate Elementor', 'bafe'); ?></a>
                    </div>
                </div>
            </div>
            <?php
        }
    
        public function bafe_free_plugin_not_installed(){
            include( ABSPATH . 'wp-admin/includes/plugin-install.php' );
            $this->activation_css();
            ?>
            <div class="notice notice-error bafe-install-notice">
                <div class="bafe-install-notice-inner">
                    <div class="bafe-install-notice-icon">
                        <img src="<?php echo BAFE_DIR_URL.'assets/images/elementor-icon.jpg'; ?>" alt="logo" />
                    </div>
                    <div class="bafe-install-notice-content">
                        <h2><?php _e('Thanks for using Best Addons For Elementor', 'bafe'); ?></h2>
                        <?php 
                            printf(
                                '<p>%1$s <a target="_blank" href="%2$s">%3$s</a> %4$s</p>', 
                                __('You must have','bafe'), 
                                'https://wordpress.org/plugins/elementor/', 
                                __('Elementor', 'bafe'), 
                                __('installed and activated on this website in order to use Best Addons For Elementor..','bafe')
                            );
                        ?>
                    </div>
                    <div class="bafe-install-notice-button">
                        <a class="install-bafe-button button button-primary" data-slug="elementor" href="<?php echo add_query_arg(array('action' => 'install_elementor_free'), admin_url()); ?>"><?php _e('Install Elementor', 'bafe'); ?></a>
                    </div>
                </div>
                <div id="bafe_install_msg"></div>
            </div>
            <?php
        }

        public function bafe_activate_elementor_free() {
            activate_plugin('elementor/elementor.php' );
            wp_redirect(admin_url('admin.php?page=bafe'));
		    exit();
        }

        public function bafe_install_elementor_plugin(){
            include(ABSPATH . 'wp-admin/includes/plugin-install.php');
            include(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');
    
            if ( ! class_exists('Plugin_Upgrader')){
                include(ABSPATH . 'wp-admin/includes/class-plugin-upgrader.php');
            }
            
            if ( ! class_exists('Plugin_Installer_Skin')) {
                include( ABSPATH . 'wp-admin/includes/class-plugin-installer-skin.php' );
            }
    
            $plugin = 'elementor';
    
            $api = plugins_api( 'plugin_information', array(
                'slug' => $plugin,
                'fields' => array(
                    'short_description' => false,
                    'sections' => false,
                    'requires' => false,
                    'rating' => false,
                    'ratings' => false,
                    'downloaded' => false,
                    'last_updated' => false,
                    'added' => false,
                    'tags' => false,
                    'compatibility' => false,
                    'homepage' => false,
                    'donate_link' => false,
                ),
            ) );
    
            if ( is_wp_error( $api ) ) {
                wp_die( $api );
            }
    
            $title = sprintf( __('Installing Plugin: %s'), $api->name . ' ' . $api->version );
            $nonce = 'install-plugin_' . $plugin;
            $url = 'update.php?action=install-plugin&plugin=' . urlencode( $plugin );
    
            $upgrader = new \Plugin_Upgrader( new \Plugin_Installer_Skin( compact('title', 'url', 'nonce', 'plugin', 'api') ) );
            $upgrader->install($api->download_link);
            die();
        }
        
        public static function bafe_wc_low_version(){
            printf(
                '<div class="notice notice-error is-dismissible"><p>%1$s <a target="_blank" href="%2$s">%3$s</a> %4$s</p></div>', 
                __('Your','bafe'), 
                'https://wordpress.org/plugins/elementor/', 
                __('elementor','bafe'), 
                __('version is below then 3.0, please update.','bafe') 
            );
        }
    }
}
