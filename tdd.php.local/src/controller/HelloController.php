<?php

namespace me\adamcameron\tdd\controller;

class HelloController
{
    public function doGet($name)
    {
        return "G'day $name!";
    }
}
