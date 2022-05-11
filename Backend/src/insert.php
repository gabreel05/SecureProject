<?php
    include "database.php";

    $name = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $endereco = $_POST["endereco"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $senha = $_POST["password_hash"];
    $sexo = $_POST["sexo"];
    $pais = $_POST["pais"];

    $data = $conn -> query("INSERT INTO DB_SecureProject.TB_Users
        (user_name, user_document, user_email, user_phone, user_gender, user_password, user_country)
        VALUES ('$name', '$cpf', '$email', '$telefone', '$sexo', '$senha', '$pais')");

    if ($data) {
        echo("Inseriu!");
    } else {
        echo("Não inseriu!");
    }
?>
