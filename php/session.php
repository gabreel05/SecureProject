<?php
    session_start();

    setcookie(session_name(), '', time(), '/');

    print_r($_SESSION);
?>
