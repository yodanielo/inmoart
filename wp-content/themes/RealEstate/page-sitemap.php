<?php
/*
Template Name: Sitemap Page
*/
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
            <div id="content" class="content_<?php echo stripslashes(get_option('ptthemes_sidebar_left'));  ?>">

                <h1 class="page_head"><?php the_title(); ?></h1>


                <div class="column_l">
                    <h3>Pages :</h3>
                    <ul >
                        <?php wp_list_pages('title_li='); ?>
                    </ul>

                    <h3>Categories :</h3>
                    <ul>
                        <?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?>
                    </ul>


                </div> <!--column_l #end  -->


                <div class="column_r">

                    <h3>Monthly Archives :</h3>
                    <ul>
                        <?php wp_get_archives('type=monthly'); ?>
                    </ul>


                    <h3>Latest Post :</h3>
                    <ul>
                        <?php $archive_query = new WP_Query('showposts=60');

                        while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
                        <li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
                                    <?php the_title(); ?>
                            </a>
                                <?php comments_number('0', '1', '%'); ?>
                        </li>
                        <?php endwhile; ?>
                    </ul>

                    <h3>RSS Feed :</h3>
                    <ul>
                        <li><a href="<?php bloginfo('rdf_url'); ?>" title="RDF/RSS 1.0 feed"><acronym title="Resource Description Framework">RDF</acronym>/<acronym title="Really Simple Syndication">RSS</acronym> 1.0 feed</a></li>
                        <li><a href="<?php bloginfo('rss_url'); ?>" title="RSS 0.92 feed"><acronym title="Really Simple Syndication">RSS</acronym> 0.92 feed</a></li>
                        <li><a href="<?php bloginfo('rss2_url'); ?>" title="RSS 2.0 feed"><acronym title="Really Simple Syndication">RSS</acronym> 2.0 feed</a></li>
                        <li><a href="<?php bloginfo('atom_url'); ?>" title="Atom feed">Atom feed</a></li>
                    </ul>

                </div> <!--column_r #end  -->


            </div> <!-- content #end -->

            <div class="sidebar sidebar_<?php echo stripslashes(get_option('ptthemes_sidebar_left'));  ?>">
                <div class="sidebar_top">
                    <div class="sidebar_bottom clearfix">
                        <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(4) )  ?>
                    </div>
                </div>
            </div>

        </div> <!--contentarea #end  -->
    </div><!--cntentareahome #end-->
</div><!--wrapper #end-->
<?php get_footer(); ?>
