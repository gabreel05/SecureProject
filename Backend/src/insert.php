<?php
    include "database.php";

    $data = $conn -> query("INSERT INTO DB_SecureProject.TB_Users VALUES () = " . $conn -> quote($name));

    $data = $conn -> query("SELECT * FROM DB_SecureProject.TB_Users WHERE user_name = " . $conn -> quote($name));
?>
