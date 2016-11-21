<?php

use \me\adamcameron\testApp\GuzzleAdapter;
use \me\adamcameron\testApp\CachingGuzzleAdapter;
use \me\adamcameron\testApp\service\CachingService;

require_once __DIR__ . "/../../vendor/autoload.php";

$endPoint  = "http://cf2016.local:8516/cfml/misc/guzzleTestEndpoints/getById.cfm?id=";

$guzzleAdapter = new GuzzleAdapter($endPoint);
$cache = new CachingService();
$adapter = new CachingGuzzleAdapter($guzzleAdapter, $cache);

require __DIR__ . '/makeRequests.php';
