<?php

namespace me\adamcameron\db;

class DbConfig
{

    public $driver;
    public $host;
    public $port;
    public $dbname;
    public $username;
    public $password;
    public $master;
    public $slave;

    public function __construct($configFile)
    {
        $raw = file_get_contents($configFile);
        $properties = json_decode($raw);

        $this->driver = $properties->driver;
        $this->host = $properties->host;
        $this->port = $properties->port;
        $this->dbname = $properties->dbname;
        $this->master = (object) [
            'username' => $properties->master->username,
            'password' => $properties->master->password,
        ];
        $this->slave = (object) [
            'username' => $properties->slave->username,
            'password' => $properties->slave->password,
        ];
    }
}
