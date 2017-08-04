<?php

namespace me\adamcameron\db\test\functional\dao;

use me\adamcameron\db\dao\ColoursDAO;
use me\adamcameron\db\provider\ConfigProvider;
use me\adamcameron\db\provider\DbProvider;

class ColoursDaoDirectTest extends ColoursDaoTest
{

    public function setup()
    {
        $file = ConfigProvider::getDefaultConfigDirectory() . '/db.json';
        $config = ConfigProvider::getDbConfigFromFile($file);
        $this->connection = DbProvider::getMasterSlaveConnection($config);
        $this->dao = new ColoursDAO($this->connection);
    }
}
