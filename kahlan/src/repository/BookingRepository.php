<?php

namespace me\adamcameron\kahlan\repository;

use me\adamcameron\kahlan\dao\BookingDAO;
use me\adamcameron\kahlan\model\Booking;

class BookingRepository
{
    public $dao;

    public function __construct(BookingDAO $dao)
    {
        $this->dao = $dao;
    }

    public function getBookingsSince(string $dateTime, int $records) : array
    {
        $bookingData = $this->dao->getBookingsSince($dateTime, $records);

        return array_map(function ($booking) {
            return new Booking($booking['id'], $booking['emailAddress'], $booking['created']);
        }, $bookingData);
    }
}
