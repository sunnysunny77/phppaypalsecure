
<?php
    session_start();
    unset ($_SESSION["loggedin"]);
    unset ($_SESSION["token"]);
    unset ($_SESSION["mail"]);
    unset ($_SESSION["randin"]);
    unset ($_SESSION["randup"]);
    unset ($_SESSION["randm"]);
    header('Location: /');
?>