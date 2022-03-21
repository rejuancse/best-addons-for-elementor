<?php
namespace EAFE;

defined( 'ABSPATH' ) || exit;

class Functions {

    public function generator( $arr ){
        require_once EAFE_DIR_PATH . 'app/settings/Generator.php';
        $generator = new \EAFE\settings\Settings_Generator();
        $generator->generator( $arr );
    }

    public function post($post_item){
        if (!empty($_POST[$post_item])) {
            return $_POST[$post_item];
        }
        return null;
    }
    
    public function is_published($post_id=0){
        global $post;
        if ($post_id == 0){
            $post_id = $post->ID;
        }
        $status = get_post_status($post_id);
        return $status=='publish' ? true : false;
    }

    public function is_free(){
        if (is_plugin_active('eafe-pro/eafe-pro.php')) {
            return false;
        } else {
            return true;
        }
    }

    public function update_text($option_name = '', $option_value = null){
        if (!empty($option_value)) {
            update_option($option_name, $option_value);
        }
    }

    public function update_checkbox($option_name = '', $option_value = null, $checked_default_value = 'false'){
        if (!empty($option_value)) {
            update_option($option_name, $option_value);
        } else{
            update_option($option_name, $checked_default_value);
        }
    }
    
    public function update_meta($post_id, $meta_name = '', $meta_value = '', $checked_default_value = ''){
        if (!empty($meta_value)) {
            update_post_meta( $post_id, $meta_name, $meta_value);
        }else{
            update_post_meta( $post_id, $meta_name, $checked_default_value);
        }
    }

    public function get_pages(){
        $args = array(
            'sort_order' => 'asc',
            'sort_column' => 'post_title',
            'hierarchical' => 1,
            'child_of' => 0,
            'parent' => -1,
            'offset' => 0,
            'post_type' => 'page',
            'post_status' => 'publish'
        );
        $pages = get_pages($args);
        return $pages;
    }

    // public function include_eafe_widgets() {
	// 	include_once EAFE_DIR_PATH.'app/includes/elementor/elementor-core.php';
	// }

    // public function wc_version($version = '3.0'){
    //     if (class_exists('elementor')) {
    //         if (version_compare(WC()->version, $version, ">=")) {
    //             return true;
    //         }
    //     }
    //     return false;
    // }
    
    public function is_elementor(){
        $vendor = get_option('vendor_type', 'elementor');
        if( $vendor == 'elementor' ){
            return true;
        }else{
            return false;
        }
    }
    
    public function get_screen_id(){
        $screen_ids = array(
            'toplevel_page_eafe',
        );
        return apply_filters('eafe_screen_id', $screen_ids);
    }
    
    public function get_addon_config($addon_field = null){
        if ( ! $addon_field){
            return false;
        }
        $extensionsConfig = maybe_unserialize(get_option('eafe_extensions_config'));
        if (isset($extensionsConfig[$addon_field])){
            return $extensionsConfig[$addon_field];
        }
        return false;
    }


    public function avalue_dot($key = null, $array = array()){
        $array = (array) $array;
        if ( ! $key || ! count($array) ){
            return false;
        }
        $option_key_array = explode('.', $key);
        $value = $array;
        foreach ($option_key_array as $dotKey){
            if (isset($value[$dotKey])){
                $value = $value[$dotKey];
            }else{
                return true;
            }
        }
        return $value;
    }

    function get_author_url($user_login) {
        return esc_url(add_query_arg(array('author' => $user_login)));
    }

	public function url($url){
		if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
			$url = "http://" . $url;
		}
		return $url;
	}

    function limit_word_text($text, $limit) {
        if ( $this->mb_str_word_count($text, 0) > $limit ) {
            $words  = $this->mb_str_word_count($text, 2);
            $pos    = array_keys($words);
            $text   = mb_substr($text, 0, $pos[$limit]);
        }
        return $text;
    }

    function mb_str_word_count($string, $format = 0, $charlist = '[]') {
        mb_internal_encoding( 'UTF-8');
        mb_regex_encoding( 'UTF-8');
        $words = mb_split('[^\x{0600}-\x{06FF}]', $string);
        switch ($format) {
            case 0:
                return count($words);
                break;
            case 1:
            case 2:
                return $words;
                break;
            default:
                return $words;
                break;
        }
    }
}
