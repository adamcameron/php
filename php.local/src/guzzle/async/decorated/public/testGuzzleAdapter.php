<?php

require __DIR__ . "/../vendor/autoload.php";

use \me\adamcameron\testApp\LoggingService;
use \me\adamcameron\testApp\GuzzleAdapter;

$endPoint  = "http://cf2016.local:8516/cfml/misc/guzzleTestEndpoints/getById.cfm?id=";

$logger = new LoggingService();
$adapter = new GuzzleAdapter($endPoint);

require(__DIR__ . '/makeRequests.php');