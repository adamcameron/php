<?php

namespace me\adamcameron\cor\factory;

use me\adamcameron\cor\handler\CachedPersonHandler;
use me\adamcameron\cor\handler\DatabasePersonHandler;
use me\adamcameron\cor\repository\PersonRepository;
use me\adamcameron\cor\service\CacheService;
use me\adamcameron\cor\service\LoggingService;
use me\adamcameron\cor\service\PersonService;

class PersonServiceFactory {

    public static function getPersonService()
    {
        $loggingService = new LoggingService();
        $cacheService = new CacheService($loggingService);
        $personRepository = new PersonRepository($loggingService);

        $cachedHandler = new CachedPersonHandler($cacheService);
        $databaseHandler = new DatabasePersonHandler($personRepository);

        $cachedHandler->setNextHandler($databaseHandler);

        $personService = new PersonService($cachedHandler);

        return $personService;
    }

}
