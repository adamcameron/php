<?php

namespace me\adamcameron\tdd\test\app;

use \me\adamcameron\tdd\app\TddApplication;
use PHPUnit\Framework\TestCase;

/** @coversDefaultClass \me\adamcameron\tdd\app\TddApplication */
class TddApplicationTest extends TestCase
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
