<?php

use \me\adamcameron\general\testApp\repository\PersonRepository;
use \me\adamcameron\general\testApp\adapter\Adapter;
use \me\adamcameron\general\testApp\adapter\GuzzleAdapter;
use \me\adamcameron\general\testApp\adapter\LoggingAdapter;
use \me\adamcameron\general\testApp\adapter\StatusToExceptionAdapter;
use \me\adamcameron\general\testApp\adapter\CachingAdapter;
use \me\adamcameron\general\testApp\service\LoggingService;
use \me\adamcameron\general\testApp\service\CachingService;

require_once __DIR__ . "/../../vendor/autoload.php";

$loggingService = getLoggingService();
$personRepository = getPersonRepository($loggingService);


testGetById($personRepository, $loggingService);
logTestSeparator($loggingService);
testCreate($personRepository, $loggingService);
logTestSeparator($loggingService);
testUpdate($personRepository, $loggingService);


function testGetById(PersonRepository $personRepository, LoggingService $loggingService){
    $id = 4;

    testGetByIdByPhase($id, "Uncached", $personRepository, $loggingService);
    pause(5, $loggingService);
    testGetByIdByPhase($id, "Cached", $personRepository, $loggingService);
}

function testGetByIdByPhase($id, $phase, PersonRepository $personRepository, LoggingService $loggingService){
    $startTime = time();

    $loggingService->logMessage("Test (phase: $phase): calling getById($id)");
    $response = $personRepository->getById($id);
    $loggingService->logMessage("Test (phase: $phase): call to getById complete");
    $body = (string) $response->wait()->getBody();
    $loggingService->logMessage("Test (phase: $phase): Body: $body");

    $duration = time() - $startTime;
    $loggingService->logMessage("Test (phase: $phase): Process duration: {$duration}sec");
}

function testCreate(PersonRepository $personRepository, LoggingService $loggingService) {
	$personDetails = [
		'firstName' => 'Donald',
		'lastName' => 'McLean'
	];

	$loggingService->logMessage(sprintf("Test: calling create(%s)", json_encode($personDetails)));

	$response = $personRepository->create($personDetails);
	$body = (string) $response->wait()->getBody();

	$loggingService->logMessage(sprintf("Test: called create(): [%s]", $body));
}

function testUpdate(PersonRepository $personRepository, LoggingService $loggingService) {
	testUpdateByPhase("Valid ID", 3, $personRepository, $loggingService);
	testUpdateByPhase("Invalid ID", -1, $personRepository, $loggingService);
}

function testUpdateByPhase($phase, $id, PersonRepository $personRepository, LoggingService $loggingService) {
	$personDetails = [
		'firstName' => 'Donald',
		'lastName' => 'Corleone'
	];

	$logDetails = [
		'id' => $id,
		'details' => $personDetails
	];

	$loggingService->logMessage(sprintf("Test (phase: %s): calling update(%s)", $phase, json_encode($logDetails)));

	$response = $personRepository->update($id, $personDetails);
	try {
		$body = (string) $response->wait()->getBody();
		$loggingService->logMessage(sprintf("Test (phase %s): called update(): [%s]", $phase, $body));
	} catch (Exception $e) {
		$previous = $e->getPrevious();
		$loggingService->logMessage(
			sprintf(
				"Test (phase %s): call to update failed: "
				. "Class: %s; "
				. "Code: %s; "
				. "Message: %s"
				. "Previous class: %s"
				. "Previous message: %s"
				, $phase, get_class($e), $e->getCode(), $e->getMessage()
				, get_class($previous), $previous->getMessage()
			)
		);
	} finally {
		$loggingService->logMessage(sprintf("Test (phase %s): complete", $phase));
	}
}

function getLoggingService() : LoggingService {
    $ts = (new DateTime())->format("His");
    //$loggingService = new LoggingService("all_$ts");
    $loggingService = new LoggingService("testPost");

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
