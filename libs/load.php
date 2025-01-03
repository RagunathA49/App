<?php

include_once 'includes/Mic.class.php';
include_once 'includes/Database.class.php';
include_once 'includes/User.class.php';
include_once 'includes/Session.class.php';
include_once 'includes/UserSession.class.php';
global $_site_config;
// global $__base_path;

$_site_config = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/../photogramconfig.json');
// $__base_path=get_config('base_path');
Session::start();
function get_config($key,$default = null) {
    global $_site_config;
    $array = json_decode($_site_config, true);
    if(isset($array[$key]))
    {
        return $array[$key];
    }else{
        return $default;
    }
}


function load_template($name)
{
    // echo __DIR__;
    // echo __DIR__."/../templates/$name.php";
    // echo $_SERVER['DOCUMENT_ROOT']."/app/_templates/$name.php";
    include $_SERVER['DOCUMENT_ROOT'] .get_config('base_path')."_templates/$name.php";
};


// function validate_credentials($username, $password)
// {
//     if ($username == "ragu@gmail.com" and $password == "password") {
//         return true;
//     } else {
//         return false;
//     }
// }
// function signup($user, $pass, $email, $phone)
// {
//     $conn = Database::getConnection();
//     // $sql = "INSERT INTO MyGuests (firstname, lastname, email)
//     // VALUES ('John', 'Doe', 'john@example.com')";
//     $sql = "INSERT INTO `auth` (`username`, `password`, `email`, `phone`, `blocked`, `active`)
//     VALUES ('$user', '$pass', '$email', '$phone', '0', '1')";
//     $error = false;
//     if ($conn->query($sql) === true) {
//         $error = true;
//     } else {
//         // echo "Error: " . $sql . "<br>" . $conn->error;
//         $error = $conn->error;
//     }
//     $conn->close();
//     return $error ;

// }

