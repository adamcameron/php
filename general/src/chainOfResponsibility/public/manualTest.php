<?php

use me\adamcameron\general\chainOfResponsibility\factory\PersonServiceFactory;

require_once realpath(__DIR__ . '/../vendor/autoload.php');

$personService = PersonServiceFactory::getPersonService();

foreach ([1,1,4,5,5] as $id){
    $person = $personService->getById($id);
    var_dump($person);
}
