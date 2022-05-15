<?php
    include "database.php";
    
    $email = $_POST["email"];
    $password = $_POST["passwordHash"];        

    $stmt = $conn -> prepare("SELECT TB_Users.user_email, TB_Users.user_password FROM DB_SecureProject.TB_Users WHERE user_email = :email AND user_password = :password");
    $stmt -> execute(array('email' => $email, 'password' => $password));

    $result = $stmt -> fetchAll();

    if (count($result)) {
        foreach($result as $row) {
            echo json_encode("Conta encontrada");
        }
    } else {
        echo json_encode("Nenhum resultado");
    }
?>
