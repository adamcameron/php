<?php
require_once __DIR__ . "/../vendor/autoload.php";

$test = new \me\adamcameron\behattest\Test();
echo "<pre>";
var_dump($test);
echo "</pre>";

$context = new \test\context\LsContext();
echo "<pre>";
var_dump($context);
echo "</pre>";

echo "RAN WITH NO ERRORS";
