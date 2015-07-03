<?php get_header(); ?>
<div class="clearfix container_border searchbar">
    <div class="breadcrumbs">
        <p><?php if ( get_option( 'ptthemes_breadcrumbs' )) {
    yoast_breadcrumb('','');
} ?></p>
        <span class="findproperties" onclick="show_hide_propertysearchoptions();"><a href="javascript:void(0);"><?php _e(FIND_PROPERTIES_TEXT);?><img src="<?=bloginfo("template_directory")?>/images/ico-find-properties.png"/></a></span>
    </div>
</div>
<?php require_once (TEMPLATEPATH . '/library/includes/search.php');  ?>
<!-- search end -->
<div class="wrapper" >
    <div class="contentarea_home contentarea_home_right">
        <?php
        $post_type = '';
        /*$property_all_catids_str =  get_property_all_cat_ids();
if($property_all_catids_str)
{
	$property_all_catids_arr = explode(',',$property_all_catids_str);
}*/
        $propertycat = get_cat_id_from_name(get_option('ptthemes_propertycategory'));
        $propertycatcatids = get_sub_categories($propertycat,'string');
        if($propertycatcatids) {
            $property_catids_arr = explode(',',$propertycatcatids);
        }
        if(have_posts()) {
            while(have_posts()) {
                the_post();
                $cagInfo = get_the_category();
                $catid_arr = array();
                foreach($cagInfo as $cagInfo_obj) {
                    $catid_arr[] = $cagInfo_obj->term_id;
                }
                //$is_in_property_arr = array_intersect($property_all_catids_arr,$catid_arr);
                $is_in_property_arr = array_intersect($property_catids_arr,$catid_arr);
                if(count($is_in_property_arr)>0) {
                    $post_type = 'property';
                }else {
                    $post_type = 'blog';
                }
            }
        }
        if($post_type == 'blog') {
            require_once (TEMPLATEPATH . '/library/includes/blog_detail.php');
        }
        elseif($post_type == 'property') {
            require_once (TEMPLATEPATH . '/library/includes/property_detail.php');
        }
        ?>
    </div>
</div><!--cerrar el contentarea-->
        <?php get_footer(); ?>