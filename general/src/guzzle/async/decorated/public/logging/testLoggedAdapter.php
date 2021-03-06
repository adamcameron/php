<?php

use \me\adamcameron\general\testApp\GuzzleAdapter;
use \me\adamcameron\general\testApp\LoggedGuzzleAdapter;
use \me\adamcameron\general\testApp\service\LoggingService;

require_once __DIR__ . "/../../vendor/autoload.php";

$endPoint  = "http://cf2016.local:8516/cfml/misc/guzzleTestEndpoints/getById.cfm?id=";

$guzzleAdapter = new GuzzleAdapter($endPoint);
$logger = new LoggingService();
$adapter = new LoggedGuzzleAdapter($guzzleAdapter, $logger);

require __DIR__ . '/makeRequests.php';
