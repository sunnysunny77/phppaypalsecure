<?php 
    session_start();
    if (!isset($_SESSION['loggedin'])) {
        header('Location: /');
    } else if (isset($_SESSION['loggedin'])) {
        require "../template/template.php";
        echo $head;
        require "./components/payPalButton.php";
        echo file_get_contents("./components/logOut.html");
        echo file_get_contents("./components/payPalApproved.html");
        echo $foot;
    }
?>
