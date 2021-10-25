<?php
session_start();
$_SESSION['mail'] = md5(uniqid(rand(), TRUE));
$_SESSION['rand'] = false;
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;
?>
