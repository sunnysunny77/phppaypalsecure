<?php 
require "./template/template.php";
echo $head;
require "./indexComponents/session.php";
require "./indexComponents/toggle.php";
require "./indexComponents/mail.php";
require "./indexComponents/form.php";
echo file_get_contents("./indexComponents/response.html");
echo file_get_contents("./indexComponents/captcha.html");
echo file_get_contents("./indexComponents/homeImg.html");
echo $foot;
?>
