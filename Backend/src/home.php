<?php
    if (session_status() == PHP_SESSION_NONE) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            
            $creationTime = $_POST["expirationDate"];
            $expirationTime = $_POST["expirationDate"];
            
            $_SESSION['session_id'] = session_id();
            $_SESSION['session_name'] = "Palestrinhas";
            $_SESSION['creation_date'] = $creationTime;
            $_SESSION['expiration_date'] = $expirationTime;

            echo json_encode("Sessão criada");
        } else {
            if (isset($_SESSION)) {
                if (time() > $_SESSION["expiration_date"] || !isset($_SESSION)) {
                    session_destroy();
                    echo json_encode("Sessão expirada1");
                }
            } else {
                session_destroy();
                echo json_encode("Sessão expirada2");
            }
            
        }
    } else {
        echo json_encode("Sessão expirada3");
    }
    // if (isset($_POST["TOKEN"])) {
    //     if ($_POST["TOKEN"] != null && $_POST["TOKEN"] != "") {
    //         if (session_status() == PHP_SESSION_NONE) {
    //             session_start();
                
    //             $creationTime = $_POST["creationDate"];
    //             $expirationTime = $_POST["expirationDate"];
                
    //             $_SESSION['session_id'] = session_id();
    //             $_SESSION['session_name'] = session_name();
    //             $_SESSION['creation_date'] = $creationTime;
    //             $_SESSION['expiration_date'] = $expirationTime;
    
    //             echo json_encode("Sessão criada");
    //         } else {
    //             if (isset($_SESSION)) {
    //                 if (time() > $_SESSION["expiration_date"] || !isset($_SESSION)) {
    //                     session_destroy();
    //                     echo json_encode("Sessão expirada");
    //                 }
    //             } else {
    //                 session_destroy();
    //                 echo json_encode("Sessão expirada");
    //             }
                
    //         }
    //     }
    // } else {
    //     echo json_encode(isset($_SESSION));
    //     // if (session_status() == PHP_SESSION_NONE) {
    //     //     echo json_encode("Não vem do e-mail");
    //     // } else if (session_status() == PHP_SESSION_ACTIVE) {
    //     //     echo json_encode("Sessão criada");
    //     // }
    //     // session_start();
        
    //     // if ($_SESSION["creationDate"]) {
    //     //     echo json_encode("Sessão criada");
    //     // } else {
    //     //     session_destroy();
    //     //     echo json_encode("Não vem do e-mail");
    //     // }
    // }
?>
