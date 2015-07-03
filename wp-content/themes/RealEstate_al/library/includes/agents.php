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
	<!-- search end -->
    
<div class="wrapper" >
    <div class="contentarea_home contentarea_home_right">
    
    
 <div class="main_content main_content_<?php echo stripslashes(get_option('ptthemes_sidebar_left'));  ?>">
    	<div id="content">
		<?php 
		if($_REQUEST['sort']=='alpha'){
		$kw = $_REQUEST['kw'];
		if($kw==''){$kw = 'a';}
		}
		$arrAgents=custom_list_authors('',array('kw'=>$kw,'sort'=>$_REQUEST['sort'])); ?>
                       
        	 <h1 class="page_head"><?php _e(AGT_LISTING_TEXT); ?> </h1>

             <ul class="tab">
            	<li class="normal"> <?php _e(AGT_SORTBY_TEXT); ?> :</li>
                <li <?php if($_REQUEST['sort']==''){echo 'class="current"';}?>><a href="<?php echo get_option('siteurl');?>/?page=agents"> <?php _e(AGT_ALL_LISTING_TEXT); ?> </a></li>
				 <li <?php if($_REQUEST['sort']=='alpha'){echo 'class="current"';}?>><a href="<?php echo get_option('siteurl');?>/?page=agents&sort=alpha"> <?php _e(AGT_ALPHA_LISTING_TEXT); ?></a></li>
				  <li <?php if($_REQUEST['sort']=='most'){echo 'class="current"';}?>><a href="<?php echo get_option('siteurl');?>/?page=agents&sort=most"> <?php _e(AGT_MOST_LISTING_TEXT); ?></a></li>
            </ul>
            <?php if($_REQUEST['sort']=='alpha'){
			?>
			<ul class="alphabetical">
			<li <?php if($kw=='a'){ echo 'class="current"';}?>><a href="<?php echo get_option('siteurl')?>/?page=agents&sort=alpha&kw=a">A</a></li>
			<li <?php if($kw=='b'){ echo 'class="current"';}?>><a href="<?php echo get_option('siteurl')?>/?page=agents&sort=alpha&kw=b">B</a></li>
			<li <?php if($kw=='c'){ echo 'class="current"';}?>><a href="<?php echo get_option('siteurl')?>/?page=agents&sort=alpha&kw=c">C</a></li>
			<li <?php if($kw=='d'){ echo 'class="current"';}?>><a href="<?php echo get_option('siteurl')?>/?page=agents&sort=alpha&kw=d">D</a></li>
			<li <?php if($kw=='e'){ echo 'class="current"';}?>><a href="<?php echo get_option('siteurl')?>/?page=agents&sort=alpha&kw=e">E</a></li>
            <li <?php if($kw=='f'){ echo 'class="current"';}?>><a href="<?php echo get_option('siteurl')?>/?page=agents&sort=alpha&kw=f">F</a></li>
            <li <?php if($kw=='g'){ echo 'class="current"';}?>><a href="<?php echo get_option('siteurl')?>/?page=agents&sort=alpha&kw=g">G</a></li>
            <li <?php if($kw=='h'){ echo 'class="current"';}?>><a href="<?php echo get_option('siteurl')?>/?page=agents&sort=alpha&kw=h">H</a></li>
            <li <?php if($kw=='i'){ echo 'class="current"';}?>><a href="<?php echo get_option('siteurl')?>/?page=agents&sort=alpha&kw=i">I</a></li>
            <li <?php if($kw=='j'){ echo 'class="current"';}?>><a href="<?php echo get_option('siteurl')?>/?page=agents&sort=alpha&kw=j">J</a></li>
            <li <?php if($kw=='k'){ echo 'class="current"';}?>><a href="<?php echo get_option('siteurl')?>/?page=agents&sort=alpha&kw=k">K</a></li>
            <li <?php if($kw=='l'){ echo 'class="current"';}?>><a href="<?php echo get_option('siteurl')?>/?page=agents&sort=alpha&kw=l">L</a></li>
            <li <?php if($kw=='m'){ echo 'class="current"';}?>><a href="<?php echo get_option('siteurl')?>/?page=agents&sort=alpha&kw=m">M</a></li>
            <li <?php if($kw=='n'){ echo 'class="current"';}?>><a href="<?php echo get_option('siteurl')?>/?page=agents&sort=alpha&kw=n">N</a></li>
           <li <?php if($kw=='o'){ echo 'class="current"';}?>> <a href="<?php echo get_option('siteurl')?>/?page=agents&sort=alpha&kw=o">O</a></li>
           <li <?php if($kw=='p'){ echo 'class="current"';}?>> <a href="<?php echo get_option('siteurl')?>/?page=agents&sort=alpha&kw=p">P</a></li>
            <li <?php if($kw=='q'){ echo 'class="current"';}?>><a href="<?php echo get_option('siteurl')?>/?page=agents&sort=alpha&kw=q">Q</a></li>
            <li <?php if($kw=='r'){ echo 'class="current"';}?>><a href="<?php echo get_option('siteurl')?>/?page=agents&sort=alpha&kw=r">R</a></li>
            <li <?php if($kw=='s'){ echo 'class="current"';}?>><a href="<?php echo get_option('siteurl')?>/?page=agents&sort=alpha&kw=s">S</a></li>
            <li <?php if($kw=='t'){ echo 'class="current"';}?>><a href="<?php echo get_option('siteurl')?>/?page=agents&sort=alpha&kw=t">T</a></li>
            <li <?php if($kw=='u'){ echo 'class="current"';}?>><a href="<?php echo get_option('siteurl')?>/?page=agents&sort=alpha&kw=u">U</a></li>
            <li <?php if($kw=='v'){ echo 'class="current"';}?>><a href="<?php echo get_option('siteurl')?>/?page=agents&sort=alpha&kw=v">V</a></li>
            <li <?php if($kw=='w'){ echo 'class="current"';}?>><a href="<?php echo get_option('siteurl')?>/?page=agents&sort=alpha&kw=w">W</a></li>
            <li <?php if($kw=='x'){ echo 'class="current"';}?>><a href="<?php echo get_option('siteurl')?>/?page=agents&sort=alpha&kw=x">X</a></li>
            <li <?php if($kw=='y'){ echo 'class="current"';}?>><a href="<?php echo get_option('siteurl')?>/?page=agents&sort=alpha&kw=y">Y</a></li>
            <li <?php if($kw=='z'){ echo 'class="current"';}?>><a href="<?php echo get_option('siteurl')?>/?page=agents&sort=alpha&kw=z">Z</a></li>
            </ul>
			<?php }?>
               <ul class="agentlisting">
		<?php 
		if($_REQUEST['sort']=='alpha'){
		$kw = $_REQUEST['kw'];
		if($kw==''){$kw = 'a';}
		}
		$totalpost_count = custom_list_authors_count('',array('kw'=>$kw,'sort'=>$_REQUEST['sort']));
		if(count($arrAgents)>0)
		{
		foreach($arrAgents as $key => $value)
			{
			 $userDetail=get_usermeta( $value->ID,'user_address_info');
			
		 ?>
                 <li > 
                	<!--<img src="<?php //bloginfo('template_directory'); ?>/images/agent1.png" alt="" title=""   />-->

                        <?php get_user_profile_pic($value ->ID,100,100); ?>
                	<h3><span class="fl"> <a href="<?php echo get_author_link($echo = false,$value->ID);?>"><?php echo $value->display_name; ?></a> </span>   <span class="total_homes"> <a href="<?php echo get_author_link($echo = false,$value->ID);?>"><?php _e(AGT_LISTED_TEXT); ?> <?php echo get_usernumposts_count($value->ID); ?> <?php _e(AGT_PROPERTY_TEXT); ?> &raquo; </a></span></h3>
                     <p class="agentlinks" >
                     <?php if($value->user_url){ ?>
                      <span><a href="<?php echo $value->user_url; ?>"><?php _e(AGT_VISIT_WEBSITE_TEXT); ?></a> </span> 
                      <?php } ?>
                     <?php if($value -> user_twitter){ ?>
                      <span><a href="<?php echo $value->user_twitter; ?>">| <?php _e(AGT_TWITTER_TEXT); ?></a></span> 
                      <?php } ?>
                      </p>
                     <p><?php echo substr($value->user_description,0,250); ?> </p>
                     
                   <p class="links"> <a href="#" class="i_email_agent" onclick="document.getElementById('agt_mail_agent_aid').value=<?php echo $value->ID; ?>;document.getElementById('agt_mail_agent_pid').value='';" ><?php _e(AGT_EMAIL_TEXT); ?></a> 
                   <?php if($value->user_phone){ ?>
                    <span class="phone"><?php _e(AGT_PHONE_TEXT); ?> : <?php echo $value->user_phone; ?></span> 
                    <?php } ?>
                    <span class="fr profile" ><a href="<?php echo get_author_link($echo = false,$value->ID);?>"  class="" ><?php _e(AGT_VIEW_PROFILE_TEXT); ?> &raquo;</a></span> </p>
                </li>                   
                <?php } ?>
		<?php
		}else
		{
		?>
		<p class="ac"><?php _e(AGT_NO_LISTING_MSG);?>"<b><?php echo strtoupper($kw);?></b>"</p>
		<?php
		}
		?>	              
             </ul>
             
             
            <!-- Pagination -->
              <div class="pagination">
			 <?php if (function_exists('wp_pagenavi')) { ?><?php wp_pagenavi(); ?><?php } ?>
			 </div>
             
         
        </div> <!-- content #end -->
    
		  
        
        </div> <!-- main content #end -->
        
		<?php get_sidebar(); ?>  <!-- sidebar #end -->
        
        
   </div>
</div>
 <?php get_footer(); ?>