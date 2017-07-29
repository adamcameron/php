<?php

use \me\adamcameron\general\testApp\GuzzleAdapter;
use \me\adamcameron\general\testApp\StatusToExceptionAdapter;
use \React\Promise\Promise;

require_once __DIR__ . "/../../vendor/autoload.php";

$endPoint  = "http://cf2016.local:8516/cfml/misc/guzzleTestEndpoints/returnStatusCode.cfm?statusCode=";

$guzzleAdapter = new GuzzleAdapter($endPoint);

$exceptionMap = [
	400 => '\me\adamcameron\testApp\exception\BadRequestException',
	503 => '\me\adamcameron\testApp\exception\ServerException'
];
$status = 400;

$adapter = new StatusToExceptionAdapter($guzzleAdapter, $exceptionMap);


$p1 =

