<?php
    $email = $_POST['email'];

    $expiration_time = 10;

    session_start();

    $_SESSION['email'] = $email;
    $_SESSION['session_id'] = session_id();
    $_SESSION['session_name'] = session_name();
    $_SESSION['creation_date'] = time();
    $_SESSION['expiration_date'] = $_SESSION['creation_date'] + $expiration_time;

    if (session_id() != $_SESSION['session_id']) {
        echo json_encode("dihsaudhasu")
        exit;
    }

    print_r($_SESSION);
?>
