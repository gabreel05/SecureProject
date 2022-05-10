<?php

$usuario = $_POST["usuario"];
//$senha = $_POST["senha"];
//echo json_encode("retorno:".$usuario);

$code = rand(100000, 999999);

$body = '<tr>
    <p>
    <font size="3" face="Verdana">
    Olá, [NOME]! </p>
</tr>
<tr>
    <p>
    <font size="3" face="Verdana">
        Palestrinhas agradece pelo seu login.
    </p>

    <p>
    <font size="3" face="Verdana">
    [NUMEROS]
    </p>

    <p>
    <font size="3" face="Verdana">
    Para concluir insira esta sequencia numerica para concluir o login
    </p>

</tr>';

$body = str_replace('[NOME]', $usuario, $body);
$body = str_replace('[NUMEROS]', $code, $body);


$body = str_replace('[NOME]', $usuario, $body);

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
$mail->SMTPDebug = 2;
$mail->SMTPAuth = true;     
$mail->SMTPSecure = 'ssl'; 
$mail->Host = 'smtp.gmail.com'; 
$mail->Port = 465;

// Detalhes do envio de E-mail
$mail->Username = 'expcri2022@gmail.com'; 
$mail->Password = 'ocornodapuc';
$mail->SetFrom('expcri2022@gmail.com', '');
$mail->addReplyTo('no-reply@email.com.br');
$mail->addAddress('okada.gui@gmail.com', '');
$mail->isHTML(true);
$mail->Subject = 'Confirmação de cadastro';
$mail->Body = "Conteúdo da Mensagem <b>HTML!</b>";


$mail->msgHTML = ("Mensagem");

// $mail->addAttachment('/tmp/image.jpg', 'nome.jpg'); //arquivos em anexo

$mail->send();
   
?>