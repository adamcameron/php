<?php

namespace me\adamcameron\tdd\model;

/** @codeCoverageIgnore */
class Person
{
    public $id;
    public $firstName;

    public function __construct($id, $firstName)
    {
        $this->id = $id;
        $this->firstName = $firstName;
    }
}
