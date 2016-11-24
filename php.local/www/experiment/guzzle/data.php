<?php

class Person{
    public $id;
    public $firstName;
    public $lastName;

    function __construct($id, $firstName, $lastName){
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
}

$people = [
    new Person(1, "Donald", "Duck"),
    new Person(2, "Donald", "Cameron"),
    new Person(3, "Donald", "Trump"),
    new Person(4, "Donald", "Wearsyatroosas")
];
