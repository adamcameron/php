<?php

class IndexedPerson {
    public $date;
    public $name;

    function __construct($date, $name) {
        $this->date = $date;
        $this->name = $name;
    }
}

$peopleData = ["2008-11-08" => "Jacinda", "1990-10-27" => "Bill", "2014-09-20" => "James", "1979-05-24" => "Winston"];

$keys = new ArrayIterator(array_keys($peopleData));

$people = array_reduce($peopleData, function ($people, $name) use ($keys) {
    $date = $keys->current();
    $people[$date] = new IndexedPerson($date, $name);
    $keys->next();

    return $people;
}, []);

var_dump($people);
