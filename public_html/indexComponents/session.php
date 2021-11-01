<?php
session_start();
$_SESSION['mail'] = md5(uniqid(rand(), TRUE));
$_SESSION['randin'] = false;
$_SESSION['randup'] = false;
$_SESSION['randm'] = false;
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;
?>
