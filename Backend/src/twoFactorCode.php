<?php
  include "code.php";

  $userCode = $_GET['code'];

  $code = CodeGenerator::generateCode();

  echo json_encode($userCode);
  echo json_encode($code);
?>
