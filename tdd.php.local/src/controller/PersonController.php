<?php

namespace me\adamcameron\tdd\controller;

use me\adamcameron\tdd\service\PersonService;

class PersonController
{
    private $personService;

    /** @codeCoverageIgnore */
    public function __construct(PersonService $personService)
    {
        $this->personService = $personService;
    }

    public function doGet($id)
    {
        $person = $this->personService->getById($id);

        return sprintf("G'day %s!", $person->firstName);
    }
}
