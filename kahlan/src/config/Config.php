<?php

namespace me\adamcameron\kahlan\config;

class Config
{
    public $database;
    public $log;

    public function __construct()
    {
        $this->database = (object) [
            'host' => 'localhost',
            'port' => '3306',
            'database' => 'kahlan',
            'username' => 'kahlan',
            'password' => 'kahlan'
        ];
        $this->logging = (object) [
            'name' => 'SyncCustomersJob',
            'path' => null//'/log/SyncCustomersJob.log'
        ];
    }
}
