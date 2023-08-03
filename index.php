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
						$alert_message = "Inicio de sesión exitoso";
						$alert_class = "alert-success";
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row vh-100 justify-content-center align-items-center">
      <div class="col-auto">
        <div class="text-center">
          <h2>Inicio sesión</h2>
          <img src="https://cdn-icons-png.flaticon.com/128/9706/9706636.png" class="" alt="Inicio sesión">
        </div>

        <?php if (!empty($alert_message)): ?>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>