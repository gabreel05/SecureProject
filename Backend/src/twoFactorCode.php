<?php
  include "code.php";


  $userCode = $_GET['code'];

  $code = generateCode();


  echo json_encode($userCode);
  echo json_encode($code);
  echo json_encode($_GET);
?>
