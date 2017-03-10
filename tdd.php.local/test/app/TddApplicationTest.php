<?php

use \me\adamcameron\tdd\app\TddApplication;

/** @coversDefaultClass \me\adamcameron\tdd\app\TddApplication */
class TddApplicationTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers ::loadRoutes
     * @uses \me\adamcameron\tdd\app\TddApplication::__construct
     */
    public function testLoadRoutes()
    {
        $app = new TddApplication([]);

        $this->assertArrayHasKey('service.route', $app);
    }
}
