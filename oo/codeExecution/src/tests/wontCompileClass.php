<?php
echo __FILE__ . ' executing' . PHP_EOL;

require_once __DIR__ . '/../../vendor/autoload.php';

use \dac\WontCompileClass;

$wontCompileClass = new WontCompileClass();

var_dump($wontCompileClass);
