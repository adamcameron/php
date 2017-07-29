<?php

namespace me\adamcameron\phpunit\mockobject\service;

use me\adamcameron\phpunit\mockobject\repository\SomeRepository;

class SomeService
{

    private $someRepository;

    public function __construct(SomeRepository $someRepository)
    {
        $this->someRepository = $someRepository;
    }

    public function getTheThing($idOfTheThing)
    {
        return $this->someRepository->getTheThing($idOfTheThing);
    }

    public function setTheThing($idOfTheThing, $valueOfTheThing)
    {
        $this->someRepository->setTheThing($idOfTheThing, $valueOfTheThing);
    }

    public function doesTheThingExist($idOfTheThing)
    {
        return $this->someRepository->doesTheThingExist($idOfTheThing);
    }

}
