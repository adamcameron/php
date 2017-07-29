<?php

namespace me\adamcameron\cc;

use com\example\other\SomeClassToAlias as AliasedClass;
use com\example\other\SomeClassToAlias;
use com\example\other\SomeOtherClass;

require_once realpath(__DIR__ . '/../vendor/autoload.php');

echo "Using ::class" . PHP_EOL;
printf("SomeClass: %s%s", SomeClass::class, PHP_EOL);
printf("SomeOtherClass: %s%s", SomeOtherClass::class, PHP_EOL);
printf("SomeClassToAlias as AliasedClass: %s%s", AliasedClass::class, PHP_EOL);
printf("SomeClassToAlias: %s%s", SomeClassToAlias::class, PHP_EOL);
printf("PHPUnit_Framework_Exception: %s%s", \PHPUnit_Framework_Exception::class, PHP_EOL);

$someClass = new SomeClass();
$someOtherClass = new SomeOtherClass();
$someAliasedClass = new AliasedClass();
$someClassToAlias = new SomeClassToAlias();
$phpunitFrameworkException = new \PHPUnit_Framework_Exception();

echo PHP_EOL . "Using get_class() on instance" . PHP_EOL;
printf("SomeClass: %s%s", get_class($someClass), PHP_EOL);
printf("SomeOtherClass: %s%s", get_class($someOtherClass), PHP_EOL);
printf("AliasedClass: %s%s", get_class($someAliasedClass), PHP_EOL);
printf("SomeClassToAlias: %s%s", get_class($someClassToAlias), PHP_EOL);
printf("PHPUnit_Framework_Exception: %s%s", get_class($phpunitFrameworkException), PHP_EOL);
