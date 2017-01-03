<?php

namespace me\adamcameron\cor\service;

class LoggingService {

    public function info(string $message) {
        echo $message . PHP_EOL;
    }
}
