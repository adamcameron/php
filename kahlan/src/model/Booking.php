<?php

namespace me\adamcameron\kahlan\model;

/** @codeCoverageIgnore */
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
