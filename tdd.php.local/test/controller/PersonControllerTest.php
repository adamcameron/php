<?php

namespace me\adamcameron\tdd\test\controller;

use me\adamcameron\tdd\controller\PersonController;
use me\adamcameron\tdd\model\Person;
use me\adamcameron\tdd\service\PersonService;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;

/** @coversDefaultClass me\adamcameron\tdd\controller\PersonController */
class PersonControllerTest extends TestCase
{
    private $controller;
    private $service;
    private $mockedPerson;

    public function setup()
    {
        $this->setMockedPerson();
        $this->setMockedPersonService();
        $this->controller = new PersonController($this->service->reveal());
    }

    /** @covers ::doGet */
    public function testDoGet()
    {
        $expected = sprintf("G'day %s!", $this->mockedPerson->firstName);
        $result = $this->controller->doGet($this->mockedPerson->id);

        $this->assertSame($expected, $result);
    }

    private function setMockedPerson()
    {
        $this->mockedPerson = new Person(29, 'Person 29');
    }

    private function setMockedPersonService()
    {
        $this->service = $this->prophesize(PersonService::class);
        $this->service
            ->getById(Argument::is($this->mockedPerson->id))
            ->willReturn($this->mockedPerson);
    }
}
