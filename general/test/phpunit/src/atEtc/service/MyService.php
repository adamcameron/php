<?php

namespace me\adamcameron\phpunit\atEtc\service;

class MyService {

    private $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function usesAt($firstArg, $secondArg, $thirdArg)
    {
        $this->repository->testsAtFirstMethod($firstArg);
        $this->repository->testsAtSecondMethod($secondArg);
        $this->repository->testsAtSecondMethod($secondArg, $thirdArg);
        $this->repository->testsAtFirstMethod($firstArg, $thirdArg);
    }

    public function usesWithConsecutive($firstArg, $secondArg, $thirdArg)
    {
        $args = func_get_args();

        foreach ($args as $arg){
        }
    }

}