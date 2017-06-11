<?php
// tests/workingSubClass.php

echo __FILE__ . ' executing' . PHP_EOL;

require_once __DIR__ . '/../../vendor/autoload.php';
echo 'autoload.php executed' . PHP_EOL;

use \dac\WorkingSubClass;
echo 'WorkingSubClass USEd' . PHP_EOL;

echo 'before WorkingSubClass instance created' . PHP_EOL;
$workingSubClass = new WorkingSubClass();
echo 'after WorkingSubClass instance created' . PHP_EOL;

var_dump($workingSubClass);
