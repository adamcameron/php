<?php

namespace me\adamcameron\kahlan\model;

class Booking
{
    public $id;
    public $emailAddress;
    public $created;

    public function __construct($id, $emailAddress, $created)
    {
        $this->id = $id;
        $this->emailAddress = $emailAddress;
        $this->created = $created;
    }
}
