<?php
namespace XEWC\woocommerce;

defined( 'ABSPATH' ) || exit;

class Base {

    /**
     * @var null
     *
     * Instance of this class
     */
    protected static $_instance = null;

    /**
     * @return null|Base
     */
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Base constructor.
     *
     * @hook
     */
    public function __construct() {
        add_action('admin_enqueue_scripts',            array($this, 'admin_script')); //Add Additional backend js and css
        add_action('wp_enqueue_scripts',               array($this, 'frontend_script')); //Add frontend js and css
        add_action('init',                             array($this, 'media_pluggable'));
        add_action('admin_head',                       array($this, 'add_mce_button'));
        add_action('wp_ajax_xewc_settings_reset',      array($this, 'settings_reset'));
        add_action('wp_ajax_xewc_addon_enable_disable',array($this, 'addon_enable_disable')); 
        add_filter('admin_footer_text',                 array($this, 'admin_footer_text'), 2); 
    }
    
    public function media_pluggable(){
        if (is_user_logged_in()){
            if(is_admin()){
                if (current_user_can('product_form_submit')){
                    add_action( 'pre_get_posts', array($this, 'set_user_own_media') );
                }
            }
        }
    }

    // Attachment Filter
    public function set_user_own_media($query){
        if ($query) {
            if (! empty($query->query['post_type'])) {
                if(!current_user_can('administrator')){
                    if ($query->query['post_type'] == 'attachment') {
                        $user = wp_get_current_user();
                        $query->set('author', $user->ID);
                    }
                }
            }
        }
    }

    // Hooks your functions into the correct filters
    function add_mce_button() {
        // check user permissions
        if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
            return;
        }
        // check if WYSIWYG is enabled
        if ( 'true' == get_user_option( 'rich_editing' ) ) {
            add_filter( 'mce_buttons', array($this, 'register_mce_button') );
        }
    }

    public function admin_script(){
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_style( 'xewc-admin', XEWC_DIR_URL .'assets/css/xewc-admin.css', false, XEWC_VERSION );
        
        #js
        wp_enqueue_script( 'xewc-jquery-scripts', XEWC_DIR_URL .'assets/dist/js/xewc-admin.js', array('jquery','wp-color-picker'), XEWC_VERSION, true );
    }

    /**
     * Registering necessary js and css
     * @ Frontend
     */
    public function frontend_script(){
        wp_enqueue_style( 'xewc-css-front', XEWC_DIR_URL .'assets/css/xewc-front.css', false, XEWC_VERSION );
        wp_enqueue_style( 'jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css' );
         
        #JS
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'jquery-ui-datepicker', array( 'jquery' ) );
        wp_enqueue_script( 'wp-xewc-front', XEWC_DIR_URL .'assets/dist/js/xewc-front.js', array('jquery'), XEWC_VERSION, true);
        wp_localize_script( 'wp-xewc-front', 'xewc_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
        wp_enqueue_media();
    }

    // Register new button in the editor
    function register_mce_button( $buttons ) {
        array_push( $buttons, 'xewc_button' );
        return $buttons;
    }

    public function admin_footer_text($footer_text){
        $footer_text = sprintf( __( 'Thanks so much for using <strong>X-Extensions</strong>', 'xewc' ));
        return $footer_text;
    }

    /**
     * Reset method
     */

    public function settings_reset(){
        $initial_setup = new \XEWC\Initial_Setup();
        $initial_setup->settings_reset();
    }

    /**
     * Method for enable / disable extensions
     */
    public function addon_enable_disable(){
        $extensionsConfig = maybe_unserialize(get_option('xewc_extensions_config'));
        $isEnable = (bool) sanitize_text_field( xewc_function()->avalue_dot('isEnable', $_POST) );
        $addonFieldName = sanitize_text_field( xewc_function()->avalue_dot('addonFieldName', $_POST) );
        $extensionsConfig[$addonFieldName]['is_enable'] = ($isEnable) ? 1 : 0;
        update_option('xewc_extensions_config', $extensionsConfig);
        wp_send_json_success();
    }
}
