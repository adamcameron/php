<?php

namespace me\adamcameron\phpunit\mockobject\service;

use me\adamcameron\phpunit\mockobject\repository\ObservedRepository;

class ObservationService
{

    private $repository;

    public function __construct(ObservedRepository $repository)
    {
        $this->repository = $repository;
    }

    public function observeViaMe($arg)
    {
        return $this->repository->observeMe($arg);
    }
}
