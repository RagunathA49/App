<?php

include 'libs/load.php';

$user  = "ragu";
$pass = "12345";
$result = null;
if(isset($_GET['logout'])){
    Session::destroy();
    die("Session destroyed <br><br><a href='logintest.php'>Login Again</a>");
}   
if (Session::get('is_loggedin')){
    $userdata = Session::get('session_user');
    print("Welcome Back, $userdata[username]");
    $result = $userdata;
}else{
    print("No session found, trying to login now.<br>");
    $result = User::login($user, $pass);
    if($result) {
        echo "Login successful! , $result[username]";
        Session::set('is_loggedin', true);
        Session::set('session_user', $result);
    } else {
        echo "Login failed!";
    }
}
echo <<<EOF
<br><br><a href="logintest.php?logout">Logout</a>
EOF;