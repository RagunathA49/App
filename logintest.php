<?php

include 'libs/load.php';

$user  = "ragunath";
$pass = "password";
$result = null;
if(isset($_GET['logout'])){
    Session::destroy();
    die("Session destroyed <br><br><a href='logintest.php'>Login Again</a>");
}   
if (Session::get('is_loggedin')){
    $username = Session::get('session_username');
    $userobj = new User($username);
    print("Welcome Back,".$userobj->getFirstname());
    print("<br>".$userobj->getBio());
    $userobj->setBio("Making new things...");
    print("<br>".$userobj->getBio());
}else{
    print("No session found, trying to login now.<br>");
    $result = User::login($user, $pass);
    if($result) {
        $userobj = new User($user);
        echo "Login successful!",$userobj->getUsername();
        Session::set('is_loggedin', true);
        Session::set('session_username', $result);
    } else {
        echo "Login failed!, $user";
    }
}
echo <<<EOF
<br><br><a href="logintest.php?logout">Logout</a>
EOF;