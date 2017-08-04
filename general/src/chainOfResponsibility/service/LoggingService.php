<?php

namespace me\adamcameron\general\chainOfResponsibility\service;

class LoggingService {

    public function info(string $message) {
        echo $message . PHP_EOL;
    }
}
