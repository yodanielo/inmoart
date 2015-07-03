<div class="sidebar sidebarhome sidebarhome_right">
	

		<?php
			global $homepage_flag;
			if((is_home() || $homepage_flag) && ($_REQUEST['page']=='profile' || $_REQUEST['page']=='dashboard'))
			{
				global $current_user;
			?>
			<div class="editprofile"><h3><?php _e(MY_ACCOUNT_TEXT);?></h3>
			<ul class="xoxo blogroll">
				<li><a href="<?php echo get_author_link($echo = false, $current_user->data->ID);?>"><?php _e(DASHBOARD_TEXT);?></a></li>
				<li><a href="<?php echo get_option('siteurl');?>/?page=profile"><?php _e(EDIT_PROFILE_PAGE_TITLE);?></a></li>
				<li><a href="<?php echo get_option('siteurl');?>/?page=profile#change_pw"><?php _e(CHANGE_PW_TEXT);?></a></li>
			</ul>
			</div>
			<?php }?>	
            
             <?php if($_REQUEST['page']=='profile'){ echo '';}else{?>
            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(7) )  ?> 
			 <?php }?>
		
</div> 