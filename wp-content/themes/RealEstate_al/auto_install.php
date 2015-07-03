<?php
set_time_limit(0);
global  $wpdb;
//require_once (TEMPLATEPATH . '/delete_data.php');
$dummy_image_path = get_template_directory_uri().'/images/dummy/';
//====================================================================================//
$user_info = array();
$user_meta = array();
$user_data = array();
$user_meta = array(
				"user_add1"			=>	'',
				"user_add2"			=>	'',
				"user_city"			=>	'',
				"user_state"		=>	'NJ',
				"user_country"		=>	'USA',
				"user_postalcode"	=>	'12345',
				"user_phone" 		=>	'98456+2778',
				"user_twitter"		=>	'http://www.twitter.com/david',
				"user_photo"		=>	$dummy_image_path."photo1.jpg",				
				"description"		=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam',
				"tl_dummy_content"	=>	'1',
				);
$user_data = array(
				"user_login"		=>	'david@gmail.com',
				"user_email"		=>	'david@gmail.com',
				"user_nicename"		=>	'david-offer',
				"user_url"			=>	'http://www.davidoffer.com/',
				"display_name"		=>	'David Offer',
				"first_name"		=>	'David',
				"last_name"			=>	'Offer',
				);				
$user_info[] = array(
				'data'	=>	$user_data,
				'meta'	=>	$user_meta,
				);
///user data start//
$user_meta = array();
$user_data = array();
$user_meta = array(
				"user_add1"			=>	'',
				"user_add2"			=>	'',
				"user_city"			=>	'',
				"user_state"		=>	'CA',
				"user_country"		=>	'USA',
				"user_postalcode"	=>	'12345',
				"user_phone" 		=>	'87456+2778',
				"user_twitter"		=>	'http://www.twitter.com/bob',
				"user_photo"		=>	$dummy_image_path."photo2.jpg",				
				"description"		=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam',
				"tl_dummy_content"	=>	'1',
				);
$user_data = array(
				"user_login"		=>	'bob@gmail.com',
				"user_email"		=>	'bob@gmail.com',
				"user_nicename"		=>	'bob',
				"user_url"			=>	'http://www.hurwitzjamesco.com',
				"display_name"		=>	'Bob',
				"first_name"		=>	'Bob',
				"last_name"			=>	'',
				);				
$user_info[] = array(
				'data'	=>	$user_data,
				'meta'	=>	$user_meta,
				);
///user data end//
///user data start//
$user_meta = array();
$user_data = array();
$user_meta = array(
				"user_add1"			=>	'',
				"user_add2"			=>	'',
				"user_city"			=>	'FL',
				"user_state"		=>	'FL',
				"user_country"		=>	'USA',
				"user_postalcode"	=>	'65345',
				"user_phone" 		=>	'8745222778',
				"user_twitter"		=>	'http://www.twitter.com/hilton',
				"user_photo"		=>	$dummy_image_path."photo3.jpg",				
				"description"		=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam',
				"tl_dummy_content"	=>	'1',
				);
$user_data = array(
				"user_login"		=>	'hilton@gmail.com',
				"user_email"		=>	'hilton@gmail.com',
				"user_nicename"		=>	'hilton',
				"user_url"			=>	'http://www.hiltonhyland.com',
				"display_name"		=>	'Hilton',
				"first_name"		=>	'Hilton',
				"last_name"			=>	'',
				);				
$user_info[] = array(
				'data'	=>	$user_data,
				'meta'	=>	$user_meta,
				);
///user data end//
///user data start//
$user_meta = array();
$user_data = array();
$user_meta = array(
				"user_add1"			=>	'',
				"user_add2"			=>	'',
				"user_city"			=>	'FL',
				"user_state"		=>	'FL',
				"user_country"		=>	'USA',
				"user_postalcode"	=>	'65345',
				"user_phone" 		=>	'8745222778',
				"user_twitter"		=>	'http://www.twitter.com/pascal',
				"user_photo"		=>	$dummy_image_path."photo4.jpg",				
				"description"		=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam',
				"tl_dummy_content"	=>	'1',
				);
$user_data = array(
				"user_login"		=>	'pascal@gmail.com',
				"user_email"		=>	'pascal@gmail.com',
				"user_nicename"		=>	'pascal',
				"user_url"			=>	'http://www.hiltonhyland.com',
				"display_name"		=>	'Pascal',
				"first_name"		=>	'Pascal',
				"last_name"			=>	'',
				);				
$user_info[] = array(
				'data'	=>	$user_data,
				'meta'	=>	$user_meta,
				);
///user data end//
///user data start//
$user_meta = array();
$user_data = array();
$user_meta = array(
				"user_add1"			=>	'',
				"user_add2"			=>	'',
				"user_city"			=>	'NY',
				"user_state"		=>	'NY',
				"user_country"		=>	'USA',
				"user_postalcode"	=>	'99345',
				"user_phone" 		=>	'6545222778',
				"user_twitter"		=>	'http://www.twitter.com/sally',
				"user_photo"		=>	$dummy_image_path."photo5.jpg",				
				"description"		=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam',
				"tl_dummy_content"	=>	'1',
				);
$user_data = array(
				"user_login"		=>	'sally@gmail.com',
				"user_email"		=>	'sally@gmail.com',
				"user_nicename"		=>	'sally',
				"user_url"			=>	'http://www.californiamoves.com',
				"display_name"		=>	'Sally',
				"first_name"		=>	'Sally',
				"last_name"			=>	'',
				);				
$user_info[] = array(
				'data'	=>	$user_data,
				'meta'	=>	$user_meta,
				);
///user data end//	
///user data start//
$user_meta = array();
$user_data = array();
$user_meta = array(
				"user_add1"			=>	'',
				"user_add2"			=>	'',
				"user_city"			=>	'NY',
				"user_state"		=>	'NY',
				"user_country"		=>	'USA',
				"user_postalcode"	=>	'99345',
				"user_phone" 		=>	'6545222778',
				"user_twitter"		=>	'http://www.twitter.com/andrew',
				"user_photo"		=>	$dummy_image_path."photo6.jpg",				
				"description"		=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam',
				"tl_dummy_content"	=>	'1',
				);
$user_data = array(
				"user_login"		=>	'andrew@gmail.com',
				"user_email"		=>	'andrew@gmail.com',
				"user_nicename"		=>	'andrew',
				"user_url"			=>	'http://www.californiamoves.com',
				"display_name"		=>	'Andrew',
				"first_name"		=>	'Jacks',
				"last_name"			=>	'',
				);				
$user_info[] = array(
				'data'	=>	$user_data,
				'meta'	=>	$user_meta,
				);
///user data end// 
require_once(ABSPATH.'wp-includes/registration.php');
$agents_ids_array = insert_users($user_info);
function insert_users($user_info)
{
	global $wpdb;
	$user_ids_array = array();
	for($u=0;$u<count($user_info);$u++)
	{
		if(!username_exists($user_info[$u]['data']['user_login']))
		{
			$last_user_id = wp_insert_user($user_info[$u]['data']);
			$user_ids_array[] = $last_user_id;
			$user_meta = $user_info[$u]['meta'];
			$user_role['agent'] = 1;
			update_usermeta($last_user_id, 'wp_capabilities', $user_role);
			foreach($user_meta as $key=>$val)
			{
				update_usermeta($last_user_id, $key, $val); // User mata Information Here
			}
		}
	}
	$user_ids = $wpdb->get_var("SELECT group_concat(user_id) FROM $wpdb->usermeta where meta_key like \"wp_capabilities\" and meta_value like \"%agent%\"");
	return explode(',',$user_ids);
}
//====================================================================================//
/////////////// GENERAL SETTINGS START ///////////////
$mysite_general_settings = get_option('mysite_general_settings');
if(!$mysite_general_settings || ($mysite_general_settings && count($mysite_general_settings)==0))
{
	$settingtinfo = array(
						"currency"				=> 'USD',
						"currencysym"			=> '$',
						"site_email"			=>  get_option('admin_email'),
						"site_email_name"		=>	get_option('blogname'),
						"is_user_addproperty"	=>	'1',
						"list_type_title1"		=>	'Free',
						"list_type_price1"		=>	'0.00',
						"list_type_days1"		=>	"10",		
						"list_type_days_type1"	=>	"days",
						"list_type_feature2"	=>	"0",
						"list_type_title2"		=>	'Feature',
						"list_type_price2"		=>	'30.00',
						"list_type_days2"		=>	"90",		
						"list_type_days_type2"	=>	"days",
						"list_type_feature2"	=>	"1",
						"area_unit"				=>	"Sq.Ft.",
						"approve_status"		=>	"publish",
						"related_property"		=>	"Property Type",
						"is_allow_user_add"		=>	"1",						
						"area_srch_setting"		=>	"100-1000,1000-2000,2000-3000,3000+",
						"price_srch_setting"	=>	"100-1000,1000-5000,5000-10000,10000+",
						"location_srch_setting"	=>	"AK,AR,CA,FL,HW,MN,SC,TX,MN,NJ,NY,MA,NY,NX,OTHER",
						"is_allow_user_add"		=>	"1",
						"max_bedrooms"			=>	"10",
						"max_bathrooms"			=>	"10",						
						);
	update_option("mysite_general_settings",$settingtinfo);
}
/////////////// GENERAL SETTINGS END ///////////////
//====================================================================================//
/////////////// PAYMENT SETTINGS START ///////////////
$paymethodinfo = array();
$payOpts = array();
$payOpts[] = array(
				"title"			=>	"Merchant Id",
				"fieldname"		=>	"merchantid",
				"value"			=>	"myaccount@paypal.com",
				"description"	=>	"Example : myaccount@paypal.com",
				);
$payOpts[] = array(
				"title"			=>	"Cancel Url",
				"fieldname"		=>	"cancel_return",
				"value"			=>	get_option('siteurl')."/?page=cancel_return&pmethod=paypal",
				"description"	=>	"Example : http://mydomain.com/cancel_return.php",
				);
$payOpts[] = array(
				"title"			=>	"Return Url",
				"fieldname"		=>	"returnUrl",
				"value"			=>	get_option('siteurl')."/?page=return&pmethod=paypal",
				"description"	=>	"Example : http://mydomain.com/return.php",
				);
$payOpts[] = array(
				"title"			=>	"Notify Url",
				"fieldname"		=>	"notify_url",
				"value"			=>	get_option('siteurl')."/?page=notifyurl&pmethod=paypal",
				"description"	=>	"Example : http://mydomain.com/notifyurl.php",
				);								
$paymethodinfo[] = array(
					"name" 		=> 'Paypal',
					"key" 		=> 'paypal',
					"isactive"	=>	'1', // 1->display,0->hide
					"display_order"=>'1',
					"payOpts"	=>	$payOpts,
					);
//////////pay settings end////////
//////////google checkout start////////
$payOpts = array();
$payOpts[] = array(
				"title"			=>	"Merchant Id",
				"fieldname"		=>	"merchantid",
				"value"			=>	"1234567890",
				"description"	=>	"Example : 1234567890"
				);
$paymethodinfo[] = array(
					"name" 		=> 'Google Checkout',
					"key" 		=> 'googlechkout',
					"isactive"	=>	'1', // 1->display,0->hide
					"display_order"=>'2',
					"payOpts"	=>	$payOpts,
					);
//////////google checkout end////////
//////////authorize.net start////////
$payOpts = array();
$payOpts[] = array(
				"title"			=>	"Login ID",
				"fieldname"		=>	"loginid",
				"value"			=>	"yourname@domain.com",
				"description"	=>	"Example : yourname@domain.com"
				);
$payOpts[] = array(
				"title"			=>	"Transaction Key",
				"fieldname"		=>	"transkey",
				"value"			=>	"1234567890",
				"description"	=>	"Example : 1234567890",
				);
$paymethodinfo[] = array(
					"name" 		=> 'Authorize.net',
					"key" 		=> 'authorizenet',
					"isactive"	=>	'1', // 1->display,0->hide
					"display_order"=>'3',
					"payOpts"	=>	$payOpts,
					);
//////////authorize.net end////////
//////////worldpay start////////
$payOpts = array();	
$payOpts[] = array(
				"title"			=>	"Instant Id",
				"fieldname"		=>	"instId",
				"value"			=>	"123456",
				"description"	=>	"Example : 123456"
				);
$payOpts[] = array(
				"title"			=>	"Account Id",
				"fieldname"		=>	"accId1",
				"value"			=>	"12345",
				"description"	=>	"Example : 12345"
				);
$paymethodinfo[] = array(
					"name" 		=> 'Worldpay',
					"key" 		=> 'worldpay',
					"isactive"	=>	'1', // 1->display,0->hide\
					"display_order"=>'4',
					"payOpts"	=>	$payOpts,
					);
//////////worldpay end////////
//////////2co start////////
$payOpts = array();
$payOpts[] = array(
				"title"			=>	"Vendor ID",
				"fieldname"		=>	"vendorid",
				"value"			=>	"1303908",
				"description"	=>	"Enter Vendor ID Example : 1303908"
				);
$payOpts[] = array(
				"title"			=>	"Notify Url",
				"fieldname"		=>	"ipnfilepath",
				"value"			=>	get_option('siteurl')."/?page=notifyurl&pmethod=2co",
				"description"	=>	"Example : http://mydomain.com/2co_notifyurl.php",
				);
$paymethodinfo[] = array(
					"name" 		=> '2CO (2Checkout)',
					"key" 		=> '2co',
					"isactive"	=>	'1', // 1->display,0->hide
					"display_order"=>'5',
					"payOpts"	=>	$payOpts,
					);
//////////2co end////////
//////////pre bank transfer start////////
$payOpts = array();
$payOpts[] = array(
				"title"			=>	"Bank Information",
				"fieldname"		=>	"bankinfo",
				"value"			=>	"ICICI Bank",
				"description"	=>	"Enter the bank name to which you want to transfer payment"
				);
$payOpts[] = array(
				"title"			=>	"Account ID",
				"fieldname"		=>	"bank_accountid",
				"value"			=>	"AB1234567890",
				"description"	=>	"Enter your bank Account ID",
				);
$paymethodinfo[] = array(
					"name" 		=> 'Pre Bank Transfer',
					"key" 		=> 'prebanktransfer',
					"isactive"	=>	'1', // 1->display,0->hide
					"display_order"=>'6',
					"payOpts"	=>	$payOpts,
					);				
//////////pre bank transfer end////////
//////////pay cash on devivery start////////
$payOpts = array();
$paymethodinfo[] = array(
					"name" 		=> 'Pay Cash On Delivery',
					"key" 		=> 'payondelevary',
					"isactive"	=>	'1', // 1->display,0->hide
					"display_order"=>'7',
					"payOpts"	=>	$payOpts,
					);
//////////pay cash on devivery end////////
for($i=0;$i<count($paymethodinfo);$i++)
{
$payment_method_info = array();
$payment_method_info  = get_option('payment_method_'.$paymethodinfo[$i]['key']);
if(!$payment_method_info)
{
	update_option('payment_method_'.$paymethodinfo[$i]['key'],$paymethodinfo[$i]);
}
}
/////////////// PAYMENT SETTINGS END ///////////////
//====================================================================================//
/////////////// TERMS START ///////////////
require_once(ABSPATH.'wp-admin/includes/taxonomy.php');
$category_array = array(array('Blog','Sub Category 1','Sub Category 2'),'Feature','Properties');
insert_category($category_array);
function insert_category($category_array)
{
	for($i=0;$i<count($category_array);$i++)
	{
		$parent_catid = 0;
		if(is_array($category_array[$i]))
		{
			$cat_name_arr = $category_array[$i];
			for($j=0;$j<count($cat_name_arr);$j++)
			{
				$catname = $cat_name_arr[$j];
				$last_catid = wp_create_category( $catname, $parent_catid);
				if($j==0)
				{
					$parent_catid = $last_catid;
				}
			}
			
		}else
		{
			$catname = $category_array[$i];
			wp_create_category( $catname, $parent_catid);
		}
	}
}
/////////////// TERMS END ///////////////
//====================================================================================//
/////////////// Design Settings START ///////////////
update_option("posts_per_page",'12');
update_option("thumbnail_size_w",'150');
update_option("thumbnail_size_h",'150');
update_option("medium_size_w",'650');
update_option("medium_size_h",'480');

update_option("ptthemes_alt_stylesheet",'1-default.css');
update_option("ptthemes_sidebar_left",'right');
update_option("ptthemes_feedburner_url",'http://feeds2.feedburner.com/templatic');
update_option("ptthemes_borwse_link_flag",'true');
update_option("ptthemes_agents_link_flag",'true');
update_option("ptthemes_breadcrumbs","true"); 
update_option("ptthemes_blogcategory",'Blog');
update_option("ptthemes_postcontent_full",'true');
update_option("ptthemes_featuredcategory",'Feature');
update_option("ptthemes_propertycategory",'Properties');
update_option("ptthemes_latest_properties",'5');
update_option("ptthemes_new_properties",'30');
update_option("ptthemes_homepage_sliderrotate_flag",'true');
update_option("ptthemes_sliderspeed_homepage",'1500');
update_option("ptthemes_related_property",'5');
update_option("ptthemes_facebook",'true');
update_option("ptthemes_digg",'true');
update_option("ptthemes_del",'true');
update_option("ptthemes_twitter",'true');
update_option("ptthemes_reddit",'true');
update_option("ptthemes_linkedin",'true');
update_option("ptthemes_technorati",'true');
update_option("ptthemes_myspace",'true');
update_option("ptthemes_sliderspeed_homepage",'5000');

/////////////// Design Settings END ///////////////
//====================================================================================//
$post_info = array();
////post start///
$post_meta = array();
$post_meta = array(
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'Increase your home value',
					"post_content"	=>	'Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. ',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Blog'),
					"post_tags"		=>	array('home value','Increase home value')
					);
////post end///
////post start///
$post_meta = array();
$post_meta = array(
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'We are putting our house on the market soon. One agent',
					"post_content"	=>	'Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. ',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Blog'),
					"post_tags"		=>	array()
					);
////post end///
////post start///
$post_meta = array();
$post_meta = array(
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'Adventures of Huckleberry Finn',
					"post_content"	=>	'Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. ',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Blog'),
					"post_tags"		=>	array()
					);
////post end///
////post start///
$post_meta = array();
$post_meta = array(
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'Real Estate Agents Get Paid Too Much',
					"post_content"	=>	'Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. ',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Blog','Sub Category 2'),
					"post_tags"		=>	array()
					);
////post end///
////post start///
$post_meta = array();
$post_meta = array(
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'The Adventures of Tom Sawyer',
					"post_content"	=>	'Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. ',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Blog','Sub Category 1'),
					"post_tags"		=>	array('Tom Sawyer')
					);
////post end///
////post start///
$image_array = array();
$post_meta = array();
$image_array[] = "dummy/img1.jpg";
$image_array[] = "dummy/img2.jpg";
$image_array[] = "dummy/img3.jpg";
$image_array[] = "dummy/img4.jpg";
$post_meta = array(
					"address"		=> '321,Malabar hill',
					"add_city"		=> 'vancouver',
					"add_state"		=> 'NJ',
					"add_country"	=> 'USA',
					"add_zip_code"	=> '4654699',
					"area"			=> '2565',
					"bath_rooms"	=> '3',
					"mlsno"			=> 'CA465464',
					"price"			=> '265689',
					"property_type"	=> 'Sale',
					"add_feature"	=> 'Attic<Br>Cable Ready<br>Fireplace<br>Gated Entry<br>Hot Tub/Spa<br>Pool',
					"alive_days"	=> '90',
					"tl_dummy_content"	=> '1',
					"add_location"	=> 'NJ',
					"bed_rooms"		=> '4',
				);
$post_info[] = array(
					"post_title"	=>	'510 Wilderness Ln',
					"post_content"	=>	'Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. ',
					"post_meta"		=>	$post_meta,
					"post_author"	=>	$agents_ids_array[array_rand($agents_ids_array)],
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Feature','Properties'),
					"post_tags"		=>	array('tag1','tag2','tag3')
					);
////post end///
////post start///
$image_array = array();
$post_meta = array();
$image_array[] = "dummy/img5.jpg";
$image_array[] = "dummy/img6.jpg";
$image_array[] = "dummy/img7.jpg";
$image_array[] = "dummy/img8.jpg";
$post_meta = array(
					"address"		=> '20,Torry Enclave',
					"add_city"		=> 'Milano',
					"add_state"		=> 'AK',
					"add_country"	=> 'USA',
					"add_zip_code"	=> '4986232',
					"area"			=> '2565',
					"bath_rooms"	=> '3',
					"mlsno"			=> 'CA465464',
					"price"			=> '225689',
					"property_type"	=> 'Sale',
					"add_feature"	=> 'Attic<Br>Cable Ready<br>Fireplace<br>Gated Entry<br>Hot Tub/Spa<br>Pool',
					"alive_days"	=> '90',
					"tl_dummy_content"	=> '1',
					"add_location"	=> 'AK',
					"bed_rooms"		=> '4',
				);
$post_info[] = array(
					"post_title"	=>	'5101 Wilderness Ln',
					"post_content"	=>	'Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. ',
					"post_meta"		=>	$post_meta,
					"post_author"	=>	$agents_ids_array[array_rand($agents_ids_array)] ,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Feature','Properties'),
					"post_tags"		=>	array()
					);
////post end///
////post start///
$image_array = array();
$post_meta = array();
$image_array[] = "dummy/img5.jpg";
$image_array[] = "dummy/img6.jpg";
$image_array[] = "dummy/img7.jpg";
$image_array[] = "dummy/img8.jpg";
$post_meta = array(
					"address"		=> '6, St.marry Villa',
					"add_city"		=> 'Honolulu',
					"add_state"		=> 'Hongkok',
					"add_country"	=> 'Thialand',
					"add_zip_code"	=> '6464132',
					"area"			=> '2565',
					"bath_rooms"	=> '3',
					"mlsno"			=> 'CA465464',
					"price"			=> '10000',
					"property_type"	=> 'Rent',
					"add_feature"	=> 'Attic<Br>Cable Ready<br>Fireplace<br>Gated Entry<br>Hot Tub/Spa<br>Pool',
					"alive_days"	=> '90',
					"tl_dummy_content"	=> '1',
					"add_location"	=> 'AK',
					"bed_rooms"		=> '10',
				);
$post_info[] = array(
					"post_title"	=>	'3972 Tilden Ave',
					"post_content"	=>	'Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. ',
					"post_meta"		=>	$post_meta,
					"post_author"	=>	$agents_ids_array[array_rand($agents_ids_array)] ,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Feature','Properties'),
					"post_tags"		=>	array()
					);
////post end///
////post start///
$image_array = array();
$post_meta = array();
$image_array[] = "dummy/img9.jpg";
$image_array[] = "dummy/img10.jpg";
$image_array[] = "dummy/img11.jpg";
$image_array[] = "dummy/img12.jpg";
$post_meta = array(
					"address"		=> '4904 Maytime Ln',
					"add_city"		=> '321,Malabar hill',
					"add_state"		=> 'NJ',
					"add_country"	=> 'USA',
					"add_zip_code"	=> '6464132',
					"area"			=> '2565',
					"bath_rooms"	=> '2',
					"mlsno"			=> 'CA465464',
					"price"			=> '10000',
					"property_type"	=> 'Rent',
					"add_feature"	=> '',
					"alive_days"	=> '90',
					"tl_dummy_content"	=> '1',
					"add_location"	=> 'NJ',
					"bed_rooms"		=> '2',
				);
$post_info[] = array(
					"post_title"	=>	'392 Tilden Ave',
					"post_content"	=>	'Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. ',
					"post_meta"		=>	$post_meta,
					"post_author"	=>	$agents_ids_array[array_rand($agents_ids_array)] ,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Feature','Properties'),
					"post_tags"		=>	array()
					);
////post end///
////post start///
$image_array = array();
$post_meta = array();
$image_array[] = "dummy/img13.jpg";
$image_array[] = "dummy/img14.jpg";
$image_array[] = "dummy/img15.jpg";
$image_array[] = "dummy/img16.jpg";
$post_meta = array(
					"address"		=> '12903 Chalon Road',
					"add_city"		=> 'Los Angeles',
					"add_state"		=> 'NJ',
					"add_country"	=> 'USA',
					"add_zip_code"	=> '4654699',
					"area"			=> '2565',
					"bath_rooms"	=> '3',
					"mlsno"			=> 'CA465464',
					"price"			=> '265689',
					"property_type"	=> 'Sale',
					"add_feature"	=> 'Attic<Br>Cable Ready<br>Fireplace<br>Gated Entry<br>Hot Tub/Spa<br>Pool',
					"alive_days"	=> '30',
					"tl_dummy_content"	=> '1',
					"add_location"	=> 'NJ',
					"bed_rooms"		=> '3',
				);
$post_info[] = array(
					"post_title"	=>	'51192 Wilderness Ln',
					"post_content"	=>	'Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. ',
					"post_meta"		=>	$post_meta,
					"post_author"	=>	$agents_ids_array[array_rand($agents_ids_array)],
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Feature','Properties'),
					"post_tags"		=>	array()
					);
////post end///
////post start///
$image_array = array();
$post_meta = array();
$image_array[] = "dummy/img17.jpg";
$image_array[] = "dummy/img18.jpg";
$image_array[] = "dummy/img19.jpg";
$image_array[] = "dummy/img20.jpg";
$post_meta = array(
					"address"		=> '390 West Stafford Road',
					"add_city"		=> 'vancouver',
					"add_state"		=> 'AK',
					"add_country"	=> 'USA',
					"add_zip_code"	=> '25487',
					"area"			=> '2365',
					"bath_rooms"	=> '3',
					"mlsno"			=> 'CA465564',
					"price"			=> '265982',
					"property_type"	=> 'Sale',
					"add_feature"	=> 'Attic<Br>Cable Ready<br>Fireplace<br>Gated Entry<br>Hot Tub/Spa<br>Pool',
					"alive_days"	=> '30',
					"tl_dummy_content"	=> '1',
					"add_location"	=> 'AK',
					"bed_rooms"		=> '9',
				);
$post_info[] = array(
					"post_title"	=>	'6244 Wilderness Ln',
					"post_content"	=>	'Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. ',
					"post_meta"		=>	$post_meta,
					"post_author"	=>	$agents_ids_array[array_rand($agents_ids_array)],
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Feature','Properties'),
					"post_tags"		=>	array()
					);
////post end///
////post start///
$image_array = array();
$post_meta = array();
$image_array[] = "dummy/img21.jpg";
$image_array[] = "dummy/img22.jpg";
$image_array[] = "dummy/img23.jpg";
$image_array[] = "dummy/img24.jpg";
$post_meta = array(
					"address"		=> '2500 White Stallion Road',
					"add_city"		=> 'poland',
					"add_state"		=> 'AR',
					"add_country"	=> 'USA',
					"add_zip_code"	=> '258436',
					"area"			=> '3658',
					"bath_rooms"	=> '4',
					"mlsno"			=> 'CA4669874',
					"price"			=> '326658',
					"property_type"	=> 'Sale',
					"add_feature"	=> 'Attic<Br>Cable Ready<br>Fireplace<br>Gated Entry<br>Hot Tub/Spa<br>Pool',
					"alive_days"	=> '30',
					"tl_dummy_content"	=> '1',
					"add_location"	=> 'AR',
					"bed_rooms"		=> '5',
				);
$post_info[] = array(
					"post_title"	=>	'6258 Wilderness Ln',
					"post_content"	=>	'Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. ',
					"post_meta"		=>	$post_meta,
					"post_author"	=>	$agents_ids_array[array_rand($agents_ids_array)],
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Properties'),
					"post_tags"		=>	array()
					);
////post end///
////post start///
$image_array = array();
$post_meta = array();
$image_array[] = "dummy/img25.jpg";
$image_array[] = "dummy/img26.jpg";
$image_array[] = "dummy/img27.jpg";
$image_array[] = "dummy/img28.jpg";
$post_meta = array(
					"address"		=> '1103 S Ocean Blvd',
					"add_city"		=> 'nepal',
					"add_state"		=> 'MA',
					"add_country"	=> 'USA',
					"add_zip_code"	=> '254871',
					"area"			=> '658',
					"bath_rooms"	=> '3',
					"mlsno"			=> 'CA4662774',
					"price"			=> '325871',
					"property_type"	=> 'Sale',
					"add_feature"	=> 'Attic<Br>Cable Ready<br>Fireplace<br>Gated Entry<br>Hot Tub/Spa<br>Pool',
					"alive_days"	=> '30',
					"tl_dummy_content"	=> '1',
					"add_location"	=> 'AM',
					"bed_rooms"		=> '4',
				);
$post_info[] = array(
					"post_title"	=>	'3658 Wilderness Ln',
					"post_content"	=>	'Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. ',
					"post_meta"		=>	$post_meta,
					"post_author"	=>	$agents_ids_array[array_rand($agents_ids_array)],
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Properties'),
					"post_tags"		=>	array()
					);
////post end///
////post start///
$image_array = array();
$post_meta = array();
$image_array[] = "dummy/img29.jpg";
$image_array[] = "dummy/img30.jpg";
$image_array[] = "dummy/img31.jpg";
$image_array[] = "dummy/img32.jpg";
$post_meta = array(
					"address"		=> '6574 Dume Drive',
					"add_city"		=> 'vapi',
					"add_state"		=> 'NJ',
					"add_country"	=> 'USA',
					"add_zip_code"	=> '36587',
					"area"			=> '2145',
					"bath_rooms"	=> '4',
					"mlsno"			=> 'CA4662144',
					"price"			=> '325874',
					"property_type"	=> 'Sale',
					"add_feature"	=> 'Attic<Br>Cable Ready<br>Fireplace<br>Gated Entry<br>Hot Tub/Spa<br>Pool',
					"alive_days"	=> '30',
					"tl_dummy_content"	=> '1',
					"add_location"	=> 'NJ',
					"bed_rooms"		=> '4',
				);
$post_info[] = array(
					"post_title"	=>	'32547 Wilderness Ln',
					"post_content"	=>	'Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. ',
					"post_meta"		=>	$post_meta,
					"post_author"	=>	$agents_ids_array[array_rand($agents_ids_array)],
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Properties'),
					"post_tags"		=>	array()
					);
////post end///
////post start///
$image_array = array();
$post_meta = array();
$image_array[] = "dummy/img33.jpg";
$image_array[] = "dummy/img34.jpg";
$image_array[] = "dummy/img35.jpg";
$image_array[] = "dummy/img36.jpg";
$post_meta = array(
					"address"		=> '1 Hughes Center Dr 1901',
					"add_city"		=> 'Bhutan',
					"add_state"		=> 'NY',
					"add_country"	=> 'USA',
					"add_zip_code"	=> '23658',
					"area"			=> '1254',
					"bath_rooms"	=> '3',
					"mlsno"			=> 'CA466635244',
					"price"			=> '365874',
					"property_type"	=> 'Sale',
					"add_feature"	=> 'Attic<Br>Cable Ready<br>Fireplace<br>Gated Entry<br>Hot Tub/Spa<br>Pool',
					"alive_days"	=> '30',
					"tl_dummy_content"	=> '1',
					"add_location"	=> 'NY',
					"bed_rooms"		=> '4',
				);
$post_info[] = array(
					"post_title"	=>	'1 Hughes Center Dr 1901',
					"post_content"	=>	'Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. ',
					"post_meta"		=>	$post_meta,
					"post_author"	=>	$agents_ids_array[array_rand($agents_ids_array)],
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Properties'),
					"post_tags"		=>	array()
					);
////post end///
////post start///
$image_array = array();
$post_meta = array();
$image_array[] = "dummy/img37.jpg";
$image_array[] = "dummy/img38.jpg";
$image_array[] = "dummy/img39.jpg";
$image_array[] = "dummy/img40.jpg";
$post_meta = array(
					"address"		=> 'Nimes Road',
					"add_city"		=> 'Burma',
					"add_state"		=> 'NX',
					"add_country"	=> 'USA',
					"add_zip_code"	=> '235412',
					"area"			=> '2147',
					"bath_rooms"	=> '2',
					"mlsno"			=> 'CA4647321',
					"price"			=> '215487',
					"property_type"	=> 'Sale',
					"add_feature"	=> 'Attic<Br>Cable Ready<br>Fireplace<br>Gated Entry<br>Hot Tub/Spa<br>Pool',
					"alive_days"	=> '30',
					"tl_dummy_content"	=> '1',
					"add_location"	=> 'NX',
					"bed_rooms"		=> '2',
				);
$post_info[] = array(
					"post_title"	=>	'Nimes Villa',
					"post_content"	=>	'Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. ',
					"post_meta"		=>	$post_meta,
					"post_author"	=>	$agents_ids_array[array_rand($agents_ids_array)],
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Properties'),
					"post_tags"		=>	array()
					);
////post end///
////post start///
$image_array = array();
$post_meta = array();
$image_array[] = "dummy/img41.jpg";
$image_array[] = "dummy/img42.jpg";
$image_array[] = "dummy/img43.jpg";
$image_array[] = "dummy/img44.jpg";
$post_meta = array(
					"address"		=> '1025 Ridgedale Drive',
					"add_city"		=> 'Lancshire',
					"add_state"		=> 'AR',
					"add_country"	=> 'USA',
					"add_zip_code"	=> '214875',
					"area"			=> '2147',
					"bath_rooms"	=> '3',
					"mlsno"			=> 'CA4625421',
					"price"			=> '214785',
					"property_type"	=> 'Sale',
					"add_feature"	=> 'Attic<Br>Cable Ready<br>Fireplace<br>Gated Entry<br>Hot Tub/Spa<br>Pool',
					"alive_days"	=> '30',
					"tl_dummy_content"	=> '1',
					"add_location"	=> 'AR',
					"bed_rooms"		=> '4',
				);
$post_info[] = array(
					"post_title"	=>	'Ridgedale Palace',
					"post_content"	=>	'Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. ',
					"post_meta"		=>	$post_meta,
					"post_author"	=>	$agents_ids_array[array_rand($agents_ids_array)],
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Feature','Properties'),
					"post_tags"		=>	array()
					);
////post end///
////post start///
$image_array = array();
$post_meta = array();
$image_array[] = "dummy/img45.jpg";
$image_array[] = "dummy/img46.jpg";
$image_array[] = "dummy/img47.jpg";
$image_array[] = "dummy/img48.jpg";
$post_meta = array(
					"address"		=> '3010 Vista Linda Ln',
					"add_city"		=> 'Lancshire',
					"add_state"		=> 'AR',
					"add_country"	=> 'USA',
					"add_zip_code"	=> '214875',
					"area"			=> '2147',
					"bath_rooms"	=> '3',
					"mlsno"			=> 'CA4625421',
					"price"			=> '214785',
					"property_type"	=> 'Sale',
					"add_feature"	=> 'Attic<Br>Cable Ready<br>Fireplace<br>Gated Entry<br>Hot Tub/Spa<br>Pool',
					"alive_days"	=> '30',
					"tl_dummy_content"	=> '1',
					"add_location"	=> 'AR',
					"bed_rooms"		=> '4',
				);
$post_info[] = array(
					"post_title"	=>	'Visitor Villa',
					"post_content"	=>	'Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. ',
					"post_meta"		=>	$post_meta,
					"post_author"	=>	$agents_ids_array[array_rand($agents_ids_array)],
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Properties'),
					"post_tags"		=>	array()
					);
////post end///
////post start///
$image_array = array();
$post_meta = array();
$image_array[] = "dummy/img49.jpg";
$image_array[] = "dummy/img50.jpg";
$image_array[] = "dummy/img51.jpg";
$image_array[] = "dummy/img52.jpg";
$post_meta = array(
					"address"		=> '215 Bay Shore',
					"add_city"		=> 'Yorkshire',
					"add_state"		=> 'MA',
					"add_country"	=> 'USA',
					"add_zip_code"	=> '1125487',
					"area"			=> '12548',
					"bath_rooms"	=> '4',
					"mlsno"			=> 'CA46252547',
					"price"			=> '21478',
					"property_type"	=> 'Sale',
					"add_feature"	=> 'Attic<Br>Cable Ready<br>Fireplace<br>Gated Entry<br>Hot Tub/Spa<br>Pool',
					"alive_days"	=> '30',
					"tl_dummy_content"	=> '1',
					"add_location"	=> 'MA',
					"bed_rooms"		=> '4',
				);
$post_info[] = array(
					"post_title"	=>	'King Palace',
					"post_content"	=>	'Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. ',
					"post_meta"		=>	$post_meta,
					"post_author"	=>	$agents_ids_array[array_rand($agents_ids_array)],
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Properties'),
					"post_tags"		=>	array()
					);
////post end///
////post start///
$image_array = array();
$post_meta = array();
$image_array[] = "dummy/img53.jpg";
$image_array[] = "dummy/img54.jpg";
$image_array[] = "dummy/img55.jpg";
$image_array[] = "dummy/img56.jpg";
$post_meta = array(
					"address"		=> '43 Dale Dr Road',
					"add_city"		=> 'London',
					"add_state"		=> 'NJ',
					"add_country"	=> 'USA',
					"add_zip_code"	=> '125478',
					"area"			=> '3254',
					"bath_rooms"	=> '3',
					"mlsno"			=> 'CA4698747',
					"price"			=> '13658',
					"property_type"	=> 'Sale',
					"add_feature"	=> 'Attic<Br>Cable Ready<br>Fireplace<br>Gated Entry<br>Hot Tub/Spa<br>Pool',
					"alive_days"	=> '30',
					"tl_dummy_content"	=> '1',
					"add_location"	=> 'NJ',
					"bed_rooms"		=> '4',
				);
$post_info[] = array(
					"post_title"	=>	'Jolly Plaza',
					"post_content"	=>	'Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. ',
					"post_meta"		=>	$post_meta,
					"post_author"	=>	$agents_ids_array[array_rand($agents_ids_array)],
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Properties'),
					"post_tags"		=>	array()
					);
////post end///
////post start///
$image_array = array();
$post_meta = array();
$image_array[] = "dummy/img57.jpg";
$image_array[] = "dummy/img58.jpg";
$image_array[] = "dummy/img59.jpg";
$image_array[] = "dummy/img60.jpg";
$post_meta = array(
					"address"		=> '5 Buckingham Dr Street',
					"add_city"		=> 'paris',
					"add_state"		=> 'NX',
					"add_country"	=> 'USA',
					"add_zip_code"	=> '21478',
					"area"			=> '2145',
					"bath_rooms"	=> '2',
					"mlsno"			=> 'CA469547',
					"price"			=> '13258',
					"property_type"	=> 'Sale',
					"add_feature"	=> 'Attic<Br>Cable Ready<br>Fireplace<br>Gated Entry<br>Hot Tub/Spa<br>Pool',
					"alive_days"	=> '30',
					"tl_dummy_content"	=> '1',
					"add_location"	=> 'NX',
					"bed_rooms"		=> '2',
				);
$post_info[] = array(
					"post_title"	=>	'Yash Plaza',
					"post_content"	=>	'Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. ',
					"post_meta"		=>	$post_meta,
					"post_author"	=>	$agents_ids_array[array_rand($agents_ids_array)],
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Properties'),
					"post_tags"		=>	array()
					);
////post end///
insert_posts($post_info);
function insert_posts($post_info)
{
	global $wpdb,$current_user;
	for($i=0;$i<count($post_info);$i++)
	{
		$post_title = $post_info[$i]['post_title'];
		$post_count = $wpdb->get_var("SELECT count(ID) FROM $wpdb->posts where post_title like \"$post_title\" and post_type='post' and post_status in ('publish','draft')");
		if(!$post_count)
		{
			$post_info_arr = array();
			$catids_arr = array();
			$my_post = array();
			$post_info_arr = $post_info[$i];
			if($post_info_arr['post_category'])
			{
				for($c=0;$c<count($post_info_arr['post_category']);$c++)
				{
					$catids_arr[] = get_cat_ID($post_info_arr['post_category'][$c]);
				}
			}else
			{
				$catids_arr[] = 1;
			}
			$my_post['post_title'] = $post_info_arr['post_title'];
			$my_post['post_content'] = $post_info_arr['post_content'];
			if($post_info_arr['post_author'])
			{
				$my_post['post_author'] = $post_info_arr['post_author'];
			}else
			{
				$my_post['post_author'] = 1;
			}
			$my_post['post_status'] = 'publish';
			$my_post['post_category'] = $catids_arr;
			$my_post['tags_input'] = $post_info_arr['post_tags'];
			$last_postid = wp_insert_post( $my_post );
			$post_meta = $post_info_arr['post_meta'];
			if($post_meta)
			{
				foreach($post_meta as $mkey=>$mval)
				{
					update_post_meta($last_postid, $mkey, $mval);
				}
			}
			
			$post_image = $post_info_arr['post_image'];
			if($post_image)
			{
				for($m=0;$m<count($post_image);$m++)
				{
					$menu_order = $m+1;
					$image_name_arr = explode('/',$post_image[$m]);
					$img_name = $image_name_arr[count($image_name_arr)-1];
					$img_name_arr = explode('.',$img_name);
					$post_img = array();
					$post_img['post_title'] = $img_name_arr[0];
					$post_img['post_status'] = 'attachment';
					$post_img['post_parent'] = $last_postid;
					$post_img['post_type'] = 'attachment';
					$post_img['post_mime_type'] = 'image/jpeg';
					$post_img['menu_order'] = $menu_order;
					$last_postimage_id = wp_insert_post( $post_img );
					update_post_meta($last_postimage_id, '_wp_attached_file', $post_image[$m]);					
					$post_attach_arr = array(
										"width"	=>	580,
										"height" =>	480,
										"hwstring_small"=> "height='150' width='150'",
										"file"	=> $post_image[$m],
										//"sizes"=> $sizes_info_array,
										);
					wp_update_attachment_metadata( $last_postimage_id, $post_attach_arr );
				}
			}
		}
	}
}
//====================================================================================//
/////////////////////////////////////////////////

$pages_array = array(array('About','Sub Page 1','Sub Page 2'),'Loan','Mortgage','Rentals','Contact',array('Archive Pages','Sub Page in 1','Sub Page in 2','Full Width Page','Site Map'));
$page_info_arr = array();
$page_info_arr['About'] = '
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.</p>
<p>Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.</p>
';
$page_info_arr['Sub Page 1'] = '
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.</p>
<p>Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.</p>
';
$page_info_arr['Sub Page 2'] = '
<pLorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero. </p>

<P>Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero. </p>

<p>Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero. </p>
';
$page_info_arr['Loan'] = '
<pLorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero. </p>

<P>Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero. </p>

<p>Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero. </p>
';
$page_info_arr['Mortgage'] = '
<pLorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero. </p>

<P>Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero. </p>

<p>Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero. </p>
';
$page_info_arr['Rentals'] = '
<blockquote>The raft drew beyond the middle of the river; the boys pointed her head right, and then lay on their oars.</blockquote>

The river was not high, so there was not more <a href="http://skeevisarts.com">than a two or three mile current</a>. Hardly a word was
said<strong> during the next three-quarters of</strong> an hour. Now the raft was passing before the distant town. Two or three glimmering lights showed where it lay, peacefully sleeping, beyond the <em>vague vast sweep</em> of star-gemmed water, unconscious of the <span style="text-decoration: underline;">tremendous</span> event that was happening.
<ul>
	<li>The <strong>Black Avenger</strong> stood still with folded arms, "looking his last" upon</li>
	<li>the scene of his former joys and his later sufferings, and wishing</li>
	<li>"she" <em>could see him now</em>, abroad on the wild sea, facing peril and death with dauntless heart, going to his doom with a grim smile on his lips. It was but a small strain on his imagination to remove Jacksons Island</li>
	<li>beyond eyeshot of the village, and so he "looked his last" with a</li>
	<li>broken and satisfied heart. <span style="text-decoration: underline;">The other pirates</span> were looking their last,</li>
	<li>too; and they all <a href="#">looked</a> so long that they came near letting the</li>
</ul> 

current drift them out of the range of the island. But they discovered the danger in time, and made shift to avert it. About two oclock in the morning the raft grounded on the bar two hundred yards above the head of the island, and they waded back and forth until they had landed their freight.
<p style="text-align: center;">Part of the little rafts belongings consisted of an old sail, and this they spread over a nook in the bushes for a tent to shelter their provisions; but they themselves would sleep in the open air in good weather, as became outlaws.
<ol>
	<li>They built a fire against the side of a great log twenty or thirty</li>
	<li>steps within the sombre depths of the forest, and then cooked some</li>
	<li>bacon in the frying-pan for supper, and used up half of the corn "pone"</li>
	<li>stock they had brought. It seemed glorious sport to be feasting in that</li>
	<li>wild, free way in the virgin forest of an unexplored and uninhabited</li>
	<li>island, far from the haunts of men, and they said they never would</li>
	<li>return to civilization. The climbing fire lit up their faces and threw</li>
	<li>its ruddy glare upon the pillared tree-trunks of their forest temple,</li>
	<li>and upon the varnished foliage and festooning vines.</li>
</ol>
When the last crisp slice of bacon was gone, and the last allowance of corn pone devoured, the boys stretched themselves out on the grass, filled with contentment. They could have found a cooler place, but they would not deny themselves such a romantic feature as the roasting camp-fire.
';
$page_info_arr['Contact'] = '
<p> Contact Page Small description here Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis ligula. </p>
';
$page_info_arr['Archive Pages'] = '
<blockquote>The raft drew beyond the middle of the river; the boys pointed her head right, and then lay on their oars.</blockquote>

<ul>
	<li>The <strong>Black Avenger</strong> stood still with folded arms, "looking his last" upon</li>
	<li>the scene of his former joys and his later sufferings, and wishing</li>
	<li>"she" <em>could see him now</em>, abroad on the wild sea, facing peril and death with dauntless heart, going to his doom with a grim smile on his lips. It was but a small strain on his imagination to remove Jackson&acute;s Island</li>
	<li>beyond eyeshot of the village, and so he "looked his last" with a</li>
	<li>broken and satisfied heart. <span style="text-decoration: underline;">The other pirates</span> were looking their last,</li>
	<li>too; and they all <a href="#">looked</a> so long that they came near letting the</li>
</ul> 

<ol>
	<li>They built a fire against the side of a great log twenty or thirty</li>
	<li>steps within the sombre depths of the forest, and then cooked some</li>
	<li>bacon in the frying-pan for supper, and used up half of the corn "pone"</li>
	<li>stock they had brought. It seemed glorious sport to be feasting in that</li>
	<li>wild, free way in the virgin forest of an unexplored and uninhabited</li>
	<li>island, far from the haunts of men, and they said they never would</li>
	<li>return to civilization. The climbing fire lit up their faces and threw</li>
	<li>its ruddy glare upon the pillared tree-trunks of their forest temple,</li>
	<li>and upon the varnished foliage and festooning vines.</li>
</ol>
';
$page_info_arr['Sub Page in 1'] = '
<blockquote>The raft drew beyond the middle of the river; the boys pointed her head right, and then lay on their oars.</blockquote>

current drift them out of the range of the island. But they discovered the danger in time, and made shift to avert it. About two o&acute;clock in the morning the raft grounded on the bar two hundred yards above the head of the island, and they waded back and forth until they had landed their freight.
<p style="text-align: center;">Part of the little raft&acute;s belongings consisted of an old sail, and this they spread over a nook in the bushes for a tent to shelter their provisions; but they themselves would sleep in the open air in good weather, as became outlaws.
<ol>
	<li>They built a fire against the side of a great log twenty or thirty</li>
	<li>steps within the sombre depths of the forest, and then cooked some</li>
	<li>bacon in the frying-pan for supper, and used up half of the corn "pone"</li>
	<li>stock they had brought. It seemed glorious sport to be feasting in that</li>
	<li>wild, free way in the virgin forest of an unexplored and uninhabited</li>
	<li>island, far from the haunts of men, and they said they never would</li>
	<li>return to civilization. The climbing fire lit up their faces and threw</li>
	<li>its ruddy glare upon the pillared tree-trunks of their forest temple,</li>
	<li>and upon the varnished foliage and festooning vines.</li>
</ol>
When the last crisp slice of bacon was gone, and the last allowance of corn pone devoured, the boys stretched themselves out on the grass, filled with contentment. They could have found a cooler place, but they would not deny themselves such a romantic feature as the roasting camp-fire.
';
$page_info_arr['Sub Page in 2'] = '
<blockquote>The raft drew beyond the middle of the river; the boys pointed her head right, and then lay on their oars.</blockquote>

The river was not high, so there was not more <a href="http://skeevisarts.com">than a two or three mile current</a>. Hardly a word was
said<strong> during the next three-quarters of</strong> an hour. Now the raft was passing before the distant town. Two or three glimmering lights showed where it lay, peacefully sleeping, beyond the <em>vague vast sweep</em> of star-gemmed water, unconscious of the <span style="text-decoration: underline;">tremendous</span> event that was happening.
<ol>
	<li>They built a fire against the side of a great log twenty or thirty</li>
	<li>steps within the sombre depths of the forest, and then cooked some</li>
	<li>bacon in the frying-pan for supper, and used up half of the corn "pone"</li>
	<li>stock they had brought. It seemed glorious sport to be feasting in that</li>
	<li>wild, free way in the virgin forest of an unexplored and uninhabited</li>
	<li>island, far from the haunts of men, and they said they never would</li>
	<li>return to civilization. The climbing fire lit up their faces and threw</li>
	<li>its ruddy glare upon the pillared tree-trunks of their forest temple,</li>
	<li>and upon the varnished foliage and festooning vines.</li>
</ol>
When the last crisp slice of bacon was gone, and the last allowance of corn pone devoured, the boys stretched themselves out on the grass, filled with contentment. They could have found a cooler place, but they would not deny themselves such a romantic feature as the roasting camp-fire.
';
$page_info_arr['Full Width Page'] =  '
<blockquote>The raft drew beyond the middle of the river; the boys pointed her head right, and then lay on their oars.</blockquote>

The river was not high, so there was not more <a href="http://skeevisarts.com">than a two or three mile current</a>. Hardly a word was
said<strong> during the next three-quarters of</strong> an hour. Now the raft was passing before the distant town. Two or three glimmering lights showed where it lay, peacefully sleeping, beyond the <em>vague vast sweep</em> of star-gemmed water, unconscious of the <span style="text-decoration: underline;">tremendous</span> event that was happening.
<ul>
	<li>The <strong>Black Avenger</strong> stood still with folded arms, "looking his last" upon</li>
	<li>the scene of his former joys and his later sufferings, and wishing</li>
	<li>"she" <em>could see him now</em>, abroad on the wild sea, facing peril and death with dauntless heart, going to his doom with a grim smile on his lips. It was but a small strain on his imagination to remove Jackson&acute;s Island</li>
	<li>beyond eyeshot of the village, and so he "looked his last" with a</li>
	<li>broken and satisfied heart. <span style="text-decoration: underline;">The other pirates</span> were looking their last,</li>
	<li>too; and they all <a href="#">looked</a> so long that they came near letting the</li>
</ul> 
When the last crisp slice of bacon was gone, and the last allowance of corn pone devoured, the boys stretched themselves out on the grass, filled with contentment. They could have found a cooler place, but they would not deny themselves such a romantic feature as the roasting camp-fire.
';
$page_info_arr['Site Map'] =  '
<blockquote>The raft drew beyond the middle of the river; the boys pointed her head right, and then lay on their oars.</blockquote>

The river was not high, so there was not more <a href="http://skeevisarts.com">than a two or three mile current</a>. Hardly a word was
said<strong> during the next three-quarters of</strong> an hour. Now the raft was passing before the distant town. Two or three glimmering lights showed where it lay, peacefully sleeping, beyond the <em>vague vast sweep</em> of star-gemmed water, unconscious of the <span style="text-decoration: underline;">tremendous</span> event that was happening.
<ul>
	<li>The <strong>Black Avenger</strong> stood still with folded arms, "looking his last" upon</li>
	<li>the scene of his former joys and his later sufferings, and wishing</li>
	<li>"she" <em>could see him now</em>, abroad on the wild sea, facing peril and death with dauntless heart, going to his doom with a grim smile on his lips. It was but a small strain on his imagination to remove Jackson&acute;s Island</li>
	<li>beyond eyeshot of the village, and so he "looked his last" with a</li>
	<li>broken and satisfied heart. <span style="text-decoration: underline;">The other pirates</span> were looking their last,</li>
	<li>too; and they all <a href="#">looked</a> so long that they came near letting the</li>
</ul> 
When the last crisp slice of bacon was gone, and the last allowance of corn pone devoured, the boys stretched themselves out on the grass, filled with contentment. They could have found a cooler place, but they would not deny themselves such a romantic feature as the roasting camp-fire.
';


set_page_info_autorun($pages_array,$page_info_arr);
function set_page_info_autorun($pages_array,$page_info_arr_arg)
{
	global $post_author,$wpdb;
	$last_tt_id = 1;
	if(count($pages_array)>0)
	{
		$page_info_arr = array();
		for($p=0;$p<count($pages_array);$p++)
		{
			if(is_array($pages_array[$p]))
			{
				for($i=0;$i<count($pages_array[$p]);$i++)
				{
					$page_info_arr1 = array();
					$page_info_arr1['post_title'] = $pages_array[$p][$i];
					$page_info_arr1['post_content'] = $page_info_arr_arg[$pages_array[$p][$i]];
					$page_info_arr1['post_parent'] = $pages_array[$p][0];
					$page_info_arr[] = $page_info_arr1;
				}
			}
			else
			{
				$page_info_arr1 = array();
				$page_info_arr1['post_title'] = $pages_array[$p];
				$page_info_arr1['post_content'] = $page_info_arr_arg[$pages_array[$p]];
				$page_info_arr1['post_parent'] = '';
				$page_info_arr[] = $page_info_arr1;
			}
		}

		if($page_info_arr)
		{
			for($j=0;$j<count($page_info_arr);$j++)
			{
				$post_title = $page_info_arr[$j]['post_title'];
				$post_content = addslashes($page_info_arr[$j]['post_content']);
				$post_parent = $page_info_arr[$j]['post_parent'];
				if($post_parent!='')
				{
					$post_parent_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like \"$post_parent\" and post_type='page'");
				}else
				{
					$post_parent_id = 0;
				}
				$post_date = date('Y-m-d H:s:i');
				$post_name = strtolower(str_replace(array("'",'"',"?",".","!","@","#","$","%","^","&","*","(",")","-","+","+"," "),array('-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-'),$post_title));
				$post_name_count = $wpdb->get_var("SELECT count(ID) FROM $wpdb->posts where post_title like \"$post_title\" and post_type='page'");
				if($post_name_count>0)
				{
					echo '';
				}else
				{
					$post_sql = "insert into $wpdb->posts (post_author,post_date,post_date_gmt,post_title,post_content,post_name,post_parent,post_type) values (\"$post_author\", \"$post_date\", \"$post_date\",  \"$post_title\", \"$post_content\", \"$post_name\",\"$post_parent_id\",'page')";
					$wpdb->query($post_sql);
					$last_post_id = $wpdb->get_var("SELECT max(ID) FROM $wpdb->posts");
					$guid = get_option('siteurl')."/?p=$last_post_id";
					$guid_sql = "update $wpdb->posts set guid=\"$guid\" where ID=\"$last_post_id\"";
					$wpdb->query($guid_sql);
					$ter_relation_sql = "insert into $wpdb->term_relationships (object_id,term_taxonomy_id) values (\"$last_post_id\",\"$last_tt_id\")";
					$wpdb->query($ter_relation_sql);
					update_post_meta( $last_post_id, 'pt_dummy_content', 1 );
				}
			}
		}
	}
}
///////////////////////////////////////////////////////////////////////////////////
//====================================================================================//
/////////////// WIDGET SETTINGS START ///////////////
$sidebars_widgets = get_option('sidebars_widgets');  //collect widget informations
$categories_info = array();
$post_loan_id = $wpdb->get_var("SELECT guid FROM $wpdb->posts where post_title like 'Loan' and post_type='page'");
$post_rent_id = $wpdb->get_var("SELECT guid FROM $wpdb->posts where post_title like 'Rentals' and post_type='page'");
$post_morgage_id = $wpdb->get_var("SELECT guid FROM $wpdb->posts where post_title like 'Mortgage' and post_type='page'");
$categories_comments_info[1] = array(
					"t1"			=>	'Loan',
					"t2"			=>	'<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy </p>',
					"t3"			=>	$post_loan_id,
					"t4"			=>	'Rentals',
					"t5"			=>	'<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy </p>',
					"t6"			=>	$post_rent_id,
					"t7"			=>	'MOVING? LET US HELP',
					"t8"			=>	'Call now 1-888 888 8888',
					"t9"			=>	'Mon - Fri 10:00am to 7:00pm',
					"t10"			=>	$post_morgage_id,
					);
$categories_comments_info['_multiwidget'] = '1';
update_option('widget_widget_contact',$categories_comments_info);
$categories_comments_info = get_option('widget_widget_contact');
krsort($categories_comments_info);
foreach($categories_comments_info as $key1=>$val1)
{
	$categories_info_key = $key1;
	if(is_int($categories_info_key))
	{
		break;
	}
}
$sidebars_widgets["sidebar-1"] = array("widget_contact-$categories_info_key");
//===============================================================================
$categories_info = array();
$categories_comments_info[1] = array(
					"title"			=>	'Top Agents',
					"post_number"	=>	'',
					);
$categories_comments_info['_multiwidget'] = '1';
update_option('widget_widget_featuredagent',$categories_comments_info);
$categories_comments_info = get_option('widget_widget_featuredagent');
krsort($categories_comments_info);
foreach($categories_comments_info as $key1=>$val1)
{
	$categories_info_key = $key1;
	if(is_int($categories_info_key))
	{
		break;
	}
}
$sidebars_widgets["sidebar-2"] = array("widget_featuredagent-$categories_info_key");
//===============================================================================
$post_info = array();
$post_info[1] = array(
					"title"			=>	'Latest News',
					"post_number"	=>	'5',
					);
$post_info['_multiwidget'] = '1';
update_option('widget_widget_posts',$post_info);
$post_info = get_option('widget_widget_posts');
krsort($post_info);
foreach($post_info as $key1=>$val1)
{
	$post_info_key = $key1;
	if(is_int($post_info_key))
	{
		break;
	}
}
$subscribe = array();
$subscribe[1] = array(
					"title"			=>	'Subscribe Now',
					"text"	=>	'Stay updated with all our latest news enter your e-mail address here',
					);
$subscribe['_multiwidget'] = '1';
update_option('widget_widget_subscribe',$subscribe);
$subscribe = get_option('widget_widget_subscribe');
krsort($subscribe);
foreach($subscribe as $key1=>$val1)
{
	$subscribe_key = $key1;
	if(is_int($subscribe_key))
	{
		break;
	}
}
$sidebars_widgets["sidebar-3"] = array("widget_posts-$post_info_key","widget_subscribe-$subscribe_key");
//===============================================================================
$post_info = array();
$post_info = get_option('widget_widget_posts');
$post_info[] = array(
					"title"			=>	'Latest News',
					"post_number"	=>	'5',
					);
$post_info['_multiwidget'] = '1';
update_option('widget_widget_posts',$post_info);
$post_info = get_option('widget_widget_posts');
krsort($post_info);
foreach($post_info as $key1=>$val1)
{
	$post_info_key = $key1;
	if(is_int($post_info_key))
	{
		break;
	}
}
$login = array();
$login[1] = array(
					"title"			=>	'Member Login',
					);
$login['_multiwidget'] = '1';
update_option('widget_widget_loginwidget',$login);
$login = get_option('widget_widget_loginwidget');
krsort($login);
foreach($login as $key1=>$val1)
{
	$login_key = $key1;
	if(is_int($login_key))
	{
		break;
	}
}
$about1 = array();
$about1 = get_option('widget_widget_about');
$about1[1] = array(
					"title"			=>	'About Us',
					"desc1"			=>	'<p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. </p>',
					);
$about1['_multiwidget'] = '1';
update_option('widget_widget_about',$about1);
$about1 = get_option('widget_widget_about');
krsort($about1);
foreach($about1 as $key1=>$val1)
{
	$about1_key = $key1;
	if(is_int($about1_key))
	{
		break;
	}
}
$sidebars_widgets["sidebar-4"] = array("widget_loginwidget-$login_key","widget_posts-$post_info_key","widget_about-$about1_key");
//===============================================================================
$post_info = array();
$post_info = get_option('widget_widget_posts');
$post_info[] = array(
					"title"			=>	'Latest News',
					"post_number"	=>	'5',
					);
$post_info['_multiwidget'] = '1';
update_option('widget_widget_posts',$post_info);
$post_info = get_option('widget_widget_posts');
krsort($post_info);
foreach($post_info as $key1=>$val1)
{
	$post_info_key = $key1;
	if(is_int($post_info_key))
	{
		break;
	}
}
$subscribe = array();
$subscribe = get_option('widget_widget_subscribe');
$subscribe[] = array(
					"title"			=>	'Subscribe Now',
					"text"	=>	'Stay updated with all our latest news enter your e-mail address here',
					);
$subscribe['_multiwidget'] = '1';
update_option('widget_widget_subscribe',$subscribe);
$subscribe = get_option('widget_widget_subscribe');
krsort($subscribe);
foreach($subscribe as $key1=>$val1)
{
	$subscribe_key = $key1;
	if(is_int($subscribe_key))
	{
		break;
	}
}
$tags = array();
$tags[1] = array(
					"title"			=>	'Tag Cloud',
					);
$tags['_multiwidget'] = '1';
update_option('widget_widget_tags',$tags);
$tags = get_option('widget_widget_tags');
krsort($tags);
foreach($tags as $key1=>$val1)
{
	$tags_key = $key1;
	if(is_int($tags_key))
	{
		break;
	}
}
$adv = array();
$adv[1] = array(
					"title"			=>	'',
					"advt1"			=>	$dummy_image_path.'i-banner02.jpg',
					"advt_link1"	=>	'http://templatic.com',
					);
$adv['_multiwidget'] = '1';
update_option('widget_widget_advt',$adv);
$adv = get_option('widget_widget_advt');
krsort($adv);
foreach($adv as $key1=>$val1)
{
	$adv_key = $key1;
	if(is_int($adv_key))
	{
		break;
	}
}
$link = array();
$link[1] = array(
					"images"	=>	'1',
					"name"		=>	'1',
					"description"=>	'1',
					"rating"	=>	'0',
					"category"	=>	'0',
					);
$link['_multiwidget'] = '1';
update_option('widget_links',$link);
$link = get_option('widget_links');
krsort($link);
foreach($link as $key1=>$val1)
{
	$link_key = $key1;
	if(is_int($link_key))
	{
		break;
	}
}
$archive = array();
$archive[1] = array(
					"title"		=>	'Archive',
					"count"		=>	'0',
					"dropdown"	=>	'0',
					);
$archive['_multiwidget'] = '1';
update_option('widget_archives',$archive);
$archive = get_option('widget_archives');
krsort($archive);
foreach($archive as $key1=>$val1)
{
	$archive_key = $key1;
	if(is_int($archive_key))
	{
		break;
	}
}
$sidebars_widgets["sidebar-5"] = array("widget_posts-$post_info_key","archives-$archive_key","widget_subscribe-$subscribe_key","widget_tags-$tags_key","links-$link_key","widget_advt-$adv_key");
//===============================================================================
$about1 = array();
$about1 = get_option('widget_widget_about');
$about1[] = array(
					"title"			=>	'100% Satisfaction Guaranteed',
					"desc1"			=>	'<p> If you&acute;re not 100% satisfied with the results from your listing, request a full refund within 30 days after your listing expires. No questions asked. Promise.</p><p>See also our <a href="#" >frequently asked questions. </a></p>',
					);
$about1['_multiwidget'] = '1';
update_option('widget_widget_about',$about1);
$about1 = get_option('widget_widget_about');
krsort($about1);
foreach($about1 as $key1=>$val1)
{
	$about1_key = $key1;
	if(is_int($about1_key))
	{
		break;
	}
}
$about2 = array();
$about2 = get_option('widget_widget_about');
$about2[] = array(
					"title"			=>	'Payment Info',
					"desc1"			=>	'<p> $250 Full-time listing (60 days) </p><p> $75 Freelance listing (30 days) </p><p> <img src="'.$dummy_image_path.'vcards.gif"  alt="" > </p><p> Visa, Mastercard, American Express, and Discover cards accepted </p>All major credit cards accepted. Payments are processed by PayPal, but you do not need an account with PayPal to complete your transaction. (Contact us with any questions.)',
					);
$about2['_multiwidget'] = '1';
update_option('widget_widget_about',$about2);
$about2 = get_option('widget_widget_about');
krsort($about2);
foreach($about2 as $key1=>$val1)
{
	$about2_key = $key1;
	if(is_int($about2_key))
	{
		break;
	}
}
$about3 = array();
$about3 = get_option('widget_widget_about');
$about3[] = array(
    "title"	=> 'Need Help?',
    "desc1"	=> '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis ligula.  </p>',
);
$about3['_multiwidget'] = '1';
update_option('widget_widget_about',$about3);
$about3 = get_option('widget_widget_about');
krsort($about3);
foreach($about3 as $key1=>$val1)
{
	$about3_key = $key1;
	if(is_int($about3_key))
	{
		break;
	}
}
$sidebars_widgets["sidebar-6"] = array("widget_about-$about1_key","widget_about-$about2_key","widget_about-$about3_key");
//===============================================================================
$categories_info = array();
$categories_comments_info = get_option('widget_widget_featuredagent');
$categories_comments_info[] = array(
					"title"			=>	'Top Agents',
					"post_number"	=>	'',
					);
$categories_comments_info['_multiwidget'] = '1';
update_option('widget_widget_featuredagent',$categories_comments_info);
$categories_comments_info = get_option('widget_widget_featuredagent');
krsort($categories_comments_info);
foreach($categories_comments_info as $key1=>$val1)
{
	$categories_info_key = $key1;
	if(is_int($categories_info_key))
	{
		break;
	}
}
$login = array();
$login = get_option('widget_widget_loginwidget');
$login = get_option('widget_widget_loginwidget');
$login[] = array(
					"title"			=>	'Member Login',
					);
$login['_multiwidget'] = '1';
update_option('widget_widget_loginwidget',$login);
$login = get_option('widget_widget_loginwidget');
krsort($login);
foreach($login as $key1=>$val1)
{
	$login_key = $key1;
	if(is_int($login_key))
	{
		break;
	}
}
$finance = array();
$finance[1] = array(
					"title"			=>	'Finance Calculator',
					);
$finance['_multiwidget'] = '1';
update_option('widget_widget_finance_calculator',$finance);
$finance = get_option('widget_widget_finance_calculator');
krsort($finance);
foreach($finance as $key1=>$val1)
{
	$finance_key = $key1;
	if(is_int($finance_key))
	{
		break;
	}
}
$adv = array();
$adv = get_option('widget_widget_advt');
$adv[] = array(
					"title"			=>	'',
					"advt1"			=>	$dummy_image_path.'i-banner02.jpg',
					"advt_link1"	=>	'http://templatic.com',
					);
$adv['_multiwidget'] = '1';
update_option('widget_widget_advt',$adv);
$adv = get_option('widget_widget_advt');
krsort($adv);
foreach($adv as $key1=>$val1)
{
	$adv_key = $key1;
	if(is_int($adv_key))
	{
		break;
	}
}
$link = array();
$link = get_option('widget_links');
$link[] = array(
					"images"	=>	'1',
					"name"		=>	'1',
					"description"=>	'1',
					"rating"	=>	'0',
					"category"	=>	'0',
					);
$link['_multiwidget'] = '1';
update_option('widget_links',$link);
$link = get_option('widget_links');
krsort($link);
foreach($link as $key1=>$val1)
{
	$link_key = $key1;
	if(is_int($link_key))
	{
		break;
	}
}
$sidebars_widgets["sidebar-7"] = array("widget_featuredagent-$categories_info_key","widget_loginwidget-$login_key","widget_finance_calculator-$finance_key","links-$link_key","widget_advt-$adv_key");
//===============================================================================
$about1 = array();
$about1 = get_option('widget_widget_about');
$about1[] = array(
					"title"			=>	'About Us',
					"desc1"			=>	'<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo porttitor, felis. </p>',
					);
$about1['_multiwidget'] = '1';
update_option('widget_widget_about',$about1);
$about1 = get_option('widget_widget_about');
krsort($about1);
foreach($about1 as $key1=>$val1)
{
	$about1_key = $key1;
	if(is_int($about1_key))
	{
		break;
	}
}
$sidebars_widgets["sidebar-8"] = array("widget_about-$about1_key");
//===============================================================================
$link = array();
$link = get_option('widget_links');
$link[] = array(
					"images"	=>	'1',
					"name"		=>	'1',
					"description"=>	'1',
					"rating"	=>	'0',
					"category"	=>	'0',
					);
$link['_multiwidget'] = '1';
update_option('widget_links',$link);
$link = get_option('widget_links');
krsort($link);
foreach($link as $key1=>$val1)
{
	$link_key = $key1;
	if(is_int($link_key))
	{
		break;
	}
}
$sidebars_widgets["sidebar-9"] = array("links-$link_key");
//===============================================================================
$blockquote = array();
$blockquote[1] = array(
					"title"			=>	'Testimonials',
					"quote1"		=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam ante ac quam.',
					"author1"		=>	'Robert',
					"quote2"		=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam ante ac quam.',
					"author2"		=>	'Mark Flournoy',
					"quote3"		=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam ante ac quam.',
					"author3"		=>	'Ben McIntosh',
					"quote4"		=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam ante ac quam.',
					"author4"		=>	'Alison Wood',
					"quote5"		=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam ante ac quam.',
					"author5"		=>	'Ben McIntosh',
					);
$blockquote['_multiwidget'] = '1';
update_option('widget_widget_blockquote',$blockquote);
$blockquote = get_option('widget_widget_blockquote');
krsort($blockquote);
foreach($blockquote as $key1=>$val1)
{
	$blockquote_key = $key1;
	if(is_int($blockquote_key))
	{
		break;
	}
}
$sidebars_widgets["sidebar-10"] = array("widget_blockquote-$blockquote_key");
//===============================================================================
//////////////////////////////////////////////////////
update_option('sidebars_widgets',$sidebars_widgets);  //save widget iformations
/////////////// WIDGET SETTINGS END ///////////////

$photo_page_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'Contact' and post_type='page'");
update_post_meta( $photo_page_id, '_wp_page_template', 'page_contact.php' );

$photo_page_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'Archive Pages' and post_type='page'");
update_post_meta( $photo_page_id, '_wp_page_template', 'page-archives.php' );

$photo_page_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'Full Width Page' and post_type='page'");
update_post_meta( $photo_page_id, '_wp_page_template', 'page-full.php' );

$photo_page_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'Site Map' and post_type='page'");
update_post_meta( $photo_page_id, '_wp_page_template', 'page-sitemap.php' );

global $upload_folder_path;
$folderpath = $upload_folder_path . "dummy/";
full_copy( TEMPLATEPATH."/images/dummy/", ABSPATH . $folderpath );
//full_copy( TEMPLATEPATH."/images/dummy/", ABSPATH . "wp-content/uploads/dummy/" );
function full_copy( $source, $target ) 
{
	global $upload_folder_path;
	$imagepatharr = explode('/',$upload_folder_path."dummy");
	$year_path = ABSPATH;
	for($i=0;$i<count($imagepatharr);$i++)
	{
	  if($imagepatharr[$i])
	  {
		  $year_path .= $imagepatharr[$i]."/";
		  //echo "<br>";
		  if (!file_exists($year_path)){
			  mkdir($year_path, 0777);
		  }     
		}
	}
	@mkdir( $target );
		$d = dir( $source );
		
	if ( is_dir( $source ) ) {
		@mkdir( $target );
		$d = dir( $source );
		while ( FALSE !== ( $entry = $d->read() ) ) {
			if ( $entry == '.' || $entry == '..' ) {
				continue;
			}
			$Entry = $source . '/' . $entry; 
			if ( is_dir( $Entry ) ) {
				full_copy( $Entry, $target . '/' . $entry );
				continue;
			}
			copy( $Entry, $target . '/' . $entry );
		}
	
		$d->close();
	}else {
		copy( $source, $target );
	}
}
?>