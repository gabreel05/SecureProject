<?php
    print_r($_SESSION['email']);

    if (empty($_SESSION['email'])) {
        header('Location: ../pages/login.html', true, 301);
        exit();
    }

    // if (time() >  $_SESSION['expiration_date']) {
    //     setcookie(session_name(), "", 0, "/");
        
    //     session_unset();
    //     session_destroy();

    //     header('Location: www.google.com');
    //     exit();
    // }
?>
