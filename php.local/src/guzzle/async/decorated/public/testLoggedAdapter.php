<?php

use \me\adamcameron\testApp\GuzzleAdapter;
use \me\adamcameron\testApp\LoggedGuzzleAdapter;
use \me\adamcameron\testApp\LoggingService;

require_once __DIR__ . "/../vendor/autoload.php";

$guzzleAdapter = new GuzzleAdapter();
$logger = new LoggingService();
$adapter = new LoggedGuzzleAdapter($guzzleAdapter, $logger);

require __DIR__ . '/makeRequests.php';