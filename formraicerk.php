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

add_action('wp_footer', 'instancia');
add_action('admin_menu', 'PanelOpcionesFormRaicerk');
function PanelOpcionesFormRaicerk(){
    add_menu_page('Administrador de Form Raicerk','FormRaicerk','administrator','FormRaicerk','opciones_FormRaicerk');
}
function opciones_FormRaicerk(){
    include_once('captcha.php');
    $captcha = new captcha();
    echo $captcha->opcionesmenu();
}
function instancia(){
    include_once('captcha.php');
    $captcha = new captcha();
    echo $captcha->formularioCaptcha('destinatario copia', 'asunto', 'correo a responder', 'Nombre a responder', 'correo de', 'nombre de');
}
?>
