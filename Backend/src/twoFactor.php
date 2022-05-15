<?php
  include "select.php";
  include "code.php"

  $user = "";
  $email = "";

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
        [NUMBERS]
      </p>
      <p>
        <font size="3" face="Verdana">
        Para concluir insira esta sequencia numérica para concluir o login
      </p>
    </tr>
  ';

    $body = str_replace('[NAME]', $user, $body);
    $body = str_replace('[NUMBERS]', $code, $body);    

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

    $mail = new PHPMailer();
    // Configuração
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
    $mail->CharSet = 'UTF-8';   
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;     
    $mail->SMTPSecure = 'ssl'; 
    $mail->Host = 'smtp.gmail.com'; 
    $mail->Port = 465;
    // Detalhes do envio de E-mail
    $mail->Username = 'expcri2022@gmail.com'; 
    $mail->Password = 'ocornodapuc';
    $mail->SetFrom('expcri2022@gmail.com', 'Equipe Palestrinhas');
    $mail->addAddress($email, $user);
    $mail->Subject = 'Código de confirmação';
    $mail->msgHTML($body);
    
    $mail->send();
?>
 