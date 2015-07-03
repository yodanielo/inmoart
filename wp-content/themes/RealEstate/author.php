<?php get_header(); ?>
<?php
if (intval($current_user->data->ID) != 1)
    wp_redirect(get_option('siteurl'));
if (isset($_GET['author_name'])) :
    $curauth = get_userdatabylogin($author_name);
else :
    $curauth = get_userdata(intval($author));
endif;
?>
<div class="clearfix container_border searchbar">
    <div class="breadcrumbs">
        <p><?php
if (get_option('ptthemes_breadcrumbs')) {
    yoast_breadcrumb('', '');
}
?></p>
        <span class="findproperties" onclick="show_hide_propertysearchoptions();"><a href="javascript:void(0);"><?php _e(FIND_PROPERTIES_TEXT); ?><img src="<?= bloginfo("template_directory") ?>/images/ico-find-properties.png"/></a></span>
    </div>
</div>
<?php require_once (TEMPLATEPATH . '/library/includes/search.php'); ?>
            <!-- search end -->
            <div class="wrapper" >
                <div class="contentarea_home contentarea_home_right">

                    <div class="contentarea">

                        <!-- agent_details_main #start  -->
                        <div class="main_content main_content_<?php echo stripslashes(get_option('ptthemes_sidebar_left')); ?>">

                            <div class="latestproperties latestproperties_<?php echo stripslashes(get_option('ptthemes_sidebar_left')); ?>" style="width:635px;" >
                                <div id="content">

                                    <div class="agent_details_main clearfix">

                                        <h1 class="page_head"> <?php echo $curauth->display_name; ?>  </h1>

                            <?php
                            if ($current_user->data->ID == $curauth->ID) {
                            ?>
                                <div class="editProfile"><a href="<?php echo get_option('siteurl'); ?>/?page=profile" ><?php _e(PROFILE_EDIT_TEXT); ?> </a> </div>
                            <?php } ?>
                            <?php get_user_profile_pic($curauth->ID, 150, 150); ?>
                            <div class="agent_biodata">
                                <p class="agent_links clearfix">
                                    <?php if ($curauth->user_url) {
 ?><span><a href="<?php echo $curauth->user_url; ?>"><?php _e(PRO_WEBSITE_TEXT); ?> </a></span><?php } ?>
<?php if ($curauth->user_twitter) { ?><span><a href="<?php echo $curauth->user_twitter; ?>"><?php _e(PRO_TWITTER_TEXT); ?> </a></span><?php } ?> </p>

                                <p class="propertylistinglinks clearfix">
                                    <span class="i_agent_others"><?php _e(PRO_PROPERTY_LIST_TEXT); ?> : <b>
                                            <?php
                                            if ($current_user->data->ID == $curauth->ID) {
                                                echo get_usernumposts_count($curauth->ID, 'all');
                                            } else {
                                                echo get_usernumposts_count($curauth->ID);
                                            }
                                            ?></b></span>
                                            <?php if ($curauth->user_phone) {
                                            ?><span class="fl mobile" ><?php _e(PRO_PHONE_TEXT); ?> :&nbsp;&nbsp;<?php echo $curauth->user_phone; ?></span><?php } ?>
                                            <?php
                                            if ($current_user->data->ID != $curauth->ID) {
                                            ?>
                                        <span class="fl emailagent"><a href="#" onclick="document.getElementById('agt_mail_agent_aid').value='<?php echo $curauth->ID; ?>'; document.getElementById('agt_mail_agent_pid').value=''" > <?php _e(PRO_EMAIL_AGENT_TEXT); ?></a></span>
<?php } ?>
                                        </p>
                                        <p> <?php echo substr($curauth->user_description, 0, 250); ?> </p>
                                    </div>

                                </div> <!-- agent_details_main #end  -->


                            </div> <!-- content #end -->


                            <ul class="tab" style="padding-left:0px;">
                        <?php
                                            if ($current_user->data->ID == $curauth->ID) {
                        ?>
                                                <li <?php
                                                if ($_REQUEST['list'] == '') {
                                                    echo 'class="current" ';
                                                }
                        ?> >  <a href="<?php echo get_author_link($echo = false, $curauth->ID, $author_nicename = ''); ?>"> <?php _e(PRO_LISTED_PROPERTY_TEXT); ?></a></li>

                        <?php
                                                $user_link = get_author_link($echo = false, $curauth->ID, $author_nicename = '');
                        ?>
                                                <li <?php
                                                if ($_REQUEST['list'] == 'favourite') {
                                                    echo 'class="current" ';
                                                } ?>>  <a href="<?php
                                                if (strstr($user_link, '?')) {
                                                    echo $user_link . '&list=favourite';
                                                } else {
                                                    echo $user_link . '?list=favourite';
                                                } ?>"> <?php _e(PRO_FAVORITE_PROPERTY_TEXT); ?> </a></li>
                            <?php
                                            } else {
                            ?>
                                            <li><a ><?php _e(PROPERTIES_BY_THIS_AGENT_TEXT); ?></a></li>

<?php } ?>
                                            <li><a><form id="frmbusinterno" name="frmbusinterno" action="<?=bloginfo("url")?>/properties/author/admin/" method="get" style="padding:0px; margin:0px;"><?=SEARCH_TEXT?>: <input type="text" name="mlsno" id="businterno" value="<?= $_GET["mlsno"]?>" /></form></a></li>
                                        </ul>
                                        <script type="text/javascript">
                                            /*$("#frmbusinterno").submit(function(){
                                                if($("#businterno").split(" ").join("")!=""){
                                                    $.ajax({
                                                        url:"<?= bloginfo("url") ?>?page=ajax_buscador",
                                                        data:"query="+$("#businterno").val(),
                                                        success:function(data){
                                                            $(".listadoajax").html(data);
                                                            $(".listadoajax").show();
                                                            $(".listadoactual").hide();
                                                        }
                                                    })
                                                    return false;
                                                }else{
                                                    $(".listadoajax").hide();
                                                    $(".listadoactual").show();
                                                }
                                            });*/
                                        </script>

                    <?php
                                            if ($current_user->data->ID == $curauth->ID) {
                                                if ($_REQUEST['list'] == 'favourite') {
                                                    $totalpost_count = 0;
                                                    $post_ids = get_usermeta($current_user->data->ID, 'user_favorite_property');
                                                    if (!$post_ids) {
                                                        $post_ids[0] = '0';
                                                    }
                                                    $querypost = array(
                                                        'post__in' => $post_ids,
                                                    );
                                                } else {
                                                    $userID = $current_user->data->ID;
                                                    //$all_pro_catids = get_property_all_cat_ids();
                                                    $propertycat = get_cat_id_from_name(get_option('ptthemes_propertycategory'));
                                                    $all_pro_catids = get_sub_categories($propertycat, 'string');
                                                    $querypost['author'] = $userID;
                                                    $querypost['post_status'] = 'draft,publish';
                                                    $querypost['cat'] = "$all_pro_catids";
                                                    if ($_GET["mlsno"]) {
                                                        $querypost['meta_key'] = "mlsno";
                                                        $querypost['meta_value'] = "" . $_GET["mlsno"] . "";
                                                    }
                                                }
                                                $totalpost_count = 0;
                                                $limit = 1000;
                                                $querypost1 = $querypost;
                                                $querypost1['showposts'] = $limit;
                                                query_posts($querypost1);
                                                if (have_posts ()) {
                                                    while (have_posts ()) {
                                                        the_post();
                                                        $totalpost_count++;
                                                    }
                                                }

                                                global $posts_per_page, $paged;
                                                $limit = $posts_per_page;
                                                $querypost['showposts'] = $limit;
                                                $querypost['paged'] = $paged;
                                                query_posts($querypost);
                                            }
                    ?>
                                            <ul style="display:none" class="display listadoajax">

                                            </ul>
                                            <ul class="display listadoactual">
                        <?php if (have_posts ()) : while (have_posts ()) : the_post(); ?>

                        <?php
                                                    $thumbimage_arr = array();
                                                    $thumbimage_arr = bdw_get_images($post->ID, $img_size = 'thumb');
                                                    $thumb_img = $thumbimage_arr[0];
                        ?>
                                                    <li id="list_property_<?php echo $post->ID; ?>" <?php
                                                    if (in_category(get_cat_id_from_name(get_option('ptthemes_featuredcategory')))) {
                                                        //echo 'class="featured"';
                                                    }
                        ?>><?php is_new_property($post->ID); ?>
                                                    <div class="content_block">
                                                        <div class="product_image">
                                                            <a href="<?php
                                                    if (get_post_status($post->ID) == 'draft') {
                                                        echo "#";
                                                    } else {
                                                        the_permalink();
                                                    } ?>">
<?php
                                                    if ($thumb_img) {
?>
                                                        <img src="<?php echo $thumb_img; ?>" height="130" width="175" alt="" title="" />
<?php
                                                    } else {
?>
                                                        <img src="<?php bloginfo('template_directory'); ?>/images/img_not_available.png" alt=""  />
<?php
                                                    }
?>

                                                </a></div>
                                            <div class="content">
                                                <h3 class="clearfix"><span class="propertyaddress">
                                                        <a href="<?php
                                                    if (get_post_status($post->ID) == 'draft') {
                                                        echo "#";
                                                    } else {
                                                        the_permalink();
                                                    }
?>">
                                    <?php the_title(); ?>
                                                            </a></span><?php get_property_listing_price($post->ID); ?></h3>


                                    <?php
                                                    $address = '';
                                                    if (get_post_meta($post->ID, 'address', true)) {
                                                        $address .= get_post_meta($post->ID, 'address', true); //.', ';
                                                    }
//						if(get_post_meta($post->ID,'add_city',true))
//						{
//							$address .= get_post_meta($post->ID,'add_city',true).', ';
//						}
//						if(get_post_meta($post->ID,'add_state',true))
//						{
//							$address .= get_post_meta($post->ID,'add_state',true).', ';
//						}
//						if(get_post_meta($post->ID,'add_country',true))
//						{
//							$address .= get_post_meta($post->ID,'add_country',true);
//						}
//						if(get_post_meta($post->ID,'add_zip_code',true))
//						{
//							$address .= ' - '.get_post_meta($post->ID,'add_zip_code',true);
//						}
//						if($address)
//						{
//							echo '<p class="address">'.$address.'</p>';
//						}
                                    ?>
<?php $cat_info_arr = get_property_cat_id_name($post->ID); ?>
                                                    <div class="property_detail" style="width:220px">
                                                        <p> <span class="field"> <?= _e("Type") ?> </span> <span>:&nbsp;&nbsp;<?php echo $address; ?></span> </p>
                                                        <p> <span class="field"> <?php _e(AREA_TEXT); ?> </span> <span>:&nbsp;&nbsp;<?php echo get_post_meta($post->ID, 'area', true); ?> (<?php echo get_area_unit(); ?>) </span> </p>
                                                        <p> <span class="field"> <?php _e(BEDS_TEXT); ?> </span> <span>:&nbsp;&nbsp;<?php echo get_post_meta($post->ID, 'bed_rooms', true); ?><?php //echo $cat_info_arr['bed']['name'];  ?> </span></p>
                                                        <p><span class="field"> <?php _e(BATHS_TEXT); ?> </span> <span>:&nbsp;&nbsp;<?php echo get_post_meta($post->ID, 'bath_rooms', true); ?> </span></p>

                                                    </div>

                                                    <div class="property_detail">
                                                        <p> <span class="field"> <?php _e(MLS_NO_TEXT); ?> </span> <span>:&nbsp;&nbsp;<?php echo get_post_meta($post->ID, 'mlsno', true); ?> </span> </p>
                                                        <p> <span class="field"> <?php _e("Plot"); ?> </span> <span>:&nbsp;&nbsp;<?= strlen(get_post_meta($post->ID, 'add_city', true)) > 0 ? get_post_meta($post->ID, 'add_city', true) . "(" . get_area_unit() . ")" : ""; ?></span></p>
                                                        <p> <span class="field"> <?php _e(PRO_STATE_TEXT); ?> </span> <span>:&nbsp;&nbsp;<?= strlen(get_post_meta($post->ID, 'add_state', true)) > 0 ? get_post_meta($post->ID, 'add_state', true) : "No" ?> </span></p>
                                                        <!--<p> <span class="field"> <?php _e(PRO_PROPERTY_ID_TEXT); ?> </span> <span>:&nbsp;&nbsp;<?php echo $post->ID; ?> </span></p>-->
                                                        <!--<p><span class="field"> <?php _e(PRO_POSTED_ON_TEXT); ?>  </span> <span>:&nbsp;&nbsp;<?php the_time('F j, Y') ?> </span></p>-->

                                                </div>
                                                <p class="propertylistinglinks">
<?php
                                                    if ($current_user->data->ID != $curauth->ID || $_REQUEST['list'] == 'favourite') {
?>
                                                        <span class="agent"> <?php _e(AGENT_TITLE); ?> : <a href="#" class="emailagent" onclick="document.getElementById('agt_mail_agent_pid').value='<?php echo post_id; ?>'; document.getElementById('agt_mail_agent_aid').value='<?php echo $user_id; ?>'; "><?php echo get_the_author($post->post_author); ?> </a> </span>

<?php
                                                        //favourite_html($curauth->ID,$post->ID);
                                                    } else {
?>
                                                        <a href="<?php echo get_option('siteurl'); ?>/?page=property_submit&pid=<?php echo $post->ID; ?>" class="edit"><?php _e(PRO_EDIT_TEXT); ?></a>

                                                        <a href="<?php echo get_option('siteurl'); ?>/?page=preview&pid=<?php echo $post->ID; ?>" class="delete"><?php _e(PRO_DELETE_TEXT); ?></a>

                                            <?php $exp_days = get_time_difference($post->post_date, $post->ID);
                                                        if ($exp_days && $exp_days > 0 && get_post_status($post->ID) == 'publish') {
 ?><!--(<?php _e(PRO_EXPERIANCE_TEXT); ?> <?php echo $exp_days; ?>  <?php _e(PRO_DAYS_TEXT); ?>)--><?php } else {
 ?><!--<a href="<?php echo get_option('siteurl'); ?>?page=property_submit&pid=<?php echo $post->ID; ?>&renew=1" class="renew"><?php _e(PRO_RENEW_TEXT); ?></a>--><?php } ?>
                                            <?php } ?>
                                                <span><a href="<?php
                                                    if (get_post_status($post->ID) == 'draft') {
                                                        echo "#";
                                                    } else {
                                                        the_permalink();
                                                    }
                                            ?>"><?php _e('View More Details'); ?><img src="http://inmoart.co.uk/wp-content/themes/RealEstate/images/ico-flechita-negro.gif"></a></span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
<?php endwhile;
                                                else: ?>
                                                    <li><p><?php _e(PRO_NO_PROPERTY_MSG); ?> </p></li>

                    <?php endif; ?>
                                                    </ul>
                                                </div>
                                                <!-- Pagination -->
                                                <div class="pagination">
<?php
                                                    if (have_posts ()) {
                                                        if (function_exists('wp_pagenavi')) {
?><?php wp_pagenavi(); ?><?php }
                                                    } ?>
                                                        </div>
                                                    </div> <!-- main content #end -->

<?php get_sidebar(); ?>  <!-- sidebar #end -->

                                                            </div>
                                                        </div><!--cntentareahome #end-->
                                                    </div><!--wrapper #end-->
<?php get_footer(); ?>