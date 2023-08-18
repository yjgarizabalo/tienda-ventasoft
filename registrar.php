<?php
require 'config.php';
require 'api_secret.php';

$alert_message = "";
$alert_class = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $primer_nombre = trim($_POST["primer_nombre"]);
  $primer_apellido = trim($_POST["primer_apellido"]);
  $email = trim($_POST["email"]);
  $password = trim($_POST["password"]);

  $has_password = generateSecurePassword($password);

  $consulta_personas = $conn->prepare("SELECT id FROM personas WHERE email = :email");
  $consulta_personas->bindParam(":email", $email);
  $consulta_personas->execute();

  if (empty($primer_nombre) || empty($primer_apellido) || empty($email) || empty($password)) {
    $alert_message = "Debes llenar todos los campos para continuar";
    $alert_class = "alert-danger";
  } else {
    if ($consulta_personas->rowCount() > 0) {
      $alert_message = "El usuario que  $email  esta ingresando ya existe";
      $alert_class = "alert-danger";
      // echo "Ya el correo que intenta registrar existe";
    } else {
      $consulta = "INSERT INTO personas (primer_nombre, primer_apellido, email, password) VALUES (:primer_nombre, :primer_apellido, :email, :password)";
      $stmt = $conn->prepare($consulta);
      $stmt->bindParam(":primer_nombre", $primer_nombre);
      $stmt->bindParam(":primer_apellido", $primer_apellido);
      $stmt->bindParam(":email", $email);
      $stmt->bindParam(":password", $has_password);

      if ($stmt->execute()) {
        $alert_message = "Registro exitoso. Ahora puedes iniciar sesión.";
        $alert_class = "alert-success";
      } else {
        $alert_message = "Error en el registro. Intenta nuevamente.";
        $alert_class = "alert-danger alert-dismissible fade show";
      }
    }
  }
}
?>

<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tienda VentaSoft</title>
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
    *{
      font-family: 'Epilogue', sans-serif;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row vh-100 justify-content-center align-items-center">
      <div class="col-auto">
        <div class="text-center">
          <h2>Registrate</h2>
          <img src="https://cdn-icons-png.flaticon.com/128/11284/11284820.png" class="" alt="Registro">
        </div>

        <?php if (!empty($alert_message)) : ?>
          <div class="alert <?php echo $alert_class; ?> alert-dismissible" role="alert">
            <?php echo $alert_message; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>

        <div class="card border-0">
          <div class="card-body">
            <form class="was-validated" action="registrar.php"  method="POST">
              <div class="row mb-3">
                <div class="col">
                  <label for="inputNombre" class="form-label">Primer nombre</label>
                  <input class="form-control" type="text" name="primer_nombre"  aria-label="Primer nombre" />
                  <div class="invalid-feedback">
                    ingresa tu nombre
                  </div>
                </div>
                <div class="col">
                  <label for="inputNombre" class="form-label">Primer Apellido</label>
                  <input type="text" name="primer_apellido" class="form-control" aria-label="Primer Apellido">
                  <div class="invalid-feedback">
                    ingresa tu nombre
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" require>
                <div id="emailHelp" class="form-text">Nunca compartiremos su correo electrónico con nadie más.</div>
                <div class="invalid-feedback">
                    ingresa tu nombre
                  </div>
              </div>
              <div class="mb-3">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword" require>
              </div>
              <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>


</body>

</html>