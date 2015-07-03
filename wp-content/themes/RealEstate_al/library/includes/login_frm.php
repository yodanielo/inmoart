<?php /*?><p class="note"><span class="indicates">*</span> <?php _e(INDICATES_MANDATORY_FIELDS_TEXT);?></p><?php */?>

<h4><?php
			 if($_REQUEST['page']=='login' && $_REQUEST['page1']=='sign_up')
			{
				_e(REGISTRATION_NOW_TEXT);
			}else
			{
				_e(SIGN_IN_PAGE_TITLE);
			}
			 ?></h4>

<?php
if ( $_REQUEST['emsg']=='fw')
{
	echo "<p class=\"error_msg_fix\"> ".INVALID_USER_FPW_MSG." </p>";
}else
if ( $_REQUEST['emsg']==1)
{
	echo "<p class=\"error_msg_fix\"> ".INVALID_USER_PW_MSG." </p>";
}
if($_REQUEST['checkemail']=='confirm')
{
	echo '<p class="sucess_msg">'.PW_SEND_CONFIRM_MSG.'</p>';
}

?>
<div class="login_content">
<?php echo stripslashes(get_option('ptthemes_logoin_page_content'));?>
</div>

<div class="login_form_box">

<form name="loginform" id="loginform" action="<?php echo get_settings('home').'/index.php?page=login'; ?>" method="post" >
  <div class="form_row clearfix">
	<label><?php _e(USERNAME_TEXT) ?> <span>*</span> </label>
	<input type="text" name="log" id="user_login" value="<?php echo esc_attr($user_login); ?>" size="20" class="textfield" />
	<span id="user_loginInfo"></span>
 </div>
  <div class="form_row clearfix">
	<label>
	<?php _e(PASSWORD_TEXT) ?> <span>*</span>
	</label>
	<input type="password" name="pwd" id="user_pass" class="textfield" value="" size="20"  />
	<span id="user_passInfo"></span>
  </div>
  <?php do_action('login_form'); ?>
  <p class="rember">
	<input name="rememberme" type="checkbox" id="rememberme" value="forever" class="fl" />
	<?php esc_attr_e(REMEMBER_ON_COMPUTER_TEXT); ?>
  </p>
 <!-- <a  href="javascript:void(0);" onclick="chk_form_login();" class="highlight_button fl login" >Sign In</a>-->
  <input class="btn_input_highlight btn_spacer" type="submit" value="<?php _e(SIGN_IN_BUTTON);?>"  name="submit" />
  <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
  <input type="hidden" name="testcookie" value="1" />

 <span class="dlinkslogin"><a href="<?php echo get_option('siteurl'); ?>/?page=login&page1=sign_up"><?php _e(NEW_USER_TEXT);?></a>   | <a href="javascript:void(0);showhide_forgetpw();"><?php _e(FORGOT_PW_TEXT);?></a></span>
</form>

 <div id="lostpassword_form" style="display:none;">
<h4><?php _e(FORGOT_PW_TEXT);?></h4>
<form name="lostpasswordform" id="lostpasswordform" action="<?php echo get_option( 'siteurl' ).'/?page=login&action=lostpassword'; ?>" method="post">
   <div class="form_row clearfix"> <label>
  <?php _e(USERNAME_EMAIL_TEXT) ?>: </label>
  <input type="text" name="user_login" id="user_login1" value="<?php echo esc_attr($user_login); ?>" size="20" class="textfield" />
  <?php do_action('lostpassword_form'); ?>
  </div>

  <input type="submit" name="get_new_password" value="<?php _e(GET_NEW_PW_TEXT);?>" class="btn_input_highlight " />
</form>
</div>
</div>
<script  type="text/javascript" >
function showhide_forgetpw()
{
	if(document.getElementById('lostpassword_form').style.display=='none')
	{
		document.getElementById('lostpassword_form').style.display = ''
	}else
	{
		document.getElementById('lostpassword_form').style.display = 'none';
	}
}
</script>