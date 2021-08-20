
<?php
    session_start();
    unset ($_SESSION["loggedin"]);
    unset ($_SESSION["key"]);
    unset ($_SESSION["iv"]);
    unset ($_SESSION["token"]);
    header('Location: /');
?>