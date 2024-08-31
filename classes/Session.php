<?php

namespace classes;

class Session
{
    public function __construct()
    {
        session_start();
    }

    public function setSession($key , $value)
    {
        return $_SESSION[$key] = $value;
    }
    public function getSession($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : false;
    }

    public function unsetSession($key){
        if(isset($_SESSION[$key])){
            unset($_SESSION[$key]);
        }
    }

    public  function destroySession(){
        session_destroy();
    }
}