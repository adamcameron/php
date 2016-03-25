<?php

namespace me\adamcameron\mocking\stub;

use me\adamcameron\mocking\exception\StubMethodCalledException;

class LoggingService implements Logger {

    public function logSomething($text){
        throw new StubMethodCalledException(__FUNCTION__ . " must be mocked");
    }

}
