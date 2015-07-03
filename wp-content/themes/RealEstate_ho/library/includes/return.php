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

                <h1 class="page_head"><?php _e(PAYMENT_SUCCESS_TITLE);?></h1>

                <?php
                global $upload_folder_path;
                $destinationfile =   ABSPATH . $upload_folder_path."notification/message/payment_success_paypal.txt";
                if(file_exists($destinationfile)) {
                    $filecontent = file_get_contents($destinationfile);
                }else {
                    $filecontent = __(PAYMENT_SUCCESS_AND_RETURN_MSG);
                }
                ?>
                <?php
                $store_name = get_option('blogname');
                $post_link = get_option('siteurl').'/?page=preview&alook=1&pid='.$_REQUEST['pid'];
                $search_array = array('[#$store_name#]','[#$submited_property_link#]');
                $replace_array = array($store_name,$post_link);
                $filecontent = str_replace($search_array,$replace_array,$filecontent);
                if($filecontent) {
                    echo $filecontent;
                }else {
                    ?>
                <h4><?php _e(PAYMENT_SUCCESS_MSG1); ?></h4>
                <h6><?php _e(PAYMENT_SUCCESS_MSG2); ?></h6>
                <h6><?php _e(PAYMENT_SUCCESS_MSG3.' '.get_option('blogname').'.'); ?></h6>
                    <?php
}
?>
            </div> <!-- content #end -->

                <?php get_sidebar(); ?>  <!-- sidebar #end -->

        </div> <!--contentarea #end  -->
    </div><!--cntentareahome #end-->
</div><!--wrapper #end-->
<?php get_footer(); ?>