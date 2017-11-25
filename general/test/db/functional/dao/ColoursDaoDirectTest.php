<?php

namespace me\adamcameron\general\test\db\functional\dao;

use me\adamcameron\general\db\dao\ColoursDAO;
use me\adamcameron\general\db\provider\ConfigProvider;
use me\adamcameron\general\db\provider\DbProvider;

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
