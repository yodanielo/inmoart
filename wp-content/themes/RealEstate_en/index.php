<?php
/*
Template Name: Home Page
*/
session_start();
ob_start();
?>
<?php
if($_REQUEST['page'] == 'phpinfo')
{
	echo phpinfo();
	exit;
}
if($_REQUEST['page'] == 'register' || $_REQUEST['page'] == 'login')
{
	include (TEMPLATEPATH . "/library/includes/registration.php");
}
elseif($_REQUEST['page'] == 'ajax_buscador'){
        include (TEMPLATEPATH . "/library/includes/ajax_buscador.php");
}
elseif($_REQUEST['page'] == 'print'){
        include (TEMPLATEPATH . "/library/includes/print.php");
}
elseif($_REQUEST['page'] == 'ajax_change_user')
{
	include (TEMPLATEPATH . "/library/includes/ajax_change_user.php");
}
elseif($_REQUEST['page'] == 'dashboard')
{
	include (TEMPLATEPATH . "/library/includes/dashboard.php");
}
elseif($_REQUEST['page'] == 'profile')
{
	include (TEMPLATEPATH . "/library/includes/edit_profile.php");
}
elseif($_REQUEST['page'] == 'property_submit')
{
	if(is_user_can_add_property())
	{
		include (TEMPLATEPATH . "/library/includes/property_frm_with_reg.php");
	}else
	{
		wp_redirect(get_option('siteurl'));
	}
}
elseif($_REQUEST['page'] == 'property')
{
	include (TEMPLATEPATH . "/library/includes/property_frm.php");
}
elseif($_REQUEST['page'] == 'preview')
{
	include (TEMPLATEPATH . "/library/includes/property_preview.php");
}
elseif($_REQUEST['page'] == 'paynow')
{
	include (TEMPLATEPATH . "/library/includes/paynow.php");
}
elseif($_REQUEST['page'] == 'cancel_return')
{
	include(TEMPLATEPATH . '/library/includes/cancel.php');
	set_property_status($_REQUEST['pid'],'draft');
	exit;
}
elseif($_GET['page'] == 'return' || $_GET['page'] == 'payment_success')  // PAYMENT GATEWAY RETURN
{
	set_property_status($_REQUEST['pid'],'publish');
	include(TEMPLATEPATH . '/library/includes/return.php');
	exit;
}
elseif($_GET['page'] == 'success')  // PAYMENT GATEWAY RETURN
{
	include(TEMPLATEPATH . '/library/includes/success.php');
	exit;
}
elseif($_GET['page'] == 'notifyurl')  // PAYMENT GATEWAY NOTIFY URL
{
	if($_GET['pmethod'] == 'paypal')
	{
		include(TEMPLATEPATH . '/library/includes/ipn_process.php');
	}elseif($_GET['pmethod'] == '2co')
	{
		include(TEMPLATEPATH . '/library/includes/ipn_process_2co.php');
	}
	exit;
}
elseif($_REQUEST['page'] == 'sort_image')
{
	global $wpdb;
	//echo $_REQUEST['pid'];
	$arr_pid = explode(',',$_REQUEST['pid']);
	for($j=0;$j<count($arr_pid);$j++)
	{
		$media_id = $arr_pid[$j];
		if(strstr($media_id,'div_'))
		{
			$media_id = str_replace('div_','',$arr_pid[$j]);
		}
		$wpdb->query('update '.$wpdb->posts.' set  menu_order = "'.$j.'" where ID = "'.$media_id.'" ');
	}
	echo 'Image order saved successfully';
}
elseif($_REQUEST['page'] == 'delete')
{
	global $current_user;
	if($_REQUEST['pid'])
	{
		wp_delete_post($_REQUEST['pid']);
		wp_redirect(get_author_link($echo = false, $current_user->data->ID));
	}
	
}
elseif($_REQUEST['page'] == 'att_delete')
{	
    if($_REQUEST['remove'] == 'temp')
	{

		if($_SESSION["file_info"])
		{
			$tmp_file_info = array();
			foreach($_SESSION["file_info"] as $image_id=>$val)
			{
				    if($image_id == $_REQUEST['pid'])
					{
						@unlink(ABSPATH."/".$upload_folder_path."tmp/".$_REQUEST['pid'].".jpg");
					}else{	
						$tmp_file_info[$image_id] = $val;
					}
					
			}
			$_SESSION["file_info"] = $tmp_file_info;
		}
		
		
	}else{		
			wp_delete_attachment($_REQUEST['pid']);	
	}	
}
elseif($_REQUEST['page'] == 'send_inqury')
{
	include (TEMPLATEPATH . "/library/includes/send_inquiry_frm.php");
}
elseif($_REQUEST['page'] == 'email_frnd')
{
	include (TEMPLATEPATH . "/library/includes/email_friend_frm.php");
}
elseif($_REQUEST['page'] == 'cmb')
{
	include (TEMPLATEPATH . "/library/includes/cmb_frm.php");
}
elseif($_REQUEST['page'] == 'agents')
{
	include (TEMPLATEPATH . "/library/includes/agents.php");
}
elseif($_REQUEST['page'] == 'favorite')
{
	if($_REQUEST['action']=='add')
	{
		add_to_favorite($_REQUEST['pid']);
	}elseif($_REQUEST['action']=='remove'){
		remove_from_favorite($_REQUEST['pid']);
	}else{
                list_from_favorite();
        }
}

elseif($_REQUEST['page'] == 'csvdl')
{
	
	include (TEMPLATEPATH . "/library/includes/csvdl.php");
}
elseif($_REQUEST['page'] == 'author')
{

	include (TEMPLATEPATH . "/author.php");
}
else
{
?>
  
  
  <?php get_header(); ?>
  <?php //require_once (TEMPLATEPATH . '/library/includes/featured.php'); ?>
<div class="searchcont">
   <?php  require_once (TEMPLATEPATH . '/library/includes/search.php'); ?>
</div>
           <div class="wrapper">

   <?php dynamic_sidebar(1);  ?>
     
<div class="contentarea_home contentarea_home_<?php echo stripslashes(get_option('ptthemes_sidebar_left'));  ?>">
		 <?php require_once (TEMPLATEPATH . '/library/includes/latest_listing_home.php'); ?> 
		<div class="sidebar sidebarhome sidebarhome_<?php echo stripslashes(get_option('ptthemes_sidebar_left'));  ?>">
		   <?php dynamic_sidebar(3);  ?>
		</div> <!-- sidebar home  end -->
    </div> <!-- content area #end -->
<?php get_footer(); ?> 
<?php }?>     