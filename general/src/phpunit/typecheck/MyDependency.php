<?php

namespace me\adamcameron\general\phpunit\typecheck;

class MyDependency {

    public function dependencyMethod($value){
        return "$value HAS BEEN PROCESSED BY DEPENDENCY METHOD";
    }

}