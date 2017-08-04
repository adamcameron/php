<?php

namespace me\adamcameron\general\db\model;

class Person
{
    public $id;
    public $firstName;
    public $rank;
    public $gender;

    public function __construct(int $id, string $firstName, int $rank, string $gender)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->rank = $rank;
        $this->gender = $gender;
    }
}