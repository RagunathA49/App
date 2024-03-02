<?php
$time = microtime(true);
$option = [
    'cost' =>9,
];
echo password_hash("ragunath.a",PASSWORD_BCRYPT,$option)."\n";

if (password_verify("ragunath.a",'$2y$09$RFMH63vm/BQ96HgIV4SP5uZy9pyv9V6gjYEhTJ8thfQejYZlBlpfm')){
    print("correct");
}
else{
    print("Nope");
}
echo "Took ".(microtime(true)-$time) . " sec"."\n";