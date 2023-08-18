<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
  $id = $_POST["id"];
  $primer_nombre = trim($_POST["primer_nombre"]);
  $primer_apellido = trim($_POST["primer_apellido"]);
  $email = trim($_POST["email"]);

  $stmt = $conn->prepare("UPDATE personas SET primer_nombre = :primer_nombre, primer_apellido = :primer_apellido, email = :email WHERE id = :id");
  $stmt->bindParam(":primer_nombre", $primer_nombre);
  $stmt->bindParam(":primer_apellido", $primer_apellido);
  $stmt->bindParam(":email", $email);
  $stmt->bindParam(":id", $id);
  $stmt->execute();

  header("Location: home.php");
  exit();
}
?>