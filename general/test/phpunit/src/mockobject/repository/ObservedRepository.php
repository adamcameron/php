<?php

namespace me\adamcameron\phpunit\mockobject\repository;

class ObservedRepository
{

    public function observeMe($arg)
    {
        $message = "ObservedRepository->observeMe executed with [$arg]";
        echo $message;
        return $message;
    }
}

