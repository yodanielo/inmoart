<?php
session_start();
switch($_POST["lang"]) {
    case 'es':
    case 'de':
    case 'en':
    case 'fr':
        $_SESSION["lang"]=$_POST["lang"];
        break;
    default:
        $_SESSION["lang"]="es";
}
?>
