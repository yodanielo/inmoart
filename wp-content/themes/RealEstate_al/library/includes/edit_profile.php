<?php
session_start();
ob_start();
if(!$current_user->data->ID) {
    wp_redirect(get_settings('home').'/index.php?page=login');
    exit;
}
global $wpdb;

if($_POST) {
    if($_REQUEST['chagepw']) {
        $new_passwd = $_POST['new_passwd'];
        if($new_passwd) {
            $user_id = $current_user->data->ID;
            wp_set_password($new_passwd, $user_id);
            $message1 = PW_CHANGE_SUCCESS_MSG;
        }
    }else {
        $user_id = $current_user->data->ID;
        $user_add1 = $_POST['user_add1'];
        $user_add2 = $_POST['user_add2'];
        $user_city = $_POST['user_city'];
        $user_state = $_POST['user_state'];
        $user_country = $_POST['user_country'];
        $user_postalcode = $_POST['user_postalcode'];
        $user_web = $_POST['user_web'];
        $user_twitter = $_POST['user_twitter'];
        $description = $_POST['description'];
        $user_photo = $_POST['user_photo'];

        //code to upload file

        $user_address_info = array(
                "user_add1"		=> $user_add1,
                "user_add2"		=> $user_add2,
                "user_city"		=> $user_city,
                "user_state"	=> $user_state,
                "user_country"	=> $user_country,
                "user_postalcode"=> $user_postalcode,
                "user_phone" 	=>	$_POST['user_phone'],
                "user_twitter"	=> $user_twitter,
                "description"	=> addslashes($description),
        );

        if($_FILES['user_photo']['name']) {
            $src = $_FILES['user_photo']['tmp_name'];
            $dest_path = get_image_phy_destination_path_user().date('Ymdhis')."_".$_FILES['user_photo']['name'];
            $user_photo = image_resize_custom($src,$dest_path,150,150);
            $photo_path = get_image_rel_destination_path_user().$user_photo['file'];
            $user_address_info['user_photo'] = $photo_path;
        }
        foreach($user_address_info as $key=>$val) {
            update_usermeta($user_id, $key, $val); // User Address Information Here
        }
        $userName = $_POST['user_fname'].' '.$_POST['user_lname'];
        $updateUsersql = "update $wpdb->users set user_url=\"$user_web\", display_name=\"$userName\"  where ID=\"$user_id\"";
        $wpdb->query($updateUsersql);
        $_SESSION['session_message'] = INFO_UPDATED_SUCCESS_MSG;
        wp_redirect(get_option( 'siteurl' ).'/?page=profile');
        exit;
    }
}

$user_address_info = $current_user->data;
$user_add1 = $user_address_info->user_add1;
$user_add2 = $user_address_info->user_add2;
$user_city = $user_address_info->user_city;
$user_state = $user_address_info->user_state;
$user_country = $user_address_info->user_country;
$user_postalcode = $user_address_info->user_postalcode;
$user_phone = $user_address_info->user_phone;
$user_twitter = $user_address_info->user_twitter;
$description = $user_address_info->description;
$user_photo = $user_address_info->user_photo;
$display_name = $current_user->data->display_name;
$user_web = $current_user->data->user_url;
$display_name_arr = explode(' ',$display_name);
$user_fname = $display_name_arr[0];
$user_lname = $display_name_arr[1];
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
            <div id="content" class="content_<?php echo stripslashes(get_option('ptthemes_sidebar_left'));  ?>">
                <h1 class="page_head"> <?php _e(MY_PROFILE_TEXT);?>

                    <span class="fr myprofile">( <a href="<?php echo get_author_link($echo = false, $current_user->data->ID);?>" ><?php _e(MY_PROFILE_TEXT);?></a> )</span></h1>

<?php 
if($_SESSION['session_message']) {
    echo '<div class="sucess_msg">'.$_SESSION['session_message'].'</div>';
    $_SESSION['session_message'] = '';
}
?>
                <p class="note"> <span class="required">*</span> <?php _e(INDICATES_MANDATORY_FIELDS_TEXT);?> </p>
                <form name="registerform" id="registerform" action="<?php echo get_option( 'siteurl' ).'/?page=profile'; ?>" method="post" enctype="multipart/form-data" >
                    <h5><?php _e(EDIT_PROFILE_PAGE_TITLE);?></h5>
                    <div class="form_row clearfix ">
                        <label><?php _e(FIRST_NAME_TEXT) ?> <span class="indicates">*</span></label>
                        <input type="text" name="user_fname" id="user_fname" class="textfield" value="<?php echo esc_attr(stripslashes($user_fname)); ?>" size="25" />
                        <span class="message_error2" id="user_fname_span"></span>
                    </div>
                    <div class="form_row clearfix ">
                        <label><?php _e(LAST_NAME_TEXT) ?></label>
                        <input type="text" name="user_lname" id="user_lname" class="textfield" value="<?php echo esc_attr(stripslashes($user_lname)); ?>" size="25" />
                    </div>
                    <div class="form_row clearfix ">
                        <label><?php _e(ADDRESS1_TEXT) ?></label>
                        <input type="text" name="user_add1" id="user_add1" class="textfield" value="<?php echo esc_attr(stripslashes($user_add1)); ?>" size="25" />
                    </div>
                    <div class="form_row clearfix ">
                        <label><?php _e(ADDRESS2_TEXT) ?></label>
                        <input type="text" name="user_add2" id="user_add2" class="textfield" value="<?php echo esc_attr(stripslashes($user_add2)); ?>" size="25" />
                    </div>
                    <div class="form_row clearfix ">
                        <label><?php _e(CITY_TEXT) ?></label>
                        <input type="text" name="user_city" id="user_city" class="textfield" value="<?php echo esc_attr(stripslashes($user_city)); ?>" size="25" />
                    </div>
                    <div class="form_row clearfix ">
                        <label><?php _e(STATE_TEXT) ?></label>
                        <input type="text" name="user_state" id="user_state" class="textfield" value="<?php echo esc_attr(stripslashes($user_state)); ?>" size="25" />
                    </div>
                    <div class="form_row clearfix ">
                        <label><?php _e(COUNTRY_TEXT) ?></label>
                        <input type="text" name="user_country" id="user_country" class="textfield" value="<?php echo esc_attr(stripslashes($user_country)); ?>" size="25" />
                    </div>
                    <div class="form_row clearfix ">
                        <label><?php _e(POSTAL_CODE_TEXT) ?></label>
                        <input type="text" name="user_postalcode" id="user_postalcode" class="textfield" value="<?php echo esc_attr(stripslashes($user_postalcode)); ?>" size="25" />
                    </div>
                    <div class="form_row clearfix ">
                        <label><?php _e(YR_WEBSITE_TEXT) ?></label>
                        <input type="text" name="user_web" id="user_web" class="textfield" value="<?php echo esc_attr(stripslashes($user_web)); ?>" size="25" />
                    </div>
                    <div class="form_row clearfix ">
                        <label><?php _e(YR_TWITTER_TEXT) ?></label>
                        <input type="text" name="user_twitter" id="user_twitter" class="textfield" value="<?php echo esc_attr(stripslashes($user_twitter)); ?>" size="25" />
                    </div>
                    <div class="form_row clearfix ">
                        <label><?php _e(YR_DESCRIPTION_TEXT) ?></label>
                        <textarea name="description" id="description" class="textarea"><?php echo esc_attr(stripslashes($description)); ?></textarea>
                    </div>
                    <div class="form_row clearfix ">
                        <label><?php _e(YR_PICTURE_TEXT) ?></label>
                        <input type="file" name="user_photo" id="user_photo"  class="textfield"	/>
                        <span class="message_note"><?php _e(IMAGE_TYPE_MSG);?></span>
                        <div style="margin-left:190px; margin-top:10px;"> <?php get_user_profile_pic($current_user->ID,100,100); ?> </div>
                    </div>


                    <div class="form_row clearfix ">
                        <label>
<?php _e(PHONE_NUMBER_TEXT) ?>
                        </label>
                        <input type="text" name="user_phone" id="user_phone" class="textfield" value="<?php echo esc_attr(stripslashes($user_phone)); ?>" size="25" />
                    </div>
                    <input type="submit" name="Update" value="<?php _e(EDIT_PROFILE_UPDATE_BUTTON);?>" class="btn_input_highlight btn_spacer" onclick="return chk_edit_profile();" />

                    <input type="button" name="Cancel" value="Cancel" class="btn_input_normal" onclick="window.location.href='<?php echo get_author_link($echo = false, $current_user->data->ID);?>'" />

                </form>
                <div id="change_pw">
                    <h5><?php _e(CHANGE_PW_TEXT); ?>    <p class="note"> <span class="required">*</span> <?php _e(INDICATES_MANDATORY_FIELDS_TEXT);?> </p></h5>

                    <div class="clearfix"></div>
                    <form name="registerform" id="registerform" action="<?php echo get_option( 'siteurl' ).'/?page=profile&chagepw=1'; ?>" method="post">
<?php if($message1) { ?>
                        <div class="sucess_msg"> <?php _e(PW_CHANGE_SUCCESS_MSG); ?> </div>
                        </td>
    <?php } ?>

                        <div class="form_row clearfix">
                            <label>
<?php _e(NEW_PW_TEXT); ?> <span class="indicates">*</span></label>   
                            <input type="password" name="new_passwd" id="new_passwd"  class="textfield" />
                        </div>
                        <div class="form_row clearfix ">
                            <label>
<?php _e(CONFIRM_NEW_PW_TEXT); ?> <span class="indicates">*</span></label>
                            <input type="password" name="cnew_passwd" id="cnew_passwd"  class="textfield" />
                        </div>
                        <input type="submit" name="Update" value="<?php _e(EDIT_PROFILE_UPDATE_BUTTON) ?>" class="btn_input_highlight btn_spacer" onclick="return chk_form_pw();" />
                        <input type="button" name="Cancel" value="Cancel" class="btn_input_normal" onclick="window.location.href='<?php echo get_author_link($echo = false, $current_user->data->ID);?>'" />
                    </form>
                </div>


            </div> <!-- content #end -->

            <div class="sidebar sidebar_<?php echo stripslashes(get_option('ptthemes_sidebar_left'));  ?>">
                <div class="sidebar_top">
                    <div class="sidebar_bottom clearfix">


<?php
global $homepage_flag;
if((is_home() || $homepage_flag) && ($_REQUEST['page']=='profile' || $_REQUEST['page']=='dashboard')) {
    global $current_user;
    ?>
                        <div class="editprofile"><h3><?php _e(MY_ACCOUNT_TEXT);?></h3>
                            <ul class="xoxo blogroll">
                                <li><a href="<?php echo get_author_link($echo = false, $current_user->data->ID);?>"><?php _e(DASHBOARD_TEXT);?></a></li>
                                <li><a href="<?php echo get_option('siteurl');?>/?page=profile"><?php _e(EDIT_PROFILE_PAGE_TITLE);?></a></li>
                                <li><a href="<?php echo get_option('siteurl');?>/?page=profile#change_pw"><?php _e(CHANGE_PW_TEXT);?></a></li>
                            </ul>
                        </div>
                            <?php }?>


                    </div>
                </div>
            </div>



        </div>
    </div><!--cntentareahome #end-->
</div><!--wrapper #end-->
<script language="javascript" type="text/javascript">
    function chk_edit_profile()
    {
        document.getElementById('user_fname').className = 'textfield';
        document.getElementById('user_fname_span').innerHTML = '';
        if(document.getElementById('user_fname').value == '')
        {
            //alert("<?php _e('Please enter '.FIRST_NAME_TEXT) ?>");
            document.getElementById('user_fname').className = 'textfield error';
            document.getElementById('user_fname_span').innerHTML = '<?php _e('Please enter '. FIRST_NAME_TEXT);?>';
            document.getElementById('user_fname').focus();
            return false;
        }
        return true;
    }
    function chk_form_pw()
    {
        if(document.getElementById('new_passwd').value == '')
        {
            alert("<?php _e('Please enter '.NEW_PW_TEXT) ?>");
            document.getElementById('new_passwd').focus();
            return false;
        }
        if(document.getElementById('new_passwd').value.length < 4 )
        {
            alert("<?php _e('Please enter '.NEW_PW_TEXT.' minimum 5 chars') ?>");
            document.getElementById('new_passwd').focus();
            return false;
        }
        if(document.getElementById('cnew_passwd').value == '')
        {
            alert("<?php _e('Please enter '.CONFIRM_NEW_PW_TEXT) ?>");
            document.getElementById('cnew_passwd').focus();
            return false;
        }
        if(document.getElementById('cnew_passwd').value.length < 4 )
        {
            alert("<?php _e('Please enter '.CONFIRM_NEW_PW_TEXT.' minimum 5 chars') ?>");
            document.getElementById('cnew_passwd').focus();
            return false;
        }
        if(document.getElementById('new_passwd').value != document.getElementById('cnew_passwd').value)
        {
            alert("<?php _e(NEW_PW_TEXT.' and '.CONFIRM_NEW_PW_TEXT.' should be same') ?>");
            document.getElementById('cnew_passwd').focus();
            return false;
        }
    }
</script>
<?php get_footer(); ?>