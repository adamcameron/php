<?php

namespace me\adamcameron\cor;

use me\adamcameron\general\chainOfResponsibility\handler\CachedPersonHandler;
use me\adamcameron\general\chainOfResponsibility\service\CacheService;
use me\adamcameron\general\chainOfResponsibility\service\LoggingService;
use me\adamcameron\general\chainOfResponsibility\service\PersonService;

require_once realpath(__DIR__ . '/../vendor/autoload.php');

$loggingService = new LoggingService();
$cachingService = new CacheService($loggingService);

$cachedHandler = new CachedPersonHandler($cachingService);

$personService = new PersonService($cachedHandler);

$cachingService->put(5, ['firstName'=>'Ria', 'lastName'=>'Rima']);

foreach ([1,5] as $id){
    $person = $personService->getById($id);
    var_dump($person);
}
