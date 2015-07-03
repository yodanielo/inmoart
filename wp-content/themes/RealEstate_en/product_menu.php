<?php
/////////////////////////////////////////

// ************* Theme Options Page *********** //

add_action('admin_menu', 'mkt_add_product'); //Add new menu block to admin side

function mkt_add_product(){	
	if(function_exists(add_object_page))
    {
        add_object_page ('Real Estate', 'Real Estate', 8,'product_menu.php', 'admin_settings',  get_bloginfo('template_url').'/images/favicon.ico');
    }
    else
    {
        add_menu_page ('Real Estate', 'Real Estate', 8,'product_menu.php', 'admin_settings',  get_bloginfo('template_url').'/images/favicon.ico'); 
    }
   	
	add_submenu_page('product_menu.php', "General Settings", "General Settings", 8, 'product_menu.php', 'admin_settings');
	add_submenu_page('product_menu.php', "Design Settings", "Design Settings", 8, 'theme_settings', 'theme_settings');
	/*add_submenu_page('product_menu.php', "Payment Options", "Payment Options", 8, 'paymentoptions', 'payment_options'); // sublink4
	add_submenu_page('product_menu.php', "Motifications", "Notifications", 8, 'notification', 'notification');
	add_submenu_page('product_menu.php', "Manage Coupon", "Manage Coupon", 8, 'managecoupon', 'manage_coupon'); // sublink4
	add_submenu_page('product_menu.php', "Bulk Upload", "Bulk Upload", 8, 'bulkupload', 'bulk_upload');*/
}

function manage_coupon()
{
	if($_REQUEST['pagetype']=='addedit')
	{
		include_once(TEMPLATEPATH . '/library/includes/admin_coupon.php');
	}else
	{
		include_once(TEMPLATEPATH . '/library/includes/admin_manage_coupon.php');
	}
}

function admin_settings()
{
	include_once(TEMPLATEPATH . '/library/includes/admin_settings.php');
}

function bulk_upload()
{
	include_once(TEMPLATEPATH . '/library/includes/admin_bulk_upload.php');
}

function theme_settings()
{
	mytheme_add_admin();
}

function payment_options()
{
	include_once(TEMPLATEPATH . '/library/includes/admin_paymethods.php');
}

function notification()
{
	if($_REQUEST['file']!='')
	{
		include_once(TEMPLATEPATH . '/library/includes/admin_notification_edit.php');
	}else
	{
		include_once(TEMPLATEPATH . '/library/includes/admin_notification.php');
	}
}
?>