<?php
function prt_vacio(&$arreglo,$label,$valor,$despues="",$vacio=""){
    if(strlen(trim(str_replace("-","",$valor)))>0){
        $arreglo[]='<td>'.$label.': <strong>'.$valor.$despues.'</strong></td>';
    }
}
if(have_posts()) : ?>
    <?php while(have_posts()) : the_post() ?>
<div class="contentarea">


    <div class="propertydetails  propertydetails_<?php echo stripslashes(get_option('ptthemes_sidebar_left'));  ?>">

        <h1><?php the_title(); ?></h1>

        <div class="propertydetails_toplinks">
            <ul>

                <li class="addtofav">
                    <!--<img src="<?php bloginfo('template_directory'); ?>/images/ico-corazon.png"/><a href="#" class="jQueryBookmark">Add to Favorite</a>-->
<!--<a href="#"><?php //_e(ADD_TO_FAVOURITE_TEXT);?></a>-->
                            <?php favourite_html($post->post_author,$post->ID); ?>
                </li>

<!--<li class="addtofav"><a href="#"><?php _e(ADD_TO_FAVOURITE_TEXT);?></a></li>-->
                <li class="sendtofriend"><a href="#" class='sendtofriend' onclick="document.getElementById('frnd_subject').value='<?php echo $post->post_title.""; ?>';document.getElementById('send_to_Frnd_pid').value='<?php echo $post->ID;?>'"><?php _e(SEND_TO_FRND_TEXT);?></a>
                </li>
                <li class="print"><a href="#" onclick="window.open('<?=bloginfo("url")?>?page=print&id=<?=$post->ID?>','','width=800,height=600,menubar=yes,scrollbars=yes,toolbar=yes,location=yes,directories=yes,resizable=yes,top=0,left=0');return false;" ><?php _e(PRINT_TEXT);?></a></li>
            </ul>
            <script language="javascript" type="text/javascript">
                $(document).ready(function(){
                    $("a.jQueryBookmark").click(function(e){
                        e.preventDefault(); // this will prevent the anchor tag from going the user off to the link
                        var bookmarkUrl = window.location.href;
                        var bookmarkTitle = document.title;
                        if (window.sidebar) { // For Mozilla Firefox Bookmark
                            window.sidebar.addPanel(bookmarkTitle, bookmarkUrl,"");
                        } else if( window.external || document.all) { // For IE Favorite
                            window.external.AddFavorite( bookmarkUrl, bookmarkTitle);
                        } else if(window.opera) { // For Opera Browsers
                            $("a.jQueryBookmark").attr("href",bookmarkUrl);
                            $("a.jQueryBookmark").attr("title",bookmarkTitle);
                            $("a.jQueryBookmark").attr("rel","sidebar");
                        } else { // for other browsers which does not support
                            alert('Your browser does not support this bookmark action');
                            return false;
                        }
                    });
                });
            </script>
            <div class="sharelisting">

                        <?php _e(SHARE_THIS_LISTING_TEXT);?>


                        <?php if ( get_option('ptthemes_facebook')) { ?>
                <a href="http://www.facebook.com/share.php?u=<?php echo urlencode(the_permalink('','',false)); ?>&amp;t=<?php the_title(); ?>">
                    <img src="<?php bloginfo('template_directory'); ?>/images/i-icon-listing01.png" alt="" title="" /></a>
                            <?php } ?>


                        <?php if ( get_option('ptthemes_digg')) {  ?>
                <a href="http://digg.com/submit?phase=2&amp;url=<?php echo urlencode(the_permalink('','',false)); ?>&amp;title=<?php the_title(); ?>&amp;bodytext=<?php the_excerpt(); ?>">
                    <img src="<?php bloginfo('template_directory'); ?>/images/i-icon-listing02.png" alt="" title="" /></a>
                            <?php } ?>


                        <?php if ( get_option('ptthemes_del')) {  ?>
                <a href="http://delicious.com/post?url=<?php echo urlencode(the_permalink('','',false)); ?>&amp;title=<?php the_title(); ?>&amp;notes=<?php the_excerpt(); ?>">
                    <img src="<?php bloginfo('template_directory'); ?>/images/i-icon-listing03.png" alt="" title="" /></a>
                            <?php } ?>

                        <?php if ( get_option('ptthemes_twitter')) {  ?>
                <a href="http://twitter.com/home?status=<?php the_title(); ?> - <?php echo urlencode(the_permalink('','',false)); ?>">
                    <img src="<?php bloginfo('template_directory'); ?>/images/i_twitter.png" alt="" title="" /></a>
                            <?php } ?>


                        <?php if ( get_option('ptthemes_reddit')) {  ?>
                <a href="http://reddit.com/submit?url=<?php echo urlencode(the_permalink('','',false)); ?>&amp;title=<?php the_title(); ?>">
                    <img src="<?php bloginfo('template_directory'); ?>/images/reddit.gif" alt="" title="" /></a>
                            <?php } ?>

                        <?php if ( get_option('ptthemes_linkedin')) {  ?>
                <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo urlencode(the_permalink('','',false)); ?>&amp;title=<?php the_title(); ?>&amp;summary=<?php the_excerpt(); ?>">
                    <img src="<?php bloginfo('template_directory'); ?>/images/linkedin.png" alt="" title="" /></a>
                            <?php } ?>


                        <?php if ( get_option('ptthemes_technorati')) {  ?>
                <a href="http://technorati.com/faves?add=<?php echo urlencode(the_permalink('','',false)); ?>">
                    <img src="<?php bloginfo('template_directory'); ?>/images/technorati.gif" alt="" title="" /></a>
                            <?php } ?>

                        <?php if ( get_option('ptthemes_myspace')) {  ?>
                <a href="http://www.myspace.com/Modules/PostTo/Pages/?u=<?php echo urlencode(the_permalink('','',false)); ?>&amp;t=<?php the_title(); ?>">
                    <img src="<?php bloginfo('template_directory'); ?>/images/myspace.png" alt="" title="" /></a>
                            <?php } ?>


            </div>
        </div>



                <?php
                $tumber=$wpdb->get_var("select option_value from wp_options where option_name='siteurl'");
                $tumber.='/tumber.php?w=638&h=480&src=';
                $large_img_arr = bdw_get_images($post->ID,'large');
                $thumb_img_arr = bdw_get_images($post->ID,'thumb');
                if(count($large_img_arr)>0) {
                    //  width="638" height="480"
                    ?>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/image-slideshow.js"> </script>
        <script> var arrow_over_path='<?php bloginfo('template_directory'); ?>/images/'; </script>
        <div id="dhtmlgoodies_slideshow">
            <div id="previewPane">
                <img src="<?php echo $tumber.$large_img_arr[0]; ?>" width="638" height="480" >
                <span id="waitMessage"><?php _e(IMAGE_LOADING_TEXT); ?> </span>
                <div id="largeImageCaption">1</div>
            </div>
                        <?php
                        if(count($thumb_img_arr)>1) {
                            if(count($thumb_img_arr)<=5) {
                                ?>
            <style>#arrow_right,#arrow_left{ display:none;}</style>
                                <?php
                            }
                            ?>
            <div id="galleryContainer">
                <div id="arrow_left"><img src="<?php bloginfo('template_directory'); ?>/images/arrow_left.png"></div>
                <div id="arrow_right"><img src="<?php bloginfo('template_directory'); ?>/images/arrow_right.png"></div>
                <div id="theImages">
                    <!-- Thumbnails -->
                                    <?php
                                    for($i=0;$i<count($thumb_img_arr);$i++) {
                                        ?>
                    <a href="#" onclick="showPreview('<?php echo $tumber.$large_img_arr[$i]; ?>','1');return false"><img src="<?php echo $thumb_img_arr[$i];?>" height="80" width="110"></a>
                                        <?php }?>
                    <!-- End thumbnails -->
                    <div id="slideEnd"></div>
                </div>
            </div>
                            <?php }?>
        </div>


                    <?php }?>
        <div class="basicinfo">
                    <?php $cat_info_arr = get_property_cat_id_name($post->ID);?>
            <h2 class="home"><img src="<?=bloginfo("template_directory")?>/images/ico-home-information.png" /><div class="featdetail2"><?php echo get_property_price($post->ID);?></div><div class="featdetail1">ref.:<?php echo get_post_meta($post->ID,'mlsno',true);?></div>&nbsp;&nbsp;<?php _e(BASIC_INFO_TEXT);?></h2>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <?php 
                    $celdas=array();
                    prt_vacio($celdas,TYPE_TEXT,get_post_meta($post->ID,'address',true),'');
                    prt_vacio($celdas,PRO_STATE_TEXT,get_post_meta($post->ID,'add_state',true),'','No');
                    prt_vacio($celdas,AREA_TEXT,get_post_meta($post->ID,'area',true),' '.get_area_unit());
                    prt_vacio($celdas,AIR_CONDITIONING,get_post_meta($post->ID,'add_air',true),' ');
                    prt_vacio($celdas,PLOT_TEXT,get_post_meta($post->ID,'add_city',true),' '.get_area_unit());
                    prt_vacio($celdas,GARAGE_TEXT,get_post_meta($post->ID,'add_garage',true),' ');
                    prt_vacio($celdas,BEDS_TEXT,get_post_meta($post->ID,'bed_rooms',true),' ');
                    prt_vacio($celdas,VIEW_TEXT,get_post_meta($post->ID,'view',true),' ');
                    prt_vacio($celdas,BATHS_TEXT,get_post_meta($post->ID,'bath_rooms',true),' ');
                    prt_vacio($celdas,PRO_LOCATION_TEXT,get_post_meta($post->ID,'add_location',true),' ');
                    prt_vacio($celdas,HEATING,get_post_meta($post->ID,'add_heating',true),' ');
                    prt_vacio($celdas,TERRACE,get_post_meta($post->ID,'add_terrace',true),' '.get_area_unit());
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
            <div id="pcontent">
                    <?php the_content(); ?>
            </div>
            
        </div>




                <?php if(get_post_meta($post->ID,'add_feature',true)) {?>
        <div class="additionalfeatures">
            <h2 class="property_desc"><img style="float:left; margin-left:10px;margin-top:-3px" src="<?=bloginfo("template_directory")?>/images/ico-description.png" />&nbsp;&nbsp;<?= _e(ADD_FEATURE_TEXT);?></h2>
            <p>
                            <?php echo nl2br(stripslashes(get_post_meta($post->ID,'add_feature',true)));?>
            </p>
        </div>
                    <?php }?>


        <div class="agent_info clearfix">




                    <?php
                    $author_info = get_author_info($post->post_author);
                    ?>

            <!--<h3> <?php _e(FOR_TEXT); ?> <?php echo get_post_meta($post->ID,'property_type',true);?> <?php _e(BY_AGENT_TEXT); ?></h3>-->
            <h3><img style="float:left" src="<?=bloginfo("template_directory")?>/images/ico-schedule-a-viewing.png"/>&nbsp;&nbsp;<?=SCHEDULE_A_VIEWING?></h3>
            <div class="agent_contact_form">
                <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/property_detail_validation.js"></script>
                <form method="post" name="email_agent" id="property_mail_agent" action="<?php echo get_option('siteurl')."/?page=send_inqury";?>" target="submit_information" >
                    <input type="hidden" name="pid" value="<?php echo $post->ID;?>" />
                    <input type="hidden" name="aid" value="<?php echo $post->post_author;?>" />
                    <div id="inquiry_send_success_property" class="sucess_msg" style="display:none"></div>
                    <div class="agent_row clearfix">
                        <label><?php _e(NAME_TEXT); ?> :  <span>*</span><span id="span_property_mail_name"></span></label>
                        <input type="text" name="inq_name" value="" id="property_mail_name" class="textfield"   />

                    </div>


                    <div class="agent_row clearfix">
                        <label><?php _e(EMAIL_TEXT); ?> :  <span>*</span><span id="span_property_mail_email"></span></label>
                        <input type="text" name="inq_email" value="" id="property_mail_email" class="textfield"  />

                    </div>

                    <div class="agent_row clearfix">
                        <label> <?php _e(PHONE_NUMBER_TEXT); ?> : </label>
                        <input name="inq_phone" id="inq_phone" type="text" class="textfield" />
                    </div>



                    <div class="agent_row clearfix">
                        <label> <?php _e(MESSAGE_TEXT); ?> :  <span>*</span><span id="span_property_frnd_comments"></span></label>

                        <textarea name="inq_msg" id="property_frnd_comments" cols="" rows="" class="textarea"> </textarea>

                    </div>

                    <input name="Send" type="submit"  class="b_agent_contact" value="<?php _e(SEND_BTN_TEXT); ?>" />
                    <span id="inquiry_send_success"></span>
                </form>

            </div>

            <div class="agent_contact">
                <h3><?=AGENT_CONTACT_INFO_TEXT?></h3>
                <div class="agentlogo"></div>
                        <?php
                        //get_user_profile_pic($post->post_author,80,80); ?>


                        <?php
                        $sql="select u.id,u.user_email,(select meta_value from wp_usermeta um where um.user_id=u.id and meta_key='first_name') as first_name,(select meta_value from wp_usermeta um where um.user_id=u.id and meta_key='last_name') as last_name from wp_users u where user_login like 'admin'";
                        $wpdb->query($sql);
                        $usuarios=$wpdb->get_results($sql);
                        $usuarioad=$usuarios[0];
                        ?>
                <ul class="xoxo blogroll" style="width:240px;">
                    <li><?=FIRST_NAME_TEXT?>: <a><?=$usuarioad->first_name.' '.$usuarioad->last_name?></a></li>
                    <li>E-mail: <a href="mailto:<?=$usuarioad->user_email?>"><?=$usuarioad->user_email?></a></li>
                    <li><?=PHONE_TEXT?>: <a><?=PHONE_TEXT_SRC?></a></li>
                    <li><?=FAX_TEXT?>: <a><?=FAX_TEXT_SRC?></a></li>
                            <?php/* if($author_info->user_url) {?>
                    <li> <a href="<?php echo $author_info->user_url;?>"> <?php _e(AGENT_WEBSITE_TEXT); ?> </a></li>
                                <?php }?>
                    <li> <a href="<?php echo get_author_link($echo = false, $post->post_author);?>"> <?php _e(AGENT_OTHR_LISTING_TEXT); ?></a></li>
                            <?php if(get_usermeta( $post->post_author, 'user_phone' )) {?>
                    <li> <?php _e(PHONE_TEXT); ?> : <?php echo get_usermeta( $post->post_author, 'user_phone' );?></li>
                                <?php }*/?>
                </ul>

            </div>



        </div> <!-- agent info #end -->



                <?php
                $add_arr = array();
                /*if(get_post_meta($post->ID,'address',true))
			{
				$add_arr[] = get_post_meta($post->ID,'address',true);
			}*/
                if(get_post_meta($post->ID,'add_city',true)) {
                    $add_arr[] = get_post_meta($post->ID,'add_city',true);
                }
                if(get_post_meta($post->ID,'add_state',true)) {
                    $add_arr[] = get_post_meta($post->ID,'add_state',true);
                }
                if(get_post_meta($post->ID,'add_country',true)) {
                    $add_arr[] = get_post_meta($post->ID,'add_country',true);
                }
                if(get_post_meta($post->ID,'add_zip_code',true)) {
                    $add_arr[] = get_post_meta($post->ID,'add_zip_code',true);
                }
                $add_str = '';
                if($add_arr) {
                    $add_str = implode('+',$add_arr);
                }
                if($add_str && 1==0) {
                    ?>
        <div class="propertymap">
            <h2><?php _e(PROPERYT_MAP_TEXT);?></h2>
            <p><!--<img src="<?php bloginfo('template_directory'); ?>/images/i-propertymap.jpg" width="645" height="358" class="map" />-->
                <iframe src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo $add_str;?>&amp;ie=UTF8&amp;z=14&amp;iwloc=A&amp;output=embed" height="358" width="645"></iframe>
            </p>
        </div>
                    <?php }?>


        <div class="navigation navigation_detail">
                    <?php previous_post_link('%link',PREVIOUS_PROPERTY) ?>
                    <?php next_post_link('%link',NEXT_PROPERTY) ?>
        </div>
                <?php if(get_option('ptthemes_set_comments')) {?>
        <div id="comments">  <?php comments_template(); ?></div>
                    <?php }?>

                <?php require_once (TEMPLATEPATH . '/library/includes/related_properties.php');?>
    </div>
    <div class="sidebar sidebar_<?php echo stripslashes(get_option('ptthemes_sidebar_left'));  ?>">
        <div class="sidebar_top">
            <div class="sidebar_bottom">
                        <?php dynamic_sidebar(7);  ?>
            </div>
        </div>
    </div>

        <?php endwhile; ?>
    <?php endif; ?>