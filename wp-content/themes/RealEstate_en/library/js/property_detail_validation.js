$(document).ready(function(){

//global vars

	var enquiryfrm = $("#property_mail_agent");

	var yourname = $("#property_mail_name");

	var yournameInfo = $("#span_property_mail_name");

	var youremail = $("#property_mail_email");

	var youremailInfo = $("#span_property_mail_email");

	var frnd_comments = $("#property_frnd_comments");

	var frnd_commentsInfo = $("#span_property_frnd_comments");

	

	//On blur

	yourname.blur(validate_yourname);

	youremail.blur(validate_youremail);

	frnd_comments.blur(validate_frnd_comments);

	

	//On key press

	yourname.keyup(validate_yourname);

	youremail.keyup(validate_youremail);

	frnd_comments.keyup(validate_frnd_comments);

	

	//On Submitting

	enquiryfrm.submit(function(){

		if(validate_yourname() & validate_youremail() & validate_frnd_comments())

		{

			//hideform();
			setTimeout("document.getElementById('property_mail_name').value = '';document.getElementById('property_mail_email').value = '';document.getElementById('inq_phone').value = '';document.getElementById('property_frnd_comments').value = '';document.getElementById('inquiry_send_success_property').innerHTML = 'Inquiry Send Successfully!'; ",900);
			document.getElementById('inquiry_send_success_property').style.display = ''; 
			document.getElementById('inquiry_send_success_property').innerHTML = 'Processing ...'; 
			return true

		}

		else

		{

			return false;

		}

	});



	//validation functions

	function validate_yourname()

	{		
		
		if($("#property_mail_name").val() == '')

		{

			yourname.addClass("error");

			yournameInfo.text("Please Enter Your Name");

			yournameInfo.addClass("message_error2");

			return false;

		}

		else{

			yourname.removeClass("error");

			yournameInfo.text("");

			yournameInfo.removeClass("message_error2");

			return true;

		}

	}

	function validate_youremail()

	{

		var isvalidemailflag = 0;

		if($("#property_mail_email").val() == '')

		{

			isvalidemailflag = 1;

		}else

		if($("#property_mail_email").val() != '')

		{

			var a = $("#property_mail_email").val();

			var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;

			//if it's valid email

			if(filter.test(a)){

				isvalidemailflag = 0;

			}else{

				isvalidemailflag = 1;	

			}

		}

		if(isvalidemailflag)

		{

			youremail.addClass("error");

			youremailInfo.text("Please Enter valid Email Address");

			youremailInfo.addClass("message_error2");

			return false;

		}else

		{

			youremail.removeClass("error");

			youremailInfo.text("");

			youremailInfo.removeClass("message_error");

			return true;

		}

		

	}

	

	function validate_frnd_comments()

	{

		if($("#property_frnd_comments").val() == '')

		{

			frnd_comments.addClass("error");

			frnd_commentsInfo.text("Please Enter Comments");

			frnd_commentsInfo.addClass("message_error2");

			return false;

		}

		else{

			frnd_comments.removeClass("error");

			frnd_commentsInfo.text("");

			frnd_commentsInfo.removeClass("message_error2");

			return true;

		}

	}
//These function would reset the form after submition	
//this function would set the success message

});