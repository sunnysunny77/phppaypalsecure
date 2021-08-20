<?php
session_start();
$key = md5(uniqid(rand(), TRUE));
$_SESSION['key'] = $key;
$iv = md5(uniqid(rand(), TRUE));
$_SESSION['iv'] = $iv;
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;
$mail = md5(uniqid(rand(), TRUE));
$_SESSION['mail'] = $mail;
?>
