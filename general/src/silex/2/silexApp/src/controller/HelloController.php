<?php

namespace me\adamcameron\general\silexApp\controller;

class HelloController
{
    public function doGet($name)
    {
        return "G'day $name!";
    }
}
