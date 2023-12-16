<?php
class Session {
    function __construct(){
        session_start();
    }

    function setSession($key, $value){
        $_SESSION[$key] = $value;
    }

    function unsetSession($key){ // unset a specific session
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    function getSessionData($key){
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    function destroySessions(){ // destroy all session
        session_destroy();
    }

}