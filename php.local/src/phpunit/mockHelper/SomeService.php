<?php

namespace me\adamcameron\someApp\service;

use \me\adamcameron\someApp\repository\SomeRepository;

class SomeService {

    private $someRepository;

    public function __construct(SomeRepository $someRepository){
        $this->someRepository = $someRepository;
    }

    public function getTheThing($idOfTheThing){
        return $this->someRepository->getTheThing($idOfTheThing);
    }

    public function setTheThing($idOfTheThing, $valueOfTheThing){
        return $this->someRepository->setTheThing($idOfTheThing, $valueOfTheThing);
    }

    public function doesTheThingExist($idOfTheThing){
        return $this->someRepository->doesTheThingExist($idOfTheThing);
    }

}