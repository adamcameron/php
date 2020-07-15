<?php

namespace me\adamcameron\general\test\shutdownHandlerErrorProblem;

use me\adamcameron\general\shutdownHandlerErrorProblem\MyApplication;

require_once(__DIR__ . "/../../vendor/autoload.php");

$app = new MyApplication();
$app->runWithNoErrors();
