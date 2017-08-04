<?php

use \me\adamcameron\general\testApp\GuzzleAdapter;
use \me\adamcameron\general\testApp\CachingGuzzleAdapter;
use \me\adamcameron\general\testApp\service\CachingService;

require_once __DIR__ . "/../../vendor/autoload.php";

$endPoint  = "http://cf2016.local:8516/cfml/misc/guzzleTestEndpoints/getById.cfm?id=";

$guzzleAdapter = new GuzzleAdapter($endPoint);
$cache = new CachingService();
$adapter = new CachingGuzzleAdapter($guzzleAdapter, $cache);

printf("Getting not-yet cached results @ %s%s", (new DateTime())->format("H:i:s"), PHP_EOL . PHP_EOL);
makeRequests($adapter);

echo "===================================================" .PHP_EOL . PHP_EOL;

sleep(10);

printf("Getting results again (from cache) @ %s%s", (new DateTime())->format("H:i:s"), PHP_EOL . PHP_EOL);
makeRequests($adapter);


function makeRequests($adapter){
	$startTime = time();
	$ids = ["001", "002"];
	$responses = [];
	foreach ($ids as $id) {
		echo "Making requests" . PHP_EOL . PHP_EOL;
		echo "Requesting: $id" . PHP_EOL;
		$responses[] = $adapter->get($id);
		echo "Requests made" . PHP_EOL . PHP_EOL;
	}
	echo "Fetching responses" . PHP_EOL . PHP_EOL;
	foreach ($responses as $response){
		$body = (string) $response->wait()->getBody();
		echo "Body: $body" . PHP_EOL . PHP_EOL;
	}
	echo "Responses fetched" . PHP_EOL . PHP_EOL;
	$duration = time() - $startTime;
	echo "Process duration: {$duration}sec" . PHP_EOL . PHP_EOL;
}
