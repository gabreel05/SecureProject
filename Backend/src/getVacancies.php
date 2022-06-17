<?php
    include "database.php";

    $stmt = $conn -> prepare("SELECT TB_Vacancies.vacancy_brand, TB_Vacancies.vacancy_description 
        FROM DB_SecureProject.TB_Vacancies ORDER BY vacancy_creation DESC");
    $stmt -> execute();

    $result = $stmt -> fetchAll();

    echo json_encode($result);
?>
