<?php
echo __FILE__ . ' read' . PHP_EOL;

require_once __DIR__ . '/../../vendor/autoload.php';

use \dac\BaseClass;

$baseClass = new BaseClass();

var_dump($baseClass);
