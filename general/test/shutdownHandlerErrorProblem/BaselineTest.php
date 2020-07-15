<?php

namespace me\adamcameron\general\test\shutdownHandlerErrorProblem;

use PHPUnit\Framework\TestCase;

/** @runTestsInSeparateProcesses */
class BaselineTest extends TestCase
{

    public function testBaseline()
    {
        register_shutdown_function([$this, 'handleShutdown']);

        $message = 'TEST_RUNTIME_EXCEPTION_MESSAGE';

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage($message);

        throw new \RuntimeException($message);
    }

    public function handleShutdown()
    {
        $error = error_get_last();
        file_put_contents(
            'C:\\temp\\dump.json',
            json_encode([
                'type' => $error['type'],
                'message' => $error['message'],
                'file' => $error['file'],
                'line' => $error['line']
            ])
        );
    }
}
