<?php

$load = '../../../../wp-config.php';

if (file_exists($load))

{  //if it's >WP-2.6

	require_once($load);

}

else

{

	wp_die('Error: Config file not found');

}



$db = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);

mysql_select_db(DB_NAME);

$current_date = date('Y-m-d');

$post_ids_array = array();

global $wpdb;
echo $sql = "select p.ID,date_format(date_add(p.post_date, INTERVAL pm.meta_value DAY),'%Y-%m-%d') as exp_date from $wpdb->posts p join $wpdb->postmeta pm on pm.post_id=p.ID where pm.meta_key='active_days' and date_format(date_add(p.post_date, INTERVAL pm.meta_value DAY),'%Y-%m-%d')<$current_date";

$res = mysql_query($sql);

if(mysql_num_rows($res)>0)

{

	while($row = mysql_fetch_array($res))

	{

		$post_ids_array[] = $row['ID'];

	}

	if($post_ids_array)

	{

		$post_ids = implode(',',$post_ids_array);

		if($post_ids)

		{

			$update_post = "update wp_posts set post_status='draft' where ID in ($post_ids)";

			mysql_query($update_post);

		}

	}

}

?>