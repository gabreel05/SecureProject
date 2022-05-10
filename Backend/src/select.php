<?php
    include "database.php";
    
            
    $stmt = $conn -> prepare("SELECT * FROM DB_SecureProject.TB_Users WHERE user_name = :name");
    $stmt -> execute(array("name" => $name));

    $data = $conn -> query("SELECT * FROM DB_SecureProject.TB_Users WHERE user_name = " . $conn -> quote($name));

    while ($row = $stmt -> fetch()) {
        echo json_encode($row);
    }
?>
