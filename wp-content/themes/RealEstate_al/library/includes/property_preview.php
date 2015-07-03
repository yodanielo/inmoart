<?php
session_start();
function prt_vacio(&$arreglo,$label,$valor,$despues="",$vacio=""){
    if(strlen(trim(str_replace("-","",$valor)))>0){
        $arreglo[]='<td>'.$label.': <strong>'.$valor.$despues.'</strong></td>';
    }
}
global $upload_folder_path;
if($_POST) {
    echo " ";
    $proprty_name = $_POST['proprty_name'];
    $proprty_price = $_POST['proprty_price'];
    $proprty_mlsno = $_POST['proprty_mlsno'];
    $proprty_location = $_POST['proprty_location'];
    $proprty_label = $_POST['proprty_label'];
    $proprty_address = $_POST['proprty_address'];
    $proprty_city = $_POST['proprty_city'];
    $proprty_state = $_POST['proprty_state'];
    $proprty_garage = $_POST['proprty_garage'];
    $proprty_air = $_POST['proprty_air'];
    $proprty_heating = $_POST['proprty_heating'];
    $proprty_terrace = $_POST['proprty_terrace'];
    $proprty_country = $_POST['proprty_country'];
    $proprty_zip = $_POST['proprty_zip'];
    $proprty_bedroom = $_POST['proprty_bedroom'];
    $proprty_bathroom = $_POST['proprty_bathroom'];
    $proprty_sqft = $_POST['proprty_sqft'];
    $proprty_pricerange = $_POST['proprty_pricerange'];
    $proprty_price = $_POST['proprty_price'];
    $proprty_type = $_POST['proprty_type'];
    $proprty_desc = $_POST['proprty_desc'];
    $proprty_add_feature = $_POST['proprty_add_feature'];
    $proprty_add_coupon = $_POST['proprty_add_coupon'];
    $property_list_type=$_POST['proprty_list_type'];
    $property_view=$_POST['proprty_view'];
    $_SESSION["proprty_list_type"]=$property_list_type;
    $_SESSION['property_info'] = $_POST;
    if($_POST['user_email'] && $_FILES['user_photo']['name']) {
        $src = $_FILES['user_photo']['tmp_name'];
        $dest_path = get_image_phy_destination_path_user().date('Ymdhis')."_".$_FILES['user_photo']['name'];
        $user_photo = image_resize_custom($src,$dest_path,150,150);
        $photo_path = get_image_rel_destination_path_user().$user_photo['file'];
        $_SESSION['property_info']['user_photo'] = $photo_path;
    }
}else {
    echo " ";
    $catid_info_arr = get_property_cat_id_name($_REQUEST['pid']);
    $proprty_pricerange = $catid_info_arr['price']['id'];
    $proprty_location = $catid_info_arr['location']['id'];
    $proprty_label = $catid_info_arr['label']['id'];
    $proprty_type = get_post_meta($_REQUEST['pid'],'property_type',true);
    //$proprty_bedroom = $catid_info_arr['bed']['id'];
    $post_info = get_post_info($_REQUEST['pid']);
    $proprty_name = $post_info['post_title'];
    $proprty_desc = $post_info['post_content'];
    $post_meta = get_post_meta($_REQUEST['pid'], '',false);
    $proprty_address = $post_meta['address'][0];
    $proprty_city = $post_meta['add_city'][0];
    $proprty_state = $post_meta['add_state'][0];
    $proprty_garage = $post_meta['add_garage'][0];
    $proprty_air = $post_meta['add_air'][0];
    $proprty_heating = $post_meta['add_heating'][0];
    $proprty_terrace = $post_meta['add_terrace'][0];
    $proprty_country = $post_meta['add_country'][0];
    $proprty_zip = $post_meta['add_zip_code'][0];
    $proprty_bedroom = $post_meta['bed_rooms'][0];
    $proprty_bathroom = $post_meta['bath_rooms'][0];
    $proprty_price = $post_meta['price'][0];
    $proprty_mlsno = $_POST['proprty_mlsno'];
    $proprty_sqft = $post_meta['area'][0];
    $proprty_add_feature = $post_meta['add_feature'][0];
    if($_REQUEST['pid']) {
        $is_delet_property = 1;
    }
}
?>
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
<div class="contentarea">
<?php include (TEMPLATEPATH . "/library/includes/property_preview_buttons.php");?>

    <h1><?php echo $proprty_name; ?></h1>
    <div class="propertydetails_toplinks" style="display:none">
        <ul>
            <li class="sendtofriend"><a href="#"><?php _e(SEND_TO_FRND_TEXT);?></a></li>
            <li>|</li>
            <li class="addtofav"><img src="<?php bloginfo('template_directory'); ?>/images/ico-corazon.png"/><a href="#"><?php _e(ADD_TO_FAVOURITE_TEXT);?></a></li>
            <li>|</li>
            <li class="print"><a href="#"><?php _e(PRINT_TEXT);?></a></li>
        </ul>
        <div class="sharelisting"><?php _e(SHARE_THIS_LISTING_TEXT);?> <a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/i-icon-listing01.png" alt="" title="" /></a><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/i-icon-listing02.png" alt="" title="" /></a><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/i-icon-listing03.png" alt="" title="" /></a></div>
    </div>
    <div class="propertydetails propertydetails_<?php echo stripslashes(get_option('ptthemes_sidebar_left'));  ?>">
<?php
if($_REQUEST['pid']) {
            $large_img_arr = bdw_get_images($_REQUEST['pid'],'medium');
            $thumb_img_arr = bdw_get_images($_REQUEST['pid'],'thumb');
        }
        if(count($large_img_arr)>0 || count($_SESSION["file_info"])>0) {
            ?>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/image-slideshow.js"> </script>
        <script> var arrow_over_path='<?php bloginfo('template_directory'); ?>/images/'; </script>

        <div id="dhtmlgoodies_slideshow">
            <div id="previewPane">
    <?php
    global $upload_folder_path;
    $tumber=$wpdb->get_var("select option_value from wp_options where option_name='siteurl'");
    $tumber.='/tumber.php?w=638&h=480&src=';
    if($_SESSION["file_info"]) {
        $tmppath = $upload_folder_path.'tmp/';
                        foreach($_SESSION["file_info"] as $image_id=>$val) {

                            $image_src =  get_option('siteurl').'/'.$tmppath.$image_id.'.jpg';
                            break;
                        }
                    }else {
                        $image_src = $thumb_img_arr[0];
                        $large_img_arr = bdw_get_images($_REQUEST['pid'],'medium');
                        $thumb_img_arr = bdw_get_images($_REQUEST['pid'],'thumb');
                        $image_src = $large_img_arr[0];
                    }
                    ?>
                <img src="<?php echo $tumber.$image_src; ?>" width="638"  height="480" >
                <span id="waitMessage">Loading image. Please wait</span>
                <div id="largeImageCaption">1</div>
            </div>
            <div id="galleryContainer">
                <div id="arrow_left"><img src="<?php bloginfo('template_directory'); ?>/images/arrow_left.png"></div>
                <div id="arrow_right"><img src="<?php bloginfo('template_directory'); ?>/images/arrow_right.png"></div>
                <div id="theImages">
                    <!-- Thumbnails -->
    <?php
    $thumb_img_counter = 0;
    if($_SESSION["file_info"]) {
        $thumb_img_counter = $thumb_img_counter+count($_SESSION["file_info"]);
        $image_path = get_image_phy_destination_path();

        $tmppath = "/".$upload_folder_path."tmp/";

                            foreach($_SESSION["file_info"] as $image_id=>$val) {
                                ?>
                    <a href="#" onclick="showPreview('<?php echo get_option('siteurl').$tmppath.$image_id.'.jpg'; ?>','1');return false">
                        <img src="<?php echo get_option('siteurl').$tmppath.$image_id.'.jpg'; ?>" height="80" width="80"></a>
                                <?php
                                $thumb_img_counter++;
                            }
                        }
                        if($thumb_img_arr) {
                            $thumb_img_counter = $thumb_img_counter+count($thumb_img_arr);
                            for($i=0;$i<count($thumb_img_arr);$i++) {
            ?>
                    <a href="#" onclick="showPreview('<?php echo $large_img_arr[$i]; ?>','1');return false"><img src="<?php echo $thumb_img_arr[$i];?>" height="80" width="110"></a>
                                <?php
                            }
                        }

                        if($thumb_img_counter<=5) {
                            ?>
                    <style>#arrow_right,#arrow_left{ display:none;}</style>
                            <?php
                        }
                        ?>
                    <!-- End thumbnails -->

                    <div id="slideEnd"></div>
                </div>
            </div>
        </div>

                        <?php }?>
        <div class="basicinfo">
            <h2 class="home"><img src="<?=bloginfo("template_directory")?>/images/ico-home-information.png" /><div class="featdetail2"><?php echo $proprty_price;?></div><div class="featdetail1">ref.:<?php echo $proprty_mlsno;?></div>&nbsp;&nbsp;<?php _e(BASIC_INFO_TEXT);?></h2>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <?php
                    $celdas=array();
                    prt_vacio($celdas,TYPE_TEXT,$proprty_address,'');
                    prt_vacio($celdas,PRO_STATE_TEXT,$proprty_state,'','No');
                    prt_vacio($celdas,AREA_TEXT,$_POST["proprty_sqft"],' '.get_area_unit(),'');
                    prt_vacio($celdas,AIR_CONDITIONING,$_POST["proprty_air"],'','');
                    prt_vacio($celdas,PLOT_TEXT,$_POST["proprty_city"],'','');
                    prt_vacio($celdas,GARAGE_TEXT,$_POST["proprty_garage"],'','');
                    prt_vacio($celdas,BEDS_TEXT,$proprty_bedroom,'','');
                    prt_vacio($celdas,VIEW_TEXT,$property_view,'','');
                    prt_vacio($celdas,BATHS_TEXT,$proprty_bathroom,'','');
                    prt_vacio($celdas,PRO_LOCATION_TEXT,$proprty_location,'','');
                    prt_vacio($celdas,HEATING,$proprty_heating,'','');
                    prt_vacio($celdas,TERRACE,$proprty_terrace,' '.get_area_unit(),'');
                    $filas=  array_chunk($celdas, 2);
                    foreach($filas as $f){
                        echo '<tr>';
                        echo $f[0];
                        if($f[1])
                            echo $f[1];
                        else
                            echo '<td style="background:none"></td>';
                        echo '</tr>';
                    }
                    ?>
            </table>


            <h2 class="property_desc"><img src="<?=bloginfo("template_directory")?>/images/ico-description.png"/>&nbsp;&nbsp;<?=PRO_DESCRIPTION_TEXT;?> </h2>


<?php echo nl2br($proprty_desc); ?>

        </div>

<?php if($proprty_add_feature) {?>
        <div class="additionalfeatures">
            <h2 class="property_desc"><img style="float:left; margin-left:10px;margin-top:-3px" src="<?=bloginfo("template_directory")?>/images/ico-description.png" />&nbsp;&nbsp;<?= _e(ADD_FEATURE_TEXT);?></h2>
            <p>
    <?php echo nl2br($proprty_add_feature);?>
            </p>
        </div>
    <?php }?>

<?php
$add_arr = array();
/*if($proprty_address)
			{
				$add_arr[] = $proprty_address;
			}*/
if($proprty_city) {
                    $add_arr[] = $proprty_city;
}
if($proprty_state) {
            $add_arr[] = $proprty_state;
}
        if($proprty_country) {
            $add_arr[] = $proprty_country;
        }
        if($proprty_zip) {
            $add_arr[] = $proprty_zip;
        }
        $add_str = '';
        if($add_arr) {
            $add_str = implode('+',$add_arr);
        }
        /*if($add_str) {
            ?>
        <div class="propertymap">
            <h2><?php _e(PROPERYT_MAP_TEXT);?></h2>
            <p>
                <iframe src="http://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=<?php echo $add_str;?>&ie=UTF8&z=14&iwloc=A&output=embed" height="358" width="645"></iframe>
            </p>
        </div>
            <?php }*/?>

    </div>
    <div class="sidebar sidebar_<?php echo stripslashes(get_option('ptthemes_sidebar_left'));  ?>">

        <?php dynamic_sidebar(6);  ?>

    </div>

        <?php include (TEMPLATEPATH . "/library/includes/property_preview_buttons.php");?>

</div>
</div><!--cntentareahome #end-->
</div><!--wrapper #end-->
        <?php get_footer(); ?>