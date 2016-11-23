<?php

use \me\adamcameron\testApp\adapter\Adapter;
use \me\adamcameron\testApp\adapter\GuzzleAdapter;
use \me\adamcameron\testApp\adapter\LoggedGuzzleAdapter;
use \me\adamcameron\testApp\adapter\StatusToExceptionAdapter;
use \me\adamcameron\testApp\adapter\CachingGuzzleAdapter;
use \me\adamcameron\testApp\service\LoggingService;
use \me\adamcameron\testApp\service\CachingService;

require_once __DIR__ . "/../vendor/autoload.php";

$loggingService = getLoggingService();

$guzzleAdapter = getGuzzleAdapter();
$loggedAdapter = getLoggedAdapter($guzzleAdapter, $loggingService);
$statusToExceptionAdapter = getStatusToExceptionAdapter($loggedAdapter, $loggingService);
$cachedAdapter = getCachedAdapter($statusToExceptionAdapter, $loggingService);

$loggingService->logMessage("Test: Getting not-yet cached results");
makeRequests($cachedAdapter, $loggingService);

$loggingService->logMessage("Test: Waiting 10sec");
sleep(10);

$loggingService->logMessage("Test: Getting results again (from cache)");
makeRequests($cachedAdapter, $loggingService);


function makeRequests(Adapter $adapter, LoggingService $loggingService){
	$startTime = time();
	$statusCodesToTestWith = [200, 400, 503, 404, 500];
	$responses = [];
	foreach ($statusCodesToTestWith as $statusCode) {
		$loggingService->logMessage("Test: Requesting: $statusCode");
		$responses[] = $adapter->get($statusCode);
	}
	$loggingService->logMessage("Test: Requests made");

	$loggingService->logMessage("Test: Fetching responses");
	foreach ($responses as $response){
		try {
			$body = (string) $response->wait()->getBody();
			$loggingService->logMessage("Test: Body: $body");
		} catch (Exception $e){
			$exceptionClass = get_class($e);
			$loggingService->logMessage("Test: Exception thrown: $exceptionClass");
		}
	}
	$loggingService->logMessage("Test: Responses fetched");
	$duration = time() - $startTime;
	$loggingService->logMessage("Test: Process duration: {$duration}sec");
}

function getLoggingService() {
	$ts = (new DateTime())->format("His");
	$loggingService = new LoggingService("all_$ts");
	return $loggingService;
}

function getGuzzleAdapter() {
	$endPoint  = "http://cf2016.local:8516/cfml/misc/guzzleTestEndpoints/returnStatusCode.cfm?statusCode=";
	$guzzleAdapter = new GuzzleAdapter($endPoint);

	return $guzzleAdapter;
}

function getCachedAdapter($adapter, $loggingService) {
	$cachingService = new CachingService($loggingService);
	$cachedAdapter = new CachingGuzzleAdapter($adapter, $cachingService);

	return $cachedAdapter;
}

function getLoggedAdapter($adapter, $loggingService){
	$loggedAdapter = new LoggedGuzzleAdapter($adapter, $loggingService);

	return $loggedAdapter;
}

function getStatusToExceptionAdapter($adapterToDecorate, $loggingService) {
	$exceptionMap = [
		400 => '\me\adamcameron\testApp\exception\BadRequestException',
		503 => '\me\adamcameron\testApp\exception\ServerException'
	];

	$statusToExceptionAdapter = new StatusToExceptionAdapter($adapterToDecorate, $exceptionMap, $loggingService);

	return $statusToExceptionAdapter;
}
