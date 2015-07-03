<?php
$isshow_search = 0;
if(is_home() && $_REQUEST['search']!='') {
    $isshow_search = 1;
}
if(is_home() && $_REQUEST['page']!='') {
    $isshow_search = 1;
}
elseif(!is_home()) {
    $isshow_search = 1;
}
?>
<div id="propertysearchoptions"  style="height:218px!important;" >
    <div class="search ">
        <form method="get" id="srch_frm" name="srch_frm" action="<?php echo get_option('siteurl');?>">
            <input type="hidden" id="s" name="s" value="search">
            <input type="hidden" name="search" value="search" />
            <div class="search_form">

                <h3><img style="padding-right:5px!important;position:relative;" src="<?=bloginfo("template_directory")?>/images/find.png"/><?php _e(SEARCH_PROPERTY_TITLE); ?> </h3>

                <div class="search_row clearfix">
                    <label class="for"><?=SEARCH_PROPERTY_FOR_TEXT ?> : </label>
                    <input name="srch_type" <?php if($_REQUEST['srch_type']=='') {
                        echo 'checked="checked"';
                           }?> id="srch_type_all" type="radio" value="" class="radio" /> <span style="padding-left:3px;text-shadow: 2px 2px 3px #000;"><?=SEARCH_ALL_TEXT?> </span>
                    <input name="srch_type" <?php if($_REQUEST['srch_type']=='Sale') {
                        echo 'checked="checked"';
                           }?> id="srch_type_buy" type="radio" value="Sale" class="radio" /> <span style="padding-left:3px;text-shadow: 2px 2px 3px #000;"><?php _e(SEARCH_BUY_TEXT); ?> </span>
                           <?php/*<input name="srch_type" <?php if($_REQUEST['srch_type']=='Rent') {
    echo 'checked="checked"';
}?> id="srch_type_rent" type="radio"  value="Rent" class="radio" /><span style="padding-left:3px;text-shadow: 2px 2px 3px #000;"><?php _e(SEARCH_RENT_TEXT); ?> </span>*/?>
                </div>

                <div class="search_row clearfix">
                    <label> <?php _e(SEARCH_LOCATION_TEXT); ?> : </label>
                    <select name="srch_location" id="srch_location" onchange="" class="fl select">
                        <option value=""><?php _e(SEARCH_ALL_LOCATION_TEXT); ?> </option>
                        <?php echo get_location_dl($_REQUEST['srch_location']);?>
                        <?php //echo get_category_dropdown_options(get_cat_id_from_name(get_option('ptthemes_locationcategory')),$_REQUEST['srch_location']);?>
                    </select>

                    <?php

                    $addressoptions="";
                    $res=explode("\n",get_option("ptthemes_type_options"));
                    if(count($res)>0) {
                        $addressoptions.='<option value="">';
                        $addressoptions.=_(TYPE_TEXT);
                        $addressoptions.='</option>';
                        foreach($res as $r) {
                            if(trim($r)!="")
                                $addressoptions.='<option value="'.trim($r).'">'.trim($r).'</option>';
                        }
                    }
                    $viewoptions='<option value="">All Views</option>';
                    $res=explode("\n",get_option("ptthemes_view_options"));
                    if(count($res)>0) {
                        $addressoptions.='<option value="">';
                        $addressoptions.=_(TYPE_TEXT);
                        $addressoptions.='</option>';
                        foreach($res as $r) {
                            if(trim($r)!="")
                                $viewoptions.='<option value="'.trim($r).'">'.trim($r).'</option>';
                        }
                    }

                    ?>
                    <label class="spacer" > <?php _e(TYPE_TEXT); ?> : </label>
                    <select name="srch_area" id="srch_area" onchange="" class="select">
                        <?=$addressoptions?>
                        <!--<option value=""><?php _e(SEARCH_ALL_AREA_TEXT); ?></option>-->
                        <?php //get_area_range_dl($_REQUEST['srch_area']);?>
                    </select>

                </div>

                <div class="search_row clearfix">
                    <label><?php _e(SEARCH_PRICE_RANGE_TEXT); ?> : </label>
                    <select name="srch_price" id="srch_price" onchange="" class="fl select">
                        <option value=""><?php _e(SELECT_ALL_PRICE_TEXT); ?> in <?php echo get_currency_sym();?> </option>
                        <?php echo get_price_range_dl($_REQUEST['srch_price']);?>
                        <?php //echo get_category_dropdown_options(get_cat_id_from_name(get_option('ptthemes_pricecategory')),$_REQUEST['srch_price']);?>
                    </select>

                    <!--
                                        <label class="spacer" > <?php _e(SEARCH_KEYWORD_TEXT); ?> : </label>
                                        <input name="srch_keyword" id="srch_keyword" type="text" class="textfield" value="<?php if($_REQUEST['srch_keyword']) {
                        echo $_REQUEST['srch_keyword'];
                    }
                    else {
                        _e(CITY_STATE_ZIP_SRCH_TEXT);
                    }?>" />
                    -->
                    <label class="spacer" > <?=VIEW_TEXT?>: </label>
                    <input type="hidden" name="meta_key" value="view" />
                    <select name="srch_view" id="srch_view" onchange="" class="select">
                        <?=$viewoptions?>
                    </select>
                </div>


                <div class="search_row clearfix">

                    <label><?php _e(SEARCH_BEDROOMS_TEXT); ?> : </label>
                    <select name="srch_bedrooms" id="srch_bedrooms" onchange="" class="fl select select_s">
                        <option value=""><?php _e(SELECT_ALL_BEDROOMS_TEXT); ?> </option>
                        <?php echo get_bedroom_dl($_REQUEST['srch_bedrooms']);?>
                        <?php //echo get_category_dropdown_options(get_cat_id_from_name(get_option('ptthemes_bedroomcategory')),$_REQUEST['srch_bedrooms']);?>
                    </select>

                    <label class="spacer2" style="width:72px;"> <?php _e(SEARCH_BATHROOM_TEXT); ?> : </label>
                    <select name="srch_bathroom" id="srch_bathroom" onchange="" class="fl select select_s">
                        <option value=""><?php _e(SELECT_ALL_BATHROOM_TEXT); ?></option>
                        <?php
                        get_bathroom_dl($_REQUEST['srch_bathroom']);
                        ?>
                    </select>



                    <div class="b_search_properties b_spacer" style="padding-left:8px;"> <a href="javascript:search_now();"><?php _e(SEARCH_PROPERTY_TEXT); ?></a></div>

                </div>

            </div> <!-- search form--></form>
        <div class="property_id_search">
            <form method="get" id="srch_frm_by_id" name="srch_frm_by_id" action="<?php echo get_option('siteurl');?>">
                <input type="hidden" id="spid" name="s" value="search">
                <input type="hidden" name="search" value="search" />
                <h3 class="lblsearch2"><img src="<?=bloginfo("template_directory")?>/images/find.png"/> <?php _e(SEARCH_BY_PROPERTY_ID_TEXT); ?> </h3>

                <label style="width:200px;"><?php _e(SEARCH_PROPERTY_ID_TEXT); ?> : </label>
                <input name="srch_property_id" id="srch_property_id" type="text" class="textfield" value="<?php echo $_REQUEST['srch_property_id'];?>" />
                <div class="b_search_properties clearfix"> <a href="javascript:search_by_id()"><?php _e(SELECT_TEXT); ?></a></div>
            </form>
        </div>


        <div class="searchbottom"></div>



    </div>
</div>
<!-- search end -->
<script type="text/javascript">
    jQuery("#srch_frm select").msDropDown();
<?php if($isshow_search) {?>
    jQuery("#propertysearchoptions").hide();
    <?php }?>
</script>
<script>
    function search_property()
    {
        document.search01.submit();
    }
    function search_by_id()
    {
        document.getElementById('spid').value = '';
        if(document.getElementById('srch_property_id').value)
        {
            document.getElementById('spid').value = 'property id : '+document.getElementById('srch_property_id').value;
        }else
        {
            document.getElementById('spid').value ='all properties';
        }
        document.srch_frm_by_id.submit();
    }
    function search_now()
    {
        document.getElementById('s').value = '';
        var srch_type = '';
        /*if(document.getElementById('srch_type_buy').checked)
        {
            var srch_type = document.getElementById('srch_type_buy').value;
        }else
            if(document.getElementById('srch_type_rent').checked){
                var srch_type = document.getElementById('srch_type_rent').value;
            }*/
        var srch_price = document.getElementById('srch_price').options[document.getElementById('srch_price').selectedIndex].text;
        var srch_location = document.getElementById('srch_location').options[document.getElementById('srch_location').selectedIndex].text;
        var srch_bedrooms = document.getElementById('srch_bedrooms').options[document.getElementById('srch_bedrooms').selectedIndex].text;
        var srch_bathroom = document.getElementById('srch_bathroom').options[document.getElementById('srch_bathroom').selectedIndex].text;
        var srch_area = document.getElementById('srch_area').options[document.getElementById('srch_area').selectedIndex].text;
        var srch_view = document.getElementById('srch_view').options[document.getElementById('srch_view').selectedIndex].text;

        var searchfor = '';
        if(document.getElementById('srch_price').value!='')
        {
            searchfor = srch_price;
        }
        if(srch_type!='')
        {
            if(srch_type!='' && searchfor=='')
            {
                searchfor = srch_type;
            }else
            {
                searchfor = searchfor +' & '+ srch_type;
            }
        }
        if(document.getElementById('srch_location').value!='')
        {
            if(srch_location!='' && searchfor=='')
            {
                searchfor = srch_location;
            }else
            {
                searchfor = searchfor +' & '+ srch_location;
            }
        }
        if(document.getElementById('srch_bedrooms').value!='')
        {
            if(srch_bedrooms!='' && searchfor=='')
            {
                //searchfor = srch_bedrooms;
                if(srch_bedrooms>1)
                {
                    searchfor = srch_bedrooms+' Bedrooms';
                }else
                {
                    searchfor = srch_bedrooms+' Bedroom';
                }
            }else
            {
                //searchfor = searchfor +' & '+ srch_bedrooms;
                if(srch_bathroom>1)
                {
                    searchfor = searchfor +' & '+  srch_bedrooms+' Bedrooms';
                }else
                {
                    searchfor = searchfor +' & '+ srch_bedrooms+' Bedroom';
                }
            }
        }
        if(document.getElementById('srch_bathroom').value!='')
        {
            if(srch_bathroom!='' && searchfor=='')
            {
                if(srch_bathroom>1)
                {
                    searchfor = srch_bathroom+' Baths';
                }else
                {
                    searchfor = srch_bathroom+' Bath';
                }
            }else
            {
                if(srch_bathroom>1)
                {
                    searchfor = searchfor +' & '+  srch_bathroom+' Baths';
                }else
                {
                    searchfor = searchfor +' & '+ srch_bathroom+' Bath';
                }
            }
        }
        if(document.getElementById('srch_area').value!='')
        {
            if(srch_area!='' && searchfor=='')
            {
                searchfor = srch_area;
            }else
            {
                searchfor = searchfor +' & '+ srch_area;
            }
        }
        if(document.getElementById('srch_view').value!='')
        {
            if(srch_view!='' && searchfor=='')
            {
                searchfor = srch_view;
            }else
            {
                searchfor = searchfor +' & '+ srch_view;
            }
        }
        /*
        if(srch_keyword=='' || srch_keyword=='<?php echo CITY_STATE_ZIP_SRCH_TEXT;?>')
        {
            document.getElementById('srch_keyword').value = '';
        }else
        {
            if(srch_keyword!='' && searchfor=='')
            {
                searchfor = srch_keyword;
            }else
            {
                searchfor = searchfor +' & '+ srch_keyword;
            }
        }
         */
        if(searchfor=='')
        {
            searchfor = 'all properties';
        }
        document.getElementById('s').value = searchfor;
        document.srch_frm.submit();
    }
    function show_hide_propertysearchoptions()
    {
        if(document.getElementById('propertysearchoptions').style.display == 'none')
        {
            document.getElementById('propertysearchoptions').style.display = ''
        }else
        {
            document.getElementById('propertysearchoptions').style.display = 'none';
        }
    }
</script>