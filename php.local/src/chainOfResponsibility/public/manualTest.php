<?php

use me\adamcameron\cor\factory\PersonServiceFactory;

require_once realpath(__DIR__ . '/../vendor/autoload.php');

$personService = PersonServiceFactory::getPersonService();

$person = $personService->getById(1);
var_dump($person);

$person = $personService->getById(1);
var_dump($person);


$person = $personService->getById(4);
var_dump($person);

$person = $personService->getById(5);
var_dump($person);
