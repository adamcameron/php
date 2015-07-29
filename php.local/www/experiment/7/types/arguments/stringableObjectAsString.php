<?php
// scalarArg.php

require __DIR__ . "/../safeRun.php";

class Person{

    protected $name;

    function __construct($name){
        $this->name = $name;
    }

}

class StringablePerson extends Person {

    function __toString(){
        return $this->name;
    }
}


function takesString(string $s){
    return $s;
}


safeRun("Passing a string", function(){
    $s = "Zachary";
    $result = takesString($s);
    echo "Returned:<br>";
    var_dump($result);
});

safeRun("Passing an object without __toString()", function(){
    $o = new Person("Zachary");
    $result = takesString($o);
    echo "Returned:<br>";
    var_dump($result);
});

safeRun("Passing an object with __toString()", function(){
    $o = new StringablePerson("Zachary");
    $result = takesString($o);
    echo "Returned:<br>";
    var_dump($result);
});