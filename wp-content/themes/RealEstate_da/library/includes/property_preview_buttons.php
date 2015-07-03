<?php
if($_REQUEST['alook'])
{
}else
{
?>
<div class="published_box">
<?php
$form_action_url = get_ssl_normal_url(get_option( 'siteurl' ).'/?page=paynow');
?>
<form method="post" action="<?php echo $form_action_url; ?>" name="paynow_frm" id="paynow_frm" >
	<?php
	$property_price_info = get_property_price_info($_REQUEST['property_list_type']);
/*	$payable_amount = $property_price_info['price'];
	$alive_days = $property_price_info['alive_days'];*/
	$type_title = $property_price_info['title'];
	if($_REQUEST['proprty_add_coupon']!='')
	{
		if(is_valid_coupon($_SESSION['property_info']['proprty_add_coupon']))
		{
			$payable_amount = get_payable_amount_with_coupon($payable_amount,$_SESSION['property_info']['proprty_add_coupon']);
		}else
		{
			echo '<p class="error_msg_fix">'.__(WRONG_COUPON_MSG).'</p>';
		}
	}
	if(($_REQUEST['pid']=='' && $payable_amount>0) || ($_POST['renew'] && $payable_amount>0 && $_REQUEST['pid']!=''))
	{
		$message = __(GOING_TO_PAY_MSG).' <b>'.get_currency_sym().$payable_amount.'</b> & '.__('alive days are').'  <b>'.$alive_days.'</b> as '.$type_title.' '.__('Property');
	}else
	{
		$message = __(GOING_TO_UPDATE_MSG).' '.$type_title .' '.__('Property');
		if($alive_days)
		{
			$message .= '& '.__('alive days are').' <b>'.$alive_days.'</b>';
		}
	}
	?>
	<h5 class="free_property"> <?php _e($message);?> </h5>
	<?php
	if(($_REQUEST['pid']=='' && $payable_amount>0) || ($_POST['renew'] && $payable_amount>0 && $_REQUEST['pid']!=''))
	{
		$paymentsql = "select * from $wpdb->options where option_name like 'payment_method_%' order by option_id";
		$paymentinfo = $wpdb->get_results($paymentsql);
		if($paymentinfo)
		{
		?>
  <h5 class="payment_head"> <?php _e(SELECT_PAY_MEHTOD_TEXT); ?></h5>
  <ul class="payment_method">
	<?php
			$paymentOptionArray = array();
			$paymethodKeyarray = array();
			foreach($paymentinfo as $paymentinfoObj)
			{
				$paymentInfo = unserialize($paymentinfoObj->option_value);
				if($paymentInfo['isactive'])
				{
					$paymethodKeyarray[] = $paymentInfo['key'];
					$paymentOptionArray[$paymentInfo['display_order']][] = $paymentInfo;
				}
			}
			ksort($paymentOptionArray);
			if($paymentOptionArray)
			{
				foreach($paymentOptionArray as $key=>$paymentInfoval)
				{
					for($i=0;$i<count($paymentInfoval);$i++)
					{
						$paymentInfo = $paymentInfoval[$i];
						$jsfunction = 'onclick="showoptions(this.value);"';
						$chked = '';
						if($key==1)
						{
							$chked = 'checked="checked"';
						}
					?>
		<li id="<?php echo $paymentInfo['key'];?>">
		  <input <?php echo $jsfunction;?>  type="radio" value="<?php echo $paymentInfo['key'];?>" id="<?php echo $paymentInfo['key'];?>_id" name="paymentmethod" <?php echo $chked;?> />  <?php echo $paymentInfo['name']?>
		 
		  <?php
						if(file_exists(TEMPLATEPATH.'/library/payment/'.$paymentInfo['key'].'/'.$paymentInfo['key'].'.php'))
						{
						?>
		  <?php
							include_once(TEMPLATEPATH.'/library/payment/'.$paymentInfo['key'].'/'.$paymentInfo['key'].'.php');
							?>
		  <?php
						} 
					 ?> </li>
		  <?php
					}
				}
			}else
			{
			?>
			<li><?php _e(NO_PAYMENT_METHOD_MSG);?></li>
			<?php
			}
			
		?>
 	  
  </ul>
  <?php
		}
	}
	?>
	
 <script type="application/x-javascript">
function showoptions(paymethod)
{
<?php
for($i=0;$i<count($paymethodKeyarray);$i++)
{
?>
showoptvar = '<?php echo $paymethodKeyarray[$i]?>options';
if(eval(document.getElementById(showoptvar)))
{
	document.getElementById(showoptvar).style.display = 'none';
	if(paymethod=='<?php echo $paymethodKeyarray[$i]?>')
	{
		document.getElementById(showoptvar).style.display = '';
	}
}

<?php
}	
?>
}
<?php
for($i=0;$i<count($paymethodKeyarray);$i++)
{
?>
if(document.getElementById('<?php echo $paymethodKeyarray[$i];?>_id').checked)
{
showoptions(document.getElementById('<?php echo $paymethodKeyarray[$i];?>_id').value);
}
<?php
}	
?>
 </script>   
    
    
    
    	
	<?php
	if($is_delet_property)
	{
	?>
		<h5 class="payment_head"><?php _e(PRO_DELETE_PRE_MSG);?></h5>
		<input type="button" name="Delete" value="<?php _e(PRO_DELETE_BUTTON);?>" class="btn_input_highlight btn_spacer fr" onclick="window.location.href='<?php echo get_option('siteurl');?>/?page=delete&pid=<?php echo $_REQUEST['pid']?>'" />
		<input type="button" name="Cancel" value="<?php _e(PRO_CANCEL_BUTTON);?>" class="btn_input_normal fl" onclick="window.location.href='<?php echo get_author_link($echo = false, $current_user->data->ID);?>'" />
	<?php
	}else
	{
	?>
    
    <input type="hidden" name="paynow" value="1">
	<input type="hidden" name="pid" value="<?php echo $_POST['pid'];?>">
	<?php
	if($_REQUEST['pid'])
	{
	?> 
		<input type="submit" name="Submit and Pay" value="<?php _e(PRO_UPDATE_BUTTON);?>" class="btn_input_highlight btn_spacer fr" />
	<?php
	}else
	{
	?>
		<input type="submit" name="Submit and Pay" value="<?php _e(PRO_SUBMIT_BUTTON);?>" class="btn_input_highlight btn_spacer fr" />
	<?php
	}
	?>
    
    <a href="<?php echo get_option('siteurl');?>/?page=property_submit&backandedit=1<?php if($_REQUEST['pid']){ echo '&pid='.$_REQUEST['pid'];}?>" class="btn_input_normal fl" ><?php _e(PRO_BACK_AND_EDIT_TEXT);?></a>
    
	<input type="button" name="Cancel" value="<?php _e(PRO_CANCEL_BUTTON);?>" class="btn_input_normal fl" onclick="window.location.href='<?php echo get_author_link($echo = false, $current_user->data->ID);?>'" />
	
	 <?php }?>  
     </form>
     </div>
<?php }?>