<?php
/*
Plugin Name: Form de Raicerk
Plugin URI: http://github.com/raicerk/FormRaicerk
Description: Formulario de envio de correos y validacion de spam
Version: 1.0
Author: Juan Mora
Author URI: http://facebook.com/Raicerk
License: GPL2
*/
session_start();
include_once('captcha.php');
add_action('wp_footer', 'instancia');
add_action('admin_menu', 'PanelOpcionesFormRaicerk');
function PanelOpcionesFormRaicerk(){
    add_menu_page('Administrador de Form Raicerk','FormRaicerk','administrator','FormRaicerk','opciones_FormRaicerk');
}
function opciones_FormRaicerk(){
    $captcha = new captcha();
    echo $captcha->opcionesmenu();
}
function instancia(){
    $captcha = new captcha();
    echo $captcha->formularioCaptcha("index.php");
}
?>
