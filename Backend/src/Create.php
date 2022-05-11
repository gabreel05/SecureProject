<?php
    require "db.php";

    $database = new Database;

    $connection = $database -> connect();
    echo json_encode($connection);
?>
