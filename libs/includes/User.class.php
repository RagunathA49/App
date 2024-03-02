<?php


class User
{
    private $conn;
    public static function signup($user, $pass, $email, $phone)
    {
        $option = [
            'cost' => 9,
        ];
        $pass=password_hash($pass,PASSWORD_BCRYPT,$option);
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
    public static function login($user, $pass)
    {

        $conn = Database::getConnection();
        $sql = "SELECT * FROM `auth` WHERE `username` = '$user'";
        $result = $conn->query($sql);
        if($result->num_rows == 1) 
        {
            $row= $result->fetch_assoc();
            // $row['password']== $pass
            if(password_verify($pass,$row['password']))
            {
                return $row;
            }
            else{
                return false;
            }
        }else{
            return false;
        }
    }
    public function __construct($username)
    {
        $this->conn = Database::getConnection();

    }
    public function authenticate()
    {
    }
    public function setbio()
    {
    }
    public function getbio()
    {
    }
    public function setAvatar()
    {
    }
    public function getAvatar()
    {
    }

}
