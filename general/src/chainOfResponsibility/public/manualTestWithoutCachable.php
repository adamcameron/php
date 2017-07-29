<?php

namespace me\adamcameron\cor;

use me\adamcameron\general\chainOfResponsibility\handler\CacheablePersonHandler;
use me\adamcameron\general\chainOfResponsibility\handler\DatabasePersonHandler;
use me\adamcameron\general\chainOfResponsibility\repository\PersonRepository;
use me\adamcameron\general\chainOfResponsibility\service\CacheService;
use me\adamcameron\general\chainOfResponsibility\service\LoggingService;
use me\adamcameron\general\chainOfResponsibility\service\PersonService;

require_once realpath(__DIR__ . '/../vendor/autoload.php');

$loggingService = new LoggingService();
$cacheService = new CacheService($loggingService);
$personRepository = new PersonRepository($loggingService);

$databaseHandler = new DatabasePersonHandler($personRepository);
$cacheableHandler = new CacheablePersonHandler($cacheService);

$databaseHandler->setNextHandler($cacheableHandler);

$personService = new PersonService($databaseHandler);

foreach ([1,1,4,5] as $id){
    $person = $personService->getById($id);
    var_dump($person);
}
