<?php

use \me\adamcameron\testApp\repository\PersonRepository;
use \me\adamcameron\testApp\adapter\Adapter;
use \me\adamcameron\testApp\adapter\GuzzleAdapter;
use \me\adamcameron\testApp\adapter\LoggingAdapter;
use \me\adamcameron\testApp\adapter\StatusToExceptionAdapter;
use \me\adamcameron\testApp\adapter\CachingAdapter;
use \me\adamcameron\testApp\service\LoggingService;
use \me\adamcameron\testApp\service\CachingService;

require_once __DIR__ . "/../../vendor/autoload.php";

$loggingService = getLoggingService();
$personRepository = getPersonRepository($loggingService);


$loggingService->logMessage("Test: Getting not-yet cached results");

makeRequestsToGetById($personRepository, $loggingService);
logTestSeparator($loggingService);

function makeRequestsToGetById(PersonRepository $personRepository, LoggingService $loggingService){
    $id = 4;

    makeRequestToGetById($id, "Uncached", $personRepository, $loggingService);
    pause(5, $loggingService);
    makeRequestToGetById($id, "Cached", $personRepository, $loggingService);
}

function makeRequestToGetById($id, $phase, PersonRepository $personRepository, LoggingService $loggingService){
    $startTime = time();

    $loggingService->logMessage("Test (phase: $phase): calling getById($id)");
    $response = $personRepository->getById($id);
    $loggingService->logMessage("Test (phase: $phase): call to getById complete");
    $body = (string) $response->wait()->getBody();
    $loggingService->logMessage("Test (phase: $phase): Body: $body");

    $duration = time() - $startTime;
    $loggingService->logMessage("Test (phase: $phase): Process duration: {$duration}sec");
}

function getLoggingService() : LoggingService {
    $ts = (new DateTime())->format("His");
    $loggingService = new LoggingService("all_$ts");

    return $loggingService;
}

function getPersonRepository(LoggingService $loggingService) : PersonRepository {
    $guzzleAdapter = getGuzzleAdapter();
    $loggingAdapter = getLoggingAdapter($guzzleAdapter, $loggingService);
    $statusToExceptionAdapter = getStatusToExceptionAdapter($loggingAdapter, $loggingService);
    $cachingAdapter = getCachingAdapter($statusToExceptionAdapter, $loggingService);

    $baseUrl = "http://php.local:8070/experiment/guzzle/";
    $personRepository = new PersonRepository($cachingAdapter, $baseUrl);

    return $personRepository;
}

function getGuzzleAdapter() : GuzzleAdapter {
    $guzzleAdapter = new GuzzleAdapter();

    return $guzzleAdapter;
}

function getLoggingAdapter(Adapter $adapter, LoggingService $loggingService) : LoggingAdapter {
    $loggingAdapter = new LoggingAdapter($adapter, $loggingService);

    return $loggingAdapter;
}

function getStatusToExceptionAdapter(Adapter $adapter, LoggingService $loggingService) : StatusToExceptionAdapter {
    $exceptionMap = [
        400 => '\me\adamcameron\testApp\exception\BadRequestException',
        503 => '\me\adamcameron\testApp\exception\ServerException'
    ];

    $statusToExceptionAdapter = new StatusToExceptionAdapter($adapter, $exceptionMap, $loggingService);

    return $statusToExceptionAdapter;
}

function getCachingAdapter(Adapter $adapter, LoggingService $loggingService) : CachingAdapter {
    $cachingService = new CachingService($loggingService);
    $cachingAdapter = new CachingAdapter($adapter, $cachingService);

    return $cachingAdapter;
}

function logTestSeparator(LoggingService $loggingService) {
    $loggingService->logMessage("==================================================================");
}

function pause($seconds, LoggingService $loggingService) {
    $loggingService->logMessage("Test: waiting {$seconds}sec");
    sleep($seconds);
    $loggingService->logMessage("Test: waited {$seconds}sec");
}
