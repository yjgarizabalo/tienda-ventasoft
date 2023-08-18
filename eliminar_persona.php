<?php
require 'config.php';

$alert_message = "";
$alert_class = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $stmt = $conn->prepare("DELETE FROM personas WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    if ($stmt->execute()) {
      $alert_message = "Usuario Eliminado.";
      $alert_class = "alert-danger";
    }
    header("Location: home.php");
    exit();
}
?>