<?php

namespace me\adamcameron\general\di;

use Monolog\Logger;

class StaticallyTypedService
{

    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }
}
