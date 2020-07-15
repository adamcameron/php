<?php

namespace me\adamcameron\general\phpunit\expectsWithDataProviderIssue;

class MyService
{
    private $dependency;

    function __construct(MyDependency $dependency){
        $this->dependency = $dependency;
    }

    function myMethod() {
        return $this->dependency->someMethod();
    }

    function myOtherMethod(){
        $this->dependency->someOtherMethod();
        $this->dependency->someOtherMethod();
        $this->dependency->someOtherMethod();
        $this->dependency->someOtherMethod();
        return $this->dependency->someOtherMethod();
    }
}
