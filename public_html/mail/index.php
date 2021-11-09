
<?php
session_start();
if ($_SESSION['token'] === $_POST['token']) {
    if ($_SESSION['randm']) {
        sleep(rand(1, 5));
    }
    $_SESSION['randm'] = true;
    
    $host = $_SERVER['HTTP_HOST'];
    $token = $_SESSION['mail'];
    $enc = openssl_encrypt	 ($token, 'AES-128-CBC',hex2bin("0123456789abcdef0123456789abcdef"),OPENSSL_ZERO_PADDING,hex2bin("0a415d193ce0be98598eac6620fa9b26"));
    setcookie('mail', $enc, 0, '/', $host, true, true);
    $headers = 'Content-type: text/html; charset=utf-8';
    $message = "
    <html>
    <head>
      <title>Sign up Token</title>
    </head>
    <body>
    <a href =\"https://$host?token=$token\">Pleae use this link in the same browser to sign up.</a>
    </body>
    </html>
    ";
    $mail = mail(base64_decode($_POST["email"]),"Sign up Token", $message, $headers);
    if (!$mail) {
        echo json_encode(error_get_last()['message']);
    } else {
        echo json_encode("Token sent");
    }
}
?>