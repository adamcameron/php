<?php

namespace me\adamcameron\cor\handler;

use me\adamcameron\cor\service\LoggingService;

abstract class PersonRetrievalHandler {

    protected $nextHandler;
    protected $logger;

    public function __construct() {
        $this->nextHandler = new class {
            function getById(){
                return null;
            }
        };
    }

    public function setNextHandler(PersonRetrievalHandler $nextHandler) {
        $this->nextHandler = $nextHandler;
    }
}
