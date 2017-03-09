<?php

namespace me\adamcameron\myApp;

class MyDependency
{

    public function decorate($message)
    {
        return "THE ACTUAL MESSAGE IS: $message";
    }

}
