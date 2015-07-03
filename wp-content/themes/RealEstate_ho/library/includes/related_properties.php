<?php
//seach related property set from the admin panel
$cat_info_arr = get_property_cat_id_name($post->ID);
$zip_code = get_post_meta($post->ID, 'add_zip_code', true);
$rs = get_related_property();
//sin clasificar

$propertycategory = get_cat_id_from_name(get_option('ptthemes_propertycategory'));
$propertycategorys = get_sub_categories($propertycategory, 'string');
$all_pids_arr = $wpdb->get_var("SELECT group_concat(ID) FROM $wpdb->posts where post_status='publish'");
$all_pids_arr = $wpdb->get_col("SELECT tr.object_id FROM $wpdb->term_taxonomy tt join $wpdb->term_relationships tr on tr.term_taxonomy_id=tt.term_taxonomy_id where tt.term_id in ($propertycategorys)");

//clasificar por tipo
if ($rs["add_location_related"] == 1 || $rs["property_type_related"]==1) {
    $property_type_val = get_post_meta($post->ID, 'property_type', true);
    $type_pids_arr = $wpdb->get_col("select post_id from $wpdb->postmeta where meta_key like 'property_type' and meta_value = \"$property_type_val\" and post_id!=".$post->ID);
    $all_pids_arr = array_intersect($all_pids_arr, $type_pids_arr);
}

if ($rs["price_related"] == 1) {
    //otener rangos
    $property_type_val = get_post_meta($post->ID, 'price', true);
    $option_value = get_option('mysite_general_settings');
    $area_dl_params = explode(',',stripslashes($option_value['price_srch_setting']));
    $property_type_val=str_replace(".", ",", str_replace(".", "", $property_type_val));
        $sqlstr="";
    foreach($area_dl_params as $a){
        $a=str_replace(".", ",", str_replace(".", "", $a));
        $a=str_replace("+", "from ",$a);
        $b=explode("to",$a);
        if(floatval($property_type_val)<floatval(trim(str_replace("from","",$b[0]))) && floatval($b[1])>0){
            $sqlstr.=" and replace(replace(meta_value,'.',''),',','.') < ".floatval($b[1]);
        }
        if(floatval($property_type_val)>floatval(str_replace("from","",$b[0]))){
            $sqlstr.=" and replace(replace(meta_value,'.',''),',','.') > ".floatval(str_replace("from","",$b[0]));
        }
    }
    //clasificar por precio
    $type_pids_arr = $wpdb->get_col("select post_id from $wpdb->postmeta where meta_key like 'price' $sqlstr and post_id!=".$post->ID);
    $all_pids_arr = array_intersect($all_pids_arr, $type_pids_arr);
}

if ($rs["area_related"] == 1) {
    //clasificar por habitaciones
    $property_type_val = get_post_meta($post->ID, 'area', true);
    $type_pids_arr = $wpdb->get_col("select post_id from $wpdb->postmeta where meta_key like 'area' and meta_value = \"$property_type_val\" and post_id!=".$post->ID);
    $all_pids_arr = array_intersect($all_pids_arr, $type_pids_arr);
}

if ($rs["bed_rooms_related"] == 1) {
    //clasificar por habitaciones
    $property_type_val = get_post_meta($post->ID, 'bed_rooms', true);
    $type_pids_arr = $wpdb->get_col("select post_id from $wpdb->postmeta where meta_key like 'bed_rooms' and meta_value = \"$property_type_val\" and post_id!=".$post->ID);
    $all_pids_arr = array_intersect($all_pids_arr, $type_pids_arr);
}

$latestcount = get_option('ptthemes_related_property');
if ($latestcount == '' || $latestcount < 0) {
    $latestcount = 3;
}
$post_id = $post->ID;
//$search_string=$search_string.'&numberposts='.$latestcount.'&exclude='.$post->ID.'&orderby=rand';
$sql = "select * from $wpdb->posts where post_status='publish' and id in (" . implode(",", $all_pids_arr) . ") and id!=" . $post->ID . " order by post_date desc limit $latestcount";
$post_content = $wpdb->get_results($sql);

if ($post_content) {
?>
    <div class="latestproperties" style="background: none">
        <h5><?php _e(SIMILAR_PROPERTIES_TEXT); ?></h5>
        <ul class="display">
        <?php
        foreach ($post_content as $key => $val) {
            $post = $val;
            get_property_info_li($post);
        }
        ?>
    </ul>
</div>
<?php } ?>