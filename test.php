<pre>
<?php
include_once 'libs/load.php';
// echo $_SERVER['PHP_SELF'];
// print_r($_SERVER);
// print_r($_GET);
// print_r($_POST);

$mic1 = new Mic("ragu"); //constructing the object
$mic2 = new Mic("prabu"); //constructing the object

print($mic1->getbrand());
print($mic2->getbrand());

Mic::testfunction();
print("<br>");
$mic1->getvoltage("hello",array(1,2,3,4,5));
$mic1->setupvol("hi", new Mic("cast"));
?>
</pre>




