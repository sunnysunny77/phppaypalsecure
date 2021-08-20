
<?php
    session_start();
    if ($_SESSION['token'] === $_POST['token']) {

        require "../config/conect.php";
        
        function decrypt($encrypted){
            $key = hex2bin($_SESSION["key"]);
            $iv =  hex2bin($_SESSION["iv"]);
            $decrypted = openssl_decrypt($encrypted, 'AES-128-CBC', $key, OPENSSL_ZERO_PADDING, $iv); 
            $decrypted = trim($decrypted);
            return $decrypted;
        }

        $user = htmlspecialchars($_SERVER["PHP_AUTH_USER"], ENT_QUOTES, 'UTF-8');
        $pass = htmlspecialchars($_SERVER["PHP_AUTH_PW"], ENT_QUOTES, 'UTF-8');
        
        if (strlen(trim($user)) > 0) {
            if (strlen(trim($pass)) > 0) {
                try {
                    $sql = "SELECT * FROM login WHERE user= '$user'";
                    $result = $pdo->query($sql);
                } catch (PDOException $e) {
                    echo json_encode($e->getMessage());
                    exit();
                }
                $row = $result->fetch();
                if ($row != false) {
                    if (password_verify(decrypt($_SERVER["PHP_AUTH_PW"]), $row["pass"])) {
                        $_SESSION['loggedin'] = true;
                        echo json_encode(true);
                    } else {
                        echo json_encode("Error Password");
                    }
                } else {
                    echo json_encode("Error Username");
                }
            } else {
                echo json_encode("Enter Password");
            }
        } else {
            echo json_encode("Enter Username");
        }
    }
?>