<pre>
<?php
include 'libs/load.php';

print_r("_Session\n");
print_r($_SESSION);

if(isset($_GET['clear'])){
    printf("Cleaing...\n");   
    Session::unset();
}
if(isset($_GET['destroy'])){
    printf("Destroyed..\n");   
    Session::destroy();
}
if (Session::isset('a')){
    printf("A already exists.. Values :".Session::get('a')."\n");
}
else{
    Session::set('a' ,time());
    printf("Assigning new values...value :".Session::get('a'));
}

?>
