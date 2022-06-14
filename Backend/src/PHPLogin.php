<?php
    include "crypto.php";
    include "database.php";

    $message = decrypt($_POST["message"]);

    $email = $message["email"];
    $password = $message["password"];
    $captcha = $message["captcha"];

    $secret = "6Lfv120gAAAAADhJr9sIOKMjsRLG8LlOuEt-i3c6";

    $response = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$captcha));

    $stmt = $conn -> prepare("SELECT TB_Users.user_email, TB_Users.user_password, TB_Users.user_name 
        FROM DB_SecureProject.TB_Users WHERE user_email = :email AND user_password = :password");
    $stmt -> execute(array("email" => $email, "password" => $password));

    $result = $stmt -> fetchAll();

    if ($response -> success == true) {
        if (count($result)) {
            echo json_encode("Conta encontrada");
        } else {
            echo json_encode("Nenhum resultado");
        }
    } else {
        echo json_encode("Por favor responda o reCAPTCHA corretamente");
    }
?>
