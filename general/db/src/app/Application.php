<?php

namespace me\adamcameron\db\app;

use me\adamcameron\db\provider\ConfigProvider;
use me\adamcameron\db\provider\DbProvider;
use Silex\Application as SilexApplication;

class Application extends SilexApplication
{

    public function __construct(array $values = [])
    {
        parent::__construct($values);

        $this->registerProviders();
    }

    private function registerProviders()
    {
        $this->register(new ConfigProvider());
        $this->register(new DbProvider());
    }
}
