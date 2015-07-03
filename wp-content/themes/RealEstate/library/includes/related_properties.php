<?php
//seach related property set from the admin panel
$cat_info_arr = get_property_cat_id_name($post->ID);
$zip_code = get_post_meta($post->ID,'add_zip_code',true);
$related_search =get_related_property();
if($related_search == 'Location')
{
	$add_location = get_post_meta($post->ID,'add_location',true);
	$search_string = 'meta_key=add_location&meta_value='.$add_location;
}
else if($related_search == 'Price Range')
{
	
	$price = get_post_meta($post->ID,'price',true);
	$search_string = 'meta_key=price&meta_value='.$price;
	
}
else if($related_search == 'Area')
{
 	$area_val = get_post_meta($post->ID,'area',true);
	$search_string = 'meta_key=area&meta_value='.$area_val;
}
else if($related_search == 'Beds')
{
	$bed_rooms = get_post_meta($post->ID,'bed_rooms',true);
	$search_string = 'meta_key=bed_rooms&meta_value='.$bed_rooms;
	
}
else if($related_search == 'Agent')
{

	$search_string = 'author='.$post->post_author;
}
else if($related_search == 'Zip')
{

	$property_type_val =get_post_meta($post->ID,'property_type',true);
	$search_string = 'meta_key=add_zip_code&meta_value='.$zip_code;
}
else 
{
	$property_type_val =get_post_meta($post->ID,'property_type',true);
	$search_string = 'meta_key=property_type&meta_value='.$property_type_val;
}
$latestcount = get_option('ptthemes_related_property');
if($latestcount == '' || $latestcount < 0)
{
	$latestcount = 3;
}
$post_id=$post->ID;
$search_string=$search_string.'&numberposts='.$latestcount.'&exclude='.$post->ID.'&orderby=rand';
$post_content = get_posts($search_string);
if($post_content)
{
?>
<div class="latestproperties" style="background: none">
	<h5><?php _e(SIMILAR_PROPERTIES_TEXT);?></h5>
	<ul class="display">
	<?php
	foreach($post_content as $key=>$val)
	{
		$post = $val;
		get_property_info_li($post);
	}
	?>
	</ul>
</div>
<?php }?>