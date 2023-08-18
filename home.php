<?php
  require 'eliminar_persona.php';

  session_start();

  if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
  }
?>

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
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand " href="#">VentaSoft</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Usuario
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Configuracion</a></li>
              <li><a class="dropdown-item" href="#">Información</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="btn btn-danger dropdown-item " href="cerrar_sesion.php">Cerrar sesión</a></li>
            </ul>
          </li>

        </ul>

      </div>
    </div>
  </nav>
  <!-- LISTAR DE USUARIOS -->
  <div class="container mt-5">
    <h2>Lista de Usuarios</h2>

    <?php if (!empty($alert_message)) : ?>
      <div class="alert <?php echo $alert_class; ?> alert-dismissible" role="alert">
        <?php echo $alert_message; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <a href="registrar.php" class="btn btn-primary mb-3">Crear Usuario</a>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Primer Nombre</th>
          <th>Primer Apellido</th>
          <th>Email</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require 'config.php';

        $stmt = $conn->prepare("SELECT id, primer_nombre, primer_apellido, email FROM personas");
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo "<tr>";
          echo "<td>{$row['id']}</td>";
          echo "<td>{$row['primer_nombre']}</td>";
          echo "<td>{$row['primer_apellido']}</td>";
          echo "<td>{$row['email']}</td>";
          echo "<td>
                            <a href='editar_persona.php?id={$row['id']}' class='btn btn-primary btn-sm'>Editar</a>
                            <a href='eliminar_persona.php?id={$row['id']}' class='btn btn-danger btn-sm'>Eliminar</a>
                          </td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>