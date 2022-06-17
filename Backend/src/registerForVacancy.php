<?php
    include "database.php";

    session_start();

    $user_id = $_SESSION["user"];
    $vacancy_id = $_POST["vacancy"];

    $data = $conn -> query("INSERT INTO DB_SecureProject.TB_User_Vacancies (user_id, vacancy_id)
        VALUES ('$user_id', '$vacancy_id')");

    if ($data) {
        echo json_encode("Data inserted successfuly");
    } else {
        echo json_encode("Data not inserted");
    }
?>
