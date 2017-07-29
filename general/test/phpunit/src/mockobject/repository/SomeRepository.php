<?php

namespace me\adamcameron\phpunit\mockobject\repository;

class SomeRepository
{
    public function getTheThing($idOfTheThing)
    {
        throw new \Exception("getTheThing() not implemented yet");
        return false;
    }

    public function setTheThing($idOfTheThing, $valueOfTheThing)
    {
        throw new \Exception("setTheThing() not implemented yet");
    }

    public function doesTheThingExist($idOfTheThing)
    {
        throw new \Exception("doesTheThingExist() not implemented yet");
        return false;
    }
}
