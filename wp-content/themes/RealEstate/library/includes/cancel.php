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
            <div id="content" class="content_<?php echo stripslashes(get_option('ptthemes_sidebar_left'));  ?>">
                <h1 class="page_head"><?php _e(PAY_CANCELATION_TITLE);?></h1>
                <?php
                global $upload_folder_path;
                $destinationfile =   ABSPATH . $upload_folder_path."notification/message/payment_cancel_paypal.txt";
                if(file_exists($destinationfile)) {
                    $filecontent = file_get_contents($destinationfile);
                }else {
                    $filecontent = PRPOERTY_PAY_CANCEL_MSG;
                }
                ?>
                <?php
                $store_name = get_option('blogname');
                $post_link = get_option('siteurl').'/?page=preview&alook=1&pid='.$_REQUEST['pid'];
                $search_array = array('[#$store_name#]','[#$submited_property_link#]');
                $replace_array = array($store_name,$post_link);
                $filecontent = str_replace($search_array,$replace_array,$filecontent);
                if($filecontent) {
                    ?>

                    <?php echo $filecontent; ?>

    <?php
                }else {
    ?>
                <h1><?php _e(PAY_CANCEL_MSG); ?></h1>
                    <?php
                }
                ?>
            </div> <!-- content #end -->

                <?php get_sidebar(); ?>  <!-- sidebar #end -->

        </div> <!--contentarea #end  -->
    </div><!--cntentareahome #end-->
</div><!--wrapper #end-->
<?php get_footer(); ?>