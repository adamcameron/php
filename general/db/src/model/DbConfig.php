<?php

namespace me\adamcameron\db\model;

class DbConfig
{

    public $master;
    public $slave;

    public function __construct(\stdClass $configValues)
    {
        $this->master = $configValues->master;
        $this->slave = $configValues->slave;
    }
}