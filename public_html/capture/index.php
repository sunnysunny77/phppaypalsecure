<?php
session_start();

require "../config/environmentSDK.php";

use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

$request = new OrdersCaptureRequest($_POST["orderID"]);
$request->prefer('return=representation');

if ($_SESSION['token'] === $_POST["token"]) {
    try {
        echo json_encode($client->execute($request));
    }catch (HttpException $ex) {
        echo json_encode($ex->statusCode . " - " . $ex->getMessage());
    }
}
?>
