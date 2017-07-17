<?php

namespace me\adamcameron\reflection\privateMethods\usingOnlyReflection;

class GreetingService {

    public function greet($name){
        return $this->applyGreeting($name);
    }

    private function applyGreeting($name){
        $greeting = rand(0,1) ? "G'day" : "Kia ora";
        return "$greeting, $name";
    }

}

