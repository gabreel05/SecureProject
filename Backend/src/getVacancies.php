<?php
    include "database.php";

    $stmt = $conn -> prepare("SELECT TB_Vacancies.vacancy_id, TB_Vacancies.vacancy_brand, TB_Vacancies.vacancy_description 
        FROM DB_SecureProject.TB_Vacancies 
        WHERE TB_Vacancies.vacancy_id NOT IN 
        (SELECT TB_Vacancies.vacancy_id 
            FROM DB_SecureProject.TB_Vacancies, DB_SecureProject.TB_User_Vacancies 
            WHERE TB_Vacancies.vacancy_id = TB_User_Vacancies.vacancy_id)
        ORDER BY vacancy_creation DESC");
    $stmt -> execute();

    $result = $stmt -> fetchAll();

    echo json_encode($result);
?>
