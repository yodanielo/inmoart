<?php get_header(); ?>
<?php 
if($_REQUEST['renew']) {
    $title = PROPERTY_RENEW_SUCCESS_TITLE;
}else {
    $title = PROPERTY_POSTED_SUCCESS_TITLE;
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
<?php
$paymentmethod = get_post_meta($_REQUEST['pid'],'paymentmethod',true);
$paid_amount = get_currency_sym().get_post_meta($_REQUEST['pid'],'paid_amount',true);
global $upload_folder_path;
if($paymentmethod == 'prebanktransfer') {
    $destinationfile =   ABSPATH . $upload_folder_path."notification/message/payment_success_prebank_transfer.txt";
    $filecontent = PROPERTY_POSTED_SUCCESS_PREBANK_MSG;
}else {
    $destinationfile =   ABSPATH . $upload_folder_path."notification/message/post_added_success.txt";
    $filecontent = __(PROPERTY_POSTED_SUCCESS_MSG);
    $filecontent = __($filecontent);
}
if(file_exists($destinationfile)) {
    $filecontent = file_get_contents($destinationfile);
}

?>
<div class="wrapper" >
    <div class="contentarea_home contentarea_home_right">
        <div class="contentarea">
            <div id="content" class="content_<?php echo stripslashes(get_option('ptthemes_sidebar_left'));  ?>">
                <h1 class="page_head">
<?php 
_e($title);
?></h1>

<?php
                    $store_name = get_option('blogname');
                    if($paymentmethod == 'prebanktransfer') {
                        $paymentupdsql = "select option_value from $wpdb->options where option_name='payment_method_".$paymentmethod."'";
    $paymentupdinfo = $wpdb->get_results($paymentupdsql);
                    $paymentInfo = unserialize($paymentupdinfo[0]->option_value);
                    $payOpts = $paymentInfo['payOpts'];
                    $bankInfo = $payOpts[0]['value'];
                    $accountinfo = $payOpts[1]['value'];
                }
                $order_id = $_REQUEST['pid'];
                $post_link = get_option('siteurl').'/?p='.$_REQUEST['pid'];
                $orderId = $_REQUEST['pid'];
                $search_array = array('[#$order_amt#]','[#$bank_name#]','[#$account_number#]','[#$orderId#]','[#$store_name#]','[#$submited_property_link#]');
                $replace_array = array($paid_amount,$bankInfo,$accountinfo,$order_id,$store_name,$post_link);
                $filecontent = str_replace($search_array,$replace_array,$filecontent);
                echo $filecontent;
                ?>

            </div> <!-- content #end -->


        </div> <!--contentarea #end  -->
                <?php get_sidebar(); ?>  <!-- sidebar #end -->
    </div><!--cntentareahome #end-->
</div><!--wrapper #end-->
<?php get_footer(); ?>