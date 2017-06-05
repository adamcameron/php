<?php

namespace me\adamcameron\silex2\app;

require realpath(__DIR__ . '/../../vendor/autoload.php');

$app = new Application([]);
$app->run();
