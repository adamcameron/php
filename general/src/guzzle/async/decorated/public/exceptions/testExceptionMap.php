<?php

use \me\adamcameron\general\testApp\GuzzleAdapter;
use \me\adamcameron\general\testApp\StatusToExceptionAdapter;

require_once __DIR__ . "/../../vendor/autoload.php";

$endPoint  = "http://cf2016.local:8516/cfml/misc/guzzleTestEndpoints/returnStatusCode.cfm?statusCode=";

$guzzleAdapter = new GuzzleAdapter($endPoint);

$exceptionMap = [
    400 => '\me\adamcameron\testApp\exception\BadRequestException',
    503 => '\me\adamcameron\testApp\exception\ServerException'
];
$requestsToMake = [200,400,503,404,500];

$adapter = new StatusToExceptionAdapter($guzzleAdapter, $exceptionMap);


foreach ($requestsToMake as $status){
    try {
        $response = $adapter->get($status);

        $resolvedResponse = $response->wait();
        echo((string)$resolvedResponse->getBody()) . PHP_EOL . PHP_EOL;

    } catch (Exception $e){
        echo "EXCEPTION CAUGHT" . PHP_EOL;
        var_dump([
            "type" => get_class($e),
            "code" => $e->getCode(),
            "message" => $e->getMessage()
        ]);
    }
    echo "==============================================================" . PHP_EOL . PHP_EOL;
}

