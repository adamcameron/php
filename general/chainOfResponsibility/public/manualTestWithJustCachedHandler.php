<?php

namespace me\adamcameron\cor;

use me\adamcameron\cor\handler\CachedPersonHandler;
use me\adamcameron\cor\service\CacheService;
use me\adamcameron\cor\service\LoggingService;
use me\adamcameron\cor\service\PersonService;

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
