<?php

namespace me\adamcameron\mocking\service;

class MyService {

    private $logger;

    public function __construct(LoggingService $logger){
        $this->logger = $logger;
    }

    public function doesStuff($value){
        $preppedValue = "PREPPED $value";
        $processedValue = $this->doesRiskyStuff($preppedValue);
        $this->logger->logSomething($processedValue);
        return "RESULT OF DOING STUFF ON $processedValue";
    }

    protected function doesRiskyStuff($preppedValue){
        return "$preppedValue (SURVIVED RISKY PROCESS)";
    }

}
