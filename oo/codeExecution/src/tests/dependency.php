<?php
echo __FILE__ . ' executing' . PHP_EOL;

require_once __DIR__ . '/../../other/Dependency.php';

$dependency = new \other\Dependency();

var_dump($dependency);
