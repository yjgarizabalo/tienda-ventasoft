<?php 
//comentado
  $host = 'localhost';
  $db_name = 'tienda_ventasoft';
  $username = 'root';
  $password = '';

  try {
    $conn = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $error) {
    die("Error de conexión: " . $error->getMessage());
  }
?>

