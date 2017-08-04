<?php

namespace me\adamcameron\general\chainOfResponsibility\service;

use me\adamcameron\general\chainOfResponsibility\handler\PersonRetrievalHandler;
use me\adamcameron\general\chainOfResponsibility\model\Person;

class PersonService {

    private $retrievalHandler;

    public function __construct(PersonRetrievalHandler $retrievalHandler) {
        $this->retrievalHandler = $retrievalHandler;
    }

    public function getById($id) : Person {
        $record = $this->retrievalHandler->perform($id);

        if (is_array($record)){
            $person = new Person($record['firstName'], $record['lastName']);

            return $person;
        }
        return new Person();
    }
}
