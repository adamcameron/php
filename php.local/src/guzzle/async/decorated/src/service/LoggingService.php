<?php

namespace me\adamcameron\testApp\service;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class LoggingService {

    private $log;

    public function __construct($logName) {
        $this->log = new Logger($logName);
        $this->log->pushHandler(new StreamHandler(__DIR__ . "/../../logs/$logName.log", Logger::INFO));
    }

    public function logMessage(string $message) {
        $this->log->info($message);
    }

}
