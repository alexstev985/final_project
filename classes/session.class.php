<?php

class Session {
    static public function SessionStart () {
        session_start();
    }

    static public function createSession($email) {
        $_SESSION['user_email'] = $email;
    }
    
    static public function userNotLogged() {
        if(!isset($_SESSION['user_email'])) {
            header("Location: index.html");
        }
    }

    static public function userLogged() {
        if(isset($_SESSION['user_email'])) {
            header("Location: shop.php");
        }
    }

    static public function logout () {
        session_unset();
        session_destroy();

        header("Location: index.html");
    }
}


?>