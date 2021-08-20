<?php
$dir = "../";
$location = ucfirst(basename(getcwd()));
$id = basename(getcwd());
if ( getcwd()  == $_SERVER['DOCUMENT_ROOT']) {
    $location = "Home";
    $id = "home";
    $dir = "./";
}
$head = "
<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta charset=\"utf-8\">
        <meta name=\"description\" content=\"Secure Website - $location\">
        <meta name=\"keywords\" content=\"HTTPS, PayPal Intergration, encryption methods - $location \">
        <meta name=\"author\" content=\"D.C\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title> Secure Website  - $location </title>
        <link href=\"{$dir}css/styles.css\" rel=\"stylesheet\" type=\"text/css\">
    </head>
<body>
<header>
    <h1> Secure Website : $location </h1>
</header>
    <nav>
        <ul>
            <li><a href=\"/\"> HOME </a></li>
            <li><a href=\"/store\"> STORE </a></li>
        </ul>
    </nav>
<main id=\"$id\">
\n";

$foot = "
</main>
    <footer>
        <ul>
            <li><a href=\"/\"> HOME </a></li>
            <li><a href=\"/store\"> STORE </a></li>
        </ul>
        <ul>
            <li>&copy;&nbsp;D.C</li>
        </ul>
    </footer>
</body>
</html>";