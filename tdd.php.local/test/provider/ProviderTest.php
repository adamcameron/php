<?php

namespace me\adamcameron\tdd\test\provider;

use Pimple\Container;

abstract class ProviderTest extends \PHPUnit_Framework_TestCase
{
    protected $sut;
    protected $provider;
    protected $container;

    public function setup()
    {
        $this->setContainer();
        $this->createSut();
    }

    protected function createSut()
    {
        $this->provider = new $this->sut();
    }

    protected function setContainer()
    {
        $this->container = new Container();
    }

    protected function setPimpleDependencies()
    {
    }

    abstract public function testRegister();
}
