<?php
  include "select.php";
  include "sendEmail.php";

  $email = "";
  $user = "";

  foreach($result as $row) {
    $email = $row[0];
    $user = $row[2];
  }

  $code = rand(100000, 999999);

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
    [NUMBERS]
  </p>
  <p>
    <font size="3" face="Verdana">
    Para concluir insira esta sequencia numerica para concluir o login
  </p>
</tr>
  ';

    $body = str_replace('[NAME]', $user, $body);
    $body = str_replace('[BODY]', $code, $body);

    sendEmail($email, $user, 'Código de confirmação', $body);
?>
