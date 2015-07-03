<?php get_header(); ?>
<?php if (is_paged()) $is_paged = true; ?>

<div class="clearfix container_border searchbar">
    <div class="breadcrumbs">
        <p><?php if ( get_option( 'ptthemes_breadcrumbs' )) {
                yoast_breadcrumb('','');
            } ?></p>
        <span class="findproperties" onclick="show_hide_propertysearchoptions();"><a href="javascript:void(0);"><?php _e(FIND_PROPERTIES_TEXT);?><img src="<?=bloginfo("template_directory")?>/images/ico-find-properties.png"/></a></span>
    </div>
</div>
    <?php require_once (TEMPLATEPATH . '/library/includes/search.php');  ?>
<div class="wrapper" >
    <?php
    $is_search = 0;
    global $wpdb;
    $totalpost_count = 0;
    if($_REQUEST['s'] == 'new_build')
        $propertycategory = get_cat_id_from_name("Properties Submited");
    else
        $propertycategory = get_cat_id_from_name(get_option('ptthemes_propertycategory'));
    $propertycategorys = get_sub_categories($propertycategory,'string');
    $all_pids_arr = $wpdb->get_var("SELECT group_concat(ID) FROM $wpdb->posts where post_status='publish'");
    $all_pids_arr = $wpdb->get_col("SELECT tr.object_id FROM $wpdb->term_taxonomy tt join $wpdb->term_relationships tr on tr.term_taxonomy_id=tt.term_taxonomy_id where tt.term_id in ($propertycategorys)");
    if($_REQUEST['srch_location']) {
        $is_search = 1;
        $srch_location = $_REQUEST['srch_location'];
        //$location_pids = $wpdb->get_var("SELECT group_concat(tr.object_id) FROM $wpdb->term_taxonomy tt join $wpdb->term_relationships tr on tr.term_taxonomy_id=tt.term_taxonomy_id where tt.term_id=\"$srch_location\"");
        $location_pids_arr = $wpdb->get_col("select post_id from $wpdb->postmeta where meta_key like 'add_location' and meta_value like \"$srch_location\"");
        $all_pids_arr = array_intersect($all_pids_arr,$location_pids_arr);
    }
    if($_REQUEST['srch_price']) {
        $is_search = 1;
        $srch_price = str_replace(",",".",str_replace(".","",$_REQUEST['srch_price']));
        switch(substr($srch_price,0,1)){
            case 't':
                $srch_price=str_replace("to ", "<", $srch_price);
                break;
            case 'f':
                $srch_price=str_replace("from ", " between ", $srch_price);
                $srch_price=str_replace("to","and",$srch_price);
                break;
            case '+':
                $srch_price=str_replace("+"," > ",$srch_price);
        }
        $srch_price_arr = $wpdb->get_col("select post_id from $wpdb->postmeta where meta_key like 'price' and replace(replace(meta_value,'.',''),',','.') $srch_price");
        /*if(strstr($srch_price,'-')) {
            $srch_price_str = str_replace('to',' and ',$srch_price);
            $srch_price_arr = $wpdb->get_col("select post_id from $wpdb->postmeta where meta_key like 'price' and meta_value $srch_price_str");
        }
        elseif(strstr($srch_price,'+')) {
            $srch_price_str = str_replace('+','',$srch_price);
            $srch_price_arr = $wpdb->get_col("select post_id from $wpdb->postmeta where meta_key like 'price' and meta_value $srch_price_str");
        }*/
        $all_pids_arr = array_intersect($all_pids_arr,$srch_price_arr);
    }
    if($_REQUEST['srch_bedrooms']) {
        $is_search = 1;
        $srch_bedrooms = $_REQUEST['srch_bedrooms'];
        //$srch_bedrooms = $wpdb->get_var("select group_concat(post_id) from $wpdb->postmeta where meta_key like 'bed_rooms' and meta_value = \"$srch_bedrooms\"");
        //$srch_bedrooms_arr = explode(',',$srch_bedrooms);
        $srch_bedrooms_arr = $wpdb->get_col("select post_id from $wpdb->postmeta where meta_key like 'bed_rooms' and meta_value = \"$srch_bedrooms\"");
        $all_pids_arr = array_intersect($all_pids_arr,$srch_bedrooms_arr);
    }
    if($_REQUEST['srch_bathroom']) {
        $is_search = 1;
        $srch_bathroom = $_REQUEST['srch_bathroom'];
        $bathroom_pids_arr = $wpdb->get_col("select post_id from $wpdb->postmeta where meta_key like 'bath_rooms' and meta_value = '$srch_bathroom'");
        $all_pids_arr = array_intersect($all_pids_arr,$bathroom_pids_arr);
    }
    if($_REQUEST['srch_type']) {
        $is_search = 1;
        $srch_type = $_REQUEST['srch_type'];
        $type_pids_arr = $wpdb->get_col("select post_id from $wpdb->postmeta where meta_key like 'property_type' and meta_value = \"$srch_type\"");
        $all_pids_arr = array_intersect($all_pids_arr,$type_pids_arr);
    }
    if($_REQUEST['srch_area']) {
        $is_search = 1;
        $srch_area = $_REQUEST['srch_area'];
        $type_pids_arr = $wpdb->get_col("select post_id from $wpdb->postmeta where meta_key like 'address' and meta_value = \"$srch_area\"");
        $all_pids_arr = array_intersect($all_pids_arr,$type_pids_arr);
    }
    if($_REQUEST['srch_keyword'] && $_REQUEST['srch_keyword']!=CITY_STATE_ZIP_SRCH_TEXT) {
        $is_search = 1;
        $srch_keyword = $_REQUEST['srch_keyword'];
        $srch_keyword_arr = explode(',',$srch_keyword);
        if(count($srch_keyword_arr)==1) {
            $add_city = $srch_keyword;
            $add_state = $srch_keyword;
            $add_zip_code = $srch_keyword;
        }elseif(count($srch_keyword_arr)==2) {
            $add_city = $srch_keyword_arr[0];
            $add_state = $srch_keyword_arr[1];
            $add_zip_code = $srch_keyword_arr[0];
        }elseif(count($srch_keyword_arr)==3) {
            $add_city = $srch_keyword_arr[0];
            $add_state = $srch_keyword_arr[1];
            $add_zip_code = $srch_keyword_arr[2];
        }
        $kw_pids_arr = $wpdb->get_col("select post_id from $wpdb->postmeta where meta_key like 'add_city' and meta_value like \"$add_city\" or meta_key like 'add_state' and meta_value like \"$add_state\" or meta_key like 'add_zip_code' and meta_value like \"$add_zip_code\"");
        $all_pids_arr = array_intersect($all_pids_arr,$kw_pids_arr);
    }
    if($is_search && !$all_pids_arr) {
        $all_pids_arr[0] = 'nopost';
    }
//    if($_REQUEST['srch_property_id']) {
//        $post_ids_str = $_REQUEST['srch_property_id'];
//        $sub_cat_sql .= " and p.ID in ($post_ids_str) ";
//    }
    if($_REQUEST['srch_property_id']) {
        $post_ids_str = $_REQUEST['srch_property_id'];
        /*$sub_cat_sql .= " and p.ID in ($post_ids_str) ";
        $is_search = 1;
        $srch_id = $_REQUEST['srch_property_id'];
        $type_pids_arr = $wpdb->get_col("select post_id from $wpdb->postmeta where meta_key like 'mlsno' and meta_value like '$srch_id'");
        $all_pids_arr = array_intersect($all_pids_arr,$type_pids_arr);*/
        //if(strlen(trim($_REQUEST['srch_property_id']))>0)
            $sub_cat_sql.=" and (select count(*) from wp_postmeta pm where pm.post_id=p.ID and pm.meta_key='mlsno' and meta_value like '%".$_REQUEST["srch_property_id"]."%')";
    }
    else {
        if($all_pids_arr) {
            $post_ids_str = implode(',',$all_pids_arr);
            if($post_ids_str) {
                $sub_cat_sql .= " and p.ID in ($post_ids_str) ";
            }
        }
    }
    $featurecat = get_cat_id_from_name(get_option('ptthemes_featuredcategory'));
    if($featurecat) {
        $srch_feature_pids = $wpdb->get_var("SELECT group_concat(tr.object_id) FROM $wpdb->term_taxonomy tt join $wpdb->term_relationships tr on tr.term_taxonomy_id=tt.term_taxonomy_id where tt.term_id in ($featurecat)");
        $srch_feature_pids = '';
    }
    $blogcat = get_cat_id_from_name(get_option('ptthemes_blogcategory'));
    $blogcatcatids = get_sub_categories($blogcat,'string');
    if($blogcatcatids) {
        $srch_blog_pids = $wpdb->get_var("SELECT group_concat(tr.object_id) FROM $wpdb->term_taxonomy tt join $wpdb->term_relationships tr on tr.term_taxonomy_id=tt.term_taxonomy_id where tt.term_id in ($blogcatcatids)");
    }
    if($srch_blog_pids && $srch_feature_pids) {
        $sub_cat_sql .= " and p.ID not in ($srch_blog_pids,$srch_feature_pids) ";
    }elseif($srch_blog_pids && $srch_feature_pids=='') {
        $sub_cat_sql .= " and p.ID not in ($srch_blog_pids) ";
    }elseif($srch_blog_pids=='' && $srch_feature_pids) {
        $sub_cat_sql .= " and p.ID not in ($srch_feature_pids) ";
    }
    $srch_sql = "select p.* from $wpdb->posts p $post_meta_join where p.post_status='publish' and p.post_type='post'  $sub_cat_sql";
    if($srch_feature_pids) {
        $feature_srch_sql = "select p.* from $wpdb->posts p where p.post_status='publish' and p.post_type='post' and p.ID in ($srch_feature_pids)";
        $srch_sql = " select * from (($feature_srch_sql) union ($srch_sql))";
    }

    $totalpost_count = $wpdb->get_var("select count(p.ID) from $wpdb->posts p $post_meta_join where p.post_status='publish' and p.post_type='post'  $sub_cat_sql");
    global $posts_per_page,$paged;
    if($paged=='') {
        $paged=1;
    }
    $startlimit = $posts_per_page*($paged-1);
    $srch_sql .= "  order by post_date desc limit $startlimit , $posts_per_page";
    $post_info = $wpdb->get_results($srch_sql);
    ?> <!-- contentarea #end -->


    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/jquery.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/functions.js"></script>
<div class="contentarea_home contentarea_home_right">
    <div class="contentarea">
        <div class="content" >
            <div class="latestproperties latestproperties_<?php echo stripslashes(get_option('ptthemes_sidebar_left'));  ?>" style="padding-right: 15px;">
                <h5><img class="contentidoh5" src="<?php bloginfo('template_directory'); ?>/images/ico-top-properties.png"/><span><a href="#" class="switch_thumb"><?php _e(SWITCH_THUMB_TEXT);?></a></span>
                    <?php
                    if($_REQUEST['s'] == 'viewmore') {
                        _e(LATEST_PROPERTIES_TEXT);
                    }
                    elseif(is_category() && $_REQUEST['search']=='') {
                        echo single_cat_title();
                    }elseif($_REQUEST['s'] == 'new_build') {
                        _e("New Builds");
                    }
                    else {
                        //echo __(SEARCH_TEXT). get_search_param();
                        echo get_search_param();
                    }
                    ?></h5>
                <?php if($post_info) { ?>
                <ul class="display ">
                        <?php
                        $count=0;
                        foreach($post_info as $post_info_obj) {
                            $count++;
                            $post = $post_info_obj;
                            get_property_info_li($post);
                            if($count%3==0) {
                                ?>
                    <li class="blank"></li>
                                <?php
                            }
                        }
                        ?>
                </ul>
                    <?php
                }else {
                    _e(NO_PROPERTY_AVAILABLE_MSG);
                    if($_POST['search']=='search') {
                        echo get_search_param();
                    }
                }
                ?>
                <?php if($post_info) { ?>
                <div class="pagination">
                        <?php if (function_exists('wp_pagenavi')) { ?><?php wp_pagenavi(); ?><?php } ?>
                </div>
                    <?php }?>
            </div>

            <?php get_sidebar(); ?>  <!-- sidebar #end -->
        </div></div>
</div>
        <?php get_footer(); ?>
