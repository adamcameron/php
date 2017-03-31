<?php

namespace me\adamcameron\silexApp\app;

require realpath(__DIR__ . '/../../vendor/autoload.php');

$app = new SilexApp([]);
$app->run();
