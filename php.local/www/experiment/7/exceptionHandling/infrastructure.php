<?php
// infrastructure.php

class Person {}

class PersonFactory {
    public static function getPersonFromId($id){
        if ($id > 0) {
            return new Person();
        }
    }
}

function doSomethingToPerson(Person $x){
	return true;
}
