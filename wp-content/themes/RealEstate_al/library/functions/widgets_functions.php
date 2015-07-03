<?php
// Register widgetized areas
if (function_exists('register_sidebar')) {
    register_sidebars(1, array('name' => 'Front Content 1 Right Top', 'before_widget' => '<div class="widget">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>'));
    register_sidebars(1, array('name' => 'Front Content 2', 'before_widget' => '<div class="widget">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>'));
    register_sidebars(1, array('name' => 'Home Page Sidebar', 'before_widget' => '<div class="widget">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>'));
    register_sidebars(1, array('name' => 'Inner Page Sidebar', 'before_widget' => '<div class="widget">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>'));
    register_sidebars(1, array('name' => 'Blog Page Sidebar', 'before_widget' => '<div class="widget">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>'));
    register_sidebars(1, array('name' => 'Submit Property Page Sidebar', 'before_widget' => '<div class="widget">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>'));
    register_sidebars(1, array('name' => 'Property Detail Page Sidebar', 'before_widget' => '<div class="widget">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>'));
    register_sidebars(3, array('name' => 'Footer Widget %d', 'before_widget' => '<div class="widget">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>'));
    register_sidebars(1, array('name' => 'Header Navigation', 'before_widget' => '<div class="widget">', 'after_widget' => '</div>', 'before_title' => '<h3><span>', 'after_title' => '</span></h3>'));
}

// Check for widgets in widget-ready areas http://wordpress.org/support/topic/190184?replies=7#post-808787
// Thanks to Chaos Kaizer http://blog.kaizeku.com/
function is_sidebar_active($index = 1) {
    $sidebars = wp_get_sidebars_widgets();
    $key = (string) 'sidebar-' . $index;

    return (isset($sidebars[$key]));
}

// =============================== cambio de ocntraseña =================================
class WidgetContrasena extends WP_Widget {

    function WidgetContrasena() {
        $widget_ops = array('classname' => 'widget contrasena', 'description' => 'Cambia la contraseña de un usuario registrado');
        $this->WP_Widget('widget_contrasena', 'PT &rarr; Conrtaseña', $widget_ops);
    }

    function widget($args, $instance) {
        global $userdata, $wpdb;
        if ($userdata->ID) {
?>
            <div class="widget changeus">
                <form name="frmchusr" id="frmchusr" method="post" action="#">
                    <h3>
                        <img class="contentidoh5 myshortlistico" src="http://inmoart.co.uk/wp-content/themes/RealEstate/images/ico-my-shortlist.png">
                        <?= USERNAME_TEXT ?>: <?= $userdata->user_login ?> </h3>
                    
                    <div class="form_row clearfix">
                        <label> <?= NEW_PASS ?>: </label> <input type="password" id="newpass" class="textfield">
                    </div>
                    <div class="form_row clearfix">
                        <label> <?= RETYPE_PASS ?>: </label> <input type="password" id="retypepass" class="textfield">
                    </div>
                    <input type="submit" value="Enviar" class="btn_input_highlight"/>
                </form>
                <div class="success_msg"></div>
            </div>
            <script type="text/javascript">
                $("#frmchusr").submit(function(){
                    $(".changeus .success_msg").html("Processing...");
                    $.ajax({
                        url:"/?page=ajax_change_user",
                        data:"newpassword="+$("#newpass").val()+"&retypepassword="+$("#retypepass").val(),
                        type:"post",
                        success:function(data){
                            $(".changeus .success_msg").html(data);$("#newpass, #retypepass").val("");$(".changeus .success_msg").show().fadeOut(4000,function(){});
                            return false;
                        }
                    });
                    return false;
                });
            </script>
<?php
        }
    }

}

register_widget('WidgetContrasena');

// =============================== Front Content 1 ======================================
class ContactWidget extends WP_Widget {

    function ContactWidget() {
        //Constructor
        $widget_ops = array('classname' => 'widget contact', 'description' => 'Front Page 3 in 1 widget');
        $this->WP_Widget('widget_contact', 'PT &rarr; Front Page 3 in 1 widget', $widget_ops);
    }

    function widget($args, $instance) {
        // prints the widget
        extract($args, EXTR_SKIP);
        // $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
        $t1 = empty($instance['t1']) ? '' : apply_filters('widget_t1', $instance['t1']);
        $t2 = empty($instance['t2']) ? '' : apply_filters('widget_t2', $instance['t2']);
        $t3 = empty($instance['t3']) ? '' : apply_filters('widget_t3', $instance['t3']);
        $t4 = empty($instance['t4']) ? '' : apply_filters('widget_t4', $instance['t4']);
        $t5 = empty($instance['t5']) ? '' : apply_filters('widget_t5', $instance['t5']);
        $t6 = empty($instance['t6']) ? '' : apply_filters('widget_t6', $instance['t6']);
        $t7 = empty($instance['t7']) ? '' : apply_filters('widget_t7', $instance['t7']);
        $t8 = empty($instance['t8']) ? '' : apply_filters('widget_t8', $instance['t8']);
        $t9 = empty($instance['t9']) ? '' : apply_filters('widget_t9', $instance['t9']);
        $t10 = empty($instance['t10']) ? '' : apply_filters('widget_t10', $instance['t10']);
?>


        <div class="options">



            <div class="loans">
                <img id="imgloans" src="<?php bloginfo('template_directory'); ?>/images/img-loan.png"/>
                <?= $t2?>
                
            </div>

            <div class="rental">
                <div id="rentaltitle"><img id="rentalico" src="<?php bloginfo('template_directory'); ?>/images/ico-need-help.png"/><span>Need help? Call Now</span></div>
        <?php
        global $wpdb;
        $cartsql = "select * from $wpdb->options where option_name like 'mysite_general_settings'";
        $cartinfo = $wpdb->get_results($cartsql);
        if ($cartinfo) {
            foreach ($cartinfo as $cartinfoObj) {
                $option_id = $cartinfoObj->option_id;
                $option_value = unserialize($cartinfoObj->option_value);
                $site_telcon_name = $option_value['site_telcon_name'];
                $site_telcon2_name = $option_value['site_telcon2_name'];
            }
        }
        ?>
        <div id="rentaltext"><span> <?= $site_telcon_name ?></span><br/><?= $site_telcon2_name ?></div>
    </div>
</div>





<?php
    }

    function update($new_instance, $old_instance) {
        //save the widget
        $instance = $old_instance;
        // $instance['title'] = strip_tags($new_instance['title']);
        $instance['t1'] = ($new_instance['t1']);
        $instance['t2'] = ($new_instance['t2']);
        $instance['t3'] = ($new_instance['t3']);
        $instance['t4'] = ($new_instance['t4']);
        $instance['t5'] = ($new_instance['t5']);
        $instance['t6'] = ($new_instance['t6']);
        $instance['t7'] = ($new_instance['t7']);
        $instance['t8'] = ($new_instance['t8']);
        $instance['t9'] = ($new_instance['t9']);
        $instance['t10'] = ($new_instance['t10']);
        return $instance;
    }

    function form($instance) {
        //widgetform in backend
        $instance = wp_parse_args((array) $instance, array('title' => '', 't1' => '', 't2' => '', 't3' => '', 't4' => '', 't5' => '', 't6' => '', 't7' => '', 't8' => '', 't9' => '', 't10' => ''));
        $title = strip_tags($instance['title']);
        $t1 = ($instance['t1']);
        $t2 = ($instance['t2']);
        $t3 = ($instance['t3']);
        $t4 = ($instance['t4']);
        $t5 = ($instance['t5']);
        $t6 = ($instance['t6']);
        $t7 = ($instance['t7']);
        $t8 = ($instance['t8']);
        $t9 = ($instance['t9']);
        $t10 = ($instance['t10']);
?>
        <p><label for="<?php echo $this->get_field_id('t2'); ?>"><?php _e('Description 1');?><textarea class="widefat" rows="6" cols="20" id="<?php echo $this->get_field_id('t2'); ?>" name="<?php echo $this->get_field_name('t2'); ?>"><?php echo attribute_escape($t2); ?></textarea></label></p>
<?php
    }

}

register_widget('ContactWidget');

// =============================== finance_calculator Widget ======================================
class finance_calculator_widget extends WP_Widget {

    function finance_calculator_widget() {
        //Constructor
        $widget_ops = array('classname' => 'Finance Calculator', 'description' => __('Finance Calculator Widget'));
        $this->WP_Widget('widget_finance_calculator', 'PT &rarr; Finance Calculator', $widget_ops);
    }

    function widget($args, $instance) {
        // prints the widget
        extract($args, EXTR_SKIP);
        $title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
?>


        <div class="widget finance_calculator">
            <!--FINANCE CALCULATOR START-->
            <script language="JavaScript">
                <!--
                function showpay() {
                    if ((document.calc.loan.value == null || document.calc.loan.value.length == 0) ||
                        (document.calc.months.value == null || document.calc.months.value.length == 0)
                        ||
                        (document.calc.rate.value == null || document.calc.rate.value.length == 0))
                    { document.calc.pay.value = "Incomplete data";
                    }
                    else
                    {
                        var princ = parseFloat(document.calc.loan.value);
                        var term  = parseFloat(document.calc.months.value);
                        var intr   = parseFloat(document.calc.rate.value) / 1200;
                        var tmpVal = (princ * intr / (1 - (Math.pow(1/(1 + intr), term)))).toFixed(2);
                        document.getElementById("total").innerHTML = "Monthly Payment : <strong>"+tmpVal+"</strong>";
                    }

                    // payment = principle * monthly interest/(1 - (1/(1+MonthlyInterest)*Months))

                }

                // -->
            </script>
            <form name=calc method=POST>
                <h3><img class="contentidoh5" src="<?php bloginfo('template_directory'); ?>/images/ico-finance-calculator.png"/><?php _e($title); ?> </h3>

                <div class="form_row clearfix">
                    <label> <?php _e('Loan Amount'); ?> : </label> <input type=text name=loan class="textfield" >
                </div>
                <div class="form_row clearfix">
                    <label><?php _e('Months'); ?> : </label>
                    <input type=text name=months class="textfield" >
                </div>
                <div class="form_row clearfix" >
                    <label> <?php _e('Interest Rate'); ?> : </label> <input type=text name=rate class="textfield" >
                </div>
                <div class="form_row clearfix" >
                    <p id="total"> </p>
                </div>
                <input type=button onClick='showpay()' value="<?php _e('Calculate'); ?>" class="btn_input_highlight" >
            </form>


        </div>   <!--FINANCE Calculator END-->




<?php
    }

    function update($new_instance, $old_instance) {
        //save the widget
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['desc1'] = ($new_instance['desc1']);
        return $instance;
    }

    function form($instance) {
        //widgetform in backend
        $instance = wp_parse_args((array) $instance, array('title' => '', 't1' => '', 't2' => '', 't3' => '', 'img1' => '', 'desc1' => ''));
        $title = strip_tags($instance['title']);
        $desc1 = ($instance['desc1']);
?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>">Widget Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>



<?php
    }

}

register_widget('finance_calculator_widget');

// =============================== Favoritos Widget =====================================
class FavoritosWidget extends WP_Widget {

    function FavoritosWidget() {
        //Constructor
        $widget_ops = array('classname' => 'Favoritos', 'description' => 'Favoritos Widget');
        $this->WP_Widget('widget_favoritos', 'PT &rarr; Favoritos', $widget_ops);
    }

    function widget($args, $instance) {
        // prints the widget
        global $current_user, $wpdb;
        //if(!$current_user->data->ID=='') {
?>
        <div class="widget">
            <h3>
                <img class="contentidoh5 myshortlistico" src="http://inmoart.co.uk/wp-content/themes/RealEstate/images/ico-my-shortlist.png">
        <?= MY_SHORTLIST ?></h3>
    <div class="shlist">
        <?php
        $post_ids = get_usermeta($current_user->data->ID, 'user_favorite_property');
        if (count($post_ids) > 0 && !$current_user->data->ID == '') {
            $sql = "select * from wp_posts where post_status = 'publish' and id in (" . implode($post_ids, ",") . ")";
            $res = $wpdb->get_results($sql);
            if (count($res) > 0) {
                echo '<ul class="featured_agent_list">';
                foreach ($res as $val) {
                    $imgs = bdw_get_images($val->ID, $img_size = 'thumb');
        ?>
                    <li class="clearfix"><a href="<?php echo get_permalink($val->ID); ?>">
                <?php //get_user_profile_pic($val->ID,40,40);  ?>
                <?php
                    echo "<span class=\"tooltipfeatured\">" . number_format(str_replace(".", "", get_post_meta($val->ID, 'price', true)), 0, ",", ".") . "€</span>";
                    echo ($imgs[0] ? '<span class="marcofeatured"><img src="' . $imgs[0] . '" style="width:128px;height:94px;"/></span>' : '');
                ?>
                </a>

            <?php /* <p><a href="<?php echo get_author_link($echo = false, $val->ID);?>"><?php echo $val->display_name; ?> </a> <br /> <?php _e('Listed')?>: <?php echo get_usernumposts_count($val->ID); ?> <?php _e('Properties'); ?>  </p> */ ?>
                </li>
        <?php
                }
                echo '</ul>';
            } else {
                echo '<div class="msgshlist">' . TEXT_NOFAVORITES . '</div>';
            }
        } else {
            echo '<div class="msgshlist">' . TEXT_NOFAVORITES . '</div>';
        }
        ?>
    </div>
</div>
<?php
        //}
    }

}

register_widget('FavoritosWidget');

// =============================== Weather Widget =====================================
class WeatherWidget extends WP_Widget {

    function WeatherWidget() {
        //Constructor
        $widget_ops = array('classname' => 'Weather', 'description' => 'Weather Widget');
        $this->WP_Widget('widget_Weather', 'PT &rarr; Weather', $widget_ops);
    }

    function widget($args, $instance) {
        // prints the widget
        global $current_user, $wpdb;
?>
        <div class="widget">
            <h3>
                <img class="contentidoh5 myshortlistico" src="http://inmoart.co.uk/wp-content/themes/RealEstate/images/ico-the-weather.png">
        <?= THE_WEATHER ?></h3>
    <div class="textwidget">
        <!-- www.TuTiempo.net - Ancho: 116px - Alto:71px -->
        <div id="TT_s1eEWEerKsGIMAqzzjjzzYalcO1"><h2><a href="http://www.tutiempo.net/Tiempo-Espana.html">El Tiempo</a></h2><a href="http://www.tutiempo.net/Tiempo-Teulada-E03625.html">El tiempo en Teulada</a></div>
        <script type="text/javascript" src="http://www.tutiempo.net/TTapiV2/s1eEWEerKsGIMAqzzjjzzYalcO1"></script>

    </div>
</div>
<?php
    }

}

register_widget('WeatherWidget');

// =============================== About us Widget ======================================
class TextWidget extends WP_Widget {

    function TextWidget() {
        //Constructor
        $widget_ops = array('classname' => 'About us', 'description' => 'About us Widget');
        $this->WP_Widget('widget_about', 'PT &rarr; About us', $widget_ops);
    }

    function widget($args, $instance) {
        // prints the widget
        extract($args, EXTR_SKIP);
        $title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
        $desc1 = empty($instance['desc1']) ? '&nbsp;' : apply_filters('widget_desc1', $instance['desc1']);
?>

        <div class="widget">
            <h3><?php _e($title); ?> </h3>
    <?php if ($desc1 <> "") {
    ?>
    <?php _e($desc1); ?>
    <?php } ?>

    </div>


<?php
    }

    function update($new_instance, $old_instance) {
        //save the widget
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['desc1'] = ($new_instance['desc1']);
        return $instance;
    }

    function form($instance) {
        //widgetform in backend
        $instance = wp_parse_args((array) $instance, array('title' => '', 't1' => '', 't2' => '', 't3' => '', 'img1' => '', 'desc1' => ''));
        $title = strip_tags($instance['title']);
        $desc1 = ($instance['desc1']);
?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title'); ?>: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>

        <p><label for="<?php echo $this->get_field_id('desc1'); ?>"><?= PRO_DESCRIPTION_TEXT; ?> <textarea class="widefat" rows="6" cols="20" id="<?php echo $this->get_field_id('desc1'); ?>" name="<?php echo $this->get_field_name('desc1'); ?>"><?php echo attribute_escape($desc1); ?></textarea></label></p>

<?php
    }

}

register_widget('TextWidget');

// =============================== Contact us Widget ======================================
class sidecoontactwidget extends WP_Widget {

    function sidecoontactwidget() {
        //Constructor
        $widget_ops = array('classname' => 'Contact Us', 'description' => 'About us Widget');
        $this->WP_Widget('widget_side_contact', 'PT &rarr; Contact Us', $widget_ops);
    }

    function widget($args, $instance) {
        // prints the widget
        extract($args, EXTR_SKIP);
        $title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
        $desc1 = empty($instance['desc1']) ? '&nbsp;' : apply_filters('widget_desc1', $instance['desc1']);
?>

        <div class="widget contact">
            <h3><?php _e($title); ?> </h3>
    <?php if ($desc1 <> "") {
    ?>
    <?php _e($desc1); ?>
    <?php } ?>
    </div>


<?php
    }

    function update($new_instance, $old_instance) {
        //save the widget
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['desc1'] = ($new_instance['desc1']);
        return $instance;
    }

    function form($instance) {
        //widgetform in backend
        $instance = wp_parse_args((array) $instance, array('title' => '', 't1' => '', 't2' => '', 't3' => '', 'img1' => '', 'desc1' => ''));
        $title = strip_tags($instance['title']);
        $desc1 = ($instance['desc1']);
?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title'); ?>: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>

        <p><label for="<?php echo $this->get_field_id('desc1'); ?>"><?= PRO_DESCRIPTION_TEXT; ?> <textarea class="widefat" rows="6" cols="20" id="<?php echo $this->get_field_id('desc1'); ?>" name="<?php echo $this->get_field_name('desc1'); ?>"><?php echo attribute_escape($desc1); ?></textarea></label></p>

<?php
    }

}

register_widget('sidecoontactwidget');

// =============================== Login Widget ======================================
class loginwidget extends WP_Widget {

    function loginwidget() {
        //Constructor
        $widget_ops = array('classname' => 'Loginbox', 'description' => 'Loginbox Widget');
        $this->WP_Widget('widget_loginwidget', 'PT &rarr; Loginbox', $widget_ops);
    }

    function widget($args, $instance) {
        // prints the widget
        extract($args, EXTR_SKIP);
        $title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
        $desc1 = empty($instance['desc1']) ? '&nbsp;' : apply_filters('widget_desc1', $instance['desc1']);
?>

        <div class="widget login_widget">


    <?php
        global $current_user;
        if ($current_user->ID) {
    ?>
            <h3><?php _e(MY_ACCOUNT_TEXT); ?></h3>
            <ul class="xoxo blogroll">
                <li><a href="<?php echo get_author_link($echo = false, $current_user->data->ID); ?>"><?php _e(DASHBOARD_TEXT); ?></a></li>
                <li><a href="<?php echo get_option('siteurl'); ?>/?page=profile"><?php _e(EDIT_PROFILE_PAGE_TITLE); ?></a></li>
                <li><a href="<?php echo get_option('siteurl'); ?>/?page=profile#change_pw"><?php _e(CHANGE_PW_TEXT); ?></a></li>
            </ul>
    <?php
        } else {
    ?>
            <h3><?php echo $title; ?> </h3>
            <form name="loginform" id="loginform" action="<?php echo get_settings('home') . '/index.php?page=login'; ?>" method="post" >
                <div class="form_row"><label><?php _e('Username'); ?>  <span>*</span></label>  <input name="log" id="user_login" type="text" class="textfield" /> <span id="user_loginInfo"></span> </div>
                <div class="form_row"><label><?php _e('Password'); ?>  <span>*</span></label>  <input name="pwd" id="user_pass" type="password" class="textfield" /><span id="user_passInfo"></span>  </div>

                <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
                <input type="hidden" name="testcookie" value="1" />

                <input type="submit" name="submit" value="<?php _e(SIGN_IN_BUTTON); ?>" class="btn_input_highlight">
            </form>
            <p class="forgot_link">   <a href="<?php echo get_option('siteurl'); ?>/?page=login&page1=sign_up"><?php _e(NEW_USER_TEXT); ?></a>  <br /> <a href="<?php echo get_option('siteurl'); ?>/?page=login&page1=sign_in"><?php _e(FORGOT_PW_TEXT); ?></a> </p>
    <?php } ?>
    </div>

<?php
    }

    function update($new_instance, $old_instance) {
        //save the widget
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['desc1'] = ($new_instance['desc1']);
        return $instance;
    }

    function form($instance) {
        //widgetform in backend
        $instance = wp_parse_args((array) $instance, array('title' => '', 't1' => '', 't2' => '', 't3' => '', 'img1' => '', 'desc1' => ''));
        $title = strip_tags($instance['title']);
        $desc1 = ($instance['desc1']);
?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title'); ?>: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>

<?php /* ?><p><label for="<?php echo $this->get_field_id('desc1'); ?>">Description <textarea class="widefat" rows="6" cols="20" id="<?php echo $this->get_field_id('desc1'); ?>" name="<?php echo $this->get_field_name('desc1'); ?>"><?php echo attribute_escape($desc1); ?></textarea></label></p><?php */ ?>

<?php
    }

}

register_widget('loginwidget');

// =============================== subscribe widget ======================================
class subscribewidget extends WP_Widget {

    function subscribewidget() {
        //Constructor
        $widget_ops = array('classname' => 'widget ', 'Subscribe' => 'widget Subscribe');
        $this->WP_Widget('widget_subscribe', 'PT &rarr; Subscribe', $widget_ops);
    }

    function widget($args, $instance) {
        // prints the widget
        extract($args, EXTR_SKIP);
        $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
        $text = empty($instance['text']) ? '' : apply_filters('widget_text', $instance['text']);
        $id = empty($instance['id']) ? '' : apply_filters('widget_id', $instance['id']);
?>

        <div class="xsnazzy ">
            <strong class="xtop"><strong class="xb1"></strong><strong class="xb2"></strong><strong class="xb3"></strong><strong class="xb4"></strong></strong>
            <div class="xboxcontent clearfix">
                <div class="subscribe">
                    <h6><?php _e($title); ?></h6>
                    <p><?php _e($text); ?></p>


                    <form  action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow"  onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $id; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
                        <input type="text" class="subscribefieldnow" onFocus="if (this.value == '<?php _e('your@email.com'); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php _e('your@email.com'); ?>';}" name="email" value="<?php _e('your@email.com'); ?>"/>
                        <input type="hidden" value="<?php echo $id; ?>" name="uri"/><input type="hidden" name="loc" value="en_US"/>
                        <input type="submit" value="" class="submit" />

                    </form>

                </div><!-- subscribe end -->
            </div>
            <strong class="xbottom"><strong class="xb4"></strong><strong class="xb3"></strong><strong class="xb2"></strong><strong class="xb1"></strong></strong>
        </div>

<?php
    }

    function update($new_instance, $old_instance) {
        //save the widget
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['text'] = ($new_instance['text']);
        $instance['id'] = ($new_instance['id']);
        return $instance;
    }

    function form($instance) {
        //widgetform in backend
        $instance = wp_parse_args((array) $instance, array('title' => '', 'text' => '', 'id' => ''));
        $title = strip_tags($instance['title']);
        $text = ($instance['text']);
        $id = ($instance['id']);
?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('text'); ?>">Description
                <input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo attribute_escape($text); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('id'); ?>">Feedburner ID:
                <input class="widefat" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" type="text" value="<?php echo attribute_escape($id); ?>" />
            </label>
        </p>
<?php
    }

}

register_widget('subscribewidget');

// =============================== Latest Posts Widget (particular category) ======================================
class LatestPostsParticular2 extends WP_Widget {

    function LatestPostsParticular2() {

        //Constructor
        $widget_ops = array('classname' => 'widget latest posts', 'description' => 'List of latest menus in particular category');
        $this->WP_Widget('widget_posts', 'PT &rarr; Latest Posts', $widget_ops);
    }

    function widget($args, $instance) {
        // prints the widget

        extract($args, EXTR_SKIP);
        echo $before_widget;
        $title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
        $category = empty($instance['category']) ? '&nbsp;' : apply_filters('widget_category', $instance['category']);
        $post_number = empty($instance['post_number']) ? '&nbsp;' : apply_filters('widget_post_number', $instance['post_number']);
?>
        <div class="latestnewshome"><h3><img class="contentidoh5" src="<?php bloginfo('template_directory'); ?>/images/ico-lasted-news.png"/><?php _e($title); ?></h3> <ul>
        <?php
        global $post;
        $latest_menus = get_posts('numberposts=' . $post_number . 'postlink=' . $post_link . '&category=' . $category . '');
        foreach ($latest_menus as $post) :
            setup_postdata($post);
        ?>
            <li class="clearfix">
                <p>

                <?php /* if ( get_post_meta($post->ID,'image', true) ) { ?>
                  <img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=40&amp;w=40&amp;zc=1&amp;q=80" alt="<?php the_title(); ?>" class="newsphoto" />

                  <?php
                  }else
                  {
                  ?>
                  <img src="<?php bloginfo('template_directory'); ?>/images/img_not_available_news.png" alt="" class="newsphoto"  />
                  <?php
                  }
                 */ ?>

                <a class="widget-title" href="<?php the_permalink(); ?>"><?php the_title(); ?>
                </a> </p>
            <p class="date"><?php the_time('F j, Y') ?> // <a href="<?php the_permalink(); ?>#commentarea" class="comment_n"><?php comments_number('0 Comments', '1 Comments', '% Comments'); ?></a></p>
        </li>
        <?php endforeach; ?>
        <?php
                echo '</ul></div>';

                echo $after_widget;
            }

            function update($new_instance, $old_instance) {

                //save the widget

                $instance = $old_instance;
                $instance['title'] = strip_tags($new_instance['title']);
                $instance['category'] = strip_tags($new_instance['category']);
                $instance['post_number'] = strip_tags($new_instance['post_number']);
                $instance['post_link'] = strip_tags($new_instance['post_link']);
                return $instance;
            }

            function form($instance) {

                //widgetform in backend
                $instance = wp_parse_args((array) $instance, array('title' => '', 'category' => '', 'post_number' => ''));
                $title = strip_tags($instance['title']);
                $category = strip_tags($instance['category']);
                $post_number = strip_tags($instance['post_number']);
                $post_link = strip_tags($instance['post_link']);
        ?>
                <p>
                    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?>:
                        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
                    </label>
                </p>
                <p>
                    <label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Categories (<code>IDs</code> separated by commas)'); ?>:
                        <input class="widefat" id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" type="text" value="<?php echo attribute_escape($category); ?>" />
                    </label>
                </p>
                <p>
                    <label for="<?php echo $this->get_field_id('post_number'); ?>"><?php _e('Number of posts'); ?>:
                        <input class="widefat" id="<?php echo $this->get_field_id('post_number'); ?>" name="<?php echo $this->get_field_name('post_number'); ?>" type="text" value="<?php echo attribute_escape($post_number); ?>" />
                    </label>
                </p>
        <?php
            }

        }

        register_widget('LatestPostsParticular2');

        // =============================== Top Agents Widget ======================================
        class FeaturedAgentWidget extends WP_Widget {

            function FeaturedAgentWidget() {

                //Constructor
                $widget_ops = array('classname' => 'widget Top Agents', 'description' => 'List of Top Agents in particular category');
                $this->WP_Widget('widget_FeaturedAgent', 'PT &rarr; Top Agents', $widget_ops);
            }

            function widget($args, $instance) {
                // prints the widget

                extract($args, EXTR_SKIP);
                echo $before_widget;
                $title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
                $category = empty($instance['category']) ? '&nbsp;' : apply_filters('widget_category', $instance['category']);
                $post_number = empty($instance['post_number']) ? '&nbsp;' : apply_filters('widget_post_number', $instance['post_number']);
                if ($post_number <= 0) {
                    $post_number = 5;
                }
        ?>

                <div class="featured_agent">

                    <h3><img class="contentidoh5" src="<?php bloginfo('template_directory'); ?>/images/ico-top-properties.png"/><?= TOP_PROPERTIES ?></h3>

                    <ul class="featured_agent_list">


                <?php
                //$listAuthor=custom_list_authors('',array('show_count'=>$post_number,'sort'=>'most','pagination'=>1,));
                $category = get_cat_id_from_name("Feature");
                    $listAuthor = get_posts('numberposts=400&meta_key=list_type&meta_value=Feature');
                foreach ($listAuthor as $val) {
                    $imgs = bdw_get_images($val->ID, $img_size = 'thumb');
                ?>
                    <li class="clearfix"><a href="<?php echo get_permalink($val->ID); ?>">
                        <?php //get_user_profile_pic($val->ID,40,40);  ?>
                        <?php
                        echo "<span class=\"tooltipfeatured\">" . number_format(str_replace(".", "", get_post_meta($val->ID, 'price', true)), 0, ",", ".") . "€</span>";
                        echo ($imgs[0] ? '<span class="marcofeatured"><img src="' . $imgs[0] . '" style="width:128px;height:94px;"/></span>' : '');
                        ?>
                    </a>

                    <?php /* <p><a href="<?php echo get_author_link($echo = false, $val->ID);?>"><?php echo $val->display_name; ?> </a> <br /> <?php _e('Listed')?>: <?php echo get_usernumposts_count($val->ID); ?> <?php _e('Properties'); ?>  </p> */ ?>
                    </li>
                <?php } ?>

                <?php
                    echo '</ul></div>';

                    echo $after_widget;
                }

                function update($new_instance, $old_instance) {

                    //save the widget
                    $instance = $old_instance;
                    $instance['title'] = strip_tags($new_instance['title']);
                    $instance['category'] = strip_tags($new_instance['category']);
                    $instance['post_number'] = strip_tags($new_instance['post_number']);
                    $instance['post_link'] = strip_tags($new_instance['post_link']);
                    return $instance;
                }

                function form($instance) {
                    //widgetform in backend
                    $instance = wp_parse_args((array) $instance, array('title' => '', 'category' => '', 'post_number' => ''));
                    $title = strip_tags($instance['title']);
                    $category = strip_tags($instance['category']);
                    $post_number = strip_tags($instance['post_number']);
                    $post_link = strip_tags($instance['post_link']);
                ?>
                    <p>
                        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?>:
                            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
                        </label>
                    </p>

                    <p>
                        <label for="<?php echo $this->get_field_id('post_number'); ?>"><?php _e('Number of posts'); ?>:
                            <input class="widefat" id="<?php echo $this->get_field_id('post_number'); ?>" name="<?php echo $this->get_field_name('post_number'); ?>" type="text" value="<?php echo attribute_escape($post_number); ?>" />
                        </label>
                    </p>
                <?php
                }

            }

            register_widget('FeaturedAgentWidget');

// =============================== Dyanmic Sidebar Blockquote widget ======================================
            class BlockquoteWidget extends WP_Widget {

                function BlockquoteWidget() {
                    //Constructor
                    $widget_ops = array('classname' => 'widget Testimonials', 'description' => 'Testimonials');
                    $this->WP_Widget('widget_blockquote', 'PT &rarr; Testimonials', $widget_ops);
                }

                function widget($args, $instance) {
                    // prints the widget
                    extract($args, EXTR_SKIP);
                    $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
                    $quote = array();
                    $author = array();
                    if ($instance['quote1']) {
                        $quote[] = empty($instance['quote1']) ? '' : apply_filters('widget_quote1', $instance['quote1']);
                        $author[] = empty($instance['author1']) ? '' : apply_filters('widget_author1', $instance['author1']);
                    }
                    if ($instance['quote2']) {
                        $quote[] = empty($instance['quote2']) ? '' : apply_filters('widget_quote2', $instance['quote2']);
                        $author[] = empty($instance['author2']) ? '' : apply_filters('widget_author2', $instance['author2']);
                    }
                    if ($instance['quote3']) {
                        $quote[] = empty($instance['quote3']) ? '' : apply_filters('widget_quote3', $instance['quote3']);
                        $author[] = empty($instance['author3']) ? '' : apply_filters('widget_author3', $instance['author3']);
                    }
                    if ($instance['quote4']) {
                        $quote[] = empty($instance['quote4']) ? '' : apply_filters('widget_quote4', $instance['quote4']);
                        $author[] = empty($instance['author4']) ? '' : apply_filters('widget_author4', $instance['author4']);
                    }
                    if ($instance['quote5']) {
                        $quote[] = empty($instance['quote5']) ? '' : apply_filters('widget_quote5', $instance['quote5']);
                        $author[] = empty($instance['author5']) ? '' : apply_filters('widget_author5', $instance['author5']);
                    }
                    $more = empty($instance['more']) ? '' : apply_filters('widget_more', $instance['more']);
                ?>

                    <div class="widget">
                        <div class="testimonials">

                            <h3><?php _e($title); ?></h3>

                        <?php
                        if ($quote) {
                            $key = rand(0, count($quote) - 1);
                            $quote1 = $quote[$key];
                            $author1 = $author[$key];
                        ?>
                            <blockquote>
                                <p class="endquote">
                                <?php _e($quote1); ?></p></blockquote>
                        <p class="name">- <?php echo $author1; ?></p>
                        </blockquote>
                        <?php
                            }
                        ?>

                        </div>
                    </div>





                <?php
                        }

                        function update($new_instance, $old_instance) {
                            //save the widget
                            $instance = $old_instance;
                            $instance['title'] = strip_tags($new_instance['title']);
                            $instance['quote1'] = ($new_instance['quote1']);
                            $instance['author1'] = ($new_instance['author1']);
                            $instance['quote2'] = ($new_instance['quote2']);
                            $instance['author2'] = ($new_instance['author2']);
                            $instance['quote3'] = ($new_instance['quote3']);
                            $instance['author3'] = ($new_instance['author3']);
                            $instance['quote4'] = ($new_instance['quote4']);
                            $instance['author4'] = ($new_instance['author4']);
                            $instance['quote5'] = ($new_instance['quote5']);
                            $instance['author5'] = ($new_instance['author5']);
                            $instance['more'] = ($new_instance['more']);
                            return $instance;
                        }

                        function form($instance) {
                            //widgetform in backend
                            $instance = wp_parse_args((array) $instance, array('title' => '', 'more' => '', 'quote1' => '', 'quote2' => '', 'quote3' => '', 'quote4' => '', 'quote5' => '', 'author1' => '', 'author2' => '', 'author3' => '', 'author4' => '', 'author5' => ''));
                            $title = strip_tags($instance['title']);
                            $quote1 = ($instance['quote1']);
                            $author1 = ($instance['author1']);
                            $quote2 = ($instance['quote2']);
                            $author2 = ($instance['author2']);
                            $quote3 = ($instance['quote3']);
                            $author3 = ($instance['author3']);
                            $quote4 = ($instance['quote4']);
                            $author4 = ($instance['author4']);
                            $quote5 = ($instance['quote5']);
                            $author5 = ($instance['author5']);
                            $more = ($instance['more']);
                ?>
                            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title'); ?>: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
                            <p><label for="<?php echo $this->get_field_id('quote1'); ?>"><?php _e('Testimonials'); ?> 1 <textarea class="widefat" rows="6" cols="20" id="<?php echo $this->get_field_id('quote1'); ?>" name="<?php echo $this->get_field_name('quote1'); ?>"><?php echo attribute_escape($quote1); ?></textarea></label></p>
                            <p><label for="<?php echo $this->get_field_id('author1'); ?>"><?php _e('Author Name'); ?> 1 <input class="widefat" id="<?php echo $this->get_field_id('author1'); ?>" name="<?php echo $this->get_field_name('author1'); ?>" type="text" value="<?php echo attribute_escape($author1); ?>" /></label></p>
                            <p><label for="<?php echo $this->get_field_id('quote2'); ?>"><?php _e('Testimonials'); ?> 2 <textarea class="widefat" rows="6" cols="20" id="<?php echo $this->get_field_id('quote2'); ?>" name="<?php echo $this->get_field_name('quote2'); ?>"><?php echo attribute_escape($quote2); ?></textarea></label></p>
                            <p><label for="<?php echo $this->get_field_id('author2'); ?>"><?php _e('Author Name'); ?> 2 <input class="widefat" id="<?php echo $this->get_field_id('author2'); ?>" name="<?php echo $this->get_field_name('author2'); ?>" type="text" value="<?php echo attribute_escape($author2); ?>" /></label></p>
                            <p><label for="<?php echo $this->get_field_id('quote3'); ?>"><?php _e('Testimonials'); ?> 3 <textarea class="widefat" rows="6" cols="20" id="<?php echo $this->get_field_id('quote3'); ?>" name="<?php echo $this->get_field_name('quote3'); ?>"><?php echo attribute_escape($quote3); ?></textarea></label></p>
                            <p><label for="<?php echo $this->get_field_id('author3'); ?>"><?php _e('Author Name'); ?> 3 <input class="widefat" id="<?php echo $this->get_field_id('author3'); ?>" name="<?php echo $this->get_field_name('author3'); ?>" type="text" value="<?php echo attribute_escape($author3); ?>" /></label></p>
                            <p><label for="<?php echo $this->get_field_id('quote4'); ?>"><?php _e('Testimonials'); ?> 4 <textarea class="widefat" rows="6" cols="20" id="<?php echo $this->get_field_id('quote4'); ?>" name="<?php echo $this->get_field_name('quote4'); ?>"><?php echo attribute_escape($quote4); ?></textarea></label></p>
                            <p><label for="<?php echo $this->get_field_id('author4'); ?>"><?php _e('Author Name'); ?> 4 <input class="widefat" id="<?php echo $this->get_field_id('author4'); ?>" name="<?php echo $this->get_field_name('author4'); ?>" type="text" value="<?php echo attribute_escape($author4); ?>" /></label></p>
                            <p><label for="<?php echo $this->get_field_id('quote5'); ?>"><?php _e('Testimonials'); ?> 5 <textarea class="widefat" rows="6" cols="20" id="<?php echo $this->get_field_id('quote5'); ?>" name="<?php echo $this->get_field_name('quote5'); ?>"><?php echo attribute_escape($quote5); ?></textarea></label></p>
                            <p><label for="<?php echo $this->get_field_id('author5'); ?>"><?php _e('Author Name'); ?> 5 <input class="widefat" id="<?php echo $this->get_field_id('author5'); ?>" name="<?php echo $this->get_field_name('author5'); ?>" type="text" value="<?php echo attribute_escape($author5); ?>" /></label></p>


                <?php
                        }

                    }

                    register_widget('BlockquoteWidget');

// =============================== Advt Sidebar 220x105px Widget ======================================
                    class advtwidget extends WP_Widget {

                        function advtwidget() {
                            //Constructor
                            $widget_ops = array('classname' => 'widget Advt 235x195px', 'description' => 'widget Advt 235x195px');
                            $this->WP_Widget('widget_advt', 'PT &rarr; Sidebar Advt 235x195px', $widget_ops);
                        }

                        function widget($args, $instance) {
                            // prints the widget
                            extract($args, EXTR_SKIP);
                            $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
                            $advt1 = empty($instance['advt1']) ? '' : apply_filters('widget_advt1', $instance['advt1']);
                            $advt_link1 = empty($instance['advt_link1']) ? '' : apply_filters('widget_advt_link1', $instance['advt_link1']);
                            $advt2 = empty($instance['advt2']) ? '' : apply_filters('widget_advt2', $instance['advt2']);
                            $advt_link2 = empty($instance['advt_link2']) ? '' : apply_filters('widget_advt_link2', $instance['advt_link2']);
                ?>
                        <!--<h3><?php // echo $title;    ?> </h3>-->
                            <div class="sidebanner">
                    <?php if ($advt1 <> "") {
                    ?>
                                <a href="<?php echo $advt_link1; ?>"><img src="<?php echo $advt1; ?> " alt="" /></a>
                    <?php } ?>
                        </div>

                <?php
                        }

                        function update($new_instance, $old_instance) {
                            //save the widget
                            $instance = $old_instance;
                            $instance['title'] = strip_tags($new_instance['title']);
                            $instance['advt1'] = ($new_instance['advt1']);
                            $instance['advt_link1'] = ($new_instance['advt_link1']);
                            return $instance;
                        }

                        function form($instance) {
                            //widgetform in backend
                            $instance = wp_parse_args((array) $instance, array('title' => '', 'advt1' => '', 'advt_link1' => '', 'advt2' => '', 'advt_link2' => ''));
                            $title = strip_tags($instance['title']);
                            $advt1 = ($instance['advt1']);
                            $advt_link1 = ($instance['advt_link1']);
                ?>
                            <p>
                                <label for="<?php echo $this->get_field_id('advt1'); ?>"><?php _e('Advt 1 Image Path (ex.http://pt.com/images/banner.jpg)'); ?>
                                    <input class="widefat" id="<?php echo $this->get_field_id('advt1'); ?>" name="<?php echo $this->get_field_name('advt1'); ?>" type="text" value="<?php echo attribute_escape($advt1); ?>" />
                                </label>
                            </p>
                            <p>
                                <label for="<?php echo $this->get_field_id('advt_link1'); ?>"><?php _e('Advt 1 link'); ?>
                                    <input class="widefat" id="<?php echo $this->get_field_id('advt_link1'); ?>" name="<?php echo $this->get_field_name('advt_link1'); ?>" type="text" value="<?php echo attribute_escape($advt_link1); ?>" />
                                </label>
                            </p>
                <?php
                        }

                    }

                    register_widget('advtwidget');

// =============================== Tags Cloud ======================================
                    class tagswidget extends WP_Widget {

                        function tagswidget() {
                            //Constructor
                            $widget_ops = array('classname' => 'widget Tag Cloud', 'description' => 'widget Tag Cloud');
                            $this->WP_Widget('widget_tags', 'PT &rarr; Tag Cloud', $widget_ops);
                        }

                        function widget($args, $instance) {
                            // prints the widget
                            extract($args, EXTR_SKIP);
                            $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
                            $advt1 = empty($instance['advt1']) ? '' : apply_filters('widget_advt1', $instance['advt1']);
                            $advt_link1 = empty($instance['advt_link1']) ? '' : apply_filters('widget_advt_link1', $instance['advt_link1']);
                            $advt2 = empty($instance['advt2']) ? '' : apply_filters('widget_advt2', $instance['advt2']);
                            $advt_link2 = empty($instance['advt_link2']) ? '' : apply_filters('widget_advt_link2', $instance['advt_link2']);
                ?>

                            <div class="widget tagcloud clearfix"><h3 class="tags"><?php _e($title); ?> </h3>

                    <?php wp_tag_cloud('smallest=10&largest=22'); ?>

                        </div>

                <?php
                        }

                        function update($new_instance, $old_instance) {
                            //save the widget
                            $instance = $old_instance;
                            $instance['title'] = strip_tags($new_instance['title']);
                            $instance['advt1'] = ($new_instance['advt1']);
                            $instance['advt_link1'] = ($new_instance['advt_link1']);
                            return $instance;
                        }

                        function form($instance) {
                            //widgetform in backend
                            $instance = wp_parse_args((array) $instance, array('title' => '', 'advt1' => '', 'advt_link1' => '', 'advt2' => '', 'advt_link2' => ''));
                            $title = strip_tags($instance['title']);
                            $advt1 = ($instance['advt1']);
                            $advt_link1 = ($instance['advt_link1']);
                ?>
                            <p>
                                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?>
                                    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
                                </label>
                            </p>

                <?php
                        }

                    }

                    register_widget('tagswidget');

// =============================== Popular Posts Widget ======================================

                    function PopularPostsSidebar() {

                        $settings_pop = get_option("widget_popularposts");

                        $name = $settings_pop['name'];
                        $number = $settings_pop['number'];
                        if ($name <> "") {
                            $popname = $name;
                        } else {
                            $popname = 'Popular Posts';
                        }
                        if ($number <> "") {
                            $popnumber = $number;
                        } else {
                            $popnumber = '10';
                        }
                ?>

                        <div class="widget popular">

                            <h3 class="hl"><span><?php _e($popname); ?></span></h3>

                            <ul>

                        <?php
                        global $wpdb;
                        $now = gmdate("Y-m-d H:i:s", time());
                        $lastmonth = gmdate("Y-m-d H:i:s", gmmktime(date("H"), date("i"), date("s"), date("m") - 12, date("d"), date("Y")));
                        $popularposts = "SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS 'stammy' FROM $wpdb->posts, $wpdb->comments WHERE comment_approved = '1' AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status = 'publish' AND post_date < '$now' AND post_date > '$lastmonth' AND comment_status = 'open' GROUP BY $wpdb->comments.comment_post_ID ORDER BY stammy DESC LIMIT $popnumber";
                        $posts = $wpdb->get_results($popularposts);
                        $popular = '';
                        if ($posts) {
                            foreach ($posts as $post) {
                                $post_title = stripslashes($post->post_title);
                                $guid = get_permalink($post->ID);

                                $first_post_title = substr($post_title, 0, 26);
                        ?>
                                <li>
                                    <a href="<?php echo $guid; ?>" title="<?php echo $post_title; ?>"><?php _e($first_post_title); ?></a>
                                    <br style="clear:both" />
                                </li>
                        <?php
                            }
                        }
                        ?>

                    </ul>
                </div>

                <?php
                    }

                    function PopularPostsAdmin() {

                        $settings_pop = get_option("widget_popularposts");

                        // check if anything's been sent
                        if (isset($_POST['update_popular'])) {
                            $settings_pop['name'] = strip_tags(stripslashes($_POST['popular_name']));
                            $settings_pop['number'] = strip_tags(stripslashes($_POST['popular_number']));

                            update_option("widget_popularposts", $settings_pop);
                        }

                        echo '<p>
			<label for="popular_name">Title:
			<input id="popular_name" name="popular_name" type="text" class="widefat" value="' . $settings_pop['name'] . '" /></label></p>';
                        echo '<p>
			<label for="popular_number">Number of popular posts:
			<input id="popular_number" name="popular_number" type="text" class="widefat" value="' . $settings_pop['number'] . '" /></label></p>';
                        echo '<input type="hidden" id="update_popular" name="update_popular" value="1" />';
                    }

                    register_sidebar_widget('PT &rarr; Popular Posts', 'PopularPostsSidebar');
                    register_widget_control('PT &rarr; Popular Posts', 'PopularPostsAdmin', 250, 200);

// =============================== Twitter widget ======================================
// Plugin Name: Twitter Widget
// Plugin URI: http://seanys.com/2007/10/12/twitter-wordpress-widget/
// Description: Adds a sidebar widget to display Twitter updates (uses the Javascript <a href="http://twitter.com/badges/which_badge">Twitter 'badge'</a>)
// Version: 1.0.3
// Author: Sean Spalding
// Author URI: http://seanys.com/
// License: GPL

                    function widget_Twidget_init() {

                        if (!function_exists('register_sidebar_widget'))
                            return;

                        function widget_Twidget($args) {

                            // "$args is an array of strings that help widgets to conform to
                            // the active theme: before_widget, before_title, after_widget,
                            // and after_title are the array keys." - These are set up by the theme
                            extract($args);

                            // These are our own options
                            $options = get_option('widget_Twidget');
                            $account = $options['account'];  // Your Twitter account name
                            $title = $options['title'];  // Title in sidebar for widget
                            $show = $options['show'];  // # of Updates to show
                            $follow = $options['follow'];  // # of Updates to show
                            // Output
                            echo $before_widget;

                            // start
                            echo '<div class=" twitter"> ';
                            echo '<h3> ' . $title . ' </h3>';
                            echo '<ul id="twitter_update_list"><li></li></ul>';
                            echo '<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/' . $account . '.json?callback=twitterCallback2&amp;count=' . $show . '"></script>';
                            echo '<a href="http://www.twitter.com/' . $account . '/" title="' . $follow . '" class="b_followusontwitter">Follow us on twitter </a>  </div>';


                            // echo widget closing tag
                            echo $after_widget;
                        }

                        // Settings form
                        function widget_Twidget_control() {

                            // Get options
                            $options = get_option('widget_Twidget');
                            // options exist? if not set defaults
                            if (!is_array($options))
                                $options = array('account' => 'rbhavesh', 'title' => 'Twitter Updates', 'show' => '3');

                            // form posted?
                            if ($_POST['Twitter-submit']) {

                                // Remember to sanitize and format use input appropriately.
                                $options['account'] = strip_tags(stripslashes($_POST['Twitter-account']));
                                $options['title'] = strip_tags(stripslashes($_POST['Twitter-title']));
                                $options['show'] = strip_tags(stripslashes($_POST['Twitter-show']));
                                $options['follow'] = strip_tags(stripslashes($_POST['Twitter-follow']));
                                $options['linkedin'] = strip_tags(stripslashes($_POST['Twitter-linkedin']));
                                $options['facebook'] = strip_tags(stripslashes($_POST['Twitter-facebook']));
                                update_option('widget_Twidget', $options);
                            }

                            // Get options for form fields to show
                            $account = htmlspecialchars($options['account'], ENT_QUOTES);
                            $title = htmlspecialchars($options['title'], ENT_QUOTES);
                            $show = htmlspecialchars($options['show'], ENT_QUOTES);
                            $follow = htmlspecialchars($options['follow'], ENT_QUOTES);

                            // The form fields
                            echo '<p style="text-align:left;">
				<label for="Twitter-account">' . __('Twitter Account ID:') . '
				<input style="width: 280px;" id="Twitter-account" name="Twitter-account" type="text" value="' . $account . '" />
				</label></p>';
                            echo '<p style="text-align:left;">
				<label for="Twitter-title">' . __('Title:') . '
				<input style="width: 280px;" id="Twitter-title" name="Twitter-title" type="text" value="' . $title . '" />
				</label></p>';
                            echo '<p style="text-align:left;">
				<label for="Twitter-show">' . __('Show Twitter Posts:') . '
				<input style="width: 280px;" id="Twitter-show" name="Twitter-show" type="text" value="' . $show . '" />
				</label></p>';
                            echo '<input type="hidden" id="Twitter-submit" name="Twitter-submit" value="1" />';
                        }

                        // Register widget for use
                        register_sidebar_widget(array('PT &rarr; Twitter', 'widgets'), 'Widget_Twidget');

                        // Register settings for use, 300x200 pixel form
                        register_widget_control(array('PT &rarr; Twitter', 'widgets'), 'Widget_Twidget_control', 300, 200);
                    }

// Run code and init
                    add_action('widgets_init', 'widget_Twidget_init');
                ?>