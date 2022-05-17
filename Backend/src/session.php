<?php
    session_start();

    $_SESSION['session_id'] = session_id();
    $_SESSION['session_name'] = session_name();
    $_SESSION['creation_date'] = time();
    $_SESSION['expiration_date'] = $_SESSION['creation_date'] + 10;

    echo json_encode("Sessão criada");
?>
