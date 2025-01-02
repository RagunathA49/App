<?php

include 'libs/load.php';

$user  = "hacker";
$pass = "hacker1234";
$result = null;
if(isset($_GET['logout'])){
    Session::destroy();
    die("Session destroyed <br><br><a href='logintest.php'>Login Again</a>");
}   
/*
1. Check if session_token in the PHP session is available
2. If yes, construct UserSession and see if it's successful
3. Check if the session is a valid one
4. If valid, print "Session validated"
5. Else, print "Invalid Session" and ask the user to log in.
 */
if (Session::get('is_loggedin')){
    $username = Session::get('session_username');
    // print_r("\n check mate".$username);
    $userobj = new User($username);
    // print_r($userobj);
    print("Welcome Back,".$userobj->getFirstname());
    print("<br>".$userobj->getBio());
    $userobj->setBio("hacker think ur are noob");
    print("<br>".$userobj->getBio());
}else{
    print("No session found, trying to login now.<br>");
    $result = User::login($user, $pass);
    // print_r("check".$result);
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