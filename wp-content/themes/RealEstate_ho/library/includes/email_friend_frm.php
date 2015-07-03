<?php
if($_POST)
{
	$yourname = $_POST['yourname'];
	$youremail = $_POST['youremail'];
	$frnd_subject = $_POST['frnd_subject'];
	$frnd_comments = $_POST['frnd_comments'];
	$pid = $_POST['pid'];
	$to_email = $_POST['to_email'];
	$to_name = $_POST['to_name'];
	if($_REQUEST['pid'])
	{
		$productinfosql = "select ID,post_title from $wpdb->posts where ID =".$_REQUEST['pid'];
		$productinfo = $wpdb->get_results($productinfosql);
		foreach($productinfo as $productinfoObj)
		{
			$post_title = $productinfoObj->post_title; 
		}
	}
	///////Inquiry EMAIL START//////
	global $General;
	global $upload_folder_path;
	$store_name = get_option('blogname');
	$clientdestinationfile =   ABSPATH . $upload_folder_path."notification/emails/email_post.txt";
	if(!file_exists($clientdestinationfile))
	{
		$message1 = EMAIL_FRIEND_EMAIL_DEFAULT_TEXT;
	}else
	{
		$message1 = file_get_contents($clientdestinationfile);
	}
	$filecontent_arr1 = explode('[SUBJECT-STR]',$message1);
	$filecontent_arr2 = explode('[SUBJECT-END]',$filecontent_arr1[1]);
	$subject = $filecontent_arr2[0];
	if($subject == '')
	{
		$subject = $frnd_subject;
	}
	$client_message = $filecontent_arr2[1];
	$post_url_link = '<a href="'.get_option('siteurl').'/?p='.$_REQUEST['pid'].'">'.$post_title.'</a>';
	/////////////customer email//////////////
	$yourname_link = $yourname.'<br>Send from - <b><a href="'.get_option('siteurl').'">'.get_option('blogname').'</a></b>.';
	$search_array = array('[#$to_name#]','[#$post_title#]','[#$frnd_subject#]','[#$frnd_comments#]','[#$your_name#]','[#$post_url_link#]');
	$replace_array = array($to_name,$post_url_link,$frnd_subject,nl2br($frnd_comments),$yourname_link,$post_url_link);
	$client_message = str_replace($search_array,$replace_array,$client_message);
/*	echo "From : $youremail  Name : $yourname <br>";
	echo "To : $to_email  Name : $to_name <br>";
	echo "Subject $subject <br>";
	echo "$client_message";
	exit;*/
	sendEmail($youremail,$yourname,$to_email,$to_name,$subject,$client_message,$extra='');///To clidne email
	//////Inquiry EMAIL END////////	
}
?>