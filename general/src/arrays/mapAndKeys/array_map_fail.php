<?php

class PersonalMilestone {
    public $date;
    public $name;

    function __construct($date, $name) {
        $this->date = $date;
        $this->name = $name;
    }
}

$peopleData = ["2008-11-08" => "Jacinda", "1990-10-27" => "Bill", "2014-09-20" => "James", "1979-05-24" => "Winston"];

$people = array_map(function ($name) {
    return new PersonalMilestone(
        $date, // dammit this won't work: array_map only gives me the value, not the key
        $name
    );
}, $peopleData);

var_dump($people);
