<?php

require_once realpath(__DIR__ . '/../vendor/autoload.php');

echo "Using ::class" . PHP_EOL;
printf("SomeNonExistentClass: %s%s", SomeNonExistentClass::class, PHP_EOL);
