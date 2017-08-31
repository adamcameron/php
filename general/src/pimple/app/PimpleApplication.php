<?php

namespace me\adamcameron\general\pimple\app;

use me\adamcameron\general\pimple\provider\ServiceProvider;
use Silex\Application;

class PimpleApplication extends Application
{
    public function __construct(array $values = [])
    {
        parent::__construct($values);

        $this->register(new ServiceProvider());
    }
}
