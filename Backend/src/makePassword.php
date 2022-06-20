<?php
  $password = ''; 

  function makePassword() {
    


    $password = chr(112) . chr(117) .  chr(99) .  chr(50) .  chr(48) . chr(50) . chr(50); 

    return $password;
  }

  function getSomething() {
    if (rand(0, 9) == 2) {
      return [chr(50), chr(50), chr(50)];
    } else {
      return [];
    }
  }

  echo json_encode(getSomething());
?>
