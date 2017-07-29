<?php

namespace me\adamcameron\phpunit\typecheck;

class MyDependency {

    public function dependencyMethod($value){
        return "$value HAS BEEN PROCESSED BY DEPENDENCY METHOD";
    }

}