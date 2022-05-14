<?php
    include "database.php";

    $name = $_POST["name"];
    $document = $_POST["document"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["passwordHash"];
    $gender = $_POST["gender"];
    $country = $_POST["country"];

    $data = $conn -> query("INSERT INTO DB_SecureProject.TB_Users
        (user_name, user_document, user_email, user_phone, user_gender, user_password, user_country)
        VALUES ('$name', '$document', '$email', '$phone', '$gender', '$password', '$country')");

    if ($data) {
        echo("Inseriu!");
    } else {
        echo("Não inseriu!");
    }
?>
