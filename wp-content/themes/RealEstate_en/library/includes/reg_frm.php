<div id="sign_up">
    <h4><?php
        if($_REQUEST['page']=='login' && $_REQUEST['page1']=='sign_up') {
            _e(REGISTRATION_NOW_TEXT);
        }else {
            _e(REGISTRATION_NOW_TEXT);
        }
        ?></h4>

        <?php
if ( $_REQUEST['emsg']==1) {
        echo "<p class=\"error_msg_fix\"> ".EMAIL_USERNAME_EXIST_MSG." </p>";
    }
    ?>

    <div class="login_content">
    <?php echo stripslashes(get_option('ptthemes_reg_page_content'));?>
    </div>


    <div class="registration_form_box">

        <form name="registerform" id="registerform" action="<?php echo get_option( 'siteurl' ).'/?page=login&amp;action=register'; ?>" method="post">

            <input type="hidden" name="reg_redirect_link" value="<?php echo $_SERVER['HTTP_REFERER'];?>" />
            <p class="note"><span class="indicates">*</span> <?php _e(INDICATES_MANDATORY_FIELDS_TEXT);?></p>
            <!--<h5 class="rfh"><?php _e(PERSONAL_INFO_TEXT);?> </h5>-->

            <div class="form_row clearfix">
                <label><?php _e(EMAIL_TEXT) ?><span class="indicates">*</span></label>
                <input type="text" name="user_email" id="user_email" class="textfield" value="<?php echo esc_attr(stripslashes($user_email)); ?>" size="25" />
                <div id="reg_passmail">
<?php _e(REGISTRATION_MESSAGE) ?>
                </div>
                <span id="user_emailInfo"></span>
            </div>



            <div class="row_spacer_registration clearfix" >
                <div class="form_row clearfix">
                    <label>
<?php _e(FIRST_NAME_TEXT) ?>
                        <span class="indicates">*</span></label>
                    <input type="text" name="user_fname" id="user_fname" class="textfield" value="<?php echo esc_attr(stripslashes($user_fname)); ?>" size="25"  />
                    <span id="user_fnameInfo"></span>
                </div>
                <div class="form_row clearfix">
                    <label>
<?php _e(LAST_NAME_TEXT) ?>
                    </label>
                    <input type="text" name="user_lname" id="user_lname" class="textfield" value="<?php echo esc_attr(stripslashes($user_lname)); ?>" size="25"  />
                </div>

            </div>





<?php do_action('register_form'); ?>

            <div class="fix"></div>
            <!-- <a  href="javascript:void(0);" onclick="return chk_form_reg();" class="highlight_button fr " >Register Now </a>-->
            <input type="submit" name="registernow" value="<?php _e(REGISTER_NOW_TEXT);?>" class="btn_input_highlight btn_spacer" />


        </form>

    </div>
</div>