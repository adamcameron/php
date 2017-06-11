<?php

namespace me\adamcameron\silex2\test\integration\repository;

use me\adamcameron\silex2\app\Application;
use PHPUnit\Framework\TestCase;

class NumberRepositoryTest extends TestCase
{
    private $repository;

    public function setup()
    {
        $app = new Application();
        $this->repository = $app['repository.number'];
    }

    public function testNumbers()
    {
        $id = 4;
        $lang = 'mi';
        $result = $this->repository->getNumberByIdAndLanguage($id, $lang);

        $expected = (object) [$lang => 'wha'];
        $this->assertEquals($expected, $result);
    }
}
