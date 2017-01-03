<?php

namespace me\adamcameron\cor\model;

class Person {

    public $firstName;
    public $lastName;

    public function __construct($firstName=null, $lastName=null) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

}
