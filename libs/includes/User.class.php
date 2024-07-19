<?php


class User
{
    private $conn;
    public function __call($name , $arguments)
    {
        $property = preg_replace("/[^0-9a-zA-Z]/", "", substr($name, 3));
        $property = strtolower(preg_replace('/\B([A-Z])/', '_$1', $property));
        if(substr($name,0,3)=="get"){
            return $this->_get_data($property);
        }elseif(substr($name,0,3)=="set"){
            // print($property.",".$arguments[0]);
            return $this->_set_data($property ,$arguments[0]);
        }
    }
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
        return $error;
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
               return $row['username'];
                
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
        $this->username = $username;
        $this->id = null;
        $sql = "SELECT `id` FROM  `auth` WHERE `username` = '$username' LIMIT 1";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $this->id = $row['id'];
        }else{
            throw new Exception("Username does't exist");
        }
    }
    private function _get_data($var)
    {
        if(!$this->conn){
            $this->conn = Database::getConnection();
        }
        $sql = "SELECT  `$var` FROM `users` WHERE `id` = $this->id";
    
        $result = $this->conn->query($sql);
        if($result and $result->num_rows == 1) {
            $row=$result->fetch_assoc();
            return $row[$var];
        }else{
            return null;
        }
    }
    private function _set_data($var ,$data)
    {
        if(!$this->conn){
            $this->conn = Database::getConnection();
        }
        $sql = "UPDATE  users SET $var = '$data' WHERE id = $this->id";
        // print("<br>".$sql);
        if($this->conn->query($sql)){
            return true;
        }else{
            return false;
        }
    }
    public function setDob($year,$month,$day){
        if(checkdate($month,$day,$year)){
            return $this->__set('dob',"$year.$month.$day");
        }
        else{
            return false;
        }
    }
    public function getUsername(){
        return $this->username;
    }
    public function authenticate()
    {
    }
    // public function setbio()
    // {
    // }
    // public function getbio()
    // {
    // }
    // public function setAvatar()
    // {
    // }
    // public function getAvatar()
    // {
    // }

}
