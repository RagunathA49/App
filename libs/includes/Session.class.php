<?php
Class Session {
    public static function start(){
        session_start();
    }
    public static function unset(){
        session_unset();
    }
    public static function destroy(){
        session_destroy();
        /* If usersession active  turn to inactive\
            if yes, construct usersession and see if its successful.
            check if the session is valid one 
            if valid, print "Session validated"
            Else, print "Invalid Session" and ask user to login.
        */
    }
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    public static function del($key){
        unset($_SESSION[$key]);
    }
    public static function isset($key){
        return isset($_SESSION[$key]);
    }
    public static function get($key,$default = false) {
        if(Session::isset($key))
        {
            return $_SESSION[$key];
        }
        else{
            return $default;
        }
    }
}