<?php
    include "database.php";
    include "crypto.php";

    $message = decrypt($_POST["message"]);

    $name = $message["name"];
    $document = $message["document"];
    $address = $message["address"];
    $phone = $message["phone"];
    $email = $message["email"];
    $password = $message["password"];
    $gender = $message["gender"];
    $vacancyType = $message["vacancyType"];

    $data = $conn -> query("INSERT INTO DB_SecureProject.TB_Users
        (user_name, user_document, user_email, user_phone, user_gender, user_password, vacancy_type_id)
        VALUES ('$name', '$document', '$email', '$phone', '$gender', '$password', '$vacancyType')");

    if ($data) {
        echo json_encode("Data inserted successfuly");
    } else {
        echo json_encode("Data not inserted");
    }
?>
