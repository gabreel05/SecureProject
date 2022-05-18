<?php
    session_start();



    // // echo json_encode($_SESSION);

    // echo json_encode(session_status());

    // echo json_encode($_SESSION);

    if (!isset($_SESSION["session_name"])) {
        echo json_encode("Não tem sessão");
    }
?>
