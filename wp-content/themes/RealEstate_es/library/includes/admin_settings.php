<?php
global $wpdb;
function decision($label,$name,$valor){
    /*<label><input type="checkbox" value="1" name="add_location_related" <?php if($add_location_related==1){echo 'checked';}else{} ?>/> <?php _e('Location');?></label><br/>*/
    echo '<label>'._e($label).'</label>';
    echo '<select name="'.$name.'"><option value="No">No</option><option '.($valor=="1"?"selected":'').' value="Sí">No</option></select><br/>';
}
if($_POST)
{
	$cartsql = "select * from $wpdb->options where option_name like 'mysite_general_settings'";
	$cartinfo = $wpdb->get_results($cartsql);
	if($cartinfo)
	{
		foreach($cartinfo as $cartinfoObj)
		{
			$option_id = $cartinfoObj->option_id;
			$option_value = unserialize($cartinfoObj->option_value);
			$currency = $option_value['currency'];
			$currencysym = $option_value['currencysym'];
			$site_email = $option_value['site_email'];
			$site_email_name = $option_value['site_email_name'];
			$site_telcon_name = $option_value['site_telcon_name'];
			$site_telcon2_name = $option_value['site_telcon2_name'];
			$area_unit = $option_value['area_unit'];
			$is_user_addproperty = $option_value['is_user_addproperty'];
			$list_type_title1 = $option_value['list_type_title1'];
			$list_type_price1 = $option_value['list_type_price1'];
			$list_type_days1 = $option_value['list_type_days1'];
			$list_type_days_type1 = $option_value['list_type_days_type1'];
			$list_type_feature1 = $option_value['list_type_feature1'];
			$list_type_title2 = $option_value['list_type_title2'];
			$list_type_price2 = $option_value['list_type_price2'];
			$list_type_days2 = $option_value['list_type_days2'];
			$list_type_days_type2 = $option_value['list_type_days_type2'];
			$list_type_feature2 = $option_value['list_type_feature2'];
			$approve_status = $option_value['approve_status'];
			$related_property = $option_value['related_property'];
                        $add_location_related=$option_value['add_location_related'];
                        $price_related=$option_value['price_related'];
                        $area_related=$option_value['area_related'];
                        $bed_rooms_related=$option_value['bed_rooms_related'];
                        $property_type_related=$option_value['property_type_related'];
			$area_srch_setting = $option_value['area_srch_setting'];
			$price_srch_setting = $option_value['price_srch_setting'];
			$is_allow_user_add = $option_value['is_allow_user_add'];
			$max_bathrooms = $option_value['max_bathrooms'];
			$max_bedrooms = $option_value['max_bedrooms'];
			$location_srch_setting = $option_value['location_srch_setting'];
			$is_allow_ssl = $option_value['is_allow_ssl'];
		}
	}
	$option_value['currency'] = $_POST['currency'];
	$option_value['currencysym'] = $_POST['currencysym'];
	$option_value['site_email'] = $_POST['site_email'];
	$option_value['site_email_name'] = $_POST['site_email_name'];
	$option_value['site_telcon_name'] = $_POST['site_telcon_name'];
	$option_value['site_telcon2_name'] = $_POST['site_telcon2_name'];
	$option_value['area_unit'] = $_POST['area_unit'];
	$option_value['is_user_addproperty'] = $_POST['is_user_addproperty'];

	$option_value['list_type_title1'] = $_POST['list_type_title1'];
	$option_value['list_type_price1'] = $_POST['list_type_price1'];
	$option_value['list_type_days1'] = $_POST['list_type_days1'];
	$option_value['list_type_days_type1'] = $_POST['list_type_days_type1'];
	$option_value['list_type_feature1'] = $_POST['list_type_feature1'];
	$option_value['list_type_title2'] = $_POST['list_type_title2'];
	$option_value['list_type_price2'] = $_POST['list_type_price2'];
	$option_value['list_type_days2'] = $_POST['list_type_days2'];
	$option_value['list_type_days_type2'] = $_POST['list_type_days_type2'];
	$option_value['list_type_feature2'] = $_POST['list_type_feature2'];
	$option_value['approve_status'] = $_POST['approve_status'];
	$option_value['related_property'] = $_POST['related_property'];
        $option_value['add_location_related']=$_POST['add_location_related'];
        $option_value['price_related']=$_POST['price_related'];
        $option_value['area_related']=$_POST['area_related'];
        $option_value['bed_rooms_related']=$_POST['bed_rooms_related'];
        $option_value['property_type_related']=$_POST['property_type_related'];
	$option_value['area_srch_setting'] = $_POST['area_srch_setting'];
	$option_value['price_srch_setting'] = $_POST['price_srch_setting'];
	$option_value['is_allow_user_add'] = $_POST['is_allow_user_add'];
	$option_value['max_bathrooms'] = $_POST['max_bathrooms'];
	$option_value['max_bedrooms'] = $_POST['max_bedrooms'];
	$option_value['location_srch_setting'] = $_POST['location_srch_setting'];
	$option_value['is_allow_ssl'] = $_POST['is_allow_ssl'];

	update_option('mysite_general_settings',$option_value);
	$message = "Updated Succesfully.";
}
$cartsql = "select * from $wpdb->options where option_name like 'mysite_general_settings'";
$cartinfo = $wpdb->get_results($cartsql);
if(count($cartinfo)==0)
{
	$paymethodinfo = array(
						"currency"		=> 'USD',
						"currencysym"	=> '$',
						"site_email"	=> get_option('admin_email'),
						"site_email_name"=>	get_option('blogname'),
						"site_telcon_name"=>	get_option('telcon'),
						"site_telcon2_name"=>	get_option('telcon2'),
						"is_user_addproperty"		=>	"1",
						"area_unit"		=>	"Sq. Ft.",
						"list_type_title1"	=>	"Free",
						"list_type_price1"	=>	"0.00",
						"list_type_days1"	=>	"30",
						"list_type_feature1"	=>	"0",
						"list_type_days_type1"	=>	"days",
						"list_type_title2"	=>	"Featured",
						"list_type_price2"	=>	"30.00",
						"list_type_days2"	=>	"90",
						"list_type_days_type2"	=>	"days",
						"list_type_feature2"	=>	"1",
						"approve_status"	=>	"publish",
						"related_property"	=>	"Location",
						"related_property"	=>	"Location",
						"area_srch_setting"	=>	"100-1000,1000-2000,2000-3000,3000+",
						"price_srch_setting"=>	"100-1000,1000-5000,5000-10000,10000+",
						"is_allow_user_add"	=>	"1",
						"max_bathrooms"		=>	"10",
						"max_bedrooms"		=>	"10",
						"location_srch_setting"	=>	"AK,AR,CA,FL,HW,MN,SC,TX,MN,NJ,NY,MA,NY,OTHER",
						"is_allow_ssl"		=>	"0",

						);
	$paymethodArray = array(
							"option_name"	=>	'mysite_general_settings',
							"option_value"	=>	serialize($paymethodinfo),
							);
	$wpdb->insert( $wpdb->options, $paymethodArray );
}

$cartsql = "select * from $wpdb->options where option_name like 'mysite_general_settings'";
$cartinfo = $wpdb->get_results($cartsql);
if($cartinfo)
{

	$option_value = get_option('mysite_general_settings');
	$currency = stripslashes($option_value['currency']);
	$currencysym = stripslashes($option_value['currencysym']);
	$site_email = stripslashes($option_value['site_email']);
	$site_email_name = stripslashes($option_value['site_email_name']);
	$site_telcon_name = stripslashes($option_value['site_telcon_name']);
	$site_telcon2_name = stripslashes($option_value['site_telcon2_name']);
	$area_unit = stripslashes($option_value['area_unit']);
	$is_user_addproperty = stripslashes($option_value['is_user_addproperty']);

	$list_type_title1 = stripslashes($option_value['list_type_title1']);
	$list_type_price1 = stripslashes($option_value['list_type_price1']);
	$list_type_days1 = stripslashes($option_value['list_type_days1']);
	$list_type_days_type1 = stripslashes($option_value['list_type_days_type1']);
	$list_type_feature1 = stripslashes($option_value['list_type_feature1']);
	$list_type_title2 = stripslashes($option_value['list_type_title2']);
	$list_type_price2 = stripslashes($option_value['list_type_price2']);
	$list_type_days2 = stripslashes($option_value['list_type_days2']);
	$list_type_days_type2 = stripslashes($option_value['list_type_days_type2']);
	$list_type_feature2 = stripslashes($option_value['list_type_feature2']);
	$approve_status = stripslashes($option_value['approve_status']);
	$related_property = stripslashes($option_value['related_property']);
	$area_srch_setting = stripslashes($option_value['area_srch_setting']);
	$price_srch_setting = stripslashes($option_value['price_srch_setting']);
	$is_allow_user_add = stripslashes($option_value['is_allow_user_add']);
	$max_bathrooms = stripslashes($option_value['max_bathrooms']);
	$max_bedrooms = stripslashes($option_value['max_bedrooms']);
	$location_srch_setting = stripslashes($option_value['location_srch_setting']);
	$is_allow_ssl = stripslashes($option_value['is_allow_ssl']);
}
?>

<form action="<?php echo get_option( 'siteurl' );?>/wp-admin/admin.php?page=product_menu.php" method="post">
  <style>
h2 { color:#464646;font-family:Georgia,"Times New Roman","Bitstream Charter",Times,serif;
font-size:24px;
font-size-adjust:none;
font-stretch:normal;
font-style:italic;
font-variant:normal;
font-weight:normal;
line-height:35px;
margin:0;
padding:14px 15px 3px 0;
text-shadow:0 1px 0 #FFFFFF;  }
</style>
  <h2><?php _e('General Settings');?></h2>
  <?php if($message){?>
  <div class="updated fade below-h2" id="message" style="background-color: rgb(255, 251, 204);" >
    <p><?php _e($message);?> </p>
  </div>
  <?php }?>
  <table width="80%" cellpadding="5" class="widefat post fixed" >
    <thead>
      <tr>
        <td width="29%"><?php _e('Sender (Name that will be shown as email sender when users receive emails from this site)');?></td>
        <td width="71%"><input type="text" name="site_email_name" value="<?php echo $site_email_name;?>" /></td>
      </tr>
      <tr>
        <td width="29%"><?php _e('Telephone to contact');?></td>
        <td width="71%"><input type="text" name="site_telcon_name" value="<?php echo $site_telcon_name;?>" /></td>
      </tr>
      <tr>
        <td width="29%"><?php _e('Second Telephone to contact');?></td>
        <td width="71%"><input type="text" name="site_telcon2_name" value="<?php echo $site_telcon2_name;?>" /></td>
      </tr>
      <tr>
        <td><?php _e('Email Address (emails to users will be sent via this mail ID)');?></td>
        <td><input type="text" name="site_email" value="<?php echo $site_email;?>" /></td>
      </tr>
      <tr>
        <td><?php _e('Default Currency (Ex.: USD)');?></td>
        <td><input type="text" name="currency" value="<?php echo $currency;?>" /></td>
      </tr>
      <tr>
        <td><?php _e('Default Currency Symbol (Ex.: $)');?></td>
        <td><input type="text" name="currencysym" value="<?php echo $currencysym;?>" /></td>
      </tr>
	   <tr>
        <td><?php _e('Allow users to submit property on your site?');?></td>
        <td><input type="radio" name="is_user_addproperty" <?php if($is_user_addproperty=='1'){ echo 'checked="checked"';}?>  value="1" /> <?php _e('Yes');?>  <input type="radio" name="is_user_addproperty" <?php if($is_user_addproperty=='0'){ echo 'checked="checked"';}?> value="0" /> <?php _e('No');?></td>
      </tr>
	   <tr>
        <td><?php _e('Allow new users registration?');?></td>
        <td><input type="radio" name="is_allow_user_add" <?php if($is_allow_user_add=='1'){ echo 'checked="checked"';}?>  value="1" /> <?php _e('Yes');?>  <input type="radio" name="is_allow_user_add" <?php if($is_allow_user_add=='0'){ echo 'checked="checked"';}?> value="0" /> <?php _e('No');?></td>
      </tr>
	   <tr>
        <td><?php _e('Allow SSL URL while Property Submit');?></td>
        <td><input type="radio" name="is_allow_ssl" <?php if($is_allow_ssl=='1'){ echo 'checked="checked"';}?>  value="1" /> <?php _e('Yes');?>  <input type="radio" name="is_allow_ssl" <?php if($is_allow_ssl=='0'){ echo 'checked="checked"';}?> value="0" /> <?php _e('No');?></td>
      </tr>
      <tr><td colspan="2"><h2><?php _e('Listing price, duration and other settings</h2></td><p>On <b>"submit property"</b> page on your site, uses can choose one of the following two options and pay accordingly. You may customize the titles, number of days the listing will be shown on your site before it auto expires and, price for the listing. Set it here.');?></p></tr>
	   <tr>
        <td><?php _e('Property  List Types');?> <br />
		<small><?php _e('Title = Free/regular/Featured,');?> <br />
		<?php _e('Example : Title "<strong>Featured</strong>" in price('.get_currency_sym().') "<strong>25</strong>" for "<strong>60</strong>" number of <strong>days</strong>');?>
		</small>
		</td>
        <td><?php _e('Title1');?> <input type="text" name="list_type_title1" value="<?php echo $list_type_title1;?>"/> <?php _e('in
		Price');?>(<?php echo get_currency_sym();?>)  <input type="text" name="list_type_price1" value="<?php echo $list_type_price1;?>" size="5" />
		<?php _e('for');?>  <input type="text" name="list_type_days1" value="<?php echo $list_type_days1;?>" size="5" />  <?php _e('number of');?>
		<select name="list_type_days_type1"><option <?php if($list_type_days_type1=='days'){ echo 'selected="selected"';}?>>days</option>
		<option <?php if($list_type_days_type1=='months'){ echo 'selected="selected"';}?>>months</option></select>
		<br />Selected as Feature property? <input type="radio" name="list_type_feature1" value="1" <?php if($list_type_feature1 == 1){ echo 'checked="checked"';}?>  /> <?php _e('Yes');?> <input type="radio" name="list_type_feature1" value="0"  <?php if($list_type_feature1 == '0'){ echo 'checked="checked"';}?>/> <?php _e('No');?>
		<br /><br />

		<?php _e('Title2');?> <input type="text" name="list_type_title2" value="<?php echo $list_type_title2;?>"/> <?php _e('in
		Price');?>(<?php echo get_currency_sym();?>)  <input type="text" name="list_type_price2" value="<?php echo $list_type_price2;?>" size="5" />
		<?php _e('for');?>  <input type="text" name="list_type_days2" value="<?php echo $list_type_days2;?>" size="5" />  <?php _e('number of');?>
		<select name="list_type_days_type2"><option <?php if($list_type_days_type2=='days'){ echo 'selected="selected"';}?>>days</option>
		<option <?php if($list_type_days_type2=='months'){ echo 'selected="selected"';}?>>months</option></select>
		<br />Selected as Feature property? <input type="radio" name="list_type_feature2" value="1" <?php if($list_type_feature2 == 1){ echo 'checked="checked"';}?> /> <?php _e('Yes');?> <input type="radio" name="list_type_feature2" value="0" <?php if($list_type_feature2 == '0'){ echo 'checked="checked"';}?> /> <?php _e('No');?>
		</td>
      </tr>
	  <tr>
        <td><?php _e('Show Area Unit (Ex.: Sq. Ft.)');?></td>
        <td><input type="text" name="area_unit" value="<?php echo $area_unit;?>" /></td>
      </tr>
	  <tr>
        <td><?php _e('Maximum Number of Bedrooms (when a user posts a property or search proerty the "Bedrooms" dropdown box will be generated with this maximum number)');?></td>
        <td><input type="text" name="max_bedrooms" value="<?php echo $max_bedrooms;?>" /></td>
      </tr>
	   <tr>
        <td><?php _e('Maximum Number of Bathrooms (when a user posts a property or search proerty the "Bathrooms" dropdown box will be generated with this maximum number)');?></td>
        <td><input type="text" name="max_bathrooms" value="<?php echo $max_bathrooms;?>" /></td>
      </tr>
	   <tr>
        <td><?php _e('Property Default  Status (when a user posts a property, should it be auto published on your site?)');?></td>
        <td><select name="approve_status">
            <option value="publish" <?php if($approve_status=='publish'){?> selected="selected"<?php }?>><?php _e('Publish');?></option>
            <option value="draft" <?php if($approve_status=='draft'){?> selected="selected"<?php }?>><?php _e('Draft');?></option>
          </select>
        </td>
      </tr>
       <tr>
        <td><?php _e('<b>Show Similar Property based on</b>(in property details page, other similar properties are also shown. You can choose similar property criteria here - based on which, the similar properties will be shown)');?></td>
        <td>
            <div style="display:none"><?=$add_location_related?></div>
            <?php /*decision('Location', 'add_location_related', $add_location_related) ?>
            <?php decision('Price Range', 'price_related', $price_related) ?>
            <?php decision('Area', 'area_related', $area_related) ?>
            <?php decision('Beds', 'bed_rooms_related', $bed_rooms_related)?>
            <?php decision('Property Type', 'property_type_related', $property_type_related)*/ ?>
            <label><input type="checkbox" value="1" name="add_location_related" <?php if($add_location_related=="1"){echo 'checked';}else{} ?>/> <?php _e('Location');?></label><br/>
            <label><input type="checkbox" value="1" name="price_related" <?php if($price_related=="1"){echo 'checked';}else{} ?>/> <?php _e('Price Range');?></label><br/>
            <label><input type="checkbox" value="1" name="area_related" <?php if($area_related=="1"){echo 'checked';}else{} ?>/> <?php _e('Area');?></label><br/>
            <label><input type="checkbox" value="1" name="bed_rooms_related" <?php if($bed_rooms_related=="1"){echo 'checked';}else{} ?>/> <?php _e('Beds');?></label><br/>
            <label><input type="checkbox" value="1" name="property_type_related" <?php if($property_type_related=="1"){echo 'checked';}else{} ?>/> <?php _e('Property Type');?></label>
        </td>
      </tr>
	   <tr><td colspan="2"><?php _e('<h2>Property Search Settings</h2><p>In the main search form, we show &quot;Area&quot; and &quot;Price Range&quot;. You may customize the range values from here. Note: Enter values separated by comma (,) and leave no blank space in-between </p>');?></td></tr>
	   <tr>
        <td><?php _e('Area range setting  (in '.get_area_unit().')<br /><small>Ex. Area range "100-1000,1000-2000,2000-3000,3000+"</small>');?>
		</td>
		<td>
		<textarea id="area_srch_setting" name="area_srch_setting"><?php echo $area_srch_setting;?></textarea>
		</td>
		</tr>
		 <tr>
        <td><?php _e('Price range setting  (in '. get_currency_sym().') <br /><small>Ex. Price range "100-1000,1000-2000,2000-5000,5000+"</small>');?>
		</td>
		<td>
		<textarea id="price_srch_setting" name="price_srch_setting"><?php echo $price_srch_setting;?></textarea>
		</td>
		</tr>
		 <tr>
			<td><?php _e('Locations <br /><small>Ex. Locations "AK,AR,CA,FL,HW,MN,SC,TX,MN,NJ,NY,MA,NY,OTHER"</small>');?>
			</td>
			<td>
			<textarea id="location_srch_setting" name="location_srch_setting"><?php echo $location_srch_setting;?></textarea>
			</td>
	   </tr>
	  <tr>

        <td></td>
        <td><h2><input type="submit" name="submit" value="<?php _e('Submit');?>" class="button-secondary action" /></h2></td>
      </tr>
    </thead>
  </table>
</form>
