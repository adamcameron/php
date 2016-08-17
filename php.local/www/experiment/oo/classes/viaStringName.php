<?php

class TestClass{}

$test = new TestClass;
var_dump($test);

$class = 'TestClass';
$test = new $class;
var_dump($test);
