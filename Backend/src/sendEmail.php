<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'PHPMailer-master/src/Exception.php';
  require 'PHPMailer-master/src/PHPMailer.php';
  require 'PHPMailer-master/src/SMTP.php';

  function sendEmail($email, $user, $subject, $body) {
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
    $mail->Subject = $subject;
    $mail->msgHTML($body);
    
    $mail->send();
  }
?>
