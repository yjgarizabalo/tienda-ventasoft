<?php
require 'config.php';
require 'api_secret.php';

$alert_message = "";
$alert_class = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = trim($_POST["email"]);
  $password = trim($_POST["password"]);

  $consultas = "SELECT id, password FROM personas WHERE email = :email";
  $stmt = $conn->prepare($consultas);
  $stmt->bindParam(":email", $email);
  $stmt->execute();

  if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $user_id = $row['id'];
    $hashed_password = $row['password'];

    if (password_verify($password . $api_secret, $hashed_password)) {
      session_start();
      $_SESSION["user_id"] = $user_id;
      $alert_message = "Inicio de sesión exitoso";
      $alert_class = "alert-success";
      header("Location: home.php");
      exit();
    } else {
      $alert_message = "Credenciales inválidas";
      $alert_class = "alert-danger";
    }
  } else {
    $alert_message = "Credenciales inválidas";
    $alert_class = "alert-danger";
  }
}
?>


<!doctype html>
<html lang="en">

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
    * {
      font-family: 'Epilogue', sans-serif;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row vh-100 justify-content-center align-items-center">
      <div class="col-auto">
        <div class="text-center">
          <h2>Inicio sesión</h2>
          <img src="https://cdn-icons-png.flaticon.com/128/9706/9706636.png" class="" alt="Inicio sesión">
        </div>

        <?php if (!empty($alert_message)) : ?>
          <div class="alert <?php echo $alert_class; ?> alert-dismissible" role="alert">
            <?php echo $alert_message; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>

        <div class="card border-0">
          <div class="card-body">
            <form action="index.php" method="POST">
              <div class="mb-3">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Nunca compartiremos su correo electrónico con nadie más.</div>
              </div>
              <div class="mb-3">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword">
              </div>
              <!-- <div class="mb-3 form-check">
                <input type="checkbox"  class="form-check-input" id="check1">
                <label class="form-check-label" for="check1">Recuerdame</label>

              </div> -->
              <button type="submit" class="btn btn-primary">Iniciar Sesión</button>

              <div class="mt-3">
                <span>Aun no estas registado? <a class="link-primary" href="registrar.php">Registrate aqui!</a></span>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>