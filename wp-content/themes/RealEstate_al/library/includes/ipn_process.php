<?php
global $wpdb;
$url = 'https://www.paypal.com/cgi-bin/webscr';
$postdata = '';
foreach($_POST as $i => $v)
{
	$postdata .= $i.'='.urlencode($v).'&amp;';
}
$postdata .= 'cmd=_notify-validate';
 
$web = parse_url($url);
if ($web['scheme'] == 'https') 
{
	$web['port'] = 443;
	$ssl = 'ssl://';
} 
else 
{
	$web['port'] = 80;
	$ssl = '';
}
$fp = @fsockopen($ssl.$web['host'], $web['port'], $errnum, $errstr, 30);
 
if (!$fp) 
{
	echo $errnum.': '.$errstr;
}
else
{
	fputs($fp, "POST ".$web['path']." HTTP/1.1\r\n");
	fputs($fp, "Host: ".$web['host']."\r\n");
	fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n");
	fputs($fp, "Content-length: ".strlen($postdata)."\r\n");
	fputs($fp, "Connection: close\r\n\r\n");
	fputs($fp, $postdata . "\r\n\r\n");
 
	while(!feof($fp)) 
	{
		$info[] = @fgets($fp, 1024);
	}
	fclose($fp);
	$info = implode(',', $info);
	if (eregi('VERIFIED', $info)) 
	{
		$to = get_site_emailId();
		
		// yes valid, f.e. change payment status
		$postid = $_POST['custom'];
		$item_name = $_POST['item_name'];
		$txn_id = $_POST['txn_id'];
		$payment_status       = $_POST['payment_status'];
		$payment_type         = $_POST['payment_type'];
		$payment_date         = $_POST['payment_date'];
		$txn_type             = $_POST['txn_type'];
		
		$post_default_status = get_property_default_status();
		if($post_default_status=='')
		{
			$post_default_status = 'publish';
		}
		set_property_status($postid,$post_default_status);
		
		$transaction_details .= "--------------------------------------------------\r";
		$transaction_details .= "Payment Details for Property ID #$postid\r";
		$transaction_details .= "--------------------------------------------------\r";
		$transaction_details .= " Property Title: $item_name \r";
		$transaction_details .= "--------------------------------------------------\r";
		$transaction_details .= "Trans ID: $txn_id\r";
		$transaction_details .= "  Status: $payment_status\r";
		$transaction_details .= "    Type: $payment_type\r";
		$transaction_details .= "  Date: $payment_date\r";
		$transaction_details .= "  Method: $txn_type\r";
		$transaction_details .= "--------------------------------------------------\r";
		$subject = "Property Submitted and Payment Success Confirmation Email";
		
		mail($to,$subject,$transaction_details,$headerarr);
		
		$productinfosql = "select ID,post_title,guid,post_author from $wpdb->posts where ID = $postid";
		$productinfo = $wpdb->get_results($productinfosql);
		foreach($productinfo as $productinfoObj)
		{
			$post_link = get_option('siteurl').'/?page=preview&alook=1&pid='.$postid;
			$post_title = '<a href="'.$post_link.'">'.$productinfoObj->post_title.'</a>'; 
			$aid = $productinfoObj->post_author;
			$userInfo = get_author_info($aid);
			$to_name = $userInfo->user_nicename;
			$to_email = $userInfo->user_email;
		}
		$transaction_details .= "Property URL\r";
		$transaction_details .= "--------------------------------------------------\r";
		$transaction_details .= "  $post_title\r";
		mail($to_email,$subject,$transaction_details,$headerarr);
	}
	else
	{
		// invalid, log error or something
	}
}
?>