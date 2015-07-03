<?php
/*
Plugin Name: favoritos
Description: Muestra los favoritos en tu sidebar
Version: 1.0.0
Author: Automattic
*/


function Dfavoritos_widget() {
    global $current_user,$wpdb;
    if(!$current_user->data->ID=='') {
        ?>
<div class="widget">
    <h3>
        <img class="contentidoh5 myshortlistico" src="http://inmoart.co.uk/wp-content/themes/RealEstate/images/ico-my-shortlist.png">
                <?=MY_SHORTLIST?></h3>
    <div class="shlist">
                <?php
                $post_ids = get_usermeta($current_user->data->ID,'user_favorite_property');
                if(count($post_ids)>0) {
                    $sql="select * from wp_posts where post_status = 'publish' and id in (".implode($post_ids,",").")";
                    $res=$wpdb->get_results($sql);
                    echo '<ul class="featured_agent_list">';
                    foreach($res as $val) {
                        $imgs=bdw_get_images($val->ID,$img_size='thumb');
                        ?>
        <li class="clearfix"><a href="<?php echo get_permalink($val->ID);?>">
                                <?php //get_user_profile_pic($val->ID,40,40); ?>
                                <?php
                                echo "<span class=\"tooltipfeatured\">".number_format(str_replace(".","",get_post_meta($val->ID,'price',true)),0,",",".")."€</span>";
                                echo ($imgs[0]?'<span class="marcofeatured"><img src="'.$imgs[0].'" style="width:128px;height:94px;"/></span>':'');
                                ?>
            </a>

                            <?php /*<p><a href="<?php echo get_author_link($echo = false, $val->ID);?>"><?php echo $val->display_name; ?> </a> <br /> <?php _e('Listed')?>: <?php echo get_usernumposts_count($val->ID); ?> <?php _e('Properties'); ?>  </p>*/?>
        </li>
                        <?php
                    }
                    echo '</ul>';
                }else {
                    echo '<div class="msgshlist">'.TEXT_NOFAVORITES.'</div>';
                }
                ?>
    </div>
</div>
        <?php
    }
}
register_sidebar_widget('Dfavoritos', 'Dfavoritos_widget');
//register_widget_control('Akismet', 'widget_akismet_control', null, 75, 'akismet');
?>
