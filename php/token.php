<?php
  

  $timeSession = 60 * 60;
  
  session_set_cookie_params($timeSession);
  session_start();

  $_SESSION['email'] = $_POST['email'];
?>
