<?php
    include "database.php";
    
    $emailInput = $_POST["emailInput"];
    $passwordInput = $_POST["password_hash"];        

    $stmt = $conn -> prepare("SELECT TB_Users.user_email FROM DB_SecureProject.TB_Users WHERE user_email = :email AND user_password = :password");
    $stmt -> execute(array('email' => $emailInput, 'password' => $passwordInput));

    $result = $stmt -> fetchAll();

    if (count($result)) {
        foreach($result as $row) {
            echo json_encode($row);
        }
    } else {
        echo json_encode("Nenhum resultado!");
    }
    // while ($row = $stmt -> fetch()) {
    //     echo json_encode($row);
    // }
?>
