<?php

namespace me\adamcameron\kahlan\model;

/** @codeCoverageIgnore */
class Customer
{
    public $bookingId;
    public $emailAddress;
    public $previousBookingId;

    public function __construct($bookingId, $emailAddress, $previousBookingId = null)
    {
        $this->bookingId = $bookingId;
        $this->emailAddress = $emailAddress;
        $this->previousBookingId = $previousBookingId;
    }
}
