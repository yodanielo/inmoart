<?php
$prdcat = get_cat_id_from_name(get_option('ptthemes_propertycategory'));
$catidstr = get_sub_categories($prdcat,'string');
$latestcount = get_option('ptthemes_latest_properties');
if($latestcount == '' || $latestcount < 0)
{
	$latestcount = 3;
}
$post_content = get_posts("numberposts=$latestcount&category=$catidstr");
?>
<div class="latestproperties latestproperties_<?php echo stripslashes(get_option('ptthemes_sidebar_left'));  ?>">
<h5><img class="contentidoh5" src="<?php bloginfo('template_directory'); ?>/images/ico-top-properties.png"/><span class="viewmore"><a href="<?php echo get_option('siteurl');?>/index.php?s=viewmore"><?php _e(VIEW_MORE_PROPERTIES_TEXT);?> <img src="<?=bloginfo("template_directory")?>/images/ico-flechita-negro.gif"/></a></span><?php _e(LATEST_PROPERTIES_TEXT);?></h5>
	<ul class="display">
	<?php
	foreach($post_content as $key=>$val)
	{
		$post = $val;
		get_property_info_li($post);
	}
	?>
	</ul>
</div> <!-- latest property #end -->