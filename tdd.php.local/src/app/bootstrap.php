<?php

namespace me\adamcameron\tdd\app;

require realpath(__DIR__ . '/../../vendor/autoload.php');

$app = new TddApplication([]);
$app->run();
