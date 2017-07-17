<?php

namespace me\adamcameron\silex2\app;

require __DIR__ . '/../../vendor/autoload.php';

$app = new Application(['debug' => false]);
$app['debug'] = true;
$app->run();
