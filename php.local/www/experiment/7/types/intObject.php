<?php
// intObject.php

require __DIR__ . "/safeRun.php";

class int {}

function takesInt(int $i){
    return $i;
}

safeRun("Passing an int (object)", function(){
    $i = new int();
    $result = takesInt($i);
    echo "Returned:<br>";
    var_dump($result);
});