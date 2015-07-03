<?php
$numbanners = 2 ;
$random = rand(1,$numbanners);
$img = array();
$url = array();
$txt = array();
$img[1] = "http://inmoart.co.uk/wp-content/themes/RealEstate/publi/01.jpg";
$url[1] = "#";
$txt[1] = "Villas Buigues";

$img[2] = "http://inmoart.co.uk/wp-content/themes/RealEstate/publi/03.jpg";
$url[2] = "#";
$txt[2] = "Villas Buigues";

echo "<a href='$url[$random]' target=' _blank '>
<img src='$img[$random]' alt='$txt[$random]' border=' 0 '></a>";
?>