<?php get_header(); ?>

<div class="breadcrumbs">
		<p><?php if ( get_option( 'ptthemes_breadcrumbs' )) { yoast_breadcrumb('',''); } ?></p>
		<span class="findproperties" onclick="show_hide_propertysearchoptions();"><a href="javascript:void(0);"><?php _e(FIND_PROPERTIES_TEXT);?><img src="<?=bloginfo("template_directory")?>/images/ico-find-properties.png"/></a></span>
	</div>
    <?php require_once (TEMPLATEPATH . '/library/includes/search.php');  ?>
	<!-- search end -->
    <div class="wrapper" >
    <div class="contentarea_home contentarea_home_right">

    
    
    
    <div class="contentarea">
		<div class="content_<?php echo stripslashes(get_option('ptthemes_sidebar_left'));  ?>">

             	<h1 class="head">404 Error Page</h1>
 
 
 	<div class="pagespot">

			<div class="post archive-spot">
				    						                        
                <h2><?php echo get_option('ptthemes_404error_name'); ?></h2>
				
				<div class="cat-spot"><p><?php echo get_option('ptthemes_404solution_name'); ?></p></div>

                <div class="fix"></div>
						
            </div><!--/post-->  

		</div><!--/pagespot -->
		
         
		 <?php get_sidebar(); ?>  <!-- sidebar #end -->
		
         
    </div> <!-- container 16-->
   </div> <!-- wrapper #end -->
    </div><!--cntentareahome #end-->
</div><!--wrapper #end-->
<?php get_footer(); ?>
	
	<div class="clearfix"><!----></div>

<?php get_footer(); ?>
