<?php

namespace me\adamcameron\tdd\repository;

class PersonRepository
{
    private static $people = [
        '1' => 'Zachary',
        '2' => 'Joe'
    ];

    public function getById($id)
    {
        return [
            'id' => $id,
            'firstName' => self::$people[$id]
        ];
    }
}
