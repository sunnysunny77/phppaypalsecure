<?php
require "../../keys.php"; 
require __DIR__ . "/../vendor/autoload.php";

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;

$environment = new SandboxEnvironment($ppId, $ppSecret);
$client = new PayPalHttpClient($environment);

?>