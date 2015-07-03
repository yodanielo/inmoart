<?php
if($_POST)
{
	$yourname = $_POST['inq_name'];
	$youremail = $_POST['inq_email'];
	$inq_phone = $_POST['inq_phone'];
	$frnd_comments = $_POST['inq_msg'];
	$pid = $_POST['pid'];

	if($_REQUEST['pid'])
	{
		$productinfosql = "select ID,post_title,guid,post_author from $wpdb->posts where ID =".$_REQUEST['pid'];
		$productinfo = $wpdb->get_results($productinfosql);
		foreach($productinfo as $productinfoObj)
		{
			$post_title = '<a href="'.$productinfoObj->guid.'">'.$productinfoObj->post_title.'</a>'; 
			$aid = $productinfoObj->post_author;
		}
	}else
	{
		$aid = $_POST['aid'];
		$post_title = 'the property publish by you';
	}
	$userInfo = get_author_info($aid);
	$to_name = $userInfo->user_nicename;
	$to_email = $userInfo->user_email;
	///////Inquiry EMAIL START//////
	global $upload_folder_path;
	$clientdestinationfile =   ABSPATH . $upload_folder_path."notification/emails/send_inquiry.txt";
	if(!file_exists($clientdestinationfile))
	{
		$message1 = SEND_INQUIRY_EMAIL_DEFAULT_TEXT;
	}else
	{
		$message1 = file_get_contents($clientdestinationfile);
	}
	$filecontent_arr1 = explode('[SUBJECT-STR]',$message1);
	$filecontent_arr2 = explode('[SUBJECT-END]',$filecontent_arr1[1]);
	$subject = $filecontent_arr2[0];
	if($subject == '')
	{
		$subject = "Property Inquiry";
	}
	$client_message = $filecontent_arr2[1];
	$yourname_link = __('<br>From : ').$yourname.__('<br>Phone : ').$inq_phone.'<br><br>Send from - <b><a href="'.get_option('siteurl').'">'.get_option('blogname').'</a></b>.';
	/////////////customer email//////////////
	$search_array = array('[#$to_name#]','[#$post_title#]','[#$frnd_subject#]','[#$frnd_comments#]','[#$your_name#]');
	$replace_array = array($to_name,$post_title,$frnd_subject,nl2br($frnd_comments),$yourname_link);
	$client_message = str_replace($search_array,$replace_array,$client_message);
/*		echo "From : $youremail  Name : $yourname <br>";
	echo "To : $to_email  Name : $to_name <br>";
	echo "Subject $subject <br>";
	echo "$client_message";
	exit;*/
	sendEmail($youremail,$yourname,$to_email,$to_name,$subject,$client_message,$extra='');
	//////Inquiry EMAIL END////////	
}
?>