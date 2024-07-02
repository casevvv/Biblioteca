<?php
$dsn = "pgsql:host=localhost;port=5432;dbname=biblioteca";
$username="postgres";
$password="123456";

try {
 
$pdo = new PDO($dsn,$username,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  
} catch(Exception $e) {
  echo "La conexion con la base de datos fallo: " . $e;
}
?>