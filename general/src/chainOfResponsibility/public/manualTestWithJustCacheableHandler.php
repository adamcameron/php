<?php

namespace me\adamcameron\cor;

use me\adamcameron\cor\handler\CacheablePersonHandler;
use me\adamcameron\cor\service\CacheService;
use me\adamcameron\cor\service\LoggingService;
use me\adamcameron\cor\service\PersonService;

require_once realpath(__DIR__ . '/../vendor/autoload.php');

$loggingService = new LoggingService();
$cachingService = new CacheService($loggingService);

$cacheableHandler = new CacheablePersonHandler($cachingService);

$personService = new PersonService($cacheableHandler);

foreach ([1,5] as $id){
    $person = $personService->getById($id);
    var_dump($person);
}
