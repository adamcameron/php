<?php

require __DIR__ . "/Config.php";
require __DIR__ . "/UsesConfig.php";

$config = new Config(true);

$usesConfig = new UsesConfig($config);

$config->setAllowCache(false);

var_dump($usesConfig->getConfig());