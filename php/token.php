<?php
  session_start();

  $email = $_POST['email'];

  $_SESSION['email'] = $email;

  echo json_encode($email);

  echo json_encode($_SESSION['email']);
?>
