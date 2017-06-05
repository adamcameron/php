<?php

require __DIR__ . '/../vendor/autoload.php';

$myObj = new \me\adamcameron\reflection\investigation\MyClass('test constuctor value');
$result = $myObj->myImportedBehaviour('test method value');

print_r($result);
