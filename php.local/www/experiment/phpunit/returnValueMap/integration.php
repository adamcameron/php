<?php

require __DIR__ . '\..\vendor\autoload.php';

$preparer = new \returnValueMap\Preparer();
$processor = new \returnValueMap\Processor();
$packager = new \returnValueMap\Packager();

$actual = new \returnValueMap\Actual($preparer, $processor, $packager);

$object = (object) ['property' => 'property value'];


$result = $actual->actualise($object);

var_dump($result);
