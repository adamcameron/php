<?php
// tests/originalSubClass.php

echo __FILE__ . ' executing' . PHP_EOL;

require_once __DIR__ . '/../../vendor/autoload.php';
echo 'autoload.php executed' . PHP_EOL;

use \dac\OriginalSubClass;
echo 'OriginalSubClass USEd' . PHP_EOL;

echo 'before OriginalSubClass instance created' . PHP_EOL;
$originalSubClass = new OriginalSubClass();
echo 'after OriginalSubClass instance created' . PHP_EOL;

var_dump($originalSubClass);
