<?php 
require "./template/template.php";
echo $head;
require "./indexComponents/session.php";
echo file_get_contents("./indexComponents/toggle.html");
require "./indexComponents/mail.php";
require "./indexComponents/form.php";
echo file_get_contents("./indexComponents/response.html");
echo file_get_contents("./indexComponents/captcha.html");
echo file_get_contents("./indexComponents/homeImg.html");
echo $foot;
?>
