<?php

namespace me\adamcameron\cor\handler;

use me\adamcameron\cor\repository\PersonRepository;

class DatabasePersonHandler extends PersonRetrievalHandler {

    private $repository;

    public function __construct(PersonRepository $repository) {
        parent::__construct();
        $this->repository = $repository;
    }

    public function perform($request, $response=null) {
        if (is_null($response)){
            $id = $request;
            $response = $this->repository->getById($id);
        }

        return $this->nextHandler->perform($request, $response);
    }
}
