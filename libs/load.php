<?php

function load_template($name){
    // echo __DIR__;
    // echo __DIR__."/../templates/$name.php";
    // echo $_SERVER['DOCUMENT_ROOT']."/app/_templates/$name.php";
    include $_SERVER['DOCUMENT_ROOT']."/app/_templates/$name.php";
};


function validate_credentials($username, $password){
if ($username == "ragu@gmail.com" and $password == "password") {
    return true;
}else{
        return false;
    }
}