<?php
session_start();
ob_start();
global $userdata;
if($_REQUEST['backandedit']) {
}else {
    $_SESSION['property_info'] = array();
}
if(!is_user_can_add_property() || intval($userdata->ID)!=1) {
    wp_redirect(get_option('siteurl'));
}
if(!$userdata->ID) {
    wp_redirect(get_settings('home').'/index.php?page=login');
    exit;
}
if($_REQUEST['pid']) {
    if(!$userdata->ID) {
        wp_redirect(get_settings('home').'/index.php?page=login');
        exit;
    }
    $proprty_type = $catid_info_arr['type']['id'];
    $post_info = get_post_info($_REQUEST['pid']);
    $proprty_name = $post_info['post_title'];
    $proprty_desc = $post_info['post_content'];
    $post_meta = get_post_meta($_REQUEST['pid'], '',false);
    $proprty_type = $post_meta['property_type'][0];
    $proprty_address = $post_meta['address'][0];
    $proprty_city = $post_meta['add_city'][0];
    $proprty_state = $post_meta['add_state'][0];
    $proprty_garage = $post_meta['add_garage'][0];
    $proprty_air = $post_meta['add_air'][0];
    $proprty_country = $post_meta['add_country'][0];
    $proprty_zip = $post_meta['add_zip_code'][0];
    $proprty_bedroom = $post_meta['bed_rooms'][0];
    $proprty_bathroom = $post_meta['bath_rooms'][0];
    $proprty_price = $post_meta['price'][0];
    $proprty_view = $post_meta['view'][0];
    $proprty_sqft = $post_meta['area'][0];
    $proprty_heating = $post_meta['add_heating'][0];
    $proprty_terrace = $post_meta['add_terrace'][0];
    $proprty_add_feature = $post_meta['add_feature'][0];
    $proprty_sqft = $post_meta['area'][0];
    $proprty_mlsno = $post_meta['mlsno'][0];
    $proprty_add_coupon = $post_meta['proprty_add_coupon'][0];
    $proprty_location = $post_meta['add_location'][0];
    $proprty_label = $post_meta['add_label'][0];
    $property_list_type = get_post_meta($_REQUEST['pid'],'list_type',true);
    $thumb_img_arr = bdw_get_images_with_info($_REQUEST['pid'],'thumb');
}elseif($_SESSION['property_info']) {
    $proprty_pricerange = $_SESSION['property_info']['proprty_pricerange'];
    $proprty_location = $_SESSION['property_info']['proprty_location'];
    $proprty_label = $_SESSION['property_info']['proprty_label'];
    $proprty_type = $_SESSION['property_info']['proprty_type'];
    $proprty_bedroom = $_SESSION['property_info']['proprty_bedroom'];
    $proprty_name = $_SESSION['property_info']['proprty_name'];
    $proprty_desc = $_SESSION['property_info']['proprty_desc'];
    $proprty_address = $_SESSION['property_info']['proprty_address'];
    $proprty_city = $_SESSION['property_info']['proprty_city'];
    $proprty_state = $_SESSION['property_info']['proprty_state'];
    $proprty_garage = $_SESSION['property_info']['proprty_garage'];
    $proprty_heating = $_SESSION['property_info']['proprty_heating'];
    $proprty_terrace = $_SESSION['property_info']['proprty_terrace'];
    $proprty_air = $_SESSION['property_info']['proprty_air'];
    $proprty_country = $_SESSION['property_info']['proprty_country'];
    $proprty_zip = $_SESSION['property_info']['proprty_zip'];
    $proprty_bathroom = $_SESSION['property_info']['proprty_bathroom'];
    $proprty_price = $_SESSION['property_info']['proprty_price'];
    $proprty_view = $_SESSION['property_info']['proprty_view'];
    $proprty_sqft = $_SESSION['property_info']['proprty_sqft'];
    $proprty_add_feature = $_SESSION['property_info']['proprty_add_feature'];
    $proprty_sqft = $_SESSION['property_info']['proprty_sqft'];
    $proprty_mlsno = $_SESSION['property_info']['proprty_mlsno'];
    $user_fname = $_SESSION['property_info']['user_fname'];
    $user_city = $_SESSION['property_info']['user_city'];
    $user_state = $_SESSION['property_info']['user_state'];
    $user_phone = $_SESSION['property_info']['user_phone'];
    $user_email = $_SESSION['property_info']['user_email'];
    $user_web = $_SESSION['property_info']['user_web'];
    $user_twitter = $_SESSION['property_info']['user_twitter'];
    $user_photo = $_SESSION['property_info']['user_photo'];
    $description = $_SESSION['property_info']['description'];
    $proprty_add_coupon = $_SESSION['property_info']['proprty_add_coupon'];
    $user_login_or_not = $_SESSION['property_info']['user_login_or_not'];
}
if($_REQUEST['renew']) {
    $property_list_type = get_post_meta($_REQUEST['pid'],'list_type',true);
}
?>
<?php get_header(); ?>
<?php
if($_REQUEST['pid']) {
    if($_REQUEST['renew']) {
        $page_title = RENEW_PROPERTY_TEXT;
    }else {
        $page_title = EDIT_PROPERTY_TEXT;
    }
}else {
    $page_title = SUBMIT_PROPERTY_TEXT;
}
?>
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

            <div id="content" class="content_<?php echo stripslashes(get_option('ptthemes_sidebar_left'));  ?>">

                <h1 class="page_head submit_head" style="margin-top: -10px;"> <?php _e($page_title);?>  </h1>

                <?php if(is_allow_user_register()) {?>
                <p class="note fr"> <span class="required">*</span> <?php _e(INDICATES_MANDATORY_FIELDS_TEXT);?> </p>
                    <?php
                    if($_REQUEST['emsg']==1) {
                        ?>
                <div class="sucess_msg"><?php echo INVALID_USER_PW_MSG;?></div>
                        <?php
                    }
                    ?>

                    <?php
                    if($userdata->ID=='') {
                        ?>
                <div class="form_row clearfix">
                    <label><?php _e(IAM_TEXT);?> </label>
                    <span class="fl user_define"> <input name="user_login_or_not" type="radio" value="existing_user" <?php if($user_login_or_not=='existing_user') {
                                    echo 'checked="checked"';
                                                                 }?> checked onClick="set_login_registration_frm(this.value);" /> <?php _e(EXISTING_USER_TEXT);?> </span>
                    <span class="fl user_define"> <input name="user_login_or_not" type="radio" value="new_user" <?php if($user_login_or_not=='new_user') {
                                    echo 'checked="checked"';
                                                                 }?> onClick="set_login_registration_frm(this.value);" /> <?php _e(NEW_USER_TEXT);?> </span>
                </div>

                <div class="login_submit clearfix" id="login_user_frm_id">
                    <form name="loginform" id="loginform" action="<?php echo get_settings('home').'/index.php?page=login'; ?>" method="post" >
                        <div class="form_row ">
                            <label><?php _e(LOGIN_TEXT);?>  <span>*</span> </label>
                            <input type="text" class="textfield " id="user_login" name="log" />
                        </div>

                        <div class="form_row ">
                            <label><?php _e(PASSWORD_TEXT);?>  <span>*</span> </label>
                            <input type="password" class="textfield " id="user_pass" name="pwd" />
                        </div>
                        <input name="submit" type="submit" value="<?php _e(SUBMIT_BUTTON);?>" class="btn_input_highlight_more btn_spacer btnsubmitproperty" />
                                <?php	$login_redirect_link = get_settings('home').'/?page=property_submit';?>
                        <input type="hidden" name="redirect_to" value="<?php echo $login_redirect_link; ?>" />
                        <input type="hidden" name="testcookie" value="1" />
                        <input type="hidden" name="pagetype" value="<?php echo $login_redirect_link; ?>" />
                    </form>
                </div>
                        <?php }?>
                    <?php }?>
                <?php
                $form_action_url = get_ssl_normal_url(get_option( 'siteurl' ).'/?page=preview',$_REQUEST['pid']);
                ?>
                <form name="propertyform" id="propertyform" action="<?php echo $form_action_url; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="user_login_or_not" id="user_login_or_not" value="<?php echo $user_login_or_not;?>" />
                    <input type="hidden" name="pid" value="<?php echo $_REQUEST['pid'];?>" />
                    <input type="hidden" name="renew" value="<?php echo $_REQUEST['renew'];?>" />
                    <?php
                    if($property_list_type) {
                        ?>
                    <input type="hidden" name="property_list_type" value="<?php echo $property_list_type;?>" />
                        <?php
                    }
                    ?>
                    <h5 class="form_title"> <?php _e(PROPERTY_INFO_TEXT);?></h5>

                    <div class="form_row clearfix">
                        <label><?php _e(PROPERTY_TITLE_TEXT);?> <span>*</span> </label>
                        <input type="text" name="proprty_name" id="proprty_name" maxlength="38" class="textfield" value="<?php echo esc_attr(stripslashes($proprty_name)); ?>" size="25"  />
                        <span class="message_error2"   id="proprty_name_span" style="display:none"><?=ENTER_PROPERTY_NAME?></span>
                        <?php /*?><input name="" type="text" class="textfield error" />
                <span class="error_msg">Please Enter Username </span><?php */?>
                    </div>

                    <div class="form_row clearfix">
                        <label><?php _e(TYPE_TEXT); ?></label>
                        <select name="proprty_type" id="proprty_type" class="select_s">
                            <option <?=(esc_attr(stripslashes($proprty_type))=="Sale"?"Selected":"")?> value="Sale"><?php _e(SALE_TEXT);?></option>
                            <option <?=(esc_attr(stripslashes($proprty_type))=="Rent"?"Selected":"")?> value="Rent"><?php _e(RENT_TEXT);?></option>
                            <option <?=(esc_attr(stripslashes($proprty_type))=="New Build"?"Selected":"")?> value="New Build"><?php _e(NEWBUILD_TEXT);?></option>
                        </select>
                        
                    </div>

                    <div class="form_row clearfix">
                        <label><?php _e(PRO_PRICE_TEXT);
                            if(get_currency_sym()) {
                                echo " (IN ".get_currency_type().")";
                            }?> <span>*</span></label>
                        <input type="text" name="proprty_price" id="proprty_price" class="textfield" value="<?php echo esc_attr(stripslashes($proprty_price)); ?>" />
                        <span class="message_error2"   id="proprty_price_span" style="display:none"><?=ENTER_PRICE?></span>
                    </div>

                    <div class="form_row clearfix">
                        <label> <?php _e(BEDROOMS_TEXT);?> <span>*</span></label>
                        <select name="proprty_bedroom" id="proprty_bedroom" class="select_s">
                            <option value=""><?php _e(SELECT_BEDROOMS_TEXT);?></option>
                            <?php echo get_bedroom_dl($proprty_bedroom);?>
                            <?php //echo get_category_dropdown_options(get_cat_id_from_name(get_option('ptthemes_bedroomcategory')),$proprty_bedroom);?>
                        </select>
                        <span class="message_error2"   id="proprty_bedroom_span" style="display:none"><?=ENTER_BEDROOM?></span>
                    </div>

                    <div class="form_row clearfix">
                        <label><?php _e(BATHROOMS_TEXT);?> </label>
                        <select name="proprty_bathroom" id="proprty_bathroom" class="select_s">
                            <option value=""><?php _e(SELECT_BATHROOMS_TEXT);?></option>
                            <?php get_bathroom_dl($proprty_bathroom);?>
                        </select>
                    </div>


                    <div class="form_row clearfix">
                        <label><?php _e(AREA_TEXT);
                            echo ' ( '.get_area_unit().' )';?>  <span>*</span> </label>
                        <input type="text" name="proprty_sqft" id="proprty_sqft" class="textfield" value="<?php echo esc_attr(stripslashes($proprty_sqft)); ?>"  />
                        <span class="message_error2"   id="proprty_sqft_span" style="display:none"><?=ENTER_AREA?></span>
                    </div>


                    <div class="form_row clearfix">
                        <label><?php _e(MLS_NO_TEXT);?>   </label>
                        <input type="text" name="proprty_mlsno" id="proprty_mlsno" class="textfield" value="<?php echo esc_attr(stripslashes($proprty_mlsno)); ?>"  />
                    </div>


                    <h5 class="form_title"> <?php _e(PRO_PHOTO_TEXT);?></h5>

                    <div class="form_row clearfix">
                        <label><?php _e(PHOTOES_BUTTON);?></label>
                        <?php include (TEMPLATEPATH . "/library/includes/image_uploader.php"); ?>

                    </div>


                    <h5 class="form_title"> <?php _e(GENERAL_PROPERTY_INFO_TEXT);?></h5>

                    <div class="form_row clearfix">
                        <label><?php _e(PRO_LOCATION_TEXT);?> <span>*</span></label>
                        <select name="proprty_location" id="proprty_location" class="select_s">
                            <option value=""><?php _e(SELECT_LOCATION_TEXT);?></option>
                            <?php echo get_location_dl($proprty_location);?>
                            <?php //echo get_category_dropdown_options(get_cat_id_from_name(get_option('ptthemes_locationcategory')),$proprty_location);?>
                        </select>
                        <span class="message_error2"   id="proprty_location_span" style="display:none"><?=ENTER_LOCATION?></span>
                    </div>

                    <div class="form_row clearfix">
                        <label><?php _e(TYPE_TEXT); ?><span>*</span></label>
                        <!--<input type="text" name="proprty_address" id="proprty_address" class="textfield" value="<?php echo esc_attr(stripslashes($proprty_address)); ?>"   />-->
                        <?php
                        $addressoptions="";
                        $res=explode("\n",get_option("ptthemes_type_options"));
                        if(count($res)>0)
                            foreach($res as $r) {
                                if(trim($r)!="")
                                    $addressoptions.='<option '.(trim($r)==$proprty_address?"selected":"").' value="'.trim($r).'">'.trim($r).'</option>';
                            }
                        ?>
                        <select name="proprty_address" id="proprty_address" class="select_s">
                            <?=$addressoptions?>
                            <!--<option value="Piso">Piso</option>
                            <option value="Villa">Villa</option>
                            <option value="Apartamento">Apartamento</option>
                            <option value="Chalet">Chalet</option>
                            <option value="Casa">Casa</option>-->
                        </select>
                        <span class="message_error2"   id="proprty_address_span" style="display:none"><?=ENTER_TYPE?></span>
                    </div>


                    <div class="form_row clearfix">
                        <label><?php _e(VIEW_TEXT); ?></label>
                        <?php
                        $viewoptions='<option value="">'.SELECT_VIEW_TEXT.'</option>';
                        $res=explode("\n",get_option("ptthemes_view_options"));
                        if(count($res)>0)
                            foreach($res as $r) {
                                if(trim($r)!="")
                                    $viewoptions.='<option '.(trim($r)==$proprty_view?"selected":"").' value="'.trim($r).'">'.trim($r).'</option>';
                            }
                        ?>
                        <select name="proprty_view" id="proprty_view" class="select_s">
                            <?=$viewoptions?>
                        </select>
                        <span class="message_error2"   id="proprty_view_span" style="display:none"><?=ENTER_VIEW?></span>
                    </div>

                    <div class="form_row clearfix">
                        <label><?php _e(PRO_CITY_TEXT);?> <span></span> </label>
                        <input type="text" name="proprty_city" id="proprty_city" class="textfield" value="<?php echo esc_attr(stripslashes($proprty_city)); ?>"  />
                        <span class="message_error2"   id="proprty_city_span" style="display:none"><?=ENTER_CITY?></span>
                    </div>


                    <div class="form_row clearfix">
                        <label><?php _e(PRO_STATE_TEXT);?> <span></span> </label>
                        <input type="text" name="proprty_state" id="proprty_state" class="textfield" value="<?php echo esc_attr(stripslashes($proprty_state)); ?>" />
                        <span class="message_error2"   id="proprty_state_span" style="display:none"><?=ENTER_POOL?></span>
                    </div>
                    <div class="form_row clearfix">
                        <label><?php _e(GARAGE_TEXT);?> </label>
                        <input type="text" name="proprty_garage" id="proprty_garage" class="textfield" value="<?php echo esc_attr(stripslashes($proprty_garage)); ?>" />
                        <span class="message_error2"   id="proprty_garage_span" style="display:none"></span>
                    </div>
                    <div class="form_row clearfix">
                        <label><?php _e(AIR_CONDITIONING);?> </label>
                        <input type="text" name="proprty_air" id="proprty_air" class="textfield" value="<?php echo esc_attr(stripslashes($proprty_air)); ?>" />
                        <span class="message_error2"   id="proprty_air_span" style="display:none"></span>
                    </div>
                    <div class="form_row clearfix">
                        <label><?php _e(HEATING);?> <span></span> </label>
                        <input type="text" name="proprty_heating" id="proprty_heating" class="textfield" value="<?php echo esc_attr(stripslashes($proprty_heating)); ?>" />
                        <span class="message_error2"   id="proprty_heating_span" style="display:none"></span>
                    </div>
                    <div class="form_row clearfix">
                        <label><?php _e(TERRACE);?> <span></span> </label>
                        <input type="text" name="proprty_terrace" id="proprty_terrace" class="textfield" value="<?php echo esc_attr(stripslashes($proprty_terrace)); ?>" />
                        <span class="message_error2"   id="proprty_terrace_span" style="display:none"></span>
                    </div>
                    <div class="form_row clearfix " style="display:none">
                        <label><?php _e(PRO_COUNTRY_TEXT) ?> <span>*</span></label>
                        <input type="text" name="proprty_country" id="proprty_country" class="textfield" value="<?php echo esc_attr(stripslashes($proprty_country)); ?>"  />
                        <span class="message_error2"   id="proprty_country_span" style="display:none"><?=ENTER_COUNTRY?></span>
                    </div>

                    <div class="form_row clearfix" style="display:none">
                        <label><?php _e(PRO_ZIP_TEXT);?> <span>*</span> </label>
                        <input type="text" name="proprty_zip" id="proprty_zip" class="textfield" value="<?php echo esc_attr(stripslashes($proprty_zip)); ?>" />
                        <span class="message_error2"   id="proprty_zip_span" style="display:none"></span>
                    </div>

                    <div class="form_row clearfix">
                        <label><?php _e(PRO_DESCRIPTION_TEXT);?> <span>*</span> </label>
                        <textarea  name="proprty_desc" id="proprty_desc" class="textarea" ><?php echo esc_attr(stripslashes($proprty_desc)); ?></textarea>
                        <span class="message_note"><?php _e(HTML_TAGS_ALLOW_MSG);?></span>
                        <span class="message_error2"   id="proprty_desc_span" style="display:none"><?=ENTER_DESCRIPTION?></span>
                    </div>


                    <div class="form_row clearfix">
                        <label><?php _e(PRO_ADD_FEATURES_TEXT);?> </label>
                        <textarea  name="proprty_add_feature" id="proprty_add_feature"  class="textarea" ><?php echo esc_attr(stripslashes($proprty_add_feature)); ?></textarea>
                        <span class="message_note"><?php _e(HTML_TAGS_ALLOW_MSG);?></span>
                    </div>

                    <?php if($_REQUEST['pid']=='' || 1==1) {?>

                        <?php
                        $property_price_info = get_property_price_info();
                        if($property_price_info) {
                            ?>
                    <h5 class="form_title" style="display:none" > <?php _e(GENERAL_PROPERTY_INFO_TEXT);?></h5>
                    <div class="form_row clearfix">
                        <label><?php _e(LIST_TYPE_TEXT);?> </label>
                        <!--<select id="property_list_type" name="property_list_type" class="select_s" onchange="show_value_hide(this.value);">-->
                        <select id="property_list_type" name="property_list_type" class="select_s">
                                    <?php for($p=0;$p<count($property_price_info);$p++) {?>
                            <option <?=($property_price_info[$p]['title']==$property_list_type?"selected":"")?> value="<?php echo $property_price_info[$p]['title'];?>"><?php echo $property_price_info[$p]['title'];?></option>
                                        <?php
                                    }
                                    ?>
                        </select>

<!--<p class="highlight_message" id="property_submit_price_id">
<span id="<?php echo 'span_'.$property_price_info[0]['title'];?>"> <?php echo get_currency_sym();?><?php echo $property_price_info[0]['price'];?> (for <?php echo $property_price_info[0]['days'];?><?php echo $property_price_info[0]['day_type'];?>)</span>
</p>
<p class="highlight_message" style="display:none">
                                <?php for($p=0;$p<count($property_price_info);$p++) {?>
<span id="<?php echo 'span_'.$property_price_info[$p]['title'];?>"> <?php echo get_currency_sym();?><?php echo $property_price_info[$p]['price'];?> (for <?php echo $property_price_info[$p]['days'];?><?php echo $property_price_info[$p]['day_type'];?>)</span>
                                    <?php }?>
</p>-->
                    </div>
                    <div class="form_row clearfix">
                        <label><?php _e(SELECT_LABEL_TEXT);?> </label>
                        <select name="proprty_label" id="proprty_label" class="select_s">

                                    <?php echo get_label_dl($proprty_label);?>
                                    <?php //echo get_category_dropdown_options(get_cat_id_from_name(get_option('ptthemes_locationcategory')),$proprty_location);?>
                        </select>
                        <span class="message_error2"   id="proprty_label_span" style="display:none"></span>
                    </div>
                            <?php if(get_option('is_allow_coupon_code')) {?>
                    <div class="form_row clearfix">
                        <label><?php _e(PRO_ADD_COUPON_TEXT);?> </label>
                        <input type="text" name="proprty_add_coupon" id="proprty_add_coupon" class="textfield" value="<?php echo esc_attr(stripslashes($proprty_add_coupon)); ?>" />
                    </div>
                                <?php }?>
                            <?php }?>
                        <?php }elseif(in_category(get_cat_id_from_name(get_option('ptthemes_featuredcategory')),$_REQUEST['pid']) && $_REQUEST['renew']=='') {
                        ?>
                    <h5 class="form_title"> <?php _e(GENERAL_PROPERTY_INFO_TEXT);?></h5>
                    <div class="form_row clearfix">
                        <label><?php _e(IS_A_FEATURE_PRO_TEXT);?></label>
                        <p><input type="radio" name="remove_feature" value="1" />Yes <input type="radio" name="remove_feature" value="0" checked="checked" />No</p></div>
                        <?php
                    }

                    ?>
                    <script language="javascript">
                        function show_value_hide(val)
                        {
                            document.getElementById('property_submit_price_id').innerHTML = document.getElementById('span_'+val).innerHTML;
                        }
                    </script>
                    <?php
                    if($userdata->ID=='') {
                        ?>
                    <div id="contact_detail_id" style="display:none;">
                        <h5 class="form_title"><?php _e(CONTACT_DETAIL_TITLE); ?></h5>

                        <div class="form_row clearfix">
                            <label><?php _e(CONTACT_NAME_TEXT); ?></label>
                            <input name="user_fname" id="user_fname" value="<?php echo $user_fname;?>" type="text" class="textfield" />
                        </div>

                        <div class="form_row clearfix">
                            <label><?php _e(CITY_TEXT); ?></label>
                            <input name="user_city" id="user_city" value="<?php echo $user_city;?>" type="text" class="textfield" />
                        </div>

                        <div class="form_row clearfix">
                            <label><?php _e(STATE_TEXT); ?></label>
                            <input name="user_state" id="user_state" value="<?php echo $user_state;?>" type="text" class="textfield" />
                        </div>

                        <div class="form_row clearfix">
                            <label><?php _e(MOBILE_TEXT); ?></label>
                            <input  name="user_phone" id="user_phone" value="<?php echo $user_phone;?>" type="text" class="textfield" />
                        </div>

                        <div class="form_row clearfix">
                            <label><?php _e(EMAIL_TEXT); ?></label>
                            <input name="user_email" id="user_email" value="<?php echo $user_email;?>" type="text" class="textfield" />
                        </div>

                        <div class="form_row clearfix">
                            <label><?php _e(WEBSITE_TEXT); ?></label>
                            <input name="user_web" id="user_web" value="<?php echo $user_web;?>" type="text" class="textfield" />
                        </div>


                        <div class="form_row clearfix">
                            <label><?php _e(TWITTER_TEXT); ?></label>
                            <input name="user_twitter" id="user_twitter" value="<?php echo $user_twitter;?>" type="text" class="textfield" />
                        </div>

                        <div class="form_row clearfix">
                            <label><?php _e(PHOTO_TEXT); ?></label>
                            <input name="user_photo" id="user_photo" type="file" class="textfield"  />
                            <span class="message_note"><?php _e(IMAGE_TYPE_MSG);?></span>
                                <?php if($user_photo) {
                                    ?>
                            <img src="<?php echo $user_photo;?>" height="70" width="70" border="0" />
                                    <?php
                                }?>
                        </div>

                        <div class="form_row clearfix">
                            <label><?php _e(BIODATA_TEXT); ?></label>
                            <textarea name="description" id="description" cols="" rows="" class="textarea" ><?php echo $description;?></textarea>
                        </div>
                    </div>
                        <?php }?>

                    <input type="submit" name="Update" value="<?php _e(PRO_PREVIEW_BUTTON);?>" class="btn_input_highlight_more btn_spacer btnsubmitproperty" />
                </form>
            </div> <!-- content #end -->


            <div class="sidebar sidebar_<?php echo stripslashes(get_option('ptthemes_sidebar_left'));  ?>">
                <div class="sidebar_top">
                    <div class="sidebar_bottom clearfix">
                        <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(6) )  ?>
                    </div>
                </div>
            </div>

        </div>
    </div><!--cntentareahome #end-->
</div><!--wrapper #end-->
<script language="javascript" type="text/javascript">
    function set_login_registration_frm(val)
    {
        if(val=='existing_user')
        {
            document.getElementById('contact_detail_id').style.display = 'none';
            document.getElementById('login_user_frm_id').style.display = '';
            document.getElementById('user_login_or_not').value = val;
        }else  //new_user
        {
            document.getElementById('contact_detail_id').style.display = '';
            document.getElementById('login_user_frm_id').style.display = 'none';
            document.getElementById('user_login_or_not').value = val;
        }
    }
<?php if($user_login_or_not) {
    ?>
        set_login_registration_frm('<?php echo $user_login_or_not;?>');
    <?php
}
?>
</script>
<script type="text/javascript">
    jQuery("#propertyform select").msDropDown();
</script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/property_validation.js"></script> 
<!-- POP UP  -->

<?php get_footer(); ?>
