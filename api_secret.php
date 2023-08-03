<?php
  
  $api_secret = 'Dioselreydetuvida';

  function generateSecurePassword($password)
  {
      global $api_secret;
      return password_hash($password . $api_secret, PASSWORD_BCRYPT);
  }
?>