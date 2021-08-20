<?php
require "../../keys.php"; 
try
{
  $pdo = new PDO('mysql:host=localhost;dbname=secure', 'root', $db);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
  echo json_encode('Unable to connect to the database server');
  exit();
}



