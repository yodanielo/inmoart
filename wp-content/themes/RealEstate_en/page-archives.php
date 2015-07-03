<?php
/*
Template Name: Archive Page
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
 
         
   	 <ul class="archive_list"> 
             <?php query_posts('showposts=60'); ?>
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <li>
            <div class="archives-time">
              <?php the_time('M j Y') ?>
            </div>
            <a href="<?php the_permalink() ?>">
            <?php the_title(); ?>
            </a> - <?php echo $post->comment_count ?> </li>
          <?php endwhile; endif; ?>
            </ul>
        
          
     
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
