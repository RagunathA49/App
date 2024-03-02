<?php

$pass = isset($_GET['pass']) ? $_GET['pass'] : "RandomPasswordThatIsSecure";

echo(md5($pass));

$data = "hello";

foreach(hash_algos() as $algo){
    $r = hash($algo, $data);
    printf("%-12s %3d %s\n",$algo, strlen($r), $r);
}