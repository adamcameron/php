<?php
use \me\adamcameron\asyncguzzle\app\Application;

require_once __DIR__ . '/../../vendor/autoload.php';

$app = new Application(['debug' => true]);
$app->run();
