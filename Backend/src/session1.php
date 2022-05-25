<?php
    class Session {
        private $hasSession;

        function getHasSession() {
            return $this -> hasSession;
        }

        function setHasSession($hasSession) {
            $this -> hasSession = $hasSession;
        }

        function startSession($createdAt, $expirationAt) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();

                $_SESSION["session_id"] = session_id();
                $_SESSION["session_name"] = session_name();
                $_SESSION["created_at"] = $createdAt;
                $_SESSION["expiration_at"] = $expirationAt;
            } else {
                if (isset($_SESSION)) {
                    if (time() > $_SESSION["expiration_at"]) {
                        session_unset();
                        session_destroy();
                    }
                } else {
                    session_unset();
                    session_destroy();
                }
            }
        }
    }
?>
