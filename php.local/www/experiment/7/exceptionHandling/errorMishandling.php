<?php
// errorMishandling.php

require __DIR__ . "/../../../../vendor/autoload.php";

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

$person = PersonFactory::getPersonFromId($_GET['id']);

try {
	$result = doSomethingToPerson($person);
	echo 'Process ran OK';
} catch(Exception $e) {
	echo 'Exception caught';
	new \dBug($e);
} catch (EngineException $e){
	echo 'EngineException caught';
	new \dBug($e);
}