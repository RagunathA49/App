<?php

include_once 'includes/Mic.class.php';
include_once 'includes/Database.class.php';
include_once 'includes/User.class.php';
include_once 'includes/Session.class.php';

Session::start();
function load_template($name)
{
    // echo __DIR__;
    // echo __DIR__."/../templates/$name.php";
    // echo $_SERVER['DOCUMENT_ROOT']."/app/_templates/$name.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/app/_templates/$name.php";
};


function validate_credentials($username, $password)
{
    if ($username == "ragu@gmail.com" and $password == "password") {
        return true;
    } else {
        return false;
    }
}
function signup($user, $pass, $email, $phone)
{
    $conn = Database::getConnection();
    // $sql = "INSERT INTO MyGuests (firstname, lastname, email)
    // VALUES ('John', 'Doe', 'john@example.com')";
    $sql = "INSERT INTO `auth` (`username`, `password`, `email`, `phone`, `blocked`, `active`)
    VALUES ('$user', '$pass', '$email', '$phone', '0', '1')";
    $error = false;
    if ($conn->query($sql) === true) {
        $error = true;
    } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
        $error = $conn->error;
    }
    $conn->close();
    return $error ;

}

