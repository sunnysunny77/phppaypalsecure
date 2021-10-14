
<?php
    session_start();
    if ($_SESSION['token'] === $_POST['token']) {
        
        function decrypt($encrypted){
            require "../../keys.php";
            $decrypted = openssl_decrypt($encrypted, 'AES-128-CBC', hex2bin($key), OPENSSL_ZERO_PADDING, hex2bin($iv)); 
            $decrypted = trim($decrypted);
            return $decrypted;
        }

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
                    if (password_verify(decrypt($pass), $row["pass"])) {
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