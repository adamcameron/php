<?php

namespace me\adamcameron\silexApp\controller;

class HelloController
{
    public function doGet($name)
    {
        return "G'day $name!";
    }
}
