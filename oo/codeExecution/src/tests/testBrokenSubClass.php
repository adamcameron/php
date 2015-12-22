<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use \dac\BrokenSubClass;

$brokenSubClass = new BrokenSubClass();

var_dump($brokenSubClass);