<?php
echo __FILE__ . ' read' . PHP_EOL;

require_once __DIR__ . '/../../other/Dependency.php';

$dependency = new \other\Dependency();

var_dump($dependency);
