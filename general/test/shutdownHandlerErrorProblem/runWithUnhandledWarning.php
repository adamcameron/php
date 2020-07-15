<?php
namespace me\adamcameron\general\shutdownHandlerErrorProblem;

require_once(__DIR__ . "/../../vendor/autoload.php");

$app = new MyApplication();
$app->runWithUnhandledWarning();
