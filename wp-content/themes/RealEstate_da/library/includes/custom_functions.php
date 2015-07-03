<?php
// Custom fields for WP write panel
// This code is protected under Creative Commons License: http://creativecommons.org/licenses/by-nc-nd/3.0/

//Custom Settings
$pt_metaboxes = array(
        "image" => array (
                "name"		=> "image",
                "default" 	=> "",
                "label" 	=> "Custom Image Location",
                "type" 		=> "text",
                "desc"      => "Enter full URL path for image to be used by the Dynamic Image resizer. (including <code>http://</code>). Image must be uploaded to your blog or it won't resize due to copyright restrictions of TimThumb script. You also need to Chmod <code>cache</code> folder in theme files to 777 restrictions."
        ),
);

// Excerpt length

function bm_better_excerpt($length, $ellipsis) {
    $text = get_the_content();
    $text = strip_tags($text);
    $text = substr($text, 0, $length);
    $text = substr($text, 0, strrpos($text, " "));
    $text = $text.$ellipsis;
    return $text;
}
// Custom fields for WP write panel
// This code is protected under Creative Commons License: http://creativecommons.org/licenses/by-nc-nd/3.0/

function ptthemes_meta_box_content() {
    global $post, $pt_metaboxes;
    $output = '';
    $output .= '<div class="pt_metaboxes_table">'."\n";
    foreach ($pt_metaboxes as $pt_id => $pt_metabox) {
        if($pt_metabox['type'] == 'text' OR $pt_metabox['type'] == 'select' OR $pt_metabox['type'] == 'checkbox' OR $pt_metabox['type'] == 'textarea')
            $pt_metaboxvalue = get_post_meta($post->ID,$pt_metabox["name"],true);
        if ($pt_metaboxvalue == "" || !isset($pt_metaboxvalue)) {
            $pt_metaboxvalue = $pt_metabox['default'];
        }
        if($pt_metabox['type'] == 'text') {

            $output .= "\t".'<div>';
            $output .= "\t\t".'<br/><p><strong><label for="'.$pt_id.'">'.$pt_metabox['label'].'</label></strong></p>'."\n";
            $output .= "\t\t".'<p><input size="100" class="pt_input_text" type="'.$pt_metabox['type'].'" value="'.$pt_metaboxvalue.'" name="ptthemes_'.$pt_metabox["name"].'" id="'.$pt_id.'"/></p>'."\n";
            $output .= "\t\t".'<p><span style="font-size:11px">'.$pt_metabox['desc'].'</span></p>'."\n";
            $output .= "\t".'</div>'."\n";

        }

        elseif ($pt_metabox['type'] == 'textarea') {

            $output .= "\t".'<div>';
            $output .= "\t\t".'<br/><p><strong><label for="'.$pt_id.'">'.$pt_metabox['label'].'</label></strong></p>'."\n";
            $output .= "\t\t".'<p><textarea rows="5" cols="98" class="pt_input_textarea" name="ptthemes_'.$pt_metabox["name"].'" id="'.$pt_id.'">' . $pt_metaboxvalue . '</textarea></p>'."\n";
            $output .= "\t\t".'<p><span style="font-size:11px">'.$pt_metabox['desc'].'</span></p>'."\n";
            $output .= "\t".'</div>'."\n";

        }

        elseif ($pt_metabox['type'] == 'select') {

            $output .= "\t".'<div>';
            $output .= "\t\t".'<br/><p><strong><label for="'.$pt_id.'">'.$pt_metabox['label'].'</label></strong></p>'."\n";
            $output .= "\t\t".'<p><select class="pt_input_select" id="'.$pt_id.'" name="ptthemes_'. $pt_metabox["name"] .'"></p>'."\n";
            $output .= '<option>Select a Upload</option>';

            $array = $pt_metabox['options'];

            if($array) {
                foreach ( $array as $id => $option ) {
                    $selected = '';
                    if($pt_metabox['default'] == $option) {
                        $selected = 'selected="selected"';
                    }
                    if($pt_metaboxvalue == $option) {
                        $selected = 'selected="selected"';
                    }
                    $output .= '<option value="'. $option .'" '. $selected .'>' . $option .'</option>';
                }
            }

            $output .= '</select><p><span style="font-size:11px">'.$pt_metabox['desc'].'</span></p>'."\n";
            $output .= "\t".'</div>'."\n";
        }

        elseif ($pt_metabox['type'] == 'checkbox') {
            if($pt_metaboxvalue == 'on') {
                $checked = 'checked="checked"';
            } else {
                $checked='';
            }

            $output .= "\t".'<div>';
            $output .= "\t\t".'<br/><p><strong><label for="'.$pt_id.'">'.$pt_metabox['label'].'</label></strong></p>'."\n";
            $output .= "\t\t".'<p><input type="checkbox" '.$checked.' class="pt_input_checkbox"  id="'.$pt_id.'" name="ptthemes_'. $pt_metabox["name"] .'" /></p>'."\n";
            $output .= "\t\t".'<p><span style="font-size:11px">'.$pt_metabox['desc'].'</span></p>'."\n";
            $output .= "\t".'</div>'."\n";

        }

    }

    $output .= '</div>'."\n\n";
    echo $output;
}

function ptthemes_metabox_insert() {
    global $pt_metaboxes;
    global $globals;
    $pID = $_POST['post_ID'];
    $counter = 0;


    foreach ($pt_metaboxes as $pt_metabox) { // On Save.. this gets looped in the header response and saves the values submitted
        if($pt_metabox['type'] == 'text' OR $pt_metabox['type'] == 'select' OR $pt_metabox['type'] == 'checkbox' OR $pt_metabox['type'] == 'textarea') // Normal Type Things...
        {
            $var = "ptthemes_".$pt_metabox["name"];
            if (isset($_POST[$var])) {
                if( get_post_meta( $pID, $pt_metabox["name"] ) == "" )
                    add_post_meta($pID, $pt_metabox["name"], $_POST[$var], true );
                elseif($_POST[$var] != get_post_meta($pID, $pt_metabox["name"], true))
                    update_post_meta($pID, $pt_metabox["name"], $_POST[$var]);
                elseif($_POST[$var] == "")
                    delete_post_meta($pID, $pt_metabox["name"], get_post_meta($pID, $pt_metabox["name"], true));
            }
        }
    }
}

function ptthemes_header_inserts() {
    echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/library/functions/admin_style.css" media="screen" />';
}

function ptthemes_meta_box() {
    if ( function_exists('add_meta_box') ) {
        add_meta_box('ptthemes-settings',$GLOBALS['themename'].' Custom Settings','ptthemes_meta_box_content','post','normal','high');
    }
}

//add_action('admin_menu', 'ptthemes_meta_box');
//add_action('admin_head', 'ptthemes_header_inserts');
//add_action('save_post', 'ptthemes_metabox_insert');


function relativeDate($posted_date) {

    $tz = 0;    // change this if your web server and weblog are in different timezones
    // see project page for instructions on how to do this

    $month = substr($posted_date,4,2);

    if ($month == "02") { // february
        // check for leap year
        $leapYear = isLeapYear(substr($posted_date,0,4));
        if ($leapYear) $month_in_seconds = 2505600; // leap year
        else $month_in_seconds = 2419200;
    }
    else { // not february
        // check to see if the month has 30/31 days in it
        if ($month == "04" or
                $month == "06" or
                $month == "09" or
                $month == "11")
            $month_in_seconds = 2592000; // 30 day month
        else $month_in_seconds = 2678400; // 31 day month;
    }

    /*
some parts of this implementation borrowed from:
http://maniacalrage.net/archives/2004/02/relativedatesusing/ 
    */

    $in_seconds = strtotime(substr($posted_date,0,8).' '.
            substr($posted_date,8,2).':'.
            substr($posted_date,10,2).':'.
            substr($posted_date,12,2));
    $diff = time() - ($in_seconds + ($tz*3600));
    $months = floor($diff/$month_in_seconds);
    $diff -= $months*2419200;
    $weeks = floor($diff/604800);
    $diff -= $weeks*604800;
    $days = floor($diff/86400);
    $diff -= $days*86400;
    $hours = floor($diff/3600);
    $diff -= $hours*3600;
    $minutes = floor($diff/60);
    $diff -= $minutes*60;
    $seconds = $diff;

    if ($months>0) {
        // over a month old, just show date ("Month, Day Year")
        echo '';
        the_time('F jS, Y');
    } else {
        if ($weeks>0) {
            // weeks and days
            $relative_date .= ($relative_date?', ':'').$weeks.' '.get_option('ptthemes_relative_week').''.($weeks>1?''.get_option('ptthemes_relative_s').'':'');
            $relative_date .= $days>0?($relative_date?', ':'').$days.' '.get_option('ptthemes_relative_day').''.($days>1?''.get_option('ptthemes_relative_s').'':''):'';
        } elseif ($days>0) {
            // days and hours
            $relative_date .= ($relative_date?', ':'').$days.' '.get_option('ptthemes_relative_day').''.($days>1?''.get_option('ptthemes_relative_s').'':'');
            $relative_date .= $hours>0?($relative_date?', ':'').$hours.' '.get_option('ptthemes_relative_hour').''.($hours>1?''.get_option('ptthemes_relative_s').'':''):'';
        } elseif ($hours>0) {
            // hours and minutes
            $relative_date .= ($relative_date?', ':'').$hours.' '.get_option('ptthemes_relative_hour').''.($hours>1?''.get_option('ptthemes_relative_s').'':'');
            $relative_date .= $minutes>0?($relative_date?', ':'').$minutes.' '.get_option('ptthemes_relative_minute').''.($minutes>1?''.get_option('ptthemes_relative_s').'':''):'';
        } elseif ($minutes>0) {
            // minutes only
            $relative_date .= ($relative_date?', ':'').$minutes.' '.get_option('ptthemes_relative_minute').''.($minutes>1?''.get_option('ptthemes_relative_s').'':'');
        } else {
            // seconds only
            $relative_date .= ($relative_date?', ':'').$seconds.' '.get_option('ptthemes_relative_minute').''.($seconds>1?''.get_option('ptthemes_relative_s').'':'');
        }

        // show relative date and add proper verbiage
        echo ''.get_option('ptthemes_relative_posted').' '.$relative_date.' '.get_option('ptthemes_relative_ago').'';
    }

}

function isLeapYear($year) {
    return $year % 4 == 0 && ($year % 400 == 0 || $year % 100 != 0);
}

if(!function_exists('how_long_ago')) {
    function how_long_ago($timestamp) {
        $difference = time() - $timestamp;

        if($difference >= 60*60*24*365) {        // if more than a year ago
            $int = intval($difference / (60*60*24*365));
            $s = ($int > 1) ? ''.get_option('ptthemes_relative_s').'' : '';
            $r = $int . ' '.get_option('ptthemes_relative_year').'' . $s . ' '.get_option('ptthemes_relative_ago').'';
        } elseif($difference >= 60*60*24*7*5) {  // if more than five weeks ago
            $int = intval($difference / (60*60*24*30));
            $s = ($int > 1) ? ''.get_option('ptthemes_relative_s').'' : '';
            $r = $int . ' '.get_option('ptthemes_relative_month').'' . $s . ' '.get_option('ptthemes_relative_ago').'';
        } elseif($difference >= 60*60*24*7) {        // if more than a week ago
            $int = intval($difference / (60*60*24*7));
            $s = ($int > 1) ? ''.get_option('ptthemes_relative_s').'' : '';
            $r = $int . ' '.get_option('ptthemes_relative_week').'' . $s . ' '.get_option('ptthemes_relative_ago').'';
        } elseif($difference >= 60*60*24) {      // if more than a day ago
            $int = intval($difference / (60*60*24));
            $s = ($int > 1) ? ''.get_option('ptthemes_relative_s').'' : '';
            $r = $int . ' '.get_option('ptthemes_relative_day').'' . $s . ' '.get_option('ptthemes_relative_ago').'';
        } elseif($difference >= 60*60) {         // if more than an hour ago
            $int = intval($difference / (60*60));
            $s = ($int > 1) ? ''.get_option('ptthemes_relative_s').'' : '';
            $r = $int . ' '.get_option('ptthemes_relative_hour').'' . $s . ' '.get_option('ptthemes_relative_ago').'';
        } elseif($difference >= 60) {            // if more than a minute ago
            $int = intval($difference / (60));
            $s = ($int > 1) ? ''.get_option('ptthemes_relative_s').'' : '';
            $r = $int . ' '.get_option('ptthemes_relative_minute').'' . $s . ' '.get_option('ptthemes_relative_ago').'';
        } else {                                // if less than a minute ago
            $r = ''.get_option('ptthemes_relative_moments').' '.get_option('ptthemes_relative_ago').'';
        }

        return $r;
    }
}

/*
Plugin Name: WP-PageNavi 
Plugin URI: http://www.lesterchan.net/portfolio/programming.php 
*/ 
function wp_pagenavi($before = '', $after = '', $prelabel = '', $nxtlabel = '', $pages_to_show = 5, $always_show = false) {
    global $request, $posts_per_page, $wpdb, $paged, $totalpost_count;
    if(empty($prelabel)) {
        $prelabel  = '<strong>'.ARROW_LAST.'</strong>';
    }
    if(empty($nxtlabel)) {
        $nxtlabel = '<strong>'.ARROW_LAST.'</strong>';
    }
    $half_pages_to_show = round($pages_to_show/2);
    if (!is_single()) {
        if(is_tag()) {
            preg_match('#FROM\s(.*)\sGROUP BY#siU', $request, $matches);
        } elseif (!is_category()) {
            preg_match('#FROM\s(.*)\sORDER BY#siU', $request, $matches);
        } else {
            preg_match('#FROM\s(.*)\sGROUP BY#siU', $request, $matches);
        }
        $fromwhere = $matches[1];
        $numposts = $wpdb->get_var("SELECT COUNT(DISTINCT ID) FROM $fromwhere");

    }
    if($totalpost_count>0) {
        $numposts = $totalpost_count;
    }
    $max_page = ceil($numposts /$posts_per_page);
    if(empty($paged)) {
        $paged = 1;
    }
    if($max_page > 1 || $always_show) {
        echo "$before <div class='Navi'><span class=\"navibg\">";
        if ($paged >= ($pages_to_show-1)) {
            echo '<a class="flecizq" href="'.str_replace('&','&amp;',str_replace('&','&amp;',get_pagenum_link())).'">&laquo; '.ARROW_FIRST.'</a>';
        }
        previous_posts_link($prelabel);
        for($i = $paged - $half_pages_to_show; $i  <= $paged + $half_pages_to_show; $i++) {
            if ($i >= 1 && $i <= $max_page) {
                if($i == $paged) {
                    echo "<strong class='on'>$i</strong>";
                } else {
                    echo ' <a href="'.str_replace('&','&amp;',get_pagenum_link($i)).'">'.$i.'</a> ';
                }
            }
        }
        next_posts_link($nxtlabel, $max_page);
        if (($paged+$half_pages_to_show) < ($max_page)) {
            echo '<a class="flecder" href="'.str_replace('&','&amp;',get_pagenum_link($max_page)).'">'.ARROW_LAST.' &raquo;</a>';
        }
        echo "</span></div> $after";
    }
}

/// Use Noindex for sections specified in theme admin

function ptthemes_noindex_head() {

    if ((is_category() && get_option('ptthemes_noindex_category')) ||
            (is_tag() && get_option('ptthemes_noindex_tag')) ||
            (is_day() && get_option('ptthemes_noindex_daily')) ||
            (is_month() && get_option('ptthemes_noindex_monthly')) ||
            (is_year() && get_option('ptthemes_noindex_yearly')) ||
            (is_author() && get_option('ptthemes_noindex_author')) ||
            (is_search() && get_option('ptthemes_noindex_search'))) {

        $meta_string .= '<meta name="robots" content="noindex,follow" />';
    }

    echo $meta_string;

}

add_action('wp_head', 'ptthemes_noindex_head');

///////////NEW FUNCTIONS  START//////
function bdw_get_images($iPostID,$img_size='thumb') {
    $arrImages =& get_children('order=ASC&orderby=menu_order ID&post_type=attachment&post_mime_type=image&post_parent=' . $iPostID );
    //$images =& get_children( 'post_type=attachment&post_mime_type=image' );
    //$videos =& get_children( 'post_type=attachment&post_mime_type=video/mp4' );

    $return_arr = array();
    if($arrImages) {
        foreach($arrImages as $key=>$val) {
            $id = $val->ID;
            if($img_size == 'large') {
                //$return_arr[] = '<img src="'.wp_get_attachment_url($id).'" alt="">';	// THE FULL SIZE IMAGE INSTEAD
                $img_arr = wp_get_attachment_image_src($id,'full');	// THE FULL SIZE IMAGE INSTEAD
                $return_arr[] = $img_arr[0];
            }
            elseif($img_size == 'medium') {
                //$return_arr[] = '<img src="'.wp_get_attachment_url($id, $size='medium').'" alt="">'; //THE medium SIZE IMAGE INSTEAD
                $img_arr = wp_get_attachment_image_src($id, 'medium'); //THE medium SIZE IMAGE INSTEAD
                $return_arr[] = $img_arr[0];
            }
            elseif($img_size == 'thumb') {
                //$return_arr[] = '<img src="'.wp_get_attachment_thumb_url($id).'" alt="">'; // Get the thumbnail url for the attachment
                $img_arr = wp_get_attachment_image_src($id, 'thumbnail'); // Get the thumbnail url for the attachment
                $return_arr[] = $img_arr[0];

            }
        }
        return $return_arr;
    }
}
function bdw_get_images_with_info($iPostID,$img_size='thumb') {
    $arrImages =& get_children('order=ASC&orderby=menu_order ID&post_type=attachment&post_mime_type=image&post_parent=' . $iPostID );

    $return_arr = array();
    if($arrImages) {
        foreach($arrImages as $key=>$val) {
            $id = $val->ID;
            if($img_size == 'large') {
                $img_arr = wp_get_attachment_image_src($id,'full');	// THE FULL SIZE IMAGE INSTEAD
                $imgarr['id'] = $id;
                $imgarr['file'] = $img_arr[0];
                $return_arr[] = $imgarr;
            }
            elseif($img_size == 'medium') {
                $img_arr = wp_get_attachment_image_src($id, 'medium'); //THE medium SIZE IMAGE INSTEAD
                $imgarr['id'] = $id;
                $imgarr['file'] = $img_arr[0];
                $return_arr[] = $imgarr;
            }
            elseif($img_size == 'thumb') {
                $img_arr = wp_get_attachment_image_src($id, 'thumbnail'); // Get the thumbnail url for the attachment
                $imgarr['id'] = $id;
                $imgarr['file'] = $img_arr[0];
                $return_arr[] = $imgarr;

            }
        }
        return $return_arr;
    }
}

function _cat_rows1( $parent = 0, $level = 0, $categories, &$children, $page = 1, $per_page = 20, &$count ) {
    //global $category_array;
    $start = ($page - 1) * $per_page;
    $end = $start + $per_page;
    ob_start();

    foreach ( $categories as $key => $category ) {
        if ( $count >= $end )
            break;

        $_GET['s']='';
        if ( $category->parent != $parent && empty($_GET['s']) )
            continue;

        // If the page starts in a subtree, print the parents.
        if ( $count == $start && $category->parent > 0 ) {
            $my_parents = array();
            $p = $category->parent;
            while ( $p ) {
                $my_parent = get_category( $p );
                $my_parents[] = $my_parent;
                if ( $my_parent->parent == 0 )
                    break;
                $p = $my_parent->parent;
            }

            $num_parents = count($my_parents);
            while( $my_parent = array_pop($my_parents) ) {
                $category_array[] = _cat_rows1( $my_parent, $level - $num_parents );
                $num_parents--;
            }
        }

        if ($count >= $start) {
            $categoryinfo = array();
            $category = get_category( $category, '', '' );
            $default_cat_id = (int) get_option( 'default_category' );
            $pad = str_repeat( '&#8212; ', max(0, $level) );
            $name = ( $name_override ? $name_override : $pad . ' ' . $category->name );
            $categoryinfo['ID'] = $category->term_id;
            $categoryinfo['name'] = $name;
            $category_array[] = $categoryinfo;
        }

        unset( $categories[ $key ] );
        $count++;
        if ( isset($children[$category->term_id]) )
            _cat_rows1( $category->term_id, $level + 1, $categories, $children, $page, $per_page, $count );
    }
    $output = ob_get_contents();
    ob_end_clean();
    return $category_array;
}

function getCategoryList( $parent = 0, $level = 0, $categories = 0, $page = 1, $per_page = 1000 ) {
    $count = 0;
    if ( empty($categories) ) {
        $args = array('hide_empty' => 0,'orderby'=>'id');

        $categories = get_categories( $args );
        if ( empty($categories) )
            return false;
    }
    $children = _get_term_hierarchy('category');
    return _cat_rows1( $parent, $level, $categories, $children, $page, $per_page, $count );
}

function get_category_dropdown_options($parentid ='0', $selectedId='',$exclude_cat='',$html_type='dropdown') {
    $category_array = array();
    $category_array = getCategoryList($parentid);
    $option_str = '';
    $exclude_catarr = explode(',',$exclude_cat);
    for($i=0;$i<count($category_array);$i++) {
        if(!in_array($category_array[$i]['ID'],$exclude_catarr)) {
            $selected = '';
            if($html_type=='dropdown') {
                if($selectedId == $category_array[$i]['ID']) {
                    $selected="selected";
                };
                $option_str .= '<option value="'.$category_array[$i]['ID'].'" '.$selected.'>'.$category_array[$i]['name'];
                $option_str .= '</option>';
            }
        }
    }
    return $option_str;
}

function get_cat_id_from_name($catname) {
    global $wpdb;
    if($catname) {
        return $pn_categories_obj = $wpdb->get_var("SELECT $wpdb->terms.term_id as cat_ID
	                            FROM $wpdb->term_taxonomy,  $wpdb->terms
                                WHERE $wpdb->term_taxonomy.term_id =  $wpdb->terms.term_id AND $wpdb->terms.name like \"$catname\"
                                AND $wpdb->term_taxonomy.taxonomy = 'category'");
    }
}
function in_sub_category($parentid,$postid) {
    $catarr = getCategoryList($parentid);
    if($catarr) {
        foreach($catarr as $key=>$val) {
            if($val['ID'] != '') {
                if(in_category($val['ID'],$postid)) {
                    return true;
                }
            }
        }
    }
    return false;
}
function get_sub_categories($parentid,$return_type='array') {
    $cat_arr = array();
    $catarr = getCategoryList($parentid);
    if($catarr) {
        foreach($catarr as $key=>$val) {
            $cat_arr[] = $val['ID'];
        }
    }
    $cat_arr[0] = $parentid;
    if($return_type=='array') {
        return $cat_arr;
    }else {
        return implode(',',$cat_arr);
    }
}
function get_property_all_cat_ids() {
    $property_parent_ids = get_property_parent_catids();
    $property_parent_ids_arr = explode(',',$property_parent_ids);
    $str = '';
    for($i=0;$i<count($property_parent_ids_arr);$i++) {
        $str .= get_sub_categories($property_parent_ids_arr[$i],'string');
    }
    return $str;
}
function is_sub_category($parentid) {
    $catarr = getCategoryList($parentid);
    if($catarr) {
        foreach($catarr as $key=>$val) {
            if($val['ID'] != '') {
                if(is_category($val['ID'])) {
                    return true;
                }
            }
        }
    }
    return false;
}
function get_property_price($postid) {
    if(get_post_meta($postid,'price',true) && get_post_meta($postid,'price',true)>0) {
        //return get_currency_sym().number_format(get_post_meta($postid,'price',true),2,",",".");
        return get_post_meta($postid,'price',true).get_currency_sym();
    }
}
function get_area_srch_params() {
    global $wpdb;
    $option_value = get_option('mysite_general_settings');
    if($option_value['area_srch_setting']) {
        return stripslashes($option_value['area_srch_setting']);
    }
}
function get_currency_sym() {
    global $wpdb;
    $option_value = get_option('mysite_general_settings');
    if($option_value['currencysym']) {
        return stripslashes($option_value['currencysym']);
    }else {
        return '$';
    }
}
function get_currency_type() {
    global $wpdb;
    $option_value = get_option('mysite_general_settings');
    if($option_value['currency']) {
        return stripslashes($option_value['currency']);
    }else {
        return 'USD';
    }

}
function get_site_emailId() {
    $generalinfo = get_option('mysite_general_settings');
    if($generalinfo['site_email']) {
        return $generalinfo['site_email'];
    }else {
        return get_option('admin_email');
    }
}
function get_site_emailName() {
    $generalinfo = get_option('mysite_general_settings');
    if($generalinfo['site_email_name']) {
        return stripslashes($generalinfo['site_email_name']);
    }else {
        return stripslashes(get_option('blogname'));
    }
}
function is_allow_user_register() {
    $generalinfo = get_option('mysite_general_settings');
    if($generalinfo['is_allow_user_add']!='') {
        return $generalinfo['is_allow_user_add'];
    }else {
        return 1;
    }
}
function get_max_number_bathrooms() {
    $generalinfo = get_option('mysite_general_settings');
    if($generalinfo['max_bathrooms']) {
        return $generalinfo['max_bathrooms'];
    }else {
        return 10;
    }
}

function get_property_default_status() {
    $generalinfo = get_option('mysite_general_settings');
    if($generalinfo['approve_status']) {
        return $generalinfo['approve_status'];
    }else {
        return 'publish';
    }
}

//This function set the related property search criteria from admin panel general setting
function get_related_property() {
    $generalinfo = get_option('mysite_general_settings');
    $aqui["add_location_related"]=$generalinfo['add_location_related'];
    $aqui["price_related"]=$generalinfo['price_related'];
    $aqui["area_related"]=$generalinfo['area_related'];
    $aqui["bed_rooms_related"]=$generalinfo['bed_rooms_related'];
    $aqui["property_type_related"]=$generalinfo['property_type_related'];
    return $aqui;
}



function is_user_can_add_property() {
    global $wpdb;
    $option_value = get_option('mysite_general_settings');
    return $option_value['is_user_addproperty'];

}
function get_area_unit() {
    $generalinfo = get_option('mysite_general_settings');
    if($generalinfo['area_unit']) {
        return stripslashes($generalinfo['area_unit']);
    }else {
        return 'Sq. Ft.';
    }
}
function get_property_price_info($pro_type='') {
    global $wpdb;
    $option_value = get_option('mysite_general_settings');
    $price_info = array();
    if($option_value['list_type_title1']) {
        $info = array();
        $info['title'] = $option_value['list_type_title1'];
        $info['price'] = $option_value['list_type_price1'];
        $info['days'] = $option_value['list_type_days1'];
        $info['alive_days'] = $option_value['list_type_days1'];
        $info['day_type'] = $option_value['list_type_days_type1'];
        $info['is_feature'] = $option_value['list_type_feature1'];
        if($info['day_type']=='months') {
            $info['alive_days'] = $option_value['list_type_days1']*30;
        }
        $price_info[] = $info;
        if($pro_type == $option_value['list_type_title1'])
            return $info;

    }
    if($option_value['list_type_title2']) {
        $info = array();
        $info['title'] = $option_value['list_type_title2'];
        $info['price'] = $option_value['list_type_price2'];
        $info['days'] = $option_value['list_type_days2'];
        $info['alive_days'] = $option_value['list_type_days2'];
        $info['day_type'] = $option_value['list_type_days_type2'];
        $info['is_feature'] = $option_value['list_type_feature2'];
        if($info['day_type']=='months') {
            $info['alive_days'] = $option_value['list_type_days2']*30;
        }
        $price_info[] = $info;
        if($pro_type == $option_value['list_type_title2'])
            return $info;
    }
    return $price_info;
}
function get_property_sqft($postid) {
    if(get_post_meta($postid,'sq_ft',true)) {
        return get_post_meta($postid,'sq_ft',true).' '.get_area_unit();
    }else {
        return '';
    }
}
function get_search_param() {
    $srcharr = array();
    if($_REQUEST['srch_type']) {
        $srcharr[] = $_REQUEST['srch_type'];
    }
    if($_REQUEST['srch_price']) {
        $srcharr[] = $_REQUEST['srch_price'];
    }
    if($_REQUEST['srch_location']) {
        $srcharr[] = get_the_category_by_ID($_REQUEST['srch_location']);
    }
    if($_REQUEST['srch_bedrooms']) {
        $srcharr[] = get_the_category_by_ID($_REQUEST['srch_bedrooms']);
    }
    if($_REQUEST['srch_bathroom']) {
        if($_REQUEST['srch_bathroom']>1) {
            $srcharr[] = $_REQUEST['srch_bathroom'].' Baths';
        }else {
            $srcharr[] = $_REQUEST['srch_bathroom'].' Bath';
        }
    }
    if($_REQUEST['srch_area']) {
        $srcharr[] = $_REQUEST['srch_area'].' '. get_area_unit();
    }
    if($_REQUEST['srch_keyword'] == '' || $_REQUEST['srch_keyword']==CITY_STATE_ZIP_SRCH_TEXT) {
    }else {
        $srcharr[] = $_REQUEST['srch_keyword'];
    }
    if($_REQUEST['srch_property_id']!='') {
        $srcharr[] = 'property id : '.$_REQUEST['srch_property_id'];
    }

    if($srcharr[0]) {
        //return ' Search '. implode(' & ',$srcharr);
        return SEARCH_TITLE;
    }else {
        //return ' for All Properties';
        return SEARCH_ALL_PROPERTY_TITLE;
    }
}
function get_search_catids() {
    $srcharr = array();
    if($_REQUEST['srch_price']) {
        $srcharr[] = $_REQUEST['srch_price'];
    }
    if($_REQUEST['srch_location']) {
        $srcharr[] = $_REQUEST['srch_location'];
    }
    if($_REQUEST['srch_bedrooms']) {
        $srcharr[] = $_REQUEST['srch_bedrooms'];
    }
    return $srcharr;
}
function get_property_parent_catids() {
    $catid = array();
    /*if(get_cat_id_from_name(get_option('ptthemes_pricecategory')))
	{
		$catid[] = get_cat_id_from_name(get_option('ptthemes_pricecategory'));
	}*/
    if(get_cat_id_from_name(get_option('ptthemes_locationcategory'))) {
        $catid[] = get_cat_id_from_name(get_option('ptthemes_locationcategory'));
    }
    if(get_cat_id_from_name(get_option('ptthemes_bedroomcategory'))) {
        $catid[] = get_cat_id_from_name(get_option('ptthemes_bedroomcategory'));
    }
    if($catid) {
        $catidstr = implode(',',$catid);
    }
    return $catidstr;
}
function get_property_cat_id_name($postid='') {
    global $wpdb;
    $bedcatid = get_cat_id_from_name(get_option('ptthemes_bedroomcategory'));
    $bedcatarr = getCategoryList($bedcatid);
    if($bedcatarr) {
        foreach($bedcatarr as $key=>$val) {
            if($val['ID']) {
                $bed_catid_arr[] = $val['ID'];
                $bed_catname_arr[$val['ID']] = $val['name'];
            }
        }
    }
    $typecatid = get_cat_id_from_name(get_option('ptthemes_property_typecategory'));
    $typecatarr = getCategoryList($typecatid);
    if($typecatarr) {
        foreach($typecatarr as $key=>$val) {
            if($val['ID']) {
                $type_catid_arr[] = $val['ID'];
                $type_catname_arr[$val['ID']] = $val['name'];
            }
        }
    }
    $loccatid = get_cat_id_from_name(get_option('ptthemes_locationcategory'));
    $loccatarr = getCategoryList($loccatid);
    if($loccatarr) {
        foreach($loccatarr as $key=>$val) {
            if($val['ID']) {
                $loc_catid_arr[] = $val['ID'];
                $loc_catname_arr[$val['ID']] = $val['name'];
            }
        }
    }
    /*$pricecatid = get_cat_id_from_name(get_option('ptthemes_pricecategory'));
	$pricecatarr = getCategoryList($pricecatid);
	if($pricecatarr)
	{
		foreach($pricecatarr as $key=>$val)
		{
			if($val['ID'])
			{
				$price_catid_arr[] = $val['ID'];
				$price_catname_arr[$val['ID']] = $val['name'];
			}
		}
	}*/
    $pn_categories_obj = $wpdb->get_var("SELECT GROUP_CONCAT(distinct($wpdb->terms.term_id)) as cat_ID
	                            FROM $wpdb->term_taxonomy,  $wpdb->terms,  $wpdb->term_relationships
                                WHERE $wpdb->term_taxonomy.term_id =  $wpdb->terms.term_id AND $wpdb->term_taxonomy.taxonomy = 'category'
								and $wpdb->term_relationships.term_taxonomy_id=$wpdb->term_taxonomy.term_taxonomy_id and $wpdb->term_relationships.object_id=\"$postid\"");

    $post_cats_arr = explode(',',$pn_categories_obj);
    if($post_cats_arr) {
        for($i=0;$i<count($post_cats_arr);$i++) {
            if($bed_catid_arr && in_array($post_cats_arr[$i],$bed_catid_arr)) {
                $post_cat_info['bed'] = array('id'=>$post_cats_arr[$i],'name'=>$bed_catname_arr[$post_cats_arr[$i]]);
            }
            if($loc_catid_arr && in_array($post_cats_arr[$i],$loc_catid_arr)) {
                $post_cat_info['location'] = array('id'=>$post_cats_arr[$i],'name'=>$loc_catname_arr[$post_cats_arr[$i]]);
            }
            /*if($price_catid_arr && in_array($post_cats_arr[$i],$price_catid_arr))
			{
				$post_cat_info['price'] = array('id'=>$post_cats_arr[$i],'name'=>$price_catname_arr[$post_cats_arr[$i]]);
			}*/	
        }
    }
    return $post_cat_info;
}
function get_post_info($pid) {
    global $wpdb;
    $productinfosql = "select ID,post_title,post_content from $wpdb->posts where ID=$pid";
    $productinfo = $wpdb->get_results($productinfosql);
    if($productinfo) {
        foreach($productinfo[0] as $key=>$val) {
            $productArray[$key] = $val;
        }
    }
    return $productArray;
}
function sendEmail($fromEmail,$fromEmailName,$toEmail,$toEmailName,$subject,$message,$extra='') {
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

    // Additional headers
    $headers .= 'To: '.$toEmailName.' <'.$toEmail.'>' . "\r\n";
    $headers .= 'From: '.$fromEmailName.' <'.$fromEmail.'>' . "\r\n";

    /*	echo "Header : headers <br>";
	echo "To : $toEmail  Name : $to_name <br>";
	echo "Subject $subject <br>";
	echo "$message";
	exit;*/
    // Mail it
    mail($toEmail, $subject, $message, $headers);
}
function get_image_phy_destination_path() {
    $today = getdate();
    if ($today['month'] == "January") {
        $today['month'] = "01";
    }
    elseif ($today['month'] == "February") {
        $today['month'] = "02";
    }
    elseif  ($today['month'] == "March") {
        $today['month'] = "03";
    }
    elseif  ($today['month'] == "April") {
        $today['month'] = "04";
    }
    elseif  ($today['month'] == "May") {
        $today['month'] = "05";
    }
    elseif  ($today['month'] == "June") {
        $today['month'] = "06";
    }
    elseif  ($today['month'] == "July") {
        $today['month'] = "07";
    }
    elseif  ($today['month'] == "August") {
        $today['month'] = "08";
    }
    elseif  ($today['month'] == "September") {
        $today['month'] = "09";
    }
    elseif  ($today['month'] == "October") {
        $today['month'] = "10";
    }
    elseif  ($today['month'] == "November") {
        $today['month'] = "11";
    }
    elseif  ($today['month'] == "December") {
        $today['month'] = "12";
    }
    global $upload_folder_path;
    $tmppath = $upload_folder_path;


    $destination_path = ABSPATH . $tmppath.$today['year']."/".$today['month']."/";
    if (!file_exists($destination_path)) {
        $imagepatharr = explode('/',$tmppath.$today['year']."/".$today['month']);
        $year_path = ABSPATH;
        for($i=0;$i<count($imagepatharr);$i++) {
            if($imagepatharr[$i]) {
                $year_path .= $imagepatharr[$i]."/";
                if (!file_exists($year_path)) {
                    mkdir($year_path, 0777);
                }
            }
        }
    }

    return $destination_path;

}
//This function would add propery to favorite listing and store the value in wp_usermeta table user_favorite field
function add_to_favorite($property_id) {
    global $userdata;
    $user_meta_data = array();
    $user_meta_data = get_usermeta($userdata->ID,'user_favorite_property');
    $user_meta_data[]=$property_id;
    update_usermeta($userdata->ID, 'user_favorite_property', $user_meta_data);
    echo '<a href="javascript:void(0);" class="addtofav" onclick="javascript:addToFavorite(\''.$property_id.'\',\'remove\');"><img src="/wp-content/themes/RealEstate/images/ico-corazon.png">Favorited <b>(remove)</b> </a>';

}
function list_from_favorite() {
    global $current_user, $wpdb;
    $post_ids = get_usermeta($current_user->data->ID, 'user_favorite_property');
    if (count($post_ids) > 0 && !$current_user->data->ID == '') {
        $sql = "select * from wp_posts where post_status = 'publish' and id in (" . implode($post_ids, ",") . ")";
        $res = $wpdb->get_results($sql);
        if (count($res) > 0) {
            echo '<ul class="featured_agent_list">';
            foreach ($res as $val) {
                $imgs = bdw_get_images($val->ID, $img_size = 'thumb');
?>
                <li class="clearfix"><a href="<?php echo get_permalink($val->ID); ?>">
<?php //get_user_profile_pic($val->ID,40,40);   ?>
<?php
                echo "<span class=\"tooltipfeatured\">" . number_format(str_replace(".", "", get_post_meta($val->ID, 'price', true)), 0, ",", ".") . "€</span>";
                echo ($imgs[0] ? '<span class="marcofeatured"><img src="' . $imgs[0] . '" style="width:128px;height:94px;"/></span>' : '');
?>
                    </a>

        <?php /* <p><a href="<?php echo get_author_link($echo = false, $val->ID);?>"><?php echo $val->display_name; ?> </a> <br /> <?php _e('Listed')?>: <?php echo get_usernumposts_count($val->ID); ?> <?php _e('Properties'); ?>  </p> */ ?>
        </li>
        <?php
            }
            echo '</ul>';
        } else {
            echo '<div class="msgshlist">' . TEXT_NOFAVORITES . '</div>';
        }
    } else {
        echo '<div class="msgshlist">' . TEXT_NOFAVORITES . '</div>';
    }
}

//This function would remove the favorited property earlier
function remove_from_favorite($property_id) {
    global $userdata;
    $user_meta_data = array();
    $user_meta_data = get_usermeta($userdata->ID,'user_favorite_property');
    if(in_array($property_id,$user_meta_data)) {
        $user_new_data = array();
        foreach($user_meta_data as $key => $value) {
            if($property_id == $value) {
                $value= '';
            }else {
                $user_new_data[] = $value;
            }
        }
        $user_meta_data	= $user_new_data;
    }
    update_usermeta($userdata->ID, 'user_favorite_property', $user_meta_data);
    echo '<a href="javascript:void(0);"  onclick="javascript:addToFavorite(\''.$property_id.'\',\'add\');">Add To Favorite</a>';
}

//This function would disply the html content for add to favorite or remove from favorite 
function favourite_html($user_id,$post_id) {
    global $userdata;

    $user_meta_data = get_usermeta($userdata->ID,'user_favorite_property');
    if($user_meta_data && in_array($post_id,$user_meta_data)) {
        ?>
<span id="favorite_property_<?php echo $post_id;?>" class="fav"  ><?php _e('Favorited ');?><a href="javascript:void(0);" class="addtofav" onclick="javascript:addToFavorite(<?php echo $post_id;?>,'remove');"><?php _e(' <b>(remove)</b>');?></a>   </span>    
        <?php
    }else {
        ?>
<span id="favorite_property_<?php echo $post_id;?>" class="fav"><a href="javascript:void(0);" class="addtofav"  onclick="javascript:addToFavorite(<?php echo $post_id;?>,'add');"><img src="<?php bloginfo('template_directory'); ?>/images/ico-corazon.png"/><?php _e(ADD_TO_FAVOURITE_TEXT);?></a></span>
        <?php }
    //}
}

//This function give print the image if uploaded earlier or print avtar
function get_user_profile_pic($user_id,$height=100,$width=100) {
    $user_data = get_userdata(intval($user_id));

    if($user_data ->user_photo !='') {
        $img_data =  '<img name="user_photo" class="agent_photo" id="user_photo" src="'.$user_data ->user_photo.'" width="'.$width.'" height="'.$height.'"  />';
    }else {
        $img_data =  '<img name="user_photo" class="agent_photo" id="user_photo" src="'.get_bloginfo('template_directory').'/images/avatar_post.png" width="'.$width.'" height="'.$height.'"  />';
    }
    echo $img_data;
}

//This function would return paths of folder to which upload the image 
function get_image_phy_destination_path_user() {
    global $upload_folder_path;
    $tmppath = $upload_folder_path;
    $destination_path = ABSPATH . $tmppath."users/";
    if (!file_exists($destination_path)) {
        $imagepatharr = explode('/',$tmppath."users");
        $year_path = ABSPATH;
        for($i=0;$i<count($imagepatharr);$i++) {
            if($imagepatharr[$i]) {
                $year_path .= $imagepatharr[$i]."/";
                if (!file_exists($year_path)) {
                    mkdir($year_path, 0777);
                }
            }
        }
    }
    return $destination_path;

}

//
function get_image_rel_destination_path_user() {
    global $upload_folder_path;
    $destination_path = get_option( 'siteurl' ) ."/".$upload_folder_path."users/";
    return $destination_path;

}

function get_image_rel_destination_path() {
    $today = getdate();
    if ($today['month'] == "January") {
        $today['month'] = "01";
    }
    elseif ($today['month'] == "February") {
        $today['month'] = "02";
    }
    elseif  ($today['month'] == "March") {
        $today['month'] = "03";
    }
    elseif  ($today['month'] == "April") {
        $today['month'] = "04";
    }
    elseif  ($today['month'] == "May") {
        $today['month'] = "05";
    }
    elseif  ($today['month'] == "June") {
        $today['month'] = "06";
    }
    elseif  ($today['month'] == "July") {
        $today['month'] = "07";
    }
    elseif  ($today['month'] == "August") {
        $today['month'] = "08";
    }
    elseif  ($today['month'] == "September") {
        $today['month'] = "09";
    }
    elseif  ($today['month'] == "October") {
        $today['month'] = "10";
    }
    elseif  ($today['month'] == "November") {
        $today['month'] = "11";
    }
    elseif  ($today['month'] == "December") {
        $today['month'] = "12";
    }
    global $upload_folder_path;
    $tmppath = $upload_folder_path;
    global $blog_id;
    if($blog_id) {
        return $user_path = $today['year']."/".$today['month']."/";
    }else {
        return $user_path = get_option( 'siteurl' ) ."/$tmppath".$today['year']."/".$today['month']."/";
    }
}
function get_image_tmp_phy_path() {
    global $upload_folder_path;
    $tmppath = $upload_folder_path;
    return $destination_path = ABSPATH . "$tmppath/tmp/";
}

function move_original_image_file($src,$dest) {
    copy($src, $dest);
    unlink($src);
    $dest = explode('/',$dest);
    $img_name = $dest[count($dest)-1];
    $img_name_arr = explode('.',$img_name);

    $my_post = array();
    $my_post['post_title'] = $img_name_arr[0];
    $my_post['guid'] = get_image_rel_destination_path().$img_name;
    return $my_post;
}
function get_image_size($src) {
    $img = imagecreatefromjpeg($src);
    if (!$img) {
        echo "ERROR:could not create image handle ". $src;
        exit(0);
    }
    $width = imageSX($img);
    $height = imageSY($img);
    return array('width'=>$width,'height'=>$height);

}
function get_attached_file_meta_path($imagepath) {
    $imagepath_arr = explode('/',$imagepath);
    $imagearr = array();
    for($i=0;$i<count($imagepath_arr);$i++) {
        $imagearr[] = $imagepath_arr[$i];
        if($imagepath_arr[$i] == 'uploads') {
            break;
        }
    }
    $imgpath_ini = implode('/',$imagearr);
    return str_replace($imgpath_ini.'/','',$imagepath);
}
function image_resize_custom($src,$dest,$twidth,$theight) {
    global $image_obj;
    // Get the image and create a thumbnail
    $img_arr = explode('.',$dest);
    $imgae_ext = strtolower($img_arr[count($img_arr)-1]);
    if($imgae_ext == 'jpg' || $imgae_ext == 'jpeg') {
        $img = imagecreatefromjpeg($src);
    }elseif($imgae_ext == 'gif') {
        $img = imagecreatefromgif($src);
    }
    elseif($imgae_ext == 'png') {
        $img = imagecreatefrompng($src);
    }

    if($img) {
        $width = imageSX($img);
        $height = imageSY($img);

        if (!$width || !$height) {
            echo "ERROR:Invalid width or height";
            exit(0);
        }

        if(($twidth<=0 || $theight<=0)) {
            return false;
        }
        $image_obj->load($src);
        $image_obj->resize($twidth,$theight);
        $new_width = $image_obj->getWidth();
        $new_height = $image_obj->getHeight();
        $imgname_sub = '-'.$new_width.'X'. $new_height.'.'.$imgae_ext;
        $img_arr1 = explode('.',$dest);
        unset($img_arr1[count($img_arr1)-1]);
        $dest = implode('.',$img_arr1).$imgname_sub;
        $image_obj->save($dest);


        return array(
                'file' => basename( $dest ),
                'width' => $new_width,
                'height' => $new_height,
        );
    }else {
        return array();
    }
}

function get_author_info($aid) {
    global $wpdb;
    $infosql = "select * from $wpdb->users where ID=$aid";
    $info = $wpdb->get_results($infosql);
    if($info) {
        return $info[0];
    }
}
function get_time_difference( $start, $pid ) {
    $alive_days = get_post_meta($pid,'alive_days',true);
    $end = date('Y-m-d',mktime(0,0,0,date('m',strtotime($start)),date('d',strtotime($start))+$alive_days,date('Y',strtotime($start))));

    $uts['start']      =    strtotime( $start );
    $uts['end']        =    strtotime( $end );
    if( $uts['start']!==-1 && $uts['end']!==-1 ) {
        if( $uts['end'] >= $uts['start'] ) {
            $diff    =    $uts['end'] - $uts['start'];
            if( $days=intval((floor($diff/86400))) )
                $diff = $diff % 86400;
            if( $hours=intval((floor($diff/3600))) )
                $diff = $diff % 3600;
            if( $minutes=intval((floor($diff/60))) )
                $diff = $diff % 60;
            $diff    =    intval( $diff );
            //return( array('days'=>$days, 'hours'=>$hours, 'minutes'=>$minutes, 'seconds'=>$diff) );
            return $days;
        }
    }
    return( false );
}
function is_new_property($pid) {
    global $wpdb;
    $aa = get_post_meta($pid, "add_label",true);
    if(strtolower($aa)=="new"){
        $newdays = get_option('ptthemes_new_properties');
        $start = $wpdb->get_var("select post_date from $wpdb->posts where ID=$pid");
        $end = date('Y-m-d H:i:s');
        $uts['start']      =    strtotime( $start );
        $uts['end']        =    strtotime( $end );
        if( $uts['start']!==-1 && $uts['end']!==-1 && $uts['end'] >= $uts['start']){
            $diff    =    $uts['end'] - $uts['start'];
            if( $days=intval((floor($diff/86400))) )
                    $diff = $diff % 86400;
            if($days<=$newdays)
                $aa="new";
            else
                $aa="";
        }
    }
    if ($aa) {
        echo ' <img src="';
        bloginfo('template_directory');
        echo '/images/i-icon-' . str_replace(' ','-',strtolower($aa)) . '.png" alt="" title="" class="new" />';
    }
}

function custom_list_authors_count($args = '',$params = array()) {
    global $wpdb;
    $defaults = array(
            'optioncount' => false, 'exclude_admin' => true,
            'show_fullname' => false, 'hide_empty' => true,
            'feed' => '', 'feed_image' => '', 'feed_type' => '', 'echo' => true,
            'style' => 'list', 'html' => true
    );

    $r = wp_parse_args( $args, $defaults );
    extract($r, EXTR_SKIP);
    /** @todo Move select to get_authors(). */
    $sub_cat = "select count(p.ID) from $wpdb->posts p where p.post_author=u.ID and p.post_status='publish'";
    if($params['sort']=='most') {
        //$sql = "select count(ID) as user_count from $wpdb->users u join $wpdb->posts p on p.post_author=u.ID where u.user_login <> 'admin' group by u.ID ";
        $sql = "select count(u.ID) as user_count from $wpdb->users u where u.user_login <> 'admin' and ($sub_cat)>0 group by u.ID ";
        $sql .= " order by post_count desc,display_name asc limit $startlimit,$endlimit";
    }else {
        //$sql = "SELECT count(u.ID) as user_count from $wpdb->users u join $wpdb->posts p on p.post_author=u.ID where p.post_status='publish' " . ($exclude_admin ? "and  u.user_login <> 'admin' " : '');
        $sql = "SELECT count(u.ID) as user_count from $wpdb->users u where 1 and ($sub_cat)>0 " . ($exclude_admin ? "and  u.user_login <> 'admin' " : '');
        if($params['kw']) {
            $kw = $params['kw'];
            $sql .= " and display_name like \"$kw%\" ";
        }
        $sql .= " ORDER BY display_name";
    }
    $authors = $wpdb->get_var($sql);
    if($authors) {
        return $authors;
    }else {
        return '1';
    }
    //return $authors = $wpdb->get_var("SELECT count(ID) as user_count from $wpdb->users " . ($exclude_admin ? "WHERE user_login <> 'admin' " : '') . "ORDER BY display_name");

}
function custom_list_authors($args = '',$params = array()) {
    global $wpdb,$posts_per_page, $paged;
    if($paged<=0) {
        $paged = 1;
    }
    if($params['pagination']) {
        $paged = 1;
    }
    if($params['show_count']) {
        $posts_per_page = $params['show_count'];
    }
    $startlimit = ($paged-1)*$posts_per_page;
    $endlimit = $paged*$posts_per_page;
    $defaults = array(
            'optioncount' => false, 'exclude_admin' => true,
            'show_fullname' => false, 'hide_empty' => true,
            'feed' => '', 'feed_image' => '', 'feed_type' => '', 'echo' => true,
            'style' => 'list', 'html' => true
    );

    $r = wp_parse_args( $args, $defaults );
    extract($r, EXTR_SKIP);
    $return = '';

    /** @todo Move select to get_authors(). */
    $sub_cat = "select count(p.ID) from $wpdb->posts p where p.post_author=u.ID and p.post_status='publish'";
    if($params['sort']=='most') {
        //$sql = "select u.ID,count(p.ID) as post_count from $wpdb->users u where u.user_login <> 'admin' and (select count(p.ID) from $wpdb->posts p where p.post_author=u.ID and p.post_status='publish') group by u.ID ";
        $sql = "select u.ID,($sub_cat) as post_count from $wpdb->users u where u.user_login <> 'admin' and ($sub_cat)>0 group by u.ID ";
        $sql .= " order by post_count desc,display_name asc limit $startlimit,$endlimit";
    }else {
        $sql = "SELECT u.ID, u.user_nicename from $wpdb->users u where 1 and ($sub_cat)>0 " . ($exclude_admin ? "and  u.user_login <> 'admin' " : '');
        if($params['kw']) {
            $kw = $params['kw'];
            $sql .= " and display_name like \"$kw%\" ";
        }
        $sql .= " ORDER BY display_name limit $startlimit,$posts_per_page";
    }

    $authors = $wpdb->get_results($sql);
    $return_arr = array();
    foreach ( (array) $authors as $author ) {
        $return_arr[] = get_userdata( $author->ID );
    }

    return $return_arr;
}
function get_max_number_of_bathroom() {
    global $wpdb;
    return $wpdb->get_var("select max(meta_value) from $wpdb->postmeta where meta_key='bath_rooms'");
}
function get_payment_optins($method) {
    global $wpdb;
    $paymentsql = "select * from $wpdb->options where option_name like 'payment_method_$method'";
    $paymentinfo = $wpdb->get_results($paymentsql);
    if($paymentinfo) {
        foreach($paymentinfo as $paymentinfoObj) {
            $option_value = unserialize($paymentinfoObj->option_value);
            $paymentOpts = $option_value['payOpts'];
            $optReturnarr = array();
            for($i=0;$i<count($paymentOpts);$i++) {
                $optReturnarr[$paymentOpts[$i]['fieldname']] = $paymentOpts[$i]['value'];
            }
            //echo "<pre>";print_r($optReturnarr);
            return $optReturnarr;
        }
    }
}
function set_property_status($pid,$status='publish') {
    if($pid) {
        global $wpdb;
        $wpdb->query("update $wpdb->posts set post_status=\"$status\" where ID=\"$pid\"");
    }
}

function get_property_info_li($post) {
    $thumbimage_arr = array();
    $thumbimage_arr = bdw_get_images($post->ID,$img_size='thumb');
    $thumb_img = $thumbimage_arr[0];
    ?>	<li <?php if(in_category(get_cat_id_from_name(get_option('ptthemes_featuredcategory')))) {
        //echo 'class="featured"';
    }?>><?php  is_new_property( $post->ID );?>
    <div class="content_block">
        <div class="product_image">
            <a href="<?php the_permalink();?>">
    <?php
    if($thumb_img) {
        ?>
                <img src="<?php echo $thumb_img; ?>" height="130" width="175" alt="" title="" />
        <?php
    }else {
        ?>
                <img src="<?php bloginfo('template_directory'); ?>/images/img_not_available.png" alt=""  />
        <?php
    }
    ?>

            </a></div>
        <!--<div class="content" >supuestamente no deberia estar aqui-->
            <h3 class="clearfix"><span class="propertyaddress">
                    <a href="<?php the_permalink();?>">
    <?php the_title();?>
                    </a></span>
    <?php get_property_listing_price($post->ID);?>
            </h3>


    <?php
    $address = '';
    if(get_post_meta($post->ID,'address',true)) {
        $address .= get_post_meta($post->ID,'address',true);//.', ';
    }
//						if(get_post_meta($post->ID,'add_city',true))
//						{
//							$address .= get_post_meta($post->ID,'add_city',true).', ';
//						}
//						if(get_post_meta($post->ID,'add_state',true))
//						{
//							$address .= get_post_meta($post->ID,'add_state',true).', ';
//						}
//						if(get_post_meta($post->ID,'add_country',true))
//						{
//							$address .= get_post_meta($post->ID,'add_country',true);
//						}
//						if(get_post_meta($post->ID,'add_zip_code',true))
//						{
//							$address .= ' - '.get_post_meta($post->ID,'add_zip_code',true);
//						}
//						if($address)
//						{
//							echo '<p class="address">'.$address.'</p>';
//						}
    ?>
    <?php $cat_info_arr = get_property_cat_id_name($post->ID);?>
            <div class="property_detail" style="width:220px">
                <p> <span class="field"> <?php _e(TYPE_TEXT); ?> </span> <span>:&nbsp;&nbsp;<?php echo $address;?></span> </p>
                <p> <span class="field"> <?php _e(AREA_TEXT);?> </span> <span>:&nbsp;&nbsp;<?php echo get_post_meta($post->ID,'area',true);?> (<?php echo get_area_unit();?>) </span> </p>
                <p> <span class="field"> <?php _e(BEDS_TEXT);?> </span> <span>:&nbsp;&nbsp;<?php echo get_post_meta($post->ID,'bed_rooms',true);?><?php //echo $cat_info_arr['bed']['name'];?> </span></p>
                <p><span class="field"> <?php _e(BATHS_TEXT);?> </span> <span>:&nbsp;&nbsp;<?php echo get_post_meta($post->ID,'bath_rooms',true);?> </span></p>

            </div>

            <div class="property_detail">
                <p> <span class="field"> <?php _e(MLS_NO_TEXT);?> </span> <span>:&nbsp;&nbsp;<?php echo get_post_meta($post->ID,'mlsno',true);?> </span> </p>
                <p> <span class="field"> <?php _e(PRO_CITY_TEXT);?> </span> <span>:&nbsp;&nbsp;<?= strlen(intval(get_post_meta($post->ID,'add_city',true)))>0?get_post_meta($post->ID,'add_city',true)." (".get_area_unit().")":"";?></span></p>
                <p> <span class="field"> <?php _e(PRO_STATE_TEXT);?> </span> <span>:&nbsp;&nbsp;<?=get_post_meta($post->ID,'add_state',true)?> </span></p>
                <!--<p> <span class="field"> <?php _e(PRO_PROPERTY_ID_TEXT);?> </span> <span>:&nbsp;&nbsp;<?php echo $post->ID;?> </span></p>-->
                <p><span class="field"> <?php _e(PRO_POSTED_ON_TEXT);?>  </span> <span>:&nbsp;&nbsp;<?php the_time('F j, Y') ?> </span></p>

            </div>

            <p class="propertylistinglinks">
                <span class="agent"> <?php _e(AGENT_TITLE); ?> : 
                    <a href="<?php echo get_author_link($echo = false, $post->post_author, $author_nicename = '');?>" class="emailagent"><?php echo get_the_author_meta( 'display_name',$post->post_author);?> </a>
                </span>

                <span><a href="<?php the_permalink();?>"><?php _e(VIEW_MORE_DETAILS_TEXT);?> <img src="<?=bloginfo("template_directory")?>/images/ico-flechita-negro.gif"/></a></span>
                <?php favourite_html($post->post_author,$post->ID); ?>


            </p>
            
        </div>
    </div>
</li>
    <?php
}

function get_property_listing_price($pid) {
    ?>
<span class="price">
    <?php if(get_property_price($pid)) {?>
    <b class="sale">  </b> <?php echo get_property_price($pid);?><b>
        <?php if(get_post_meta($pid,'property_type',true)=='Rent') {
            echo '/ month';
        }?> </b>
        <?php }?>
</span>
    <?php
}

function get_max_number_bedrooms() {
    $generalinfo = get_option('mysite_general_settings');
    if($generalinfo['max_bedrooms']) {
        return $generalinfo['max_bedrooms'];
    }else {
        return 10;
    }
}
function get_label_dl($label_id) {
    $label_dl_params = explode("\n",get_option('ptthemes_label_options'));
    for($i=0;$i<count($label_dl_params);$i++) {
        if(trim($label_dl_params[$i])) {
            echo '<option ';
            if(trim($label_dl_params[$i])==$label_id) {
                echo ' selected="selected" ';
            }
            echo  'value="'. trim($label_dl_params[$i]).'">'. trim($label_dl_params[$i]).'</option>';
        }
    }
}
function get_bedroom_dl($proprty_bedroom) {
    $i=1;
    $max_bedrooms = get_max_number_bedrooms();
    for($i=1;$i<=$max_bedrooms;$i++) {
        $addval = '';
        echo '<option ';
        if($i==$proprty_bedroom) {
            echo 'selected="selected"';
        }
        if($i==$max_bedrooms) {
            $addval = "+";
        }
        echo ' value="'.$i.$addval.'">'.$i.$addval.'</option>';
    }
}

function get_bathroom_dl($proprty_bathroom) {
    $i=1;
    $max_bathrooms = get_max_number_bathrooms();
    for($i=1;$i<=$max_bathrooms;$i++) {
        $addval = '';
        echo '<option ';
        if($i==$proprty_bathroom) {
            echo 'selected="selected"';
        }
        if($i==$max_bathrooms) {
            $addval = "+";
        }
        echo ' value="'.$i.$addval.'">'.$i.$addval.'</option>';
    }
}
function get_area_range_dl($area_id) {
    $area_dl_params = explode(',',get_area_srch_params());
    for($i=0;$i<count($area_dl_params);$i++) {
        if(trim($area_dl_params[$i])) {
            echo '<option ';
            if(trim($area_dl_params[$i])==$area_id) {
                echo ' selected="selected" ';
            }
            echo  'value="'. trim($area_dl_params[$i]).'">'. trim($area_dl_params[$i]).'</option>';
        }
    }
}
function get_location_srch_params() {
    global $wpdb;
    $option_value = get_option('mysite_general_settings');
    if($option_value['location_srch_setting']) {
        return stripslashes($option_value['location_srch_setting']);
    }
}
function get_label_srch_params() {
    global $wpdb;
    $option_value = get_option('mysite_general_settings');
    if($option_value['label_srch_setting']) {
        return stripslashes($option_value['label_srch_setting']);
    }
}
function get_location_dl($location_id) {
    $location_dl_params = explode(',',get_location_srch_params());
    for($i=0;$i<count($location_dl_params);$i++) {
        if(trim($location_dl_params[$i])) {
            echo '<option ';
            if(trim($location_dl_params[$i])==$location_id) {
                echo ' selected="selected" ';
            }
            echo  'value="'. trim($location_dl_params[$i]).'">'. trim($location_dl_params[$i]).'</option>';
        }
    }
}

function get_price_range_dl($price_id) {
    $option_value = get_option('mysite_general_settings');
    $area_dl_params = explode(',',stripslashes($option_value['price_srch_setting']));
    for($i=0;$i<count($area_dl_params);$i++) {
        if(trim($area_dl_params[$i])) {
            echo '<option ';
            if(trim($area_dl_params[$i])==$price_id) {
                echo ' selected="selected" ';
            }
            echo  'value="'. trim($area_dl_params[$i]).'">'. trim($area_dl_params[$i]).'</option>';
                        }
                    }
                }

function get_usernumposts_count($userid,$post_status='publish') {
                    global $wpdb;
                    if($userid) {
                        //$blogcatcatids = get_property_all_cat_ids();
                        $propertycat = get_cat_id_from_name(get_option('ptthemes_propertycategory'));
        $propertycatcatids = get_sub_categories($propertycat,'string');
                        if($propertycatcatids) {
                            $srch_blog_pids = $wpdb->get_var("SELECT group_concat(tr.object_id) FROM $wpdb->term_taxonomy tt join $wpdb->term_relationships tr on tr.term_taxonomy_id=tt.term_taxonomy_id where tt.term_id in ($propertycatcatids)");
                            if($srch_blog_pids) {
                $sub_cat_sql .= " and p.ID in ($srch_blog_pids) ";
            }
        }

        $srch_sql = "select count(p.ID) from $wpdb->posts p where  p.post_author=\"$userid\" and p.post_type='post'  $sub_cat_sql";
                                if($post_status=='all') {
            $srch_sql .= " and p.post_status in ('publish','draft')";
                        }else
        if($post_status=='publish') {
            $srch_sql .= " and p.post_status in ('publish')";
        }
                    else
                    if($post_status=='draft') {
                        $srch_sql .= " and p.post_status in ('draft')";
                    }
                    echo $totalpost_count = $wpdb->get_var($srch_sql);
                }

            }

            function get_payable_amount_with_coupon($total_amt,$coupon_code) {
                $discount_amt = get_discount_amount($coupon_code,$total_amt);
                if($discount_amt>0) {
                    return $total_amt-$discount_amt;
                }else {
                    return $total_amt;
                }
            }
            function is_valid_coupon($coupon) {
                global $wpdb;
                $couponsql = "select option_value from $wpdb->options where option_name='discount_coupons'";
                $couponinfo = $wpdb->get_results($couponsql);
                if($couponinfo) {
                    foreach($couponinfo as $couponinfoObj) {
                        $option_value = unserialize($couponinfoObj->option_value);
                        foreach($option_value as $key=>$value) {
                            if($value['couponcode'] == $coupon) {
                                return true;
                            }
            }
        }
    }
    return false;
}
function get_discount_amount($coupon,$amount) {
    global $wpdb;
    if($coupon!='' && $amount>0) {
        $couponsql = "select option_value from $wpdb->options where option_name='discount_coupons'";
        $couponinfo = $wpdb->get_results($couponsql);
        if($couponinfo) {
            foreach($couponinfo as $couponinfoObj) {
                $option_value = unserialize($couponinfoObj->option_value);
                foreach($option_value as $key=>$value) {
                    if($value['couponcode'] == $coupon) {
                        if($value['dis_per']=='per') {
                            $discount_amt = ($amount*$value['dis_amt'])/100;
                        }else
                                        if($value['dis_per']=='amt') {
                            $discount_amt = $value['dis_amt'];
                        }
                    }
                }
            }
            return $discount_amt;
        }
    }
    return '0';
}

///////////////////////////////////////////////
    function is_allow_ssl() {
    global $wpdb;
            $option_value = get_option('mysite_general_settings');
        if($option_value['is_allow_ssl']) {
        return $option_value['is_allow_ssl'];
    }else {
        return '0';
    }

}
function get_ssl_normal_url($url,$pid='') {
    if($pid) {
        return $url;
    }else {
        if(is_allow_ssl()) {
            $url = str_replace('http://','https://',$url);
        }
    }
    return $url;
}

function get_user_nice_name($fname,$lname='') {
    global $wpdb;
    if($lname) {
        $uname = $fname.'-'.$lname;
    }else {
        $uname = $fname;
    }
    $nicename = strtolower(str_replace(array("'",'"',"?",".","!","@","#","$","%","^","&","*","(",")","-","+","+"," "),array('-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-'),$uname));
    $nicenamecount = $wpdb->get_var("select count(user_nicename) from $wpdb->users where user_nicename like \"$nicename\"");
    if($nicenamecount=='0') {
        return trim($nicename);
    }else {
        $lastuid = $wpdb->get_var("select max(ID) from $wpdb->users");
        return $nicename.'-'.$lastuid;
    }
}
?>