<?php

namespace me\adamcameron\kahlan\service;

class Dependency
{
    public function isImplicitVoidMethod()
    {
        throw new \Exception("isImplicitVoidMethod was not mocked");
    }

    public function isExplicitVoidMethod() : void
    {
        throw new \Exception("isExplicitVoidMethod was not mocked");
    }
}
