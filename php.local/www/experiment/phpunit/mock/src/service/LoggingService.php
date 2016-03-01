<?php

namespace me\adamcameron\mocking\service;

use me\adamcameron\mocking\exception\NotImplementedException;

class LoggingService {

    final public function logSomething($text){
        throw new NotImplementedException(__FUNCTION__ . " not implemented yet");
    }

}
