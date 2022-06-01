<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

    try {
        $conn = new PDO("mysql:host=localhost:3306;dbName=DB_SecureProject", "root", "");
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $email = $_POST["email"];
        $password = $_POST["password"];

        $stmt = $conn -> prepare("SELECT TB_Users.user_email, TB_Users.user_password, TB_Users.user_name 
            FROM DB_SecureProject.TB_Users WHERE user_email = :email AND user_password = :password");
        $stmt -> execute(array("email" => $email, "password" => $password));

        $result = $stmt -> fetchAll();

        if (count($result)) {
            echo json_encode("Conta encontrada");
        } else {
            echo json_encode("Nenhum resultado");
        }
        
        $code = rand(100000, 999999);
        $user = "";

        foreach($result as $row) {
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
                Para concluir insira esta sequencia numerica para concluir o login
              </p>
            </tr>
        ';

        $body = str_replace('[NAME]', $user, $body);
        $body = str_replace('[NUMBERS]', $code, $body);

        $mail = new PHPMailer();
        
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        $mail->CharSet = 'UTF-8';   
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;     
        $mail->SMTPSecure = 'ssl'; 
        $mail->Host = 'smtp.gmail.com'; 
        $mail->Port = 465;
        
        $mail->Username = 'expcri2022@gmail.com'; 
        $mail->Password = 'ocornodapuc';
        $mail->SetFrom('expcri2022@gmail.com', 'Equipe Palestrinhas');
        $mail->addAddress($email, $user);
        $mail->Subject = "Código de confirmação";
        $mail->msgHTML($body);
        
        $mail->send();
    } catch (PDOException $e) {
        echo json_encode("Erro: " . $e -> getMessage());
    }
?>
