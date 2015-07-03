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

	<?php
	if(is_category())
	{
		/*$blogcat = get_cat_id_from_name(get_option('ptthemes_blogcategory'));
		if(is_category($blogcat) || is_sub_category($blogcat))
		{
			require_once (TEMPLATEPATH . '/library/includes/blog_listing.php');
		}else
		{
			require_once (TEMPLATEPATH . '/library/includes/property_listing.php');
		}*/
		
		$propertycategory = get_cat_id_from_name(get_option('ptthemes_propertycategory'));
		if(is_category($propertycategory) || is_sub_category($propertycategory))
		{
			require_once (TEMPLATEPATH . '/library/includes/property_listing.php');
		}else
		{
			require_once (TEMPLATEPATH . '/library/includes/blog_listing.php');
		}
	}
	else
	{
		require_once (TEMPLATEPATH . '/library/includes/blog_listing.php');
	}
	?>
<?php get_footer(); ?>