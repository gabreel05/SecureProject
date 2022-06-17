<?php
    session_start();

    if (!isset($_SESSION["session_name"])) {
        echo json_encode("Não tem sessão");
    }
?>
