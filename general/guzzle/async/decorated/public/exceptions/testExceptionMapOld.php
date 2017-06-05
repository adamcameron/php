<?php

use \me\adamcameron\testApp\GuzzleAdapter;
use \me\adamcameron\testApp\StatusToExceptionAdapterOld;

require_once __DIR__ . "/../../vendor/autoload.php";

$endPoint  = "http://cf2016.local:8516/cfml/misc/guzzleTestEndpoints/returnStatusCode.cfm?statusCode=";

$guzzleAdapter = new GuzzleAdapter($endPoint);

$exceptionMap = [
	400 => '\me\adamcameron\testApp\exception\BadRequestException',
	503 => '\me\adamcameron\testApp\exception\ServerException'
];

$adapter = new StatusToExceptionAdapterOld($guzzleAdapter, $exceptionMap);

$tests = [
	'non-error' => 200,
	'mapped client error' => 400,
	'mapped server error' => 503,
	'un-mapped client error' => 404,
	'un-mapped server error' => 500
];

foreach($tests as $test=>$value) {
	printf("%s (%s)%s", $test, $value, PHP_EOL . PHP_EOL);

	$response = $adapter->get($value);

	try {
		$resolvedResponse = $response->wait();

		printf(
			"Successful request returned: %s%s ",
			(string) $resolvedResponse->getBody(),
			PHP_EOL
		);
	} catch (Exception $e){
		printf("Request errored with %s%s", $e->getCode(), PHP_EOL);
		printf("Class: %s%s", get_class($e), PHP_EOL);
		printf("Message %s%s", $e->getMessage(), PHP_EOL);

		$previous = $e->getPrevious();
		if (is_null($previous)){
			continue;
		}

		printf("Previous class %s%s", get_class($previous), PHP_EOL);
		printf("Previous code %s%s", $previous->getCode(), PHP_EOL);
		printf("Previous message %s%s", $previous->getMessage(), PHP_EOL);
	}
	finally {
		echo PHP_EOL . "====================================================" . PHP_EOL . PHP_EOL;
	}
}





