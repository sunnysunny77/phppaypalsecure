
<?php
    session_start();
    if ($_SESSION['token'] === $_POST['token']) {
        
        require "../../keys.php";

        function decrypt($encrypted,$key, $iv ){
            $decrypted = openssl_decrypt($encrypted, 'AES-128-CBC', $key, OPENSSL_ZERO_PADDING, $iv); 
            $decrypted = trim($decrypted); 
            return $decrypted;
        }
        
        if ( decrypt($_COOKIE["mail"],hex2bin($key),hex2bin($iv)) === $_POST['mail'] && isset($_COOKIE["mail"]) && strlen(trim($_POST['mail'])) > 0 ) {
            
            $user = htmlspecialchars($_SERVER["PHP_AUTH_USER"], ENT_QUOTES, 'UTF-8');
            $pass = htmlspecialchars($_SERVER["PHP_AUTH_PW"], ENT_QUOTES, 'UTF-8');
            
            if (strlen(trim($user)) > 0) {
                if (strlen(trim($pass)) > 0) {

                    require "../config/conect.php";
                    
                        try {
                            $isp = password_hash(decrypt($pass,hex2bin($_SESSION["key"]),hex2bin($_SESSION["iv"])), PASSWORD_DEFAULT);
                            $sql = "INSERT INTO login (user, pass) VALUES (:user,:isp)";
                            $result = $pdo->prepare($sql);
                            $result->bindValue(':user', $user);
                            $result->bindValue(':isp', $isp);
                            $result->execute();
                        } catch (PDOException $e) {
                            if ($e->getCode() == 23000) {
                                echo json_encode("Error Username Taken");
                                exit();
                            } 
                            echo json_encode($e->getMessage());
                            exit();
                        }
                        echo json_encode("Signed up");
                        exit();
                } else {
                    echo json_encode("Enter Password");
                }   
            } else {
                echo json_encode("Enter Username");
            }
        } else {
            echo json_encode("Please Enter Token");
        }  
    }
  ?>