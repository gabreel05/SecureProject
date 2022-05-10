<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require '../Lib/PHPMailer-master/src/Exception.php';
    require '../Lib/PHPMailer-master/src/PHPMailer.php';
    require '../Lib/PHPMailer-master/src/SMTP.php';
    $mail = new PHPMailer();
    // Configuração
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
    $mail->IsSMTP(); 
    $mail->CharSet = 'UTF-8';   
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;     
    $mail->SMTPSecure = 'ssl'; 
    $mail->Host = 'smtp.gmail.com'; 
    $mail->Port = 465;
    // Detalhes do envio de E-mail
    $mail->Username = 'email'; 
    $mail->Password = 'senha';
    $mail->SetFrom('okada.gui@gmail.com', 'Guilherme');
    $mail->addAddress('gaguigu321@gmail.com','Gabriel');
    $mail->Subject = 'Test';
    $mail->msgHTML('Teste');
    $mail->send();
?>
