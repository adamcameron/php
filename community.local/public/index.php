<?php

use \community\app\Application;

require_once realpath(__DIR__ . '/../vendor/autoload.php');

$app = new Application();
$app["debug"] = true;
$app->run();
