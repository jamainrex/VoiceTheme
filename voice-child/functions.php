<?php 

/* 
    This is Voice Child Theme functions file
    You can use it to modify specific features and styling of Voice Theme
*/    

//define( 'CHILD_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'CHILD_THEME_URI', trailingslashit( get_stylesheet_directory_uri() ) );
define( 'CHILD_JS_URI', CHILD_THEME_URI . 'js' );
define( 'CHILD_CSS_URI', CHILD_THEME_URI . 'css' );
define( 'CHILD_THEME_VERSION', '1.0' );

add_action( 'after_setup_theme', 'vce_child_theme_setup', 99 );

function vce_child_theme_setup(){
    add_action( 'admin_enqueue_scripts', 'vce_child_load_admin_scripts' );
    
    add_action('wp_enqueue_styles', 'vce_child_load_styles');
    add_action('wp_enqueue_scripts', 'vce_child_load_scripts');
}

function vce_child_load_admin_scripts() {
    global $pagenow, $typenow;
    //Load post & page metaboxes css and js
    if ( $pagenow == 'post.php' || $pagenow == 'post-new.php' ) {
         if ( $typenow == 'page' ) {
            wp_enqueue_script( 'vce_child_post_metaboxes', CHILD_JS_URI.'/metaboxes-page.js', array( 'jquery' ), CHILD_THEME_VERSION );
        }
    }
}

function vce_child_load_styles() { 
    wp_register_style('vce_child_load_styles', CHILD_THEME_URI .'/style.css', false, CHILD_THEME_VERSION, 'screen');
    wp_enqueue_style('vce_child_load_styles');    
    
    wp_register_style('vce-child-wl-magnific-popup', CHILD_THEME_URI . '/woocommerce/assets/css/magnific-popup.css','','1.0');
    wp_register_style('vce-child-wl-main', CHILD_THEME_URI . '/woocommerce/assets/css/main.css','','1.0');
}   
function vce_child_load_scripts() {    
    if (!is_admin()) {
        wp_register_script('vce-child-wl-magnific-popup', CHILD_THEME_URI . '/woocommerce/assets/js/jquery.magnific-popup.min.js',array('jquery'),'1.0', false);
        wp_register_script('vce-child-wl-plugin-main', CHILD_THEME_URI . '/woocommerce/assets/js/main.js',array('jquery'),'1.0', true);
    }
}


require_once 'include/rest-api.php';
?>