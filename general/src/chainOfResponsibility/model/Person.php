<?php

namespace me\adamcameron\general\chainOfResponsibility\model;

class Person {

    public $firstName;
    public $lastName;

    public function __construct($firstName=null, $lastName=null) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

}
