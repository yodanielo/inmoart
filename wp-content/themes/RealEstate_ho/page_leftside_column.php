<?php
/*
Template Name: Page Sidebar Postion Left align 
*/
?>
<?php get_header(); ?>
<div class="breadcrumbs">
		<p><?php if ( get_option( 'ptthemes_breadcrumbs' )) { yoast_breadcrumb('',''); } ?></p>
		<span class="findproperties" onclick="show_hide_propertysearchoptions();"><a href="javascript:void(0);"><?php _e(FIND_PROPERTIES_TEXT);?><img src="<?=bloginfo("template_directory")?>/images/ico-find-properties.png"/></a></span>
	</div>
    <?php require_once (TEMPLATEPATH . '/library/includes/search.php');  ?>
    
    
    <div class="contentarea">
		<div id="content" class="content content_left">
        
        <h1 class="page_head"><?php the_title(); ?></h1>
        		
               <?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post() ?>
             <?php $pagedesc = get_post_meta($post->ID, 'pagedesc', $single = true); ?>
            
        
                    <div id="post-<?php the_ID(); ?>" >
                        <div class="entry"> 
                            <?php the_content(); ?>
                        </div>
                    </div><!--/post-->
                
            <?php endwhile; else : ?>
        
                    <div class="posts">
                        <div class="entry-head"><h2><?php echo get_option('ptthemes_404error_name'); ?></h2></div>
                        <div class="entry-content"><p><?php echo get_option('ptthemes_404solution_name'); ?></p></div>
                    </div>
        
        <?php endif; ?>
        
        </div> <!-- content #end -->
        	
             
		<div class="sidebar sidebar_left">
	<div class="sidebar_top">
			<div class="sidebar_bottom clearfix">
			    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(4) )  ?>
        	 </div>
	</div>
</div> 
		
        </div> <!--contentarea #end  -->
 <?php get_footer(); ?>