<?php

require __DIR__ . "/../../vendor/autoload.php";

use \me\adamcameron\general\testApp\service\LoggingService;
use \me\adamcameron\general\testApp\GuzzleAdapter;

$endPoint  = "http://cf2016.local:8516/cfml/misc/guzzleTestEndpoints/getById.cfm?id=";

$logger = new LoggingService();
$adapter = new GuzzleAdapter($endPoint);

require(__DIR__ . '/makeRequests.php');
