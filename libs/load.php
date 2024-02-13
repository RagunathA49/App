<?php

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
    $servername = "mysql.selfmade.ninja";
    $username = "Ragunath";
    $password = "Rkdevil49*";
    $dbname = "Ragunath_newdb";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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
