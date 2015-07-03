$(document).ready(function(){
//global vars
	var propertyform = $("#propertyform");
	var proprty_name = $("#proprty_name");
	var proprty_price = $("#proprty_price");
	var proprty_bedroom = $("#proprty_bedroom");
	var proprty_sqft = $("#proprty_sqft");
	var proprty_location = $("#proprty_location");
	var proprty_type = $("#proprty_type");
	//var proprty_city = $("#proprty_city");
	var proprty_state = $("#proprty_state");
	var proprty_desc = $("#proprty_desc");

	var proprty_country = $("#proprty_country");
	var proprty_zip = $("#proprty_zip");
	var proprty_pricerange = $("#proprty_pricerange");
//--------------------------------------------------------------
	var proprty_name_span = $("#proprty_name_span");
	var proprty_price_span = $("#proprty_price_span");
	var proprty_bedroom_span = $("#proprty_bedroom_span");
	var proprty_bathroom_span = $("#proprty_bathroom_span");
	var proprty_sqft_span = $("#proprty_sqft_span");
	var proprty_location_span = $("#proprty_location_span");
	var proprty_type_span = $("#proprty_type_span");
	//var proprty_city_span = $("#proprty_city_span");
	//var proprty_state_span = $("#proprty_state_span");
	var proprty_desc_span = $("#proprty_desc_span");

	//var proprty_pricerange_span = $("#proprty_pricerange_span");
	//var proprty_address = $("#proprty_address");
	//var proprty_address_span = $("#proprty_address_span");
//	var proprty_country_span = $("#proprty_country_span");
//	var proprty_zip_span = $("#proprty_zip_span");

//On blur
	proprty_name.blur(validate_proprty_name);
	proprty_price.blur(validate_proprty_price);
	proprty_bedroom.blur(validate_proprty_bedroom);
	proprty_sqft.blur(validate_proprty_sqft);
        proprty_location.blur(validate_proprty_location);
	proprty_type.blur(validate_proprty_type);
	//proprty_city.blur(validate_proprty_city);
	//proprty_state.blur(validate_proprty_state);
	proprty_desc.blur(validate_proprty_desc);

	//proprty_pricerange.blur(validate_proprty_pricerange);
	//proprty_address.blur(validate_proprty_address);
//	proprty_country.blur(validate_proprty_country);
//	proprty_zip.blur(validate_proprty_zip);

//On key press
	proprty_name.keyup(validate_proprty_name);
	proprty_price.keyup(validate_proprty_price);
	proprty_bedroom.keyup(validate_proprty_bedroom);
	proprty_sqft.keyup(validate_proprty_sqft);
	proprty_location.keyup(validate_proprty_location);
	proprty_type.keyup(validate_proprty_type);
	//proprty_city.keyup(validate_proprty_city);
	//proprty_state.keyup(validate_proprty_state);
	proprty_desc.keyup(validate_proprty_desc);

	//proprty_pricerange.keyup(validate_proprty_pricerange);
	//proprty_address.keyup(validate_proprty_address);
//	proprty_country.keyup(validate_proprty_country);
//	proprty_zip.keyup(validate_proprty_zip);
//On Submitting
	propertyform.submit(function(){
            proprty_name.blur();
            proprty_price.blur();
            proprty_bedroom.blur();
            proprty_sqft.blur();
            proprty_location.blur();
            proprty_type.blur();
            //proprty_city.blur();
            //proprty_state.blur();
            proprty_desc.blur();
            if($(".error").length>0){
                return false;
            }else{
                return true;
            }
	});

//validation functions
	function validate_proprty_name()
	{
		if($("#proprty_name").val() == '')
		{
			proprty_name.addClass("error");
			proprty_name_span.text("Please Enter Property Name");
			proprty_name_span.addClass("message_error2");
			return false;
		}
		else{
			proprty_name.removeClass("error");
			proprty_name_span.text("");
			proprty_name_span.removeClass("message_error2");
			return true;
		}
	}

	function validate_proprty_location()
	{
		if($("#proprty_location").val() == '')
		{
			proprty_location.addClass("error");
			proprty_location_span.text("Please Select Location");
			proprty_location_span.addClass("message_error2");
			return false;
		}
		else{
			proprty_location.removeClass("error");
			proprty_location_span.text("");
			proprty_location_span.removeClass("message_error2");
			return true;
		}
	}

	function validate_proprty_address()
	{
		if($("#proprty_address").val() == '')
		{
			proprty_address.addClass("error");
			proprty_address_span.text("Please Enter Address");
			proprty_address_span.addClass("message_error2");
			return false;
		}
		else{
			proprty_address.removeClass("error");
			proprty_address_span.text("");
			proprty_address_span.removeClass("message_error2");
			return true;
		}
	}

	function validate_proprty_city()
	{
		if($("#proprty_city").val() == '')
		{
			proprty_city.addClass("error");
			proprty_city_span.text("Please Enter City");
			proprty_city_span.addClass("message_error2");
			return false;
		}
		else{
			proprty_city.removeClass("error");
			proprty_city_span.text("");
			proprty_city_span.removeClass("message_error2");
			return true;
		}
	}

	function validate_proprty_state()
	{
		if($("#proprty_state").val() == '')
		{
			proprty_state.addClass("error");
			proprty_state_span.text("Please Enter State");
			proprty_state_span.addClass("message_error2");
			return false;
		}
		else{
			proprty_state.removeClass("error");
			proprty_state_span.text("");
			proprty_state_span.removeClass("message_error2");
			return true;
		}
	}

	function validate_proprty_country()
	{
		if($("#proprty_country").val() == '')
		{
			proprty_country.addClass("error");
			proprty_country_span.text("Please Enter Country");
			proprty_country_span.addClass("message_error2");
			return false;
		}
		else{
			proprty_country.removeClass("error");
			proprty_country_span.text("");
			proprty_country_span.removeClass("message_error2");
			return true;
		}
	}

	function validate_proprty_zip()
	{
		if($("#proprty_zip").val() == '')
		{
			proprty_zip.addClass("error");
			proprty_zip_span.text("Please Enter Zipcode");
			proprty_zip_span.addClass("message_error2");
			return false;
		}
		else{
			proprty_zip.removeClass("error");
			proprty_zip_span.text("");
			proprty_zip_span.removeClass("message_error2");
			return true;
		}
	}

	function validate_proprty_bedroom()
	{
		if($("#proprty_bedroom").val() == '')
		{
			proprty_bedroom.addClass("error");
			proprty_bedroom_span.text("Please Select Bedroom");
			proprty_bedroom_span.addClass("message_error2");
			return false;
		}
		else{
			proprty_bedroom.removeClass("error");
			proprty_bedroom_span.text("");
			proprty_bedroom_span.removeClass("message_error2");
			return true;
		}
	}

	function validate_proprty_sqft()
	{
		if($("#proprty_sqft").val() == '')
		{
			proprty_sqft.addClass("error");
			proprty_sqft_span.text("Please Enter Sq. Ft");
			proprty_sqft_span.addClass("message_error2");
			return false;
		}
		else{
			proprty_sqft.removeClass("error");
			proprty_sqft_span.text("");
			proprty_sqft_span.removeClass("message_error2");
			return true;
		}
	}

	function validate_proprty_pricerange()
	{
		if($("#proprty_pricerange").val() == '')
		{
			proprty_pricerange.addClass("error");
			proprty_pricerange_span.text("Please Select Price Range");
			proprty_pricerange_span.addClass("message_error2");
			return false;
		}
		else{
			proprty_pricerange.removeClass("error");
			proprty_pricerange_span.text("");
			proprty_pricerange_span.removeClass("message_error2");
			return true;
		}
	}

	function validate_proprty_price()
	{
		if($("#proprty_price").val() == '')
		{
			proprty_price.addClass("error");
			proprty_price_span.text("Please Enter Price");
			proprty_price_span.addClass("message_error2");
			return false;
		}
		else{
			proprty_price.removeClass("error");
			proprty_price_span.text("");
			proprty_price_span.removeClass("message_error2");
			return true;
		}
	}

	function validate_proprty_type()
	{
		if($("#proprty_type").val() == '')
		{
			proprty_type.addClass("error");
			proprty_type_span.text("Please Select Type");
			proprty_type_span.addClass("message_error2");
			return false;
		}
		else{
			proprty_type.removeClass("error");
			proprty_type_span.text("");
			proprty_type_span.removeClass("message_error2");
			return true;
		}
	}

	function validate_proprty_desc()
	{
		if($("#proprty_desc").val() == '')
		{
			proprty_desc.addClass("error");
			proprty_desc_span.text("Please Enter Description");
			proprty_desc_span.addClass("message_error2");
			return false;
		}
		else{
			proprty_desc.removeClass("error");
			proprty_desc_span.text("");
			proprty_desc_span.removeClass("message_error2");
			return true;
		}
	}



});