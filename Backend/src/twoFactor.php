<?php
  include "select.php";
  include "sendEmail.php";

  $email = "";
  $user = "";

  foreach($result as $row) {
    $email = $row[0];
    $user = $row[2];
  }

  $body = '
    <tr>
      <p>
        <font size="3" face="Verdana">
        Olá, [NAME]! 
      </p>
      </tr>
      <tr>
      <p>
        <font size="3" face="Verdana">
        Palestrinhas agradece pelo seu login.
      </p>
      <p>
        <font size="3" face="Verdana">
        <a href="http://localhost/SecureProject/Frontend/Modules/Home/home.html?isFromTwoFactor=true">Para concluir o login, clicke aqui</a>
      </p>
    </tr>
  ';

    $body = str_replace('[NAME]', $user, $body);

    sendEmail($email, $user, 'Código de confirmação', $body);
?>
