<?php

namespace me\adamcameron\general\phpunit\typecheck;

class MyService {

    public function myMethod(MyDependency $myDependency, $myValue){

        $myResult = $myDependency->dependencyMethod($myValue);

        return $myResult;
    }

}