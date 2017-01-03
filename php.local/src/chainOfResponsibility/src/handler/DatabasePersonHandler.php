<?php

namespace me\adamcameron\cor\handler;

use me\adamcameron\cor\repository\PersonRepository;

class DatabasePersonHandler extends PersonRetrievalHandler {

    private $repository;

    public function __construct(PersonRepository $repository) {
        parent::__construct();
        $this->repository = $repository;
    }

    public function getById($id) {
        $record = $this->repository->getById($id);
        if (count($record)) {
            return $record;
        }

        return $this->nextHandler->getById($id);
    }
}
