<?php
    include "database.php";

    $stmt = $conn -> prepare("SELECT DISTINCT TB_Vacancies.vacancy_brand, TB_Vacancies.vacancy_description
	    FROM DB_SecureProject.TB_Vacancies, DB_SecureProject.TB_Users
        WHERE TB_Vacancies.vacancy_type_id = TB_Users.vacancy_type_id");
    $stmt -> execute();

    $result = $stmt -> fetchAll();

    echo json_encode($result);
?>
