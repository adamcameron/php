<?php

require __DIR__ . "/../vendor/autoload.php";

use \me\adamcameron\testApp\LoggingService;
use \me\adamcameron\testApp\GuzzleAdapter;


$logger = new LoggingService();
$adapter = new GuzzleAdapter();

require(__DIR__ . '/makeRequests.php');