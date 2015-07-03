<?php

function prt_vacio(&$arreglo, $label, $valor, $despues="", $vacio="") {
    if (strlen(trim(str_replace("-", "", $valor))) > 0) {
        $arreglo[] = '<td><img src="' . get_bloginfo("template_directory", 'display') . '/images/ico-02.png" />&nbsp;&nbsp;&nbsp;' . $label . ': <strong>' . $valor . $despues . '</strong></td>';
    }
}

$id = intval($_GET["id"]);
$sql = "select * from $wpdb->posts where id=$id and post_type='post'";
$res = $wpdb->get_results($sql);
$r = $res[0];
$tumber = $wpdb->get_var("select option_value from wp_options where option_name='siteurl'");
$tumber.='/tumber.php?w=638&h=480&src=';
$large_img_arr = bdw_get_images($r->ID, 'large');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head profile="http://gmpg.org/xfn/11">
        <title>Inmoart - <?= $r->post_title ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <style type="text/css">
            @font-face {
                font-family: 'MyriadProRegular';
                src: url('<?= bloginfo("template_directory") ?>/fuente/myriadpro-regular-webfont.eot');
                src: local('☺'), url('<?= bloginfo("template_directory") ?>/fuente/myriadpro-regular-webfont.woff') format('woff'), url('<?= bloginfo("template_directory") ?>/fuente/myriadpro-regular-webfont.ttf') format('truetype'), url('<?= bloginfo("template_directory") ?>/fuente/myriadpro-regular-webfont.svg#webfont2cDQOnRc') format('svg');
                font-weight: normal;
                font-style: normal;
            }
            body{
                margin:0px;
                padding:0px;
            }
            *{
                font-family: MyriadProRegular, Arial, Helvetica, sans-serif;
                font-size: 14px;
            }
            h1{
                background: url(<?= bloginfo('template_directory') ?>/images/bg-lineahorizontal-titulo-663x3.png) no-repeat 50% 100%;
                color: #414341;
                font-family: MyriadProRegular, Arial;
                font-size: 28px;
                margin-bottom: 0px;
                margin-top: 0px;
                padding: 0px;
            }
            #imagen {
                background: url(<?= bloginfo('template_directory') ?>/images/bg-img-638x480.png) no-repeat !important;
                height: 485px;
                margin-bottom: 10px;
                padding-top: 3px;
                position: relative;
                text-align: center;
                vertical-align: middle;
                width: 644px;
            }
            .basicinfo{
                color: #414341;
                float: left;
                font: normal normal normal 14px/normal MyriadProRegular, Arial, Helvetica, sans-serif;
                line-height: 20px;
                margin-bottom: 20px;
                margin-top: 5px;
                width: 650px;
            }
            .featdetail2, .featdetail1 {
                background: url(<?= bloginfo('template_directory') ?>/images/bg-detail-1.png) no-repeat;
                color: white;
                float: right;
                font-family: MyriadProRegular, Arial, Helvetica, sans-serif;
                font-size: 24px;
                height: 32px;
                line-height: 32px;
                margin-left: 10px;
                text-align: center;
                width: 149px;
            }
            h2 {
                display: block;
                font-size: 18px!important;
                font-weight: bold;
                margin: 0.83em 0px;
            }
            .home{
                margin: 18px 0px 5px;
                /*padding: 9px 0px 0px;*/
                background: url(<?= bloginfo('template_directory') ?>/images/bg-lineahorizontal-titulo-663x3.png) no-repeat 50% 100%;
                border: none;
                height: 39px;
                line-height: 30px;
                margin-bottom: 15px;
                text-shadow: #333 2px 2px 3px;
            }
            .home span{
                position:relative;
                top:-22px;
            }
            .pagina{
                width:650px;
                float:left;
                margin-left:-325px;
                left:50%;
                position:relative;
            }
            #banprincont {
                background: url(<?= bloginfo("template_directory") ?>/images/bg-top-menu.png) repeat-x;
                height: 162px;
                width: 100%;
            }
            #banprincenter {
                margin: 0px auto;
                width: 650px;
            }
            .logo {
                float: left;
                margin-bottom: 0px;
                margin-top: 27px;
            }
        </style>
        <script type="text/javascript">
            window.onload=function(){
                window.print();
            }
        </script>
    </head>
    <body>
        <div id="banprincont">
            <div id="banprincenter">
                <div class="logo">
                    <a href="<?= bloginfo("url") ?>"><img src="<?= bloginfo("template_directory") ?>/images/i-logo.png" alt="InmoArt" title=""></a>
                </div>
            </div>
        </div>
        <div class="pagina">
            <div id="titulo"><h1><?= $r->post_title ?></h1></div>
            <div id="imagen">
                <img src="<?php echo $tumber . $large_img_arr[0]; ?>" width="638" height="480" >
            </div>
            <div class="basicinfo">
                <h2 class="home" style="font-size:18px">
                    <img src="<?= bloginfo('template_directory') ?>/images/ico-home-information.png"/>
                    <div class="featdetail2"><?php echo get_property_price($r->ID); ?></div>
                    <div class="featdetail1">ref.:<?php echo get_post_meta($r->ID, 'mlsno', true); ?></div>
                    <span style="font-size:18px!important"><?php _e(BASIC_INFO_TEXT); ?></span>
                </h2>
            </div>
            <div>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <?php
                    $celdas = array();
                    prt_vacio($celdas, TYPE_TEXT, get_post_meta($r->ID, 'address', true), '');
                    prt_vacio($celdas, PRO_STATE_TEXT, get_post_meta($r->ID, 'add_state', true), '', 'No');
                    prt_vacio($celdas, AREA_TEXT, get_post_meta($r->ID, 'area', true), ' ' . get_area_unit());
                    prt_vacio($celdas, AIR_CONDITIONING, get_post_meta($r->ID, 'add_air', true), ' ');
                    prt_vacio($celdas, PLOT_TEXT, get_post_meta($r->ID, 'add_city', true), ' ' . get_area_unit());
                    prt_vacio($celdas, GARAGE_TEXT, get_post_meta($r->ID, 'add_garage', true), ' ');
                    prt_vacio($celdas, BEDS_TEXT, get_post_meta($r->ID, 'bed_rooms', true), ' ');
                    prt_vacio($celdas, VIEW_TEXT, get_post_meta($r->ID, 'view', true), ' ');
                    prt_vacio($celdas, BATHS_TEXT, get_post_meta($r->ID, 'bath_rooms', true), ' ');
                    prt_vacio($celdas, PRO_LOCATION_TEXT, get_post_meta($r->ID, 'add_location', true), ' ');
                    prt_vacio($celdas, HEATING, get_post_meta($r->ID, 'add_heating', true), ' ');
                    prt_vacio($celdas, TERRACE, get_post_meta($r->ID, 'add_terrace', true), ' ' . get_area_unit());
                    $filas = array_chunk($celdas, 2);
                    foreach ($filas as $f) {
                        echo '<tr>';
                        echo $f[0];
                        if ($f[1])
                            echo $f[1];
                        else
                            echo '<td style="background:none"></td>';
                        echo '</tr>';
                    }
                    ?>
                </table>
            </div>
            <div class="basicinfo">
                <h2 class="home" style="font-size:18px;padding-bottom: 8px;">
                    <img style="position:relative; top:15px" src="<?= get_bloginfo("template_directory", 'display') ?>/images/ico-description.png">
                        <span style="font-size:18px!important;top:0px;"><?= PRO_DESCRIPTION_TEXT ?></span></h2></div>
            <div style="clear:both">
                <?= $r->post_content ?>
                </div>


            <!------------------------------------------------------->
        <?php if (get_post_meta($post->ID, 'add_feature', true)) {
        ?>

                            <h2 class="home" style="padding-bottom: 8px;">
                                <img style="position:relative; top:15px" src="<?= get_bloginfo("template_directory", 'display') ?>/images/ico-description.png">
                <?= _e(ADD_FEATURE_TEXT); ?></h2>
                    <p>
                <?php
                        echo nl2br(stripslashes(get_post_meta($r->ID, 'add_feature', true)));
                ?>
                    </p>

        <?php } ?>
                    <!------------------------------------------------------->



                        <h2 class="home" style="height:30px;">
        <img style="position:relative; top:-5px; float:left;" src="<?= get_bloginfo("template_directory", 'display') ?>/images/ico-schedule-a-viewing.png">&nbsp;
        <?= AGENT_CONTACT_INFO_TEXT ?></h2>
            <?php //get_user_profile_pic($post->post_author,80,80);  ?>


            <?php
                    $sql = "select u.id,u.user_email,(select meta_value from wp_usermeta um where um.user_id=u.id and meta_key='first_name') as first_name,(select meta_value from wp_usermeta um where um.user_id=u.id and meta_key='last_name') as last_name from wp_users u where user_login like 'admin'";
                    $wpdb->query($sql);
                    $usuarios = $wpdb->get_results($sql);
                    $usuarioad = $usuarios[0];
            ?>
                    <ul class="xoxo blogroll" style="width:240px;">
                        <li><?= FIRST_NAME_TEXT ?>: <a><?= $usuarioad->first_name . ' ' . $usuarioad->last_name ?></a></li>
                        <li>E-mail: <a href="mailto:<?= $usuarioad->user_email ?>"><?= $usuarioad->user_email ?></a></li>
                        <li><?= PHONE_TEXT ?>: <a><?= PHONE_TEXT_SRC ?></a></li>
                        <li><?= FAX_TEXT ?>: <a><?= FAX_TEXT_SRC ?></a></li>
                <?php /* if($author_info->user_url) {?>
                      <li> <a href="<?php echo $author_info->user_url;?>"> <?php _e(AGENT_WEBSITE_TEXT); ?> </a></li>
                      <?php }?>
                      <li> <a href="<?php echo get_author_link($echo = false, $post->post_author);?>"> <?php _e(AGENT_OTHR_LISTING_TEXT); ?></a></li>
                      <?php if(get_usermeta( $post->post_author, 'user_phone' )) {?>
                      <li> <?php _e(PHONE_TEXT); ?> : <?php echo get_usermeta( $post->post_author, 'user_phone' );?></li>
                      <?php } */ ?>
            </ul>

        </div>
        </div>
    </body>
</html>