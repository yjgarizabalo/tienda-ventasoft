<?php
  require 'config.php';
  require 'api_secret';


  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $primer_nombre = trim($_POST["primer_nombre"]);
    $primer_apellido = trim($_POST["primer_apellido"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $has_password = generateSecurePassword($password);

    $consulta = "INSERT INTO personas (primer_nombre, primer_apellido, email, password) VALUES (:primer_nombre, :primer_apellido, :email, :password)";

    $stmt = $conn->prepare($consulta);
    $stmt->bindParam(":primer_nombre", $primer_nombre);
    $stmt->bindParam(":primer_apellido", $primer_apellido);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $hashed_password);

    if ($stmt->execute()) {
      echo "Registro exitoso";
    } else {
      echo "Error en el registro";
    }
  }
?>