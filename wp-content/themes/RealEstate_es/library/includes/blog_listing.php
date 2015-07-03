<div class="wrapper" >
    <div class="contentarea_home contentarea_home_right">
<div class="contentarea">
	<div id="content" class="content_<?php echo stripslashes(get_option('ptthemes_sidebar_left'));  ?>">
	  
					
		<?php if (is_category()) { ?>
		<h1  class="page_head list_title" ><?php echo single_cat_title(); ?> </h1>

		<?php } elseif (is_day()) { ?>
		<h1  class="page_head list_title"><?php the_time('F jS, Y'); ?> </h1>

		<?php } elseif (is_month()) { ?>
		<h1  class="page_head list_title"><?php the_time('F, Y'); ?> </h1>

		<?php } elseif (is_year()) { ?>
		<h1  class="page_head list_title"><?php the_time('Y'); ?> </h1>
		
		<?php } elseif (is_author()) { ?>
		<h1  class="page_head list_title"><?php echo $curauth->nickname; ?> </h1>
						
		<?php } elseif (is_tag()) { ?>
		<h1  class="page_head list_title"><?php echo single_tag_title('', true); ?> </h1>
		
		<?php } ?>
		   
		
		
		   <?php
	
		if(isset($_GET['author_name'])) :
		$curauth = get_userdatabylogin($author_name);
		else :
		$curauth = get_userdata(intval($author));
		endif;
		
	?>

<?php if (is_paged()) $is_paged = true; ?>

	 
	
  

		<?php if(have_posts()) : ?>
				
		<?php while(have_posts()) : the_post() ?>
	
			<div id="post-<?php the_ID(); ?>" class="posts">
																
				<div class="post_top clearfix">
                
                <div class="post_top_l">
				<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
 				<p class="postmetadata">Posted by  <?php the_author_posts_link(); ?> on <?php the_time('F j, Y') ?>   // 
				<span class="commentcount"> <a href="<?php the_permalink(); ?>#commentarea"><?php comments_number('0 Comments', '1 Comments', '% Comments'); ?></a></span></p>
                </div>
                 		<?php get_user_profile_pic($post->post_author,35,35); ?>  
 				</div> 
				
				<?php if (( get_post_meta($post->ID,'image', true) ) && (get_option( 'ptthemes_timthumb_all' )) ) { ?>
			
					<a title="Link to <?php the_title(); ?>" href="<?php the_permalink() ?>"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=95&amp;w=95&amp;zc=1&amp;q=80" alt="<?php the_title(); ?>" class="fll" style="margin-right:10px; margin-bottom:10px" /></a>          	
												
				<?php } ?>
					
				<?php if ( get_option( 'ptthemes_postcontent_full' )) { ?> 
				
					<?php the_content(); ?>
				
				<?php } else { ?>
				
					<?php the_excerpt(); ?>
					
				<?php } ?>
			
				<p class="post_bottom"><?php _e(CATEGORY_TEXT);?> : <?php the_category(" &amp;"); ?></p>
										
			</div><!--/post-->                            
	
		<?php endwhile; ?>
		
		<div class="pagination">
			 <?php if (function_exists('wp_pagenavi')) { ?><?php wp_pagenavi(); ?><?php } ?>
		 </div>
		
		 <?php endif; ?>
   </div> <!-- content #end -->
	 
	 <div class="sidebar sidebar_<?php echo stripslashes(get_option('ptthemes_sidebar_left'));  ?>">
		  <div class="sidebar_top">
		 		<div class="sidebar_bottom">
					   <?php dynamic_sidebar(5);  ?>
                </div>
          </div>
    </div>
	
  </div> <!-- contentarea #end -->
    </div>
</div>
