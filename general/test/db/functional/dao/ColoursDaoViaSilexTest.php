<?php

namespace me\adamcameron\db\test\functional\dao;

use me\adamcameron\db\app\Application;

class ColoursDaoViaSilexTest extends ColoursDaoTest
{

    public function setup()
    {
        $app = new Application();
        $this->connection = $app['db.connection'];
        $this->dao = $app['dao.colours'];
    }
}
