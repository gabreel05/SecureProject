<?php
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
    $mail->SMTPSecure = 'tls'; 
    $mail->Host = 'smtp.gmail.com'; 
    $mail->Port = 465;

    // Detalhes do envio de E-mail
    $mail->Username = 'email'; 
    $mail->Password = 'senha';
    $mail->SetFrom('okada.gui@gmail.com', 'Guilherme');
    $mail->addReplyTo('no-reply@email.com.br');
    $mail->addAddress('gaguigu321@gmail.com','Gabriel');
    $mail->isHTML(true);
    $mail->Subject = 'Confirmação de cadastro';
    $mail->msgHTML = '<b>HTML! {Nome da pessoa}, obrigado(a) por se cadastrar em nosso site.

    Para receber acesso a todo o conteúdo de estágios, por favor confirme o seu endereço de email clicando no link abaixo.
    
    Confirmar meu email
    
    Obrigado(a) por se inscrever,
    
    {Seu nome/Nome do seu negócio} </b>';

    $mail->AltBody = 'Para visualizar essa mensagem acesse http://site.com.br/mail';
    $mail->addAttachment('/tmp/image.jpg', 'nome.jpg'); //arquivos em anexo

    if(!$mail->send()) {
        echo 'Não foi possível enviar a mensagem.<br>';
        echo 'Erro: ' . $mail->ErrorInfo;
    } else {
        echo 'Mensagem enviada.';
    }
?>
