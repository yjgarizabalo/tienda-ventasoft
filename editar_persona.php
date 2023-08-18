<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <!-- javascript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <style>
    * {
      font-family: 'Epilogue', sans-serif;
    }

    ;
  </style>
</head>

<body>
  <?php
  require 'config.php';

  if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $stmt = $conn->prepare("SELECT * FROM personas WHERE id = $id");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  }
  ?>


    <div class="container mt-5">
      <h2>Editar Usuario</h2>
      <form method="post" action="actualizar.php">
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" value="<?php echo $row['primer_nombre']; ?>">
        </div>
        <div class="mb-3">
          <label for="apellido" class="form-label">Primer apellido</label>
          <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" value="<?php echo $row['primer_apellido']; ?>">
        </div>
        <div class="mb-3">
          <label for="correo" class="form-label">Correo</label>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="editar">Guardar Cambios</button>
      </form>
    </div>

</body>