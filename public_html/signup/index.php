
<?php
    session_start();
    if ($_SESSION['token'] === $_POST['token']) {

        if ($_SESSION['rand']) {
            sleep(rand(2, 4));
        }
        $_SESSION['rand'] = true;
        
        function decrypt($encrypted){
            require "../../keys.php";
            $decrypted = openssl_decrypt($encrypted, 'AES-128-CBC', hex2bin($key), OPENSSL_ZERO_PADDING, hex2bin($_SESSION['iv'])); 
            $decrypted = trim($decrypted); 
            return $decrypted;
        }
        
        if ( decrypt($_COOKIE["mail"]) == $_POST['mail'] && !empty($_POST['mail']) && isset($_COOKIE["mail"])) {
            
            $user = $_SERVER["PHP_AUTH_USER"];
            $pass = $_SERVER["PHP_AUTH_PW"];
            
            if (strlen(trim($user)) > 0) {
                if (strlen(trim($pass)) > 0) {

                    require "../config/conect.php";
                    
                        try {
                            $isp = password_hash($pass, PASSWORD_DEFAULT);
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