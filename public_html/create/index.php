<?php
session_start();

require "../config/environmentSDK.php";

use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
   
$value = htmlspecialchars($_POST["quantity"], ENT_QUOTES, 'UTF-8') * 20;
$quantity = htmlspecialchars($_POST["quantity"], ENT_QUOTES, 'UTF-8');

$request = new OrdersCreateRequest();
$request->prefer('return=representation');
   
$request->body = array(
    'intent' => 'CAPTURE',
    'application_context' =>
    array(
        'return_url' => 'https://securewebsite.sunnyhome.site/store',
        'cancel_url' => 'https://securewebsite.sunnyhome.site/store'
    ),
    'purchase_units' =>
    array(
        0 =>
        array(
            'description' => 'Securewebsite Transaction',
            'amount' =>
            array(
                'currency_code' => 'AUD',
                'value' => $value,
                'breakdown' =>
                array(
                    'item_total' =>
                    array(
                        'currency_code' => 'AUD',
                        'value' => $value,
                    ),
                ),
            ),
            'items' =>
            array(
                0 =>
                array(
                    'name' => 'PHYSICAL GOODS',
                    'sku' => 'sku01',
                    'unit_amount' =>
                    array(
                        'currency_code' => 'AUD',
                        'value' => 20,
                    ),
                    'quantity' => $quantity,
                ),
            )

        )
    )
);

if ($_SESSION['token'] === $_POST['token']) {
   try {
        echo json_encode($client->execute($request));
    } catch (HttpException $ex) {
        echo json_encode($ex->statusCode . " - " . $ex->getMessage());
    }
}
?>