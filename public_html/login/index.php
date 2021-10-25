
<?php
    session_start();
    if ($_SESSION['token'] === $_POST['token']) {

        if ($_SESSION['rand']) {
            sleep(rand(2, 4));
        }
        $_SESSION['rand'] = true;
        
        $user = $_SERVER["PHP_AUTH_USER"];
        $pass = $_SERVER["PHP_AUTH_PW"];
        
        if (!empty($user)) {
            if (!empty($pass)) {

                require "../config/conect.php";

                try {
                    $sql = "SELECT pass FROM login WHERE user= :user";
                    $result = $pdo->prepare($sql);
                    $result->bindValue(':user', $user);
                    $result->execute();
                } catch (PDOException $e) {
                    echo json_encode($e->getMessage());
                    exit();
                }
                $row = $result->fetch();
                if ($row != false) {
                    if (password_verify($pass, $row["pass"])) {
                        $_SESSION['loggedin'] = true;
                        echo json_encode(true);
                        exit();
                    } else {
                        echo json_encode("Error Password");
                        exit();
                    }
                } else {
                    echo json_encode("Error Username");
                    exit();
                }
            } else {
                echo json_encode("Enter Password");
            }
        } else {
            echo json_encode("Enter Username");
        }
    }
?>