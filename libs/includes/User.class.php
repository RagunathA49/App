<?php


class User{
    private $conn;
    public static function signup($user,$pass,$email,$phone)
    {
        $conn = Database::getConnection();
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
    public function __construct($username)
    {
        $this->conn = Database::getConnection();
        
    }

}