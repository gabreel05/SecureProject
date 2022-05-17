<?php
    session_destroy();
    
    echo json_encode($_SESSION);
?>
