<?php
    $data = $_POST['data'];
    
    $timeSession = 60 * 60;
    session_set_cookie_params($timeSession);
    session_start();

    $_SESSION['email'] = $data;
    $_SESSION['session_id'] = session_id();
    $_SESSION['session_name'] = session_name();

    setcookie(session_name(), '', time(), '/');

    print_r($_SESSION);
?>
