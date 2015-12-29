<?php
require_once __DIR__ . "/../vendor/autoload.php";

$test = new \me\adamcameron\behattest\Test();
var_dump($test);

$feature = new \test\features\bootstrap\LsContext();
var_dump($feature);
