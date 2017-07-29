<?php

namespace me\adamcameron\cor;

use me\adamcameron\cor\handler\DatabasePersonHandler;
use me\adamcameron\cor\repository\PersonRepository;
use me\adamcameron\cor\service\LoggingService;
use me\adamcameron\cor\service\PersonService;

require_once realpath(__DIR__ . '/../vendor/autoload.php');

$loggingService = new LoggingService();
$personRepository = new PersonRepository($loggingService);

$databaseHandler = new DatabasePersonHandler($personRepository);

$personService = new PersonService($databaseHandler);

foreach ([1,5] as $id){
    $person = $personService->getById($id);
    var_dump($person);
}

