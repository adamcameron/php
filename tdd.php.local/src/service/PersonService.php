<?php

namespace me\adamcameron\tdd\service;

use me\adamcameron\tdd\repository\PersonRepository;

class PersonService
{
    private $repo;
    private $personFactory;

    /** @codeCoverageIgnore */
    function __construct(PersonRepository $personRepository, $personFactory)
    {
        $this->repo = $personRepository;
        $this->personFactory = $personFactory;
    }

    function getById($id)
    {
        $raw = $this->repo->getById($id);

        $person = ($this->personFactory)($raw['id'], $raw['firstName']);

        return $person;
    }
}
