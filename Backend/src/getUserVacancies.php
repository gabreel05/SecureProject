<?php
  include "database.php";

  session_start();

  $user_id = $_SESSION["user"];

  $stmt = $conn -> prepare("SELECT TB_Vacancies.vacancy_brand, TB_Vacancies.vacancy_description
	FROM DB_SecureProject.TB_Users, DB_SecureProject.TB_Vacancies, DB_SecureProject.TB_User_Vacancies
    WHERE TB_Vacancies.vacancy_id = TB_User_Vacancies.vacancy_id
    AND TB_Users.user_id = :user_id");
  $stmt -> execute(array("user_id" => $user_id));

  $stmt -> execute();

  $result = $stmt -> fetchAll();

  echo json_encode($result);
?>
