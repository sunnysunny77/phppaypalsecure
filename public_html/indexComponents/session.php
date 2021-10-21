<?php
session_start();
require "../keys.php";
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;
$mail = md5(uniqid(rand(), TRUE));
$_SESSION['mail'] = $mail;
$_SESSION['rand'] = false;
?>
