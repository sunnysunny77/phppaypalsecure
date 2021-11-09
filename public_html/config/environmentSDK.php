<?php

require __DIR__ . "/../vendor/autoload.php";

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;

$environment = new SandboxEnvironment("AQfx3wVwJhh2mBla2huypFHOz47rEzTz9ituchDf8ue2tl-2JtemAjSzGq5MSUXUBAysA8kmHe6Be6m1", "");
$client = new PayPalHttpClient($environment);

?>