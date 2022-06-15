<?php
    include "database.php";

    $stmt = $conn -> prepare("SELECT TB_Vacancies.vacancy_brand, TB_Vacancies.vacancy_description 
        FROM DB_SecureProject.TB_Vacancies");
    $stmt -> execute();

    $result = $stmt -> fetchAll();
    $count = count($result);

    echo json_encode($result);
?>
