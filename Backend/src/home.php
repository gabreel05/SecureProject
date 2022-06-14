<?php
    // include "crypto.php";

    // $message = decrypt($_POST["message"]);

    // echo $message["creationTime"];
    // echo("\n" . $message["expirationTime"]);

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        
        // $creationTime = $message["creationTime"];
        // $expirationTime = $message["expirationTime"];
        
        $_SESSION['session_id'] = session_id();
        $_SESSION['session_name'] = "Palestrinhas";
        $_SESSION['creation_date'] = time();
        $_SESSION['expiration_date'] = $_SESSION['creation_date'] + 60;
        echo json_encode("Sessão criada");
    } else {
        if (isset($_SESSION)) {
            if (time() > $_SESSION["expiration_date"] || !isset($_SESSION)) {
                session_destroy();
                echo json_encode("Sessão expirada");
            }
        } else {
            session_destroy();
            echo json_encode("Sessão expirada");
        }
        
    }
?>
