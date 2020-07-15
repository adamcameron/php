<?php

namespace me\adamcameron\general\tdd\fixingExistingTests;

class Thing {

    public $id;
    public $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public static function createFromArray($values){
        return new static($values['id'], $values['name']);
    }
}