<?php

require_once realpath(__DIR__ . '/../vendor/autoload.php');

use me\adamcameron\kahlan\app\Container;
use me\adamcameron\kahlan\job\SyncCustomersJob;

$params = getopt('', ['recordsToProcess:']);

$container = new Container();
$job = new SyncCustomersJob($container, $params);

$job->run();
