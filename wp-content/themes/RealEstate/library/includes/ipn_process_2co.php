<?php
global $Cart,$General;
foreach ($_POST as $field=>$value)
{
	$ipnData["$field"] = $value;
}

$postid    = intval($ipnData['x_invoice_num']);
$pnref      = $ipnData['x_trans_id'];
$amount     = doubleval($ipnData['x_amount']);
$result     = intval($ipnData['x_response_code']);
$respmsg    = $ipnData['x_response_reason_text'];
$customer_email    = $ipnData['x_email'];
$customer_name = $ipnData['x_first_name'];

$fromEmail = get_site_emailId();
$fromEmailName = get_site_emailName();
$subject = "Acknowledge for Property ID #$postid payment";

if ($result == '1')
{
	// Valid IPN transaction.
	$post_default_status = get_property_default_status();
	if($post_default_status=='')
	{
		$post_default_status = 'publish';
	}
	set_property_status($postid,$post_default_status);
	$productinfosql = "select ID,post_title,guid,post_author from $wpdb->posts where ID = $postid";
	$productinfo = $wpdb->get_results($productinfosql);
	foreach($productinfo as $productinfoObj)
	{
		$post_title = '<a href="'.$productinfoObj->guid.'">'.$productinfoObj->post_title.'</a>'; 
		$aid = $productinfoObj->post_author;
		$userInfo = get_author_info($aid);
		$to_name = $userInfo->user_nicename;
		$to_email = $userInfo->user_email;
	}
	$message = "<p>Dear '.$fromEmailName.',</p>
			<p>
			payment for property ID #$postid confirmation.<br>
			</p>
			<p>
			<b>You may find detail below:</b>
			</p>
			<p>----</p>
			<p>Property Id : '.$postid.'</p>
			<p>Property Title : '.$post_title.'</p>
			<p>User Name : '.$to_name.'</p>
			<p>User Email : '.$to_email.'</p>
			<p>Paid Amount :       '.number_format($amount,2).'</p>
			<p>Transaction ID :       '.$pnref.'</p>
			<p>Result Code : '.$result.'</p>
			<p>Response Message : '.$respmsg.'</p>
			<p>----</p><br><br>
			<p>Thank you.</p>
			'";
	mail($fromEmail,$subject,$message,$headerarr);
	//$General->sendEmail($fromEmail,$fromEmailName,$customer_email,$customer_name,$subject,$message,$extra='');///To payment email
	return true;
}
else if ($result != '1')
{
	$message = "<p>Dear '.$fromEmailName.',</p>
			<p>
			payment for property ID #$postid incompleted.<br>
			because of $respmsg
			</p>
			<p>
			<b>You may find detail below:</b>
			</p>
			<p>----</p>
			<p>Property Id : '.$postid.'</p>
			<p>Property Title : '.$post_title.'</p>
			<p>User Name : '.$to_name.'</p>
			<p>User Email : '.$to_email.'</p>
			<p>Paid Amount :       '.number_format($amount,2).'</p>
			<p>Transaction ID :       '.$pnref.'</p>
			<p>Result Code : '.$result.'</p>
			<p>Response Message : '.$respmsg.'</p>
			<p>----</p><br><br>
			<p>Thank you.</p>
			'";
	mail($fromEmail,$subject,$message,$headerarr);
	//$General->sendEmail($fromEmail,$fromEmailName,$customer_email,$customer_name,$subject,$message,$extra='');///To payment email
	return false;
}
?>