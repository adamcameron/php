<?php

namespace me\adamcameron\cor\service;

use me\adamcameron\cor\handler\PersonRetrievalHandler;
use me\adamcameron\cor\model\Person;

class PersonService {

    private $retrievalHandler;

    public function __construct(PersonRetrievalHandler $retrievalHandler) {
        $this->retrievalHandler = $retrievalHandler;
    }

    public function getById($id) : Person {
        $record = $this->retrievalHandler->getById($id);

        if (is_array($record)){
            $person = new Person($record['firstName'], $record['lastName']);

            return $person;
        }
        return new Person();
    }
}
