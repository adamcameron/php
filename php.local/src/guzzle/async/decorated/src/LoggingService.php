<?php

namespace me\adamcameron\testApp;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class LoggingService {

    private $log;

    public function __construct(){
        $this->log = new Logger('testApp');
        $this->log->pushHandler(new StreamHandler(__DIR__ . '/../logs/testApp.log', Logger::INFO));
    }

    public function logMessage($message){
        $now = \DateTime::createFromFormat('U.u', microtime(true));
        $ts = $now->format("H:m:s.u");
        printf("%s: %s%s", $ts, $message, PHP_EOL);
        $this->log->info($message);
    }

}
