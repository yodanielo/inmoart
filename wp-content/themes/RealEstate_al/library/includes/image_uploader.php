<?php
	session_start();
if($_REQUEST['backandedit'])
{
}else
{
	$_SESSION["file_info"] = array();
}	
?>
<link href="<?php echo bloginfo('template_url'); ?>/library/js/swfupload/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">var img_delete = "<?php echo bloginfo('template_url'); echo "/images/x.png"; ?>";</script>
<script type="text/javascript" src="<?php echo bloginfo('template_url'); ?>/library/js/swfupload/swfupload.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_url'); ?>/library/js/swfupload/handlers.js"></script>
<script type="text/javascript" language="javascript">
		//var thumbnail_filepath = "<?php echo bloginfo('template_url'); ?>/library/includes/";
		var thumbnail_filepath = "<?php echo get_option('siteurl');?>/<?php global $upload_folder_path; echo $upload_folder_path;?>tmp/";
		var images_filepath = "<?php echo bloginfo('template_url'); ?>/library/js/swfupload/images/";
		var swfu;
		window.onload = function () {
			swfu = new SWFUpload({
				// Backend Settings
				<?php
				global $blog_id;
				if(get_option('upload_path') && !strstr(get_option('upload_path'),'wp-content/uploads')){$upld_sub = "?bid=$blog_id";}
				?>
				upload_url: "<?php echo bloginfo('template_url'); ?>/library/includes/upload.php<?php  echo $upld_sub;?>",
				post_params: {"PHPSESSID": "<?php echo session_id(); ?>"},

				// File Upload Settings
				file_size_limit : "2 MB",	// 2MB
				file_types : "*.jpg",
				file_types_description : "JPG Images",
				file_upload_limit : "0",

				// Event Handler Settings - these functions as defined in Handlers.js
				//  The handlers are not part of SWFUpload but are part of my website and control how
				//  my website reacts to the SWFUpload events.
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccess,
				upload_complete_handler : uploadComplete,

				// Button Settings
				button_image_url : "<?php echo bloginfo('template_url'); ?>/library/js/swfupload/SmallSpyGlassWithTransperancy_17x18.png",
				button_placeholder_id : "spanButtonPlaceholder",
				button_width: 200,
				button_height: 18,
				button_text : '<?php _e('Select Images');?> <s class="buttonSmall">(<?php _e('2 MB Max');?>)</s>',
				button_text_style : '',
				button_text_top_padding: 0,
				button_text_left_padding: 18,
				button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
				button_cursor: SWFUpload.CURSOR.HAND,
				
				// Flash Settings
				flash_url : "<?php echo bloginfo('template_url'); ?>/library/js/swfupload/swfupload.swf",

				custom_settings : {
					upload_target : "divFileProgressContainer"
				},
				
				// Debug Settings
				debug: false
			});
		};
	</script>
</head>
<body>
	<?php
	if( !function_exists("imagecopyresampled") ){
		?>
	<div class="message">
		<h4><strong>Error:</strong> </h4>
		<p>Application Demo requires GD Library to be installed on your system.</p>
		<p>Usually you only have to uncomment <code>;extension=php_gd2.dll</code> by removing the semicolon <code>extension=php_gd2.dll</code> and making sure your extension_dir is pointing in the right place. <code>extension_dir = "c:\php\extensions"</code> in your php.ini file. For further reading please consult the <a href="http://ca3.php.net/manual/en/image.setup.php">PHP manual</a></p>
	</div>
	<?php
	} else {
	?>
<?php /*?>	<form><?php */?>
		<div style=" display:block; float:left; border: solid 1px #7FAAFF; background: none; cursor:pointer; font:bold 12px Arial, Helvetica, sans-serif;  padding:4px;">
			<div id="spanButtonPlaceholder"></div>
		</div>
<?php /*?>	</form><?php */?>
	<?php
	}
	?>
	
	<div id="divFileProgressContainer" style="height: auto"></div>
	<div id="thumbnails">
     <div id="GalleryContainer">
	 
	<?php 
	if($_SESSION["file_info"])
	{
		foreach($_SESSION["file_info"] as $image_id=>$val)
		{
			?>
				<img src="<?php echo get_option('siteurl').'/'.$upload_folder_path.'tmp/'.$image_id.'.jpg'; ?>" height="80" width="80">
			<?php
		}
	}
	if($thumb_img_arr)
	{
		for($i=0;$i<count($thumb_img_arr);$i++)
		{		
		?>
        <div class="imageBox" id="div_<?php echo $thumb_img_arr[$i]['id'];?>">
            <div class="imageBox_theImage" id="photo_<?php echo $thumb_img_arr[$i]['id'];?>" style="background-image:url('<?php echo $thumb_img_arr[$i]['file'];?>')"></div>
            <div class="imageBox_label"><span><a href="javascript:void(0);" id="a_photo_<?php echo $thumb_img_arr[$i]['id'];?>" onClick="javascript:removePhoto(<?php echo $thumb_img_arr[$i]['id'];?>,'');"><img src="<?php echo bloginfo('template_url'); ?>/images/x.png" class="img_delete" alt="" ></a></span></div>
		</div>
		<?php
		}
	}
	?>
    </div></div>
	<span class="message_note"><?php _e(IMAGE_ORDERING_MSG);?></span>
<?php
if($_REQUEST['pid'])
{
?>	
<div id="insertionMarker">
	<img src="<?php echo bloginfo('template_url'); ?>/library/js/marker_top.gif">
	<img src="<?php echo bloginfo('template_url'); ?>/library/js/marker_middle.gif" id="insertionMarkerLine">
	<img src="<?php echo bloginfo('template_url'); ?>/library/js/marker_bottom.gif">
</div>
<div id="dragDropContent"></div>
<div id="debug" style="clear:both"></div>
<?php if(count($thumb_img_arr)>1){?>
<div style="clear:both;padding-bottom:10px">
<input type="hidden" name="image_sort" id="image_sort"  />
	<input type="button" class="btn_input_highlight" style="width:100px" value="<?php _e('Save Order');?>" onClick="saveImageOrder();goToIndexforsave();">
<span id="sorted_successmsg_div"></span>
</div>
<?php }?>
<script type="text/javascript" src="<?php echo bloginfo('template_url'); ?>/library/js/floating_gallery.js"></script>
<script language="javascript" type="text/javascript">
function goToIndexforsave()
{
	document.getElementById('sorted_successmsg_div').innerHTML = '<?php _e('processing ...');?>';
	var img_save_url = '<?php echo get_option('siteurl'); ?>/index.php?page=sort_image&pid='+document.getElementById('image_sort').value;
	$.ajax({	
		url: img_save_url ,
		type: 'GET',
		dataType: 'html',
		timeout: 20000,
		error: function(){
			alert('<?php _e('Error loading agent favorite property.');?>');
		},
		success: function(html){
			document.getElementById('sorted_successmsg_div').innerHTML=html;								
		}
	});
	return false;
}
</script>
<?php }?>
<script type="text/javascript">
function removePhoto(image_id,tmp_image_id)
{
 	//alert(property_id);	
	var fav_url; 
	if(tmp_image_id != '' )
	{
			fav_url = '<?php echo get_option('siteurl'); ?>/index.php?page=att_delete&remove=temp&pid='+tmp_image_id;
	}else
	{
			fav_url = '<?php echo get_option('siteurl'); ?>/index.php?page=att_delete&pid='+image_id;			
	}
	$.ajax({	
		url: fav_url ,
		type: 'GET',
		dataType: 'html',
		timeout: 20000,
		error: function(){
			alert('<?php _e('Error loading deletion of property image.');?>');
		},
		success: function(html){	
			if(image_id =='')
			{
				image_id =tmp_image_id ;
			}	
			document.getElementById('div_'+image_id).style.display="none";								
			//document.getElementById('a_photo_'+image_id).style.display="none";
		}
	});
	return false;
}
</script>