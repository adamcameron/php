<?php

namespace me\adamcameron\general\di;

class DynamicallyTypedService
{

    private $logger;

    public function __construct($logger)
    {
        $this->logger = $logger;
    }
}
