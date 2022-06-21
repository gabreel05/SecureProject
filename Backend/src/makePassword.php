<?php
  include "getArray.php";

  $passwordArray = [];

  function makePassword() {
    $passwordArray = [chr(112), chr(117), chr(99), getArray()[2], chr(48), getArray()[0], getArray()[1]];

    $password = implode(",", $passwordArray);
    $password = str_replace(',', '', $password);

    return $password;
  }
?>
