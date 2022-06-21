<?php
    include "makePassword.php";

    try {
        $conn = new PDO("mysql:host=localhost:3306;dbName=DB_SecureProject", "root", makePassword());
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOExpection $e) {
        echo json_encode("Error: " . $e -> getMessage());
    }
?>
