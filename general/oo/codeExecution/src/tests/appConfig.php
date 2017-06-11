<?php
// tests/appConfig.php

echo __FILE__ . ' executing' . PHP_EOL;

require_once __DIR__ . '/../appConfig.php';

require_once DEPENDENCY_DIR . '/Dependency.php';

$dependency = new \other\Dependency();

var_dump($dependency);
