<?php

namespace me\adamcameron\general\test\pimple\provider;

use me\adamcameron\general\pimple\app\PimpleApplication;
use me\adamcameron\general\pimple\service\ConfigService;
use me\adamcameron\general\test\helper\ReflectionHelper;
use PHPUnit\Framework\TestCase;

class MultipleInstanceTest extends TestCase
{
    public function testSecondApp()
    {
        $valueToTestFor = 'UPDATED';

        $app1 = new PimpleApplication();
        $otherService1Config = ReflectionHelper::getProperty($app1['service.other'], 'config');
        $config1Values = ReflectionHelper::getProperty($otherService1Config, 'values');
        $config1Values->key1 = $valueToTestFor;
        ReflectionHelper::setProperty($otherService1Config, 'values', $config1Values);
        ReflectionHelper::setProperty($app1['service.other'], 'config', $otherService1Config);

        $app2 = new PimpleApplication();
        $otherService2Config = ReflectionHelper::getProperty($app2['service.other'], 'config');
        $config2Values = ReflectionHelper::getProperty($otherService2Config, 'values');

        $this->assertNotEquals($valueToTestFor, $config2Values->key1);
        $this->assertSame(ConfigService::$defaultValue, $config2Values->key1);
    }

}
