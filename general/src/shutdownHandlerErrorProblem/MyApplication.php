<?php

namespace me\adamcameron\general\shutdownHandlerErrorProblem;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class MyApplication
{
    private $logger;

    public function __construct($logStream = null)
    {
        $this->createLogger($logStream);
        $this->registerLifecycleHandlers();
    }

    private function createLogger($logStream = null){
        $logStream = $logStream ?? 'php://stdout';
        $this->logger = new Logger('general');
        $this->logger->pushHandler(new StreamHandler($logStream));
    }

    private function registerLifecycleHandlers()
    {
        set_error_handler([$this, 'handleErrors']);
        set_exception_handler([$this, 'handleExceptions']);
        register_shutdown_function([$this, 'handleShutdown']);
    }

    public function handleExceptions($exception) {
        $this->logger->error(
            'Exception handled',
            [
                'type' => get_class($exception),
                'code' => $exception->getCode(),
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine()
            ]
        );
    }

    public function handleErrors(int $errno, string $errstr, ?string $errfile = null, ?int $errline = 0, ?array $errcontext = []) {
        $this->logger->error(
            'Error handled',
            [
                'code' => $errno,
                'message' => $errstr,
                'file' => $errfile,
                'line' => $errline
            ]
        );
        return true;
    }

    public function handleShutdown() {
        $this->logger->debug('handleShutdown called');
        $error = error_get_last();
        if (is_null($error)) {
            $this->logger->debug('handleShutdown has no error');
            exit(0);
        }
        $this->logger->debug(
            'handleShutdown has error',
            [
                'type' => $error['type'],
                'message' => $error['message'],
                'file' => $error['file'],
                'line' => $error['line']
            ]
        );
        exit(1);
    }

    public function runWithNoErrors(){
        return;
    }

    public function runWithHandledException() {
        try {
            throw new \RuntimeException('Handle this exception');
        } catch (\Exception $exception) {
            $this->logger->notice('An exception was handled', [
                'type' => get_class($exception),
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function runWithUnhandledException() {
        throw new \RuntimeException('This exception was unhandled');
    }

    public function runWithHandledWarning() {
        try {
            return new \DateTime('INVALID_DATE_TIME_STRING');
        } catch (\Exception $exception) {
            $this->logger->notice('An exception was handled', [
                'type' => get_class($exception),
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function runWithUnhandledWarning() {
        return new \DateTime('INVALID_DATE_TIME_STRING');
    }

    public function runWithUnhandledError() {
        throw new \Error('This error was unhandled');
    }

    public function runWithUnhandledFatal() {
        trigger_error("This fatal error was unhandled", E_USER_ERROR);
    }
}
