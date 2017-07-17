<?php

namespace me\adamcameron\db\model;

class Name
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