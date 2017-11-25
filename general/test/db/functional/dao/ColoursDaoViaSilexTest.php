<?php

namespace me\adamcameron\general\test\db\functional\dao;

use me\adamcameron\general\db\app\Application;

class ColoursDaoViaSilexTest extends ColoursDaoTest
{

    public function setup()
    {
        $app = new Application();
        $this->connection = $app['db.connection'];
        $this->dao = $app['dao.colours'];
    }
}
