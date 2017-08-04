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


$loggingService->logMessage("Test: Getting not-yet cached results");

makeRequestsToGetById($personRepository, $loggingService);
logTestSeparator($loggingService);

makeRequestsToGetByName($personRepository, $loggingService);
logTestSeparator($loggingService);

makeRequestsToReturnStatusCode($personRepository, $loggingService);
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

function makeRequestsToGetByName(PersonRepository $personRepository, LoggingService $loggingService){
	$firstName = "Donald";
	$lastName = "Wearsyatroosas";

	makeRequestToGetByByName($firstName, $lastName, "Uncached", $personRepository, $loggingService);
	pause(5, $loggingService);
	makeRequestToGetByByName($firstName, $lastName, "Cached", $personRepository,  $loggingService);
}

function makeRequestToGetByByName($firstName, $lastName, $phase, PersonRepository $personRepository, LoggingService $loggingService){
	$startTime = time();

	$loggingService->logMessage("Test (phase: $phase): calling getByName('$firstName', '$lastName')");
	$response = $personRepository->getByName($firstName, $lastName);
	$loggingService->logMessage("Test (phase: $phase): call to getByName complete");
	$body = (string) $response->wait()->getBody();
	$loggingService->logMessage("Test (phase: $phase): Body: $body");

	$duration = time() - $startTime;
	$loggingService->logMessage("Test (phase: $phase): Process duration: {$duration}sec");
}

function makeRequestsToReturnStatusCode(PersonRepository $personRepository, LoggingService $loggingService) {
	makeRequestToReturnStatusCode200("First", $personRepository, $loggingService);
	pause(2, $loggingService);
	makeRequestToReturnStatusCode200("Second", $personRepository, $loggingService);
	logTestSeparator($loggingService);
	makeRequestToMappedStatusCode("First", $personRepository, $loggingService);
	$loggingService->logMessage("Test: Repeating an erroring call will not touch cache");
	makeRequestToMappedStatusCode("Second", $personRepository, $loggingService);
}

function makeRequestToReturnStatusCode200($phase, PersonRepository $personRepository, LoggingService $loggingService){
	$statusCode = 200;
	$loggingService->logMessage("Test (phase: $phase): calling returnStatusCode($statusCode)");
	$response = $personRepository->returnStatusCode($statusCode);
	$loggingService->logMessage("Test (phase: $phase): call to returnStatusCode complete");
	$body = (string) $response->wait()->getBody();
	$loggingService->logMessage("Test (phase: $phase): Body: $body");
}

function makeRequestToMappedStatusCode($phase, PersonRepository $personRepository, LoggingService $loggingService) {
	$statusCode = 400;
	$loggingService->logMessage("Test (phase: $phase): calling returnStatusCode($statusCode)");
	$response = $personRepository->returnStatusCode($statusCode);
	$loggingService->logMessage("Test (phase: $phase): call to returnStatusCode complete");
	try {
		$response->wait();
		$loggingService->logMessage("Test (phase: $phase): failed to throw expected exception");
	} catch (Exception $e){
		logException($e, $loggingService);
	}
}

function logException(Exception $e, LoggingService $loggingService) {
	$previous = $e->getPrevious();
	$loggingService->logMessage(sprintf("Test: Request errored with %s%s", $e->getCode(), PHP_EOL));
	$loggingService->logMessage(sprintf("Test: Class: %s%s", get_class($e), PHP_EOL));
	$loggingService->logMessage(sprintf("Test: Message %s%s", $e->getMessage(), PHP_EOL));
	$loggingService->logMessage(sprintf("Test: Previous class %s%s", get_class($previous), PHP_EOL));
	$loggingService->logMessage(sprintf("Test: Previous code %s%s", $previous->getCode(), PHP_EOL));
	$loggingService->logMessage(sprintf("Test: Previous message %s%s", $previous->getMessage(), PHP_EOL));
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

	$personRepository = new PersonRepository($cachingAdapter);

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
