<?php
  
  $api_secret = 'VQkQX9qfc7brhQEVT61zi71vDOa6bnbTA1etOYVOEAcZdprKsdhfszlLwQmURNCMJPSjX82iT7QEMyej5crVl6SZXqXfBGfiS8zPQQPc31XZk8Qxl6sI0jojHKbk234i';

  function generateSecurePassword($password)
  {
      global $api_secret;
      return password_hash($password . $api_secret, PASSWORD_BCRYPT);
  }
?>