<?php

namespace me\adamcameron\kahlan\app;

use me\adamcameron\kahlan\provider\ConfigProvider;
use me\adamcameron\kahlan\provider\DatabaseProvider;
use me\adamcameron\kahlan\provider\LoggingProvider;
use me\adamcameron\kahlan\provider\RepositoryProvider;
use Pimple\Container as PimpleContainer;

class Container extends PimpleContainer
{
    public function __construct($values = [])
    {
            parent::__construct($values);

            $this->register(new ConfigProvider());
            $this->register(new LoggingProvider());
            $this->register(new DatabaseProvider());
            $this->register(new RepositoryProvider());
    }
}
