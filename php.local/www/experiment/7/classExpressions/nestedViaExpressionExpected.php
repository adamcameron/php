<?php
// nestedViaExpressionAlternative.php

class Person {

    private $Name = new class($firstName, $lastName){
        private $firstName;
        private $lastName;

        function __construct($firstName, $lastName){
            $this->firstName = $firstName;
            $this->lastName = $lastName;
        }

        function getFullName(){
            return sprintf('%s %s', $this->firstName, $this->lastName);
        }
    };
    private $name;

    function __construct($firstName, $lastName){
        $this->name = new $this->Name($firstName, $lastName);
    }

    function getName(){
        return $this->name->getFullName();
    }

}

$physicist = new Person("Ernest", "Rutherford");

$fullName = $physicist->getName();

echo $fullName;
