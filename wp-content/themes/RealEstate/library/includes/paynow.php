<?php
session_start();
ob_start();

$property_price_info = get_property_price_info($_SESSION['property_info']['property_list_type']);			
$payable_amount = $property_price_info['price'];
if($_SESSION['property_info']['proprty_add_coupon'])
{
	$payable_amount = get_payable_amount_with_coupon($payable_amount,$_SESSION['property_info']['proprty_add_coupon']);
}

if($_REQUEST['pid']=='' && $_REQUEST['paymentmethod'] == '' && $payable_amount>0)
{
	wp_redirect(get_option( 'siteurl' ).'/?page=preview&msg=nopaymethod');
	exit;
}
global $current_user;
if($current_user->data->ID=='' && $_SESSION['property_info'])
{
	include_once(TEMPLATEPATH . '/library/includes/single_page_checkout_insertuser.php');
}

global $wpdb;
if($_POST)
{	
	if($_POST['paynow'])
	{
		$property_info = $_SESSION['property_info'];		
		$custom = array("address" 		=> $property_info['proprty_address'],
					"add_city"			=> $property_info['proprty_city'],
					"add_state"			=> $property_info['proprty_state'],
					"add_garage"			=> $property_info['proprty_garage'],
					"add_air"			=> $property_info['proprty_air'],
					"add_heating"			=> $property_info['proprty_heating'],
					"add_terrace"			=> $property_info['proprty_terrace'],
					"add_country"		=> $property_info['proprty_country'],
					"add_zip_code"		=> $property_info['proprty_zip'],
					"add_location"		=> $property_info['proprty_location'],
					"add_label"		=> $property_info['proprty_label'],
					"bed_rooms"		=> $property_info['proprty_bedroom'],
					"bath_rooms"		=> $property_info['proprty_bathroom'],
					"price"			=> str_replace(',','',$property_info['proprty_price']),
					"area"			=> str_replace(',','',$property_info['proprty_sqft']),
					"add_feature"		=> $property_info['proprty_add_feature'],
					"property_type"		=> $property_info['proprty_type'],
					"mlsno"			=> $property_info['proprty_mlsno'],
					"view"			=> $property_info['proprty_view'],
                                        "submit"                => "yes"
					);
		$post_title = $property_info['proprty_name'];
		$description = $property_info['proprty_desc'];
		
		$catids_arr = array();
		if(get_option('ptthemes_propertycategory'))
		{
			$catids_arr[] = get_cat_id_from_name(get_option('ptthemes_propertycategory'));
                        if($property_info['proprty_type']=="New Build")
                            $catids_arr[] = get_cat_id_from_name("Properties Submited");
		}
		/*if($property_info['proprty_bedroom'])
		{
			$catids_arr[] = $property_info['proprty_bedroom'];
		}*/
		
		$my_post = array();
		if($_REQUEST['pid'] && $property_info['renew']=='')
		{
			$my_post['ID'] = $_POST['pid'];
			if($property_info['remove_feature'] !='' && $property_info['remove_feature']=='0' && in_category(get_cat_id_from_name(get_option('ptthemes_featuredcategory')),$_REQUEST['pid']))
			{
				$catids_arr[] = get_cat_id_from_name(get_option('ptthemes_featuredcategory'));	
			}
			$my_post['post_status'] = get_post_status($_POST['pid']);
		}else
		{
			
			$custom['list_type'] = $property_info['property_list_type'];
			$custom['paid_amount'] = $payable_amount;
			$custom['alive_days'] = $property_price_info['alive_days'];
			$custom['paymentmethod'] = $_REQUEST['paymentmethod'];
			$custom['coupon_code'] = $property_info['proprty_add_coupon'];
			
			if($custom['list_type']=="Feature" && get_cat_id_from_name(get_option('ptthemes_featuredcategory')))
			{
				$catids_arr[] = get_cat_id_from_name(get_option('ptthemes_featuredcategory'));
			}
			if($payable_amount>0)
			{
				$post_default_status = 'draft';
			}else
			{
				$post_default_status = get_property_default_status();
			}			
			$my_post['post_status'] = $post_default_status;
		}
		if($current_user_id)
		{
			$my_post['post_author'] = $current_user_id;
		}
		$my_post['post_title'] = $post_title;
		$my_post['post_content'] = $description;
		$my_post['post_category'] = $catids_arr;
		if($_REQUEST['pid'])
		{
			if($property_info['renew'])
			{
				$custom['paid_amount'] = $payable_amount;
				$custom['alive_days'] = $property_price_info['alive_days'];
				$custom['paymentmethod'] = $_REQUEST['paymentmethod'];
				$my_post['ID'] = $_REQUEST['pid'];
				$last_postid = wp_insert_post($my_post);	
			}else
			{
				$last_postid = wp_update_post($my_post);
			}
		}else
		{
			$last_postid = wp_insert_post( $my_post ); //Insert the post into the database
		}
		$custom["paid_amount"] = $payable_amount;
		$custom["coupon_code"] = $coupon_code;
		foreach($custom as $key=>$val)
		{				
			update_post_meta($last_postid, $key, $val);
		}
		//add_post_meta($last_postid, $meta_key, $meta_value)
		if($_SESSION["file_info"])
		{
			
			$menu_order = 0;
			foreach($_SESSION["file_info"] as $image_id=>$val)
			{

				$src = get_image_tmp_phy_path().$image_id.'.jpg';
				if(file_exists($src))
				{
					$menu_order++;
					$dest_path = get_image_phy_destination_path().$image_id.'.jpg';
					$original_size = get_image_size($src);
					$thumb_info = image_resize_custom($src,$dest_path,get_option('thumbnail_size_w'),get_option('thumbnail_size_h'));
					$medium_info = image_resize_custom($src,$dest_path,get_option('medium_size_w'),get_option('medium_size_h'));
					$post_img = move_original_image_file($src,$dest_path);
					$post_img['post_status'] = 'attachment';
					$post_img['post_parent'] = $last_postid;
					$post_img['post_type'] = 'attachment';
					$post_img['post_mime_type'] = 'image/jpeg';
					$post_img['menu_order'] = $menu_order;
					
					$last_postimage_id = wp_insert_post( $post_img ); // Insert the post into the database
		
					$thumb_info_arr = array();
					if($thumb_info)
					{
						$sizes_info_array = array();
						if($thumb_info)
						{
						$sizes_info_array['thumbnail'] =  array(
																"file" =>	$thumb_info['file'],
																"height" =>	$thumb_info['height'],
																"width" =>	$thumb_info['width'],
																);
						}
						if($medium_info)
						{
						$sizes_info_array['medium'] =  array(
																"file" =>	$medium_info['file'],
																"height" =>	$medium_info['height'],
																"width" =>	$medium_info['width'],
																);
						}
						$hwstring_small = "height='".$thumb_info['height']."' width='".$thumb_info['width']."'";
					}else
					{
						$hwstring_small = "height='".$original_size['height']."' width='".$original_size['width']."'";
					}
					update_post_meta($last_postimage_id, '_wp_attached_file', get_attached_file_meta_path($post_img['guid']));
					$post_attach_arr = array(
										"width"	=>	$original_size['width'],
										"height" =>	$original_size['height'],
										"hwstring_small"=> $hwstring_small,
										"file"	=> get_attached_file_meta_path($post_img['guid']),
										"sizes"=> $sizes_info_array,
										);
					wp_update_attachment_metadata( $last_postimage_id, $post_attach_arr );
				}				
			}
		}
		$_SESSION['property_info'] = array();
		$_SESSION["file_info"] = array();
		if($_REQUEST['pid'] && $property_info['renew']=='')
		{
			wp_redirect(get_author_link($echo = false, $current_user->data->ID));
			exit;
		}else
		{
			if($payable_amount == '' || $payable_amount <= 0)
			{
				$suburl .= "&pid=$last_postid";
				wp_redirect(get_option('siteurl')."/?page=success$suburl");
				exit;
			}else
			{
				$paymentmethod = $_REQUEST['paymentmethod'];
				$paymentSuccessFlag = 0;
				if($paymentmethod == 'prebanktransfer' || $paymentmethod == 'payondelevary')
				{
					if($property_info['renew'])
					{
						$suburl = "&renew=1";
					}
					$suburl .= "&pid=$last_postid";
					wp_redirect(get_option('siteurl').'/?page=success&paydeltype='.$paymentmethod.$suburl);
				}
				else
				{
					if(file_exists( TEMPLATEPATH.'/library/payment/'.$paymentmethod.'/'.$paymentmethod.'_response.php'))
					{
						include_once(TEMPLATEPATH.'/library/payment/'.$paymentmethod.'/'.$paymentmethod.'_response.php');
					}
				}
				exit;	
			}
		}
	}
}
?>