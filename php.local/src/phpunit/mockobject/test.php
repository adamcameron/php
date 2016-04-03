<?php

namespace misc {

    require_once('C:\Users\adam.cameron\AppData\Roaming\Composer\vendor\phpunit\phpunit\src\Framework\TestCase.php');
    require_once('C:\Users\adam.cameron\AppData\Roaming\Composer\vendor\phpunit\phpunit\src\Framework\Assert.php');

    echo "hi";
    exit;
    $suite = new \PHPUnit_Framework_TestSuite();
    $suite->addTestSuite("SomeServiceTest");
    $result = new \PHPUnit_Framework_TestResult();
    $result->addListener(new \PHPUnit_Util_Log_JSON());
    $suite->run($result);
}







