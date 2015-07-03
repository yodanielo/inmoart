<?php 
/*************************************************************
* Do not modify unless you know what you're doing, SERIOUSLY!
*************************************************************/
global $wp;
$wp->add_query_var( 'meta_key' );
$wp->add_query_var( 'meta_value' ); 
error_reporting(E_ERROR);
//ini_set('session.gc_probability',1);

load_theme_textdomain('default');
/*load_textdomain( 'templatic', 'es_ES' );*/

global $blog_id;
if(get_option('upload_path') && !strstr(get_option('upload_path'),'wp-content/uploads')) {
    $upload_folder_path = "wp-content/blogs.dir/$blog_id/files/";
}else {
    $upload_folder_path = "wp-content/uploads/";
}
global $blog_id;
if($blog_id) {
    $thumb_url = "&bid=$blog_id";
}

if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}

if($_REQUEST['coupon_code']) {
    add_filter('posts_join', 'product_filter_join');
    function product_filter_join($join) {
        global $wpdb;

        $join .= " JOIN $wpdb->postmeta";
        $join .= " ON $wpdb->posts.ID = $wpdb->postmeta.post_id";
        $join .= " AND ($wpdb->postmeta.meta_key = 'coupon_code') and ($wpdb->postmeta.meta_value like '".$_REQUEST['coupon_code']."')";
        //$join .= " AND p.post_status='publish'";
        return $join;
    }
}

/* Admin framework version 2.0 by Zeljan Topic */
// Theme variables
require_once (TEMPLATEPATH . '/library/functions/theme_variables.php');

//** ADMINISTRATION FILES **//

// Theme admin functions
require_once ($functions_path . 'admin_functions.php');

// Theme admin options
require_once ($functions_path . 'admin_options.php');

// Theme admin Settings
require_once ($functions_path . 'admin_settings.php');


//** FRONT-END FILES **//
require_once ($functions_path . 'image_resizer.php');

// Widgets
require_once ($functions_path . 'widgets_functions.php');

// Custom
require_once ($functions_path . 'custom_functions.php');

// Comments
require_once ($functions_path . 'comments_functions.php');

require_once ($functions_path . 'yoast-posts.php');	
require_once ($functions_path . 'yoast-canonical.php');
require_once ($functions_path . 'yoast-breadcrumbs.php');


require_once ($functions_path . '/admin_dashboard.php');
//elijo el lenguaje
if(!isset($_SESSION["lang"]) || $_SESSION["lang"]=="")
    $_SESSION["lang"]="en";
require_once (TEMPLATEPATH . '/language_en.php');

require(TEMPLATEPATH . "/product_menu.php");

require($functions_path . "/auto_install_setting.php");
?>