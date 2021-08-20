
<?php
session_start();
if ($_SESSION['token'] === $_POST['token']) {
    require "../../keys.php";
    $host = $_SERVER['HTTP_HOST'];
    $token = $_SESSION['mail'];
    $enc = openssl_encrypt	 ($token, 'AES-128-CBC',hex2bin($key),OPENSSL_ZERO_PADDING,hex2bin($iv));
    setcookie('mail', $enc, 0, '/', $host, true, true);
    $mail = mail(htmlspecialchars($_POST["mail"], ENT_QUOTES, 'UTF-8'),"Sign up Token","https://$host?token=$token");
    if (!$mail) {
        echo json_encode(error_get_last()['message']);
    } else {
        echo json_encode("Token sent");
    }
}
?>