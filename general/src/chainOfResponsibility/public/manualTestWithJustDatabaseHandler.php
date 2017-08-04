<?php

namespace me\adamcameron\cor;

use me\adamcameron\general\chainOfResponsibility\handler\DatabasePersonHandler;
use me\adamcameron\general\chainOfResponsibility\repository\PersonRepository;
use me\adamcameron\general\chainOfResponsibility\service\LoggingService;
use me\adamcameron\general\chainOfResponsibility\service\PersonService;

require_once realpath(__DIR__ . '/../vendor/autoload.php');

$loggingService = new LoggingService();
$personRepository = new PersonRepository($loggingService);

$databaseHandler = new DatabasePersonHandler($personRepository);

$personService = new PersonService($databaseHandler);

foreach ([1,5] as $id){
    $person = $personService->getById($id);
    var_dump($person);
}

