<?php
// classWithToString.php

require __DIR__ . "/safeRun.php";

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

safeRun("Outputing a StringablePerson", function(){
    $son = new StringablePerson("Zachary");
    echo "The boy's name is $son<br>";
});

safeRun("Outputing a Person (which gives a fatal error)", function(){
    $son = new Person("Zachary");
    echo "The boy's name is $son<br>";
});


