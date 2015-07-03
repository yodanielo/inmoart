<?php

global $userdata, $wpdb;
if ($userdata->ID) {
    if ($_POST["newpassword"] != $_POST["retypepassword"])
        echo DONT_MATH;
    else {
        wp_set_password($_POST["newpassword"], $userdata->ID);
        echo PASSWORD_CHANGED;
    }
} else {
    echo START_SESSION;
}
?>