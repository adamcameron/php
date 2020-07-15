<?php

namespace me\adamcameron\general\test\shutdownHandlerErrorProblem;

use PHPUnit\Framework\TestCase;

/** @runTestsInSeparateProcesses */
class MyServiceBrokenTest extends TestCase
{

    private static $scriptPath = __DIR__;

    public function testShutdownHandlerWithNoError()
    {
        $testScriptPath = static::$scriptPath . '/runWithNoErrors.php';
        $output = [];
        $exitCode = 0;
        exec("php $testScriptPath", $output, $exitCode);

        $this->assertSame(0, $exitCode);
        $this->assertRegExp('/^.*handleShutdown has no error.*$/', end($output));
    }

    public function testShutdownHandlerWithHandledException()
    {
        $testScriptPath = static::$scriptPath . '/runWithHandledException.php';
        $output = [];
        $exitCode = 0;
        exec("php $testScriptPath", $output, $exitCode);

        $this->assertSame(0, $exitCode);
        $this->assertRegExp('/^.*handleShutdown has no error.*$/', end($output));

    }

    public function testShutdownHandlerWithUnhandledException()
    {
        $testScriptPath = static::$scriptPath . '/runWithUnhandledException.php';
        $output = [];
        $exitCode = 1;
        exec("php $testScriptPath", $output, $exitCode);

        $this->assertSame(0, $exitCode);
        $this->assertRegExp('/^.*handleShutdown has no error.*$/', end($output));
    }

    public function testShutdownHandlerWithHandledWarning()
    {
        $testScriptPath = static::$scriptPath . '/runWithHandledWarning.php';
        $output = [];
        $exitCode = 0;
        exec("php $testScriptPath", $output, $exitCode);

        $this->assertSame(0, $exitCode);
        $this->assertRegExp('/^.*handleShutdown has no error.*$/', end($output));
    }

    public function testShutdownHandlerWithUnhandledWarning()
    {
        $testScriptPath = static::$scriptPath . '/runWithUnhandledWarning.php';
        $output = [];
        $exitCode = 1;
        exec("php $testScriptPath", $output, $exitCode);

        $this->assertSame(0, $exitCode);
        $this->assertRegExp('/^.*handleShutdown has no error.*$/', end($output));
    }

    public function testShutdownHandlerWithUnhandledError()
    {
        $testScriptPath = static::$scriptPath . '/runWithUnhandledError.php';
        $output = [];
        $exitCode = 1;
        exec("php $testScriptPath", $output, $exitCode);

        $this->assertSame(0, $exitCode);
        $this->assertRegExp('/^.*handleShutdown has no error.*$/', end($output));
    }

    public function testShutdownHandlerWithUnhandledFatal()
    {
        $testScriptPath = static::$scriptPath . '/runWithUnhandledFatal.php';
        $output = [];
        $exitCode = 1;
        exec("php $testScriptPath", $output, $exitCode);

        $this->assertSame(0, $exitCode);
        $this->assertRegExp('/^.*handleShutdown has no error.*$/', end($output));
    }
}
