<?php

function prt_vacio(&$arreglo, $label, $valor, $despues="", $vacio="") {
    if (strlen(trim(str_replace("-", "", $valor))) > 0) {
        $arreglo[] = '<td>' . $label . ': <strong>' . $valor . $despues . '</strong></td>';
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
            *{
                font-family: MyriadProRegular, Arial, Helvetica, sans-serif;
                font-size: 14px;
            }
        </style>
    </head>
    <body>
        <div id="titulo"><h1><?= $r->post_title ?></h1></div>
        <div id="imagen">
            <img src="<?php echo $tumber . $large_img_arr[0]; ?>" width="638" height="480" >
        </div>
        <div><h3><?= PROPERTY_INFO_TEXT ?></h3></div>
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
        <div><h3><?= PRO_DESCRIPTION_TEXT ?></h3></div>
        <div>
            <?= $r->post_content ?>
            </div>
        <?php
                if (get_post_meta($post->ID, 'add_feature', true)) {
        ?>
                    <div >
                        <h3><?= _e(ADD_FEATURE_TEXT); ?></h2>
                            <p>
                    <?php
                    echo nl2br(stripslashes(get_post_meta($r->ID, 'add_feature', true)));
                    ?>
                </p>
        </div>
        <?php
                }
        ?>
    </body>
</html>