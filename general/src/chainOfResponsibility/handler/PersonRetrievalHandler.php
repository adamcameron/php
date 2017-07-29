<?php

namespace me\adamcameron\general\chainOfResponsibility\handler;

abstract class PersonRetrievalHandler implements Handler {

    protected $nextHandler;
    protected $logger;

    public function __construct() {
        $this->nextHandler = $this->getPassThroughHandler();
    }

    public function setNextHandler(PersonRetrievalHandler $nextHandler) {
        $this->nextHandler = $nextHandler;
    }

    private function getPassThroughHandler(){
        return new class  {
            function perform($_, $response){
                return $response;
            }
        };
    }
}
