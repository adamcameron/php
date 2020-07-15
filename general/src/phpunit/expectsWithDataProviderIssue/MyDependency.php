<?php

namespace me\adamcameron\general\phpunit\expectsWithDataProviderIssue;

class MyDependency
{
    function someMethod(){
        return "ORIGINAL VALUE";
    }

    function someOtherMethod(){
        return "ORIGINAL VALUE";
    }
}
