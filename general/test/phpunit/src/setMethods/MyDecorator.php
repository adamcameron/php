<?php

namespace me\adamcameron\phpunit\setMethods;

class MyDecorator
{

    public function addPrefix($message)
    {
        return "(ACTUAL PREFIX) $message";
    }

    public function addSuffix($message)
    {
        return "$message (ACTUAL SUFFIX)";
    }

}
