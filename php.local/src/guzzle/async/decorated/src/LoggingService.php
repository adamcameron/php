<?php

namespace me\adamcameron\testApp;

use Monolog\Logger;

class LoggingService {

    private $log;

    public function __construct(){
        $this->log = new Logger('testApp');
        $this->log->pushHandler(new StreamHandler(__DIR__ . '/../logs/testApp.log', Logger::INFO));
    }

    public function logMessage($message){
        $this->log->info($message);
    }


}
