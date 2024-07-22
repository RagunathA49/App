<?php
class UserSession {
    /*This function will return a session Id if username and password is courrect 
    */
    public static function authenticate($user,$pass) {
        print('hey');
        $username  = User::login($user,$pass);
        $user = new User($username);
        if($username ){
            $conn = Database::getConnection();
            $ip = $_SERVER['REMOTE_ADDR'];
            $agent=  $_SERVER['HTTP_USER_AGENT'];
            $token =md5(rand(0,9999999).$ip.$agent.time());
            $sql ="INSERT INTO `session` (`uid`, `token`, `login_time`, `ip`, `user_agent`, `active`)
            VALUES ('$user->id', '$token', now(), '$ip', '$agent', '1')";
            if($conn->query($sql)){
                Session::set('session_token',$token);
                return $token;
            }else{
                return false; 
            }
        }else{
            return false;
        }
    }
    public function __construct($token){
        $this->conn = Database::getConnection();
        $this->token = $token;
        $this->data = null;
        $sql = "SELECT * FROM  `session` WHERE `token` = '$token' LIMIT 1";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $this->data = $row;
            $this->uid = $row['uid'];
        }else{
            throw new Exception("Session is invalid..");
        }
    }
    public static function authorize($token){
        
    }
    public function getUser(){
        return new User($this->uid);
    }
    public function isValid(){
        
    }
    public function getIP(){
        return $_SERVER['REMOTE_ADDR'];
    }
    public function getUserAgent(){
        RETURN $_SERVER['HTTP_USER_AGENT'];
    }
    public function deactivate()
    {

    }    
}
