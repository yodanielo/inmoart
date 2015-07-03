<?php
//PENDIENT Normalizar el formulario de contacto
/*
Template Name: Contact Us
*/
?>
<?php
if($_POST) {
    if($_POST['your-email']) {
        $toEmailName = get_option('blogname');
        $toEmail = get_site_emailId();

        $subject = $_POST['your-subject'];
        $message = '';
        $message .= '<p>Dear '.$toEmailName.',</p>';
        $message .= '<p>Name : '.$_POST['your-name'].',</p>';
        $message .= '<p>Email : '.$_POST['your-email'].',</p>';
        $message .= '<p>Message : '.nl2br($_POST['your-message']).'</p>';
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        // Additional headers
        $headers .= 'To: '.$toEmailName.' <'.$toEmail.'>' . "\r\n";
        $headers .= 'From: '.$_POST['your-name'].' <'.$_POST['your-email'].'>' . "\r\n";

        // Mail it
        mail($toEmail, $subject, $message, $headers);
        if(strstr($_REQUEST['request_url'],'?')) {
            $url =  $_REQUEST['request_url'].'&msg=success'	;
        }else {
            $url =  $_REQUEST['request_url'].'?msg=success'	;
        }
        wp_redirect($url);
        exit;
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

<div class="wrapper" >
    <div class="contentarea_home contentarea_home_right">
        <div class="contentarea">
            <div class="content">
                <div class="propertydetails  propertydetails_right entry" style="background:none">


                        <h1 class="page_head submit_head" style="margin-top:-10px;"><?php the_title(); ?></h1>

                        <?php
                        global $post;
                        echo $post->post_content;
                        ?>

                        <div class="registration_form_box">

                            <?php
                            if($_REQUEST['msg'] == 'success') {
                                ?>
                            <p class="success_msg" style="text-align:center"><?php _e(CONTACT_PAGE_SUCCESS_MSG);?></p>
                                <?php
                            }
                            ?>

                            <form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post" id="contact_frm" name="contact_frm" class="wpcf7-form">
                                <input type="hidden" name="request_url" value="<?php echo $_SERVER['REQUEST_URI'];?>" />

                                <div class="form_row clearfix"> <label> <?php _e(NAME_CONTACT_TEXT);?>  <span class="indicates">*</span></label>
                                    <input type="text" name="your-name" id="your-name" value="" class="textfield" size="40" />
                                    <span id="your_name_Info" class="message_error2"></span>
                                </div>

                                <div class="form_row clearfix"><label><?php _e(EMAIL_CONTACT_TEXT);?> <span class="indicates">*</span></label>
                                    <input type="text" name="your-email" id="your-email" value="" class="textfield" size="40" />
                                    <span id="your_emailInfo"  class="message_error2"></span>
                                </div>

                                <div class="form_row clearfix"><label><?php _e(SUBJECT_CONTACT_TEXT);?>  <span class="indicates">*</span></label>
                                    <input type="text" name="your-subject" id="your-subject" value="" size="40" class="textfield" />
                                    <span id="your_subjectInfo"></span>
                                </div>


                                <div class="form_row clearfix"><label><?php _e(MESSAGE_CONTACT_TEXT);?> <span class="indicates">*</span></label>
                                    <textarea name="your-message" id="your-message" cols="40" class="textarea textarea2 textareacontact" rows="10"></textarea>
                                    <span id="your_messageInfo"  class="message_error2"></span>
                                </div>
                                <input type="submit" value="<?php _e(SEND_CONTACT_BUTTON);?>" class="btn_input_highlight_more btn_spacer btnsubmitproperty" style="margin-top:-20px" />
                            </form>

                        </div>


                        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/contact_us_validation.js"></script>

                </div>
                <div class="sidebar sidebar_right">
                    <div class="sidebar_top">
                        <div class="sidebar_bottom clearfix">
                            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(4) )  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--contentarea #end  -->
    </div>
</div>
<?php get_footer(); ?>