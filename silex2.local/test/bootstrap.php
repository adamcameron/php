<?php

use \PHPUnit\Framework\TestCase;

class_alias(TestCase::class, '\PHPUnit_Framework_TestCase');

putenv('deployment_environment=dev');
