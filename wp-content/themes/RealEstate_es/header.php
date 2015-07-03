<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head profile="http://gmpg.org/xfn/11">
        <title>
            <?php if ( is_home() ) { ?><?php bloginfo('name'); ?><?php } ?>
            <?php if ( is_search() ) { ?>Search Results&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
            <?php if ( is_author() ) { ?>Author Archives&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
            <?php if ( is_single() ) { ?><?php wp_title(''); ?><?php } ?>
            <?php if ( is_page() ) { ?><?php wp_title(''); ?><?php } ?>
            <?php if ( is_category() ) { ?><?php single_cat_title(); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
            <?php if ( is_month() ) { ?><?php the_time('F'); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
            <?php if (function_exists('is_tag')) {
                if ( is_tag() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Tag Archive&nbsp;|&nbsp;<?php single_tag_title("", true);
                }
            }
            ?>
        </title>

        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <?php if (is_home()) { ?>
            <?php if ( get_option('ptthemes_meta_description') <> "" ) { ?>
        <meta name="description" content="<?php echo stripslashes(get_option('ptthemes_meta_description')); ?>" />
                <?php } ?>
            <?php if ( get_option('ptthemes_meta_keywords') <> "" ) { ?>
        <meta name="keywords" content="<?php echo stripslashes(get_option('ptthemes_meta_keywords')); ?>" />
                <?php } ?>
            <?php if ( get_option('ptthemes_meta_author') <> "" ) { ?>
        <meta name="author" content="<?php echo stripslashes(get_option('ptthemes_meta_author')); ?>" />
                <?php } ?>
            <?php } ?>
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />

        <?php if ( get_option('ptthemes_favicon') <> "" ) { ?>
        <link rel="icon" type="image/png" href="<?php echo get_option('ptthemes_favicon'); ?>" />
            <?php } ?>
        <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('ptthemes_feedburner_url') <> "" ) {
            echo get_option('ptthemes_feedburner_url');
        } else {
            echo get_bloginfo_rss('rss2_url');
              } ?>" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <!--[if IE]>
            <link type='text/css' href='<?php bloginfo('template_directory'); ?>/library/css/ie8-7.css' rel='stylesheet' media='screen' />
        <![endif]-->
        <!--[if lt IE 7]>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/pngfix.js"></script>
        <link type='text/css' href='<?php bloginfo('template_directory'); ?>/library/css/basic_ie.css' rel='stylesheet' media='screen' />

        <SCRIPT src="<?php bloginfo('template_directory'); ?>/library/js/jquery.js"
        type=text/javascript></SCRIPT>

        <SCRIPT src="<?php bloginfo('template_directory'); ?>/library/js/jquery.helper.js"
        type=text/javascript></SCRIPT>

        <![endif]-->
        <!--[if IE 7]>
        <style type="text/css">
            .agent_row .textfield,
            #property_frnd_comments{
                margin:0px;
                float:left;
                clear":both;
                margin-left:-30px;
            }
        </style>
        <![endif]-->
        <?php if ( get_option('ptthemes_scripts_header') <> "" ) {
            echo stripslashes(get_option('ptthemes_scripts_header'));
        } ?>
        <link href="<?php bloginfo('template_directory'); ?>/library/css/superfish.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css"  href="<?php bloginfo('template_directory'); ?>/library/css/print.css" media="print"/>
        <link type='text/css' href='<?php bloginfo('template_directory'); ?>/library/css/basic.css' rel='stylesheet' media='screen' />
        <link type='text/css' href='<?php bloginfo('template_directory'); ?>/library/css/dropdownmenu.css' rel='stylesheet' media='screen' />
        <link type='text/css' href='<?php bloginfo('template_directory'); ?>/library/css/dd.css' rel='stylesheet' media='screen' />
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/jquery-1.2.6.min.js" ></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/jquery.dd.js" ></script>

        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/blogger.js"></script>

        <?php if ( is_single() || is_page() ) wp_enqueue_script( 'comment-reply' ); ?>

        <!-- For Menu -->
        <?php wp_head(); ?>
        <?php if ( get_option('ptthemes_customcss') ) { ?>
        <link href="<?php bloginfo('template_directory'); ?>/custom.css" rel="stylesheet" type="text/css">
                <?php } ?>
            <script type="text/javascript">
                $(document).ready(function(){
                    if($.browser.msie){
                        $(".ddChild").css({"z-index":900,"position":"absolute"});
                        $("#propertysearchoptions").append('<div style="clear:both;"></div>').css({"position":"relative","z-index":10,"overflow":"visible"});
                    }
                })
            </script>
    </head>

    <body>
<?php
global $post;
?>
        <div class="wrapperheader<?=' page'.$post->ID?><?php
        if(!is_home()) {
            switch($post->ID) {
                case '90'://about us-> environment
                    echo ' wrapperheaderenvironment';
                    break;
                default:
                    echo ' wrapperheaderusual';
            }

        }
        else {
            echo '';
        }
             ?>">
            <script type="text/javascript">
                function chlang(l){
                    jQuery.ajax({
                        url:'/setlang.php',
                        data:'lang='+l,
                        type:'POST',
                        success:function(data){
                            /*u=window.location.href;
                            window.location.href=u;*/
                            r='<?= bloginfo('siteurl')?>/../'+l;
                            window.location.href=r;
                        }
                    })
                }
            </script>
            <div id="banderitascont">
                <?php
                global $userdata;
                if($userdata->ID)
                    $urlsign=get_bloginfo( 'url', 'display' )."?page=property_submit";
                else
                    $urlsign=get_bloginfo( 'url', 'display' )."?page=login";
                ?>
                <?php
                $qs = "SELECT * FROM wp_blogs WHERE public=1 and deleted=0";
                $lsites=$wpdb->get_results($qs);
                foreach($lsites as $l){
                    $sl=($l->path=='/'?'en':str_replace("/", "", $l->path));
                    echo '<a id="'.$sl.'" href="http://inmoart.co.uk'.$l->path.'"><img src="'.get_option('siteurl').'/wp-content/themes/RealEstate/images/flag-'.$sl.'.png"/></a>';
                }
                ?>
                <a id="sigin" href="<?=$urlsign?>"><img src="<?php bloginfo('template_directory')?>/images/b-sign-in.png"/></a>
            </div>
            <div id="banprincont">
                <div id="banprincenter">
                    <?php if ( get_option('ptthemes_show_blog_title') ) { ?>

                    <div class="logo">  <div class="blog-title"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a> </div>
                        <p class="blog-description">
                                <?php bloginfo('description'); ?>
                        </p> </div>

                        <?php } else { ?>

                    <div class="logo"><a href="<?php echo get_option('siteurl');?>"><img src="<?php if ( get_option('ptthemes_logo_url') <> "" ) {
                                    echo get_option('ptthemes_logo_url');
                                } else {
                                    echo get_bloginfo('template_directory').'/images/i-logo.png';
                                                                                             } ?>" alt="<?php bloginfo('name'); ?>" alt="" title="" /></a>
                    </div>
                        <?php } ?>
                    <div class="menu">
                        <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Header Navigation') ) {

                        }else {  ?>
                            <?php
                            global $wpdb;
                            $blogcatname = get_option('ptthemes_blogcategory');
                            $catid = $wpdb->get_var("SELECT term_ID FROM $wpdb->terms WHERE name = \"$blogcatname\"");
                            ?>
                        <ul >
                            <li class="hometab <?php if ( is_home() && $_REQUEST['page']=='' ) { ?> current_page_item <?php } ?>"><a href="<?php echo get_option('home'); ?>/"><?php _e(HOME_TEXT); ?></a></li>
                                <?php if(get_option('ptthemes_borwse_link_flag') && !get_option('ptthemes_borwse_link_pos_flag')) {?>
                            <li class="<?php if($_REQUEST['s']=='viewmore') {
                                        echo 'current_page_item';
                                        }?>">
                                <a href="<?php echo get_option('siteurl');  ?>/index.php?s=viewmore"><?php _e(BROWSE_PROPERTY_TEXT);?></a>
                            </li>
                            <!--<li class="<?php if($_REQUEST['s']=='new_build') {
                                        echo 'current_page_item';
                                    }?>">
							<a href="<?php echo get_option('siteurl');  ?>/index.php?s=new_build">New Builds</a>
						</li>-->
                                    <?php }?>
                                <?php if(get_option('ptthemes_agents_link_flag') && !get_option('ptthemes_agents_link_post_flag')) {?>
                            <li class="<?php if($_REQUEST['page']=='agents') {
                                        echo 'current_page_item';
                                        }?>">
                                <a href="<?php echo get_option('siteurl');  ?>/?page=agents"><?php _e(AGENT_LISTING_TEXT);?></a>
                            </li>
                                    <?php }?>
                                <?php wp_list_pages('title_li=&depth=0&exclude=' . get_inc_pages("pag_exclude_") .'&sort_column=menu_order'); ?>
                                <?php if ( get_option('ptthemes_blogcategory') <> "" ) { ?>
                                    <?php /*?><li <?php if ( is_category() || is_tag() ) { ?> class="current_page_item" <?php } ?>><a href="<?php echo get_category_link( $catid ); ?>" title="<?php echo $blogcatname; ?>"><?php echo $blogcatname; ?></a></li>               <?php */?>
                                    <?php
                                    if($catid) {
                                        $catid = get_sub_categories($catid,'string');
                                        wp_list_categories ('title_li=&depth=0&include=' . $catid . '&sort_column=menu_order&show_option_all=true&show_option_none=');
                                    }
                                    ?>

                                    <?php } ?>


                                <?php if(get_option('ptthemes_borwse_link_flag') && get_option('ptthemes_borwse_link_pos_flag')) {?>
                            <li class="<?php if($_REQUEST['s']=='viewmore') {
                                        echo 'current_page_item';
                                        }?>">
                                <a href="<?php echo get_option('siteurl');  ?>/index.php?s=viewmore"><?php _e(BROWSE_PROPERTY_TEXT);?></a>
                            </li>
                            <!--<li class="<?php if($_REQUEST['s']=='new_build') {
                                        echo 'current_page_item';
                                    }?>">
							<a href="<?php echo get_option('siteurl');  ?>/index.php?s=newbuild">New Builds</a>
						</li>-->
                                    <?php }?>
                                <?php if(get_option('ptthemes_agents_link_flag') && get_option('ptthemes_agents_link_post_flag')) {?>
                            <li class="<?php if($_REQUEST['page']=='agents') {
                                        echo 'current_page_item';
                                        }?>">
                                <a href="<?php echo get_option('siteurl');  ?>/?page=agents"><?php _e(AGENT_LISTING_TEXT);?></a>
                            </li>
                                    <?php }?>
                        </ul>
                            <?php }?>
                    </div>
                </div>

            </div>
             <script type="text/javascript">
                 jQuery(".page-item-90 a").html("<?=ABOUT_THE_AREA?>");
jQuery("a:contains('true')").parent().remove();            </script>
            <div class="wrapper header">




                <div id="banner"><?php //include('banners.php') ?></div>
                <div class="toplinks" style="display:none">
                    <ul >
                        <?php
                        if(is_allow_user_register()) {
                            global $current_user;
                            if($current_user->ID) {
                                ?>
                        <li class="welcome"><?php _e(WELCOME_TEXT);?>, <strong><?php echo $current_user->display_name;?></strong></li>
                        <li><a href="<?php echo get_author_link($echo = false, $current_user->data->ID);?>" class="signin"><?php _e(MY_PROFILE_TEXT);?></a></li>
                        <li><a href="<?php echo get_option('siteurl');?>/?page=login&action=logout" class="signin"><?php _e(LOGOUT_TEXT);?></a></li>
                                <?php
                            }else {
                                ?>
                        <li><?php _e(WELCOME_TEXT);?>, <strong><?php _e(GUEST_TEXT);?></strong></li>
                        <li><a href="<?php echo get_option('siteurl');?>/?page=login" class="signin"><?php _e(SIGN_IN_TEXT);?></a></li>
                        <li><a href="<?php echo get_option('siteurl');?>/?page=login&page1=sign_up" class="signup"><?php _e(SIGN_UP_TEXT);?></a></li>
                                <?php
                            }
                        }
                        ?>
                    </ul>



                    <div class="header_advt">



                        <?php
                        if(is_user_can_add_property()) {
                            global $current_user;
                            ?>
                        <div class="submitpropertybtn"><a href="<?php echo get_option('siteurl');?>/?page=property_submit"><?php _e(SUBMIT_PROPERTY_TEXT);?></a> </div>
                            <?php }else {
                            ?>
                            <?php if ( get_option('ptthemes_header_advt') != "") { ?>
                                <?php echo stripslashes(get_option('ptthemes_header_advt'));  ?>
                                <?php } ?>
                            <?php }?>
                    </div>


                </div>
            </div>
            <!-- #header end -->
        </div>
        <script type="text/javascript">
            
        </script>
        <?php $totalpost_count = 0;?>