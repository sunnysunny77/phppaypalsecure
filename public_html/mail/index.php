
<?php
session_start();
if ($_SESSION['token'] === $_POST['token']) {
    require "../../keys.php";

    $enc = openssl_encrypt	 ($_SESSION['mail'], 'AES-128-CBC',hex2bin($key),OPENSSL_ZERO_PADDING,hex2bin($iv));
    setcookie('mail', $enc, 0, '/',  $_SERVER['HTTP_HOST'], true, true);

    $to_email = htmlspecialchars($_POST["mail"], ENT_QUOTES, 'UTF-8');
    $subject = "Sign up Token";
    $host = $_SERVER['HTTP_HOST']; 
    $token = $_SESSION['mail']; 
    $contactus = "https://$host?token=$token";
    $mail = mail($to_email,$subject,$contactus);
    if (!$mail) {
        echo json_encode(error_get_last()['message']);
    } else {
        echo json_encode("Token sent");
    }
}
?>