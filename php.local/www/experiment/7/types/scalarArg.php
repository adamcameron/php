<?php

require __DIR__ . "/safeRun.php";

function takesInt(int $i){
    return $i;
}

safeRun("Passing an int", function(){
    $i = 1;
    takesInt($i);
});

safeRun("Passing a float", function(){
    $f = 1.1;
    takesInt($f);
});

safeRun("Passing a boolean", function(){
    $b = true;
    takesInt($b);
});

safeRun("Passing a string", function(){
    $s = "1";
    takesInt($s);
});

safeRun("Passing a PHP object", function(){
    $d = new DateTime();
    takesInt($d);
});

class C {}
safeRun("Passing a bespoke object", function(){
    $o = new C();
    takesInt($o);
});