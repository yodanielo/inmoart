</div> <!-- wrapper #end-->
<script type="text/javascript">
    if($(".searchbar").length>0){
        $("#propertysearchoptions").hide();
    }
</script>
<div id="footer">

    <div id="footercont">

        <div id="followuscont">

            <?=FOLLOW_US?>:

            <?php

            $cartsql = "select * from $wpdb->options where option_name like 'mysite_general_settings'";

            $cartinfo = $wpdb->get_results($cartsql);

            if($cartinfo)

            {

                    foreach($cartinfo as $cartinfoObj)

                    {

                        $option_id = $cartinfoObj->option_id;

			$option_value = unserialize($cartinfoObj->option_value);

                        $site_telcon_name = $option_value['site_telcon_name'];

                    }

            }

            ?>

            <a target="_blank" style="margin-left:12px;" href="http://www.facebook.com/"><img src="<?php bloginfo('template_directory'); ?>/images/facebook.png"/></a>

            <a target="_blank" href="http://twitter.com"><img src="<?php bloginfo('template_directory'); ?>/images/tuenti.png"/></a>

            <a target="_blank" href="http://feeds2.feedburner.com/templatic"><img src="<?php bloginfo('template_directory'); ?>/images/rss.png"/></a>

            <a target="_blank" href="http://www.youtube.com"><img src="<?php bloginfo('template_directory'); ?>/images/youtube.png"/></a>

            <div><?=CONTACT_US?>: <span style="font-size: 34px"><?=$site_telcon_name?></span></div>

        </div>

        <div class="bottompart">

            <div class="aboutus">

                <div class="widget">

                    <h3>Über Inmoart</h3>

                    <p>

                        Wir sind Steuerexperten und offiziellen Real Estate

                        Bevollmächtigte, Breite über 20 Jahren Unternehmen

                        Erfahrung in diesem Bereich. Grundsätzlich sind wir

                        Profis Sie vertrauen können.

                    </p>

                </div>

            </div>

            <div class="mortgagecenter">

                <?php dynamic_sidebar(9);  ?>

            </div>

            <div class="bottom_right_col">

                <?php dynamic_sidebar(10);  ?>

            </div>

        </div> <!-- bottom part #end -->







        <div class="footercredits">

            <div class="copyrights">



                <?php if ( get_option('ptthemes_footerpages') <> "" ) { ?>

                <ul>

                        <?php wp_list_pages('title_li=&depth=0&include=' . get_option('ptthemes_footerpages') . '&sort_column=menu_order'); ?>

                </ul>

                    <?php } ?>



                <p> &copy; <?php the_time('Y'); ?> <?php bloginfo(); ?>  All right reserved.</p>





            </div>

            <div class="footerright">



                <p class="author"> <a class="icpopgk" href="http://www.pgk.es" title="pgk.es"><img src="<?php bloginfo('template_directory'); ?>/images/logotipo-footer.png"/></a><a id="seo" target="_blank" href="http://www.pgk.es/posicionamiento-web" title="posicionamiento web">Posicionamiento Web</a></p>

            </div>

        </div>

    </div>

</div><!--footer end-->

<script type="text/javascript">

    function addToFavorite(property_id,action)

    {

        //alert(property_id);

<?php 

global $current_user;

if($current_user->data->ID=='') {

    ?>

            window.location.href="<?php echo get_option('siteurl'); ?>/?page=login";

    <?php

}else {

    ?>

            var fav_url;

            if(action == 'add')

            {

                fav_url = '<?php echo get_option('siteurl'); ?>/index.php?page=favorite&action=add&pid='+property_id;

            }

            else

            {

                fav_url = '<?php echo get_option('siteurl'); ?>/index.php?page=favorite&action=remove&pid='+property_id;

            }

            $.ajax({

                url: fav_url ,

                type: 'GET',

                dataType: 'html',

                timeout: 9000,

                error: function(){

                    alert('Error loading agent favorite property.');

                },

                success: function(html){

    <?php

    if($_REQUEST['list']=='favourite') { ?>

                    document.getElementById('list_property_'+property_id).style.display='none';

        <?php

    }

    ?>

                    document.getElementById('favorite_property_'+property_id).innerHTML=html;

                }

            });
$.ajax({
            url: '<?php echo get_option('siteurl'); ?>/index.php?page=favorite&action=list',
            type: 'GET',
            success:function(data){
                $(".shlist").html(data);
            }
        });
            return false;

    <?php } ?>

        }

</script>	

<?php include (TEMPLATEPATH . "/library/includes/popup_frms.php");?>

<?php wp_footer(); ?><?php if ( get_option('ptthemes_google_analytics') <> "" ) {

    echo stripslashes(get_option('ptthemes_google_analytics'));

} ?>

</body>

</html>		