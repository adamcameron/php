<?php
require_once __DIR__ . '/../vendor/autoload.php';

$app = new \me\adamcameron\pimpleBug\app\Application();

echo '<pre>';

$myServiceViaInlineFunction = $app->di["service.viaFunctionLiteral.my"];
var_dump($myServiceViaInlineFunction);
echo "<hr>";

$myServiceViaFunctionStatement = $app->di["service.viaFunctionStatement.my"];
var_dump($myServiceViaFunctionStatement);
