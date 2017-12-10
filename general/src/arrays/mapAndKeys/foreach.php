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

$people = [];
foreach ($peopleData as $date => $name) {
    $people[$date] = new PersonalMilestone($date, $name);
}

var_dump($people);
