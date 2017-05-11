<?php

namespace me\adamcameron\phpunit\typecheck;

class MyService {

    public function myMethod(MyDependency $myDependency, $myValue){

        $myResult = $myDependency->dependencyMethod($myValue);

        return $myResult;
    }

}