<?php
session_start();
include 'captcha.php';
$captcha = new captcha();
echo $captcha->formularioCaptcha("index.php");

?>
